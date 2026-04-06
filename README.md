# MindBoost – Gestion Utilisateurs Symfony 6.4

Projet Symfony 6.4 complet pour la gestion des utilisateurs de la plateforme MindBoost.
Réalisé dans le cadre du Sprint S1 – Partie Gestion Utilisateurs.

---

## 📋 Fonctionnalités (Grille S1 Gestion User)

### Côté Utilisateur (front-office)
- ✅ **Inscription** avec email, mot de passe (validé), rôle, confirmation de mot de passe
- ✅ **Authentification** (login/logout) avec Symfony Security
- ✅ **Consultation du profil** (mon profil)
- ✅ **Modification du profil** (prénom, nom, téléphone, bio, personnalité, avatar)
- ✅ Session sécurisée avec remember me
- ✅ Dashboard utilisateur personnalisé

### Côté Administrateur (back-office)
- ✅ **Liste des utilisateurs** avec pagination, recherche DQL, filtres (rôle, statut)
- ✅ **Consultation du détail** d'un profil utilisateur
- ✅ **Ajout d'un utilisateur** (admin)
- ✅ **Modification d'un utilisateur** (email, rôle, mot de passe optionnel)
- ✅ **Activation / Désactivation** d'un compte utilisateur (toggle isVerified)
- ✅ **Suppression** d'un utilisateur (avec confirmation)
- ✅ Gestion des profils (liste, détail, suppression)
- ✅ Dashboard admin avec statistiques (total, vérifiés, nouveaux 30j, répartition rôles)

### Fonctionnalités métier (DQL)
- ✅ Recherche multi-champs avec DQL (email, prénom, nom, rôle)
- ✅ Filtrage par rôle et statut de vérification
- ✅ Statistiques agrégées (COUNT, GROUP BY)
- ✅ Jointures LEFT JOIN User-Profile

### Validation des données (côté serveur Symfony)
- ✅ Email : format valide + unicité
- ✅ Mot de passe : min 8 chars, 1 majuscule, 1 chiffre
- ✅ Confirmation de mot de passe
- ✅ Champs obligatoires (prénom, nom)
- ✅ Téléphone : format regex
- ✅ Bio : max 500 caractères
- ✅ Protection CSRF sur tous les formulaires
- ✅ Contrôles de saisie : serveur PHP (pas HTML5/JS uniquement)

---

## 🚀 Installation

### Prérequis
- PHP >= 8.1
- Composer
- MySQL / MariaDB (base `mindboost` existante)
- Symfony CLI (optionnel mais recommandé)

### Étapes

#### 1. Installer les dépendances
```bash
cd mindboost_symfony
composer install
```

#### 2. Configurer la base de données
Modifier le fichier `.env` :
```env
DATABASE_URL="mysql://root:VOTRE_MOT_DE_PASSE@127.0.0.1:3306/mindboost?serverVersion=10.4.32-MariaDB&charset=utf8mb4"
```

#### 3. Adapter la base de données existante
Exécuter le script SQL d'adaptation dans phpMyAdmin :
```
migrations/setup_mindboost.sql
```

Ou exécuter la migration Doctrine :
```bash
php bin/console doctrine:migrations:migrate
```

#### 4. (Optionnel) Recréer la base complètement
```bash
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
```

#### 5. Générer un mot de passe hashé
```bash
php bin/console security:hash-password
# Entrez votre mot de passe et copiez le hash dans la DB
```

#### 6. Lancer le serveur de développement
```bash
# Avec Symfony CLI (recommandé)
symfony serve

# Avec PHP built-in server
php -S localhost:8000 -t public/
```

#### 7. Accéder à l'application
- **URL** : http://localhost:8000
- **Admin** : admin@mindboost.com / Admin1234
- **Utilisateur** : user@mindboost.com / Admin1234

---

## 🗂 Structure du Projet

