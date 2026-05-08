# MindBoost × MindCare+ — Projet Intégré

Une seule URL pour tout. Le serveur Express fait office de **reverse proxy** :  
les routes React restent sur Express, les routes Symfony sont transparentement  
transmises au serveur Symfony interne.

```
Navigateur → http://localhost:3002
                    │
                    ├── /dashboard, /chat, /journal...  → React (MindCare+)
                    ├── /api/*                          → Express API (MySQL)
                    └── /admin, /front, /tests...       → Symfony (MindBoost) :8000
```

---

## Démarrage rapide

```bash
# Tout démarrer en une commande
npm run start:all

# Ou manuellement :
cd mindboost-symfony && symfony serve --port=8000 --no-tls &
npm run dev
```

Ouvrez **http://localhost:3002** — c'est tout.

---

## Routes

| URL | Application | Description |
|-----|-------------|-------------|
| `/dashboard` `/chat` `/journal` `/focus` | React MindCare+ | Frontend bien-être IA |
| `/insights` `/soundscapes` `/constellation` `/kernel` | React MindCare+ | Modules avancés |
| `/appointments` `/community` `/profile` | React MindCare+ | Partagé |
| `/api/*` | Express API | Authentification, données utilisateurs |
| `/admin` `/back/*` | Symfony MindBoost | Panneau d'administration |
| `/front/*` `/tests` `/taches` `/posts` | Symfony MindBoost | Espace étudiant |

---

## Variables d'environnement

**`.env`** (racine)
```env
GEMINI_API_KEY=...
SYMFONY_URL=http://localhost:8000   # URL interne Symfony (pas exposée)
PORT=3002
```

**`mindboost-symfony/.env`**
```env
DATABASE_URL="mysql://root:@127.0.0.1:3306/mindboost"
GROQ_API_KEY=...
APP_SECRET=...
```

---

## Structure

```
integrated-project/
├── start.sh                    ← Lance tout en une commande
├── server.ts                   ← Express + proxy Symfony + Vite SSR
├── vite.config.ts              ← Proxy dev (Vite → Express → Symfony)
├── src/
│   ├── index.css               ← Design system unifié MindBoost × MindCare+
│   ├── App.tsx
│   ├── components/layout/Shell.tsx
│   └── pages/                  ← Dashboard, Chat, Focus, Journal...
└── mindboost-symfony/          ← Application Symfony complète
    ├── src/
    ├── templates/              ← Twig restyled palette sombre unifiée
    └── config/
```
