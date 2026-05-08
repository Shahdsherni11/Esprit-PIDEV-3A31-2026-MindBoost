import React from 'react';
import { Activity, TrendingUp, Brain, Zap, Star } from 'lucide-react';

const WEEK = ['Lun','Mar','Mer','Jeu','Ven','Sam','Dim'];
const MOOD_DATA = [72, 65, 80, 55, 88, 76, 84];
const FOCUS_DATA = [3, 5, 4, 2, 6, 3, 5];

const Bar = ({ value, max, color }: { value: number; max: number; color: string }) => (
  <div className="flex flex-col items-center gap-1 flex-1">
    <div className="w-full flex flex-col justify-end rounded-lg overflow-hidden" style={{ height: 80, background: 'rgba(255,255,255,0.04)' }}>
      <div className="w-full rounded-lg transition-all duration-700" style={{ height: `${(value/max)*100}%`, background: `linear-gradient(180deg, ${color}, ${color}80)`, boxShadow: `0 0 10px ${color}40` }} />
    </div>
    <span className="text-[10px] font-semibold" style={{ color: '#7E8DB1' }}>{value}</span>
  </div>
);

export default function Insights() {
  const avg = Math.round(MOOD_DATA.reduce((a,b)=>a+b,0)/MOOD_DATA.length);
  return (
    <div>
      <div className="page-heading">
        <div className="flex items-center gap-3"><Activity size={28} style={{ color: '#29CC7A' }} /><h1>Bio Tendances</h1></div>
        <p>Visualisation de vos données de bien-être cette semaine</p>
      </div>

      <div className="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
        {[
          { label: 'Score moyen', value: `${avg}%`, color: '#4D83FF', icon: Brain },
          { label: 'Sessions focus', value: FOCUS_DATA.reduce((a,b)=>a+b,0), color: '#19B5FE', icon: Zap },
          { label: 'Meilleur jour', value: 'Ven', color: '#29CC7A', icon: Star },
          { label: 'Série active', value: '5j', color: '#F7B84B', icon: TrendingUp },
        ].map(s => (
          <div key={s.label} className="stat-card">
            <div className="flex items-start justify-between">
              <div><div className="stat-number" style={{ color: s.color }}>{s.value}</div><div className="stat-label">{s.label}</div></div>
              <s.icon size={26} style={{ color: s.color, opacity: 0.7 }} />
            </div>
          </div>
        ))}
      </div>

      <div className="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div className="glass-panel p-6">
          <div className="flex items-center gap-2 mb-5"><TrendingUp size={16} style={{ color: '#4D83FF' }} /><span className="font-bold text-white">Score bien-être (7j)</span></div>
          <div className="flex items-end gap-2">
            {MOOD_DATA.map((v, i) => (
              <div key={i} className="flex-1 flex flex-col items-center gap-1">
                <Bar value={v} max={100} color="#4D83FF" />
                <span className="text-[10px]" style={{ color: '#7E8DB1' }}>{WEEK[i]}</span>
              </div>
            ))}
          </div>
        </div>

        <div className="glass-panel p-6">
          <div className="flex items-center gap-2 mb-5"><Zap size={16} style={{ color: '#F7B84B' }} /><span className="font-bold text-white">Sessions Focus (7j)</span></div>
          <div className="flex items-end gap-2">
            {FOCUS_DATA.map((v, i) => (
              <div key={i} className="flex-1 flex flex-col items-center gap-1">
                <Bar value={v} max={8} color="#F7B84B" />
                <span className="text-[10px]" style={{ color: '#7E8DB1' }}>{WEEK[i]}</span>
              </div>
            ))}
          </div>
        </div>

        <div className="glass-panel p-6 lg:col-span-2">
          <div className="flex items-center gap-2 mb-4"><Brain size={16} style={{ color: '#19B5FE' }} /><span className="font-bold text-white">Analyse IA</span></div>
          <div className="grid grid-cols-1 md:grid-cols-3 gap-4">
            {[
              { title: '📈 Progression', text: 'Votre score bien-être a augmenté de 12 points cette semaine. Continuez vos sessions de respiration quotidiennes.' },
              { title: '⚡ Point fort', text: 'Vos vendredis sont très productifs. Planifiez vos tâches importantes en fin de semaine.' },
              { title: '💡 Conseil', text: 'Votre mercredi montre un pic de stress. Une session de méditation courte pourrait aider.' },
            ].map(a => (
              <div key={a.title} className="glass-card p-4" style={{ borderColor: 'rgba(25,181,254,0.12)' }}>
                <div className="font-bold text-white text-sm mb-2">{a.title}</div>
                <p className="text-xs leading-relaxed" style={{ color: '#AAB6D3' }}>{a.text}</p>
              </div>
            ))}
          </div>
        </div>
      </div>
    </div>
  );
}
