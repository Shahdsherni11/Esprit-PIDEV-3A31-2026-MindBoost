package com.gestion_test.controllers;

import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.Alert;
import javafx.scene.control.Button;
import javafx.scene.control.Label;
import com.gestion_test.entities.SpecificTest;
import com.gestion_test.services.SpecificTestService;
import com.gestion_test.App;

import java.net.URL;
import java.sql.SQLException;
import java.util.ResourceBundle;

public class SpecificTestDeleteController implements Initializable {

    @FXML private Label testTitleLabel;
    @FXML private Label testCategoryLabel;
    @FXML private Button deleteBtn;
    @FXML private Button cancelBtn;

    private SpecificTest currentTest;

    @Override
    public void initialize(URL url, ResourceBundle rb) {
        setupActions();
    }

    public void setTest(SpecificTest test) {
        this.currentTest = test;
        testTitleLabel.setText("Test: " + test.getTitle());
        testCategoryLabel.setText("Categorie: " + test.getCategory());
    }

    private void setupActions() {
        deleteBtn.setOnAction(e -> confirmDelete());
        cancelBtn.setOnAction(e -> cancel());
    }

    private void confirmDelete() {
        try {
            // deleteSpecificTest retourne void, pas boolean
            SpecificTestService.deleteSpecificTest(currentTest.getId());
            showSuccess("Test supprime avec succes");
            goBack();
        } catch (SQLException e) {
            showError("Erreur: " + e.getMessage());
        }
    }

    private void cancel() {
        goBack();
    }

    private void goBack() {
        App.loadScene("/views/SpecificTest/SpecificTestList.fxml", "Tests Specifiques");
    }

    private void showError(String message) {
        Alert alert = new Alert(Alert.AlertType.ERROR);
        alert.setTitle("Erreur");
        alert.setContentText(message);
        alert.showAndWait();
    }

    private void showSuccess(String message) {
        Alert alert = new Alert(Alert.AlertType.INFORMATION);
        alert.setTitle("Succes");
        alert.setContentText(message);
        alert.showAndWait();
    }
}