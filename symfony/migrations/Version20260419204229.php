<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260419204229 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0E3BD61CE16BA31DBBF396750 (queue_name, available_at, delivered_at, id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE behavior_event DROP FOREIGN KEY `behavior_event_ibfk_1`');
        $this->addSql('ALTER TABLE face_encoding DROP FOREIGN KEY `face_encoding_ibfk_1`');
        $this->addSql('ALTER TABLE mindbot_session DROP FOREIGN KEY `mindbot_session_ibfk_1`');
        $this->addSql('ALTER TABLE psych_profile DROP FOREIGN KEY `psych_profile_ibfk_1`');
        $this->addSql('ALTER TABLE psych_profile_history DROP FOREIGN KEY `psych_profile_history_ibfk_1`');
        $this->addSql('ALTER TABLE psy_alert DROP FOREIGN KEY `psy_alert_ibfk_1`');
        $this->addSql('DROP TABLE acheivements');
        $this->addSql('DROP TABLE behavior_event');
        $this->addSql('DROP TABLE face_encoding');
        $this->addSql('DROP TABLE mindbot_session');
        $this->addSql('DROP TABLE psych_profile');
        $this->addSql('DROP TABLE psych_profile_history');
        $this->addSql('DROP TABLE psy_alert');
        $this->addSql('ALTER TABLE achievement CHANGE acheivement_name acheivement_name VARCHAR(255) NOT NULL, CHANGE acheivement_score acheivement_score INT NOT NULL');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY `comment_ibfk_1`');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY `comment_ibfk_2`');
        $this->addSql('DROP INDEX fk_comment_user ON comment');
        $this->addSql('DROP INDEX fk_comment_post ON comment');
        $this->addSql('ALTER TABLE comment DROP comment_date, CHANGE comment comment LONGTEXT NOT NULL, CHANGE likes likes INT DEFAULT 0 NOT NULL, CHANGE dislikes dislikes INT DEFAULT 0 NOT NULL, CHANGE user_id user_id INT NOT NULL, CHANGE post_id post_id INT NOT NULL');
        $this->addSql('ALTER TABLE general_answers DROP FOREIGN KEY `general_answers_ibfk_1`');
        $this->addSql('ALTER TABLE general_answers CHANGE score score INT NOT NULL, CHANGE created_at created_at DATETIME NOT NULL');
        $this->addSql('DROP INDEX idx_question ON general_answers');
        $this->addSql('CREATE INDEX IDX_21F06B721E27F6BF ON general_answers (question_id)');
        $this->addSql('ALTER TABLE general_answers ADD CONSTRAINT `general_answers_ibfk_1` FOREIGN KEY (question_id) REFERENCES general_questions (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE general_questions DROP FOREIGN KEY `general_questions_ibfk_1`');
        $this->addSql('ALTER TABLE general_questions CHANGE question_text question_text LONGTEXT NOT NULL, CHANGE created_at created_at DATETIME NOT NULL');
        $this->addSql('DROP INDEX idx_test ON general_questions');
        $this->addSql('CREATE INDEX IDX_69E846521E5D0459 ON general_questions (test_id)');
        $this->addSql('ALTER TABLE general_questions ADD CONSTRAINT `general_questions_ibfk_1` FOREIGN KEY (test_id) REFERENCES general_tests (id) ON DELETE CASCADE');
        $this->addSql('DROP INDEX idx_created_by ON general_tests');
        $this->addSql('DROP INDEX idx_status ON general_tests');
        $this->addSql('ALTER TABLE general_tests CHANGE description description LONGTEXT DEFAULT NULL, CHANGE status status VARCHAR(50) DEFAULT \'DRAFT\' NOT NULL, CHANGE created_at created_at DATETIME NOT NULL, CHANGE updated_at updated_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE post DROP FOREIGN KEY `post_ibfk_1`');
        $this->addSql('ALTER TABLE post DROP FOREIGN KEY `post_ibfk_2`');
        $this->addSql('DROP INDEX fk_post_user ON post');
        $this->addSql('DROP INDEX fk_post_achievement ON post');
        $this->addSql('ALTER TABLE post ADD post_likes INT DEFAULT 0 NOT NULL, ADD post_dislikes INT DEFAULT 0 NOT NULL, DROP post_date, DROP likes, DROP dislikes, CHANGE content content LONGTEXT NOT NULL, CHANGE title title VARCHAR(255) NOT NULL, CHANGE tag tag VARCHAR(100) DEFAULT NULL, CHANGE image_url image_url VARCHAR(500) DEFAULT NULL, CHANGE help_meter help_meter INT DEFAULT 0 NOT NULL, CHANGE user_id user_id INT NOT NULL');
        $this->addSql('ALTER TABLE profile DROP FOREIGN KEY `profile_ibfk_1`');
        $this->addSql('ALTER TABLE profile CHANGE phone phone VARCHAR(20) DEFAULT NULL, CHANGE avatar_url avatar_url VARCHAR(255) DEFAULT NULL, CHANGE bio bio LONGTEXT DEFAULT NULL, CHANGE created_at created_at DATETIME DEFAULT NULL');
        $this->addSql('DROP INDEX user_id ON profile');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8157AA0FA76ED395 ON profile (user_id)');
        $this->addSql('ALTER TABLE profile ADD CONSTRAINT `profile_ibfk_1` FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE saves DROP FOREIGN KEY `saves_ibfk_1`');
        $this->addSql('ALTER TABLE saves DROP FOREIGN KEY `saves_ibfk_2`');
        $this->addSql('DROP INDEX fk_saves_user ON saves');
        $this->addSql('DROP INDEX IDX_7A3056E24B89032C ON saves');
        $this->addSql('ALTER TABLE saves ADD id INT AUTO_INCREMENT NOT NULL, CHANGE description description LONGTEXT DEFAULT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE score DROP FOREIGN KEY `score_ibfk_1`');
        $this->addSql('ALTER TABLE score DROP FOREIGN KEY `score_ibfk_2`');
        $this->addSql('DROP INDEX fk_score_general_test ON score');
        $this->addSql('DROP INDEX fk_score_user ON score');
        $this->addSql('ALTER TABLE sous_tache DROP FOREIGN KEY `sous_tache_ibfk_1`');
        $this->addSql('ALTER TABLE sous_tache DROP FOREIGN KEY `sous_tache_ibfk_1`');
        $this->addSql('ALTER TABLE sous_tache DROP created_at, CHANGE id_tache id_tache INT DEFAULT NULL, CHANGE description description VARCHAR(255) DEFAULT NULL, CHANGE etat etat VARCHAR(50) DEFAULT NULL, CHANGE priorite priorite INT DEFAULT NULL');
        $this->addSql('ALTER TABLE sous_tache ADD CONSTRAINT FK_EC6320907D026145 FOREIGN KEY (id_tache) REFERENCES tache_focus (id_tache)');
        $this->addSql('DROP INDEX id_tache ON sous_tache');
        $this->addSql('CREATE INDEX IDX_EC6320907D026145 ON sous_tache (id_tache)');
        $this->addSql('ALTER TABLE sous_tache ADD CONSTRAINT `sous_tache_ibfk_1` FOREIGN KEY (id_tache) REFERENCES tache_focus (id_tache) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE specific_answers DROP FOREIGN KEY `specific_answers_ibfk_1`');
        $this->addSql('ALTER TABLE specific_answers CHANGE score score INT NOT NULL, CHANGE created_at created_at DATETIME NOT NULL');
        $this->addSql('DROP INDEX idx_question ON specific_answers');
        $this->addSql('CREATE INDEX IDX_A332A1ED1E27F6BF ON specific_answers (question_id)');
        $this->addSql('ALTER TABLE specific_answers ADD CONSTRAINT `specific_answers_ibfk_1` FOREIGN KEY (question_id) REFERENCES specific_questions (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE specific_questions DROP FOREIGN KEY `specific_questions_ibfk_1`');
        $this->addSql('ALTER TABLE specific_questions CHANGE question_text question_text LONGTEXT NOT NULL, CHANGE created_at created_at DATETIME NOT NULL');
        $this->addSql('DROP INDEX idx_test ON specific_questions');
        $this->addSql('CREATE INDEX IDX_E48079EB1E5D0459 ON specific_questions (test_id)');
        $this->addSql('ALTER TABLE specific_questions ADD CONSTRAINT `specific_questions_ibfk_1` FOREIGN KEY (test_id) REFERENCES specific_tests (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE specific_score DROP FOREIGN KEY `specific_score_ibfk_1`');
        $this->addSql('DROP INDEX specific_test_id ON specific_score');
        $this->addSql('ALTER TABLE specific_score CHANGE total_score total_score INT NOT NULL, CHANGE max_score max_score INT NOT NULL, CHANGE percentage percentage INT NOT NULL, CHANGE level level VARCHAR(20) NOT NULL, CHANGE passed_at passed_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE specific_tests DROP FOREIGN KEY `specific_tests_ibfk_1`');
        $this->addSql('DROP INDEX idx_status ON specific_tests');
        $this->addSql('DROP INDEX idx_general_test ON specific_tests');
        $this->addSql('DROP INDEX idx_category ON specific_tests');
        $this->addSql('DROP INDEX idx_created_by ON specific_tests');
        $this->addSql('ALTER TABLE specific_tests CHANGE description description LONGTEXT DEFAULT NULL, CHANGE status status VARCHAR(50) DEFAULT \'DRAFT\' NOT NULL, CHANGE created_at created_at DATETIME NOT NULL, CHANGE updated_at updated_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE student_answers DROP FOREIGN KEY `student_answers_ibfk_1`');
        $this->addSql('DROP INDEX specific_score_id ON student_answers');
        $this->addSql('ALTER TABLE student_answers CHANGE question_text question_text LONGTEXT NOT NULL, CHANGE selected_answer_text selected_answer_text LONGTEXT NOT NULL, CHANGE answer_score answer_score INT NOT NULL, CHANGE passed_at passed_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE tache_focus DROP FOREIGN KEY `tache_focus_ibfk_1`');
        $this->addSql('DROP INDEX id_user ON tache_focus');
        $this->addSql('ALTER TABLE tache_focus DROP id_user, DROP priorite, DROP created_at, CHANGE objectif_principal objectif_principal VARCHAR(255) NOT NULL, CHANGE niveau_difficulte niveau_difficulte INT DEFAULT NULL, CHANGE statut statut VARCHAR(50) DEFAULT NULL, CHANGE score_productivite score_productivite INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE password password VARCHAR(255) NOT NULL, CHANGE role role VARCHAR(50) DEFAULT \'user\' NOT NULL, CHANGE is_verified is_verified TINYINT DEFAULT 0 NOT NULL, CHANGE created_at created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL');
        $this->addSql('DROP INDEX email ON user');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON user (email)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE acheivements (acheivement_id INT NOT NULL, acheivement_name VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, acheivement_score INT DEFAULT NULL) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE behavior_event (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, event_type VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, event_data TEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, session_id VARCHAR(64) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, created_at DATETIME DEFAULT CURRENT_TIMESTAMP, INDEX user_id (user_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE face_encoding (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, encoding LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci` COMMENT \'JSON array of 128 floats\', image_path VARCHAR(500) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, created_at DATETIME DEFAULT CURRENT_TIMESTAMP, UNIQUE INDEX user_id (user_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE mindbot_session (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, role ENUM(\'user\', \'assistant\') CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, message TEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, created_at DATETIME DEFAULT CURRENT_TIMESTAMP, INDEX user_id (user_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE psych_profile (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, anxiety FLOAT DEFAULT \'50\', resilience FLOAT DEFAULT \'50\', sociability FLOAT DEFAULT \'50\', focus FLOAT DEFAULT \'50\', mood FLOAT DEFAULT \'50\', anomaly_score FLOAT DEFAULT \'0\', detected_type VARCHAR(30) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, last_updated DATETIME DEFAULT CURRENT_TIMESTAMP, UNIQUE INDEX user_id (user_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE psych_profile_history (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, anxiety FLOAT DEFAULT \'50\', resilience FLOAT DEFAULT \'50\', sociability FLOAT DEFAULT \'50\', focus FLOAT DEFAULT \'50\', mood FLOAT DEFAULT \'50\', anomaly_score FLOAT DEFAULT \'0\', detected_type VARCHAR(30) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, recorded_at DATETIME DEFAULT CURRENT_TIMESTAMP, INDEX idx_user_date (user_id, recorded_at), INDEX IDX_52F39A9BA76ED395 (user_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE psy_alert (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, psy_email VARCHAR(150) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, alert_type VARCHAR(50) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, message TEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, sent TINYINT DEFAULT 0, created_at DATETIME DEFAULT CURRENT_TIMESTAMP, INDEX user_id (user_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE behavior_event ADD CONSTRAINT `behavior_event_ibfk_1` FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE face_encoding ADD CONSTRAINT `face_encoding_ibfk_1` FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE mindbot_session ADD CONSTRAINT `mindbot_session_ibfk_1` FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE psych_profile ADD CONSTRAINT `psych_profile_ibfk_1` FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE psych_profile_history ADD CONSTRAINT `psych_profile_history_ibfk_1` FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE psy_alert ADD CONSTRAINT `psy_alert_ibfk_1` FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE messenger_messages');
        $this->addSql('ALTER TABLE achievement CHANGE acheivement_name acheivement_name VARCHAR(255) DEFAULT NULL, CHANGE acheivement_score acheivement_score INT DEFAULT NULL');
        $this->addSql('ALTER TABLE comment ADD comment_date DATETIME DEFAULT CURRENT_TIMESTAMP, CHANGE comment comment VARCHAR(255) DEFAULT NULL, CHANGE likes likes INT DEFAULT 0, CHANGE dislikes dislikes INT DEFAULT 0, CHANGE user_id user_id INT DEFAULT NULL, CHANGE post_id post_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (post_id) REFERENCES post (post_id) ON DELETE CASCADE');
        $this->addSql('CREATE INDEX fk_comment_user ON comment (user_id)');
        $this->addSql('CREATE INDEX fk_comment_post ON comment (post_id)');
        $this->addSql('ALTER TABLE general_answers DROP FOREIGN KEY FK_21F06B721E27F6BF');
        $this->addSql('ALTER TABLE general_answers CHANGE score score INT DEFAULT 0 NOT NULL, CHANGE created_at created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL');
        $this->addSql('DROP INDEX idx_21f06b721e27f6bf ON general_answers');
        $this->addSql('CREATE INDEX idx_question ON general_answers (question_id)');
        $this->addSql('ALTER TABLE general_answers ADD CONSTRAINT FK_21F06B721E27F6BF FOREIGN KEY (question_id) REFERENCES general_questions (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE general_questions DROP FOREIGN KEY FK_69E846521E5D0459');
        $this->addSql('ALTER TABLE general_questions CHANGE question_text question_text TEXT NOT NULL, CHANGE created_at created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL');
        $this->addSql('DROP INDEX idx_69e846521e5d0459 ON general_questions');
        $this->addSql('CREATE INDEX idx_test ON general_questions (test_id)');
        $this->addSql('ALTER TABLE general_questions ADD CONSTRAINT FK_69E846521E5D0459 FOREIGN KEY (test_id) REFERENCES general_tests (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE general_tests CHANGE description description TEXT DEFAULT NULL, CHANGE status status ENUM(\'DRAFT\', \'ACTIVE\', \'INACTIVE\') DEFAULT \'DRAFT\', CHANGE created_at created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, CHANGE updated_at updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL');
        $this->addSql('CREATE INDEX idx_created_by ON general_tests (created_by)');
        $this->addSql('CREATE INDEX idx_status ON general_tests (status)');
        $this->addSql('ALTER TABLE post ADD post_date DATETIME DEFAULT CURRENT_TIMESTAMP, ADD likes INT DEFAULT 0, ADD dislikes INT DEFAULT 0, DROP post_likes, DROP post_dislikes, CHANGE content content TEXT DEFAULT NULL, CHANGE title title TEXT DEFAULT NULL, CHANGE tag tag VARCHAR(50) DEFAULT NULL, CHANGE image_url image_url VARCHAR(255) DEFAULT NULL, CHANGE help_meter help_meter INT DEFAULT 0, CHANGE user_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE post ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE post ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (acheivement_id) REFERENCES achievement (acheivement_id) ON DELETE SET NULL');
        $this->addSql('CREATE INDEX fk_post_user ON post (user_id)');
        $this->addSql('CREATE INDEX fk_post_achievement ON post (acheivement_id)');
        $this->addSql('ALTER TABLE profile DROP FOREIGN KEY FK_8157AA0FA76ED395');
        $this->addSql('ALTER TABLE profile CHANGE phone phone VARCHAR(30) DEFAULT NULL, CHANGE avatar_url avatar_url VARCHAR(500) DEFAULT NULL, CHANGE bio bio TEXT DEFAULT NULL, CHANGE created_at created_at DATETIME DEFAULT CURRENT_TIMESTAMP');
        $this->addSql('DROP INDEX uniq_8157aa0fa76ed395 ON profile');
        $this->addSql('CREATE UNIQUE INDEX user_id ON profile (user_id)');
        $this->addSql('ALTER TABLE profile ADD CONSTRAINT FK_8157AA0FA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE saves MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE saves DROP id, CHANGE description description VARCHAR(255) DEFAULT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (post_id, user_id)');
        $this->addSql('ALTER TABLE saves ADD CONSTRAINT `saves_ibfk_1` FOREIGN KEY (post_id) REFERENCES post (post_id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE saves ADD CONSTRAINT `saves_ibfk_2` FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('CREATE INDEX fk_saves_user ON saves (user_id)');
        $this->addSql('CREATE INDEX IDX_7A3056E24B89032C ON saves (post_id)');
        $this->addSql('ALTER TABLE score ADD CONSTRAINT `score_ibfk_1` FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE score ADD CONSTRAINT `score_ibfk_2` FOREIGN KEY (general_test_id) REFERENCES general_tests (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('CREATE INDEX fk_score_general_test ON score (general_test_id)');
        $this->addSql('CREATE INDEX fk_score_user ON score (user_id)');
        $this->addSql('ALTER TABLE sous_tache DROP FOREIGN KEY FK_EC6320907D026145');
        $this->addSql('ALTER TABLE sous_tache DROP FOREIGN KEY FK_EC6320907D026145');
        $this->addSql('ALTER TABLE sous_tache ADD created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, CHANGE description description TEXT NOT NULL, CHANGE etat etat VARCHAR(50) DEFAULT \'À faire\', CHANGE priorite priorite INT DEFAULT 1, CHANGE id_tache id_tache INT NOT NULL');
        $this->addSql('ALTER TABLE sous_tache ADD CONSTRAINT `sous_tache_ibfk_1` FOREIGN KEY (id_tache) REFERENCES tache_focus (id_tache) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('DROP INDEX idx_ec6320907d026145 ON sous_tache');
        $this->addSql('CREATE INDEX id_tache ON sous_tache (id_tache)');
        $this->addSql('ALTER TABLE sous_tache ADD CONSTRAINT FK_EC6320907D026145 FOREIGN KEY (id_tache) REFERENCES tache_focus (id_tache)');
        $this->addSql('ALTER TABLE specific_answers DROP FOREIGN KEY FK_A332A1ED1E27F6BF');
        $this->addSql('ALTER TABLE specific_answers CHANGE score score INT DEFAULT 0 NOT NULL, CHANGE created_at created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL');
        $this->addSql('DROP INDEX idx_a332a1ed1e27f6bf ON specific_answers');
        $this->addSql('CREATE INDEX idx_question ON specific_answers (question_id)');
        $this->addSql('ALTER TABLE specific_answers ADD CONSTRAINT FK_A332A1ED1E27F6BF FOREIGN KEY (question_id) REFERENCES specific_questions (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE specific_questions DROP FOREIGN KEY FK_E48079EB1E5D0459');
        $this->addSql('ALTER TABLE specific_questions CHANGE question_text question_text TEXT NOT NULL, CHANGE created_at created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL');
        $this->addSql('DROP INDEX idx_e48079eb1e5d0459 ON specific_questions');
        $this->addSql('CREATE INDEX idx_test ON specific_questions (test_id)');
        $this->addSql('ALTER TABLE specific_questions ADD CONSTRAINT FK_E48079EB1E5D0459 FOREIGN KEY (test_id) REFERENCES specific_tests (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE specific_score CHANGE total_score total_score INT DEFAULT 0 NOT NULL, CHANGE max_score max_score INT DEFAULT 0 NOT NULL, CHANGE percentage percentage INT DEFAULT 0 NOT NULL, CHANGE level level VARCHAR(20) DEFAULT \'Faible\' NOT NULL, CHANGE passed_at passed_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL');
        $this->addSql('ALTER TABLE specific_score ADD CONSTRAINT `specific_score_ibfk_1` FOREIGN KEY (specific_test_id) REFERENCES specific_tests (id)');
        $this->addSql('CREATE INDEX specific_test_id ON specific_score (specific_test_id)');
        $this->addSql('ALTER TABLE specific_tests CHANGE description description TEXT DEFAULT NULL, CHANGE status status ENUM(\'DRAFT\', \'ACTIVE\', \'INACTIVE\') DEFAULT \'DRAFT\', CHANGE created_at created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, CHANGE updated_at updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL');
        $this->addSql('ALTER TABLE specific_tests ADD CONSTRAINT `specific_tests_ibfk_1` FOREIGN KEY (general_test_id) REFERENCES general_tests (id) ON DELETE CASCADE');
        $this->addSql('CREATE INDEX idx_status ON specific_tests (status)');
        $this->addSql('CREATE INDEX idx_general_test ON specific_tests (general_test_id)');
        $this->addSql('CREATE INDEX idx_category ON specific_tests (category)');
        $this->addSql('CREATE INDEX idx_created_by ON specific_tests (created_by)');
        $this->addSql('ALTER TABLE student_answers CHANGE question_text question_text TEXT NOT NULL, CHANGE selected_answer_text selected_answer_text TEXT NOT NULL, CHANGE answer_score answer_score INT DEFAULT 0 NOT NULL, CHANGE passed_at passed_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL');
        $this->addSql('ALTER TABLE student_answers ADD CONSTRAINT `student_answers_ibfk_1` FOREIGN KEY (specific_score_id) REFERENCES specific_score (id)');
        $this->addSql('CREATE INDEX specific_score_id ON student_answers (specific_score_id)');
        $this->addSql('ALTER TABLE tache_focus ADD id_user INT DEFAULT NULL, ADD priorite INT DEFAULT 1, ADD created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, CHANGE objectif_principal objectif_principal TEXT DEFAULT NULL, CHANGE niveau_difficulte niveau_difficulte INT DEFAULT 1, CHANGE statut statut VARCHAR(50) DEFAULT \'Non commencée\', CHANGE score_productivite score_productivite INT DEFAULT 0');
        $this->addSql('ALTER TABLE tache_focus ADD CONSTRAINT `tache_focus_ibfk_1` FOREIGN KEY (id_user) REFERENCES user (id) ON DELETE SET NULL');
        $this->addSql('CREATE INDEX id_user ON tache_focus (id_user)');
        $this->addSql('ALTER TABLE user CHANGE password password VARCHAR(512) NOT NULL, CHANGE role role VARCHAR(50) DEFAULT \'user\', CHANGE is_verified is_verified TINYINT DEFAULT 0, CHANGE created_at created_at DATETIME DEFAULT CURRENT_TIMESTAMP');
        $this->addSql('DROP INDEX uniq_8d93d649e7927c74 ON user');
        $this->addSql('CREATE UNIQUE INDEX email ON user (email)');
    }
}
