package com.gestion_test.controllers;

import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.*;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import com.gestion_test.entities.SpecificTest;
import com.gestion_test.entities.SpecificTest.SpecificQuestion;
import com.gestion_test.services.SpecificTestService;
import com.gestion_test.services.AuthContext;
import com.gestion_test.utils.PermissionUtils;
import com.gestion_test.App;

import java.net.URL;
import java.sql.SQLException;
import java.util.ResourceBundle;

public class SpecificTestViewController implements Initializable {

    @FXML private Label idLabel;
    @FXML private Label categoryLabel;
    @FXML private Label statusLabel;
    @FXML private Label titleLabel;
    @FXML private Label generalTestLabel;
    @FXML private Label descriptionLabel;
    @FXML private ListView<SpecificQuestion> questionsList;
    @FXML private Button editBtn;
    @FXML private Button editBtn2;
    @FXML private Button backBtn;
    @FXML private Button backBtn2;

    private SpecificTest currentTest;
    private ObservableList<SpecificQuestion> questions = FXCollections.observableArrayList();

    @Override
    public void initialize(URL url, ResourceBundle rb) {
        setupActions();
        questionsList.setItems(questions);
    }

    public void loadTest(int testId) {
        try {
            currentTest = SpecificTestService.getSpecificTestById(testId);
            if (currentTest != null) {
                displayTest();
                configureEditButton();
            } else {
                showError("Erreur", "Test non trouvé");
            }
        } catch (SQLException e) {
            showError("Erreur", "Erreur: " + e.getMessage());
        }
    }

    private void displayTest() {
        idLabel.setText(String.valueOf(currentTest.getId()));
        categoryLabel.setText(currentTest.getCategory());
        statusLabel.setText(currentTest.getStatus());
        titleLabel.setText(currentTest.getTitle());
        generalTestLabel.setText(String.valueOf(currentTest.getGeneralTestId()));
        descriptionLabel.setText(currentTest.getDescription() != null ? currentTest.getDescription() : "Aucune description");

        questions.clear();
        if (currentTest.getQuestions() != null) {
            questions.addAll(currentTest.getQuestions());
        }
    }

    private void configureEditButton() {
        if (!PermissionUtils.canModifyTests() || currentTest.getCreatedBy() != AuthContext.getCurrentUserId()) {
            editBtn.setDisable(true);
            editBtn2.setDisable(true);
            editBtn.setTooltip(new Tooltip("Seul le créateur peut modifier"));
            editBtn2.setTooltip(new Tooltip("Seul le créateur peut modifier"));
        }
    }

    private void setupActions() {
        editBtn.setOnAction(e -> editTest());
        editBtn2.setOnAction(e -> editTest());
        backBtn.setOnAction(e -> goBack());
        backBtn2.setOnAction(e -> goBack());
    }

    private void editTest() {
        if (!PermissionUtils.canModifyTests() || currentTest.getCreatedBy() != AuthContext.getCurrentUserId()) {
            showError("Erreur", "Accès refusé");
            return;
        }
        App.loadScene("/com/gestion_test/views/SpecificTest/SpecificTestEdit.fxml", "✏️ " + currentTest.getTitle());
    }

    private void goBack() {
        App.loadScene("/com/gestion_test/views/SpecificTest/SpecificTestList.fxml", "🎯 Tests Spécifiques");
    }

    private void showError(String title, String message) {
        Alert alert = new Alert(Alert.AlertType.ERROR);
        alert.setTitle(title);
        alert.setHeaderText(null);
        alert.setContentText(message);
        alert.showAndWait();
    }
}