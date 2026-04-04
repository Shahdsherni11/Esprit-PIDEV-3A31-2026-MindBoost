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
        $this->addSql("ALTER TABLE post
            ADD COLUMN IF NOT EXISTS post_likes    INT NOT NULL DEFAULT 0,
            ADD COLUMN IF NOT EXISTS post_dislikes INT NOT NULL DEFAULT 0,
            ADD COLUMN IF NOT EXISTS help_meter    INT NOT NULL DEFAULT 0
        ");
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE post
            DROP COLUMN IF EXISTS post_likes,
            DROP COLUMN IF EXISTS post_dislikes,
            DROP COLUMN IF EXISTS help_meter
        ');
    }
}
