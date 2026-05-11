import express from "express";
import path from "path";
import cors from 'cors';
import { createProxyMiddleware } from 'http-proxy-middleware';
import { fileURLToPath } from "url";
import { createServer as createViteServer } from "vite";
import { NeuralKernelController } from "./src/server/Controllers/NeuralKernelController";
import { ClinicController } from "./src/server/Controllers/ClinicController";
import { UserController } from "./src/server/Controllers/UserController";
import { initializeDatabase, getPool } from "./src/server/database";
import crypto from 'crypto';

const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);

import fs from 'fs';
process.on('uncaughtException', (err) => {
  fs.writeFileSync('crash.log', 'Uncaught Exception: ' + (err.stack || err.message));
  process.exit(1);
});
process.on('unhandledRejection', (reason, promise) => {
  fs.writeFileSync('crash.log', 'Unhandled Rejection: ' + reason);
  process.exit(1);
});

// React SPA routes — these must NOT be forwarded to Symfony
const REACT_ROUTES = [
  '/dashboard', '/focus', '/journal', '/chat', '/insights',
  '/soundscapes', '/constellation', '/kernel', '/community',
  '/appointments', '/accounts', '/profile', '/login',
];

// Symfony route prefixes — forward everything under these to :8000
const SYMFONY_PREFIXES = [
  '/admin', '/back', '/front', '/logout', '/register',
  '/tests', '/taches', '/posts', '/achievements', '/statistiques',
  '/bundles', '/build', '/home',
];

const SYMFONY_URL = process.env.SYMFONY_URL || 'http://localhost:8000';

function isSymfonyRoute(url: string): boolean {
  // Never proxy React routes
  if (REACT_ROUTES.some(r => url === r || url.startsWith(r + '/') || url.startsWith(r + '?'))) return false;
  return SYMFONY_PREFIXES.some(p => url.startsWith(p));
}

