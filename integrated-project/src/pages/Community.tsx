import React, { useState, useEffect } from 'react';
import { Users, Heart, MessageCircle, Plus, Send, Loader2, Sparkles, AlertCircle, Globe, Trash2 } from 'lucide-react';
import { motion, AnimatePresence } from 'motion/react';
import { useAuth } from '../context/AuthContext';

interface Post {
  id: string; authorName: string; authorId: string;
  content: string; likes: number; likedByMe: boolean;
  createdAt: string; comments: { id: string; author: string; text: string }[];
}

const STORAGE_KEY = 'mindboost_community_posts';

const SEED_POSTS: Post[] = [
  { id: 'seed1', authorName: 'Sarah M.', authorId: 'seed', content: "Après 3 semaines d'utilisation quotidienne du Focus Lab, ma productivité a augmenté de façon remarquable. Le timing Pomodoro change vraiment la donne !", likes: 12, likedByMe: false, createdAt: new Date(Date.now() - 86400000 * 2).toISOString(), comments: [] },
  { id: 'seed2', authorName: 'Karim B.', authorId: 'seed', content: "La technique de respiration 4-4-6 m'a aidé à gérer mon anxiété lors d'un examen difficile. Je recommande à tous d'essayer.", likes: 8, likedByMe: false, createdAt: new Date(Date.now() - 86400000).toISOString(), comments: [] },
];

function loadPosts(): Post[] {
  try { return JSON.parse(localStorage.getItem(STORAGE_KEY) || 'null') ?? SEED_POSTS; } catch { return SEED_POSTS; }
}
function savePosts(posts: Post[]) {
  try { localStorage.setItem(STORAGE_KEY, JSON.stringify(posts)); } catch {}
}

