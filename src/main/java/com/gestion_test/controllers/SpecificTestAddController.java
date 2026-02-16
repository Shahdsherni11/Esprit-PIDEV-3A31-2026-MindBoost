package com.gestion_test.controllers;

import com.gestion_test.entities.GeneralTest;
import com.gestion_test.entities.GeneralTest.GeneralQuestion;
import com.gestion_test.entities.GeneralTest.GeneralAnswer;
import com.gestion_test.services.GeneralTestService;
import com.gestion_test.App;
import javafx.fxml.FXML;
import javafx.scene.control.*;
import javafx.geometry.Insets;
import javafx.scene.layout.VBox;
import javafx.scene.layout.HBox;

import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;
import java.util.Optional;

public class SpecificTestAddController {

    @FXML
    private TextField testTitleField;

    @FXML
    private TextArea testDescriptionArea;

    @FXML
    private ListView<GeneralQuestion> questionsListView;

    @FXML
    private Button addQuestionButton;

    @FXML
    private Button removeQuestionButton;

    @FXML
    private Button editQuestionButton;

    @FXML
    private Button saveTestButton;

    @FXML
    private Button cancelButton;

    @FXML
    private Button backBtn;

    private GeneralTestService testService;
    private List<GeneralQuestion> questions = new ArrayList<>();

    @FXML
    public void initialize() {
        testService = new GeneralTestService();

        addQuestionButton.setOnAction(e -> addQuestion());
        removeQuestionButton.setOnAction(e -> removeQuestion());
        editQuestionButton.setOnAction(e -> editQuestion());
        saveTestButton.setOnAction(e -> saveTest());
        cancelButton.setOnAction(e -> cancelForm());

        if (backBtn != null) {
            backBtn.setOnAction(e -> goBack());
        }

        System.out.println("✅ SpecificTestAddController initialisé");
    }

    /**
     * ✅ Ajouter une question via Dialog
     */
    private void addQuestion() {
        Dialog<GeneralQuestion> dialog = new Dialog<>();
        dialog.setTitle("Ajouter une Question");
        dialog.setHeaderText("Créer une nouvelle question");

        dialog.getDialogPane().getButtonTypes().addAll(ButtonType.OK, ButtonType.CANCEL);

        VBox content = createQuestionForm(null);
        dialog.getDialogPane().setContent(content);

        TextField questionTextField = (TextField) ((VBox) content).getChildren().get(1);
        Spinner<Integer> orderSpinner = (Spinner<Integer>) ((VBox) content).getChildren().get(3);
        ListView<GeneralAnswer> answersListView = (ListView<GeneralAnswer>) ((VBox) content).getChildren().get(5);

        dialog.setResultConverter(dialogButton -> {
            if (dialogButton == ButtonType.OK) {
                if (questionTextField.getText().trim().isEmpty()) {
                    showAlert("❌ Le texte de la question ne peut pas être vide", Alert.AlertType.WARNING);
                    return null;
                }

                GeneralQuestion question = new GeneralQuestion();
                question.setQuestionText(questionTextField.getText());
                question.setQuestionOrder(orderSpinner.getValue());
                question.setAnswers(new ArrayList<>(answersListView.getItems()));

                return question;
            }
            return null;
        });

        Optional<GeneralQuestion> result = dialog.showAndWait();
        result.ifPresent(question -> {
            if (question != null) {
                questions.add(question);
                questionsListView.getItems().add(question);
                System.out.println("✅ Question ajoutée");
            }
        });
    }

