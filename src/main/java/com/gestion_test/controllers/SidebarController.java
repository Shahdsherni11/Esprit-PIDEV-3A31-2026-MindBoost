package com.gestion_test.controllers;

import javafx.fxml.FXML;
import com.gestion_test.services.AuthContext;
import com.gestion_test.App;

public class SidebarController {

    @FXML
    private void handleOpenGeneralTests() {
        App.loadScene("/views/GeneralTest/GeneralTestList.fxml", "Tests Generaux");
    }

    @FXML
    private void handleOpenSpecificTests() {
        App.loadScene("/views/SpecificTest/SpecificTestList.fxml", "Tests Specifiques");
    }

    @FXML
    private void handleOpenStatistics() {
        if (AuthContext.isStudent() || AuthContext.isUser()) {
            App.loadScene("/views/StudentStats.fxml", "Mes Statistiques");
        } else {
            App.loadScene("/views/Statistics.fxml", "Statistiques");
        }
    }

    @FXML
    private void handleLogout() {
        AuthContext.logout();
        App.loadScene("/views/SelectRole.fxml", "MindBoost");
    }
}