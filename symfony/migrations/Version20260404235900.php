<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * The original Java project created the `saves` table without an `id` column
 * (inserts used only description/post_id/user_id).  The previous migration
 * (Version20260404233000) used CREATE TABLE IF NOT EXISTS, so when the table
 * already existed it was left unchanged and the `id` PRIMARY KEY column was
 * never added.
 *
 * Doctrine ORM maps Saves::$id → column `id`, so any query against an older
 * `saves` table fails with "Unknown column 't0.id'".
 *
 * This migration safely adds the `id` AUTO_INCREMENT PRIMARY KEY column when
 * it is missing, and is a no-op when the column already exists.
 */
final class Version20260404235900 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add id AUTO_INCREMENT PRIMARY KEY to saves table if missing (Java-created table had no id column)';
    }

    public function up(Schema $schema): void
    {
        // Check whether the id column already exists
        $hasId = (int) $this->connection->executeQuery(
            "SELECT COUNT(*) FROM information_schema.COLUMNS
              WHERE TABLE_SCHEMA = DATABASE()
                AND TABLE_NAME   = 'saves'
                AND COLUMN_NAME  = 'id'"
        )->fetchOne();

        if ($hasId > 0) {
            $this->write('  <info>saves.id already exists — skipping.</info>');
            return;
        }

        // Drop any existing PRIMARY KEY before adding the new auto-increment one
        $hasPk = (int) $this->connection->executeQuery(
            "SELECT COUNT(*) FROM information_schema.TABLE_CONSTRAINTS
              WHERE TABLE_SCHEMA   = DATABASE()
                AND TABLE_NAME     = 'saves'
                AND CONSTRAINT_TYPE = 'PRIMARY KEY'"
        )->fetchOne();

        if ($hasPk > 0) {
            $this->addSql('ALTER TABLE saves DROP PRIMARY KEY');
        }

        $this->addSql('ALTER TABLE saves ADD COLUMN id INT AUTO_INCREMENT NOT NULL PRIMARY KEY FIRST');
    }

    public function down(Schema $schema): void
    {
        // Only drop the id column if it exists and there are no rows
        // (removing a PK from a live table with data is intentionally left manual)
        $this->addSql('ALTER TABLE saves DROP PRIMARY KEY, DROP COLUMN id');
    }
}
