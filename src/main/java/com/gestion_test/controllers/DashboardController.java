package com.gestion_test.controllers;

import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.Label;
import com.gestion_test.App;
import com.gestion_test.services.GeneralTestService;
import com.gestion_test.services.SpecificTestService;
import com.gestion_test.services.AuthContext;

import java.net.URL;
import java.sql.SQLException;
import java.util.ResourceBundle;

public class DashboardController implements Initializable {

    @FXML private Label generalTestsLabel;
    @FXML private Label specificTestsLabel;
    @FXML private Label usersLabel;

    private GeneralTestService generalTestService;

    @Override
    public void initialize(URL url, ResourceBundle rb) {
        System.out.println("DashboardController initialise");
        generalTestService = new GeneralTestService();
        loadStatistics();
    }

    private void loadStatistics() {
        try {
            int generalTests = generalTestService.getAll().size();
            generalTestsLabel.setText(String.valueOf(generalTests));

            int specificTests = 0;
            try {
                specificTests = SpecificTestService.getAllSpecificTests().size();
            } catch (SQLException e) {
                specificTests = 0;
            }
            specificTestsLabel.setText(String.valueOf(specificTests));

            usersLabel.setText("0");

        } catch (SQLException e) {
            generalTestsLabel.setText("0");
            specificTestsLabel.setText("0");
            usersLabel.setText("0");
        }
    }

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