import React, { useState, useRef, useEffect } from 'react';
import { Send, Bot, User, Sparkles, RefreshCw, Brain, Loader2 } from 'lucide-react';
import { useAuth } from '../context/AuthContext';
import { motion, AnimatePresence } from 'motion/react';

interface Message {
  id: string;
  role: 'user' | 'assistant';
  content: string;
  timestamp: Date;
}

const SYSTEM_PROMPT = `Tu es MindCare+, un coach de bien-être mental empathique et bienveillant intégré à la plateforme MindBoost. Tu aides les utilisateurs avec :
- La gestion du stress et de l'anxiété
- Les techniques de pleine conscience et de respiration
- Le soutien émotionnel et l'écoute active
- Des stratégies de productivité et focus
- Des conseils pour améliorer le sommeil et le bien-être
Réponds toujours en français, de manière chaleureuse, professionnelle et encourageante. Si quelqu'un exprime une détresse sévère, encourage-le à consulter un professionnel de santé mentale.`;

const QUICK_PROMPTS = [
  { icon: '🧘', text: 'Je me sens stressé(e)', prompt: 'Je me sens très stressé(e) en ce moment. Peux-tu m\'aider ?' },
  { icon: '💤', text: 'Problèmes de sommeil', prompt: 'J\'ai du mal à dormir. Quelles techniques me conseilles-tu ?' },
  { icon: '🎯', text: 'Améliorer ma concentration', prompt: 'Comment puis-je améliorer ma concentration et ma productivité ?' },
  { icon: '❤️', text: 'Exercice de respiration', prompt: 'Guide-moi à travers un exercice de respiration pour me calmer.' },
];

