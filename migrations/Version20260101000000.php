<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260101000000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Création des tables user et profile pour MindBoost';
    }

    public function up(Schema $schema): void
    {
        // Cette migration est optionnelle si vous utilisez la base existante mindboost
        // Elle crée les tables si elles n'existent pas

        $this->addSql('CREATE TABLE IF NOT EXISTS `user` (
            `id` INT AUTO_INCREMENT NOT NULL,
            `email` VARCHAR(180) NOT NULL,
            `role` VARCHAR(50) DEFAULT \'user\' NOT NULL,
            `password` VARCHAR(255) NOT NULL,
            `is_verified` TINYINT(1) DEFAULT 0 NOT NULL,
            `created_at` DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\',
            UNIQUE INDEX UNIQ_8D93D649E7927C74 (`email`),
            PRIMARY KEY(`id`)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');

        $this->addSql('CREATE TABLE IF NOT EXISTS `profile` (
            `id` INT AUTO_INCREMENT NOT NULL,
            `user_id` INT NOT NULL,
            `first_name` VARCHAR(100) NOT NULL,
            `last_name` VARCHAR(100) NOT NULL,
            `phone` VARCHAR(20) DEFAULT NULL,
            `avatar_url` VARCHAR(255) DEFAULT NULL,
            `bio` LONGTEXT DEFAULT NULL,
            `personality_type` VARCHAR(50) DEFAULT NULL,
            `created_at` DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\',
            UNIQUE INDEX UNIQ_8157AA0FA76ED395 (`user_id`),
            PRIMARY KEY(`id`),
            CONSTRAINT `FK_PROFILE_USER` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE IF EXISTS `profile`');
        $this->addSql('DROP TABLE IF EXISTS `user`');
    }
}
