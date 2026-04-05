<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260405111143 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE general_answers (id INT AUTO_INCREMENT NOT NULL, answer_label VARCHAR(10) NOT NULL, answer_text LONGTEXT NOT NULL, score INT NOT NULL, answer_order INT NOT NULL, created_at DATETIME NOT NULL, question_id INT DEFAULT NULL, INDEX IDX_21F06B721E27F6BF (question_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE general_questions (id INT AUTO_INCREMENT NOT NULL, question_text LONGTEXT NOT NULL, question_order INT NOT NULL, created_at DATETIME NOT NULL, test_id INT DEFAULT NULL, INDEX IDX_69E846521E5D0459 (test_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE general_tests (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, status VARCHAR(50) NOT NULL, created_by INT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE score (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, general_test_id INT NOT NULL, total_score INT NOT NULL, percentage INT DEFAULT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE specific_answers (id INT AUTO_INCREMENT NOT NULL, question_id INT NOT NULL, answer_text LONGTEXT NOT NULL, score INT NOT NULL, answer_order INT NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_A332A1ED1E27F6BF (question_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE specific_questions (id INT AUTO_INCREMENT NOT NULL, test_id INT NOT NULL, question_text LONGTEXT NOT NULL, question_order INT NOT NULL, created_at DATETIME NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE specific_score (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, specific_test_id INT NOT NULL, total_score INT NOT NULL, max_score INT NOT NULL, percentage INT NOT NULL, category VARCHAR(100) NOT NULL, level VARCHAR(20) NOT NULL, week_number INT NOT NULL, passed_at DATETIME NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE specific_tests (id INT AUTO_INCREMENT NOT NULL, general_test_id INT DEFAULT NULL, category VARCHAR(100) NOT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, status VARCHAR(50) NOT NULL, created_by INT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE student_answers (id INT AUTO_INCREMENT NOT NULL, specific_score_id INT NOT NULL, user_id INT NOT NULL, specific_test_id INT NOT NULL, question_id INT NOT NULL, question_text LONGTEXT NOT NULL, selected_answer_text LONGTEXT NOT NULL, answer_score INT NOT NULL, passed_at DATETIME NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0E3BD61CE16BA31DBBF396750 (queue_name, available_at, delivered_at, id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE general_answers ADD CONSTRAINT FK_21F06B721E27F6BF FOREIGN KEY (question_id) REFERENCES general_questions (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE general_questions ADD CONSTRAINT FK_69E846521E5D0459 FOREIGN KEY (test_id) REFERENCES general_tests (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE specific_answers ADD CONSTRAINT FK_A332A1ED1E27F6BF FOREIGN KEY (question_id) REFERENCES specific_questions (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE general_answers DROP FOREIGN KEY FK_21F06B721E27F6BF');
        $this->addSql('ALTER TABLE general_questions DROP FOREIGN KEY FK_69E846521E5D0459');
        $this->addSql('ALTER TABLE specific_answers DROP FOREIGN KEY FK_A332A1ED1E27F6BF');
        $this->addSql('DROP TABLE general_answers');
        $this->addSql('DROP TABLE general_questions');
        $this->addSql('DROP TABLE general_tests');
        $this->addSql('DROP TABLE score');
        $this->addSql('DROP TABLE specific_answers');
        $this->addSql('DROP TABLE specific_questions');
        $this->addSql('DROP TABLE specific_score');
        $this->addSql('DROP TABLE specific_tests');
        $this->addSql('DROP TABLE student_answers');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
