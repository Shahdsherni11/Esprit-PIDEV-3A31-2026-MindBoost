package com.gestion_test.controllers;

import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.*;
import javafx.scene.layout.HBox;
import javafx.scene.layout.VBox;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.geometry.Pos;
import com.gestion_test.entities.GeneralTest;
import com.gestion_test.entities.GeneralTest.GeneralQuestion;
import com.gestion_test.entities.GeneralTest.GeneralAnswer;
import com.gestion_test.services.GeneralTestService;
import com.gestion_test.utils.ScoreCalculator;
import com.gestion_test.App;

import java.net.URL;
import java.sql.SQLException;
import java.util.HashMap;
import java.util.Map;
import java.util.ResourceBundle;

public class GeneralTestTakeController implements Initializable {

    @FXML private Label titleLabel;
    @FXML private Label descriptionLabel;
    @FXML private Label progressLabel;
    @FXML private ProgressBar progressBar;
    @FXML private ScrollPane questionsScrollPane;
    @FXML private VBox questionsContainer;
    @FXML private Button submitBtn;
    @FXML private Button cancelBtn;

    private GeneralTest currentTest;
    private Map<Integer, Integer> selectedAnswers = new HashMap<>();

    @Override
    public void initialize(URL url, ResourceBundle rb) {
        setupActions();
    }

    public void loadTest(int testId) {
        try {
            currentTest = GeneralTestService.getGeneralTestById(testId);
            if (currentTest != null) {
                displayTest();
            }
        } catch (SQLException e) {
            showError("Erreur", "Erreur lors du chargement: " + e.getMessage());
        }
    }

    private void displayTest() {
        titleLabel.setText(currentTest.getTitle());
        descriptionLabel.setText(currentTest.getDescription() != null ? currentTest.getDescription() : "");

        questionsContainer.getChildren().clear();

        if (currentTest.getQuestions() != null) {
            int totalQuestions = currentTest.getQuestions().size();
            for (int i = 0; i < totalQuestions; i++) {
                GeneralQuestion question = currentTest.getQuestions().get(i);
                questionsContainer.getChildren().add(createQuestionCard(question, i + 1, totalQuestions));
            }
        }
        updateProgress();
    }

    private VBox createQuestionCard(GeneralQuestion question, int questionNumber, int totalQuestions) {
        VBox card = new VBox(12);
        card.setStyle("-fx-background-color: white; -fx-background-radius: 16; -fx-padding: 16; " +
                "-fx-effect: dropshadow(gaussian, rgba(0,0,0,0.08), 8, 0, 0, 2);");
        card.setPrefWidth(600);

        Label qNumLabel = new Label(String.format("Question %d/%d", questionNumber, totalQuestions));
        qNumLabel.setStyle("-fx-font-size: 12; -fx-text-fill: #6b7280;");

        Label qTextLabel = new Label(question.getQuestionText());
        qTextLabel.setStyle("-fx-font-size: 16; -fx-font-weight: bold;");
        qTextLabel.setWrapText(true);

        VBox answersBox = new VBox(8);
        ToggleGroup answerGroup = new ToggleGroup();

        if (question.getAnswers() != null) {
            for (GeneralAnswer answer : question.getAnswers()) {
                RadioButton radioBtn = new RadioButton(answer.getAnswerText());
                radioBtn.setToggleGroup(answerGroup);
                radioBtn.selectedProperty().addListener((obs, old, newVal) -> {
                    if (newVal) {
                        selectedAnswers.put(question.getId(), answer.getId());
                        updateProgress();
                    }
                });
                answersBox.getChildren().add(radioBtn);
            }
        }

        card.getChildren().addAll(qNumLabel, qTextLabel, answersBox);
        return card;
    }

    private void updateProgress() {
        int totalQuestions = currentTest.getQuestions() != null ? currentTest.getQuestions().size() : 0;
        int answered = selectedAnswers.size();
        double progress = (double) answered / totalQuestions;
        progressBar.setProgress(progress);
        progressLabel.setText(String.format("Progression: %d/%d questions", answered, totalQuestions));
    }

    private void setupActions() {
        submitBtn.setOnAction(e -> submitTest());
        cancelBtn.setOnAction(e -> cancel());
    }

    private void submitTest() {
        int totalQuestions = currentTest.getQuestions() != null ? currentTest.getQuestions().size() : 0;

        if (selectedAnswers.size() != totalQuestions) {
            showError("Erreur", "Veuillez répondre à toutes les questions");
            return;
        }

        int score = ScoreCalculator.calculateScore(currentTest, selectedAnswers);
        ScoreCalculator.Category category = ScoreCalculator.classifyScore(score);
        String report = ScoreCalculator.generateReport(score, category, currentTest);

        Alert resultAlert = new Alert(Alert.AlertType.INFORMATION);
        resultAlert.setTitle("📊 Résultat");
        resultAlert.setContentText(report);
        resultAlert.getDialogPane().setPrefWidth(500);
        resultAlert.getDialogPane().setPrefHeight(400);
        resultAlert.showAndWait();

        goBack();
    }

    private void cancel() {
        Alert alert = new Alert(Alert.AlertType.CONFIRMATION);
        alert.setTitle("Confirmation");
        alert.setContentText("Êtes-vous sûr de vouloir abandonner ce test ?");
        alert.showAndWait().ifPresent(response -> {
            if (response == ButtonType.OK) {
                goBack();
            }
        });
    }

    private void goBack() {
        App.loadScene("/com/gestion_test/views/GeneralTest/GeneralTestList.fxml", "📋 Tests Généraux");
    }

    private void showError(String title, String message) {
        Alert alert = new Alert(Alert.AlertType.ERROR);
        alert.setTitle(title);
        alert.setContentText(message);
        alert.showAndWait();
    }
}