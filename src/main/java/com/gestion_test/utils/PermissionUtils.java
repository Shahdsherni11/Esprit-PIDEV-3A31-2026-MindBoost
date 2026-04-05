package com.gestion_test.utils;

import com.gestion_test.services.AuthContext;

public class PermissionUtils {

    public static boolean isPsychologist() {
        return AuthContext.isPsychologist();
    }

    public static boolean isStudent() {
        return AuthContext.isStudent();
    }

    public static boolean isUser() {
        return AuthContext.isUser();
    }

    public static boolean isAdmin() {
        return AuthContext.isAdmin();
    }

    public static boolean isAuthenticated() {
        return AuthContext.isAuthenticated();
    }

    public static boolean hasRole(String role) {
        return AuthContext.hasRole(role);
    }

    public static boolean canCreateTests() {
        return isPsychologist();
    }

    public static boolean canModifyTests() {
        return isPsychologist();
    }

    public static boolean canDeleteTests() {
        return isPsychologist();
    }

    public static boolean canTakeTests() {
        return isStudent() || isUser();
    }

    public static boolean canViewResults() {
        return isPsychologist() || isAdmin();
    }

    public static boolean canManageUsers() {
        return isAdmin();
    }

    public static boolean canAccessResource(String resource) {
        if (!isAuthenticated()) return false;

        String res = resource.toUpperCase();
        if ("CREATE_TEST".equals(res)) return canCreateTests();
        if ("MODIFY_TEST".equals(res)) return canModifyTests();
        if ("DELETE_TEST".equals(res)) return canDeleteTests();
        if ("TAKE_TEST".equals(res)) return canTakeTests();
        if ("VIEW_RESULTS".equals(res)) return canViewResults();
        if ("MANAGE_USERS".equals(res)) return canManageUsers();
        return false;
    }

    public static String getAccessDeniedMessage() {
        String role = AuthContext.getCurrentRole();
        if (role == null) role = "unknown";

        String r = role.toLowerCase();
        if ("psychologist".equals(r)) return "Acces refuse: Cette action necessite les permissions d'administrateur";
        if ("student".equals(r) || "user".equals(r)) return "Acces refuse: Seuls les psychologues peuvent effectuer cette action";
        if ("admin".equals(r)) return "Acces refuse: Permission insuffisante";
        return "Acces refuse: Vous n'etes pas autorise a acceder a cette ressource";
    }

    public static String getPermissionDeniedFor(String action) {
        if (action == null) return getAccessDeniedMessage();

        String a = action.toUpperCase();
        if ("CREATE".equals(a)) return "Seuls les psychologues peuvent creer des tests";
        if ("MODIFY".equals(a)) return "Seuls les psychologues peuvent modifier les tests";
        if ("DELETE".equals(a)) return "Seuls les psychologues peuvent supprimer les tests";
        if ("TAKE".equals(a)) return "Seuls les etudiants peuvent passer les tests";
        if ("VIEW_RESULTS".equals(a)) return "Seuls les psychologues et administrateurs peuvent voir les resultats";
        return getAccessDeniedMessage();
    }

    public static void logAccessDenied(String action) {
        System.err.println("ACCES REFUSE");
        System.err.println("   Utilisateur: " + AuthContext.getCurrentUserName());
        System.err.println("   Role: " + AuthContext.getCurrentRole());
        System.err.println("   Action tentee: " + action);
    }

    public static boolean checkPermission(String action) {
        if (!canAccessResource(action)) {
            logAccessDenied(action);
            return false;
        }
        return true;
    }
}