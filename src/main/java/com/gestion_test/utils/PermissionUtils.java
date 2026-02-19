package com.gestion_test.utils;

import com.gestion_test.services.AuthContext;

/**
 * ✅ UTILITAIRE POUR VÉRIFIER LES PERMISSIONS
 *
 * Fournit toutes les méthodes de vérification des permissions
 * pour l'application
 */
public class PermissionUtils {

    // ===== VÉRIFICATIONS DE RÔLE =====

    /**
     * ✅ Vérifier si l'utilisateur est psychologue
     */
    public static boolean isPsychologist() {
        return AuthContext.isPsychologist();
    }

    /**
     * ✅ Vérifier si l'utilisateur est étudiant/utilisateur
     */
    public static boolean isStudent() {
        return AuthContext.isStudent();
    }

    /**
     * ✅ Vérifier si l'utilisateur est "user" (alias étudiant)
     */
    public static boolean isUser() {
        return AuthContext.isUser();
    }

    /**
     * ✅ Vérifier si l'utilisateur est administrateur
     */
    public static boolean isAdmin() {
        return AuthContext.isAdmin();
    }

    /**
     * ✅ Vérifier si l'utilisateur est authentifié
     */
    public static boolean isAuthenticated() {
        return AuthContext.isAuthenticated();
    }

    /**
     * ✅ Vérifier si l'utilisateur a un rôle spécifique
     */
    public static boolean hasRole(String role) {
        return AuthContext.hasRole(role);
    }

    // ===== PERMISSIONS DE GESTION DES TESTS =====

    /**
     * ✅ PEUT CRÉER DES TESTS?
     * Seuls les psychologues peuvent créer des tests
     */
    public static boolean canCreateTests() {
        return isPsychologist();
    }

    /**
     * ✅ PEUT MODIFIER DES TESTS?
     * Seuls les psychologues peuvent modifier des tests
     */
    public static boolean canModifyTests() {
        return isPsychologist();
    }

    /**
     * ✅ PEUT SUPPRIMER DES TESTS?
     * Seuls les psychologues peuvent supprimer des tests
     */
    public static boolean canDeleteTests() {
        return isPsychologist();
    }

    /**
     * ✅ PEUT PASSER DES TESTS?
     * Les étudiants/utilisateurs peuvent passer des tests
     */
    public static boolean canTakeTests() {
        return isStudent() || isUser();
    }

    /**
     * ✅ PEUT VOIR LES RÉSULTATS?
     * Les psychologues et admins peuvent voir les résultats
     */
    public static boolean canViewResults() {
        return isPsychologist() || isAdmin();
    }

    /**
     * ✅ PEUT GÉRER LES UTILISATEURS?
     * Seul l'admin peut gérer les utilisateurs
     */
    public static boolean canManageUsers() {
        return isAdmin();
    }

    // ===== PERMISSIONS GÉNÉRALES =====

    /**
     * ✅ Vérifier l'accès à une ressource
     */
    public static boolean canAccessResource(String resource) {
        if (!isAuthenticated()) {
            return false;
        }

        return switch (resource.toUpperCase()) {
            case "CREATE_TEST" -> canCreateTests();
            case "MODIFY_TEST" -> canModifyTests();
            case "DELETE_TEST" -> canDeleteTests();
            case "TAKE_TEST" -> canTakeTests();
            case "VIEW_RESULTS" -> canViewResults();
            case "MANAGE_USERS" -> canManageUsers();
            default -> false;
        };
    }

    // ===== MESSAGES D'ERREUR =====

    /**
     * ✅ Obtenir le message d'accès refusé
     */
    public static String getAccessDeniedMessage() {
        String role = AuthContext.getCurrentRole();

        return switch (role != null ? role.toLowerCase() : "unknown") {
            case "psychologist" -> "❌ Accès refusé: Cette action nécessite les permissions d'administrateur";
            case "student", "user" -> "❌ Accès refusé: Seuls les psychologues peuvent effectuer cette action";
            case "admin" -> "❌ Accès refusé: Permission insuffisante";
            default -> "❌ Accès refusé: Vous n'êtes pas autorisé à accéder à cette ressource";
        };
    }

    /**
     * ✅ Obtenir le message pour une action spécifique
     */
    public static String getPermissionDeniedFor(String action) {
        return switch (action.toUpperCase()) {
            case "CREATE" -> "❌ Seuls les psychologues peuvent créer des tests";
            case "MODIFY" -> "❌ Seuls les psychologues peuvent modifier les tests";
            case "DELETE" -> "❌ Seuls les psychologues peuvent supprimer les tests";
            case "TAKE" -> "❌ Seuls les étudiants peuvent passer les tests";
            case "VIEW_RESULTS" -> "❌ Seuls les psychologues et administrateurs peuvent voir les résultats";
            default -> getAccessDeniedMessage();
        };
    }

    /**
     * ✅ Afficher un log de l'accès refusé
     */
    public static void logAccessDenied(String action) {
        System.err.println("🚫 ACCÈS REFUSÉ");
        System.err.println("   ├─ Utilisateur: " + AuthContext.getCurrentUserName());
        System.err.println("   ├─ Rôle: " + AuthContext.getCurrentRole());
        System.err.println("   └─ Action tentée: " + action);
    }

    /**
     * ✅ Vérifier et afficher un message si accès refusé
     */
    public static boolean checkPermission(String action) {
        if (!canAccessResource(action)) {
            logAccessDenied(action);
            return false;
        }
        return true;
    }
}