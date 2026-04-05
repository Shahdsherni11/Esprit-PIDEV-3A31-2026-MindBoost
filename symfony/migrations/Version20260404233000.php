<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Ensures all tables and columns defined in the ORM entities actually exist
 * in the database.  Uses CREATE TABLE IF NOT EXISTS so it is safe to run
 * against a database that was created manually before Doctrine migrations
 * were introduced, and ALTER TABLE … ADD COLUMN IF NOT EXISTS so it is safe
 * to run even when individual columns were already added by a previous
 * migration (e.g. Version20260404231432 for post_likes / post_dislikes /
 * help_meter).
 */
final class Version20260404233000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create achievement, comment, saves, user tables if missing; add any missing columns to post, comment, saves, user';
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
        $this->addSql('ALTER TABLE comment ADD COLUMN IF NOT EXISTS likes    INT NOT NULL DEFAULT 0');
        $this->addSql('ALTER TABLE comment ADD COLUMN IF NOT EXISTS dislikes INT NOT NULL DEFAULT 0');

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
        $this->addSql('ALTER TABLE saves ADD COLUMN IF NOT EXISTS description LONGTEXT DEFAULT NULL');

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
        $this->addSql('ALTER TABLE `user` ADD COLUMN IF NOT EXISTS bio        LONGTEXT     DEFAULT NULL');
        $this->addSql('ALTER TABLE `user` ADD COLUMN IF NOT EXISTS phone      VARCHAR(20)  DEFAULT NULL');
        $this->addSql('ALTER TABLE `user` ADD COLUMN IF NOT EXISTS avatar_url VARCHAR(500) DEFAULT NULL');

        // ── post (base columns not covered by Version20260404231432) ─────────
        $this->addSql('ALTER TABLE post ADD COLUMN IF NOT EXISTS tag            VARCHAR(100) DEFAULT NULL');
        $this->addSql('ALTER TABLE post ADD COLUMN IF NOT EXISTS image_url      VARCHAR(500) DEFAULT NULL');
        $this->addSql('ALTER TABLE post ADD COLUMN IF NOT EXISTS acheivement_id INT          DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE post DROP COLUMN IF EXISTS acheivement_id');
        $this->addSql('ALTER TABLE post DROP COLUMN IF EXISTS image_url');
        $this->addSql('ALTER TABLE post DROP COLUMN IF EXISTS tag');

        $this->addSql('ALTER TABLE `user` DROP COLUMN IF EXISTS avatar_url');
        $this->addSql('ALTER TABLE `user` DROP COLUMN IF EXISTS phone');
        $this->addSql('ALTER TABLE `user` DROP COLUMN IF EXISTS bio');

        $this->addSql('ALTER TABLE saves DROP COLUMN IF EXISTS description');
        $this->addSql('ALTER TABLE comment DROP COLUMN IF EXISTS dislikes');
        $this->addSql('ALTER TABLE comment DROP COLUMN IF EXISTS likes');

        $this->addSql('DROP TABLE IF EXISTS achievement');
        $this->addSql('DROP TABLE IF EXISTS comment');
        $this->addSql('DROP TABLE IF EXISTS saves');
        $this->addSql('DROP TABLE IF EXISTS `user`');
    }
}
