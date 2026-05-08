import React, { useState } from 'react';
import { Shield, Users, ClipboardList, MessageCircle, BarChart2, Trophy, Flag, TrendingUp, AlertTriangle } from 'lucide-react';
import { useNavigate, useLocation } from 'react-router-dom';

const SECTIONS = [
  { id: 'dashboard',    label: 'Dashboard',      icon: BarChart2,     color: '#4D83FF' },
  { id: 'users',        label: 'Utilisateurs',   icon: Users,         color: '#19B5FE' },
  { id: 'tests',        label: 'Tests',          icon: ClipboardList, color: '#F7B84B' },
  { id: 'posts',        label: 'Posts',          icon: MessageCircle, color: '#F472B6' },
  { id: 'reports',      label: 'Signalements',   icon: Flag,          color: '#FF5A74' },
  { id: 'achievements', label: 'Achievements',   icon: Trophy,        color: '#29CC7A' },
];

const MOCK_USERS = [
  { id:'u1', name:'Alice Martin',  email:'alice@test.com',   role:'patient',   joined:'2026-03-10', active: true },
  { id:'u2', name:'Bob Dupont',    email:'bob@test.com',     role:'patient',   joined:'2026-04-02', active: true },
  { id:'u3', name:'Dr. Mansour',   email:'doc@test.com',     role:'therapist', joined:'2026-02-15', active: true },
  { id:'u4', name:'Claire Benali', email:'claire@test.com',  role:'patient',   joined:'2026-04-28', active: false },
];

const MOCK_POSTS = [
  { id:'p1', author:'Alice', content:'La respiration 4-4-6 est incroyable !', likes:12, reported:false, date:'2026-05-01' },
  { id:'p2', author:'Bob',   content:'Super plateforme, je me sens mieux.',    likes:8,  reported:true,  date:'2026-05-03' },
];

const ROLE_META: Record<string, { color: string; label: string }> = {
  patient:   { color: '#29CC7A', label: 'Patient'    },
  therapist: { color: '#19B5FE', label: 'Thérapeute' },
  admin:     { color: '#FF5A74', label: 'Admin'       },
};

