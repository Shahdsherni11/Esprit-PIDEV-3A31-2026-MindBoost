# MindBoost Symfony Integration

Integrated Symfony app (single folder: `symfony`) with 4 modules:
- Forum (FrontOffice + BackOffice)
- Test Psychologique (user + admin)
- Tâche
- User session-based access

## 1) Create folder and pull integration on your PC

```bash
mkdir MindBoost-Integration
cd MindBoost-Integration
git clone https://github.com/Shahdsherni11/Esprit-PIDEV-3A31-2026-MindBoost.git
cd Esprit-PIDEV-3A31-2026-MindBoost
git checkout copilot/integrate-forum-test-tache-user
cd symfony
```

## 2) Install and run

```bash
composer install
cp .env.exemple .env
php bin/console doctrine:migrations:migrate
symfony server:start
```

If `symfony` CLI is not installed on your PC, run:
```bash
php -S 127.0.0.1:8000 -t public
```

## 3) Database

- Your DB already exists in XAMPP/MySQL.
- Update `DATABASE_URL` in `.env` to match your local credentials/db name.

## 4) API keys (where to put them)

Put these values in `symfony/.env`:
- `HUGGINGFACE_API_KEY` (forum AI summarize/translate)
- `OPENAI_API_KEY` (tâche AI suggestions/advice)
- `GEMINI_API_KEY` + `GEMINI_MODEL` (admin AI generation)
- `GROQ_API_KEY` + `GROQ_MODEL` (user AI chat)
- `QUOTE_API_URL` + `QUOTE_API_KEY` (motivation/sentiment source)
- `SENTIMENT_API_URL`

Template file: `symfony/.env.exemple`.

## 5) Session role/user switch (integration helper)

Use this URL to switch current session user/role:
```
/session/set?userId=1&role=ROLE_USER&target=/user
/session/set?userId=1&role=ROLE_ADMIN&target=/admin
```

## 6) Access URLs

- Forum FrontOffice: `/posts`
- Forum BackOffice: `/admin`
- Test psychologique user: `/user`
- Test psychologique admin dashboard: `/admin/dashboard`
- Tâche module: `/tache`
