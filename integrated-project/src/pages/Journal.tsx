import React, { useState, useEffect } from 'react';
import { Book, Plus, Trash2, Save, Smile, Meh, Frown, Heart, Star } from 'lucide-react';
import { motion, AnimatePresence } from 'motion/react';
import { useAuth } from '../context/AuthContext';

type Mood = 'great' | 'good' | 'ok' | 'bad' | 'awful';
interface Entry { id: string; date: string; title: string; content: string; mood: Mood; tags: string[]; }

const MOODS: { value: Mood; label: string; color: string; icon: string }[] = [
  { value: 'great', label: 'Excellent', color: '#29CC7A', icon: '😊' },
  { value: 'good',  label: 'Bien',      color: '#4D83FF', icon: '🙂' },
  { value: 'ok',    label: 'Correct',   color: '#F7B84B', icon: '😐' },
  { value: 'bad',   label: 'Difficile', color: '#FF8C42', icon: '😟' },
  { value: 'awful', label: 'Dur',       color: '#FF5A74', icon: '😢' },
];

const TAGS = ['Travail', 'Famille', 'Santé', 'Gratitude', 'Objectifs', 'Émotions', 'Progrès'];

export default function Journal() {
  const { user } = useAuth();
  const [entries, setEntries] = useState<Entry[]>([]);
  const [view, setView] = useState<'list' | 'write'>('list');
  const [current, setCurrent] = useState<Partial<Entry>>({ mood: 'good', tags: [], title: '', content: '' });
  const [saving, setSaving] = useState(false);

  const storageKey = `journal_${user?.uid || 'local'}`;

  useEffect(() => {
    try { const saved = localStorage.getItem(storageKey); if (saved) setEntries(JSON.parse(saved)); } catch {}
  }, []);

  const save = (updated: Entry[]) => { setEntries(updated); try { localStorage.setItem(storageKey, JSON.stringify(updated)); } catch {} };

  const handleSave = async () => {
    if (!current.title?.trim() || !current.content?.trim()) return;
    setSaving(true);
    await new Promise(r => setTimeout(r, 600));
    const entry: Entry = {
      id: Date.now().toString(),
      date: new Date().toISOString(),
      title: current.title!,
      content: current.content!,
      mood: current.mood as Mood,
      tags: current.tags || [],
    };
    save([entry, ...entries]);
    setCurrent({ mood: 'good', tags: [], title: '', content: '' });
    setView('list');
    setSaving(false);
  };

  const deleteEntry = (id: string) => save(entries.filter(e => e.id !== id));

  const toggleTag = (tag: string) => setCurrent(c => ({
    ...c, tags: c.tags?.includes(tag) ? c.tags.filter(t => t !== tag) : [...(c.tags || []), tag]
  }));

  const moodOf = (v: Mood) => MOODS.find(m => m.value === v)!;

  return (
    <div>
      <div className="page-heading flex items-start justify-between">
        <div>
          <div className="flex items-center gap-3"><Book size={28} style={{ color: '#4D83FF' }} /><h1>Journal Mental</h1></div>
          <p>{entries.length} entrée{entries.length !== 1 ? 's' : ''} · Espace privé et sécurisé</p>
        </div>
        <button onClick={() => setView(view === 'list' ? 'write' : 'list')} className="btn-primary">
          <Plus size={16} />{view === 'list' ? 'Nouvelle entrée' : 'Voir les entrées'}
        </button>
      </div>

      <AnimatePresence mode="wait">
        {view === 'write' ? (
          <motion.div key="write" initial={{ opacity: 0, y: 16 }} animate={{ opacity: 1, y: 0 }} exit={{ opacity: 0, y: -16 }}
            className="glass-panel p-6 space-y-5">
            <input value={current.title} onChange={e => setCurrent(c => ({ ...c, title: e.target.value }))}
              placeholder="Titre de votre entrée..."
              className="form-control text-lg font-bold" style={{ fontSize: '1.15rem' }} />

            <div>
              <div className="text-xs font-bold mb-3 uppercase tracking-widest" style={{ color: '#7E8DB1' }}>Comment vous sentez-vous ?</div>
              <div className="flex gap-2 flex-wrap">
                {MOODS.map(m => (
                  <button key={m.value} onClick={() => setCurrent(c => ({ ...c, mood: m.value }))}
                    className="flex items-center gap-2 px-3 py-2 rounded-xl text-sm font-semibold transition-all"
                    style={{
                      background: current.mood === m.value ? `${m.color}25` : 'rgba(255,255,255,0.04)',
                      border: `1px solid ${current.mood === m.value ? m.color + '60' : 'rgba(255,255,255,0.07)'}`,
                      color: current.mood === m.value ? m.color : '#AAB6D3',
                    }}>
                    {m.icon} {m.label}
                  </button>
                ))}
              </div>
            </div>

            <textarea value={current.content} onChange={e => setCurrent(c => ({ ...c, content: e.target.value }))}
              placeholder="Écrivez librement vos pensées, émotions, réflexions du jour..." rows={8}
              className="form-control custom-scrollbar" style={{ resize: 'vertical' }} />

            <div>
              <div className="text-xs font-bold mb-2 uppercase tracking-widest" style={{ color: '#7E8DB1' }}>Tags</div>
              <div className="flex gap-2 flex-wrap">
                {TAGS.map(tag => (
                  <button key={tag} onClick={() => toggleTag(tag)}
                    className="px-3 py-1.5 rounded-full text-xs font-semibold transition-all"
                    style={{
                      background: current.tags?.includes(tag) ? 'rgba(47,107,255,0.2)' : 'rgba(255,255,255,0.04)',
                      border: `1px solid ${current.tags?.includes(tag) ? 'rgba(77,131,255,0.4)' : 'rgba(255,255,255,0.07)'}`,
                      color: current.tags?.includes(tag) ? '#4D83FF' : '#7E8DB1',
                    }}>
                    {tag}
                  </button>
                ))}
              </div>
            </div>

            <button onClick={handleSave} disabled={saving || !current.title?.trim() || !current.content?.trim()} className="btn-primary">
              <Save size={16} />{saving ? 'Enregistrement...' : 'Sauvegarder'}
            </button>
          </motion.div>
        ) : (
          <motion.div key="list" initial={{ opacity: 0, y: 16 }} animate={{ opacity: 1, y: 0 }} exit={{ opacity: 0, y: -16 }}>
            {entries.length === 0 ? (
              <div className="glass-panel p-16 text-center">
                <Book size={48} className="mx-auto mb-4 opacity-30" />
                <p className="font-semibold text-white">Votre journal est vide</p>
                <p className="text-sm mt-1" style={{ color: '#7E8DB1' }}>Commencez par écrire votre première entrée.</p>
                <button onClick={() => setView('write')} className="btn-primary mt-4"><Plus size={16} />Première entrée</button>
              </div>
            ) : (
              <div className="space-y-4">
                {entries.map((e, i) => {
                  const m = moodOf(e.mood);
                  return (
                    <motion.div key={e.id} initial={{ opacity: 0, y: 12 }} animate={{ opacity: 1, y: 0 }} transition={{ delay: i * 0.05 }}
                      className="glass-card p-5">
                      <div className="flex items-start justify-between gap-3">
                        <div className="flex items-start gap-3 flex-1 min-w-0">
                          <div className="w-10 h-10 rounded-xl flex items-center justify-center text-xl flex-shrink-0"
                            style={{ background: `${m.color}20`, border: `1px solid ${m.color}40` }}>
                            {m.icon}
                          </div>
                          <div className="min-w-0">
                            <h3 className="font-bold text-white truncate">{e.title}</h3>
                            <p className="text-xs mt-0.5" style={{ color: '#7E8DB1' }}>
                              {new Date(e.date).toLocaleDateString('fr-FR', { weekday: 'long', day: 'numeric', month: 'long' })}
                            </p>
                            <p className="text-sm mt-2 line-clamp-2" style={{ color: '#AAB6D3' }}>{e.content}</p>
                            {e.tags.length > 0 && (
                              <div className="flex gap-1.5 mt-2 flex-wrap">
                                {e.tags.map(t => <span key={t} className="badge badge-primary text-[10px] py-0.5 px-2">{t}</span>)}
                              </div>
                            )}
                          </div>
                        </div>
                        <button onClick={() => deleteEntry(e.id)} className="text-[#FF5A74]/40 hover:text-[#FF5A74] transition-colors flex-shrink-0">
                          <Trash2 size={16} />
                        </button>
                      </div>
                    </motion.div>
                  );
                })}
              </div>
            )}
          </motion.div>
        )}
      </AnimatePresence>
    </div>
  );
}