```
mindboost_symfony/
├── config/
│   ├── packages/
│   │   ├── framework.yaml
│   │   ├── doctrine.yaml
│   │   ├── security.yaml
│   │   ├── twig.yaml
│   │   └── validator.yaml
│   ├── bundles.php
│   ├── routes.yaml
│   └── services.yaml
├── migrations/
│   ├── Version20260101000000.php   ← Migration Doctrine
│   └── setup_mindboost.sql         ← Script SQL pour DB existante
├── public/
│   └── index.php
├── src/
│   ├── Controller/
│   │   ├── SecurityController.php      ← Login, Logout, Home
│   │   ├── RegistrationController.php  ← Inscription
│   │   ├── UserController.php          ← CRUD Admin Users
│   │   ├── ProfileController.php       ← Mon profil + admin profils
│   │   └── DashboardController.php     ← Dashboards admin & user
│   ├── Entity/
│   │   ├── User.php                    ← Entité User (UserInterface)
│   │   └── Profile.php                 ← Entité Profile (OneToOne → User)
│   ├── Form/
│   │   ├── RegistrationFormType.php    ← Formulaire inscription
│   │   ├── UserType.php                ← Formulaire admin user
│   │   └── ProfileType.php             ← Formulaire profil
│   ├── Repository/
│   │   ├── UserRepository.php          ← DQL: recherche, filtres, stats
│   │   └── ProfileRepository.php       ← DQL: recherche profils
│   └── Kernel.php
├── templates/
│   ├── base.html.twig                  ← Layout avec sidebar
│   ├── security/
│   │   ├── login.html.twig             ← Page de connexion
│   │   └── register.html.twig          ← Page d'inscription
│   ├── admin/
│   │   └── dashboard.html.twig         ← Dashboard admin
│   ├── user/
│   │   ├── dashboard.html.twig         ← Dashboard utilisateur
│   │   ├── index.html.twig             ← Liste utilisateurs (admin)
│   │   ├── new.html.twig               ← Ajouter utilisateur
│   │   ├── edit.html.twig              ← Modifier utilisateur
│   │   └── show.html.twig              ← Détail utilisateur
│   └── profile/
│       ├── show.html.twig              ← Mon profil
│       ├── edit.html.twig              ← Modifier/créer profil
│       ├── admin_index.html.twig       ← Liste profils (admin)
│       └── admin_show.html.twig        ← Détail profil (admin)
├── .env                                ← Configuration environnement
└── composer.json
```

---

## 🔐 Sécurité

| Rôle | Accès |
|------|-------|
| `ROLE_USER` | Dashboard, Mon profil, Modifier profil |
| `ROLE_PSYCHOLOGIST` | Tout ROLE_USER |
| `ROLE_ADMIN` | Tout + Gestion utilisateurs + Gestion profils |

Les routes `/admin/**` sont protégées par `#[IsGranted('ROLE_ADMIN')]`.

---

## 🗃 Base de données

Le projet utilise la base `mindboost` existante avec les tables :
- **`user`** : id, email, password (bcrypt), role, is_verified, created_at
- **`profile`** : id, user_id (FK), first_name, last_name, phone, avatar_url, bio, personality_type, created_at

⚠️ **Important** : Les mots de passe doivent être hashés en bcrypt (Symfony).
Les anciens mots de passe en clair du projet Java doivent être re-hashés.

---

## 🎨 Design

- **Bootstrap 5.3** (CDN) pour le responsive et les composants
- **Bootstrap Icons 1.11** pour les icônes
- Sidebar de navigation dégradée violet/bleu
- Thème cohérent avec les couleurs MindBoost (#6c63ff, #48bfe3)
- Pages login/register avec design plein écran
- Badges colorés par rôle (user=vert, admin=rouge, psychologist=violet)
- Tables avec filtres, recherche temps réel, actions par ligne

---

## 📝 Données de test

Après exécution de `setup_mindboost.sql` :

| Email | Mot de passe | Rôle |
|-------|-------------|------|
| admin@mindboost.com | Admin1234 | admin |
| user@mindboost.com | Admin1234 | user |

---

*MindBoost Symfony – Sprint S1 Gestion Utilisateurs*
