import React, { useState, useRef, useEffect } from 'react';
import { Cpu, Plus, Trash2, TrendingUp } from 'lucide-react';
import { motion, AnimatePresence } from 'motion/react';

interface EmotionNode {
  id: string; label: string; intensity: number; color: string;
  x: number; y: number;
}

const EMOTIONS = [
  { label: 'Joie',       color: '#F7B84B' },
  { label: 'Calme',      color: '#29CC7A' },
  { label: 'Anxiété',    color: '#FF8C42' },
  { label: 'Tristesse',  color: '#4D83FF' },
  { label: 'Énergie',    color: '#19B5FE' },
  { label: 'Fatigue',    color: '#A78BFA' },
  { label: 'Confiance',  color: '#00D1C7' },
  { label: 'Stress',     color: '#FF5A74' },
];

const rand = (min: number, max: number) => Math.random() * (max - min) + min;

export default function Constellation() {
  const [nodes, setNodes] = useState<EmotionNode[]>([
    { id: '1', label: 'Calme',   intensity: 7, color: '#29CC7A', x: 30, y: 35 },
    { id: '2', label: 'Énergie', intensity: 6, color: '#19B5FE', x: 65, y: 25 },
    { id: '3', label: 'Joie',    intensity: 8, color: '#F7B84B', x: 50, y: 60 },
  ]);
  const [selected, setSelected] = useState<string | null>(null);
  const [adding, setAdding] = useState(false);
  const [newEmotion, setNewEmotion] = useState(EMOTIONS[0]);
  const [newIntensity, setNewIntensity] = useState(5);
  const svgRef = useRef<SVGSVGElement>(null);
  const dragging = useRef<{ id: string; ox: number; oy: number } | null>(null);

  const addNode = () => {
    const node: EmotionNode = {
      id: Date.now().toString(), label: newEmotion.label, color: newEmotion.color,
      intensity: newIntensity, x: rand(20, 75), y: rand(20, 75),
    };
    setNodes(prev => [...prev, node]);
    setAdding(false);
  };

  const onMouseDown = (e: React.MouseEvent, id: string) => {
    e.preventDefault();
    const svg = svgRef.current;
    if (!svg) return;
    const rect = svg.getBoundingClientRect();
    const node = nodes.find(n => n.id === id)!;
    dragging.current = { id, ox: e.clientX - (node.x / 100) * rect.width, oy: e.clientY - (node.y / 100) * rect.height };
    setSelected(id);
  };

  useEffect(() => {
    const onMove = (e: MouseEvent) => {
      if (!dragging.current || !svgRef.current) return;
      const rect = svgRef.current.getBoundingClientRect();
      const x = Math.max(5, Math.min(95, ((e.clientX - dragging.current.ox) / rect.width) * 100));
      const y = Math.max(5, Math.min(95, ((e.clientY - dragging.current.oy) / rect.height) * 100));
      setNodes(prev => prev.map(n => n.id === dragging.current!.id ? { ...n, x, y } : n));
    };
    const onUp = () => { dragging.current = null; };
    window.addEventListener('mousemove', onMove);
    window.addEventListener('mouseup', onUp);
    return () => { window.removeEventListener('mousemove', onMove); window.removeEventListener('mouseup', onUp); };
  }, []);

  const sel = nodes.find(n => n.id === selected);

  return (
    <div>
      <div className="page-heading flex items-start justify-between">
        <div>
          <div className="flex items-center gap-3"><Cpu size={28} style={{ color: '#19B5FE' }} /><h1>Carte Neurale</h1></div>
          <p>Visualisez et explorez votre constellation émotionnelle</p>
        </div>
        <button onClick={() => setAdding(true)} className="btn-primary"><Plus size={16} />Ajouter</button>
      </div>

      <div className="grid grid-cols-1 lg:grid-cols-3 gap-6">
        {/* Canvas */}
        <div className="lg:col-span-2 glass-panel overflow-hidden" style={{ height: 420 }}>
          <svg ref={svgRef} width="100%" height="100%" style={{ cursor: 'default' }}>
            {/* Connection lines */}
            {nodes.map((a, i) => nodes.slice(i + 1).map(b => (
              <line key={`${a.id}-${b.id}`}
                x1={`${a.x}%`} y1={`${a.y}%`} x2={`${b.x}%`} y2={`${b.y}%`}
                stroke="rgba(255,255,255,0.06)" strokeWidth="1" />
            )))}
            {/* Nodes */}
            {nodes.map(node => {
              const r = 14 + node.intensity * 2.5;
              const isSelected = selected === node.id;
              return (
                <g key={node.id} style={{ cursor: 'grab' }}
                  onMouseDown={e => onMouseDown(e, node.id)}>
                  {/* Glow */}
                  <circle cx={`${node.x}%`} cy={`${node.y}%`} r={r + 10} fill={node.color} opacity="0.08" />
                  {/* Ring if selected */}
                  {isSelected && <circle cx={`${node.x}%`} cy={`${node.y}%`} r={r + 6} fill="none" stroke={node.color} strokeWidth="2" opacity="0.6" strokeDasharray="4 3" />}
                  {/* Main circle */}
                  <circle cx={`${node.x}%`} cy={`${node.y}%`} r={r} fill={node.color} opacity="0.85"
                    style={{ filter: `drop-shadow(0 0 ${isSelected ? 14 : 6}px ${node.color})` }} />
                  {/* Label */}
                  <text x={`${node.x}%`} y={`${node.y}%`} textAnchor="middle" dominantBaseline="middle"
                    fill="white" fontSize="11" fontWeight="700" style={{ pointerEvents: 'none', userSelect: 'none' }}>
                    {node.label}
                  </text>
                  <text x={`${node.x}%`} y={`${node.y + 6}%`} textAnchor="middle"
                    fill="rgba(255,255,255,0.6)" fontSize="9" style={{ pointerEvents: 'none', userSelect: 'none' }}>
                    {node.intensity}/10
                  </text>
                </g>
              );
            })}
          </svg>
        </div>

        {/* Detail panel */}
        <div className="space-y-4">
          {sel ? (
            <div className="glass-panel p-5" style={{ borderColor: `${sel.color}30` }}>
              <div className="flex items-center justify-between mb-4">
                <div className="flex items-center gap-2">
                  <div className="w-4 h-4 rounded-full" style={{ background: sel.color, boxShadow: `0 0 10px ${sel.color}` }} />
                  <span className="font-bold text-white">{sel.label}</span>
                </div>
                <button onClick={() => { setNodes(p => p.filter(n => n.id !== sel.id)); setSelected(null); }}
                  style={{ color: 'rgba(255,90,116,0.5)' }}
                  onMouseEnter={e => (e.currentTarget.style.color = '#FF5A74')}
                  onMouseLeave={e => (e.currentTarget.style.color = 'rgba(255,90,116,0.5)')}>
                  <Trash2 size={15} />
                </button>
              </div>
              <div className="text-xs mb-1 font-bold" style={{ color: '#7E8DB1' }}>Intensité</div>
              <input type="range" min={1} max={10} value={sel.intensity}
                onChange={e => setNodes(p => p.map(n => n.id === sel.id ? { ...n, intensity: +e.target.value } : n))}
                className="w-full mb-3" />
              <div className="text-4xl font-black text-center my-2" style={{ color: sel.color }}>{sel.intensity}/10</div>
              <p className="text-xs text-center" style={{ color: '#7E8DB1' }}>Faites glisser le nœud sur la carte</p>
            </div>
          ) : (
            <div className="glass-panel p-5 text-center">
              <Cpu size={32} className="mx-auto mb-2 opacity-30" />
              <p className="text-sm font-semibold text-white">Sélectionnez un nœud</p>
              <p className="text-xs mt-1" style={{ color: '#7E8DB1' }}>Cliquez sur une émotion pour la modifier</p>
            </div>
          )}

          <div className="glass-panel p-5">
            <div className="flex items-center gap-2 mb-3"><TrendingUp size={14} style={{ color: '#4D83FF' }} />
              <span className="text-xs font-black uppercase tracking-widest" style={{ color: '#4D83FF' }}>Résumé</span>
            </div>
            {nodes.map(n => (
              <div key={n.id} className="flex items-center gap-2 mb-2">
                <div className="w-2 h-2 rounded-full flex-shrink-0" style={{ background: n.color }} />
                <span className="text-xs flex-1" style={{ color: '#AAB6D3' }}>{n.label}</span>
                <div className="flex gap-0.5">
                  {Array.from({ length: 10 }).map((_, i) => (
                    <div key={i} className="w-1.5 h-3 rounded-sm" style={{ background: i < n.intensity ? n.color : 'rgba(255,255,255,0.06)' }} />
                  ))}
                </div>
              </div>
            ))}
          </div>
        </div>
      </div>

      {/* Add modal */}
      <AnimatePresence>
        {adding && (
          <motion.div initial={{ opacity: 0 }} animate={{ opacity: 1 }} exit={{ opacity: 0 }}
            className="fixed inset-0 z-50 flex items-center justify-center p-4"
            style={{ background: 'rgba(7,16,29,0.85)', backdropFilter: 'blur(8px)' }}
            onClick={() => setAdding(false)}>
            <motion.div initial={{ scale: 0.95, y: 16 }} animate={{ scale: 1, y: 0 }} exit={{ scale: 0.95 }}
              className="glass-panel p-6 w-full max-w-sm" onClick={e => e.stopPropagation()}>
              <h3 className="font-black text-white mb-4">Ajouter une émotion</h3>
              <div className="mb-4">
                <label className="text-xs font-bold mb-2 block" style={{ color: '#AAB6D3' }}>Émotion</label>
                <div className="grid grid-cols-4 gap-2">
                  {EMOTIONS.map(e => (
                    <button key={e.label} onClick={() => setNewEmotion(e)}
                      className="p-2 rounded-xl text-xs font-bold transition-all"
                      style={{
                        background: newEmotion.label === e.label ? `${e.color}25` : 'rgba(255,255,255,0.04)',
                        border: `1px solid ${newEmotion.label === e.label ? e.color + '60' : 'rgba(255,255,255,0.07)'}`,
                        color: newEmotion.label === e.label ? e.color : '#AAB6D3',
                      }}>
                      {e.label}
                    </button>
                  ))}
                </div>
              </div>
              <div className="mb-5">
                <label className="text-xs font-bold mb-2 block" style={{ color: '#AAB6D3' }}>Intensité : {newIntensity}/10</label>
                <input type="range" min={1} max={10} value={newIntensity} onChange={e => setNewIntensity(+e.target.value)} className="w-full" />
              </div>
              <div className="flex gap-3">
                <button onClick={() => setAdding(false)} className="btn-secondary flex-1">Annuler</button>
                <button onClick={addNode} className="btn-primary flex-1">Ajouter</button>
              </div>
            </motion.div>
          </motion.div>
        )}
      </AnimatePresence>
    </div>
  );
}
