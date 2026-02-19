package com.gestion_test.controllers;

import com.gestion_test.entities.GeneralTest;
import com.gestion_test.entities.GeneralTest.GeneralQuestion;
import com.gestion_test.entities.GeneralTest.GeneralAnswer;
import com.gestion_test.services.GeneralTestService;
import com.gestion_test.utils.TestDataHolder;
import com.gestion_test.App;
import javafx.fxml.FXML;
import javafx.scene.control.*;
import javafx.geometry.Pos;
import javafx.scene.layout.HBox;
import javafx.scene.layout.VBox;
import javafx.collections.FXCollections;

import java.sql.SQLException;
import java.util.HashMap;
import java.util.Map;
import java.util.Optional;

/**
 * ✅ Controller pour PASSER un test général (10 questions QCM)
 */
public class GeneralTestTakeController {

    @FXML private Label titleLabel;
    @FXML private Label descriptionLabel;
    @FXML private Label questionIndicatorLabel;
    @FXML private ProgressBar questionProgressBar;
    @FXML private Label currentQuestionNumberLabel;
    @FXML private Label currentQuestionTextLabel;
    @FXML private VBox currentAnswersContainer;
    @FXML private Button previousBtn;
    @FXML private Button nextBtn;
    @FXML private Button cancelBtn;
    @FXML private Button submitBtn;
    @FXML private ComboBox<String> questionSelector;

    private GeneralTest currentTest;
    private Map<Integer, Integer> answers = new HashMap<>();
    private int currentQuestionIndex = 0;

    @FXML
    public void initialize() {
        System.out.println("✅ GeneralTestTakeController initialisé");
        setupActions();
        loadTest();
    }

    private void setupActions() {
        previousBtn.setOnAction(e -> previousQuestion());
        nextBtn.setOnAction(e -> nextQuestion());
        cancelBtn.setOnAction(e -> goBack());
        submitBtn.setOnAction(e -> submitTest());
        questionSelector.setOnAction(e -> selectQuestion());
    }

    private void loadTest() {
        try {
            int testId = TestDataHolder.getSelectedGeneralTestId();
            System.out.println("🔄 Chargement du test ID: " + testId);

            currentTest = GeneralTestService.getGeneralTestById(testId);

            if (currentTest != null && currentTest.getQuestions() != null && !currentTest.getQuestions().isEmpty()) {
                displayTest();
                displayQuestion(0);
                setupQuestionSelector();
                System.out.println("✅ Test chargé: " + currentTest.getTitle());
            } else {
                showError("Erreur", "Test non trouvé ou sans questions");
                goBack();
            }
        } catch (SQLException e) {
            showError("Erreur", "Erreur: " + e.getMessage());
            goBack();
        }
    }

    private void displayTest() {
        titleLabel.setText(currentTest.getTitle());
        descriptionLabel.setText(currentTest.getDescription() != null ? currentTest.getDescription() : "");
    }

    private void setupQuestionSelector() {
        java.util.List<String> questionTitles = new java.util.ArrayList<>();
        for (int i = 0; i < currentTest.getQuestions().size(); i++) {
            questionTitles.add("Question " + (i + 1));
        }
        questionSelector.setItems(FXCollections.observableArrayList(questionTitles));
        questionSelector.setValue("Question 1");
    }

