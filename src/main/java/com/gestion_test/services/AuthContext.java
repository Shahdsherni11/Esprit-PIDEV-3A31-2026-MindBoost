package com.gestion_test.services;

/**
 * Gère l'utilisateur actuellement connecté
 * À utiliser après que l'utilisateur se connecte (via le module User)
 */
public class AuthContext {
    private static int currentUserId = -1;
    private static String currentEmail = null;
    private static String currentRole = null;
    private static String currentUserName = null;

    /**
     * À appeler après la connexion réussie de l'utilisateur
     * Fourni par le module User de ta collègue
     */
    public static void setCurrentUser(int userId, String email, String role, String userName) {
        currentUserId = userId;
        currentEmail = email;
        currentRole = role;
        currentUserName = userName;
        System.out.println("✅ Utilisateur connecté: " + userName + " (" + role + ")");
    }

    // Getters
    public static int getCurrentUserId() {
        return currentUserId;
    }

    public static String getCurrentEmail() {
        return currentEmail;
    }

    public static String getCurrentRole() {
        return currentRole;
    }

    public static String getCurrentUserName() {
        return currentUserName;
    }

    // Vérifications
    public static boolean isPsychologist() {
        return "psychologist".equals(currentRole);
    }

    public static boolean isUser() {
        return "user".equals(currentRole);
    }

    public static boolean isAdmin() {
        return "admin".equals(currentRole);
    }

    public static boolean isAuthenticated() {
        return currentUserId != -1;
    }

    // Logout
    public static void logout() {
        currentUserId = -1;
        currentEmail = null;
        currentRole = null;
        currentUserName = null;
        System.out.println("✅ Utilisateur déconnecté");
    }
}