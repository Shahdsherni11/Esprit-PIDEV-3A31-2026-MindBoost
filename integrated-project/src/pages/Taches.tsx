import React, { useState } from 'react';
import { CheckSquare, Plus, Trash2, ChevronDown, ChevronRight, Circle, CheckCircle2, Clock, Tag } from 'lucide-react';
import { motion, AnimatePresence } from 'motion/react';

type Priority = 'haute' | 'moyenne' | 'basse';
interface SubTask { id: string; label: string; done: boolean; }
interface Task { id: string; title: string; priority: Priority; done: boolean; dueDate: string; tags: string[]; subs: SubTask[]; expanded: boolean; }

const PRIO_META = {
  haute:   { color: '#FF5A74', label: 'Haute' },
  moyenne: { color: '#F7B84B', label: 'Moyenne' },
  basse:   { color: '#29CC7A', label: 'Basse' },
};

const INIT: Task[] = [
  { id:'1', title:'Préparer la présentation MindBoost', priority:'haute',   done:false, dueDate:'2026-05-10', tags:['Travail'], expanded:false,
    subs:[{ id:'s1', label:'Slides intro', done:true },{ id:'s2', label:'Démo live', done:false }] },
  { id:'2', title:'Méditation quotidienne 10 min',      priority:'moyenne', done:false, dueDate:'2026-05-08', tags:['Santé'], expanded:false, subs:[] },
  { id:'3', title:'Lire rapport DASS-21',               priority:'basse',   done:true,  dueDate:'2026-05-05', tags:['Étude'], expanded:false, subs:[] },
];