    private void displayQuestion(int index) {
        currentQuestionIndex = index;
        GeneralQuestion question = currentTest.getQuestions().get(index);

        // Mise à jour des labels
        currentQuestionNumberLabel.setText("Question " + (index + 1));
        currentQuestionTextLabel.setText(question.getQuestionText());
        questionIndicatorLabel.setText("Question " + (index + 1) + " / " + currentTest.getQuestions().size());
        questionProgressBar.setProgress((double) (index + 1) / currentTest.getQuestions().size());

        // Mettre à jour le selector
        questionSelector.setValue("Question " + (index + 1));

        // Afficher les réponses
        currentAnswersContainer.getChildren().clear();

        if (question.getAnswers() == null || question.getAnswers().isEmpty()) {
            Label label = new Label("❌ Cette question n'a pas de réponses");
            label.setStyle("-fx-font-size: 13px; -fx-text-fill: #dc2626;");
            currentAnswersContainer.getChildren().add(label);
        } else {
            ToggleGroup group = new ToggleGroup();
            int answerIndex = 0;

            for (GeneralAnswer answer : question.getAnswers()) {
                RadioButton rb = new RadioButton(answer.getAnswerText());
                rb.setToggleGroup(group);
                rb.setStyle("-fx-font-size: 13px;");
                rb.setUserData(answerIndex);

                if (answers.containsKey(index) && answers.get(index) == answerIndex) {
                    rb.setSelected(true);
                }

                HBox row = new HBox(10);
                row.setAlignment(Pos.CENTER_LEFT);
                row.setStyle("-fx-background-color: white; -fx-padding: 12; -fx-border-color: #e5e7eb; -fx-border-radius: 6;");
                row.getChildren().add(rb);

                currentAnswersContainer.getChildren().add(row);
                answerIndex++;
            }

            // Sauvegarder la réponse si sélectionnée
            Toggle selected = group.getSelectedToggle();
            if (selected != null) {
                answers.put(index, (int) selected.getUserData());
            }
        }

        // Mise à jour des boutons
        previousBtn.setDisable(index == 0);
        nextBtn.setDisable(index == currentTest.getQuestions().size() - 1);
    }

    private void previousQuestion() {
        if (currentQuestionIndex > 0) {
            saveCurrentAnswer();
            displayQuestion(currentQuestionIndex - 1);
        }
    }

    private void nextQuestion() {
        if (currentQuestionIndex < currentTest.getQuestions().size() - 1) {
            saveCurrentAnswer();
            displayQuestion(currentQuestionIndex + 1);
        }
    }

    private void selectQuestion() {
        int selected = questionSelector.getSelectionModel().getSelectedIndex();
        if (selected >= 0) {
            saveCurrentAnswer();
            displayQuestion(selected);
        }
    }

    private void saveCurrentAnswer() {
        VBox container = currentAnswersContainer;
        for (var node : container.getChildren()) {
            if (node instanceof HBox) {
                HBox row = (HBox) node;
                for (var child : row.getChildren()) {
                    if (child instanceof RadioButton) {
                        RadioButton rb = (RadioButton) child;
                        if (rb.isSelected()) {
                            answers.put(currentQuestionIndex, (int) rb.getUserData());
                            System.out.println("💾 Réponse Q" + (currentQuestionIndex + 1) + ": " + rb.getText());
                        }
                    }
                }
            }
        }
    }

    private void submitTest() {
        if (answers.size() != currentTest.getQuestions().size()) {
            showError("Attention", "Répondez à toutes les questions!\nRépondu: " + answers.size() + "/" + currentTest.getQuestions().size());
            return;
        }

        Alert confirm = new Alert(Alert.AlertType.CONFIRMATION);
        confirm.setTitle("Confirmation");
        confirm.setContentText("Voulez-vous soumettre votre test?");
        Optional<ButtonType> result = confirm.showAndWait();

        if (result.isPresent() && result.get() == ButtonType.OK) {
            calculateScore();
        }
    }

    private void calculateScore() {
        int totalScore = 0;
        int maxScore = currentTest.getQuestions().size() * 100;

        for (int i = 0; i < currentTest.getQuestions().size(); i++) {
            GeneralQuestion question = currentTest.getQuestions().get(i);
            int answerIndex = answers.get(i);
            GeneralAnswer answer = question.getAnswers().get(answerIndex);
            totalScore += answer.getScore();
        }

        int percentage = (totalScore * 100) / maxScore;

        Alert result = new Alert(Alert.AlertType.INFORMATION);
        result.setTitle("Résultat");
        result.setHeaderText("✅ Test Complété!");
        result.setContentText("Score: " + totalScore + "/" + maxScore + "\nPourcentage: " + percentage + "%");
        result.showAndWait();

        goBack();
    }

    private void goBack() {
        TestDataHolder.resetGeneralTestId();
        App.loadScene("/views/GeneralTest/GeneralTestList.fxml", "📋 Tests Généraux");
    }

    private void showError(String title, String message) {
        Alert alert = new Alert(Alert.AlertType.ERROR);
        alert.setTitle(title);
        alert.setContentText(message);
        alert.showAndWait();
    }
}