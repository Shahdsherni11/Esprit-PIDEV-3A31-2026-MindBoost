package com.gestion_test.services;

/**
 * ✅ GESTIONNAIRE DE CONTEXTE UTILISATEUR (VERSION FINALE)
 *
 * FONCTIONNALITÉS:
 * 1. Gestion du profil utilisateur connecté
 * 2. Vérification des rôles (psychologue, étudiant, admin)
 * 3. Validation de la connexion
 * 4. Gestion de la déconnexion
 * 5. Compatible avec le module User de ta collègue
 *
 * RÔLES SUPPORTÉS:
 * - "psychologist" → Psychologue (création/modification tests)
 * - "student" ou "user" → Étudiant (passage tests)
 * - "admin" → Administrateur (gestion globale)
 */
public class AuthContext {

    // ===== VARIABLES STATIQUES =====
    private static int currentUserId = 1;
    private static String currentEmail = null;
    private static String currentRole = null;
    private static String currentUserName = null;
    private static boolean isAuthenticated = false;

    /**
     * ✅ DÉFINIR L'UTILISATEUR CONNECTÉ
     *
     * À appeler après la connexion réussie de l'utilisateur
     * (Fourni par le module User)
     *
     * @param userId ID unique de l'utilisateur
     * @param email Email de l'utilisateur
     * @param role Rôle ("psychologist", "student", "user", "admin")
     * @param userName Nom complet de l'utilisateur
     */
    public static void setCurrentUser(int userId, String email, String role, String userName) {
        currentUserId = userId;
        currentEmail = email;
        currentRole = role != null ? role.toLowerCase() : null;
        currentUserName = userName;
        isAuthenticated = true;

        System.out.println("✅ CONNEXION RÉUSSIE");
        System.out.println("   ├─ ID: " + userId);
        System.out.println("   ├─ Nom: " + userName);
        System.out.println("   ├─ Email: " + email);
        System.out.println("   └─ Rôle: " + role);
    }

    // ===== GETTERS - INFORMATIONS DE L'UTILISATEUR =====

    /**
     * ✅ OBTENIR L'ID DE L'UTILISATEUR CONNECTÉ
     */
    public static int getCurrentUserId() {
        if (!isAuthenticated) {
            System.err.println("❌ Aucun utilisateur connecté!");
            return -1;
        }
        return currentUserId;
    }

    /**
     * ✅ OBTENIR L'EMAIL DE L'UTILISATEUR CONNECTÉ
     */
    public static String getCurrentEmail() {
        if (!isAuthenticated) {
            System.err.println("❌ Aucun utilisateur connecté!");
            return null;
        }
        return currentEmail;
    }

    /**
     * ✅ OBTENIR LE RÔLE DE L'UTILISATEUR CONNECTÉ
     */
    public static String getCurrentRole() {
        if (!isAuthenticated) {
            System.err.println("❌ Aucun utilisateur connecté!");
            return null;
        }
        return currentRole;
    }

    /**
     * ✅ OBTENIR LE NOM DE L'UTILISATEUR CONNECTÉ
     */
    public static String getCurrentUserName() {
        if (!isAuthenticated) {
            System.err.println("❌ Aucun utilisateur connecté!");
            return null;
        }
        return currentUserName;
    }

    // ===== VÉRIFICATIONS DE RÔLE =====

    /**
     * ✅ VÉRIFIER SI L'UTILISATEUR EST PSYCHOLOGUE
     */
    public static boolean isPsychologist() {
        return isAuthenticated && "psychologist".equals(currentRole);
    }

    /**
     * ✅ VÉRIFIER SI L'UTILISATEUR EST ÉTUDIANT
     * (Compatible avec "student" et "user")
     */
    public static boolean isStudent() {
        return isAuthenticated && ( "user".equals(currentRole));
    }

    /**
     * ✅ VÉRIFIER SI L'UTILISATEUR EST UTILISATEUR/ÉTUDIANT
     */
    public static boolean isUser() {
        return isAuthenticated && ("student".equals(currentRole) || "user".equals(currentRole));
    }

    /**
     * ✅ VÉRIFIER SI L'UTILISATEUR EST ADMINISTRATEUR
     */
    public static boolean isAdmin() {
        return isAuthenticated && "admin".equals(currentRole);
    }