export default function Community() {
  const { profile } = useAuth();
  const [posts, setPosts] = useState<Post[]>(loadPosts);
  const [text, setText] = useState('');
  const [posting, setPosting] = useState(false);
  const [commentText, setCommentText] = useState<Record<string, string>>({});
  const [openComments, setOpenComments] = useState<Record<string, boolean>>({});

  useEffect(() => { savePosts(posts); }, [posts]);

  const handlePost = async () => {
    if (!text.trim() || posting) return;
    setPosting(true);
    await new Promise(r => setTimeout(r, 500));
    const p: Post = {
      id: Date.now().toString(), authorId: profile?.id || 'me',
      authorName: profile?.displayName || 'Vous',
      content: text.trim(), likes: 0, likedByMe: false,
      createdAt: new Date().toISOString(), comments: [],
    };
    setPosts(prev => [p, ...prev]);
    setText('');
    setPosting(false);
  };

  const toggleLike = (id: string) => setPosts(prev => prev.map(p =>
    p.id !== id ? p : { ...p, likes: p.likedByMe ? p.likes - 1 : p.likes + 1, likedByMe: !p.likedByMe }
  ));

  const addComment = (postId: string) => {
    const t = (commentText[postId] || '').trim();
    if (!t) return;
    setPosts(prev => prev.map(p => p.id !== postId ? p : {
      ...p, comments: [...p.comments, { id: Date.now().toString(), author: profile?.displayName || 'Vous', text: t }]
    }));
    setCommentText(c => ({ ...c, [postId]: '' }));
  };

  const deletePost = (id: string) => {
    setPosts(prev => prev.filter(p => p.id !== id));
  };

  const timeAgo = (iso: string) => {
    const diff = Date.now() - new Date(iso).getTime();
    if (diff < 60000) return 'À l\'instant';
    if (diff < 3600000) return `${Math.floor(diff / 60000)} min`;
    if (diff < 86400000) return `${Math.floor(diff / 3600000)} h`;
    return `${Math.floor(diff / 86400000)} j`;
  };

  return (
    <div>
      <div className="page-heading flex items-start justify-between">
        <div>
          <div className="flex items-center gap-3"><Users size={28} style={{ color: '#F472B6' }} /><h1>Communauté</h1></div>
          <p>Partagez vos expériences et soutenez-vous mutuellement</p>
        </div>
        <div className="flex items-center gap-2 px-3 py-2 rounded-full text-xs font-bold"
          style={{ background: 'rgba(244,114,182,0.1)', border: '1px solid rgba(244,114,182,0.2)', color: '#F472B6' }}>
          <Globe size={12} />{posts.length} publications
        </div>
      </div>

      <div className="grid grid-cols-1 lg:grid-cols-3 gap-6">
        {/* Main feed */}
        <div className="lg:col-span-2 space-y-5">
          {/* Composer */}
          <div className="glass-panel p-5">
            <div className="flex gap-3 mb-4">
              <div className="w-9 h-9 rounded-xl flex items-center justify-center font-black text-white flex-shrink-0"
                style={{ background: 'linear-gradient(135deg,#2F6BFF,#19B5FE)' }}>
                {profile?.displayName?.[0] || 'V'}
              </div>
              <textarea value={text} onChange={e => setText(e.target.value)}
                placeholder="Partagez une réflexion, une victoire ou un conseil..." rows={3}
                className="form-control flex-1 custom-scrollbar" style={{ resize: 'none' }} />
            </div>
            <div className="flex justify-between items-center">
              <span className="text-xs" style={{ color: '#7E8DB1' }}>{text.length}/500</span>
              <button onClick={handlePost} disabled={!text.trim() || posting} className="btn-primary py-2 px-4 text-sm">
                {posting ? <Loader2 size={14} className="animate-spin" /> : <Send size={14} />}
                Publier
              </button>
            </div>
          </div>

          {/* Posts */}
          <AnimatePresence>
            {posts.map((post, i) => (
              <motion.div key={post.id} initial={{ opacity: 0, y: 12 }} animate={{ opacity: 1, y: 0 }}
                exit={{ opacity: 0, height: 0 }} transition={{ delay: i * 0.04 }}
                className="glass-card p-5">
                <div className="flex items-start gap-3 mb-3">
                  <div className="w-9 h-9 rounded-xl flex items-center justify-center font-bold text-sm flex-shrink-0"
                    style={{ background: 'rgba(244,114,182,0.15)', border: '1px solid rgba(244,114,182,0.2)', color: '#F472B6' }}>
                    {post.authorName[0]}
                  </div>
                  <div className="flex-1 min-w-0">
                    <div className="flex items-center justify-between">
                      <span className="font-bold text-sm text-white">{post.authorName}</span>
                      <div className="flex items-center gap-2">
                        <span className="text-xs" style={{ color: '#7E8DB1' }}>{timeAgo(post.createdAt)}</span>
                        {post.authorId === (profile?.id || 'me') && (
                          <button onClick={() => deletePost(post.id)} style={{ color: 'rgba(255,90,116,0.4)' }}
                            onMouseEnter={e => (e.currentTarget.style.color = '#FF5A74')}
                            onMouseLeave={e => (e.currentTarget.style.color = 'rgba(255,90,116,0.4)')}>
                            <Trash2 size={13} />
                          </button>
                        )}
                      </div>
                    </div>
                    <p className="text-sm mt-1 leading-relaxed" style={{ color: '#AAB6D3' }}>{post.content}</p>
                  </div>
                </div>

                <div className="flex items-center gap-4 pt-3" style={{ borderTop: '1px solid rgba(255,255,255,0.05)' }}>
                  <button onClick={() => toggleLike(post.id)}
                    className="flex items-center gap-1.5 text-xs font-semibold transition-all"
                    style={{ color: post.likedByMe ? '#F472B6' : '#7E8DB1' }}>
                    <Heart size={15} fill={post.likedByMe ? '#F472B6' : 'none'} />
                    {post.likes}
                  </button>
                  <button onClick={() => setOpenComments(c => ({ ...c, [post.id]: !c[post.id] }))}
                    className="flex items-center gap-1.5 text-xs font-semibold transition-colors"
                    style={{ color: openComments[post.id] ? '#4D83FF' : '#7E8DB1' }}>
                    <MessageCircle size={15} />{post.comments.length}
                  </button>
                </div>

                <AnimatePresence>
                  {openComments[post.id] && (
                    <motion.div initial={{ height: 0, opacity: 0 }} animate={{ height: 'auto', opacity: 1 }}
                      exit={{ height: 0, opacity: 0 }} style={{ overflow: 'hidden' }}>
                      <div className="mt-3 space-y-2">
                        {post.comments.map(c => (
                          <div key={c.id} className="flex gap-2 text-xs">
                            <span className="font-bold text-white">{c.author} :</span>
                            <span style={{ color: '#AAB6D3' }}>{c.text}</span>
                          </div>
                        ))}
                        <div className="flex gap-2 mt-2">
                          <input value={commentText[post.id] || ''} onChange={e => setCommentText(c => ({ ...c, [post.id]: e.target.value }))}
                            onKeyDown={e => e.key === 'Enter' && addComment(post.id)}
                            placeholder="Ajouter un commentaire..." className="form-control text-xs py-2 flex-1" />
                          <button onClick={() => addComment(post.id)} className="btn-primary px-3 py-2"><Send size={12} /></button>
                        </div>
                      </div>
                    </motion.div>
                  )}
                </AnimatePresence>
              </motion.div>
            ))}
          </AnimatePresence>
        </div>

        {/* Sidebar */}
        <div className="space-y-4">
          <div className="glass-panel p-5" style={{ borderColor: 'rgba(247,184,75,0.15)' }}>
            <div className="flex items-center gap-2 mb-3"><Sparkles size={14} style={{ color: '#F7B84B' }} />
              <span className="text-xs font-black uppercase tracking-widest" style={{ color: '#F7B84B' }}>Humeur collective</span>
            </div>
            <p className="text-xs mb-3" style={{ color: '#AAB6D3' }}>84% des membres rapportent une amélioration cette semaine.</p>
            <div className="progress-bar-track"><div className="progress-bar-fill" style={{ width: '84%', background: 'linear-gradient(90deg,#F7B84B,#FF8C42)' }} /></div>
          </div>
          <div className="glass-panel p-5">
            <div className="text-xs font-black uppercase tracking-widest mb-4" style={{ color: '#7E8DB1' }}>Règles de la communauté</div>
            {['Bienveillance et respect', 'Pas de diagnostics médicaux', 'Confidentialité partagée', 'Signaler le contenu inapproprié'].map(r => (
              <div key={r} className="flex items-start gap-2 mb-2 text-xs" style={{ color: '#AAB6D3' }}>
                <span style={{ color: '#29CC7A', marginTop: 1 }}>✓</span>{r}
              </div>
            ))}
          </div>
          <div className="glass-card p-4 flex gap-3" style={{ background: 'rgba(255,90,116,0.05)', borderColor: 'rgba(255,90,116,0.15)' }}>
            <AlertCircle size={16} style={{ color: '#FF5A74', flexShrink: 0, marginTop: 2 }} />
            <p className="text-xs leading-relaxed" style={{ color: '#AAB6D3' }}>En cas de détresse, utilisez le Coach IA ou consultez un professionnel de santé mentale.</p>
          </div>
        </div>
      </div>
    </div>
  );
}
