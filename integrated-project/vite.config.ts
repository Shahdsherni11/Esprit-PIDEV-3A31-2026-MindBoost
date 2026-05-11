import tailwindcss from '@tailwindcss/vite';
import react from '@vitejs/plugin-react';
import path from 'path';
import { defineConfig, loadEnv } from 'vite';

export default defineConfig(({ mode }) => {
  const env = loadEnv(mode, '.', '');
  return {
    plugins: [react(), tailwindcss()],
    define: {
      'process.env.GEMINI_API_KEY': JSON.stringify(env.GEMINI_API_KEY),
    },
    resolve: {
      alias: { '@': path.resolve(__dirname, '.') },
    },
    server: {
      hmr: process.env.DISABLE_HMR !== 'true',
      proxy: {
        // MindCare+ Express API
        '/api': {
          target: 'http://localhost:3002',
          changeOrigin: true,
        },
        // MindBoost Symfony — all Symfony-specific route prefixes
        '/admin':        { target: 'http://localhost:8000', changeOrigin: true },
        '/front':        { target: 'http://localhost:8000', changeOrigin: true },
        '/back':         { target: 'http://localhost:8000', changeOrigin: true },
        '/login':        { target: 'http://localhost:8000', changeOrigin: true, bypass: symfonyBypass },
        '/logout':       { target: 'http://localhost:8000', changeOrigin: true },
        '/register':     { target: 'http://localhost:8000', changeOrigin: true, bypass: symfonyBypass },
        '/session':      { target: 'http://localhost:8000', changeOrigin: true },
        '/profile':      { target: 'http://localhost:8000', changeOrigin: true, bypass: symfonyBypass },
        '/tests':        { target: 'http://localhost:8000', changeOrigin: true },
        '/taches':       { target: 'http://localhost:8000', changeOrigin: true },
        '/posts':        { target: 'http://localhost:8000', changeOrigin: true },
        '/achievements': { target: 'http://localhost:8000', changeOrigin: true },
        '/statistiques': { target: 'http://localhost:8000', changeOrigin: true },
        // Symfony assets (CSS/JS bundles from Symfony's public/)
        '/bundles':      { target: 'http://localhost:8000', changeOrigin: true },
        '/build':        { target: 'http://localhost:8000', changeOrigin: true },
      },
    },
  };
});

// Only forward to Symfony if the request looks like a full-page Symfony route
// (has no extension, or is clearly a Symfony path), NOT a React SPA route.
function symfonyBypass(req: any) {
  // Let Vite/React handle these — they are React routes
  const reactRoutes = [
    '/dashboard', '/focus', '/journal', '/chat', '/insights',
    '/soundscapes', '/constellation', '/kernel', '/community',
    '/appointments', '/accounts',
  ];
  if (reactRoutes.some(r => req.url === r || req.url.startsWith(r + '?'))) {
    return req.url; // bypass proxy → React handles it
  }
  return null; // null = forward to Symfony
}
