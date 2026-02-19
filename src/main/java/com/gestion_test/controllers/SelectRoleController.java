package com.gestion_test.controllers;

import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.Button;
import javafx.scene.control.Alert;
import com.gestion_test.services.AuthContext;
import com.gestion_test.App;

import java.net.URL;
import java.util.ResourceBundle;

/**
 * ✅ SÉLECTION DU RÔLE - FLUX ÉTUDIANT CORRIGÉ
 *
 * PSYCHOLOGUE: SelectRole → Dashboard
 * ÉTUDIANT: SelectRole → GeneralTestList (pour PASSER les tests)
 */
public class SelectRoleController implements Initializable {

    @FXML private Button psychologistBtn;
    @FXML private Button studentBtn;

    @Override
    public void initialize(URL url, ResourceBundle rb) {
        System.out.println("\n========================================");
        System.out.println("✅ SelectRoleController initialisé");
        System.out.println("========================================\n");

        psychologistBtn.setOnAction(e -> loginAsPsychologist());
        studentBtn.setOnAction(e -> loginAsStudent());
    }

    /**
     * ✅ PSYCHOLOGUE → Dashboard (CRUD des tests)
     */
    private void loginAsPsychologist() {
        System.out.println("\n========================================");
        System.out.println("🔐 CONNEXION: PSYCHOLOGUE");
        System.out.println("========================================\n");

        try {
            AuthContext.setCurrentUser(1, "psychologue@mindboost.com", "psychologist", "Dr. Michel Dupont");

            System.out.println("✅ Connexion réussie!");
            System.out.println("👤 Dr. Michel Dupont | 📂 Psychologue");
            System.out.println("📄 Navigation: Dashboard (Gestion des tests)\n");

            App.loadScene("/views/Dashboard.fxml", "🧠 Dashboard Psychologue");
        } catch (Exception e) {
            showError("Erreur", "Impossible de se connecter");
        }
    }

    /**
     * ✅ ÉTUDIANT → GeneralTestList (PASSER les tests)
     * PAS DE DASHBOARD!
     */
    private void loginAsStudent() {
        System.out.println("\n========================================");
        System.out.println("🔐 CONNEXION: ÉTUDIANT");
        System.out.println("========================================\n");

        try {
            AuthContext.setCurrentUser(2, "jean.martin@example.com", "student", "Jean Martin");

            System.out.println("✅ Connexion réussie!");
            System.out.println("👤 Jean Martin | 📂 Étudiant");
            System.out.println("📄 Navigation: Liste des Tests Généraux\n");

            // ✅ DIRECT à la liste des tests (PAS de Dashboard!)
            App.loadScene("/views/GeneralTest/GeneralTestList.fxml", "📋 Tests Généraux");
        } catch (Exception e) {
            showError("Erreur", "Impossible de se connecter");
        }
    }

    private void showError(String title, String message) {
        Alert alert = new Alert(Alert.AlertType.ERROR);
        alert.setTitle(title);
        alert.setHeaderText(null);
        alert.setContentText(message);
        alert.showAndWait();
    }
}