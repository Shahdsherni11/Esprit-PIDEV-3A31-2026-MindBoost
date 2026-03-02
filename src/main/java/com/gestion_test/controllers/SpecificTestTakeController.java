package com.gestion_test.controllers;

import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.Alert;
import javafx.scene.control.Button;
import javafx.scene.control.ButtonBar;
import javafx.scene.control.ButtonType;
import javafx.scene.control.CheckBox;
import javafx.scene.control.ComboBox;
import javafx.scene.control.Label;
import javafx.scene.control.ProgressBar;
import javafx.scene.layout.HBox;
import javafx.scene.layout.Priority;
import javafx.scene.layout.VBox;
import javafx.geometry.Pos;
import javafx.collections.FXCollections;
import com.gestion_test.entities.SpecificTest;
import com.gestion_test.entities.SpecificQuestion;
import com.gestion_test.entities.SpecificAnswer;
import com.gestion_test.services.SpecificTestService;
import com.gestion_test.services.SpecificScoreService;
import com.gestion_test.services.ScoreService;
import com.gestion_test.services.EmailService;
import com.gestion_test.services.AuthContext;
import com.gestion_test.utils.TestDataHolder;
import com.gestion_test.App;

import java.net.URL;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;
import java.util.ResourceBundle;

public class SpecificTestTakeController implements Initializable {

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

    private SpecificTest currentTest;
    private int currentQuestionIndex = 0;
    private Map<Integer, List<Integer>> selectedAnswers = new HashMap<Integer, List<Integer>>();
    private static final int MAX_ANSWERS_PER_QUESTION = 2;

    @Override
    public void initialize(URL url, ResourceBundle rb) {
        System.out.println("SpecificTestTakeController initialise");

        submitBtn.setDisable(true);
        submitBtn.setStyle("-fx-opacity: 0.5; -fx-cursor: not-allowed;");
        submitBtn.setText("Soumettre (0/? repondues)");

        setupActions();

        int testId = TestDataHolder.getSelectedSpecificTestId();
        int userId = AuthContext.getCurrentUserId();

        if (testId <= 0) {
            showError("Erreur", "Aucun test selectionne");
            goBack();
            return;
        }

        try {
            if (SpecificScoreService.hasPassedThisWeek(userId, testId)) {
                Alert alert = new Alert(Alert.AlertType.INFORMATION);
                alert.setTitle("Information");
                alert.setHeaderText("Test deja passe cette semaine");
                alert.setContentText("Revenez la semaine prochaine pour repasser ce test!");
                alert.showAndWait();

                if (AuthContext.isStudent() || AuthContext.isUser()) {
                    App.loadScene("/views/StudentStats.fxml", "Mes Statistiques");
                } else {
                    App.loadScene("/views/SpecificTest/SpecificTestList.fxml", "Tests Specifiques");
                }
                return;
            }
        } catch (SQLException e) {
            System.err.println("Erreur verification semaine : " + e.getMessage());
        }

        loadTest(testId);
    }

    private void loadTest(int testId) {
        try {
            currentTest = SpecificTestService.getSpecificTestById(testId);
            if (currentTest != null && currentTest.getQuestions() != null &&
                    !currentTest.getQuestions().isEmpty()) {
                displayTestInfo();
                setupQuestionSelector();
                displayCurrentQuestion();
                updateProgress();
            } else {
                showError("Erreur", "Test non trouve ou pas de questions");
                goBack();
            }
        } catch (SQLException e) {
            showError("Erreur", "Erreur: " + e.getMessage());
            goBack();
        }
    }

    private void displayTestInfo() {
        if (titleLabel != null) titleLabel.setText(currentTest.getTitle());
        if (categoryLabel != null) categoryLabel.setText("Categorie: " + currentTest.getCategory());
        if (descriptionLabel != null) {
            String desc = currentTest.getDescription();
            descriptionLabel.setText(desc != null ? desc : "Test d'evaluation specifique");
        }
    }

    private void setupQuestionSelector() {
        if (currentTest.getQuestions() != null) {
            int total = currentTest.getQuestions().size();
            List<String> items = new ArrayList<String>();
            for (int i = 0; i < total; i++) {
                SpecificQuestion q = currentTest.getQuestions().get(i);
                String text = q.getQuestionText();
                if (text.length() > 50) text = text.substring(0, 50) + "...";
                items.add("Question " + (i + 1) + " - " + text);
            }
            questionSelector.setItems(FXCollections.observableArrayList(items));
            questionSelector.setOnAction(e -> {
                int idx = questionSelector.getSelectionModel().getSelectedIndex();
                if (idx >= 0) {
                    currentQuestionIndex = idx;
                    displayCurrentQuestion();
                }
            });
        }
    }

