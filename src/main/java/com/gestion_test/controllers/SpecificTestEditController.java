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

public class SpecificTestEditController {

    @FXML
    private ComboBox<GeneralTest> testComboBox;

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

    private GeneralTestService testService;
    private List<GeneralQuestion> questions = new ArrayList<>();

    @FXML
    public void initialize() {
        testService = new GeneralTestService();

        loadAvailableTests();

        testComboBox.setOnAction(e -> loadTestDetails());
        addQuestionButton.setOnAction(e -> addQuestion());
        removeQuestionButton.setOnAction(e -> removeQuestion());
        editQuestionButton.setOnAction(e -> editQuestion());
        saveTestButton.setOnAction(e -> saveTest());
        cancelButton.setOnAction(e -> cancelForm());

        System.out.println("✅ SpecificTestEditController initialisé");
    }

    /**
     * ✅ Charger les tests disponibles
     */
    private void loadAvailableTests() {
        try {
            List<GeneralTest> myTests = testService.getAll();
            testComboBox.getItems().addAll(myTests);
        } catch (SQLException e) {
            showAlert("❌ Erreur lors du chargement des tests: " + e.getMessage(), Alert.AlertType.ERROR);
            e.printStackTrace();
        }
    }

    /**
     * ✅ Charger les détails du test sélectionné (SANS STATUS)
     */
    private void loadTestDetails() {
        GeneralTest selectedTest = testComboBox.getSelectionModel().getSelectedItem();
        if (selectedTest != null) {
            try {
                GeneralTest fullTest = testService.getById(selectedTest.getId());

                if (fullTest != null) {
                    testTitleField.setText(fullTest.getTitle());
                    testDescriptionArea.setText(fullTest.getDescription() != null ? fullTest.getDescription() : "");

                    questions.clear();
                    questionsListView.getItems().clear();

                    if (fullTest.getQuestions() != null) {
                        questions.addAll(fullTest.getQuestions());
                        questionsListView.getItems().addAll(fullTest.getQuestions());
                    }
                }
            } catch (SQLException e) {
                showAlert("❌ Erreur lors du chargement du test: " + e.getMessage(), Alert.AlertType.ERROR);
                e.printStackTrace();
            }
        }
    }

    /**
     * ✅ Ajouter une question
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
            }
        });
    }

    /**
     * ✅ Modifier une question
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

        addAnswerButton.setOnAction(e -> addAnswer(answersListView));
        removeAnswerButton.setOnAction(e -> removeAnswer(answersListView));

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
     * ✅ Ajouter une réponse
     */
    private void addAnswer(ListView<GeneralAnswer> answersListView) {
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
    }

    /**
     * ✅ Supprimer une réponse
     */
    private void removeAnswer(ListView<GeneralAnswer> answersListView) {
        int selectedIndex = answersListView.getSelectionModel().getSelectedIndex();
        if (selectedIndex >= 0) {
            answersListView.getItems().remove(selectedIndex);
        } else {
            showAlert("❌ Sélectionnez une réponse à supprimer", Alert.AlertType.WARNING);
        }
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
     * ✅ Sauvegarder les modifications (SANS STATUS)
     */
    private void saveTest() {
        try {
            GeneralTest selectedTest = testComboBox.getSelectionModel().getSelectedItem();
            if (selectedTest == null) {
                showAlert("❌ Sélectionnez un test à modifier", Alert.AlertType.WARNING);
                return;
            }

            if (testTitleField.getText().trim().isEmpty()) {
                showAlert("❌ Le titre du test ne peut pas être vide", Alert.AlertType.WARNING);
                return;
            }

            if (questions.isEmpty()) {
                showAlert("❌ Le test doit contenir au moins une question", Alert.AlertType.WARNING);
                return;
            }

            selectedTest.setTitle(testTitleField.getText());
            selectedTest.setDescription(testDescriptionArea.getText());
            selectedTest.setQuestions(questions);

            boolean success = testService.update(selectedTest);

            if (success) {
                showAlert("✅ Test modifié avec succès !", Alert.AlertType.INFORMATION);
                clearForm();
            } else {
                showAlert("❌ Erreur lors de la modification du test", Alert.AlertType.ERROR);
            }

        } catch (SQLException e) {
            showAlert("❌ Erreur: " + e.getMessage(), Alert.AlertType.ERROR);
            e.printStackTrace();
        }
    }

    /**
     * ✅ Annuler et réinitialiser
     */
    private void cancelForm() {
        Alert confirmAlert = new Alert(Alert.AlertType.CONFIRMATION);
        confirmAlert.setTitle("Confirmation");
        confirmAlert.setHeaderText("Êtes-vous sûr ?");
        confirmAlert.setContentText("Voulez-vous annuler et effacer les données ?");

        Optional<ButtonType> result = confirmAlert.showAndWait();
        if (result.isPresent() && result.get() == ButtonType.OK) {
            clearForm();
        }
    }

    /**
     * ✅ Réinitialiser le formulaire
     */
    private void clearForm() {
        testComboBox.getSelectionModel().clearSelection();
        testTitleField.clear();
        testDescriptionArea.clear();
        questions.clear();
        questionsListView.getItems().clear();
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