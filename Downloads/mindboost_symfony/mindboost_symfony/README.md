# MindBoost Symfony 6.3

## Installation

1. `composer install`
2. Importer mindboost.sql dans phpMyAdmin (base = `mindboost`)
3. `.env` est déjà configuré pour MariaDB 10.4 / root sans mot de passe
4. Créer un compte via `/register`, puis passer le rôle admin en SQL :
   `UPDATE user SET role = 'admin' WHERE email = 'votre@email.com';`
5. `php -S localhost:8000 -t public/`

## Fonctionnalités

- Auth : inscription, connexion, déconnexion, "se souvenir de moi"
- Profil utilisateur : afficher / modifier (CRUD)
- Tâches Focus : CRUD complet + sous-tâches (OneToMany)
- Tests Psychologiques : affichage, admin CRUD + gestion questions/réponses
- Admin : dashboard stats, CRUD utilisateurs, CRUD profils, CRUD tests

## ⚠️ Mots de passe

Java stocke les mots de passe en clair. Symfony utilise bcrypt.
Créez un nouveau compte via /register pour la démonstration.
