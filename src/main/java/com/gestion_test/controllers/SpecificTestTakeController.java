package com.gestion_test.controllers;

import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.*;
import javafx.scene.layout.VBox;
import javafx.scene.layout.HBox;
import javafx.scene.layout.Priority;
import javafx.geometry.Pos;
import javafx.collections.FXCollections;
import com.gestion_test.entities.SpecificTest;
import com.gestion_test.entities.SpecificTest.SpecificQuestion;
import com.gestion_test.entities.SpecificTest.SpecificAnswer;
import com.gestion_test.services.SpecificTestService;
import com.gestion_test.services.StudentResultService;
import com.gestion_test.services.AuthContext;
import com.gestion_test.utils.ValidationUtils;
import com.gestion_test.utils.ValidationUtils.ValidationStatus;
import com.gestion_test.utils.ValidationUtils.ValidationListener;
import com.gestion_test.App;

import java.net.URL;
import java.sql.SQLException;
import java.util.List;
import java.util.Map;
import java.util.ResourceBundle;

/**
 * ✅ CONTRÔLEUR DU TEST SPÉCIFIQUE
 *
 * FONCTIONNALITÉS:
 * 1. Navigation entre questions (Précédent, Suivant, ComboBox)
 * 2. CheckBox: Maximum 2 réponses par question
 * 3. Validation en temps réel
 * 4. Bouton soumettre désactivé jusqu'à complétion
 * 5. Affichage progression dynamique
 * 6. Calcul du score
 * 7. Sauvegarde des résultats en BD
 */
public class SpecificTestTakeController implements Initializable, ValidationListener {

    // ===== FXML COMPONENTS =====
    @FXML private Label titleLabel;
    @FXML private Label categoryLabel;
    @FXML private Label descriptionLabel;
    @FXML private Label questionIndicatorLabel;
    @FXML private ProgressBar questionProgressBar;

    @FXML private Label currentQuestionNumberLabel;
    @FXML private Label currentQuestionTextLabel;
    @FXML private VBox currentAnswersContainer;
    @FXML private Button previousBtn;
    @FXML private Button nextBtn;
    @FXML private ComboBox<String> questionSelector;

    @FXML private Label progressLabel;
    @FXML private ProgressBar progressBar;

    @FXML private Button submitBtn;
    @FXML private Button cancelBtn;

    // ===== VARIABLES INTERNES =====
    private SpecificTest currentTest;
    private int currentQuestionIndex = 0;

    @Override
    public void initialize(URL url, ResourceBundle rb) {
        System.out.println("✅ SpecificTestTakeController initialisé");

        submitBtn.setDisable(true);
        submitBtn.setStyle("-fx-opacity: 0.5; -fx-cursor: not-allowed;");
        submitBtn.setText("✅ Soumettre (0/? répondues)");

        setupActions();
    }

    /**
     * ✅ CHARGER LE TEST
     */
    public void loadTest(int testId) {
        try {
            System.out.println("🔄 Chargement du test spécifique ID: " + testId);
            currentTest = SpecificTestService.getSpecificTestById(testId);

            if (currentTest != null) {
                int totalQuestions = currentTest.getQuestions() != null ?
                        currentTest.getQuestions().size() : 0;

                ValidationUtils.initializeTest(totalQuestions, this, true);

                displayTestInfo();
                setupQuestionSelector();
                displayCurrentQuestion();

                System.out.println("✅ Test spécifique chargé: " + currentTest.getTitle());
            } else {
                showError("Erreur", "Test non trouvé");
                goBack();
            }
        } catch (SQLException e) {
            System.err.println("❌ Erreur: " + e.getMessage());
            showError("Erreur", "Erreur lors du chargement: " + e.getMessage());
            goBack();
        }
    }

    /**
     * ✅ AFFICHER LES INFOS DU TEST
     */
    private void displayTestInfo() {
        titleLabel.setText(currentTest.getTitle());
        categoryLabel.setText("📂 " + currentTest.getCategory());
        descriptionLabel.setText(currentTest.getDescription() != null ?
                currentTest.getDescription() : "Test d'évaluation spécifique");
    }

