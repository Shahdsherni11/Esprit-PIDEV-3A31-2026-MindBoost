import React from 'react';
import { BrowserRouter, Routes, Route, Navigate } from 'react-router-dom';
import { AuthProvider, useAuth } from './context/AuthContext';
import { Shell } from './components/layout/Shell';
import Login from './pages/Login';
import Dashboard from './pages/Dashboard';
import Journal from './pages/Journal';
import Chat from './pages/Chat';
import Insights from './pages/Insights';
import Community from './pages/Community';
import Soundscapes from './pages/Soundscapes';
import Constellation from './pages/Constellation';
import Focus from './pages/Focus';
import Kernel from './pages/Kernel';
import Appointments from './pages/Appointments';
import Clinic from './pages/Clinic';
import Admin from './pages/Admin';
import Accounts from './pages/Accounts';
import Profile from './pages/Profile';
import Tests from './pages/Tests';
import Taches from './pages/Taches';
import Achievements from './pages/Achievements';
import { Brain } from 'lucide-react';

function LoadingScreen() {
  return (
    <div className="main-bg flex flex-col items-center justify-center min-h-screen gap-4">
      <div style={{ width:64,height:64,borderRadius:18,background:'linear-gradient(135deg,#2F6BFF,#19B5FE)',display:'flex',alignItems:'center',justifyContent:'center',boxShadow:'0 20px 50px rgba(47,107,255,0.4)' }}>
        <Brain size={32} color="white" />
      </div>
      <div className="text-white text-xl font-black tracking-tight">MindBoost</div>
      <div className="loading-spinner mt-2" />
    </div>
  );
}

function PrivateRoute({ children, roles }: { children: React.ReactNode; roles?: string[] }) {
  const { user, profile, loading } = useAuth();
  if (loading) return <LoadingScreen />;
  if (!user) return <Navigate to="/login" replace />;
  const role = profile?.role || 'patient';
  if (roles && !roles.includes(role)) {
    return <Navigate to={role === 'admin' ? '/admin' : role === 'therapist' ? '/clinic' : '/dashboard'} replace />;
  }
  return <Shell>{children}</Shell>;
}

export default function App() {
  return (
    <BrowserRouter>
      <AuthProvider>
        <Routes>
          <Route path="/login" element={<Login />} />

          {/* Dashboard & analytics */}
          <Route path="/dashboard"      element={<PrivateRoute roles={['patient']}><Dashboard /></PrivateRoute>} />
          <Route path="/insights"       element={<PrivateRoute roles={['patient']}><Insights /></PrivateRoute>} />
          <Route path="/constellation"  element={<PrivateRoute roles={['patient']}><Constellation /></PrivateRoute>} />

          {/* Bien-être */}
          <Route path="/focus"          element={<PrivateRoute roles={['patient']}><Focus /></PrivateRoute>} />
          <Route path="/soundscapes"    element={<PrivateRoute roles={['patient']}><Soundscapes /></PrivateRoute>} />
          <Route path="/kernel"         element={<PrivateRoute roles={['patient']}><Kernel /></PrivateRoute>} />

          {/* IA & suivi */}
          <Route path="/chat"           element={<PrivateRoute><Chat /></PrivateRoute>} />
          <Route path="/journal"        element={<PrivateRoute roles={['patient','therapist']}><Journal /></PrivateRoute>} />
          <Route path="/appointments"   element={<PrivateRoute roles={['patient','therapist']}><Appointments /></PrivateRoute>} />

          {/* Communauté */}
          <Route path="/community"      element={<PrivateRoute roles={['patient','therapist']}><Community /></PrivateRoute>} />

          {/* Tests psychologiques */}
          <Route path="/tests"          element={<PrivateRoute roles={['patient']}><Tests initialView="list" /></PrivateRoute>} />
          <Route path="/tests/history"  element={<PrivateRoute roles={['patient']}><Tests initialView="history" /></PrivateRoute>} />
          <Route path="/tests/stats"    element={<PrivateRoute roles={['patient']}><Tests initialView="stats" /></PrivateRoute>} />

          {/* Productivité */}
          <Route path="/taches"         element={<PrivateRoute roles={['patient']}><Taches /></PrivateRoute>} />
          <Route path="/sous-taches"    element={<PrivateRoute roles={['patient']}><Taches /></PrivateRoute>} />
          <Route path="/achievements"   element={<PrivateRoute roles={['patient']}><Achievements /></PrivateRoute>} />

          {/* Clinicien */}
          <Route path="/clinic"         element={<PrivateRoute roles={['therapist']}><Clinic /></PrivateRoute>} />

          {/* Admin */}
          <Route path="/admin"          element={<PrivateRoute roles={['admin']}><Admin /></PrivateRoute>} />
          <Route path="/admin/*"        element={<PrivateRoute roles={['admin']}><Admin /></PrivateRoute>} />

          {/* Compte */}
          <Route path="/profile"        element={<PrivateRoute><Profile /></PrivateRoute>} />
          <Route path="/accounts"       element={<PrivateRoute><Accounts /></PrivateRoute>} />

          <Route path="/" element={<Navigate to="/dashboard" replace />} />
          <Route path="*" element={<Navigate to="/dashboard" replace />} />
        </Routes>
      </AuthProvider>
    </BrowserRouter>
  );
}
