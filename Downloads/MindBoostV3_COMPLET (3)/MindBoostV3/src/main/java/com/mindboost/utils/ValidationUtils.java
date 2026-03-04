package com.mindboost.utils;

import java.util.regex.Pattern;

public class ValidationUtils {

    private static final Pattern EMAIL_PATTERN =
        Pattern.compile("^[A-Za-z0-9+_.-]+@[A-Za-z0-9.-]+\\.[A-Za-z]{2,}$");
    private static final Pattern PHONE_PATTERN =
        Pattern.compile("^[+]?[0-9]{8,15}$");
    private static final Pattern PASSWORD_PATTERN =
        Pattern.compile("^(?=.*[a-z])(?=.*[A-Z])(?=.*\\d).{8,}$");

    public static boolean isValidEmail(String email) {
        return email != null && EMAIL_PATTERN.matcher(email.trim()).matches();
    }

    public static boolean isValidPhone(String phone) {
        if (phone == null || phone.trim().isEmpty()) return true;
        return PHONE_PATTERN.matcher(phone.trim()).matches();
    }

    public static boolean isValidPassword(String password) {
        return password != null && PASSWORD_PATTERN.matcher(password).matches();
    }

    public static boolean isNotEmpty(String value) {
        return value != null && !value.trim().isEmpty();
    }

    public static boolean isValidUrl(String url) {
        if (url == null || url.trim().isEmpty()) return true;
        return url.startsWith("http://") || url.startsWith("https://");
    }

    public static String validateUser(String email, String password, String role) {
        if (!isValidEmail(email))    return "Email invalide. Format: exemple@domaine.com";
        if (!isValidPassword(password)) return "Mot de passe: min 8 chars, 1 majuscule, 1 chiffre.";
        if (!isNotEmpty(role))       return "Le rôle est obligatoire.";
        return null;
    }

    public static String validateProfile(String firstName, String lastName, String phone, String avatarUrl) {
        if (!isNotEmpty(firstName)) return "Le prénom est obligatoire.";
        if (!isNotEmpty(lastName))  return "Le nom est obligatoire.";
        if (!isValidPhone(phone))   return "Téléphone invalide (8-15 chiffres).";
        if (!isValidUrl(avatarUrl)) return "URL avatar invalide (doit commencer par http:// ou https://).";
        return null;
    }
}
