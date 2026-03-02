package com.gestion_test.controllers;

import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.Button;
import javafx.scene.control.Alert;
import com.gestion_test.services.AuthContext;
import com.gestion_test.App;

import java.net.URL;
import java.util.ResourceBundle;

public class SelectRoleController implements Initializable {

    @FXML private Button psychologistBtn;
    @FXML private Button studentBtn;

    @Override
    public void initialize(URL url, ResourceBundle rb) {
        System.out.println("SelectRoleController initialise");
        psychologistBtn.setOnAction(e -> loginAsPsychologist());
        studentBtn.setOnAction(e -> loginAsStudent());
    }

    private void loginAsPsychologist() {
        System.out.println("Connexion: PSYCHOLOGUE");
        AuthContext.setCurrentUser(1, "psychologue@mindboost.com", "psychologist", "Dr. Michel Dupont");
        App.loadScene("/views/Dashboard.fxml", "Dashboard Psychologue");
    }

    private void loginAsStudent() {
        System.out.println("Connexion: ETUDIANT");
        AuthContext.setCurrentUser(1, "hamdibac2023@gmail.com", "user", "hassen");
        // ETUDIANT va directement aux Tests Generaux
        App.loadScene("/views/GeneralTest/GeneralTestList.fxml", "Tests Generaux");
    }

    private void showError(String title, String message) {
        Alert alert = new Alert(Alert.AlertType.ERROR);
        alert.setTitle(title);
        alert.setHeaderText(null);
        alert.setContentText(message);
        alert.showAndWait();
    }
}