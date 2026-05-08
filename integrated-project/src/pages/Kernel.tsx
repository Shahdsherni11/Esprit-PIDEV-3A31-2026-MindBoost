import React, { useState } from 'react';
import { Wind, Brain, Zap, Moon, Sun, RefreshCw } from 'lucide-react';
import { motion, AnimatePresence } from 'motion/react';

const PROGRAMS = [
  { id:'body-scan', icon:'🧘', label:'Body Scan',       duration:'10 min', color:'#A78BFA', desc:'Balayage corporel progressif pour relâcher les tensions.' },
  { id:'visualize', icon:'🌊', label:'Visualisation',   duration:'8 min',  color:'#19B5FE', desc:'Voyage guidé vers un lieu de sérénité intérieure.' },
  { id:'gratitude', icon:'❤️',  label:'Gratitude',       duration:'5 min',  color:'#F472B6', desc:'Cultiver la reconnaissance pour booster le bien-être.' },
  { id:'sleep',     icon:'🌙', label:'Endormissement',  duration:'15 min', color:'#4D83FF', desc:'Protocole de relaxation progressive pour le sommeil.' },
];

const AFFIRMATIONS = [
  "Je suis capable de surmonter les défis qui se présentent à moi.",
  "Chaque respiration m'ancre dans le moment présent.",
  "Je mérite la paix intérieure et le bien-être.",
  "Je progresse chaque jour vers la meilleure version de moi-même.",
  "Mes émotions sont valides et je les accueille avec bienveillance.",
];

