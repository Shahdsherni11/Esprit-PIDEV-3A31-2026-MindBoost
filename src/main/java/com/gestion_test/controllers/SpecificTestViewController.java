package com.gestion_test.controllers;

import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.*;
import javafx.scene.layout.VBox;
import javafx.scene.layout.HBox;
import javafx.scene.layout.Region;
import javafx.scene.layout.Priority;
import javafx.geometry.Pos;
import com.gestion_test.entities.SpecificTest;
import com.gestion_test.entities.SpecificTest.SpecificQuestion;
import com.gestion_test.entities.SpecificTest.SpecificAnswer;
import com.gestion_test.services.SpecificTestService;
import com.gestion_test.services.AuthContext;
import com.gestion_test.utils.PermissionUtils;
import com.gestion_test.utils.TestDataHolder;
import com.gestion_test.App;

import java.net.URL;
import java.sql.SQLException;
import java.util.ResourceBundle;

/**
 * ✅ Controller pour voir les détails d'un test spécifique (COMPLET)
 */
public class SpecificTestViewController implements Initializable {

    @FXML private Label idLabel;
    @FXML private Label categoryLabel;
    @FXML private Label statusLabel;
    @FXML private Label createdAtLabel;
    @FXML private Label titleLabel;
    @FXML private Label descriptionLabel;
    @FXML private Label questionsCountLabel;
    @FXML private VBox questionsContainer;
    @FXML private Button editBtn;
    @FXML private Button editBtn2;
    @FXML private Button backBtn;
    @FXML private Button backBtn2;

    private SpecificTest currentTest;

    @Override
    public void initialize(URL url, ResourceBundle rb) {
        System.out.println("✅ SpecificTestViewController initialisé");
        setupActions();

        // ✅ CHARGER LE TEST DEPUIS TestDataHolder
        int testId = TestDataHolder.getSelectedSpecificTestId();
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

            currentTest = SpecificTestService.getSpecificTestById(testId);

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
        categoryLabel.setText(currentTest.getCategory() != null ? currentTest.getCategory() : "N/A");
        statusLabel.setText(currentTest.getStatus() != null ? currentTest.getStatus() : "N/A");

        if (currentTest.getCreatedAt() != null) {
            createdAtLabel.setText(currentTest.getCreatedAt().toString().substring(0, 10));
        } else {
            createdAtLabel.setText("N/A");
        }

        titleLabel.setText(currentTest.getTitle() != null ? currentTest.getTitle() : "N/A");
        descriptionLabel.setText(currentTest.getDescription() != null ?
                currentTest.getDescription() : "Aucune description");

        // Afficher les questions
        questionsContainer.getChildren().clear();
        if (currentTest.getQuestions() != null && !currentTest.getQuestions().isEmpty()) {
            System.out.println("📋 " + currentTest.getQuestions().size() + " question(s) chargée(s)");
            questionsCountLabel.setText("(" + currentTest.getQuestions().size() + ")");

            for (SpecificQuestion question : currentTest.getQuestions()) {
                questionsContainer.getChildren().add(createQuestionCard(question));
            }
        } else {
            System.out.println("⚠️ Aucune question pour ce test");
            questionsCountLabel.setText("(0)");
        }
    }