    /**
     * ✅ VÉRIFIER SI L'UTILISATEUR EST AUTHENTIFIÉ
     */
    public static boolean isAuthenticated() {
        return isAuthenticated && currentUserId != -1;
    }

    /**
     * ✅ VÉRIFIER SI LE RÔLE CORRESPOND À UN RÔLE DONNÉ
     */
    public static boolean hasRole(String role) {
        if (!isAuthenticated || role == null) {
            return false;
        }
        return role.toLowerCase().equals(currentRole);
    }

    /**
     * ✅ VÉRIFIER SI L'UTILISATEUR A L'UN DES RÔLES DONNÉS
     */
    public static boolean hasAnyRole(String... roles) {
        if (!isAuthenticated || roles == null || roles.length == 0) {
            return false;
        }
        for (String role : roles) {
            if (role.toLowerCase().equals(currentRole)) {
                return true;
            }
        }
        return false;
    }

    // ===== OPÉRATIONS DE SÉCURITÉ =====

    /**
     * ✅ VÉRIFIER L'AUTHENTIFICATION AVANT UNE ACTION
     * À utiliser dans les contrôleurs pour sécuriser les opérations
     */
    public static void requireAuthentication() throws SecurityException {
        if (!isAuthenticated) {
            System.err.println("❌ Authentification requise!");
            throw new SecurityException("Vous devez être connecté pour accéder à cette ressource");
        }
    }

    /**
     * ✅ VÉRIFIER LE RÔLE AVANT UNE ACTION
     * À utiliser pour les opérations réservées à un rôle
     */
    public static void requireRole(String role) throws SecurityException {
        if (!isAuthenticated) {
            System.err.println("❌ Authentification requise!");
            throw new SecurityException("Vous devez être connecté");
        }
        if (!hasRole(role)) {
            System.err.println("❌ Accès refusé! Rôle requis: " + role);
            throw new SecurityException("Rôle insuffisant pour accéder à cette ressource");
        }
    }

    /**
     * ✅ VÉRIFIER LES RÔLES AVANT UNE ACTION
     */
    public static void requireAnyRole(String... roles) throws SecurityException {
        if (!isAuthenticated) {
            System.err.println("❌ Authentification requise!");
            throw new SecurityException("Vous devez être connecté");
        }
        if (!hasAnyRole(roles)) {
            System.err.println("❌ Accès refusé! Un des rôles requis: " + String.join(", ", roles));
            throw new SecurityException("Rôle insuffisant pour accéder à cette ressource");
        }
    }

    // ===== DÉCONNEXION =====

    /**
     * ✅ DÉCONNECTER L'UTILISATEUR
     */
    public static void logout() {
        if (isAuthenticated) {
            System.out.println("🔓 DÉCONNEXION");
            System.out.println("   └─ Utilisateur: " + currentUserName);
        }

        currentUserId = -1;
        currentEmail = null;
        currentRole = null;
        currentUserName = null;
        isAuthenticated = false;
    }

    // ===== UTILITAIRES DE DÉBOGAGE =====

    /**
     * ✅ AFFICHER LES INFORMATIONS DE L'UTILISATEUR CONNECTÉ
     */
    public static void printCurrentUserInfo() {
        if (!isAuthenticated) {
            System.out.println("❌ Aucun utilisateur connecté");
            return;
        }

        System.out.println("📋 INFORMATIONS UTILISATEUR ACTUEL:");
        System.out.println("   ├─ ID: " + currentUserId);
        System.out.println("   ├─ Nom: " + currentUserName);
        System.out.println("   ├─ Email: " + currentEmail);
        System.out.println("   ├─ Rôle: " + currentRole);
        System.out.println("   ├─ Authentifié: " + isAuthenticated);
        System.out.println("   ├─ Psychologue: " + isPsychologist());
        System.out.println("   ├─ Étudiant: " + isStudent());
        System.out.println("   └─ Admin: " + isAdmin());
    }

    /**
     * ✅ RÉINITIALISER LE CONTEXTE (TESTS UNIQUEMENT)
     */
    public static void reset() {
        System.out.println("🔄 Réinitialisation du contexte utilisateur");
        logout();
    }
}