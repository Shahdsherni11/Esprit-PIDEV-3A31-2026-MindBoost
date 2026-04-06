-- ============================================================
-- MindBoost Symfony - Script d'adaptation de la base de données
-- À exécuter dans phpMyAdmin sur la base `mindboost` existante
-- ============================================================

-- 1. Adapter la table `user` existante pour Symfony Security
-- (Symfony attend `is_verified` avec underscore, pas `isVerified`)

-- Vérifier si la colonne is_verified existe déjà
-- Si la table vient du projet Java avec `is_verified`, elle est compatible.
-- Sinon adapter :

ALTER TABLE `user`
    MODIFY `role` VARCHAR(50) NOT NULL DEFAULT 'user',
    MODIFY `is_verified` TINYINT(1) NOT NULL DEFAULT 0,
    MODIFY `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP;

-- 2. Adapter la table `profile` existante
-- La table `profile` du projet Java a `user_id` mais Symfony attend une FK standard

-- Vérifier/ajouter la contrainte FK si elle n'existe pas
-- ALTER TABLE `profile`
--     ADD CONSTRAINT `fk_profile_user_symfony`
--     FOREIGN KEY (`user_id`) REFERENCES `user`(`id`) ON DELETE CASCADE;

-- 3. Créer la table de migration Doctrine (nécessaire pour doctrine:migrations:*)
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
    `version` VARCHAR(191) NOT NULL,
    `executed_at` DATETIME DEFAULT NULL,
    `execution_time` INT DEFAULT NULL,
    PRIMARY KEY(`version`)
) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;

-- 4. Insérer un admin de test (mot de passe hashé bcrypt pour "Admin1234")
-- IMPORTANT: Le mot de passe est hashé via bcrypt, pas en clair comme dans Java
INSERT IGNORE INTO `user` (`email`, `role`, `password`, `is_verified`, `created_at`) VALUES
('admin@mindboost.com', 'admin',
 '$2y$13$kTc9rk8hMXcXpnl3YKbhBOzWe4wYxwMvPyWe7gVkDXl3b7L8pXGla',
 1, NOW()),
('user@mindboost.com', 'user',
 '$2y$13$kTc9rk8hMXcXpnl3YKbhBOzWe4wYxwMvPyWe7gVkDXl3b7L8pXGla',
 1, NOW());

-- NOTE: Le hash ci-dessus correspond à "Admin1234"
-- Pour générer un vrai hash, utilisez:
-- php bin/console security:hash-password

-- 5. Profils de test
INSERT IGNORE INTO `profile` (`user_id`, `first_name`, `last_name`, `phone`, `bio`, `personality_type`, `created_at`)
SELECT u.id, 'Super', 'Admin', '+216 71 000 000', 'Administrateur de la plateforme MindBoost', 'INTJ', NOW()
FROM `user` u WHERE u.email = 'admin@mindboost.com';

INSERT IGNORE INTO `profile` (`user_id`, `first_name`, `last_name`, `phone`, `bio`, `personality_type`, `created_at`)
SELECT u.id, 'Test', 'Utilisateur', '+216 72 000 000', 'Utilisateur de test MindBoost', 'ENFP', NOW()
FROM `user` u WHERE u.email = 'user@mindboost.com';
