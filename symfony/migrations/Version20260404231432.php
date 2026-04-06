<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260404231432 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add post_likes, post_dislikes, and help_meter columns to the post table';
    }

    public function up(Schema $schema): void
    {
        // ADD COLUMN IF NOT EXISTS is MariaDB-only; use information_schema checks
        // for compatibility with standard MySQL.
        $columns = [
            'post_likes'    => 'INT NOT NULL DEFAULT 0',
            'post_dislikes' => 'INT NOT NULL DEFAULT 0',
            'help_meter'    => 'INT NOT NULL DEFAULT 0',
        ];

        foreach ($columns as $column => $definition) {
            $exists = (int) $this->connection->executeQuery(
                "SELECT COUNT(*) FROM information_schema.COLUMNS
                  WHERE TABLE_SCHEMA = DATABASE()
                    AND TABLE_NAME   = 'post'
                    AND COLUMN_NAME  = ?",
                [$column]
            )->fetchOne();

            if ($exists === 0) {
                $this->addSql("ALTER TABLE post ADD COLUMN $column $definition");
            }
        }
    }

    public function down(Schema $schema): void
    {
        foreach (['post_likes', 'post_dislikes', 'help_meter'] as $column) {
            $exists = (int) $this->connection->executeQuery(
                "SELECT COUNT(*) FROM information_schema.COLUMNS
                  WHERE TABLE_SCHEMA = DATABASE()
                    AND TABLE_NAME   = 'post'
                    AND COLUMN_NAME  = ?",
                [$column]
            )->fetchOne();

            if ($exists > 0) {
                $this->addSql("ALTER TABLE post DROP COLUMN $column");
            }
        }
    }
}
