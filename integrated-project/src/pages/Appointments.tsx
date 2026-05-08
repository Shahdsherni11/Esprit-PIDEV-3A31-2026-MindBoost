import React, { useState } from 'react';
import { Calendar, Plus, Clock, User, CheckCircle, XCircle, AlertCircle } from 'lucide-react';
import { motion } from 'motion/react';

const SAMPLE = [
  { id:'1', therapist:'Dr. Sarah Mansour', date:'2026-05-12', time:'10:00', type:'Suivi mensuel', status:'confirmed' },
  { id:'2', therapist:'Dr. Karim Belhaj',  date:'2026-05-19', time:'14:30', type:'Consultation initiale', status:'pending' },
  { id:'3', therapist:'Dr. Sarah Mansour', date:'2026-04-28', time:'10:00', type:'Suivi mensuel', status:'completed' },
];

const STATUS = {
  confirmed: { label: 'Confirmé',  color: '#29CC7A', icon: CheckCircle },
  pending:   { label: 'En attente', color: '#F7B84B', icon: AlertCircle },
  completed: { label: 'Terminé',   color: '#7E8DB1', icon: CheckCircle },
  cancelled: { label: 'Annulé',   color: '#FF5A74', icon: XCircle },
};

export default function Appointments() {
  const [tab, setTab] = useState<'upcoming'|'past'>('upcoming');
  const now = new Date();
  const upcoming = SAMPLE.filter(a => new Date(a.date) >= now);
  const past     = SAMPLE.filter(a => new Date(a.date) <  now);
  const shown    = tab === 'upcoming' ? upcoming : past;

  return (
    <div>
      <div className="page-heading flex items-start justify-between">
        <div>
          <div className="flex items-center gap-3"><Calendar size={28} style={{ color: '#F472B6' }} /><h1>Rendez-vous</h1></div>
          <p>Gérez vos consultations thérapeutiques</p>
        </div>
        <button className="btn-primary"><Plus size={16} />Nouveau RDV</button>
      </div>

      <div className="flex gap-2 mb-6">
        {[{ id:'upcoming', label:`À venir (${upcoming.length})` }, { id:'past', label:`Passés (${past.length})` }].map(t => (
          <button key={t.id} onClick={() => setTab(t.id as any)}
            className={`px-4 py-2.5 rounded-xl text-sm font-bold transition-all ${tab === t.id ? 'btn-primary' : 'btn-secondary'}`}>
            {t.label}
          </button>
        ))}
      </div>

      {shown.length === 0 ? (
        <div className="glass-panel p-16 text-center">
          <Calendar size={48} className="mx-auto mb-4 opacity-30" />
          <p className="font-semibold text-white">Aucun rendez-vous {tab === 'upcoming' ? 'à venir' : 'passé'}</p>
          {tab === 'upcoming' && <button className="btn-primary mt-4"><Plus size={15} />Planifier un RDV</button>}
        </div>
      ) : (
        <div className="space-y-4">
          {shown.map((appt, i) => {
            const s = STATUS[appt.status as keyof typeof STATUS];
            return (
              <motion.div key={appt.id} initial={{ opacity:0, y:12 }} animate={{ opacity:1, y:0 }} transition={{ delay: i*0.05 }}
                className="glass-card p-5 flex items-center gap-4">
                <div className="w-12 h-12 rounded-xl flex flex-col items-center justify-center flex-shrink-0"
                  style={{ background: 'rgba(244,114,182,0.12)', border: '1px solid rgba(244,114,182,0.2)' }}>
                  <span className="text-lg font-black text-white leading-none">{new Date(appt.date).getDate()}</span>
                  <span className="text-[9px] font-bold uppercase" style={{ color: '#F472B6' }}>
                    {new Date(appt.date).toLocaleString('fr-FR', { month: 'short' })}
                  </span>
                </div>
                <div className="flex-1 min-w-0">
                  <h3 className="font-bold text-white">{appt.type}</h3>
                  <div className="flex items-center gap-3 mt-1">
                    <span className="flex items-center gap-1 text-xs" style={{ color: '#AAB6D3' }}><User size={11}/>{appt.therapist}</span>
                    <span className="flex items-center gap-1 text-xs" style={{ color: '#AAB6D3' }}><Clock size={11}/>{appt.time}</span>
                  </div>
                </div>
                <span className="badge flex-shrink-0"
                  style={{ background: `${s.color}20`, color: s.color, border: `1px solid ${s.color}40` }}>
                  {s.label}
                </span>
              </motion.div>
            );
          })}
        </div>
      )}
    </div>
  );
}
