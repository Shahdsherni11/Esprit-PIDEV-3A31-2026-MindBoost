package com.gestion_test.controllers;

import javafx.fxml.FXML;
import com.gestion_test.App;

public class SidebarController {

    @FXML
    private void handleOpenGeneralTests() {
        App.loadScene("/views/GeneralTest/GeneralTestList.fxml", "📋 Tests Généraux - MindBoost");
    }

    @FXML
    private void handleOpenSpecificTests() {
        System.out.println("🔄 Navigation vers Tests Spécifiques");
        // ✅ CHANGÉ: specificTestList.fxml → SpecificTestList.fxml (AVEC MAJUSCULE S)
        App.loadScene("/views/SpecificTest/SpecificTestList.fxml", "🎯 Tests Spécifiques - MindBoost");
    }

    @FXML
    private void handleLogout() {
        System.out.println("🔓 DÉCONNEXION");
        com.gestion_test.services.AuthContext.logout();
        App.loadScene("/views/Login.fxml", "🧠 MindBoost - Connexion");
    }
}