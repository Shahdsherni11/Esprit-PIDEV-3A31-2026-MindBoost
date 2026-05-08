import React, { useState } from 'react';
import { useNavigate, useLocation } from 'react-router-dom';
import { useAuth } from '../../context/AuthContext';
import { motion, AnimatePresence } from 'motion/react';
import {
  LayoutDashboard, Brain, Target, Headphones, Activity, MessageSquare,
  Book, Users, Calendar, Stethoscope, Shield, User, LogOut, Menu, X,
  Cpu, Wind, ChevronDown, ChevronRight, Sparkles, Bell, Search, ArrowRight,
  FlaskConical, CheckSquare, FileText, BarChart2, Trophy, Flag, MessageCircle,
  UserCog, ClipboardList, HelpCircle, ListChecks, Star
} from 'lucide-react';

/* ─── Types ─────────────────────────────────────── */
interface NavItem { icon: React.ElementType; label: string; path: string; roles?: string[]; badge?: string; }
interface NavGroup { label: string; color: string; items: NavItem[]; roles?: string[]; }

/* ─── Navigation structure ──────────────────────── */
const NAV_GROUPS: NavGroup[] = [
  {
    label: 'Tableau de Bord',
    color: '#4D83FF',
    items: [
      { icon: LayoutDashboard, label: 'Accueil',        path: '/dashboard',     roles: ['patient'] },
      { icon: Activity,        label: 'Bio Tendances',  path: '/insights',      roles: ['patient'] },
      { icon: Cpu,             label: 'Carte Neurale',  path: '/constellation', roles: ['patient'] },
    ],
  },
  {
    label: 'Bien-être & Focus',
    color: '#19B5FE',
    roles: ['patient'],
    items: [
      { icon: Target,      label: 'Focus Lab',    path: '/focus' },
      { icon: Headphones,  label: 'Ambiances',    path: '/soundscapes' },
      { icon: Wind,        label: 'Noyau Neural', path: '/kernel' },
    ],
  },
  {
    label: 'IA & Suivi',
    color: '#00D1C7',
    items: [
      { icon: MessageSquare, label: 'Coach IA',     path: '/chat',         roles: ['patient'] },
      { icon: Book,          label: 'Journal',      path: '/journal',      roles: ['patient','therapist'] },
      { icon: Calendar,      label: 'Rendez-vous',  path: '/appointments', roles: ['patient','therapist'] },
    ],
  },
  {
    label: 'Communauté',
    color: '#F472B6',
    items: [
      { icon: Users,         label: 'Forum',        path: '/community',    roles: ['patient','therapist'] },
    ],
  },
  {
    label: 'Tests Psychologiques',
    color: '#F7B84B',
    roles: ['patient'],
    items: [
      { icon: FlaskConical,  label: 'Passer un Test',  path: '/tests' },
      { icon: BarChart2,     label: 'Mes Résultats',   path: '/tests/history' },
      { icon: Star,          label: 'Statistiques',    path: '/tests/stats' },
    ],
  },
  {
    label: 'Productivité',
    color: '#29CC7A',
    roles: ['patient'],
    items: [
      { icon: CheckSquare,   label: 'Mes Tâches',      path: '/taches' },
      { icon: ListChecks,    label: 'Sous-Tâches',     path: '/sous-taches' },
      { icon: Trophy,        label: 'Achievements',    path: '/achievements' },
    ],
  },
  {
    label: 'Espace Clinicien',
    color: '#A78BFA',
    roles: ['therapist'],
    items: [
      { icon: Stethoscope,   label: 'Mes Patients',    path: '/clinic' },
    ],
  },
  {
    label: 'Administration',
    color: '#FF5A74',
    roles: ['admin'],
    items: [
      { icon: Shield,        label: 'Dashboard Admin', path: '/admin' },
      { icon: UserCog,       label: 'Utilisateurs',    path: '/admin/users' },
      { icon: ClipboardList, label: 'Tests',           path: '/admin/tests' },
      { icon: HelpCircle,    label: 'Questions',       path: '/admin/questions' },
      { icon: BarChart2,     label: 'Résultats',       path: '/admin/results' },
      { icon: MessageCircle, label: 'Posts',           path: '/admin/posts' },
      { icon: Flag,          label: 'Signalements',    path: '/admin/reports' },
      { icon: Trophy,        label: 'Achievements',    path: '/admin/achievements' },
    ],
  },
  {
    label: 'Mon Compte',
    color: '#AAB6D3',
    items: [
      { icon: User, label: 'Profil',  path: '/profile' },
    ],
  },
];