    /**
     * ✅ CONFIGURER LE SÉLECTEUR DE QUESTIONS
     */
    private void setupQuestionSelector() {
        if (currentTest.getQuestions() != null) {
            int totalQuestions = currentTest.getQuestions().size();
            String[] items = new String[totalQuestions];

            for (int i = 0; i < totalQuestions; i++) {
                SpecificQuestion q = currentTest.getQuestions().get(i);
                String qText = q.getQuestionText();
                items[i] = "Question " + (i + 1) + " - " +
                        (qText.length() > 50 ? qText.substring(0, 50) + "..." : qText);
            }

            questionSelector.setItems(FXCollections.observableArrayList(items));
            questionSelector.setOnAction(e -> jumpToQuestion(questionSelector.getSelectionModel().getSelectedIndex()));
        }
    }

    /**
     * ✅ AFFICHER LA QUESTION ACTUELLE
     */
    private void displayCurrentQuestion() {
        if (currentTest.getQuestions() == null || currentTest.getQuestions().isEmpty()) {
            return;
        }

        int totalQuestions = currentTest.getQuestions().size();
        SpecificQuestion question = currentTest.getQuestions().get(currentQuestionIndex);

        questionIndicatorLabel.setText("Question " + (currentQuestionIndex + 1) + " / " + totalQuestions);
        questionProgressBar.setProgress((double) (currentQuestionIndex + 1) / totalQuestions);

        currentQuestionNumberLabel.setText("Question " + (currentQuestionIndex + 1) + "/" + totalQuestions);
        currentQuestionTextLabel.setText(question.getQuestionText());

        questionSelector.getSelectionModel().select(currentQuestionIndex);

        currentAnswersContainer.getChildren().clear();

        if (question.getAnswers() != null) {
            for (SpecificAnswer answer : question.getAnswers()) {
                HBox answerOption = createAnswerOption(answer, question);
                currentAnswersContainer.getChildren().add(answerOption);
            }
        }

        Label maxResponsesLabel = new Label("ℹ️ Vous pouvez cocher maximum 2 réponses");
        maxResponsesLabel.setStyle("-fx-font-size: 11px; -fx-text-fill: #6b7280; -fx-padding: 10 0 0 0;");
        currentAnswersContainer.getChildren().add(maxResponsesLabel);

        previousBtn.setDisable(currentQuestionIndex == 0);
        nextBtn.setDisable(currentQuestionIndex == totalQuestions - 1);
    }

    /**
     * ✅ CRÉER UNE OPTION DE RÉPONSE (CHECK BOX - MAXIMUM 2)
     */
    private HBox createAnswerOption(SpecificAnswer answer, SpecificQuestion question) {
        HBox option = new HBox(12);
        option.setAlignment(Pos.CENTER_LEFT);
        option.setStyle("-fx-background-color: #f9fafb; -fx-padding: 12; -fx-background-radius: 8; " +
                "-fx-border-color: #e5e7eb; -fx-border-width: 1; -fx-border-radius: 8; -fx-cursor: hand;");

        CheckBox checkBox = new CheckBox();
        checkBox.setStyle("-fx-font-size: 14px;");

        Label labelLetter = new Label(answer.getAnswerLabel() + ")");
        labelLetter.setStyle("-fx-font-size: 14px; -fx-font-weight: bold; -fx-text-fill: #5b8def; -fx-min-width: 25;");

        Label answerText = new Label(answer.getAnswerText());
        answerText.setStyle("-fx-font-size: 13px; -fx-text-fill: #374151; -fx-wrap-text: true;");
        answerText.setWrapText(true);

        VBox textBox = new VBox(4);
        textBox.getChildren().add(answerText);
        HBox.setHgrow(textBox, javafx.scene.layout.Priority.ALWAYS);

        option.getChildren().addAll(checkBox, labelLetter, textBox);

        checkBox.selectedProperty().addListener((obs, old, newVal) -> {
            if (newVal) {
                if (!ValidationUtils.canCheckAnswer(currentQuestionIndex + 1)) {
                    checkBox.setSelected(false);
                    showWarning("⚠️ Maximum atteint",
                            "Vous ne pouvez cocher que " + ValidationUtils.SPECIFIC_TEST_MAX_CHECKED +
                                    " réponses maximum par question!");
                    return;
                }

                ValidationUtils.answerQuestion(
                        currentQuestionIndex + 1,
                        answer.getId(),
                        true
                );

                option.setStyle("-fx-background-color: #eef2ff; -fx-padding: 12; -fx-background-radius: 8; " +
                        "-fx-border-color: #5b8def; -fx-border-width: 2; -fx-border-radius: 8; -fx-cursor: hand;");

                int checkedCount = ValidationUtils.getCheckedCount(currentQuestionIndex + 1);
                System.out.println("✅ Q" + (currentQuestionIndex + 1) + " → " + answer.getAnswerLabel() +
                        " ☑️ (" + checkedCount + "/2)");
            } else {
                ValidationUtils.answerQuestion(
                        currentQuestionIndex + 1,
                        answer.getId(),
                        false
                );

                option.setStyle("-fx-background-color: #f9fafb; -fx-padding: 12; -fx-background-radius: 8; " +
                        "-fx-border-color: #e5e7eb; -fx-border-width: 1; -fx-border-radius: 8; -fx-cursor: hand;");

                int checkedCount = ValidationUtils.getCheckedCount(currentQuestionIndex + 1);
                System.out.println("❌ Q" + (currentQuestionIndex + 1) + " → " + answer.getAnswerLabel() +
                        " ☐ (" + checkedCount + "/2)");
            }
        });

        return option;
    }