    /**
     * ✅ CRÉER UNE CARD DE QUESTION
     */
    private VBox createQuestionCard(SpecificQuestion question) {
        VBox card = new VBox(8);
        card.setStyle("-fx-border-color: #e5e7eb; -fx-border-radius: 8; -fx-padding: 12; " +
                "-fx-background-color: #f9fafb; -fx-border-width: 1;");

        // En-tête
        HBox headerBox = new HBox(12);
        headerBox.setAlignment(Pos.CENTER_LEFT);

        Label numberLabel = new Label("Q" + question.getQuestionOrder());
        numberLabel.setStyle("-fx-font-weight: bold; -fx-font-size: 14; -fx-text-fill: #5b8def; " +
                "-fx-min-width: 40;");

        Label titleLabel = new Label(question.getQuestionText());
        titleLabel.setStyle("-fx-font-size: 13; -fx-font-weight: bold; -fx-text-fill: #111827;");
        titleLabel.setWrapText(true);

        Region spacer = new Region();
        HBox.setHgrow(spacer, Priority.ALWAYS);

        headerBox.getChildren().addAll(numberLabel, titleLabel, spacer);

        // Réponses
        VBox answersBox = new VBox(4);
        answersBox.setStyle("-fx-padding: 10 0 0 30;");

        if (question.getAnswers() != null) {
            for (SpecificAnswer answer : question.getAnswers()) {
                Label answerLabel = new Label("  " + answer.getAnswerOrder() + ". " + answer.getAnswerText());
                answerLabel.setStyle("-fx-font-size: 11; -fx-text-fill: #6b7280;");
                answersBox.getChildren().add(answerLabel);
            }
        }

        card.getChildren().addAll(headerBox, answersBox);
        return card;
    }

    /**
     * ✅ Configurer le bouton Modifier
     */
    private void configureEditButton() {
        if (currentTest == null) {
            if (editBtn != null) editBtn.setDisable(true);
            if (editBtn2 != null) editBtn2.setDisable(true);
            return;
        }

        boolean isOwner = currentTest.getCreatedBy() == AuthContext.getCurrentUserId();
        boolean canModify = PermissionUtils.canModifyTests();

        if (!isOwner || !canModify) {
            if (editBtn != null) {
                editBtn.setDisable(true);
                editBtn.setTooltip(new Tooltip("Seul le créateur du test peut le modifier"));
            }
            if (editBtn2 != null) {
                editBtn2.setDisable(true);
                editBtn2.setTooltip(new Tooltip("Seul le créateur du test peut le modifier"));
            }
            System.out.println("⚠️ Édition désactivée");
        } else {
            if (editBtn != null) editBtn.setDisable(false);
            if (editBtn2 != null) editBtn2.setDisable(false);
            System.out.println("✅ Édition activée");
        }
    }

    /**
     * ✅ Configurer les actions des boutons
     */
    private void setupActions() {
        if (editBtn != null) {
            editBtn.setOnAction(e -> editTest());
        }
        if (editBtn2 != null) {
            editBtn2.setOnAction(e -> editTest());
        }
        if (backBtn != null) {
            backBtn.setOnAction(e -> goBack());
        }
        if (backBtn2 != null) {
            backBtn2.setOnAction(e -> goBack());
        }
    }

    /**
     * ✅ Modifier le test
     */
    private void editTest() {
        if (currentTest == null) {
            showError("Erreur", "❌ Aucun test sélectionné");
            return;
        }

        if (currentTest.getCreatedBy() != AuthContext.getCurrentUserId()) {
            showError("Erreur", "❌ Vous ne pouvez modifier que vos propres tests");
            return;
        }

        if (!PermissionUtils.canModifyTests()) {
            showError("Erreur", PermissionUtils.getAccessDeniedMessage());
            return;
        }

        System.out.println("🔄 Navigation vers l'édition du test: " + currentTest.getTitle());

        // ✅ PASSER L'ID VIA TestDataHolder
        TestDataHolder.setSelectedSpecificTestId(currentTest.getId());
        // ✅ CHEMIN CORRECT (AVEC MAJUSCULES)
        App.loadScene("/views/SpecificTest/SpecificTestEdit.fxml", "✏️ Modifier - " + currentTest.getTitle());
    }

    /**
     * ✅ Retourner à la liste
     */
    private void goBack() {
        System.out.println("🔄 Retour à la liste des tests spécifiques");
        TestDataHolder.resetSpecificTestId();
        // ✅ CHEMIN CORRECT (AVEC MAJUSCULES)
        App.loadScene("/views/SpecificTest/SpecificTestList.fxml", "🎯 Tests Spécifiques");
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