package com.mindboost.services;

import com.mindboost.models.PsychProfile;
import javafx.scene.Scene;
import javafx.scene.layout.Pane;
import javafx.scene.paint.Color;

/**
 * 🔮 Service d'interface adaptive
 * Modifie visuellement l'interface selon le profil psychologique
 */
public class AdaptiveUIService {

    public enum UITheme {
        CALM_BLUE,      // Anxiété élevée → couleurs apaisantes
        ENERGETIC_RED,  // Extraverti, mood haut → couleurs vives
        FOCUS_GREEN,    // Focus élevé → couleurs neutres
        WARM_ORANGE,    // Social, empathique → couleurs chaleureuses
        DEEP_PURPLE     // Analytique, résilient → couleurs profondes
    }

    /** Détermine le thème selon le profil psy */
    public static UITheme determineTheme(PsychProfile profile) {
        if (profile == null) return UITheme.DEEP_PURPLE;

        if (profile.getAnxiety() > 65) return UITheme.CALM_BLUE;
        if (profile.getMood() > 70 && profile.getSociability() > 60) return UITheme.ENERGETIC_RED;
        if (profile.getFocus() > 65) return UITheme.FOCUS_GREEN;
        if (profile.getSociability() > 65) return UITheme.WARM_ORANGE;
        return UITheme.DEEP_PURPLE;
    }

    /** Retourne le CSS inline pour le thème */
    public static String getThemeCSS(UITheme theme) {
        return switch (theme) {
            case CALM_BLUE -> """
                .main-bg { -fx-background-color: linear-gradient(to bottom right, #0D1B2A, #1B2B4A, #1E3A5F); }
                .sidebar { -fx-background-color: linear-gradient(to bottom, #060D14, #0D1B2A); }
                .btn-primary { -fx-background-color: linear-gradient(to right, #2980B9, #1A5276); }
                """;
            case ENERGETIC_RED -> """
                .main-bg { -fx-background-color: linear-gradient(to bottom right, #1A0A0A, #2D1010, #3D1515); }
                .sidebar { -fx-background-color: linear-gradient(to bottom, #0D0505, #1A0A0A); }
                .btn-primary { -fx-background-color: linear-gradient(to right, #E74C3C, #C0392B); }
                """;
            case FOCUS_GREEN -> """
                .main-bg { -fx-background-color: linear-gradient(to bottom right, #0A1A0A, #0D2B0D, #0F3D0F); }
                .sidebar { -fx-background-color: linear-gradient(to bottom, #050D05, #0A1A0A); }
                .btn-primary { -fx-background-color: linear-gradient(to right, #27AE60, #1E8449); }
                """;
            case WARM_ORANGE -> """
                .main-bg { -fx-background-color: linear-gradient(to bottom right, #1A100A, #2D1E0D, #3D2A10); }
                .sidebar { -fx-background-color: linear-gradient(to bottom, #0D0805, #1A100A); }
                .btn-primary { -fx-background-color: linear-gradient(to right, #E67E22, #CA6F1E); }
                """;
            case DEEP_PURPLE -> """
                .main-bg { -fx-background-color: linear-gradient(to bottom right, #1A1A2E, #16213E, #0F3460); }
                .sidebar { -fx-background-color: linear-gradient(to bottom, #0D0D1A, #1A1A2E); }
                .btn-primary { -fx-background-color: linear-gradient(to right, #6C63FF, #5A52D5); }
                """;
        };
    }

    /** Message de bienvenue personnalisé selon le profil */
    public static String getPersonalizedWelcome(PsychProfile profile, String name) {
        if (profile == null) return "Bienvenue, " + name + " ! 🌟";

        if (profile.getAnxiety() > 65)
            return "Bonjour " + name + " 😊 Prenez le temps qu'il vous faut...";
        if (profile.getMood() > 70)
            return "Quelle énergie aujourd'hui, " + name + " ! 🚀";
        if (profile.getFocus() > 65)
            return "Prêt à accomplir de grandes choses, " + name + " ! 🎯";
        if (profile.getSociability() > 65)
            return "Heureux de vous revoir, " + name + " ! 💙";
        return "Bienvenue, " + name + " ! 🌟";
    }

    /** Taille de police recommandée (plus grand si anxieux) */
    public static int getRecommendedFontSize(PsychProfile profile) {
        if (profile == null) return 14;
        if (profile.getAnxiety() > 70) return 16; // Police plus grande pour anxieux
        if (profile.getFocus() > 70) return 13;   // Plus compact pour focus
        return 14;
    }

    /** Contexte psychologique pour le MindBot */
    public static String buildPsychContext(PsychProfile profile) {
        if (profile == null) return "Profil non encore analysé.";
        return String.format(
            "Type: %s | Anxiété: %.0f%% | Résilience: %.0f%% | Sociabilité: %.0f%% | " +
            "Concentration: %.0f%% | Humeur: %.0f%% | Score anomalie: %.0f%%",
            profile.getDetectedType(), profile.getAnxiety(), profile.getResilience(),
            profile.getSociability(), profile.getFocus(), profile.getMood(), profile.getAnomalyScore()
        );
    }
}