    private void displayCurrentQuestion() {
        if (currentTest.getQuestions() == null || currentTest.getQuestions().isEmpty()) return;

        int total = currentTest.getQuestions().size();
        SpecificQuestion question = currentTest.getQuestions().get(currentQuestionIndex);

        questionIndicatorLabel.setText("Question " + (currentQuestionIndex + 1) + " / " + total);
        questionProgressBar.setProgress((double) (currentQuestionIndex + 1) / total);
        currentQuestionNumberLabel.setText("Question " + (currentQuestionIndex + 1) + "/" + total);
        currentQuestionTextLabel.setText(question.getQuestionText());
        questionSelector.getSelectionModel().select(currentQuestionIndex);

        currentAnswersContainer.getChildren().clear();

        List<SpecificAnswer> answers = question.getAnswers();
        if (answers != null) {
            for (int i = 0; i < answers.size(); i++) {
                SpecificAnswer answer = answers.get(i);
                HBox answerOption = createAnswerOption(answer, i);
                currentAnswersContainer.getChildren().add(answerOption);
            }
        }

        Label infoLabel = new Label("Vous pouvez cocher maximum " + MAX_ANSWERS_PER_QUESTION + " reponses");
        infoLabel.setStyle("-fx-font-size: 11px; -fx-text-fill: #5A5A7A; -fx-padding: 10 0 0 0;");
        currentAnswersContainer.getChildren().add(infoLabel);

        previousBtn.setDisable(currentQuestionIndex == 0);
        nextBtn.setDisable(currentQuestionIndex == total - 1);
    }

    private HBox createAnswerOption(SpecificAnswer answer, int answerIndex) {
        HBox option = new HBox(12);
        option.setAlignment(Pos.CENTER_LEFT);
        option.setStyle("-fx-background-color: rgba(255,255,255,0.05); -fx-padding: 14; " +
                "-fx-background-radius: 8; -fx-border-color: rgba(255,255,255,0.08); " +
                "-fx-border-width: 1; -fx-border-radius: 8; -fx-cursor: hand;");

        CheckBox checkBox = new CheckBox();
        checkBox.setStyle("-fx-font-size: 14px;");

        String letter = String.valueOf((char) ('A' + answerIndex));
        Label labelLetter = new Label(letter + ")");
        labelLetter.setStyle("-fx-font-size: 14px; -fx-font-weight: bold; -fx-text-fill: #6C63FF; -fx-min-width: 25;");

        Label answerText = new Label(answer.getAnswerText());
        answerText.setStyle("-fx-font-size: 13px; -fx-text-fill: #E8E8F0; -fx-wrap-text: true;");
        answerText.setWrapText(true);

        VBox textBox = new VBox(4);
        textBox.getChildren().add(answerText);
        HBox.setHgrow(textBox, Priority.ALWAYS);

        option.getChildren().addAll(checkBox, labelLetter, textBox);

        List<Integer> currentSelections = selectedAnswers.get(currentQuestionIndex);
        if (currentSelections != null && currentSelections.contains(answerIndex)) {
            checkBox.setSelected(true);
            option.setStyle("-fx-background-color: rgba(108,99,255,0.15); -fx-padding: 14; " +
                    "-fx-background-radius: 8; -fx-border-color: #6C63FF; " +
                    "-fx-border-width: 2; -fx-border-radius: 8; -fx-cursor: hand;");
        }

        final int qIdx = currentQuestionIndex;
        final int aIdx = answerIndex;

        checkBox.selectedProperty().addListener((obs, old, newVal) -> {
            if (newVal) {
                List<Integer> selections = selectedAnswers.get(qIdx);
                if (selections == null) {
                    selections = new ArrayList<Integer>();
                    selectedAnswers.put(qIdx, selections);
                }
                if (selections.size() >= MAX_ANSWERS_PER_QUESTION) {
                    checkBox.setSelected(false);
                    showWarning("Maximum atteint", "Maximum " + MAX_ANSWERS_PER_QUESTION + " reponses!");
                    return;
                }
                selections.add(aIdx);
                option.setStyle("-fx-background-color: rgba(108,99,255,0.15); -fx-padding: 14; " +
                        "-fx-background-radius: 8; -fx-border-color: #6C63FF; " +
                        "-fx-border-width: 2; -fx-border-radius: 8; -fx-cursor: hand;");
            } else {
                List<Integer> selections = selectedAnswers.get(qIdx);
                if (selections != null) {
                    selections.remove(Integer.valueOf(aIdx));
                    if (selections.isEmpty()) selectedAnswers.remove(qIdx);
                }
                option.setStyle("-fx-background-color: rgba(255,255,255,0.05); -fx-padding: 14; " +
                        "-fx-background-radius: 8; -fx-border-color: rgba(255,255,255,0.08); " +
                        "-fx-border-width: 1; -fx-border-radius: 8; -fx-cursor: hand;");
            }
            updateProgress();
        });

        return option;
    }

