import React from 'react';
import { Trophy, Lock, Star, Zap, Brain, Target, Book, Users } from 'lucide-react';
import { motion } from 'motion/react';

const ACHIEVEMENTS = [
  { id:'a1', icon: Brain,  title: 'Premier Test',      desc: 'Compléter votre premier test psychologique', earned: true,  date: '2026-04-10', color: '#4D83FF', xp: 50 },
  { id:'a2', icon: Target, title: 'Focalisé',           desc: '5 sessions Focus Lab complétées',            earned: true,  date: '2026-04-22', color: '#19B5FE', xp: 100 },
  { id:'a3', icon: Book,   title: 'Journaliste',        desc: '7 entrées de journal en une semaine',        earned: true,  date: '2026-05-01', color: '#00D1C7', xp: 150 },
  { id:'a4', icon: Zap,    title: 'Série de feu',       desc: 'Connexion 7 jours consécutifs',              earned: false, date: '',            color: '#F7B84B', xp: 200 },
  { id:'a5', icon: Users,  title: 'Communautaire',      desc: 'Poster 3 fois dans la communauté',          earned: false, date: '',            color: '#F472B6', xp: 75  },
  { id:'a6', icon: Star,   title: 'Score Parfait',      desc: 'Obtenir 100% sur un test',                  earned: false, date: '',            color: '#A78BFA', xp: 300 },
  { id:'a7', icon: Brain,  title: 'Expert Mental',      desc: 'Compléter tous les types de tests',         earned: false, date: '',            color: '#FF5A74', xp: 500 },
  { id:'a8', icon: Target, title: 'Maître du Focus',    desc: '50 sessions Focus Lab',                     earned: false, date: '',            color: '#29CC7A', xp: 400 },
];

export default function Achievements() {
  const earned = ACHIEVEMENTS.filter(a => a.earned);
  const totalXP = earned.reduce((s, a) => s + a.xp, 0);

  return (
    <div>
      <div className="page-heading">
        <div className="flex items-center gap-3"><Trophy size={28} style={{ color: '#F7B84B' }} /><h1>Achievements</h1></div>
        <p>{earned.length}/{ACHIEVEMENTS.length} débloqués · {totalXP} XP total</p>
      </div>

      {/* XP bar */}
      <div className="glass-panel p-5 mb-6 flex items-center gap-5">
        <div className="w-14 h-14 rounded-2xl flex items-center justify-center"
          style={{ background: 'linear-gradient(135deg, #F7B84B, #FF8C42)', boxShadow: '0 10px 24px rgba(247,184,75,0.35)' }}>
          <Star size={26} className="text-white" />
        </div>
        <div className="flex-1">
          <div className="flex justify-between text-sm font-bold text-white mb-2">
            <span>Niveau 3 — Explorateur Mental</span>
            <span style={{ color: '#F7B84B' }}>{totalXP} / 1000 XP</span>
          </div>
          <div className="progress-bar-track">
            <div className="progress-bar-fill" style={{ width: `${(totalXP/1000)*100}%`, background: 'linear-gradient(90deg, #F7B84B, #FF8C42)' }} />
          </div>
        </div>
      </div>

      {/* Grid */}
      <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        {ACHIEVEMENTS.map((a, i) => (
          <motion.div key={a.id} initial={{ opacity: 0, y: 14 }} animate={{ opacity: 1, y: 0 }} transition={{ delay: i * 0.05 }}
            className="glass-card p-5 text-center flex flex-col items-center gap-3"
            style={a.earned ? { borderColor: `${a.color}30`, background: `${a.color}08` } : { opacity: 0.55, filter: 'grayscale(0.6)' }}>
            <div className="w-14 h-14 rounded-2xl flex items-center justify-center relative"
              style={{ background: a.earned ? `${a.color}25` : 'rgba(255,255,255,0.05)', border: `1px solid ${a.earned ? a.color + '40' : 'rgba(255,255,255,0.08)'}` }}>
              {a.earned ? <a.icon size={26} style={{ color: a.color }} /> : <Lock size={22} style={{ color: '#7E8DB1' }} />}
            </div>
            <div>
              <div className="font-bold text-sm text-white">{a.title}</div>
              <div className="text-[11px] mt-1 leading-tight" style={{ color: '#AAB6D3' }}>{a.desc}</div>
            </div>
            <span className="badge text-[10px] py-0.5"
              style={{ background: a.earned ? `${a.color}20` : 'rgba(255,255,255,0.05)', color: a.earned ? a.color : '#7E8DB1', border: `1px solid ${a.earned ? a.color + '30' : 'rgba(255,255,255,0.06)'}` }}>
              +{a.xp} XP
            </span>
            {a.earned && a.date && (
              <div className="text-[10px]" style={{ color: '#7E8DB1' }}>
                {new Date(a.date).toLocaleDateString('fr-FR', { day: 'numeric', month: 'short' })}
              </div>
            )}
          </motion.div>
        ))}
      </div>
    </div>
  );
}
