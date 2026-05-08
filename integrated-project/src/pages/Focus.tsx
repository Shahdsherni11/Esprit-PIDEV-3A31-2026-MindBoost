import React, { useState, useEffect, useRef } from 'react';
import { Play, Pause, RotateCcw, Target, Wind, Timer } from 'lucide-react';
import { motion, AnimatePresence } from 'motion/react';

const SESSIONS = [
  { id: 'pomodoro', label: 'Pomodoro', duration: 25*60, color: '#2F6BFF', icon: '🍅' },
  { id: 'deep', label: 'Deep Work', duration: 50*60, color: '#19B5FE', icon: '🎯' },
  { id: 'short', label: 'Pause Courte', duration: 5*60, color: '#29CC7A', icon: '☕' },
  { id: 'breath', label: 'Respiration', duration: 10*60, color: '#F472B6', icon: '🌬️' },
];

const BREATH_PHASES = [
  { label: 'Inspirez', duration: 4, scale: 1.35 },
  { label: 'Retenez', duration: 4, scale: 1.35 },
  { label: 'Expirez', duration: 6, scale: 0.75 },
];

export default function Focus() {
  const [selected, setSelected] = useState(SESSIONS[0]);
  const [timeLeft, setTimeLeft] = useState(SESSIONS[0].duration);
  const [running, setRunning] = useState(false);
  const [completed, setCompleted] = useState(0);
  const [breathPhase, setBreathPhase] = useState(0);
  const [breathProgress, setBreathProgress] = useState(0);
  const intervalRef = useRef<number | undefined>(undefined);
  const breathRef = useRef<number | undefined>(undefined);

  useEffect(() => {
    setTimeLeft(selected.duration);
    setRunning(false);
    clearInterval(intervalRef.current);
  }, [selected]);

  useEffect(() => {
    if (running) {
      intervalRef.current = window.setInterval(() => {
        setTimeLeft(t => {
          if (t <= 1) { clearInterval(intervalRef.current); setRunning(false); setCompleted(c => c+1); return 0; }
          return t - 1;
        });
      }, 1000);
    } else clearInterval(intervalRef.current);
    return () => clearInterval(intervalRef.current);
  }, [running]);

  useEffect(() => {
    if (running && selected.id === 'breath') {
      const phase = BREATH_PHASES[breathPhase];
      let elapsed = 0;
      breathRef.current = window.setInterval(() => {
        elapsed += 0.1;
        setBreathProgress(elapsed / phase.duration);
        if (elapsed >= phase.duration) {
          clearInterval(breathRef.current);
          setBreathPhase(p => (p + 1) % BREATH_PHASES.length);
          setBreathProgress(0);
        }
      }, 100);
    } else clearInterval(breathRef.current);
    return () => clearInterval(breathRef.current);
  }, [running, breathPhase, selected.id]);

  const mins = String(Math.floor(timeLeft / 60)).padStart(2, '0');
  const secs = String(timeLeft % 60).padStart(2, '0');
  const progress = 1 - timeLeft / selected.duration;

  return (
    <div>
      <div className="page-heading">
        <div className="flex items-center gap-3"><Target size={28} style={{ color: '#4D83FF' }} /><h1>Focus Lab</h1></div>
        <p>Sessions de concentration & respiration guidée</p>
      </div>

      {/* Session picker */}
      <div className="grid grid-cols-2 lg:grid-cols-4 gap-3 mb-8">
        {SESSIONS.map(s => (
          <button key={s.id} onClick={() => setSelected(s)}
            className="glass-card p-4 text-left transition-all"
            style={selected.id === s.id ? { borderColor: s.color, background: `rgba(${s.color},0.08)`, border: `1px solid ${s.color}40` } : {}}>
            <div className="text-2xl mb-2">{s.icon}</div>
            <div className="font-bold text-white text-sm">{s.label}</div>
            <div className="text-xs mt-1" style={{ color: '#7E8DB1' }}>{Math.floor(s.duration/60)} min</div>
          </button>
        ))}
      </div>

      {/* Timer */}
      <div className="glass-panel p-8 flex flex-col items-center mb-6">
        <div className="relative w-52 h-52 mb-6">
          <svg className="w-full h-full -rotate-90" viewBox="0 0 100 100">
            <circle cx="50" cy="50" r="44" fill="none" stroke="rgba(255,255,255,0.05)" strokeWidth="8" />
            <circle cx="50" cy="50" r="44" fill="none" stroke={selected.color} strokeWidth="8"
              strokeDasharray={`${2 * Math.PI * 44}`}
              strokeDashoffset={`${2 * Math.PI * 44 * (1 - progress)}`}
              strokeLinecap="round"
              style={{ transition: 'stroke-dashoffset 1s linear', filter: `drop-shadow(0 0 8px ${selected.color}80)` }} />
          </svg>
          {selected.id === 'breath' && running ? (
            <div className="absolute inset-0 flex flex-col items-center justify-center">
              <motion.div animate={{ scale: BREATH_PHASES[breathPhase].scale }}
                transition={{ duration: BREATH_PHASES[breathPhase].duration, ease: 'easeInOut' }}
                className="w-16 h-16 rounded-full"
                style={{ background: `radial-gradient(circle, ${selected.color}60, ${selected.color}20)`, border: `2px solid ${selected.color}60` }} />
              <div className="text-sm font-bold mt-2 text-white">{BREATH_PHASES[breathPhase].label}</div>
            </div>
          ) : (
            <div className="absolute inset-0 flex flex-col items-center justify-center">
              <div className="text-5xl font-black text-white tabular-nums">{mins}:{secs}</div>
              <div className="text-xs mt-1 font-semibold" style={{ color: '#7E8DB1' }}>{selected.label}</div>
            </div>
          )}
        </div>

        <div className="flex gap-3">
          <button onClick={() => { setTimeLeft(selected.duration); setRunning(false); setBreathPhase(0); }}
            className="btn-secondary w-12 h-12 rounded-xl flex items-center justify-center p-0">
            <RotateCcw size={16} />
          </button>
          <button onClick={() => setRunning(r => !r)}
            className="btn-primary w-16 h-12 rounded-xl flex items-center justify-center p-0"
            style={{ background: `linear-gradient(135deg, ${selected.color}, ${selected.color}cc)` }}>
            {running ? <Pause size={20} /> : <Play size={20} />}
          </button>
        </div>

        {completed > 0 && (
          <div className="mt-4 badge badge-success">✓ {completed} session{completed > 1 ? 's' : ''} complétée{completed > 1 ? 's' : ''}</div>
        )}
      </div>

      {/* Tips */}
      <div className="glass-card p-5" style={{ borderColor: 'rgba(47,107,255,0.15)' }}>
        <div className="flex items-center gap-2 mb-3"><Wind size={16} style={{ color: '#4D83FF' }} /><span className="font-bold text-white text-sm">Conseil</span></div>
        <p className="text-sm" style={{ color: '#AAB6D3' }}>
          {selected.id === 'breath' ? 'La technique 4-4-6 réduit le cortisol et calme le système nerveux en moins de 2 minutes.'
          : selected.id === 'pomodoro' ? 'Après chaque Pomodoro, notez ce que vous avez accompli. La progression visible booste la motivation.'
          : selected.id === 'deep' ? 'Le Deep Work de 50 min est optimal pour les tâches complexes nécessitant une concentration totale.'
          : 'Profitez de cette pause pour vous étirer, vous hydrater et préparer la prochaine session.'}
        </p>
      </div>
    </div>
  );
}