export default function Admin() {
  const location = useLocation();
  // Determine sub-section from URL /admin/users etc.
  const sub = location.pathname.replace('/admin', '').replace('/', '') || 'dashboard';
  const [activeTab, setActiveTab] = useState(sub);

  const renderContent = () => {
    switch (activeTab) {
      case 'users': return (
        <div>
          <div className="page-heading"><h1>Gestion Utilisateurs</h1><p>{MOCK_USERS.length} comptes enregistrés</p></div>
          <div className="glass-panel overflow-hidden">
            <table className="table w-full">
              <thead><tr><th>Nom</th><th>Email</th><th>Rôle</th><th>Inscrit</th><th>Statut</th></tr></thead>
              <tbody>
                {MOCK_USERS.map(u => (
                  <tr key={u.id}>
                    <td className="font-semibold text-white">{u.name}</td>
                    <td style={{ color: '#AAB6D3' }}>{u.email}</td>
                    <td><span className="badge" style={{ background: `${ROLE_META[u.role].color}20`, color: ROLE_META[u.role].color, border: `1px solid ${ROLE_META[u.role].color}30` }}>{ROLE_META[u.role].label}</span></td>
                    <td style={{ color: '#7E8DB1' }}>{new Date(u.joined).toLocaleDateString('fr-FR')}</td>
                    <td><span className="badge" style={{ background: u.active ? 'rgba(41,204,122,0.15)' : 'rgba(255,90,116,0.15)', color: u.active ? '#29CC7A' : '#FF5A74' }}>{u.active ? 'Actif' : 'Inactif'}</span></td>
                  </tr>
                ))}
              </tbody>
            </table>
          </div>
        </div>
      );
      case 'posts': return (
        <div>
          <div className="page-heading"><h1>Modération Posts</h1><p>{MOCK_POSTS.length} publications</p></div>
          <div className="space-y-3">
            {MOCK_POSTS.map(p => (
              <div key={p.id} className="glass-card p-5 flex items-start gap-4">
                {p.reported && <AlertTriangle size={18} style={{ color: '#FF5A74', flexShrink: 0, marginTop: 2 }} />}
                <div className="flex-1">
                  <div className="flex items-center gap-2 mb-1">
                    <span className="font-bold text-white text-sm">{p.author}</span>
                    <span className="text-xs" style={{ color: '#7E8DB1' }}>{new Date(p.date).toLocaleDateString('fr-FR')}</span>
                    {p.reported && <span className="badge badge-danger text-[10px]">Signalé</span>}
                  </div>
                  <p className="text-sm" style={{ color: '#AAB6D3' }}>{p.content}</p>
                </div>
                <div className="flex gap-2">
                  <button className="btn-secondary py-1.5 px-3 text-xs">Approuver</button>
                  <button className="btn-danger py-1.5 px-3 text-xs" style={{ borderRadius: 12, border: 'none', cursor: 'pointer' }}>Supprimer</button>
                </div>
              </div>
            ))}
          </div>
        </div>
      );
      case 'reports': return (
        <div>
          <div className="page-heading"><h1>Signalements</h1><p>Contenu signalé par la communauté</p></div>
          <div className="glass-panel p-8 text-center">
            <Flag size={40} className="mx-auto mb-3 opacity-30" />
            <p className="font-semibold text-white">1 signalement en attente</p>
            <p className="text-sm mt-1" style={{ color: '#7E8DB1' }}>Le post de Bob Dupont a été signalé par 2 membres.</p>
            <button onClick={() => setActiveTab('posts')} className="btn-primary mt-4">Voir les posts</button>
          </div>
        </div>
      );
      default: return (
        <div>
          <div className="page-heading">
            <div className="flex items-center gap-3"><Shield size={28} style={{ color: '#FF5A74' }} /><h1>Dashboard Admin</h1></div>
            <p>Vue d'ensemble de la plateforme MindBoost × MindCare+</p>
          </div>
          <div className="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
            {[
              { label: 'Utilisateurs', value: MOCK_USERS.length, color: '#4D83FF', icon: Users },
              { label: 'Posts actifs', value: MOCK_POSTS.length, color: '#F472B6', icon: MessageCircle },
              { label: 'Tests passés', value: 47, color: '#F7B84B', icon: ClipboardList },
              { label: 'Signalements', value: 1, color: '#FF5A74', icon: Flag },
            ].map(s => (
              <div key={s.label} className="stat-card">
                <div className="flex items-start justify-between">
                  <div><div className="stat-number" style={{ color: s.color }}>{s.value}</div><div className="stat-label">{s.label}</div></div>
                  <s.icon size={26} style={{ color: s.color, opacity: 0.7 }} />
                </div>
              </div>
            ))}
          </div>
          <div className="grid grid-cols-2 lg:grid-cols-3 gap-4">
            {SECTIONS.filter(s => s.id !== 'dashboard').map(s => (
              <button key={s.id} onClick={() => setActiveTab(s.id)} className="quick-card">
                <s.icon size={22} style={{ color: s.color }} />
                <h5>{s.label}</h5>
                <p>Gérer les {s.label.toLowerCase()}</p>
              </button>
            ))}
          </div>
        </div>
      );
    }
  };

  return (
    <div>
      {/* Sub-nav tabs */}
      <div className="flex gap-2 mb-6 flex-wrap">
        {SECTIONS.map(s => (
          <button key={s.id} onClick={() => setActiveTab(s.id)}
            className="flex items-center gap-2 px-3 py-2 rounded-xl text-xs font-bold transition-all"
            style={activeTab === s.id
              ? { background: `${s.color}20`, border: `1px solid ${s.color}40`, color: s.color }
              : { background: 'rgba(255,255,255,0.04)', border: '1px solid rgba(255,255,255,0.07)', color: '#7E8DB1' }}>
            <s.icon size={13} />{s.label}
          </button>
        ))}
      </div>
      {renderContent()}
    </div>
  );
}
