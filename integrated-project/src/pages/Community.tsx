import React, { useEffect } from 'react';
import { ExternalLink, Loader2 } from 'lucide-react';
import { useAuth } from '../context/AuthContext';

export default function Community() {
  const { profile, loading } = useAuth();

  useEffect(() => {
    if (loading) return;
    const params = new URLSearchParams();
    const role = profile?.role === 'admin' ? 'ROLE_ADMIN' : 'ROLE_USER';
    params.set('role', role);
    if (profile?.id) params.set('userId', String(profile.id));
    if (profile?.email) params.set('email', profile.email);
    params.set('target', '/posts');
    window.location.assign(`/session/set?${params.toString()}`);
  }, [loading, profile]);

  return (
    <div className="flex flex-col items-center justify-center min-h-[50vh] text-center gap-3">
      <Loader2 className="animate-spin text-white" size={28} />
      <div className="text-white font-bold">Redirection vers le forum...</div>
      <div className="text-xs" style={{ color: '#7E8DB1' }}>
        Si la redirection échoue, ouvrez le forum directement.
      </div>
      <a href="/posts" className="text-xs font-bold flex items-center gap-1" style={{ color: '#4D83FF' }}>
        Accéder au forum <ExternalLink size={12} />
      </a>
    </div>
  );
}
