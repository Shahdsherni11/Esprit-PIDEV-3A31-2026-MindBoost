package com.gestion_test.controllers;

import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.Label;
import com.gestion_test.App;
import com.gestion_test.services.GeneralTestService;
import com.gestion_test.services.AuthContext;

import java.net.URL;
import java.sql.SQLException;
import java.util.ResourceBundle;

public class DashboardController implements Initializable {

    @FXML
    private Label generalTestsLabel;

    @FXML
    private Label specificTestsLabel;

    @FXML
    private Label usersLabel;

    private GeneralTestService testService;

    @Override
    public void initialize(URL url, ResourceBundle rb) {
        System.out.println("✅ DashboardController initialisé");
        testService = new GeneralTestService();
        loadStatistics();
    }

    /**
     * ✅ Charger les statistiques depuis la BD
     */
    private void loadStatistics() {
        try {
            // Charger le nombre de tests généraux
            int generalTests = testService.getAll().size();
            generalTestsLabel.setText(String.valueOf(generalTests));
            System.out.println("📊 Tests Généraux: " + generalTests);

            // TODO: Charger le nombre de tests spécifiques
            // Pour l'instant, afficher 0
            specificTestsLabel.setText("0");

            // TODO: Charger le nombre d'utilisateurs
            // Pour l'instant, afficher 0
            usersLabel.setText("0");

        } catch (SQLException e) {
            System.err.println("❌ Erreur lors du chargement des statistiques: " + e.getMessage());
            generalTestsLabel.setText("0");
            specificTestsLabel.setText("0");
            usersLabel.setText("0");
        }
    }

    /**
     * ✅ Ouvrir la liste des tests généraux
     */
    @FXML
    private void handleOpenGeneralTests() {
        System.out.println("🔄 Navigation vers Tests Généraux");
        App.loadScene("/views/GeneralTest/GeneralTestList.fxml", "📋 Tests Généraux");
    }

    /**
     * ✅ Ouvrir la liste des tests spécifiques
     */
    @FXML
    private void handleOpenSpecificTests() {
        System.out.println("🔄 Navigation vers Tests Spécifiques");
        App.loadScene("/views/SpecificTest/specificTestList.fxml", "🎯 Tests Spécifiques");
    }
}