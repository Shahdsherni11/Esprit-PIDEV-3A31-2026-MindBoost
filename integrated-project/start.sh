#!/bin/bash
# MindBoost × MindCare+ — Single URL Launcher
# Everything accessible at http://localhost:3002

echo "🧠 Starting MindBoost × MindCare+ integrated platform..."
echo ""

# Check if symfony CLI is available
if ! command -v symfony &> /dev/null; then
  echo "⚠  symfony CLI not found. Install it from https://symfony.com/download"
  echo "   Continuing without MindBoost (Symfony) — only MindCare+ will be available."
  SYMFONY_AVAILABLE=false
else
  SYMFONY_AVAILABLE=true
fi

# Start Symfony in background (port 8000 - internal only)
if [ "$SYMFONY_AVAILABLE" = true ]; then
  echo "▶  Starting Symfony (MindBoost) on port 8000..."
  cd mindboost-symfony && symfony serve --port=8000 --no-tls &
  SYMFONY_PID=$!
  cd ..
  sleep 2
  echo "✓  Symfony running (PID $SYMFONY_PID)"
fi

# Install Node deps if needed
if [ ! -d "node_modules" ]; then
  echo "▶  Installing Node dependencies..."
  npm install
fi

echo ""
echo "▶  Starting unified server on http://localhost:3002"
echo ""
echo "   ┌─────────────────────────────────────────────────┐"
echo "   │  🌐  http://localhost:3002           (all routes) │"
echo "   │                                                   │"
echo "   │  React (MindCare+)  → /dashboard, /chat, etc.   │"
echo "   │  Symfony (MindBoost)→ /admin, /front, /tests     │"
echo "   └─────────────────────────────────────────────────┘"
echo ""

# Cleanup on exit
trap "echo ''; echo 'Stopping servers...'; kill $SYMFONY_PID 2>/dev/null; exit" INT TERM

# Start Express+Vite (serves everything on :3002, proxies Symfony routes to :8000)
npm run dev