    /**
     * ✅ INTERFACE ValidationListener
     */
    @Override
    public void onValidationChanged(ValidationStatus status) {
        System.out.println("📊 Validation changée:");
        System.out.println("   Complète: " + status.isComplete());
        System.out.println("   Répondues: " + status.getAnsweredCount() + "/" + status.getTotalCount());

        updateProgressDisplay(status);

        if (status.isComplete()) {
            submitBtn.setDisable(false);
            submitBtn.setStyle("-fx-opacity: 1.0; -fx-cursor: hand;");
            submitBtn.setText("✅ Soumettre le test (Complet!)");
            System.out.println("🟢 Bouton soumettre ACTIVÉ");
        } else {
            submitBtn.setDisable(true);
            submitBtn.setStyle("-fx-opacity: 0.5; -fx-cursor: not-allowed;");
            int remaining = status.getTotalCount() - status.getAnsweredCount();
            submitBtn.setText("✅ Soumettre (" + status.getAnsweredCount() + "/" +
                    status.getTotalCount() + " répondues)");
            System.out.println("🔴 Bouton désactivé (" + remaining + " manquantes)");
        }
    }

    /**
     * ✅ METTRE À JOUR L'AFFICHAGE DE LA PROGRESSION
     */
    private void updateProgressDisplay(ValidationStatus status) {
        progressLabel.setText(String.format("%d / %d",
                status.getAnsweredCount(),
                status.getTotalCount()));

        progressBar.setProgress(status.getProgressPercentage() / 100.0);

        if (status.getProgressPercentage() < 50) {
            progressBar.setStyle("-fx-accent: #dc2626;");
        } else if (status.getProgressPercentage() < 100) {
            progressBar.setStyle("-fx-accent: #f59e0b;");
        } else {
            progressBar.setStyle("-fx-accent: #10b981;");
        }
    }

    /**
     * ✅ ALLER À LA QUESTION PRÉCÉDENTE
     */
    private void previousQuestion() {
        if (currentQuestionIndex > 0) {
            currentQuestionIndex--;
            displayCurrentQuestion();
            System.out.println("◀️ Question précédente: " + (currentQuestionIndex + 1));
        }
    }

    /**
     * ✅ ALLER À LA QUESTION SUIVANTE
     */
    private void nextQuestion() {
        if (currentTest.getQuestions() != null && currentQuestionIndex < currentTest.getQuestions().size() - 1) {
            currentQuestionIndex++;
            displayCurrentQuestion();
            System.out.println("▶️ Question suivante: " + (currentQuestionIndex + 1));
        }
    }

    /**
     * ✅ SAUTER À UNE QUESTION PRÉCISE
     */
    private void jumpToQuestion(int questionIndex) {
        if (questionIndex >= 0 && questionIndex < currentTest.getQuestions().size()) {
            currentQuestionIndex = questionIndex;
            displayCurrentQuestion();
            System.out.println("🚀 Saut à la question: " + (currentQuestionIndex + 1));
        }
    }

    /**
     * ✅ CONFIGURER LES ACTIONS DES BOUTONS
     */
    private void setupActions() {
        previousBtn.setOnAction(e -> previousQuestion());
        nextBtn.setOnAction(e -> nextQuestion());
        submitBtn.setOnAction(e -> submitTest());
        cancelBtn.setOnAction(e -> cancelTest());
    }

