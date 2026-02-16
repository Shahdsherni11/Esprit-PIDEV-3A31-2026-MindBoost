package com.gestion_test.controllers;

import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.*;
import javafx.scene.layout.VBox;
import javafx.collections.FXCollections;
import com.gestion_test.entities.SpecificTest;
import com.gestion_test.entities.SpecificTest.SpecificQuestion;
import com.gestion_test.entities.SpecificTest.SpecificAnswer;
import com.gestion_test.services.SpecificTestService;
import com.gestion_test.utils.ScoreCalculator;
import com.gestion_test.App;

import java.net.URL;
import java.sql.SQLException;
import java.util.HashMap;
import java.util.Map;
import java.util.ResourceBundle;

public class SpecificTestTakeController implements Initializable {

    @FXML private Label titleLabel;
    @FXML private Label categoryLabel;
    @FXML private Label progressLabel;
    @FXML private ProgressBar progressBar;
    @FXML private ScrollPane questionsScrollPane;
    @FXML private VBox questionsContainer;
    @FXML private Button submitBtn;
    @FXML private Button cancelBtn;

    private SpecificTest currentTest;
    private int testIdToTake = -1;
    private Map<Integer, Integer> selectedAnswers = new HashMap<>();

    @Override
    public void initialize(URL url, ResourceBundle rb) {
        setupActions();
    }

    /**
     * ✅ Charger le test spécifique à passer
     */
    public void loadTest(int testId) {
        this.testIdToTake = testId;
        try {
            currentTest = SpecificTestService.getSpecificTestById(testId);
            if (currentTest != null) {
                displayTest();
            } else {
                showError("Erreur", "Test non trouvé");
            }
        } catch (SQLException e) {
            showError("Erreur", "Erreur lors du chargement: " + e.getMessage());
        }
    }

    private void displayTest() {
        titleLabel.setText(currentTest.getTitle());
        categoryLabel.setText("📋 Catégorie: " + currentTest.getCategory());

        questionsContainer.getChildren().clear();

        if (currentTest.getQuestions() != null) {
            int totalQuestions = currentTest.getQuestions().size();

            for (int i = 0; i < totalQuestions; i++) {
                SpecificQuestion question = currentTest.getQuestions().get(i);

                VBox questionCard = createQuestionCard(question, i + 1, totalQuestions);
                questionsContainer.getChildren().add(questionCard);
            }
        }

        updateProgress();
    }

    /**
     * ✅ CRÉER UNE CARD POUR CHAQUE QUESTION
     */
    private VBox createQuestionCard(SpecificQuestion question, int questionNumber, int totalQuestions) {
        VBox card = new VBox(12);
        card.setStyle("-fx-background-color: white; -fx-background-radius: 16; -fx-padding: 16; " +
                "-fx-effect: dropshadow(gaussian, rgba(0,0,0,0.08), 8, 0, 0, 2); -fx-margin: 0 0 12 0;");
        card.setPrefWidth(600);

        Label questionNumberLabel = new Label(String.format("Question %d/%d", questionNumber, totalQuestions));
        questionNumberLabel.setStyle("-fx-font-size: 12; -fx-text-fill: #6b7280;");

        Label questionTextLabel = new Label(question.getQuestionText());
        questionTextLabel.setStyle("-fx-font-size: 16; -fx-font-weight: bold; -fx-text-fill: #111827;");
        questionTextLabel.setWrapText(true);

        VBox answersBox = new VBox(8);
        ToggleGroup answerGroup = new ToggleGroup();

        if (question.getAnswers() != null) {
            for (SpecificAnswer answer : question.getAnswers()) {
                RadioButton radioBtn = new RadioButton(answer.getAnswerText());
                radioBtn.setToggleGroup(answerGroup);
                radioBtn.setStyle("-fx-font-size: 13;");

                radioBtn.selectedProperty().addListener((obs, old, newVal) -> {
                    if (newVal) {
                        selectedAnswers.put(question.getId(), answer.getId());
                        updateProgress();
                    }
                });

                answersBox.getChildren().add(radioBtn);
            }
        }

        card.getChildren().addAll(questionNumberLabel, questionTextLabel, answersBox);
        return card;
    }

    private void updateProgress() {
        int totalQuestions = currentTest.getQuestions() != null ? currentTest.getQuestions().size() : 0;
        int answeredQuestions = selectedAnswers.size();

        double progress = (double) answeredQuestions / totalQuestions;
        progressBar.setProgress(progress);
        progressLabel.setText(String.format("Progression: %d/%d questions", answeredQuestions, totalQuestions));
    }

    private void setupActions() {
        submitBtn.setOnAction(e -> submitTest());
        cancelBtn.setOnAction(e -> cancel());
    }

    /**
     * ✅ SOUMETTRE LE TEST SPÉCIFIQUE
     */
    private void submitTest() {
        int totalQuestions = currentTest.getQuestions() != null ? currentTest.getQuestions().size() : 0;

        if (selectedAnswers.size() != totalQuestions) {
            showError("Erreur", "Veuillez répondre à toutes les questions.");
            return;
        }

        int score = calculateScore();

        Alert resultAlert = new Alert(Alert.AlertType.INFORMATION);
        resultAlert.setTitle("📊 Résultat du test spécifique");
        resultAlert.setHeaderText(null);
        resultAlert.setContentText(
                "✅ Test complété!\n\n" +
                        "Catégorie: " + currentTest.getCategory() + "\n" +
                        "Score obtenu: " + score + "/100\n\n" +
                        "Vos résultats ont été enregistrés.\n" +
                        "Merci d'avoir complété ce test."
        );

        resultAlert.showAndWait().ifPresent(response -> {
            goBack();
        });
    }

    /**
     * ✅ Calculer le score du test spécifique
     */
    private int calculateScore() {
        int totalScore = 0;
        int answeredQuestions = 0;

        for (SpecificQuestion question : currentTest.getQuestions()) {
            Integer selectedAnswerId = selectedAnswers.get(question.getId());

            if (selectedAnswerId != null && question.getAnswers() != null) {
                for (SpecificAnswer answer : question.getAnswers()) {
                    if (answer.getId() == selectedAnswerId) {
                        totalScore += answer.getScore();
                        answeredQuestions++;
                        break;
                    }
                }
            }
        }

        if (answeredQuestions == 0) {
            return 0;
        }

        return (totalScore / answeredQuestions);
    }

    private void cancel() {
        Alert alert = new Alert(Alert.AlertType.CONFIRMATION);
        alert.setTitle("Confirmation");
        alert.setHeaderText("Êtes-vous sûr ?");
        alert.setContentText("Êtes-vous sûr de vouloir abandonner ce test ?");

        alert.showAndWait().ifPresent(response -> {
            if (response == ButtonType.OK) {
                goBack();
            }
        });
    }

    private void goBack() {
        App.loadScene("/com/gestion_test/views/SpecificTest/SpecificTestList.fxml",
                "🎯 Tests Spécifiques");
    }

    private void showError(String title, String message) {
        Alert alert = new Alert(Alert.AlertType.ERROR);
        alert.setTitle(title);
        alert.setHeaderText(null);
        alert.setContentText(message);
        alert.showAndWait();
    }
}