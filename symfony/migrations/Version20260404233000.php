<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Ensures all tables and columns defined in the ORM entities actually exist
 * in the database.  Uses CREATE TABLE IF NOT EXISTS so it is safe to run
 * against a database that was created manually before Doctrine migrations
 * were introduced.  Column existence is checked via information_schema for
 * compatibility with standard MySQL (ADD COLUMN IF NOT EXISTS is MariaDB-only).
 */
final class Version20260404233000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create achievement, comment, saves, user tables if missing; add any missing columns to post, comment, saves, user';
    }

    private function columnExists(string $table, string $column): bool
    {
        return (int) $this->connection->executeQuery(
            "SELECT COUNT(*) FROM information_schema.COLUMNS
              WHERE TABLE_SCHEMA = DATABASE()
                AND TABLE_NAME   = ?
                AND COLUMN_NAME  = ?",
            [$table, $column]
        )->fetchOne() > 0;
    }

    public function up(Schema $schema): void
    {
        // ── achievement ──────────────────────────────────────────────────────
        $this->addSql("
            CREATE TABLE IF NOT EXISTS achievement (
                acheivement_id  INT AUTO_INCREMENT NOT NULL,
                acheivement_name VARCHAR(255)       NOT NULL,
                acheivement_score INT               NOT NULL DEFAULT 0,
                PRIMARY KEY (acheivement_id)
            ) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB
        ");

        // ── comment ──────────────────────────────────────────────────────────
        $this->addSql("
            CREATE TABLE IF NOT EXISTS comment (
                comment_id INT AUTO_INCREMENT NOT NULL,
                comment    LONGTEXT           NOT NULL,
                likes      INT                NOT NULL DEFAULT 0,
                dislikes   INT                NOT NULL DEFAULT 0,
                user_id    INT                NOT NULL,
                post_id    INT                NOT NULL,
                PRIMARY KEY (comment_id)
            ) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB
        ");
        // Add likes / dislikes if the comment table already existed without them
        if (!$this->columnExists('comment', 'likes')) {
            $this->addSql('ALTER TABLE comment ADD COLUMN likes    INT NOT NULL DEFAULT 0');
        }
        if (!$this->columnExists('comment', 'dislikes')) {
            $this->addSql('ALTER TABLE comment ADD COLUMN dislikes INT NOT NULL DEFAULT 0');
        }

        // ── saves ─────────────────────────────────────────────────────────────
        $this->addSql("
            CREATE TABLE IF NOT EXISTS saves (
                id          INT AUTO_INCREMENT NOT NULL,
                description LONGTEXT           DEFAULT NULL,
                post_id     INT                NOT NULL,
                user_id     INT                NOT NULL,
                PRIMARY KEY (id)
            ) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB
        ");
        if (!$this->columnExists('saves', 'description')) {
            $this->addSql('ALTER TABLE saves ADD COLUMN description LONGTEXT DEFAULT NULL');
        }

        // ── user ──────────────────────────────────────────────────────────────
        $this->addSql("
            CREATE TABLE IF NOT EXISTS `user` (
                id         INT AUTO_INCREMENT NOT NULL,
                email      VARCHAR(255)       NOT NULL,
                password   VARCHAR(255)       NOT NULL,
                firstName  VARCHAR(100)       NOT NULL,
                lastName   VARCHAR(100)       NOT NULL,
                role       VARCHAR(50)        DEFAULT NULL,
                bio        LONGTEXT           DEFAULT NULL,
                phone      VARCHAR(20)        DEFAULT NULL,
                avatar_url VARCHAR(500)       DEFAULT NULL,
                PRIMARY KEY (id),
                UNIQUE KEY user_email_unique (email)
            ) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB
        ");
        if (!$this->columnExists('user', 'bio')) {
            $this->addSql('ALTER TABLE `user` ADD COLUMN bio        LONGTEXT     DEFAULT NULL');
        }
        if (!$this->columnExists('user', 'phone')) {
            $this->addSql('ALTER TABLE `user` ADD COLUMN phone      VARCHAR(20)  DEFAULT NULL');
        }
        if (!$this->columnExists('user', 'avatar_url')) {
            $this->addSql('ALTER TABLE `user` ADD COLUMN avatar_url VARCHAR(500) DEFAULT NULL');
        }

        // ── post (base columns not covered by Version20260404231432) ─────────
        if (!$this->columnExists('post', 'tag')) {
            $this->addSql('ALTER TABLE post ADD COLUMN tag            VARCHAR(100) DEFAULT NULL');
        }
        if (!$this->columnExists('post', 'image_url')) {
            $this->addSql('ALTER TABLE post ADD COLUMN image_url      VARCHAR(500) DEFAULT NULL');
        }
        if (!$this->columnExists('post', 'acheivement_id')) {
            $this->addSql('ALTER TABLE post ADD COLUMN acheivement_id INT          DEFAULT NULL');
        }
    }

    public function down(Schema $schema): void
    {
        if ($this->columnExists('post', 'acheivement_id')) {
            $this->addSql('ALTER TABLE post DROP COLUMN acheivement_id');
        }
        if ($this->columnExists('post', 'image_url')) {
            $this->addSql('ALTER TABLE post DROP COLUMN image_url');
        }
        if ($this->columnExists('post', 'tag')) {
            $this->addSql('ALTER TABLE post DROP COLUMN tag');
        }

        if ($this->columnExists('user', 'avatar_url')) {
            $this->addSql('ALTER TABLE `user` DROP COLUMN avatar_url');
        }
        if ($this->columnExists('user', 'phone')) {
            $this->addSql('ALTER TABLE `user` DROP COLUMN phone');
        }
        if ($this->columnExists('user', 'bio')) {
            $this->addSql('ALTER TABLE `user` DROP COLUMN bio');
        }

        if ($this->columnExists('saves', 'description')) {
            $this->addSql('ALTER TABLE saves DROP COLUMN description');
        }
        if ($this->columnExists('comment', 'dislikes')) {
            $this->addSql('ALTER TABLE comment DROP COLUMN dislikes');
        }
        if ($this->columnExists('comment', 'likes')) {
            $this->addSql('ALTER TABLE comment DROP COLUMN likes');
        }

        $this->addSql('DROP TABLE IF EXISTS achievement');
        $this->addSql('DROP TABLE IF EXISTS comment');
        $this->addSql('DROP TABLE IF EXISTS saves');
        $this->addSql('DROP TABLE IF EXISTS `user`');
    }
}
