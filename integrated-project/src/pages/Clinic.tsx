import React, { useState } from 'react';
import { Stethoscope, User, Calendar, FileText, MessageSquare, TrendingUp, Clock } from 'lucide-react';
import { motion } from 'motion/react';
import { useNavigate } from 'react-router-dom';

const PATIENTS = [
  { id:'p1', name:'Alice Martin',  lastSession:'2026-05-02', nextSession:'2026-05-15', score:72, trend:'up',   notes:'Progrès notables sur la gestion du stress.' },
  { id:'p2', name:'Bob Dupont',    lastSession:'2026-04-28', nextSession:'2026-05-12', score:55, trend:'down', notes:'Suivi de l\'anxiété, exercices de respiration recommandés.' },
  { id:'p3', name:'Claire Benali', lastSession:'2026-05-05', nextSession:'2026-05-19', score:81, trend:'up',   notes:'Excellente adhérence au programme.' },
];

export default function Clinic() {
  const navigate = useNavigate();
  const [selected, setSelected] = useState(PATIENTS[0]);

  return (
    <div>
      <div className="page-heading">
        <div className="flex items-center gap-3"><Stethoscope size={28} style={{ color: '#A78BFA' }} /><h1>Espace Clinicien</h1></div>
        <p>Suivi de vos {PATIENTS.length} patients actifs</p>
      </div>

      <div className="grid grid-cols-1 lg:grid-cols-3 gap-6">
        {/* Patient list */}
        <div className="space-y-3">
          <div className="text-xs font-black uppercase tracking-widest mb-3" style={{ color: '#7E8DB1' }}>Patients</div>
          {PATIENTS.map((p, i) => (
            <motion.button key={p.id} initial={{ opacity: 0, x: -10 }} animate={{ opacity: 1, x: 0 }} transition={{ delay: i * 0.06 }}
              onClick={() => setSelected(p)} className="glass-card p-4 w-full text-left transition-all"
              style={selected.id === p.id ? { borderColor: '#A78BFA40', background: 'rgba(167,139,250,0.06)' } : {}}>
              <div className="flex items-center gap-3">
                <div className="w-10 h-10 rounded-xl flex items-center justify-center font-bold text-white"
                  style={{ background: 'linear-gradient(135deg,#A78BFA,#818CF8)' }}>
                  {p.name[0]}
                </div>
                <div className="flex-1 min-w-0">
                  <div className="font-bold text-white text-sm truncate">{p.name}</div>
                  <div className="flex items-center gap-1 text-xs mt-0.5" style={{ color: '#7E8DB1' }}>
                    <Clock size={9} />Prochain : {new Date(p.nextSession).toLocaleDateString('fr-FR', { day: 'numeric', month: 'short' })}
                  </div>
                </div>
                <div className="text-right">
                  <div className="font-black text-sm" style={{ color: p.score >= 70 ? '#29CC7A' : p.score >= 50 ? '#F7B84B' : '#FF5A74' }}>{p.score}</div>
                  <div className="text-xs" style={{ color: p.trend === 'up' ? '#29CC7A' : '#FF5A74' }}>{p.trend === 'up' ? '↑' : '↓'}</div>
                </div>
              </div>
            </motion.button>
          ))}
        </div>

        {/* Patient detail */}
        <div className="lg:col-span-2 space-y-4">
          <div className="glass-panel p-6">
            <div className="flex items-center gap-4 mb-5">
              <div className="w-14 h-14 rounded-2xl flex items-center justify-center font-black text-xl text-white"
                style={{ background: 'linear-gradient(135deg,#A78BFA,#818CF8)', boxShadow: '0 12px 24px rgba(167,139,250,0.3)' }}>
                {selected.name[0]}
              </div>
              <div>
                <h2 className="text-xl font-black text-white">{selected.name}</h2>
                <p className="text-sm" style={{ color: '#AAB6D3' }}>Patient depuis 2026</p>
              </div>
              <div className="ml-auto flex gap-2">
                <button onClick={() => navigate('/appointments')} className="btn-secondary py-2 px-3 text-xs flex items-center gap-1">
                  <Calendar size={13} />Planifier
                </button>
                <button onClick={() => navigate('/chat')} className="btn-primary py-2 px-3 text-xs flex items-center gap-1">
                  <MessageSquare size={13} />Message
                </button>
              </div>
            </div>

            <div className="grid grid-cols-3 gap-4 mb-5">
              {[
                { label: 'Score bien-être', value: selected.score, color: selected.score >= 70 ? '#29CC7A' : '#F7B84B' },
                { label: 'Dernière séance', value: new Date(selected.lastSession).toLocaleDateString('fr-FR', { day: 'numeric', month: 'short' }), color: '#4D83FF' },
                { label: 'Prochaine séance', value: new Date(selected.nextSession).toLocaleDateString('fr-FR', { day: 'numeric', month: 'short' }), color: '#A78BFA' },
              ].map(s => (
                <div key={s.label} className="glass-card p-4 text-center">
                  <div className="text-2xl font-black" style={{ color: s.color }}>{s.value}</div>
                  <div className="text-xs mt-1" style={{ color: '#7E8DB1' }}>{s.label}</div>
                </div>
              ))}
            </div>

            <div className="mb-4">
              <div className="flex justify-between text-xs font-bold mb-2 text-white">
                <span>Évolution score</span>
                <span style={{ color: selected.trend === 'up' ? '#29CC7A' : '#FF5A74' }}>
                  {selected.trend === 'up' ? '↑ En progrès' : '↓ À surveiller'}
                </span>
              </div>
              <div className="progress-bar-track">
                <div className="progress-bar-fill" style={{ width: `${selected.score}%`, background: `linear-gradient(90deg, ${selected.score >= 70 ? '#29CC7A' : '#F7B84B'}, ${selected.score >= 70 ? '#00D1C7' : '#FF8C42'})` }} />
              </div>
            </div>

            <div className="glass-card p-4" style={{ borderColor: 'rgba(167,139,250,0.15)' }}>
              <div className="flex items-center gap-2 mb-2"><FileText size={14} style={{ color: '#A78BFA' }} />
                <span className="text-xs font-black uppercase tracking-widest" style={{ color: '#A78BFA' }}>Notes clinicien</span>
              </div>
              <p className="text-sm" style={{ color: '#AAB6D3' }}>{selected.notes}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
}
