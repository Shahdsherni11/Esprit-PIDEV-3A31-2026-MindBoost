<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260402202657 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

   public function up(Schema $schema): void
{
    $this->addSql('CREATE TABLE IF NOT EXISTS messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
}


    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE acheivements (acheivement_id INT AUTO_INCREMENT NOT NULL, acheivement_name VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, acheivement_score INT DEFAULT NULL, PRIMARY KEY(acheivement_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE comment (comment_id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, post_id INT DEFAULT NULL, comment VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, comment_date DATETIME DEFAULT CURRENT_TIMESTAMP, likes INT DEFAULT 0, dislikes INT DEFAULT 0, INDEX fk_comment_user (user_id), INDEX fk_comment_post (post_id), PRIMARY KEY(comment_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE general_answers (id INT AUTO_INCREMENT NOT NULL, question_id INT NOT NULL, answer_label VARCHAR(10) CHARACTER SET utf8mb4 DEFAULT \'A\' NOT NULL COLLATE `utf8mb4_unicode_ci`, answer_text VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, score INT DEFAULT 0 NOT NULL, answer_order INT NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, INDEX idx_question (question_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE general_questions (id INT AUTO_INCREMENT NOT NULL, test_id INT NOT NULL, question_text TEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, question_order INT NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, INDEX idx_test (test_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE general_tests (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, description TEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, status VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'DRAFT\' COLLATE `utf8mb4_unicode_ci`, created_by INT NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, INDEX idx_created_by (created_by), INDEX idx_status (status), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE post (post_id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, acheivement_id INT DEFAULT NULL, content TEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, title TEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, post_date DATETIME DEFAULT CURRENT_TIMESTAMP, tag VARCHAR(50) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, image_url VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, likes INT DEFAULT 0, dislikes INT DEFAULT 0, help_meter INT DEFAULT 0, INDEX fk_post_user (user_id), INDEX fk_post_achievement (acheivement_id), PRIMARY KEY(post_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE profile (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, first_name VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, last_name VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, phone VARCHAR(20) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, avatar_url VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, bio TEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, personality_type VARCHAR(50) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, created_at DATETIME DEFAULT NULL, UNIQUE INDEX user_id (user_id), INDEX idx_user_id (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE saves (post_id INT NOT NULL, user_id INT NOT NULL, description VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, INDEX fk_saves_user (user_id), INDEX IDX_7A3056E24B89032C (post_id), PRIMARY KEY(post_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE score (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, general_test_id INT NOT NULL, totalScore INT NOT NULL, percentage INT DEFAULT NULL, INDEX fk_score_general_test (general_test_id), INDEX fk_score_user (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE specific_answers (id INT AUTO_INCREMENT NOT NULL, question_id INT NOT NULL, answer_text VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, score INT DEFAULT 0 NOT NULL, answer_order INT NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, INDEX idx_question (question_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE specific_questions (id INT AUTO_INCREMENT NOT NULL, test_id INT NOT NULL, question_text TEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, question_order INT NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, INDEX idx_test (test_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE specific_score (id INT AUTO_INCREMENT NOT NULL, specific_test_id INT NOT NULL, user_id INT NOT NULL, total_score INT DEFAULT 0 NOT NULL, max_score INT DEFAULT 0 NOT NULL, percentage INT DEFAULT 0 NOT NULL, category VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, level VARCHAR(20) CHARACTER SET utf8mb4 DEFAULT \'Faible\' NOT NULL COLLATE `utf8mb4_general_ci`, week_number INT NOT NULL, passed_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, INDEX specific_test_id (specific_test_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE specific_tests (id INT AUTO_INCREMENT NOT NULL, general_test_id INT NOT NULL, category VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, title VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, description TEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, status VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'DRAFT\' COLLATE `utf8mb4_unicode_ci`, created_by INT NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, INDEX idx_created_by (created_by), INDEX idx_status (status), INDEX idx_general_test (general_test_id), INDEX idx_category (category), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE student_answers (id INT AUTO_INCREMENT NOT NULL, specific_score_id INT NOT NULL, user_id INT NOT NULL, specific_test_id INT NOT NULL, question_id INT NOT NULL, question_text TEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, selected_answer_text TEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, answer_score INT DEFAULT 0 NOT NULL, passed_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, INDEX specific_score_id (specific_score_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, password VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, role VARCHAR(50) CHARACTER SET utf8mb4 DEFAULT \'user\' COLLATE `utf8mb4_unicode_ci`, is_verified TINYINT(1) DEFAULT 0, created_at DATETIME DEFAULT CURRENT_TIMESTAMP, INDEX idx_email (email), INDEX idx_created_at (created_at), UNIQUE INDEX email (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT fk_comment_post FOREIGN KEY (post_id) REFERENCES post (post_id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT fk_comment_user FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE general_answers ADD CONSTRAINT general_answers_ibfk_1 FOREIGN KEY (question_id) REFERENCES general_questions (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE general_questions ADD CONSTRAINT general_questions_ibfk_1 FOREIGN KEY (test_id) REFERENCES general_tests (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE post ADD CONSTRAINT fk_post_user FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE post ADD CONSTRAINT fk_post_achievement FOREIGN KEY (acheivement_id) REFERENCES acheivements (acheivement_id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE profile ADD CONSTRAINT profile_ibfk_1 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE saves ADD CONSTRAINT fk_saves_user FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE saves ADD CONSTRAINT fk_saves_post FOREIGN KEY (post_id) REFERENCES post (post_id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE score ADD CONSTRAINT fk_score_general_test FOREIGN KEY (general_test_id) REFERENCES general_tests (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE score ADD CONSTRAINT fk_score_user FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE specific_answers ADD CONSTRAINT specific_answers_ibfk_1 FOREIGN KEY (question_id) REFERENCES specific_questions (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE specific_questions ADD CONSTRAINT specific_questions_ibfk_1 FOREIGN KEY (test_id) REFERENCES specific_tests (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE specific_score ADD CONSTRAINT specific_score_ibfk_1 FOREIGN KEY (specific_test_id) REFERENCES specific_tests (id)');
        $this->addSql('ALTER TABLE specific_tests ADD CONSTRAINT specific_tests_ibfk_1 FOREIGN KEY (general_test_id) REFERENCES general_tests (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE student_answers ADD CONSTRAINT student_answers_ibfk_1 FOREIGN KEY (specific_score_id) REFERENCES specific_score (id)');
        $this->addSql('DROP TABLE messenger_messages');
        $this->addSql('ALTER TABLE sous_tache MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE sous_tache DROP FOREIGN KEY FK_EC632090EA415A7F');
        $this->addSql('DROP INDEX IDX_EC632090EA415A7F ON sous_tache');
        $this->addSql('DROP INDEX `PRIMARY` ON sous_tache');
        $this->addSql('ALTER TABLE sous_tache ADD id_tache INT NOT NULL, ADD created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, DROP tache_focus_id, CHANGE description description TEXT NOT NULL, CHANGE etat etat VARCHAR(50) DEFAULT \'À faire\', CHANGE heure_debut heure_debut TIME DEFAULT NULL, CHANGE heure_fin heure_fin TIME DEFAULT NULL, CHANGE priorite priorite INT DEFAULT 1, CHANGE id id_sous_tache INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE sous_tache ADD CONSTRAINT fk_tache_focus FOREIGN KEY (id_tache) REFERENCES tache_focus (id_tache) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('CREATE INDEX fk_tache_focus ON sous_tache (id_tache)');
        $this->addSql('ALTER TABLE sous_tache ADD PRIMARY KEY (id_sous_tache)');
        $this->addSql('ALTER TABLE tache_focus MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `PRIMARY` ON tache_focus');
        $this->addSql('ALTER TABLE tache_focus ADD id_user INT DEFAULT NULL, ADD priorite INT DEFAULT 1, ADD created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, CHANGE objectif_principal objectif_principal TEXT DEFAULT NULL, CHANGE niveau_difficulte niveau_difficulte INT DEFAULT 1, CHANGE statut statut VARCHAR(50) DEFAULT \'Non commencée\', CHANGE score_productivite score_productivite INT DEFAULT 0, CHANGE id id_tache INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE tache_focus ADD PRIMARY KEY (id_tache)');
    }
}