export default function Kernel() {
  const [active, setActive] = useState<string | null>(null);
  const [affIdx, setAffIdx] = useState(0);
  const [breathPhase, setBreathPhase] = useState<'inhale'|'hold'|'exhale'>('inhale');
  const [running, setRunning] = useState(false);
  const breathRef = React.useRef<number | undefined>(undefined);

  const startBreath = () => {
    if (running) { clearInterval(breathRef.current); setRunning(false); return; }
    setRunning(true);
    let phase: 'inhale'|'hold'|'exhale' = 'inhale';
    const durations = { inhale: 4000, hold: 4000, exhale: 6000 };
    const cycle = () => {
      setBreathPhase(phase);
      breathRef.current = window.setTimeout(() => {
        phase = phase === 'inhale' ? 'hold' : phase === 'hold' ? 'exhale' : 'inhale';
        cycle();
      }, durations[phase]);
    };
    cycle();
  };

  React.useEffect(() => () => clearTimeout(breathRef.current), []);

  const phaseScale = { inhale: 1.35, hold: 1.35, exhale: 0.7 };
  const phaseDuration = { inhale: 4, hold: 4, exhale: 6 };
  const phaseLabel = { inhale: 'Inspirez...', hold: 'Retenez...', exhale: 'Expirez...' };

  return (
    <div>
      <div className="page-heading">
        <div className="flex items-center gap-3"><Wind size={28} style={{ color: '#A78BFA' }} /><h1>Noyau Neural</h1></div>
        <p>Méditation guidée, respiration et affirmations positives</p>
      </div>

      <div className="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
        {/* Breathing */}
        <div className="glass-panel p-6 flex flex-col items-center">
          <div className="flex items-center gap-2 mb-5 w-full">
            <Brain size={16} style={{ color: '#A78BFA' }} />
            <span className="font-black text-white text-sm">Cohérence Cardiaque</span>
            <span className="badge badge-primary ml-auto text-[10px]">4-4-6</span>
          </div>
          <div className="relative flex items-center justify-center" style={{ height: 180 }}>
            <motion.div
              animate={{ scale: running ? phaseScale[breathPhase] : 1 }}
              transition={{ duration: running ? phaseDuration[breathPhase] : 0.5, ease: 'easeInOut' }}
              className="w-28 h-28 rounded-full flex items-center justify-center"
              style={{ background: 'rgba(167,139,250,0.15)', border: '2px solid rgba(167,139,250,0.35)' }}>
              <div className="w-12 h-12 rounded-full"
                style={{ background: 'radial-gradient(circle, #A78BFA, #818CF8)', boxShadow: running ? '0 0 30px rgba(167,139,250,0.7)' : '0 0 10px rgba(167,139,250,0.3)' }} />
            </motion.div>
          </div>
          {running && <p className="text-sm font-bold mb-4" style={{ color: '#A78BFA' }}>{phaseLabel[breathPhase]}</p>}
          {!running && <p className="text-xs mb-4" style={{ color: '#7E8DB1' }}>Inspirez 4s — Retenez 4s — Expirez 6s</p>}
          <button onClick={startBreath} className="btn-primary" style={{ background: running ? 'rgba(255,255,255,0.08)' : 'linear-gradient(135deg,#A78BFA,#818CF8)', border: 'none' }}>
            {running ? <><RefreshCw size={15} />Arrêter</> : <><Wind size={15} />Commencer</>}
          </button>
        </div>

        {/* Affirmation */}
        <div className="glass-panel p-6 flex flex-col items-center justify-center text-center">
          <div className="flex items-center gap-2 mb-5 w-full">
            <Zap size={16} style={{ color: '#F7B84B' }} />
            <span className="font-black text-white text-sm">Affirmation du moment</span>
          </div>
          <AnimatePresence mode="wait">
            <motion.p key={affIdx} initial={{ opacity: 0, y: 10 }} animate={{ opacity: 1, y: 0 }} exit={{ opacity: 0, y: -10 }}
              className="text-lg font-bold text-white leading-relaxed mb-6" style={{ fontStyle: 'italic' }}>
              "{AFFIRMATIONS[affIdx]}"
            </motion.p>
          </AnimatePresence>
          <button onClick={() => setAffIdx(i => (i + 1) % AFFIRMATIONS.length)} className="btn-secondary flex items-center gap-2">
            <RefreshCw size={14} />Suivante
          </button>
        </div>
      </div>

      {/* Programs */}
      <div className="text-xs font-black uppercase tracking-widest mb-3" style={{ color: '#7E8DB1' }}>Programmes guidés</div>
      <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        {PROGRAMS.map((p, i) => (
          <motion.button key={p.id} initial={{ opacity: 0, y: 12 }} animate={{ opacity: 1, y: 0 }} transition={{ delay: i * 0.07 }}
            onClick={() => setActive(active === p.id ? null : p.id)}
            className="quick-card text-left"
            style={active === p.id ? { borderColor: `${p.color}40`, background: `${p.color}08` } : {}}>
            <div className="text-2xl">{p.icon}</div>
            <h5>{p.label}</h5>
            <p>{p.desc}</p>
            <span className="text-xs font-bold mt-1" style={{ color: p.color }}>{p.duration}</span>
          </motion.button>
        ))}
      </div>

      <AnimatePresence>
        {active && (
          <motion.div initial={{ opacity: 0, y: 10 }} animate={{ opacity: 1, y: 0 }} exit={{ opacity: 0 }}
            className="glass-card p-5 mt-4 flex items-center gap-4"
            style={{ borderColor: `${PROGRAMS.find(p => p.id === active)?.color}30` }}>
            <div className="text-3xl">{PROGRAMS.find(p => p.id === active)?.icon}</div>
            <div>
              <p className="font-bold text-white">{PROGRAMS.find(p => p.id === active)?.label}</p>
              <p className="text-sm" style={{ color: '#AAB6D3' }}>Session de {PROGRAMS.find(p => p.id === active)?.duration} — Fermez les yeux, installez-vous confortablement et suivez les instructions.</p>
            </div>
            <button onClick={() => setActive(null)} className="ml-auto btn-secondary py-2 px-3 text-xs">Fermer</button>
          </motion.div>
        )}
      </AnimatePresence>
    </div>
  );
}
