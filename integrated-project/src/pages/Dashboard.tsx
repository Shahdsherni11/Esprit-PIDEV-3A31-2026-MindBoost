import React, { useState, useEffect } from 'react';
import { useAuth } from '../context/AuthContext';
import { Link, useNavigate } from 'react-router-dom';
import { 
  Brain, Activity, Target, MessageSquare, Book, Users, Calendar, 
  TrendingUp, Zap, Star, CheckCircle, Clock, ArrowRight, Sparkles
} from 'lucide-react';
import { motion } from 'motion/react';

const StatCard = ({ label, value, color, icon: Icon }: { label: string; value: string | number; color: string; icon: React.ElementType }) => (
  <div className="stat-card">
    <div className="flex items-start justify-between">
      <div>
        <div className="stat-number" style={{ color }}>{value}</div>
        <div className="stat-label">{label}</div>
      </div>
      <Icon size={28} style={{ color, opacity: 0.8 }} />
    </div>
  </div>
);

const QuickLink = ({ to, icon: Icon, title, desc, color }: { to: string; icon: React.ElementType; title: string; desc: string; color: string }) => (
  <Link to={to} className="quick-card">
    <Icon size={22} style={{ color }} />
    <h5>{title}</h5>
    <p>{desc}</p>
  </Link>
);

export default function Dashboard() {
  const { profile } = useAuth();
  const navigate = useNavigate();
  const [greeting, setGreeting] = useState('');

  useEffect(() => {
    const h = new Date().getHours();
    setGreeting(h < 12 ? 'Bonjour' : h < 18 ? 'Bon après-midi' : 'Bonsoir');
  }, []);

  const today = new Date().toLocaleDateString('fr-FR', { weekday: 'long', day: 'numeric', month: 'long' });

  return (
    <div>
      {/* Header */}
      <div className="page-heading">
        <div className="flex items-center gap-3 mb-1">
          <Brain size={28} className="brain-pulse" style={{ color: '#4D83FF' }} />
          <h1>{greeting}, {profile?.displayName || 'Utilisateur'} !</h1>
        </div>
        <p className="capitalize">{today} — Votre espace de bien-être mental est prêt.</p>
      </div>

      {/* Stats */}
      <div className="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
        <motion.div initial={{ opacity: 0, y: 20 }} animate={{ opacity: 1, y: 0 }} transition={{ delay: 0.05 }}>
          <StatCard label="Sessions Focus" value={12} color="#4D83FF" icon={Target} />
        </motion.div>
        <motion.div initial={{ opacity: 0, y: 20 }} animate={{ opacity: 1, y: 0 }} transition={{ delay: 0.10 }}>
          <StatCard label="Entrées Journal" value={7} color="#19B5FE" icon={Book} />
        </motion.div>
        <motion.div initial={{ opacity: 0, y: 20 }} animate={{ opacity: 1, y: 0 }} transition={{ delay: 0.15 }}>
          <StatCard label="Score Bien-être" value="84%" color="#29CC7A" icon={Activity} />
        </motion.div>
        <motion.div initial={{ opacity: 0, y: 20 }} animate={{ opacity: 1, y: 0 }} transition={{ delay: 0.20 }}>
          <StatCard label="Série active" value="5j" color="#F7B84B" icon={Star} />
        </motion.div>
      </div>

      {/* Progress */}
      <motion.div initial={{ opacity: 0, y: 20 }} animate={{ opacity: 1, y: 0 }} transition={{ delay: 0.25 }} className="glass-panel p-6 mb-8">
        <div className="flex items-center justify-between mb-4">
          <div className="flex items-center gap-2">
            <TrendingUp size={18} style={{ color: '#4D83FF' }} />
            <span className="font-bold text-white">Progression globale</span>
          </div>
          <span className="badge badge-primary">84%</span>
        </div>
        <div className="progress-bar-track mb-2">
          <div className="progress-bar-fill" style={{ width: '84%' }} />
        </div>
        <p className="text-sm" style={{ color: '#7E8DB1' }}>Vous progressez régulièrement — continuez comme ça !</p>
      </motion.div>

      {/* Quick Access */}
      <div className="mb-3 flex items-center gap-2">
        <Zap size={16} style={{ color: '#F7B84B' }} />
        <span className="text-sm font-bold uppercase tracking-widest" style={{ color: '#7E8DB1' }}>Accès rapide</span>
      </div>
      <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-8">
        <motion.div initial={{ opacity: 0, y: 20 }} animate={{ opacity: 1, y: 0 }} transition={{ delay: 0.3 }}>
          <QuickLink to="/focus"   icon={Target}        title="Focus Lab"       desc="Lancer une session de concentration guidée" color="#4D83FF" />
        </motion.div>
        <motion.div initial={{ opacity: 0, y: 20 }} animate={{ opacity: 1, y: 0 }} transition={{ delay: 0.35 }}>
          <QuickLink to="/chat"    icon={MessageSquare} title="Coach IA"         desc="Parlez à votre assistant thérapeutique IA" color="#19B5FE" />
        </motion.div>
        <motion.div initial={{ opacity: 0, y: 20 }} animate={{ opacity: 1, y: 0 }} transition={{ delay: 0.40 }}>
          <QuickLink to="/journal" icon={Book}          title="Journal Mental"   desc="Écrire dans votre journal quotidien" color="#00D1C7" />
        </motion.div>
        <motion.div initial={{ opacity: 0, y: 20 }} animate={{ opacity: 1, y: 0 }} transition={{ delay: 0.45 }}>
          <QuickLink to="/insights" icon={Activity}     title="Bio Tendances"    desc="Analyser vos données de bien-être" color="#29CC7A" />
        </motion.div>
        <motion.div initial={{ opacity: 0, y: 20 }} animate={{ opacity: 1, y: 0 }} transition={{ delay: 0.50 }}>
          <QuickLink to="/community" icon={Users}       title="Communauté"       desc="Rejoindre la discussion communautaire" color="#F7B84B" />
        </motion.div>
        <motion.div initial={{ opacity: 0, y: 20 }} animate={{ opacity: 1, y: 0 }} transition={{ delay: 0.55 }}>
          <QuickLink to="/appointments" icon={Calendar} title="Rendez-vous"      desc="Gérer vos consultations planifiées" color="#F472B6" />
        </motion.div>
      </div>

      {/* AI Tip */}
      <motion.div initial={{ opacity: 0, y: 20 }} animate={{ opacity: 1, y: 0 }} transition={{ delay: 0.6 }}>
        <div className="glass-card p-6 flex items-start gap-4 cursor-pointer" onClick={() => navigate('/chat')}
          style={{ background: 'rgba(47,107,255,0.05)', borderColor: 'rgba(47,107,255,0.15)' }}>
          <div className="w-10 h-10 rounded-xl flex items-center justify-center flex-shrink-0"
            style={{ background: 'linear-gradient(135deg, #2F6BFF, #19B5FE)' }}>
            <Sparkles size={18} className="text-white" />
          </div>
          <div className="flex-1 min-w-0">
            <div className="text-[10px] font-black uppercase tracking-widest mb-1" style={{ color: '#4D83FF' }}>Conseil IA du jour</div>
            <p className="text-sm" style={{ color: '#AAB6D3' }}>
              La cohérence de vos sessions de pleine conscience s'améliore. 
              Envisagez une session de Focus Lab de 15 minutes avant votre travail de l'après-midi.
            </p>
          </div>
          <ArrowRight size={16} style={{ color: '#7E8DB1' }} className="flex-shrink-0 mt-1" />
        </div>
      </motion.div>
    </div>
  );
}