export default function Taches() {
  const [tasks, setTasks] = useState<Task[]>(INIT);
  const [filter, setFilter] = useState<'all'|'active'|'done'>('all');
  const [newTitle, setNewTitle] = useState('');
  const [newPrio, setNewPrio] = useState<Priority>('moyenne');

  const update = (id: string, patch: Partial<Task>) =>
    setTasks(ts => ts.map(t => t.id === id ? { ...t, ...patch } : t));

  const addTask = () => {
    if (!newTitle.trim()) return;
    setTasks(ts => [...ts, { id: Date.now().toString(), title: newTitle.trim(), priority: newPrio, done: false, dueDate: '', tags: [], subs: [], expanded: false }]);
    setNewTitle('');
  };

  const toggleSub = (tid: string, sid: string) =>
    setTasks(ts => ts.map(t => t.id === tid ? { ...t, subs: t.subs.map(s => s.id === sid ? { ...s, done: !s.done } : s) } : t));

  const shown = tasks.filter(t => filter === 'all' ? true : filter === 'done' ? t.done : !t.done);
  const done  = tasks.filter(t => t.done).length;

  return (
    <div>
      <div className="page-heading flex items-start justify-between">
        <div>
          <div className="flex items-center gap-3"><CheckSquare size={28} style={{ color: '#29CC7A' }} /><h1>Mes Tâches</h1></div>
          <p>{done}/{tasks.length} tâches complétées</p>
        </div>
      </div>

      {/* Progress */}
      <div className="glass-panel p-4 mb-6">
        <div className="flex justify-between text-xs font-bold mb-2 text-white">
          <span>Progression</span><span style={{ color: '#29CC7A' }}>{tasks.length ? Math.round((done/tasks.length)*100) : 0}%</span>
        </div>
        <div className="progress-bar-track"><div className="progress-bar-fill" style={{ width: `${tasks.length ? (done/tasks.length)*100 : 0}%`, background: 'linear-gradient(90deg,#29CC7A,#00D1C7)' }} /></div>
      </div>

      {/* Add task */}
      <div className="glass-panel p-4 mb-6 flex gap-3 items-center">
        <input value={newTitle} onChange={e => setNewTitle(e.target.value)} onKeyDown={e => e.key === 'Enter' && addTask()}
          placeholder="Nouvelle tâche..." className="form-control flex-1" />
        <select value={newPrio} onChange={e => setNewPrio(e.target.value as Priority)}
          className="form-control" style={{ width: 130 }}>
          {(Object.keys(PRIO_META) as Priority[]).map(p => <option key={p} value={p}>{PRIO_META[p].label}</option>)}
        </select>
        <button onClick={addTask} className="btn-primary py-2 px-4"><Plus size={16} /></button>
      </div>

      {/* Filters */}
      <div className="flex gap-2 mb-4">
        {(['all','active','done'] as const).map(f => (
          <button key={f} onClick={() => setFilter(f)}
            className={`px-4 py-2 rounded-xl text-sm font-bold transition-all ${filter === f ? 'btn-primary' : 'btn-secondary'}`}>
            {f === 'all' ? 'Toutes' : f === 'active' ? 'En cours' : 'Terminées'}
          </button>
        ))}
      </div>

      {/* Tasks */}
      <div className="space-y-3">
        <AnimatePresence>
          {shown.map((t, i) => {
            const pm = PRIO_META[t.priority];
            return (
              <motion.div key={t.id} initial={{ opacity: 0, y: 10 }} animate={{ opacity: 1, y: 0 }} exit={{ opacity: 0, height: 0 }} transition={{ delay: i * 0.04 }}
                className="glass-card overflow-hidden">
                <div className="p-4 flex items-center gap-3">
                  <button onClick={() => update(t.id, { done: !t.done })}>
                    {t.done ? <CheckCircle2 size={20} style={{ color: '#29CC7A' }} /> : <Circle size={20} style={{ color: '#7E8DB1' }} />}
                  </button>
                  <div className="flex-1 min-w-0">
                    <span className={`font-semibold text-sm ${t.done ? 'line-through' : 'text-white'}`}
                      style={{ color: t.done ? '#7E8DB1' : 'white' }}>{t.title}</span>
                    <div className="flex items-center gap-2 mt-1">
                      <span className="text-[10px] font-bold px-2 py-0.5 rounded-full"
                        style={{ background: `${pm.color}20`, color: pm.color }}>{pm.label}</span>
                      {t.dueDate && <span className="flex items-center gap-1 text-[10px]" style={{ color: '#7E8DB1' }}><Clock size={9} />{new Date(t.dueDate).toLocaleDateString('fr-FR')}</span>}
                      {t.tags.map(tag => <span key={tag} className="text-[10px] font-bold px-2 py-0.5 rounded-full" style={{ background: 'rgba(77,131,255,0.15)', color: '#4D83FF' }}>{tag}</span>)}
                    </div>
                  </div>
                  {t.subs.length > 0 && (
                    <button onClick={() => update(t.id, { expanded: !t.expanded })} style={{ color: '#7E8DB1' }}>
                      {t.expanded ? <ChevronDown size={16} /> : <ChevronRight size={16} />}
                    </button>
                  )}
                  <button onClick={() => setTasks(ts => ts.filter(x => x.id !== t.id))} style={{ color: 'rgba(255,90,116,0.4)' }}
                    onMouseEnter={e => (e.currentTarget.style.color = '#FF5A74')}
                    onMouseLeave={e => (e.currentTarget.style.color = 'rgba(255,90,116,0.4)')}>
                    <Trash2 size={15} />
                  </button>
                </div>
                <AnimatePresence>
                  {t.expanded && t.subs.length > 0 && (
                    <motion.div initial={{ height: 0 }} animate={{ height: 'auto' }} exit={{ height: 0 }} style={{ overflow: 'hidden' }}>
                      <div className="px-4 pb-3 pl-12 space-y-2" style={{ borderTop: '1px solid rgba(255,255,255,0.05)' }}>
                        {t.subs.map(s => (
                          <button key={s.id} onClick={() => toggleSub(t.id, s.id)}
                            className="flex items-center gap-2 w-full text-left text-sm py-1">
                            {s.done ? <CheckCircle2 size={14} style={{ color: '#29CC7A' }} /> : <Circle size={14} style={{ color: '#7E8DB1' }} />}
                            <span style={{ color: s.done ? '#7E8DB1' : '#AAB6D3', textDecoration: s.done ? 'line-through' : 'none' }}>{s.label}</span>
                          </button>
                        ))}
                      </div>
                    </motion.div>
                  )}
                </AnimatePresence>
              </motion.div>
            );
          })}
        </AnimatePresence>
      </div>
    </div>
  );
}
