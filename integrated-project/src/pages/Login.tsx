import React, { useState } from 'react';
import { useNavigate } from 'react-router-dom';
import { Mail, Lock, User, Loader2, Brain, ChevronRight, CheckCircle, AlertCircle, Eye, EyeOff } from 'lucide-react';
import { cn } from '../lib/utils';
import { motion, AnimatePresence } from 'motion/react';

const getErrorMessage = (code: string): string => {
  const errorMap: Record<string, string> = {
    'invalid-email': 'Adresse email invalide',
    'user-not-found': "Aucun compte trouvé avec cet email",
    'wrong-password': 'Mot de passe incorrect',
    'email-already-in-use': 'Un compte avec cet email existe déjà',
    'weak-password': 'Le mot de passe doit contenir au moins 6 caractères',
    'network-request-failed': 'Erreur réseau. Vérifiez votre connexion',
    'too-many-requests': 'Trop de tentatives. Veuillez patienter',
  };
  return errorMap[code] || 'Une erreur est survenue. Veuillez réessayer.';
};

export default function Login() {
  const navigate = useNavigate();
  const [isRegistering, setIsRegistering] = useState(false);
  const [error, setError] = useState<string | null>(null);
  const [loading, setLoading] = useState(false);
  const [showPassword, setShowPassword] = useState(false);
  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');
  const [displayName, setDisplayName] = useState('');
  const [emailValid, setEmailValid] = useState<boolean | null>(null);
  const [passwordValid, setPasswordValid] = useState<boolean | null>(null);

  const validateEmail = (v: string) => setEmailValid(v ? /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v) : null);
  const validatePassword = (v: string) => setPasswordValid(v ? v.length >= 6 : null);

  const handleSubmit = async (e: React.FormEvent) => {
    e.preventDefault();
    setError(null);
    if (!emailValid || !passwordValid) { setError('Veuillez corriger les erreurs avant de continuer.'); return; }
    setLoading(true);
    try {
      if (isRegistering) {
        const response = await fetch('/api/user/register', {
          method: 'POST', headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify({ email, password, displayName })
        });
        const data = await response.json();
        if (!data.success) { setError(data.error || "Échec de l'inscription"); setLoading(false); return; }
        localStorage.setItem('user', JSON.stringify(data.user));
        navigate('/dashboard');
      } else {
        const response = await fetch('/api/user/login', {
          method: 'POST', headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify({ email, password })
        });
        const data = await response.json();
        if (!data.success) { setError(getErrorMessage(data.code || 'unknown')); setLoading(false); return; }
        localStorage.setItem('user', JSON.stringify(data.user));
        navigate('/dashboard');
      }
    } catch (err) {
      setError('Erreur de connexion au serveur. Réessayez.');
      setLoading(false);
    }
  };

  return (
    <div className="min-h-screen main-bg flex items-center justify-center p-4 relative overflow-hidden">
      {/* Decorative orbs */}
      <div className="absolute inset-0 pointer-events-none">
        <div className="absolute top-0 right-0 w-[600px] h-[600px] rounded-full opacity-20" style={{ background: 'radial-gradient(circle, rgba(47,107,255,0.4) 0%, transparent 70%)', transform: 'translate(30%, -30%)' }} />
        <div className="absolute bottom-0 left-0 w-[500px] h-[500px] rounded-full opacity-15" style={{ background: 'radial-gradient(circle, rgba(25,181,254,0.4) 0%, transparent 70%)', transform: 'translate(-30%, 30%)' }} />
      </div>

      <div className="w-full max-w-md relative z-10">
        {/* Logo */}
        <motion.div initial={{ opacity: 0, y: -30 }} animate={{ opacity: 1, y: 0 }} className="text-center mb-10">
          <div className="inline-flex items-center justify-center w-20 h-20 rounded-2xl mb-5 brain-pulse"
            style={{ background: 'linear-gradient(135deg, #2F6BFF, #19B5FE)', boxShadow: '0 20px 50px rgba(47,107,255,0.4)' }}>
            <Brain size={40} className="text-white" />
          </div>
          <div className="text-4xl font-black text-white tracking-tight">Mind<span style={{ color: '#4D83FF' }}>Boost</span></div>
          <div className="text-sm font-medium mt-1" style={{ color: '#7E8DB1' }}>Plateforme intégrée MindCare+</div>
        </motion.div>

        {/* Card */}
        <motion.div initial={{ opacity: 0, y: 30 }} animate={{ opacity: 1, y: 0 }} transition={{ delay: 0.1 }}
          className="glass-panel p-8">
          {/* Toggle */}
          <div className="flex p-1 rounded-2xl mb-7" style={{ background: 'rgba(255,255,255,0.04)', border: '1px solid rgba(255,255,255,0.06)' }}>
            {['Connexion', 'Inscription'].map((label, i) => (
              <button key={label}
                onClick={() => { setIsRegistering(i === 1); setError(null); }}
                className="flex-1 py-2.5 rounded-xl text-sm font-bold transition-all"
                style={isRegistering === (i === 1) ? { background: 'linear-gradient(135deg,#2F6BFF,#4D83FF)', color: 'white', boxShadow: '0 8px 20px rgba(47,107,255,0.3)' } : { color: '#7E8DB1' }}>
                {label}
              </button>
            ))}
          </div>

          <AnimatePresence mode="wait">
            {error && (
              <motion.div key="error" initial={{ opacity: 0, y: -10 }} animate={{ opacity: 1, y: 0 }} exit={{ opacity: 0, y: -10 }}
                className="alert alert-danger flex items-center gap-2 mb-5">
                <AlertCircle size={16} />{error}
              </motion.div>
            )}
          </AnimatePresence>

          <form onSubmit={handleSubmit} className="space-y-4">
            {isRegistering && (
              <motion.div initial={{ opacity: 0, height: 0 }} animate={{ opacity: 1, height: 'auto' }} exit={{ opacity: 0, height: 0 }}>
                <label className="block text-xs font-bold mb-1.5" style={{ color: '#AAB6D3' }}>Nom complet</label>
                <div className="relative">
                  <User size={16} className="absolute left-3.5 top-1/2 -translate-y-1/2" style={{ color: '#7E8DB1' }} />
                  <input type="text" value={displayName} onChange={e => setDisplayName(e.target.value)}
                    placeholder="Votre nom" required={isRegistering}
                    className="form-control pl-10" />
                </div>
              </motion.div>
            )}

            <div>
              <label className="block text-xs font-bold mb-1.5" style={{ color: '#AAB6D3' }}>Adresse Email</label>
              <div className="relative">
                <Mail size={16} className="absolute left-3.5 top-1/2 -translate-y-1/2" style={{ color: '#7E8DB1' }} />
                <input type="email" value={email}
                  onChange={e => { setEmail(e.target.value); validateEmail(e.target.value); }}
                  placeholder="vous@exemple.com" required
                  className={cn('form-control pl-10 pr-10', emailValid === false && 'border-[#FF5A74]/50')}
                />
                {emailValid !== null && (
                  <div className="absolute right-3.5 top-1/2 -translate-y-1/2">
                    {emailValid ? <CheckCircle size={16} style={{ color: '#29CC7A' }} /> : <AlertCircle size={16} style={{ color: '#FF5A74' }} />}
                  </div>
                )}
              </div>
              {emailValid === false && <p className="text-xs mt-1" style={{ color: '#FF5A74' }}>Format email invalide</p>}
            </div>

            <div>
              <label className="block text-xs font-bold mb-1.5" style={{ color: '#AAB6D3' }}>Mot de passe</label>
              <div className="relative">
                <Lock size={16} className="absolute left-3.5 top-1/2 -translate-y-1/2" style={{ color: '#7E8DB1' }} />
                <input type={showPassword ? 'text' : 'password'} value={password}
                  onChange={e => { setPassword(e.target.value); validatePassword(e.target.value); }}
                  placeholder="••••••••" required
                  className={cn('form-control pl-10 pr-10', passwordValid === false && 'border-[#FF5A74]/50')}
                />
                <button type="button" onClick={() => setShowPassword(s => !s)} className="absolute right-3.5 top-1/2 -translate-y-1/2" style={{ color: '#7E8DB1' }}>
                  {showPassword ? <EyeOff size={16} /> : <Eye size={16} />}
                </button>
              </div>
              {passwordValid === false && <p className="text-xs mt-1" style={{ color: '#FF5A74' }}>Minimum 6 caractères</p>}
            </div>

            <button type="submit" disabled={loading} className="btn-primary w-full justify-center mt-2"
              style={{ opacity: loading ? 0.7 : 1, width: '100%' }}>
              {loading ? <Loader2 size={18} className="animate-spin" /> : <ChevronRight size={18} />}
              {loading ? 'Chargement...' : isRegistering ? "Créer mon compte" : 'Se connecter'}
            </button>
          </form>

          <p className="text-center text-xs mt-5" style={{ color: '#7E8DB1' }}>
            {isRegistering ? 'Déjà un compte ? ' : 'Pas encore de compte ? '}
            <button onClick={() => { setIsRegistering(!isRegistering); setError(null); }}
              className="font-bold hover:underline" style={{ color: '#4D83FF' }}>
              {isRegistering ? 'Connexion' : 'Inscription'}
            </button>
          </p>
        </motion.div>

        <p className="text-center text-xs mt-6" style={{ color: '#7E8DB1' }}>
          MindBoost × MindCare+ — Plateforme de bien-être mental
        </p>
      </div>
    </div>
  );
}
