DROP DATABASE IF EXISTS mindbood;
CREATE DATABASE mindbood;
USE mindbood;

-- ===============================
-- TABLE: tache_focus
-- ===============================
CREATE TABLE tache_focus (
                             id_tache INT AUTO_INCREMENT PRIMARY KEY,
                             titre VARCHAR(255) NOT NULL,
                             objectif_principal TEXT,
                             niveau_difficulte INT DEFAULT 1,
                             statut VARCHAR(50) DEFAULT 'Non commencée',
                             score_productivite INT DEFAULT 0,
                             id_user INT,
                             heure_debut TIME,
                             heure_fin TIME,
                             priorite INT DEFAULT 1,
                             created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- ===============================
-- TABLE: sous_tache
-- ===============================
CREATE TABLE sous_tache (
                            id_sous_tache INT AUTO_INCREMENT PRIMARY KEY,
                            id_tache INT NOT NULL,
                            description TEXT NOT NULL,
                            duree_recommandee INT,
                            etat VARCHAR(50) DEFAULT 'À faire',
                            heure_debut TIME,
                            heure_fin TIME,
                            priorite INT DEFAULT 1,
                            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                            
                            CONSTRAINT fk_tache_focus
                                FOREIGN KEY (id_tache)
                                    REFERENCES tache_focus(id_tache)
                                    ON DELETE CASCADE
                                    ON UPDATE CASCADE
);

-- ===============================
-- INSERT SAMPLE DATA
-- ===============================
INSERT INTO tache_focus (titre, objectif_principal, niveau_difficulte, statut, score_productivite, id_user, heure_debut, heure_fin, priorite) VALUES
('Projet de développement web', 'Terminer la page d\'accueil', 3, 'En cours', 75, 1, '09:00:00', '12:00:00', 1),
('Étude de marketing', 'Analyser les tendances du marché', 2, 'Non commencée', 0, 1, '14:00:00', '16:00:00', 2),
('Formation en productivité', 'Maîtriser la technique Pomodoro', 1, 'Terminée', 100, 1, '08:00:00', '09:00:00', 3);

INSERT INTO sous_tache (id_tache, description, duree_recommandee, etat, heure_debut, heure_fin, priorite) VALUES
(1, 'Créer la maquette wireframe', 60, 'Terminée', '09:00:00', '10:00:00', 1),
(1, 'Développer le header responsive', 90, 'En cours', '10:00:00', '11:30:00', 1),
(1, 'Tester sur différents navigateurs', 30, 'À faire', '11:30:00', '12:00:00', 2),
(2, 'Rechercher les concurrents', 45, 'À faire', '14:00:00', '14:45:00', 1),
(2, 'Analyser les données', 75, 'À faire', '14:45:00', '16:00:00', 1);