async function startServer() {
  const app = express();
  app.use(cors());
  app.use(express.json());
  const PORT = parseInt(process.env.PORT || '3002');

  // ── Database ──────────────────────────────────────────────
  initializeDatabase((err) => {
    if (err) {
      console.error('Database initialization failed:', err);
    } else {
      console.log('✓ MySQL database initialized');
      if (process.env.NODE_ENV !== 'production') createTestUsers();
    }
  });

  // ── MindCare+ API routes ──────────────────────────────────
  app.get("/api/health",           NeuralKernelController.getHealth);
  app.post("/api/diagnostics",     NeuralKernelController.getDiagnostics);
  app.get("/api/emotions",         NeuralKernelController.getEmotions);
  app.get("/api/v1/clinic/stats",  ClinicController.getStats);
  app.get("/api/v1/clinic/list",   ClinicController.getClinics);
  app.get("/api/user/profile",     UserController.getProfile);
  app.post("/api/user/profile",    UserController.updateProfile);
  app.post("/api/user/register",   UserController.register);
  app.post("/api/user/login",      UserController.login);
  app.post("/api/user/create-test",UserController.createTestUser);

  // ── AI Chat route (Gemini) ───────────────────────────────
  app.post("/api/chat", async (req: any, res: any) => {
    const { message, history = [], systemPrompt } = req.body;
    if (!message) return res.status(400).json({ error: "Message required" });
    const apiKey = process.env.GEMINI_API_KEY;
    if (!apiKey) {
      return res.json({ reply: "Bonjour ! Je suis votre coach IA MindCare+. Configurez GEMINI_API_KEY dans votre .env pour activer l'IA complète." });
    }
    try {
      const geminiRes = await fetch(
        `https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key=${apiKey}`,
        {
          method: "POST",
          headers: { "Content-Type": "application/json" },
          body: JSON.stringify({
            system_instruction: { parts: [{ text: systemPrompt || "Tu es un coach de bien-être mental bienveillant. Réponds en français." }] },
            contents: [
              ...history.map((m: any) => ({ role: m.role === "assistant" ? "model" : "user", parts: [{ text: m.content }] })),
              { role: "user", parts: [{ text: message }] },
            ],
            generationConfig: { maxOutputTokens: 600, temperature: 0.8 },
          }),
        }
      );
      const data = await geminiRes.json();
      const reply = data?.candidates?.[0]?.content?.parts?.[0]?.text
        || "Je suis là pour vous soutenir. Pouvez-vous me donner plus de détails ?";
      res.json({ reply });
    } catch {
      res.json({ reply: "Je rencontre une difficulté technique. Prenez une grande respiration et réessayez. 🌿" });
    }
  });

  // ── Symfony proxy (MindBoost) ────────────────────────────
  // Dynamically proxy Symfony routes so the whole app runs on one URL
  const symfonyProxy = createProxyMiddleware({
    target: SYMFONY_URL,
    changeOrigin: true,
    on: {
      error: (_err, _req, res: any) => {
        res.status(502).send(`
          <html><body style="font-family:Inter,sans-serif;background:#07101D;color:#F4F7FC;display:flex;flex-direction:column;align-items:center;justify-content:center;min-height:100vh;margin:0">
            <div style="text-align:center;padding:2rem;background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.06);border-radius:24px;max-width:420px">
              <div style="font-size:2.5rem;margin-bottom:1rem">🧠</div>
              <h2 style="color:#4D83FF;margin:0 0 .75rem">MindBoost non disponible</h2>
              <p style="color:#AAB6D3;margin:0 0 1.5rem">Le serveur Symfony (MindBoost) n'est pas démarré.<br>Lancez <code style="background:rgba(47,107,255,0.15);padding:.2rem .5rem;border-radius:6px;color:#4D83FF">symfony serve</code> dans <code style="background:rgba(47,107,255,0.15);padding:.2rem .5rem;border-radius:6px;color:#4D83FF">mindboost-symfony/</code></p>
              <a href="/" style="background:linear-gradient(135deg,#2F6BFF,#4D83FF);color:white;text-decoration:none;padding:.75rem 1.5rem;border-radius:16px;font-weight:700">Retour MindCare+</a>
            </div>
          </body></html>`);
      }
    }
  });

  // Apply Symfony proxy selectively
  app.use((req, res, next) => {
    if (isSymfonyRoute(req.path)) return symfonyProxy(req, res, next);
    next();
  });

  // ── React / Vite ─────────────────────────────────────────
  if (process.env.NODE_ENV !== "production") {
    const vite = await createViteServer({
      server: { middlewareMode: true },
      appType: "spa",
    });
    app.use(vite.middlewares);
    // Fallback: serve React SPA for all remaining routes
    app.get("*", (_req, res) => {
      res.sendFile(path.join(process.cwd(), "index.html"));
    });
  } else {
    const distPath = path.join(process.cwd(), "dist");
    app.use(express.static(distPath));
    // Fallback: serve React SPA for all remaining routes
    app.get("*", (_req, res) => {
      res.sendFile(path.join(distPath, "index.html"));
    });
  }

  app.listen(PORT, "0.0.0.0", () => {
    console.log(`\n🚀 MindBoost × MindCare+ running on http://localhost:${PORT}`);
    console.log(`   React  (MindCare+)  → http://localhost:${PORT}/dashboard`);
    console.log(`   Symfony (MindBoost) → http://localhost:${PORT}/admin`);
    console.log(`   Symfony URL proxied → ${SYMFONY_URL}\n`);
  });
}

function createTestUsers() {
  const pool = getPool();
  const testUsers = [
    { id: 'demo-user',      email: 'test@test.com',         password: 'test123',    displayName: 'Test User',     role: 'patient'   },
    { id: 'demo-therapist', email: 'therapist@test.com',    password: 'therapy123', displayName: 'Demo Therapist',role: 'therapist' },
    { id: 'demo-admin',     email: 'admin@test.com',        password: 'admin123',   displayName: 'Demo Admin',    role: 'admin'     },
  ];
  testUsers.forEach((user) => {
    const hashedPassword = crypto.createHash('sha256').update(user.password).digest('hex');
    pool.query(
      'INSERT IGNORE INTO users (id, email, password, display_name, role) VALUES (?, ?, ?, ?, ?)',
      [user.id, user.email, hashedPassword, user.displayName, user.role],
      (err, results: any) => {
        if (err) console.error(`Error creating test user ${user.email}:`, err.message);
        else if (results?.affectedRows > 0) console.log(`  ✓ Test user created: ${user.email} (${user.role})`);
      }
    );
  });
}

startServer();