    /**
     * ✅ Modifier une question existante
     */
    private void editQuestion() {
        int selectedIndex = questionsListView.getSelectionModel().getSelectedIndex();
        if (selectedIndex < 0) {
            showAlert("❌ Sélectionnez une question à modifier", Alert.AlertType.WARNING);
            return;
        }

        GeneralQuestion selectedQuestion = questionsListView.getItems().get(selectedIndex);

        Dialog<GeneralQuestion> dialog = new Dialog<>();
        dialog.setTitle("Modifier une Question");
        dialog.setHeaderText("Modifier la question sélectionnée");

        dialog.getDialogPane().getButtonTypes().addAll(ButtonType.OK, ButtonType.CANCEL);

        VBox content = createQuestionForm(selectedQuestion);
        dialog.getDialogPane().setContent(content);

        TextField questionTextField = (TextField) ((VBox) content).getChildren().get(1);
        Spinner<Integer> orderSpinner = (Spinner<Integer>) ((VBox) content).getChildren().get(3);
        ListView<GeneralAnswer> answersListView = (ListView<GeneralAnswer>) ((VBox) content).getChildren().get(5);

        dialog.setResultConverter(dialogButton -> {
            if (dialogButton == ButtonType.OK) {
                if (questionTextField.getText().trim().isEmpty()) {
                    showAlert("❌ Le texte de la question ne peut pas être vide", Alert.AlertType.WARNING);
                    return null;
                }

                selectedQuestion.setQuestionText(questionTextField.getText());
                selectedQuestion.setQuestionOrder(orderSpinner.getValue());
                selectedQuestion.setAnswers(new ArrayList<>(answersListView.getItems()));

                return selectedQuestion;
            }
            return null;
        });

        Optional<GeneralQuestion> result = dialog.showAndWait();
        result.ifPresent(question -> {
            if (question != null) {
                questionsListView.refresh();
                System.out.println("✅ Question modifiée");
            }
        });
    }

    /**
     * ✅ Supprimer une question
     */
    private void removeQuestion() {
        int selectedIndex = questionsListView.getSelectionModel().getSelectedIndex();
        if (selectedIndex < 0) {
            showAlert("❌ Sélectionnez une question à supprimer", Alert.AlertType.WARNING);
            return;
        }

        Alert confirmAlert = new Alert(Alert.AlertType.CONFIRMATION);
        confirmAlert.setTitle("Confirmation");
        confirmAlert.setHeaderText("Êtes-vous sûr ?");
        confirmAlert.setContentText("Voulez-vous supprimer cette question ?");

        Optional<ButtonType> result = confirmAlert.showAndWait();
        if (result.isPresent() && result.get() == ButtonType.OK) {
            questions.remove(selectedIndex);
            questionsListView.getItems().remove(selectedIndex);
            showAlert("✅ Question supprimée", Alert.AlertType.INFORMATION);
        }
    }

    /**
     * ✅ Créer le formulaire de question
     */
    private VBox createQuestionForm(GeneralQuestion question) {
        VBox vbox = new VBox(10);
        vbox.setPadding(new Insets(15));

        Label questionLabel = new Label("Texte de la question:");
        TextField questionTextField = new TextField();
        questionTextField.setPromptText("Entrez la question...");
        questionTextField.setStyle("-fx-font-size: 12;");
        if (question != null && question.getQuestionText() != null) {
            questionTextField.setText(question.getQuestionText());
        }

        Label orderLabel = new Label("Ordre de la question:");
        Spinner<Integer> orderSpinner = new Spinner<>(1, 100, question != null ? question.getQuestionOrder() : 1);
        orderSpinner.setPrefWidth(200);

        Label answersLabel = new Label("Réponses:");
        ListView<GeneralAnswer> answersListView = new ListView<>();
        answersListView.setPrefHeight(150);
        if (question != null && question.getAnswers() != null) {
            answersListView.getItems().addAll(question.getAnswers());
        }

        Button addAnswerButton = new Button("+ Ajouter Réponse");
        Button removeAnswerButton = new Button("- Supprimer Réponse");

        addAnswerButton.setOnAction(e -> {
            Dialog<GeneralAnswer> answerDialog = new Dialog<>();
            answerDialog.setTitle("Ajouter une Réponse");
            answerDialog.setHeaderText("Créer une nouvelle réponse");

            answerDialog.getDialogPane().getButtonTypes().addAll(ButtonType.OK, ButtonType.CANCEL);

            VBox answerContent = createAnswerForm(null);
            answerDialog.getDialogPane().setContent(answerContent);

            TextField answerTextField = (TextField) ((VBox) answerContent).getChildren().get(1);
            Spinner<Integer> scoreSpinner = (Spinner<Integer>) ((VBox) answerContent).getChildren().get(3);
            Spinner<Integer> answerOrderSpinner = (Spinner<Integer>) ((VBox) answerContent).getChildren().get(5);

            answerDialog.setResultConverter(dialogButton -> {
                if (dialogButton == ButtonType.OK) {
                    if (answerTextField.getText().trim().isEmpty()) {
                        showAlert("❌ Le texte de la réponse ne peut pas être vide", Alert.AlertType.WARNING);
                        return null;
                    }

                    GeneralAnswer answer = new GeneralAnswer();
                    answer.setAnswerText(answerTextField.getText());
                    answer.setScore(scoreSpinner.getValue());
                    answer.setAnswerOrder(answerOrderSpinner.getValue());

                    return answer;
                }
                return null;
            });

            Optional<GeneralAnswer> answerResult = answerDialog.showAndWait();
            answerResult.ifPresent(answer -> {
                if (answer != null) {
                    answersListView.getItems().add(answer);
                }
            });
        });

        removeAnswerButton.setOnAction(e -> {
            int selectedIndex = answersListView.getSelectionModel().getSelectedIndex();
            if (selectedIndex >= 0) {
                answersListView.getItems().remove(selectedIndex);
            } else {
                showAlert("❌ Sélectionnez une réponse à supprimer", Alert.AlertType.WARNING);
            }
        });

        HBox answersButtonBox = new HBox(10);
        answersButtonBox.getChildren().addAll(addAnswerButton, removeAnswerButton);

        vbox.getChildren().addAll(
                questionLabel, questionTextField,
                orderLabel, orderSpinner,
                answersLabel, answersListView,
                answersButtonBox
        );

        return vbox;
    }