export default function Chat() {
  const { profile } = useAuth();
  const [messages, setMessages] = useState<Message[]>([
    {
      id: '0',
      role: 'assistant',
      content: `Bonjour ${profile?.displayName || 'vous'} ! 🌟 Je suis votre coach IA MindCare+, intégré à MindBoost. Comment puis-je vous accompagner aujourd'hui dans votre bien-être mental ?`,
      timestamp: new Date(),
    },
  ]);
  const [input, setInput] = useState('');
  const [loading, setLoading] = useState(false);
  const bottomRef = useRef<HTMLDivElement>(null);
  const textareaRef = useRef<HTMLTextAreaElement>(null);

  useEffect(() => {
    bottomRef.current?.scrollIntoView({ behavior: 'smooth' });
  }, [messages]);

  const formatHistory = (msgs: Message[]) =>
    msgs.slice(1).map(m => ({ role: m.role, content: m.content }));

  const sendMessage = async (text: string) => {
    if (!text.trim() || loading) return;
    const userMsg: Message = { id: Date.now().toString(), role: 'user', content: text.trim(), timestamp: new Date() };
    setMessages(prev => [...prev, userMsg]);
    setInput('');
    if (textareaRef.current) textareaRef.current.style.height = 'auto';
    setLoading(true);

    try {
      const response = await fetch('/api/chat', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({
          message: text.trim(),
          history: formatHistory([...messages, userMsg]),
          systemPrompt: SYSTEM_PROMPT,
        }),
      });
      const data = await response.json();
      const reply = data.reply || data.message || 'Je suis là pour vous soutenir. Pouvez-vous me donner plus de détails ?';
      setMessages(prev => [...prev, { id: (Date.now() + 1).toString(), role: 'assistant', content: reply, timestamp: new Date() }]);
    } catch {
      setMessages(prev => [...prev, {
        id: (Date.now() + 1).toString(), role: 'assistant',
        content: 'Je rencontre une difficulté technique. Mais je suis là — prenez une grande respiration et réessayez dans un instant. 🌿',
        timestamp: new Date(),
      }]);
    } finally {
      setLoading(false);
    }
  };

  const handleKeyDown = (e: React.KeyboardEvent) => {
    if (e.key === 'Enter' && !e.shiftKey) { e.preventDefault(); sendMessage(input); }
  };

  const handleTextareaChange = (e: React.ChangeEvent<HTMLTextAreaElement>) => {
    setInput(e.target.value);
    e.target.style.height = 'auto';
    e.target.style.height = Math.min(e.target.scrollHeight, 140) + 'px';
  };

  const resetChat = () => {
    setMessages([{
      id: '0', role: 'assistant',
      content: `Nouvelle session démarrée. Bonjour ${profile?.displayName || 'vous'} ! Comment puis-je vous aider aujourd'hui ? 🌟`,
      timestamp: new Date(),
    }]);
  };

  return (
    <div className="flex flex-col h-[calc(100vh-140px)] max-h-[900px]">
      {/* Header */}
      <div className="page-heading flex items-start justify-between mb-4">
        <div className="flex items-center gap-3">
          <div className="w-12 h-12 rounded-2xl flex items-center justify-center brain-pulse"
            style={{ background: 'linear-gradient(135deg, #2F6BFF, #19B5FE)', boxShadow: '0 14px 30px rgba(47,107,255,0.35)' }}>
            <Brain size={22} className="text-white" />
          </div>
          <div>
            <h1 className="text-2xl font-black text-white">Coach IA</h1>
            <p className="text-sm" style={{ color: '#AAB6D3' }}>MindCare+ × MindBoost — Assistant thérapeutique IA</p>
          </div>
        </div>
        <button onClick={resetChat} className="btn-secondary flex items-center gap-2 text-sm py-2">
          <RefreshCw size={14} />Nouvelle session
        </button>
      </div>

      {/* Quick prompts */}
      {messages.length <= 1 && (
        <motion.div initial={{ opacity: 0, y: 10 }} animate={{ opacity: 1, y: 0 }} className="grid grid-cols-2 lg:grid-cols-4 gap-3 mb-5">
          {QUICK_PROMPTS.map(qp => (
            <button key={qp.prompt} onClick={() => sendMessage(qp.prompt)}
              className="glass-card p-3 text-left hover:scale-105 transition-all"
              style={{ background: 'rgba(47,107,255,0.04)', borderColor: 'rgba(47,107,255,0.12)' }}>
              <div className="text-lg mb-1">{qp.icon}</div>
              <div className="text-xs font-semibold" style={{ color: '#AAB6D3' }}>{qp.text}</div>
            </button>
          ))}
        </motion.div>
      )}

      {/* Messages */}
      <div className="flex-1 overflow-y-auto custom-scrollbar space-y-4 pr-2 mb-4">
        <AnimatePresence initial={false}>
          {messages.map(msg => (
            <motion.div key={msg.id}
              initial={{ opacity: 0, y: 12, scale: 0.98 }}
              animate={{ opacity: 1, y: 0, scale: 1 }}
              transition={{ duration: 0.25 }}
              className={`flex gap-3 ${msg.role === 'user' ? 'flex-row-reverse' : 'flex-row'}`}>
              <div className={`w-9 h-9 rounded-xl flex items-center justify-center flex-shrink-0 ${
                msg.role === 'assistant'
                  ? 'bg-gradient-to-br from-[#2F6BFF] to-[#19B5FE]'
                  : 'bg-gradient-to-br from-[#00D1C7] to-[#29CC7A]'
              }`} style={{ boxShadow: '0 6px 14px rgba(0,0,0,0.25)' }}>
                {msg.role === 'assistant' ? <Sparkles size={16} className="text-white" /> : <User size={16} className="text-white" />}
              </div>
              <div className={`max-w-[75%] ${msg.role === 'user' ? 'items-end' : 'items-start'} flex flex-col gap-1`}>
                <div className={`px-4 py-3 rounded-2xl text-sm leading-relaxed ${
                  msg.role === 'assistant'
                    ? 'glass-panel rounded-tl-sm'
                    : 'text-white rounded-tr-sm'
                }`}
                  style={msg.role === 'user' ? {
                    background: 'linear-gradient(135deg, #2F6BFF, #4D83FF)',
                    boxShadow: '0 8px 20px rgba(47,107,255,0.3)'
                  } : {}}>
                  {msg.content}
                </div>
                <span className="text-[10px]" style={{ color: '#7E8DB1' }}>
                  {msg.timestamp.toLocaleTimeString('fr-FR', { hour: '2-digit', minute: '2-digit' })}
                </span>
              </div>
            </motion.div>
          ))}
        </AnimatePresence>

        {loading && (
          <motion.div initial={{ opacity: 0 }} animate={{ opacity: 1 }} className="flex gap-3">
            <div className="w-9 h-9 rounded-xl bg-gradient-to-br from-[#2F6BFF] to-[#19B5FE] flex items-center justify-center">
              <Loader2 size={16} className="text-white animate-spin" />
            </div>
            <div className="glass-panel px-4 py-3 rounded-2xl rounded-tl-sm">
              <div className="flex gap-1 items-center h-4">
                {[0,1,2].map(i => (
                  <div key={i} className="w-2 h-2 rounded-full bg-[#4D83FF]"
                    style={{ animation: `bounce 1s ease-in-out ${i * 0.15}s infinite` }} />
                ))}
              </div>
            </div>
          </motion.div>
        )}
        <div ref={bottomRef} />
      </div>

      {/* Input */}
      <div className="glass-panel p-3 flex gap-3 items-end"
        style={{ background: 'rgba(11,23,48,0.7)', backdropFilter: 'blur(20px)' }}>
        <textarea
          ref={textareaRef}
          value={input}
          onChange={handleTextareaChange}
          onKeyDown={handleKeyDown}
          placeholder="Partagez vos pensées... (Entrée pour envoyer)"
          rows={1}
          disabled={loading}
          className="flex-1 bg-transparent border-none outline-none text-white text-sm resize-none leading-relaxed custom-scrollbar placeholder:text-[#7E8DB1]"
          style={{ minHeight: '24px', maxHeight: '140px', color: 'white' }}
        />
        <button onClick={() => sendMessage(input)} disabled={!input.trim() || loading}
          className="w-10 h-10 rounded-xl flex items-center justify-center flex-shrink-0 transition-all"
          style={{
            background: input.trim() && !loading ? 'linear-gradient(135deg, #2F6BFF, #4D83FF)' : 'rgba(255,255,255,0.06)',
            boxShadow: input.trim() && !loading ? '0 8px 20px rgba(47,107,255,0.35)' : 'none',
            opacity: !input.trim() || loading ? 0.5 : 1,
          }}>
          <Send size={16} className="text-white" />
        </button>
      </div>

      <style>{`
        @keyframes bounce {
          0%, 100% { transform: translateY(0); }
          50% { transform: translateY(-4px); }
        }
      `}</style>
    </div>
  );
}