/* ─── NavGroup component ────────────────────────── */
function SidebarGroup({ group, role, location, navigate, collapsed, onToggle }:
  { group: NavGroup; role: string; location: any; navigate: any; collapsed: boolean; onToggle: () => void }) {

  if (group.roles && !group.roles.includes(role)) return null;
  const visibleItems = group.items.filter(i => !i.roles || i.roles.includes(role));
  if (!visibleItems.length) return null;

  const isActive = visibleItems.some(i => location.pathname === i.path || location.pathname.startsWith(i.path + '/'));

  return (
    <div className="mb-1">
      <button onClick={onToggle}
        className="w-full flex items-center justify-between px-3 py-2 rounded-xl text-[11px] font-black uppercase tracking-widest transition-all"
        style={{ color: collapsed ? group.color : '#7E8DB1' }}
        onMouseEnter={e => (e.currentTarget.style.color = group.color)}
        onMouseLeave={e => (e.currentTarget.style.color = collapsed ? group.color : '#7E8DB1')}>
        <span>{group.label}</span>
        <motion.div animate={{ rotate: collapsed ? 0 : 90 }} transition={{ duration: 0.2 }}>
          <ChevronRight size={12} />
        </motion.div>
      </button>

      <AnimatePresence initial={false}>
        {!collapsed && (
          <motion.div
            initial={{ height: 0, opacity: 0 }}
            animate={{ height: 'auto', opacity: 1 }}
            exit={{ height: 0, opacity: 0 }}
            transition={{ duration: 0.22, ease: 'easeInOut' }}
            style={{ overflow: 'hidden' }}>
            {visibleItems.map(item => {
              const active = location.pathname === item.path || location.pathname.startsWith(item.path + '/');
              return (
                <button key={item.path}
                  onClick={() => navigate(item.path)}
                  className="nav-item w-full"
                  style={active ? {
                    background: `${group.color}18`,
                    border: `1px solid ${group.color}30`,
                    color: 'white',
                  } : {}}>
                  <item.icon size={16} style={{ color: active ? group.color : '#7E8DB1', flexShrink: 0 }} />
                  <span>{item.label}</span>
                  {active && (
                    <div className="absolute right-0 top-[20%] h-[60%] w-[3px] rounded-l-full"
                      style={{ background: group.color, boxShadow: `0 0 8px ${group.color}` }} />
                  )}
                  {item.badge && (
                    <span className="ml-auto text-[10px] font-bold px-1.5 py-0.5 rounded-full"
                      style={{ background: `${group.color}25`, color: group.color }}>
                      {item.badge}
                    </span>
                  )}
                </button>
              );
            })}
          </motion.div>
        )}
      </AnimatePresence>
    </div>
  );
}

