package com.gestion_test.utils;

/**
 * ✅ CLASSE POUR PASSER LES DONNÉES ENTRE CONTRÔLEURS
 * Permet de transférer l'ID du test sélectionné d'un contrôleur à un autre
 */
public class TestDataHolder {
    private static int selectedGeneralTestId = -1;
    private static int selectedSpecificTestId = -1;

    // ===== GENERAL TEST =====
    /**
     * ✅ DÉFINIR L'ID DU TEST GÉNÉRAL SÉLECTIONNÉ
     */
    public static void setSelectedGeneralTestId(int id) {
        selectedGeneralTestId = id;
        System.out.println("📌 ID Test Général défini: " + id);
    }

    /**
     * ✅ OBTENIR L'ID DU TEST GÉNÉRAL SÉLECTIONNÉ
     */
    public static int getSelectedGeneralTestId() {
        return selectedGeneralTestId;
    }

    /**
     * ✅ RÉINITIALISER LE TEST GÉNÉRAL
     */
    public static void resetGeneralTestId() {
        selectedGeneralTestId = -1;
    }

    // ===== SPECIFIC TEST =====
    /**
     * ✅ DÉFINIR L'ID DU TEST SPÉCIFIQUE SÉLECTIONNÉ
     */
    public static void setSelectedSpecificTestId(int id) {
        selectedSpecificTestId = id;
        System.out.println("📌 ID Test Spécifique défini: " + id);
    }

    /**
     * ✅ OBTENIR L'ID DU TEST SPÉCIFIQUE SÉLECTIONNÉ
     */
    public static int getSelectedSpecificTestId() {
        return selectedSpecificTestId;
    }

    /**
     * ✅ RÉINITIALISER LE TEST SPÉCIFIQUE
     */
    public static void resetSpecificTestId() {
        selectedSpecificTestId = -1;
    }

    // ===== RESET GLOBAL =====
    /**
     * ✅ RÉINITIALISER TOUS LES DONNÉES
     */
    public static void reset() {
        selectedGeneralTestId = -1;
        selectedSpecificTestId = -1;
    }
}