package com.gestion_test.controllers;

import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.*;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import com.gestion_test.entities.GeneralTest;
import com.gestion_test.entities.GeneralTest.GeneralQuestion;
import com.gestion_test.services.GeneralTestService;
import com.gestion_test.services.AuthContext;
import com.gestion_test.utils.PermissionUtils;
import com.gestion_test.utils.TestDataHolder;
import com.gestion_test.App;

import java.net.URL;
import java.sql.SQLException;
import java.util.ResourceBundle;

public class GeneralTestViewController implements Initializable {

    @FXML private Label idLabel;
    @FXML private Label createdLabel;
    @FXML private Label titleLabel;
    @FXML private Label descriptionLabel;
    @FXML private ListView<GeneralQuestion> questionsList;
    @FXML private Button editBtn;
    @FXML private Button backBtn;

    private GeneralTest currentTest;
    private ObservableList<GeneralQuestion> questions = FXCollections.observableArrayList();

    @Override
    public void initialize(URL url, ResourceBundle rb) {
        System.out.println("✅ GeneralTestViewController initialisé");
        setupActions();
        questionsList.setItems(questions);

        // ✅ CHARGER LE TEST DEPUIS TestDataHolder
        int testId = TestDataHolder.getSelectedGeneralTestId();
        System.out.println("🔄 ID du test récupéré: " + testId);

        if (testId > 0) {
            loadTest(testId);
        } else {
            System.err.println("❌ Aucun ID de test trouvé!");
            showError("Erreur", "Aucun test sélectionné");
        }
    }

    /**
     * ✅ Charger un test spécifique par ID
     */
    public void loadTest(int testId) {
        try {
            System.out.println("🔄 Chargement du test ID: " + testId);

            currentTest = GeneralTestService.getGeneralTestById(testId);

            if (currentTest != null) {
                displayTest();
                configureEditButton();
                System.out.println("✅ Test chargé: " + currentTest.getTitle());
            } else {
                System.err.println("❌ Test non trouvé avec l'ID: " + testId);
                showError("Erreur", "Test non trouvé");
            }
        } catch (SQLException e) {
            System.err.println("❌ Erreur SQL: " + e.getMessage());
            e.printStackTrace();
            showError("Erreur", "Erreur lors du chargement: " + e.getMessage());
        }
    }

    /**
     * ✅ Afficher les détails du test
     */
    private void displayTest() {
        if (currentTest == null) return;

        idLabel.setText(String.valueOf(currentTest.getId()));

        if (currentTest.getCreatedAt() != null) {
            createdLabel.setText(currentTest.getCreatedAt().toString());
        } else {
            createdLabel.setText("N/A");
        }

        titleLabel.setText(currentTest.getTitle() != null ? currentTest.getTitle() : "N/A");
        descriptionLabel.setText(currentTest.getDescription() != null ? currentTest.getDescription() : "Aucune description");

        questions.clear();
        if (currentTest.getQuestions() != null && !currentTest.getQuestions().isEmpty()) {
            System.out.println("📋 " + currentTest.getQuestions().size() + " question(s) chargée(s)");
            questions.addAll(currentTest.getQuestions());
        } else {
            System.out.println("⚠️ Aucune question pour ce test");
        }
    }

    /**
     * ✅ Configurer le bouton Modifier
     */
    private void configureEditButton() {
        if (currentTest == null) {
            editBtn.setDisable(true);
            editBtn.setTooltip(new Tooltip("Test non chargé"));
            return;
        }

        boolean isOwner = currentTest.getCreatedBy() == AuthContext.getCurrentUserId();
        boolean canModify = PermissionUtils.canModifyTests();

        if (!isOwner || !canModify) {
            editBtn.setDisable(true);
            editBtn.setTooltip(new Tooltip("Seul le créateur du test peut le modifier"));
            System.out.println("⚠️ Édition désactivée (pas propriétaire ou pas permission)");
        } else {
            editBtn.setDisable(false);
            System.out.println("✅ Édition activée");
        }
    }

    /**
     * ✅ Configurer les actions des boutons
     */
    private void setupActions() {
        editBtn.setOnAction(e -> editTest());
        backBtn.setOnAction(e -> goBack());

        System.out.println("✅ Actions des boutons configurées");
    }

    /**
     * ✅ Modifier le test
     */
    private void editTest() {
        if (currentTest == null) {
            showError("Erreur", "Aucun test sélectionné");
            return;
        }

        if (currentTest.getCreatedBy() != AuthContext.getCurrentUserId()) {
            showError("Erreur", "Vous ne pouvez modifier que vos propres tests");
            return;
        }

        if (!PermissionUtils.canModifyTests()) {
            showError("Erreur", PermissionUtils.getAccessDeniedMessage());
            return;
        }

        System.out.println("🔄 Navigation vers l'édition du test: " + currentTest.getTitle());

        // ✅ PASSER L'ID VIA TestDataHolder
        TestDataHolder.setSelectedGeneralTestId(currentTest.getId());
        // ✅ CHEMIN CORRECT (AVEC MAJUSCULES)
        App.loadScene("/views/GeneralTest/GeneralTestEdit.fxml",
                "✏️ Modifier - " + currentTest.getTitle());
    }

    /**
     * ✅ Retourner à la liste
     */
    private void goBack() {
        System.out.println("🔄 Retour à la liste des tests généraux");
        TestDataHolder.resetGeneralTestId();
        App.loadScene("/views/GeneralTest/GeneralTestList.fxml",
                "📋 Tests Généraux");
    }

    /**
     * ✅ Afficher une alerte d'erreur
     */
    private void showError(String title, String message) {
        System.err.println("❌ " + title + ": " + message);
        Alert alert = new Alert(Alert.AlertType.ERROR);
        alert.setTitle(title);
        alert.setHeaderText(null);
        alert.setContentText(message);
        alert.showAndWait();
    }
}