    private void updateProgress() {
        int total = currentTest.getQuestions().size();
        int answered = selectedAnswers.size();
        if (progressLabel != null) progressLabel.setText(answered + "/" + total);
        if (progressBar != null) progressBar.setProgress((double) answered / total);

        if (answered >= total) {
            submitBtn.setDisable(false);
            submitBtn.setStyle("-fx-opacity: 1.0; -fx-cursor: hand;");
            submitBtn.setText("Soumettre le test (Complet!)");
        } else {
            submitBtn.setDisable(true);
            submitBtn.setStyle("-fx-opacity: 0.5; -fx-cursor: not-allowed;");
            submitBtn.setText("Soumettre (" + answered + "/" + total + " repondues)");
        }
    }

    private void setupActions() {
        previousBtn.setOnAction(e -> {
            if (currentQuestionIndex > 0) { currentQuestionIndex--; displayCurrentQuestion(); }
        });
        nextBtn.setOnAction(e -> {
            if (currentTest.getQuestions() != null && currentQuestionIndex < currentTest.getQuestions().size() - 1) {
                currentQuestionIndex++; displayCurrentQuestion();
            }
        });
        submitBtn.setOnAction(e -> submitTest());
        cancelBtn.setOnAction(e -> cancelTest());
    }

    private void submitTest() {
        int totalQuestions = currentTest.getQuestions().size();
        if (selectedAnswers.size() < totalQuestions) {
            showError("Erreur", "Repondez a toutes les questions! (" +
                    selectedAnswers.size() + "/" + totalQuestions + ")");
            return;
        }

        // CALCUL DU SCORE
        int totalScore = 0;
        int maxScore = totalQuestions * 3;

        for (Map.Entry<Integer, List<Integer>> entry : selectedAnswers.entrySet()) {
            int qIndex = entry.getKey();
            List<Integer> answerIndices = entry.getValue();
            SpecificQuestion question = currentTest.getQuestions().get(qIndex);
            List<SpecificAnswer> answersList = question.getAnswers();

            int maxWeight = 0;
            for (Integer aIndex : answerIndices) {
                if (answersList != null && aIndex < answersList.size()) {
                    SpecificAnswer selected = answersList.get(aIndex);
                    int weight = selected.getScore();
                    if (weight <= 0) weight = selected.getAnswerOrder();
                    if (weight <= 0) weight = aIndex + 1;
                    if (weight > maxWeight) maxWeight = weight;
                }
            }
            totalScore += maxWeight;
        }

        int percentage = maxScore > 0 ? (totalScore * 100) / maxScore : 0;
        String category = currentTest.getCategory();
        String level = SpecificScoreService.getLevelFromPercentage(percentage);
        String emoji = SpecificScoreService.getLevelEmoji(level);

        int userId = AuthContext.getCurrentUserId();

        // SAUVEGARDER
        try {
            int scoreId = SpecificScoreService.saveSpecificScore(
                    userId, currentTest.getId(), totalScore, maxScore, percentage, category);

            for (Map.Entry<Integer, List<Integer>> entry : selectedAnswers.entrySet()) {
                int qIndex = entry.getKey();
                List<Integer> answerIndices = entry.getValue();
                SpecificQuestion question = currentTest.getQuestions().get(qIndex);
                List<SpecificAnswer> answersList = question.getAnswers();
                String qText = question.getQuestionText();

                for (Integer aIndex : answerIndices) {
                    String aText = "Non repondu";
                    int aScore = 0;
                    if (answersList != null && aIndex < answersList.size()) {
                        SpecificAnswer sel = answersList.get(aIndex);
                        aText = sel.getAnswerText();
                        aScore = sel.getScore();
                        if (aScore <= 0) aScore = sel.getAnswerOrder();
                        if (aScore <= 0) aScore = aIndex + 1;
                    }
                    SpecificScoreService.saveStudentAnswer(scoreId, userId, currentTest.getId(),
                            question.getId(), qText, aText, aScore);
                }
            }
            System.out.println("Reponses sauvegardees");
        } catch (SQLException e) {
            System.err.println("Erreur sauvegarde : " + e.getMessage());
        }

        // ENVOYER EMAIL AUTOMATIQUEMENT (dans un thread separe)
        final String fCategory = category;
        final String fLevel = level;
        final int fPercentage = percentage;
        final int fTotalScore = totalScore;
        final int fMaxScore = maxScore;

        new Thread(() -> {
            try {
                String email = AuthContext.getCurrentEmail();
                String name = AuthContext.getCurrentUserName();

                // Email a l'etudiant
                if (email != null && !email.isEmpty()) {
                    boolean sent = EmailService.sendTestResultEmail(email, name,
                            currentTest.getTitle(), fCategory, fLevel, fPercentage, fTotalScore, fMaxScore);
                    if (sent) System.out.println("Email de resultats envoye a: " + email);
                    else System.err.println("Echec envoi email a: " + email);
                }

                // Alerte au psychologue si niveau eleve
                if ("Eleve".equals(fLevel)) {
                    // Remplacez par l'email du vrai psychologue
                    boolean alertSent = EmailService.sendAlertToPsychologist(
                            "psychologue@mindboost.com", name, email,
                            fCategory, fLevel, fPercentage);
                    if (alertSent) System.out.println("ALERTE envoyee au psychologue!");
                }
            } catch (Exception e) {
                System.err.println("Erreur envoi email: " + e.getMessage());
            }
        }).start();

        // AFFICHER RESULTAT
        int generalPercentage = 0;
        try { generalPercentage = ScoreService.getLatestPercentageForUser(userId); }
        catch (SQLException e) { }

        String message = "TEST SPECIFIQUE COMPLETE !\n\n" +
                "Categorie : " + category + "\n" +
                "Score Test General : " + generalPercentage + "%\n" +
                "Score Test Specifique : " + totalScore + "/" + maxScore + "\n" +
                "Pourcentage : " + percentage + "%\n" +
                "Niveau : " + emoji + " " + level + "\n\n" +
                "Un email avec vos resultats vous a ete envoye!\n\n";

        if ("Faible".equals(level)) message += "Votre niveau est faible. Continuez vos bonnes habitudes!";
        else if ("Modere".equals(level)) message += "Niveau modere. Des exercices reguliers peuvent aider.";
        else message += "Niveau eleve. Consultez un professionnel.";

        Alert result = new Alert(Alert.AlertType.INFORMATION);
        result.setTitle("Resultat du Test Specifique");
        result.setHeaderText(category + " - " + level);
        result.setContentText(message);

        ButtonType continueBtn = new ButtonType("Voir mes statistiques", ButtonBar.ButtonData.OK_DONE);
        result.getButtonTypes().setAll(continueBtn);
        result.showAndWait();

        if (AuthContext.isStudent() || AuthContext.isUser()) {
            App.loadScene("/views/StudentStats.fxml", "Mes Statistiques");
        } else {
            App.loadScene("/views/Statistics.fxml", "Statistiques");
        }
    }

    private void cancelTest() {
        Alert alert = new Alert(Alert.AlertType.CONFIRMATION);
        alert.setTitle("Confirmation");
        alert.setHeaderText("Etes-vous sur?");
        alert.setContentText("Toutes les reponses seront perdues.");
        alert.showAndWait().ifPresent(response -> {
            if (response == ButtonType.OK) goBack();
        });
    }

    private void goBack() {
        TestDataHolder.resetSpecificTestId();
        App.loadScene("/views/SpecificTest/SpecificTestList.fxml", "Tests Specifiques");
    }

    private void showError(String title, String message) {
        Alert a = new Alert(Alert.AlertType.ERROR); a.setTitle(title); a.setContentText(message); a.showAndWait();
    }

    private void showWarning(String title, String message) {
        Alert a = new Alert(Alert.AlertType.WARNING); a.setTitle(title); a.setContentText(message); a.showAndWait();
    }
}