/* ─── Main Shell ────────────────────────────────── */
export function Shell({ children }: { children: React.ReactNode }) {
  const navigate = useNavigate();
  const location = useLocation();
  const { profile, logout } = useAuth();
  const role = profile?.role || 'patient';

  const [mobileOpen, setMobileOpen] = useState(false);
  const [search, setSearch] = useState('');
  const [searchOpen, setSearchOpen] = useState(false);

  // Track which groups are collapsed — default all open
  const [collapsed, setCollapsed] = useState<Record<string, boolean>>({});
  const toggle = (label: string) => setCollapsed(c => ({ ...c, [label]: !c[label] }));

  // Search results across all nav items
  const allItems = NAV_GROUPS.flatMap(g =>
    g.items.filter(i => !i.roles || i.roles.includes(role))
      .map(i => ({ ...i, groupLabel: g.label, groupColor: g.color }))
  );
  const searchResults = search.length > 1
    ? allItems.filter(i => i.label.toLowerCase().includes(search.toLowerCase()))
    : [];

  const SidebarContent = () => (
    <div className="flex flex-col h-full">
      {/* Brand */}
      <div className="brand mb-4">
        <div className="brand-icon"><Brain size={26} /></div>
        <div>
          <div className="brand-title">MindBoost</div>
          <div className="brand-subtitle">× MindCare+</div>
        </div>
      </div>

      {/* Search */}
      <button onClick={() => setSearchOpen(true)}
        className="flex items-center gap-2 px-3 py-2.5 rounded-xl mb-4 w-full text-left transition-all"
        style={{ background: 'rgba(255,255,255,0.04)', border: '1px solid rgba(255,255,255,0.07)', color: '#7E8DB1' }}>
        <Search size={13} />
        <span className="text-xs flex-1">Rechercher...</span>
        <kbd className="text-[9px] font-bold px-1.5 py-0.5 rounded-md" style={{ background: 'rgba(255,255,255,0.06)', color: '#7E8DB1' }}>⌘K</kbd>
      </button>

      {/* Nav groups */}
      <nav className="flex-1 overflow-y-auto custom-scrollbar space-y-0 pr-1">
        {NAV_GROUPS.map(group => (
          <SidebarGroup key={group.label} group={group} role={role}
            location={location} navigate={(p: string) => { navigate(p); setMobileOpen(false); }}
            collapsed={!!collapsed[group.label]}
            onToggle={() => toggle(group.label)} />
        ))}
      </nav>

      {/* User + logout */}
      <div className="mt-3 pt-3" style={{ borderTop: '1px solid rgba(255,255,255,0.06)' }}>
        <div className="flex items-center gap-3 px-3 py-2.5 rounded-xl mb-1"
          style={{ background: 'rgba(255,255,255,0.03)' }}>
          <div className="w-8 h-8 rounded-xl flex items-center justify-center text-sm font-black text-white flex-shrink-0 overflow-hidden"
            style={{ background: 'linear-gradient(135deg, #2F6BFF, #19B5FE)' }}>
            {profile?.photoUrl
              ? <img src={profile.photoUrl} className="w-full h-full object-cover" alt="" />
              : (profile?.displayName?.[0] || 'U')}
          </div>
          <div className="min-w-0 flex-1">
            <div className="text-xs font-bold text-white truncate">{profile?.displayName}</div>
            <div className="text-[10px] capitalize" style={{ color: '#7E8DB1' }}>{role}</div>
          </div>
          <button onClick={logout} title="Déconnexion"
            className="transition-colors" style={{ color: 'rgba(255,90,116,0.5)' }}
            onMouseEnter={e => (e.currentTarget.style.color = '#FF5A74')}
            onMouseLeave={e => (e.currentTarget.style.color = 'rgba(255,90,116,0.5)')}>
            <LogOut size={15} />
          </button>
        </div>
      </div>
    </div>
  );

  return (
    <div className="app-layout main-bg">
      {/* Desktop sidebar */}
      <aside className="sidebar hidden lg:flex flex-col" style={{ width: 260 }}>
        <SidebarContent />
      </aside>

      {/* Main content */}
      <main className="flex-1 flex flex-col min-h-screen overflow-hidden">

        {/* Topbar */}
        <header className="topbar" style={{ padding: '0.9rem 1.5rem' }}>
          <div className="flex items-center gap-3">
            <button className="lg:hidden text-white" onClick={() => setMobileOpen(true)}>
              <Menu size={22} />
            </button>
            <div>
              <h2 style={{ fontSize: '1rem' }}>
                {allItems.find(i => location.pathname === i.path || location.pathname.startsWith(i.path + '/'))?.label || 'MindBoost'}
              </h2>
              <p style={{ fontSize: '.78rem' }}>
                {allItems.find(i => location.pathname === i.path)?.groupLabel || 'Plateforme intégrée de bien-être mental'}
              </p>
            </div>
          </div>
          <div className="flex items-center gap-3">
            <button className="relative" style={{ color: '#7E8DB1' }}
              onMouseEnter={e => (e.currentTarget.style.color = 'white')}
              onMouseLeave={e => (e.currentTarget.style.color = '#7E8DB1')}>
              <Bell size={19} />
              <div className="absolute top-0 right-0 w-2 h-2 rounded-full" style={{ background: '#F7B84B', border: '2px solid #07101D' }} />
            </button>
            <button onClick={() => navigate('/profile')} className="flex items-center gap-2 group">
              <div className="w-8 h-8 rounded-xl overflow-hidden flex items-center justify-center text-sm font-black text-white"
                style={{ background: 'linear-gradient(135deg, #2F6BFF, #19B5FE)' }}>
                {profile?.photoUrl ? <img src={profile.photoUrl} className="w-full h-full object-cover" alt="" /> : (profile?.displayName?.[0] || 'U')}
              </div>
            </button>
          </div>
        </header>

        {/* Page content */}
        <section className="flex-1 p-5 lg:p-8 overflow-y-auto custom-scrollbar">
          <AnimatePresence mode="wait">
            <motion.div key={location.pathname}
              initial={{ opacity: 0, y: 10 }} animate={{ opacity: 1, y: 0 }}
              exit={{ opacity: 0, y: -8 }} transition={{ duration: 0.2 }}>
              <div className="max-w-7xl mx-auto">{children}</div>
            </motion.div>
          </AnimatePresence>
        </section>
      </main>

      {/* FAB */}
      {location.pathname !== '/chat' && (
        <motion.button whileHover={{ scale: 1.1 }} whileTap={{ scale: 0.9 }}
          onClick={() => navigate('/chat')}
          className="fixed bottom-6 right-6 z-50 w-13 h-13 rounded-full text-white flex items-center justify-center"
          style={{ background: 'linear-gradient(135deg,#2F6BFF,#19B5FE)', boxShadow: '0 16px 40px rgba(47,107,255,0.45)', width: 52, height: 52 }}>
          <MessageSquare size={20} />
          <div className="absolute -top-1 -right-1 w-4 h-4 bg-[#F7B84B] rounded-full border-2 border-[#07101D] flex items-center justify-center">
            <Sparkles size={7} className="text-white" />
          </div>
        </motion.button>
      )}

      {/* Search modal */}
      <AnimatePresence>
        {searchOpen && (
          <motion.div initial={{ opacity: 0 }} animate={{ opacity: 1 }} exit={{ opacity: 0 }}
            className="fixed inset-0 z-[200] flex items-start justify-center pt-[12vh] px-4"
            style={{ background: 'rgba(7,16,29,0.85)', backdropFilter: 'blur(12px)' }}
            onClick={() => { setSearchOpen(false); setSearch(''); }}>
            <motion.div initial={{ scale: 0.95, y: 16 }} animate={{ scale: 1, y: 0 }} exit={{ scale: 0.95, y: 16 }}
              className="w-full max-w-xl overflow-hidden"
              style={{ background: '#0B1730', border: '1px solid rgba(47,107,255,0.2)', borderRadius: '24px', boxShadow: '0 30px 80px rgba(0,0,0,0.6)' }}
              onClick={e => e.stopPropagation()}>
              <div className="flex items-center gap-3 p-4 border-b" style={{ borderColor: 'rgba(255,255,255,0.06)' }}>
                <Search size={16} style={{ color: '#7E8DB1' }} />
                <input autoFocus value={search} onChange={e => setSearch(e.target.value)}
                  placeholder="Rechercher une section..." className="flex-1 bg-transparent border-none outline-none text-white text-sm font-medium placeholder:text-[#7E8DB1]" />
                <kbd onClick={() => { setSearchOpen(false); setSearch(''); }}
                  className="text-[10px] font-bold px-2 py-1 rounded-md cursor-pointer"
                  style={{ background: 'rgba(255,255,255,0.06)', color: '#7E8DB1' }}>ESC</kbd>
              </div>
              <div className="p-3 max-h-[55vh] overflow-y-auto custom-scrollbar">
                {search.length < 2 ? (
                  NAV_GROUPS.filter(g => !g.roles || g.roles.includes(role)).map(g => (
                    <div key={g.label} className="mb-3">
                      <div className="text-[10px] font-black uppercase tracking-widest px-2 py-1 mb-1" style={{ color: g.color }}>{g.label}</div>
                      {g.items.filter(i => !i.roles || i.roles.includes(role)).map(item => (
                        <button key={item.path}
                          onClick={() => { navigate(item.path); setSearchOpen(false); setSearch(''); }}
                          className="flex items-center gap-3 w-full p-3 rounded-xl text-left transition-all"
                          style={{ color: '#AAB6D3' }}
                          onMouseEnter={e => { e.currentTarget.style.background = `${g.color}12`; e.currentTarget.style.color = 'white'; }}
                          onMouseLeave={e => { e.currentTarget.style.background = ''; e.currentTarget.style.color = '#AAB6D3'; }}>
                          <item.icon size={15} style={{ color: g.color }} />
                          <span className="text-sm font-semibold">{item.label}</span>
                          <ArrowRight size={12} className="ml-auto opacity-40" />
                        </button>
                      ))}
                    </div>
                  ))
                ) : searchResults.length ? (
                  searchResults.map(item => (
                    <button key={item.path}
                      onClick={() => { navigate(item.path); setSearchOpen(false); setSearch(''); }}
                      className="flex items-center gap-3 w-full p-3 rounded-xl text-left transition-all"
                      style={{ color: '#AAB6D3' }}
                      onMouseEnter={e => { e.currentTarget.style.background = 'rgba(47,107,255,0.10)'; e.currentTarget.style.color = 'white'; }}
                      onMouseLeave={e => { e.currentTarget.style.background = ''; e.currentTarget.style.color = '#AAB6D3'; }}>
                      <item.icon size={15} style={{ color: (item as any).groupColor }} />
                      <div>
                        <div className="text-sm font-semibold">{item.label}</div>
                        <div className="text-[10px]" style={{ color: '#7E8DB1' }}>{(item as any).groupLabel}</div>
                      </div>
                      <ArrowRight size={12} className="ml-auto opacity-40" />
                    </button>
                  ))
                ) : (
                  <p className="text-center py-6 text-sm" style={{ color: '#7E8DB1' }}>Aucun résultat pour « {search} »</p>
                )}
              </div>
            </motion.div>
          </motion.div>
        )}
      </AnimatePresence>

      {/* Mobile drawer */}
      <AnimatePresence>
        {mobileOpen && (
          <>
            <motion.div initial={{ opacity: 0 }} animate={{ opacity: 1 }} exit={{ opacity: 0 }}
              className="fixed inset-0 z-[100]" style={{ background: 'rgba(0,0,0,0.7)', backdropFilter: 'blur(4px)' }}
              onClick={() => setMobileOpen(false)} />
            <motion.aside initial={{ x: '-100%' }} animate={{ x: 0 }} exit={{ x: '-100%' }}
              transition={{ type: 'tween', duration: 0.25 }}
              className="fixed left-0 top-0 bottom-0 z-[101] sidebar flex flex-col" style={{ width: 270 }}>
              <div className="flex items-center justify-between mb-4">
                <div className="flex items-center gap-3">
                  <div className="brand-icon w-10 h-10 rounded-xl" style={{ display: 'flex', alignItems: 'center', justifyContent: 'center' }}>
                    <Brain size={20} />
                  </div>
                  <div className="brand-title text-lg">MindBoost</div>
                </div>
                <button onClick={() => setMobileOpen(false)} style={{ color: '#7E8DB1' }}><X size={20} /></button>
              </div>
              <SidebarContent />
            </motion.aside>
          </>
        )}
      </AnimatePresence>
    </div>
  );
}
