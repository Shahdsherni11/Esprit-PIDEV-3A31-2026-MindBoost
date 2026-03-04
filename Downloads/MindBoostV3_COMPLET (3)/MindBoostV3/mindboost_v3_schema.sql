-- ============================================================
-- MindBoost V3 — Script SQL complet
-- Exécuter dans MySQL Workbench ou phpMyAdmin
-- ============================================================

CREATE DATABASE IF NOT EXISTS mindboost_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE mindboost_db;

-- Table user (inchangée)
CREATE TABLE IF NOT EXISTS `user` (
  `id`         INT AUTO_INCREMENT PRIMARY KEY,
  `email`      VARCHAR(150) NOT NULL UNIQUE,
  `password`   VARCHAR(255) NOT NULL,
  `role`       ENUM('user','psychologist','admin') DEFAULT 'user',
  `is_verified` TINYINT(1) DEFAULT 0,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- Table profile (inchangée)
CREATE TABLE IF NOT EXISTS `profile` (
  `id`               INT AUTO_INCREMENT PRIMARY KEY,
  `user_id`          INT NOT NULL UNIQUE,
  `first_name`       VARCHAR(80) NOT NULL,
  `last_name`        VARCHAR(80) NOT NULL,
  `phone`            VARCHAR(30),
  `avatar_url`       VARCHAR(500),
  `bio`              TEXT,
  `personality_type` VARCHAR(10),
  `created_at`       DATETIME DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (`user_id`) REFERENCES `user`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB;

-- ============================================================
-- NOUVELLES TABLES V3
-- ============================================================

-- 👁️ Reconnaissance faciale : stockage encodage visage
CREATE TABLE IF NOT EXISTS `face_encoding` (
  `id`         INT AUTO_INCREMENT PRIMARY KEY,
  `user_id`    INT NOT NULL UNIQUE,
  `encoding`   LONGTEXT NOT NULL COMMENT 'JSON array de doubles (128 valeurs)',
  `image_path` VARCHAR(500) COMMENT 'Chemin photo de référence',
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (`user_id`) REFERENCES `user`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB;

-- 🧬 Événements comportementaux
CREATE TABLE IF NOT EXISTS `behavior_event` (
  `id`         INT AUTO_INCREMENT PRIMARY KEY,
  `user_id`    INT NOT NULL,
  `event_type` VARCHAR(50) NOT NULL COMMENT 'click, navigation, typing_speed, pause, idle',
  `event_data` TEXT COMMENT 'JSON avec détails',
  `session_id` VARCHAR(64),
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (`user_id`) REFERENCES `user`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB;

-- 🧭 Carte psychologique 5 dimensions
CREATE TABLE IF NOT EXISTS `psych_profile` (
  `id`           INT AUTO_INCREMENT PRIMARY KEY,
  `user_id`      INT NOT NULL UNIQUE,
  `anxiety`      FLOAT DEFAULT 50.0 COMMENT '0=calme, 100=très anxieux',
  `resilience`   FLOAT DEFAULT 50.0 COMMENT '0=fragile, 100=très résilient',
  `sociability`  FLOAT DEFAULT 50.0 COMMENT '0=introverti, 100=extraverti',
  `focus`        FLOAT DEFAULT 50.0 COMMENT '0=dispersé, 100=très concentré',
  `mood`         FLOAT DEFAULT 50.0 COMMENT '0=déprimé, 100=euphorique',
  `anomaly_score` FLOAT DEFAULT 0.0 COMMENT '0=normal, 100=anomalie critique',
  `detected_type` VARCHAR(30) COMMENT 'ANALYTIQUE, CREATIF, SOCIAL, EMPATHIQUE, LEADER',
  `last_updated` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (`user_id`) REFERENCES `user`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB;

-- 🤖 Sessions MindBot
CREATE TABLE IF NOT EXISTS `mindbot_session` (
  `id`         INT AUTO_INCREMENT PRIMARY KEY,
  `user_id`    INT NOT NULL,
  `role`       ENUM('user','assistant') NOT NULL,
  `message`    TEXT NOT NULL,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (`user_id`) REFERENCES `user`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB;

-- 📧 Alertes psychologue
CREATE TABLE IF NOT EXISTS `psy_alert` (
  `id`          INT AUTO_INCREMENT PRIMARY KEY,
  `user_id`     INT NOT NULL,
  `psy_email`   VARCHAR(150) NOT NULL,
  `alert_type`  VARCHAR(50) COMMENT 'ANXIETY_HIGH, MOOD_LOW, ANOMALY',
  `message`     TEXT,
  `sent`        TINYINT(1) DEFAULT 0,
  `created_at`  DATETIME DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (`user_id`) REFERENCES `user`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB;

-- Compte admin par défaut (password: Admin123)
INSERT IGNORE INTO `user` (email, password, role, is_verified) VALUES
('admin@mindboost.com', '$2a$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2uheWG/igi.', 'admin', 1);

SELECT '✅ MindBoost V3 Schema créé avec succès !' AS status;
