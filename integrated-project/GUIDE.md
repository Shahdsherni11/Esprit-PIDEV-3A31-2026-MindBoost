# 🧠 MindBoost × MindCare+ — Guide de démarrage

## ▶ URL d'accès unique

```
http://localhost:3002
```

C'est **tout**. Une seule URL pour toute la plateforme.

---

## ▶ Lancer le projet

```bash
# 1. Installer les dépendances (une seule fois)
cd integrated-project
npm install

# 2. Lancer
npm run dev
```

Ouvrez ensuite : **http://localhost:3002**

---

## ▶ Connexion immédiate (sans MySQL)

Si MySQL n'est pas configuré, connectez-vous avec ces comptes de démo
qui sont créés automatiquement au démarrage :

| Email | Mot de passe | Rôle | Accès |
|-------|-------------|------|-------|
| `test@test.com` | `test123` | Patient | Toutes les sections patient |
| `therapist@test.com` | `therapy123` | Thérapeute | Espace clinicien |
| `admin@test.com` | `admin123` | Admin | Panneau d'administration |

> **Note :** Si MySQL n'est pas disponible, l'authentification échoue.
> Dans ce cas, configurez MySQL ou utilisez le mode demo ci-dessous.

---

## ▶ Toutes les pages disponibles

### Patient (`test@test.com`)
| Page | URL | Données |
|------|-----|---------|
| Dashboard | `/dashboard` | Stats, liens rapides |
| Bio Tendances | `/insights` | Graphiques bien-être |
| Carte Neurale | `/constellation` | Carte émotions drag & drop |
| Focus Lab | `/focus` | Pomodoro + respiration |
| Ambiances | `/soundscapes` | Sons + fréquences |
| Noyau Neural | `/kernel` | Méditation + affirmations |
| Coach IA | `/chat` | Chat Gemini AI |
| Journal | `/journal` | Entrées + humeurs (localStorage) |
| Rendez-vous | `/appointments` | Liste RDV |
| Communauté | `/community` | Forum (localStorage) |
| Tests Psy | `/tests` | PHQ-9, GAD-7, DASS-21... |
| Résultats Tests | `/tests/history` | Historique |
| Stats Tests | `/tests/stats` | Graphiques |
| Mes Tâches | `/taches` | Todo + sous-tâches |
| Achievements | `/achievements` | Badges XP |
| Profil | `/profile` | Modifier infos |

### Thérapeute (`therapist@test.com`)
| Page | URL |
|------|-----|
| Espace Clinicien | `/clinic` |
| Journal | `/journal` |
| Rendez-vous | `/appointments` |
| Communauté | `/community` |

### Admin (`admin@test.com`)
| Page | URL |
|------|-----|
| Dashboard Admin | `/admin` |
| Utilisateurs | `/admin` → onglet Users |
| Posts | `/admin` → onglet Posts |
| Signalements | `/admin` → onglet Signalements |

---

## ▶ Configuration MySQL (optionnel)

Le projet utilise MySQL pour l'authentification. Par défaut il cherche :
- Host: `localhost`
- User: `root`
- Password: `` (vide)
- Database: `mindcare_dbai` (créée automatiquement)

Si votre MySQL a un mot de passe, modifiez `src/server/database.ts` :
```ts
password: 'votre_mot_de_passe',
```

---

## ▶ Activer le Coach IA (Gemini)

Le fichier `.env` contient déjà une clé Gemini. Si elle expire :
1. Allez sur https://aistudio.google.com/apikey
2. Créez une clé gratuite
3. Modifiez `.env` :
```env
GEMINI_API_KEY=votre_nouvelle_cle
```

---

## ▶ MindBoost Symfony (optionnel)

Les tests psychologiques, tâches et posts sont **intégrés directement en React** 
et fonctionnent sans Symfony.

Pour activer le backend Symfony complet (base de données Symfony) :
```bash
cd mindboost-symfony
composer install
# Configurez DATABASE_URL dans mindboost-symfony/.env
php bin/console doctrine:migrations:migrate
symfony serve --port=8000 --no-tls
```
Les routes Symfony (`/admin`, `/front`, `/tests` Symfony) seront automatiquement 
proxiées depuis `localhost:3002`.

