package com.gestion_test.utils;

import com.gestion_test.services.AuthContext;

/**
 * Classe utilitaire pour vérifier les permissions
 */
public class PermissionUtils {

    // ===== PERMISSIONS TESTS =====

    /**
     * Vérifier si l'utilisateur a le droit de gérer les tests
     */
    public static boolean canManageTests() {
        return AuthContext.isPsychologist() || AuthContext.isAdmin();
    }

    /**
     * Vérifier si l'utilisateur a le droit de créer des tests
     */
    public static boolean canCreateTests() {
        return AuthContext.isPsychologist() || AuthContext.isAdmin();
    }

    /**
     * Vérifier si l'utilisateur a le droit de modifier des tests
     */
    public static boolean canModifyTests() {
        return AuthContext.isPsychologist() || AuthContext.isAdmin();
    }

    /**
     * Vérifier si l'utilisateur a le droit de supprimer des tests
     */
    public static boolean canDeleteTests() {
        return AuthContext.isPsychologist() || AuthContext.isAdmin();
    }

    /**
     * Vérifier si l'utilisateur a le droit de passer des tests
     */
    public static boolean canTakeTests() {
        return AuthContext.isUser() || AuthContext.isAdmin();
    }

    // ===== PERMISSIONS UTILISATEUR =====

    /**
     * Vérifier si l'utilisateur est authentifié
     */
    public static boolean isAuthenticated() {
        return AuthContext.isAuthenticated();
    }

    /**
     * Vérifier si l'utilisateur est psychologue
     */
    public static boolean isPsychologist() {
        return AuthContext.isPsychologist();
    }

    /**
     * Vérifier si l'utilisateur est administrateur
     */
    public static boolean isAdmin() {
        return AuthContext.isAdmin();
    }

    /**
     * Vérifier si l'utilisateur est utilisateur normal
     */
    public static boolean isRegularUser() {
        return AuthContext.isUser();
    }

    // ===== MESSAGES D'ERREUR =====

    /**
     * Message d'accès refusé
     */
    public static String getAccessDeniedMessage() {
        return "❌ Accès Refusé!\n\n" +
                "Vous n'avez pas les permissions nécessaires pour effectuer cette action.\n\n" +
                "Seuls les psychologues et administrateurs peuvent gérer les tests.";
    }

    /**
     * Message non authentifié
     */
    public static String getNotAuthenticatedMessage() {
        return "❌ Non Authentifié!\n\n" +
                "Vous devez être connecté pour accéder à cette page.\n\n" +
                "Veuillez vous connecter d'abord.";
    }

    /**
     * Message test non propriétaire
     */
    public static String getNotOwnerMessage() {
        return "❌ Erreur!\n\n" +
                "Vous ne pouvez modifier/supprimer que vos propres tests.\n\n" +
                "Seul le psychologue qui a créé ce test peut le gérer.";
    }
}