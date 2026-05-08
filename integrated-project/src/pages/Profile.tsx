import React, { useState } from 'react';
import { User, Mail, Lock, Camera, Save, Shield } from 'lucide-react';
import { useAuth } from '../context/AuthContext';
import { motion } from 'motion/react';

export default function Profile() {
  const { profile, user } = useAuth();
  const [tab, setTab] = useState<'info'|'security'>('info');
  const [displayName, setDisplayName] = useState(profile?.displayName || '');
  const [saved, setSaved] = useState(false);

  const handleSave = async () => {
    setSaved(true);
    setTimeout(() => setSaved(false), 2000);
  };

  const roleColor = profile?.role === 'admin' ? '#FF5A74' : profile?.role === 'therapist' ? '#19B5FE' : '#29CC7A';

  return (
    <div>
      <div className="page-heading">
        <div className="flex items-center gap-3"><User size={28} style={{ color: '#4D83FF' }} /><h1>Mon Profil</h1></div>
        <p>Gérez vos informations personnelles et paramètres de sécurité</p>
      </div>

      {/* Profile card */}
      <div className="glass-panel p-6 mb-6 flex items-center gap-5">
        <div className="relative">
          <div className="w-20 h-20 rounded-2xl flex items-center justify-center text-white text-2xl font-black"
            style={{ background: 'linear-gradient(135deg, #2F6BFF, #19B5FE)', boxShadow: '0 14px 30px rgba(47,107,255,0.35)' }}>
            {profile?.photoUrl ? <img src={profile.photoUrl} className="w-full h-full object-cover rounded-2xl" alt="" />
              : (profile?.displayName?.[0] || 'U')}
          </div>
          <button className="absolute -bottom-1 -right-1 w-7 h-7 rounded-lg flex items-center justify-center"
            style={{ background: 'linear-gradient(135deg, #2F6BFF, #4D83FF)' }}>
            <Camera size={12} className="text-white" />
          </button>
        </div>
        <div>
          <h2 className="text-xl font-black text-white">{profile?.displayName || 'Utilisateur'}</h2>
          <p className="text-sm" style={{ color: '#AAB6D3' }}>{user?.email}</p>
          <span className="badge mt-2" style={{ background: `${roleColor}20`, color: roleColor, border: `1px solid ${roleColor}40` }}>
            {profile?.role || 'patient'}
          </span>
        </div>
      </div>

      {/* Tabs */}
      <div className="flex gap-2 mb-6">
        {[{ id: 'info', label: 'Informations', icon: User }, { id: 'security', label: 'Sécurité', icon: Shield }].map(t => (
          <button key={t.id} onClick={() => setTab(t.id as any)}
            className={`flex items-center gap-2 px-4 py-2.5 rounded-xl text-sm font-bold transition-all ${tab === t.id ? 'btn-primary' : 'btn-secondary'}`}>
            <t.icon size={14} />{t.label}
          </button>
        ))}
      </div>

      <div className="glass-panel p-6">
        {tab === 'info' ? (
          <div className="space-y-5 max-w-lg">
            <div>
              <label className="block text-xs font-bold mb-1.5" style={{ color: '#AAB6D3' }}>Nom complet</label>
              <div className="relative"><User size={15} className="absolute left-3.5 top-1/2 -translate-y-1/2" style={{ color: '#7E8DB1' }} />
                <input value={displayName} onChange={e => setDisplayName(e.target.value)} className="form-control pl-10" />
              </div>
            </div>
            <div>
              <label className="block text-xs font-bold mb-1.5" style={{ color: '#AAB6D3' }}>Email</label>
              <div className="relative"><Mail size={15} className="absolute left-3.5 top-1/2 -translate-y-1/2" style={{ color: '#7E8DB1' }} />
                <input value={user?.email || ''} disabled className="form-control pl-10 opacity-60" />
              </div>
            </div>
            <button onClick={handleSave} className="btn-primary">
              <Save size={15} />{saved ? 'Sauvegardé ✓' : 'Sauvegarder'}
            </button>
          </div>
        ) : (
          <div className="space-y-5 max-w-lg">
            {['Mot de passe actuel', 'Nouveau mot de passe', 'Confirmer le nouveau'].map((label, i) => (
              <div key={label}>
                <label className="block text-xs font-bold mb-1.5" style={{ color: '#AAB6D3' }}>{label}</label>
                <div className="relative"><Lock size={15} className="absolute left-3.5 top-1/2 -translate-y-1/2" style={{ color: '#7E8DB1' }} />
                  <input type="password" placeholder="••••••••" className="form-control pl-10" />
                </div>
              </div>
            ))}
            <button className="btn-primary"><Save size={15} />Changer le mot de passe</button>
          </div>
        )}
      </div>
    </div>
  );
}
