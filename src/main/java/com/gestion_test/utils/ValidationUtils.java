package com.gestion_test.utils;

import java.util.List;

/**
 * Classe utilitaire pour valider les données
 */
public class ValidationUtils {

    // ===== VALIDATIONS DE CHAÎNES =====

    /**
     * Vérifier si une chaîne est vide ou null
     */
    public static boolean isEmpty(String str) {
        return str == null || str.trim().isEmpty();
    }

    /**
     * Vérifier si une chaîne n'est pas vide
     */
    public static boolean isNotEmpty(String str) {
        return !isEmpty(str);
    }

    /**
     * Vérifier si une chaîne a une longueur minimale
     */
    public static boolean hasMinLength(String str, int minLength) {
        return isNotEmpty(str) && str.trim().length() >= minLength;
    }

    /**
     * Vérifier si une chaîne a une longueur maximale
     */
    public static boolean hasMaxLength(String str, int maxLength) {
        return isEmpty(str) || str.trim().length() <= maxLength;
    }

    /**
     * Vérifier si une chaîne a une longueur dans une plage
     */
    public static boolean hasLengthBetween(String str, int minLength, int maxLength) {
        return hasMinLength(str, minLength) && hasMaxLength(str, maxLength);
    }

    // ===== VALIDATIONS DE NOMBRES =====

    /**
     * Vérifier si un nombre est positif
     */
    public static boolean isPositive(int number) {
        return number > 0;
    }

    /**
     * Vérifier si un nombre est positif ou zéro
     */
    public static boolean isPositiveOrZero(int number) {
        return number >= 0;
    }

    /**
     * Vérifier si un nombre est dans une plage
     */
    public static boolean isInRange(int number, int min, int max) {
        return number >= min && number <= max;
    }

    /**
     * Vérifier si une chaîne est un nombre
     */
    public static boolean isNumber(String str) {
        try {
            Integer.parseInt(str);
            return true;
        } catch (NumberFormatException e) {
            return false;
        }
    }

    /**
     * Vérifier si une chaîne est un nombre avec un minimum
     */
    public static boolean isNumberWithMin(String str, int min) {
        try {
            int num = Integer.parseInt(str);
            return num >= min;
        } catch (NumberFormatException e) {
            return false;
        }
    }

    // ===== VALIDATIONS DE LISTES =====

    /**
     * Vérifier si une liste a une taille minimale
     */
    public static <T> boolean hasMinSize(List<T> list, int minSize) {
        return list != null && list.size() >= minSize;
    }

    /**
     * Vérifier si une liste a une taille maximale
     */
    public static <T> boolean hasMaxSize(List<T> list, int maxSize) {
        return list == null || list.size() <= maxSize;
    }

    /**
     * Vérifier si une liste a une taille dans une plage
     */
    public static <T> boolean hasSizeBetween(List<T> list, int minSize, int maxSize) {
        return hasMinSize(list, minSize) && hasMaxSize(list, maxSize);
    }

    // ===== CONSTRUCTEURS DE MESSAGES =====

    /**
     * Créer un message d'erreur formaté
     */
    public static String buildErrorMessage(String... errors) {
        StringBuilder sb = new StringBuilder();
        for (int i = 0; i < errors.length; i++) {
            sb.append("❌ ").append(errors[i]);
            if (i < errors.length - 1) {
                sb.append("\n");
            }
        }
        return sb.toString();
    }

    /**
     * Créer un message d'erreur pour une liste
     */
    public static String buildListErrorMessage(List<String> errors) {
        StringBuilder sb = new StringBuilder();
        for (int i = 0; i < errors.size(); i++) {
            sb.append("❌ ").append(errors.get(i));
            if (i < errors.size() - 1) {
                sb.append("\n");
            }
        }
        return sb.toString();
    }

    /**
     * Créer un message de succès
     */
    public static String buildSuccessMessage(String title, String... details) {
        StringBuilder sb = new StringBuilder("✅ ").append(title);
        for (String detail : details) {
            sb.append("\n").append("• ").append(detail);
        }
        return sb.toString();
    }
}