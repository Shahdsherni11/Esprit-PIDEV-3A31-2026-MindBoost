package com.gestion_test.controllers;

import com.gestion_test.entities.GeneralTest;
import com.gestion_test.services.GeneralTestService;
import javafx.fxml.FXML;
import javafx.scene.control.*;

import java.sql.SQLException;
import java.util.List;
import java.util.Optional;

public class GeneralTestDeleteController {

    @FXML
    private ComboBox<GeneralTest> testComboBox;

    @FXML
    private Label testDetailsLabel;

    @FXML
    private Label testQuestionsLabel;

    @FXML
    private Button deleteButton;

    @FXML
    private Button cancelButton;

    private GeneralTestService testService;

    @FXML
    public void initialize() {
        testService = new GeneralTestService();
        loadTests();

        testComboBox.setOnAction(e -> loadTestDetails());
        deleteButton.setOnAction(e -> deleteTest());
        cancelButton.setOnAction(e -> cancelForm());
    }

    /**
     * ✅ Charger tous les tests disponibles
     */
    private void loadTests() {
        try {
            List<GeneralTest> tests = testService.getAll();
            testComboBox.getItems().clear();
            testComboBox.getItems().addAll(tests);
        } catch (SQLException e) {
            showAlert("❌ Erreur lors du chargement des tests: " + e.getMessage(), Alert.AlertType.ERROR);
        }
    }

    /**
     * ✅ Afficher les détails du test sélectionné (SANS STATUS)
     */
    private void loadTestDetails() {
        GeneralTest selected = testComboBox.getSelectionModel().getSelectedItem();
        if (selected != null) {
            try {
                GeneralTest fullTest = testService.getById(selected.getId());
                if (fullTest != null) {
                    String details = "ID: " + fullTest.getId() + "\n" +
                            "Titre: " + fullTest.getTitle() + "\n" +
                            "Description: " + fullTest.getDescription() + "\n" +
                            "Créé le: " + fullTest.getCreatedAt();

                    if (testDetailsLabel != null) {
                        testDetailsLabel.setText(details);
                    }

                    // ✅ Afficher le nombre de questions
                    int questionCount = fullTest.getQuestions() != null ? fullTest.getQuestions().size() : 0;
                    String questionsInfo = "Nombre de questions: " + questionCount;

                    if (testQuestionsLabel != null) {
                        testQuestionsLabel.setText(questionsInfo);
                    }
                }
            } catch (SQLException e) {
                showAlert("❌ Erreur: " + e.getMessage(), Alert.AlertType.ERROR);
            }
        }
    }

    /**
     * ✅ Supprimer le test sélectionné
     */
    private void deleteTest() {
        GeneralTest selected = testComboBox.getSelectionModel().getSelectedItem();

        if (selected == null) {
            showAlert("❌ Veuillez sélectionner un test à supprimer", Alert.AlertType.WARNING);
            return;
        }

        Alert confirmAlert = new Alert(Alert.AlertType.CONFIRMATION);
        confirmAlert.setTitle("Confirmation de suppression");
        confirmAlert.setHeaderText("Êtes-vous sûr ?");
        confirmAlert.setContentText("Voulez-vous vraiment supprimer le test: \"" + selected.getTitle() + "\" ?");

        Optional<ButtonType> result = confirmAlert.showAndWait();

        if (result.isPresent() && result.get() == ButtonType.OK) {
            try {
                boolean success = testService.delete(selected.getId());

                if (success) {
                    String successMessage = "✅ Test supprimé avec succès";
                    showAlert(successMessage, Alert.AlertType.INFORMATION);

                    testComboBox.getItems().remove(selected);
                    clearDetails();
                } else {
                    showAlert("❌ Impossible de supprimer le test", Alert.AlertType.ERROR);
                }

            } catch (SQLException e) {
                showAlert("❌ Erreur lors de la suppression: " + e.getMessage(), Alert.AlertType.ERROR);
                e.printStackTrace();
            }
        }
    }

    /**
     * ✅ Annuler et réinitialiser
     */
    private void cancelForm() {
        testComboBox.getSelectionModel().clearSelection();
        clearDetails();
    }

    /**
     * ✅ Nettoyer les détails affichés
     */
    private void clearDetails() {
        if (testDetailsLabel != null) {
            testDetailsLabel.setText("");
        }
        if (testQuestionsLabel != null) {
            testQuestionsLabel.setText("");
        }
    }

    /**
     * ✅ Afficher une alerte
     */
    private void showAlert(String message, Alert.AlertType type) {
        Alert alert = new Alert(type);
        alert.setTitle("Gestion des Tests");
        alert.setHeaderText(null);
        alert.setContentText(message);
        alert.showAndWait();
    }
}