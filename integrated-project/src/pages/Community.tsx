import React, { useEffect } from 'react';
import { ExternalLink, Loader2 } from 'lucide-react';

const FORUM_PATH = '/posts';

export default function Community() {
  useEffect(() => {
    const forumUrl = new URL(FORUM_PATH, window.location.origin).toString();
    window.location.replace(forumUrl);
  }, []);

  return (
    <div className="flex flex-col items-center justify-center min-h-[50vh] text-center gap-3">
      <Loader2 className="animate-spin text-white" size={28} />
      <div className="text-white font-bold">Redirection vers le forum...</div>
      <div className="text-xs" style={{ color: '#7E8DB1' }}>
        Si la redirection échoue, ouvrez le forum directement.
      </div>
      <a
        href={FORUM_PATH}
        aria-label="Accéder manuellement au forum si la redirection échoue"
        className="text-xs font-bold flex items-center gap-1"
        style={{ color: '#4D83FF' }}
      >
        Accéder au forum <ExternalLink size={12} />
      </a>
    </div>
  );
}
