import React, { useState, useEffect } from 'react';
import { FlaskConical, Play, BarChart2, Clock, CheckCircle, ChevronRight, Star } from 'lucide-react';
import { motion } from 'motion/react';

type View = 'list' | 'taking' | 'result' | 'history' | 'stats';

const TESTS = [
  { id: 'phq9',  title: 'PHQ-9', subtitle: 'Dépression', questions: 9,  duration: '5 min',  color: '#4D83FF', desc: 'Évalue les symptômes dépressifs sur les 2 dernières semaines.' },
  { id: 'gad7',  title: 'GAD-7', subtitle: 'Anxiété',    questions: 7,  duration: '4 min',  color: '#19B5FE', desc: "Mesure l'anxiété généralisée et l'inquiétude excessive." },
  { id: 'dass21',title: 'DASS-21',subtitle: 'Stress',    questions: 21, duration: '8 min',  color: '#F7B84B', desc: 'Évalue la dépression, l\'anxiété et le stress simultanément.' },
  { id: 'mbi',   title: 'MBI',   subtitle: 'Burn-out',   questions: 22, duration: '10 min', color: '#F472B6', desc: 'Inventaire de Maslach pour mesurer l\'épuisement professionnel.' },
  { id: 'psqi',  title: 'PSQI',  subtitle: 'Sommeil',    questions: 19, duration: '7 min',  color: '#A78BFA', desc: 'Indice de qualité du sommeil de Pittsburgh.' },
];

const SAMPLE_Q = [
  { q: 'Peu d\'intérêt ou de plaisir à faire les choses', opts: ['Jamais','Plusieurs jours','Plus de la moitié du temps','Presque tous les jours'] },
  { q: 'Se sentir déprimé(e), triste ou sans espoir',      opts: ['Jamais','Plusieurs jours','Plus de la moitié du temps','Presque tous les jours'] },
  { q: 'Difficultés à s\'endormir ou à rester endormi(e)', opts: ['Jamais','Plusieurs jours','Plus de la moitié du temps','Presque tous les jours'] },
];

const HISTORY = [
  { id:'h1', test:'PHQ-9', date:'2026-05-01', score:6,  level:'Léger',  color:'#F7B84B' },
  { id:'h2', test:'GAD-7', date:'2026-04-18', score:4,  level:'Minimal', color:'#29CC7A' },
  { id:'h3', test:'PHQ-9', date:'2026-04-02', score:10, level:'Modéré', color:'#FF8C42' },
];