    /**
     * ✅ Créer le formulaire de réponse
     */
    private VBox createAnswerForm(GeneralAnswer answer) {
        VBox vbox = new VBox(10);
        vbox.setPadding(new Insets(15));

        Label answerLabel = new Label("Texte de la réponse:");
        TextField answerTextField = new TextField();
        answerTextField.setPromptText("Entrez la réponse...");
        if (answer != null && answer.getAnswerText() != null) {
            answerTextField.setText(answer.getAnswerText());
        }

        Label scoreLabel = new Label("Score:");
        Spinner<Integer> scoreSpinner = new Spinner<>(0, 10, answer != null ? answer.getScore() : 5);
        scoreSpinner.setPrefWidth(200);

        Label orderLabel = new Label("Ordre de la réponse:");
        Spinner<Integer> orderSpinner = new Spinner<>(1, 100, answer != null ? answer.getAnswerOrder() : 1);
        orderSpinner.setPrefWidth(200);

        vbox.getChildren().addAll(
                answerLabel, answerTextField,
                scoreLabel, scoreSpinner,
                orderLabel, orderSpinner
        );

        return vbox;
    }

    /**
     * ✅ Sauvegarder le test (SANS STATUS)
     */
    private void saveTest() {
        try {
            if (testTitleField.getText().trim().isEmpty()) {
                showAlert("❌ Le titre du test ne peut pas être vide", Alert.AlertType.WARNING);
                return;
            }

            if (questions.isEmpty()) {
                showAlert("❌ Le test doit contenir au moins une question", Alert.AlertType.WARNING);
                return;
            }

            GeneralTest test = new GeneralTest();
            test.setTitle(testTitleField.getText());
            test.setDescription(testDescriptionArea.getText());
            test.setQuestions(questions);

            int testId = testService.create(test);

            System.out.println("✅ Test créé: " + test.getTitle() + " (ID: " + testId + ")");
            showAlert("✅ Test créé avec succès ! ID: " + testId, Alert.AlertType.INFORMATION);
            clearForm();
            goBack();

        } catch (SQLException e) {
            System.err.println("❌ Erreur lors de la sauvegarde: " + e.getMessage());
            showAlert("❌ Erreur lors de la sauvegarde: " + e.getMessage(), Alert.AlertType.ERROR);
            e.printStackTrace();
        }
    }

    /**
     * ✅ Annuler et réinitialiser le formulaire
     */
    private void cancelForm() {
        Alert confirmAlert = new Alert(Alert.AlertType.CONFIRMATION);
        confirmAlert.setTitle("Confirmation");
        confirmAlert.setHeaderText("Êtes-vous sûr ?");
        confirmAlert.setContentText("Voulez-vous annuler et effacer les données ?");

        Optional<ButtonType> result = confirmAlert.showAndWait();
        if (result.isPresent() && result.get() == ButtonType.OK) {
            clearForm();
            goBack();
        }
    }

    /**
     * ✅ Réinitialiser le formulaire
     */
    private void clearForm() {
        testTitleField.clear();
        testDescriptionArea.clear();
        questions.clear();
        questionsListView.getItems().clear();
    }

    /**
     * ✅ Retourner à la liste
     */
    private void goBack() {
        System.out.println("🔄 Retour à la liste des tests spécifiques");
        App.loadScene("/views/SpecificTest/specificTestList.fxml", "🎯 Tests Spécifiques");
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