    /**
     * ✅ SOUMETTRE LE TEST
     */
    private void submitTest() {
        ValidationStatus status = ValidationUtils.getValidationStatus();

        if (!status.isComplete()) {
            showError("❌ Erreur",
                    "Impossible de soumettre!\n\n" +
                            "Répondez à toutes les questions: " +
                            status.getAnsweredCount() + "/" + status.getTotalCount());
            return;
        }

        System.out.println("✅ Test spécifique soumis!");

        Map<Integer, List<Integer>> allAnswers = ValidationUtils.getAllAnswers();

        System.out.println("📊 Réponses soumises:");
        for (int question : allAnswers.keySet()) {
            System.out.println("   Q" + question + " → " + allAnswers.get(question).size() + " réponse(s)");
        }

        int score = calculateScore(allAnswers);
        System.out.println("📊 Score calculé: " + score + "/100");

        showResultDialog(score);
    }

    /**
     * ✅ CALCULER LE SCORE POUR TEST SPÉCIFIQUE
     */
    private int calculateScore(Map<Integer, List<Integer>> allAnswers) {
        int baseScore = 50;
        int totalAnswers = 0;

        for (List<Integer> answers : allAnswers.values()) {
            totalAnswers += answers.size();
        }

        int bonusScore = Math.min(50, (totalAnswers - allAnswers.size()) * 5);
        int finalScore = baseScore + bonusScore;

        System.out.println("   ├─ Score de base: " + baseScore);
        System.out.println("   ├─ Total réponses: " + totalAnswers);
        System.out.println("   ├─ Réponses supplémentaires: " + (totalAnswers - allAnswers.size()));
        System.out.println("   ├─ Bonus: " + bonusScore);
        System.out.println("   └─ Score final: " + finalScore);

        return finalScore;
    }

    /**
     * ✅ AFFICHER LE RÉSULTAT
     */
    private void showResultDialog(int score) {
        String message = "📊 TEST COMPLÉTÉ!\n\n" +
                "Catégorie: " + currentTest.getCategory() + "\n" +
                "Score: " + score + "/100\n\n" +
                "Merci d'avoir complété ce test spécifique.\n\n" +
                "Vos réponses ont été enregistrées.";

        Alert resultAlert = new Alert(Alert.AlertType.INFORMATION);
        resultAlert.setTitle("📊 Test Complété");
        resultAlert.setHeaderText(null);
        resultAlert.setContentText(message);

        ButtonType continueBtn = new ButtonType("Retour à l'accueil", ButtonBar.ButtonData.OK_DONE);
        resultAlert.getButtonTypes().setAll(continueBtn);

        resultAlert.showAndWait().ifPresent(response -> {
            try {
                int studentId = AuthContext.getCurrentUserId();
                StudentResultService.saveSpecificTestResult(studentId, currentTest.getId(), score);
                goBack();
            } catch (SQLException e) {
                showError("Erreur", "Erreur: " + e.getMessage());
            }
        });
    }

    /**
     * ✅ ANNULER LE TEST
     */
    private void cancelTest() {
        Alert alert = new Alert(Alert.AlertType.CONFIRMATION);
        alert.setTitle("Confirmation");
        alert.setHeaderText("Êtes-vous sûr?");
        alert.setContentText("Êtes-vous sûr de vouloir abandonner le test?\n\nToutes les réponses seront perdues.");

        alert.showAndWait().ifPresent(response -> {
            if (response == ButtonType.OK) {
                ValidationUtils.reset();
                goBack();
            }
        });
    }

    /**
     * ✅ RETOURNER À LA LISTE
     */
    private void goBack() {
        System.out.println("🔄 Retour à la liste des tests spécifiques");
        App.loadScene("/views/SpecificTest/SpecificTestList.fxml", "🎯 Tests Spécifiques");
    }

    /**
     * ✅ AFFICHER UNE ALERTE D'ERREUR
     */
    private void showError(String title, String message) {
        System.err.println("❌ " + title + ": " + message);
        Alert alert = new Alert(Alert.AlertType.ERROR);
        alert.setTitle(title);
        alert.setHeaderText(null);
        alert.setContentText(message);
        alert.getDialogPane().setPrefWidth(550);
        alert.getDialogPane().setPrefHeight(300);
        alert.showAndWait();
    }

    /**
     * ✅ AFFICHER UN AVERTISSEMENT
     */
    private void showWarning(String title, String message) {
        System.out.println("⚠️ " + title + ": " + message);
        Alert alert = new Alert(Alert.AlertType.WARNING);
        alert.setTitle(title);
        alert.setHeaderText(null);
        alert.setContentText(message);
        alert.showAndWait();
    }
}