export default function Tests({ initialView = 'list' }: { initialView?: View }) {
  const [view, setView] = useState<View>(initialView);
  const [selected, setSelected] = useState(TESTS[0]);
  const [answers, setAnswers] = useState<Record<number, number>>({});
  const [qIdx, setQIdx] = useState(0);
  const [score, setScore] = useState<number | null>(null);

  useEffect(() => { setView(initialView); }, [initialView]);

  const startTest = (t: typeof TESTS[0]) => { setSelected(t); setAnswers({}); setQIdx(0); setScore(null); setView('taking'); };

  const answer = (val: number) => {
    const next = { ...answers, [qIdx]: val };
    setAnswers(next);
    if (qIdx < SAMPLE_Q.length - 1) { setQIdx(q => q + 1); }
    else {
      const total = Object.values(next).reduce((a, b) => a + b, 0);
      setScore(total);
      setView('result');
    }
  };

  const scoreLevel = (s: number) => s <= 4 ? { label: 'Minimal', color: '#29CC7A' } : s <= 9 ? { label: 'Léger', color: '#F7B84B' } : s <= 14 ? { label: 'Modéré', color: '#FF8C42' } : { label: 'Sévère', color: '#FF5A74' };

  if (view === 'history') return (
    <div>
      <div className="page-heading flex justify-between items-start">
        <div><div className="flex items-center gap-3"><BarChart2 size={28} style={{ color: '#19B5FE' }} /><h1>Mes Résultats</h1></div><p>Historique de vos tests psychologiques</p></div>
        <button onClick={() => setView('list')} className="btn-secondary text-sm py-2">← Retour</button>
      </div>
      <div className="space-y-3">
        {HISTORY.map((h, i) => (
          <motion.div key={h.id} initial={{ opacity: 0, y: 10 }} animate={{ opacity: 1, y: 0 }} transition={{ delay: i * 0.06 }}
            className="glass-card p-5 flex items-center gap-4">
            <div className="w-12 h-12 rounded-xl flex items-center justify-center font-black text-white flex-shrink-0"
              style={{ background: `${h.color}25`, border: `1px solid ${h.color}40`, color: h.color, fontSize: '1.1rem' }}>{h.score}</div>
            <div className="flex-1"><div className="font-bold text-white">{h.test}</div>
              <div className="text-xs mt-0.5" style={{ color: '#7E8DB1' }}>{new Date(h.date).toLocaleDateString('fr-FR', { day: 'numeric', month: 'long', year: 'numeric' })}</div>
            </div>
            <span className="badge" style={{ background: `${h.color}20`, color: h.color, border: `1px solid ${h.color}40` }}>{h.level}</span>
          </motion.div>
        ))}
      </div>
    </div>
  );

  if (view === 'stats') return (
    <div>
      <div className="page-heading flex justify-between items-start">
        <div><div className="flex items-center gap-3"><Star size={28} style={{ color: '#F7B84B' }} /><h1>Statistiques</h1></div><p>Évolution de vos scores dans le temps</p></div>
        <button onClick={() => setView('list')} className="btn-secondary text-sm py-2">← Retour</button>
      </div>
      <div className="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
        {[{ label: 'Tests complétés', v: HISTORY.length, c: '#4D83FF' }, { label: 'Score moyen', v: Math.round(HISTORY.reduce((a,h)=>a+h.score,0)/HISTORY.length), c: '#29CC7A' }, { label: 'Dernier test', v: 'PHQ-9', c: '#19B5FE' }].map(s => (
          <div key={s.label} className="stat-card"><div className="stat-number" style={{ color: s.c }}>{s.v}</div><div className="stat-label">{s.label}</div></div>
        ))}
      </div>
      <div className="glass-panel p-6">
        <div className="font-bold text-white mb-4">Évolution PHQ-9</div>
        <div className="flex items-end gap-4 h-32">
          {HISTORY.filter(h => h.test === 'PHQ-9').map(h => (
            <div key={h.id} className="flex flex-col items-center gap-1 flex-1">
              <div className="w-full rounded-t-lg transition-all" style={{ height: `${(h.score/21)*100}%`, background: `linear-gradient(180deg, ${h.color}, ${h.color}70)`, minHeight: 8 }} />
              <span className="text-[10px]" style={{ color: '#7E8DB1' }}>{new Date(h.date).toLocaleDateString('fr-FR',{month:'short',day:'numeric'})}</span>
            </div>
          ))}
        </div>
      </div>
    </div>
  );

  if (view === 'taking') return (
    <div>
      <div className="page-heading flex justify-between items-start">
        <div><div className="flex items-center gap-3"><FlaskConical size={28} style={{ color: selected.color }} /><h1>{selected.title}</h1></div><p>{selected.subtitle} · Question {qIdx + 1} / {SAMPLE_Q.length}</p></div>
        <button onClick={() => setView('list')} className="btn-secondary text-sm py-2">Annuler</button>
      </div>
      <div className="progress-bar-track mb-6"><div className="progress-bar-fill" style={{ width: `${((qIdx)/SAMPLE_Q.length)*100}%`, background: `linear-gradient(90deg, ${selected.color}, ${selected.color}aa)` }} /></div>
      <motion.div key={qIdx} initial={{ opacity: 0, x: 20 }} animate={{ opacity: 1, x: 0 }} className="glass-panel p-8 max-w-2xl mx-auto">
        <p className="text-lg font-bold text-white mb-6">{SAMPLE_Q[qIdx].q}</p>
        <div className="space-y-3">
          {SAMPLE_Q[qIdx].opts.map((opt, i) => (
            <button key={opt} onClick={() => answer(i)}
              className="w-full text-left p-4 rounded-xl font-semibold transition-all"
              style={{ background: 'rgba(255,255,255,0.04)', border: '1px solid rgba(255,255,255,0.08)', color: '#AAB6D3' }}
              onMouseEnter={e => { e.currentTarget.style.background = `${selected.color}15`; e.currentTarget.style.borderColor = `${selected.color}40`; e.currentTarget.style.color = 'white'; }}
              onMouseLeave={e => { e.currentTarget.style.background = 'rgba(255,255,255,0.04)'; e.currentTarget.style.borderColor = 'rgba(255,255,255,0.08)'; e.currentTarget.style.color = '#AAB6D3'; }}>
              <span className="inline-flex w-6 h-6 rounded-full items-center justify-center text-xs font-black mr-3"
                style={{ background: `${selected.color}20`, color: selected.color }}>{i}</span>
              {opt}
            </button>
          ))}
        </div>
      </motion.div>
    </div>
  );

  if (view === 'result' && score !== null) {
    const lvl = scoreLevel(score);
    return (
      <div>
        <div className="page-heading"><h1>Résultat du test</h1><p>{selected.title} — {selected.subtitle}</p></div>
        <div className="glass-panel p-10 max-w-lg mx-auto text-center">
          <CheckCircle size={52} className="mx-auto mb-4" style={{ color: lvl.color }} />
          <div className="text-6xl font-black mb-2" style={{ color: lvl.color }}>{score}</div>
          <div className="text-xl font-bold text-white mb-2">{lvl.label}</div>
          <p className="text-sm mb-6" style={{ color: '#AAB6D3' }}>Résultat basé sur {Object.keys(answers).length} réponses.</p>
          <div className="progress-bar-track mb-6"><div className="progress-bar-fill" style={{ width: `${(score/21)*100}%`, background: `linear-gradient(90deg, ${lvl.color}, ${lvl.color}aa)` }} /></div>
          <div className="flex gap-3 justify-center">
            <button onClick={() => setView('list')} className="btn-secondary">Retour aux tests</button>
            <button onClick={() => setView('history')} className="btn-primary">Voir l'historique</button>
          </div>
        </div>
      </div>
    );
  }

  return (
    <div>
      <div className="page-heading">
        <div className="flex items-center gap-3"><FlaskConical size={28} style={{ color: '#F7B84B' }} /><h1>Tests Psychologiques</h1></div>
        <p>Évaluations cliniques validées scientifiquement</p>
      </div>
      <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        {TESTS.map((t, i) => (
          <motion.div key={t.id} initial={{ opacity: 0, y: 14 }} animate={{ opacity: 1, y: 0 }} transition={{ delay: i * 0.07 }}
            className="glass-card p-5 cursor-pointer" onClick={() => startTest(t)}>
            <div className="flex items-center gap-3 mb-3">
              <div className="w-11 h-11 rounded-xl flex items-center justify-center font-black text-white"
                style={{ background: `${t.color}25`, border: `1px solid ${t.color}40`, color: t.color }}>{t.title}</div>
              <div><div className="font-bold text-white">{t.subtitle}</div>
                <div className="flex items-center gap-2 text-xs mt-0.5" style={{ color: '#7E8DB1' }}>
                  <Clock size={10} />{t.duration} · {t.questions} questions
                </div>
              </div>
            </div>
            <p className="text-xs mb-4 leading-relaxed" style={{ color: '#AAB6D3' }}>{t.desc}</p>
            <button className="flex items-center gap-2 text-sm font-bold" style={{ color: t.color }}>
              <Play size={14} />Commencer <ChevronRight size={13} />
            </button>
          </motion.div>
        ))}
      </div>
    </div>
  );
}
