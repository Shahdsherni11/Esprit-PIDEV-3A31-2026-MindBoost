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

public class GeneralTestEditController {

    @FXML
    private TextField idField;

    @FXML
    private TextField createdDateField;

    @FXML
    private TextField titleField;

    @FXML
    private TextArea descriptionField;

    @FXML
    private ListView<GeneralQuestion> questionsList;

    @FXML
    private Button addQuestionBtn;

    @FXML
    private Button deleteBtn;

    @FXML
    private Button updateBtn;

    @FXML
    private Button cancelBtn;

    private GeneralTestService testService;
    private List<GeneralQuestion> questions = new ArrayList<>();
    private GeneralTest currentTest;

    @FXML
    public void initialize() {
        testService = new GeneralTestService();

        addQuestionBtn.setOnAction(e -> addQuestion());
        deleteBtn.setOnAction(e -> deleteTest());
        updateBtn.setOnAction(e -> updateTest());
        cancelBtn.setOnAction(e -> cancelForm());

        System.out.println("✅ GeneralTestEditController initialisé");
    }

    /**
     * ✅ Charger le test par ID
     */
    public void loadTest(int testId) {
        try {
            System.out.println("🔄 Chargement du test ID: " + testId);
            currentTest = testService.getById(testId);
            if (currentTest != null) {
                displayTest();
                System.out.println("✅ Test chargé: " + currentTest.getTitle());
            }
        } catch (SQLException e) {
            System.err.println("❌ Erreur: " + e.getMessage());
            showAlert("❌ Erreur: " + e.getMessage(), Alert.AlertType.ERROR);
        }
    }

    /**
     * ✅ Afficher les détails du test
     */
    private void displayTest() {
        idField.setText(String.valueOf(currentTest.getId()));
        createdDateField.setText(currentTest.getCreatedAt().toString());
        titleField.setText(currentTest.getTitle());
        descriptionField.setText(currentTest.getDescription() != null ? currentTest.getDescription() : "");

        questions.clear();
        questionsList.getItems().clear();
        if (currentTest.getQuestions() != null) {
            questions.addAll(currentTest.getQuestions());
            questionsList.getItems().addAll(currentTest.getQuestions());
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
                questionsList.getItems().add(question);
                System.out.println("✅ Question ajoutée");
            }
        });
    }

    /**
     * ✅ Modifier une question
     */
    private void editQuestion() {
        int selectedIndex = questionsList.getSelectionModel().getSelectedIndex();
        if (selectedIndex < 0) {
            showAlert("❌ Sélectionnez une question à modifier", Alert.AlertType.WARNING);
            return;
        }

        GeneralQuestion selectedQuestion = questionsList.getItems().get(selectedIndex);

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
                questionsList.refresh();
                System.out.println("✅ Question modifiée");
            }
        });
    }

    /**
     * ✅ Supprimer une question
     */
    private void removeQuestion() {
        int selectedIndex = questionsList.getSelectionModel().getSelectedIndex();
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
            questionsList.getItems().remove(selectedIndex);
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
        Spinner<Integer> scoreSpinner = new Spinner<>(0, 100, answer != null ? answer.getScore() : 5);
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
     * ✅ Mettre à jour le test (SANS STATUS)
     */
    private void updateTest() {
        try {
            if (titleField.getText().trim().isEmpty()) {
                showAlert("❌ Le titre du test ne peut pas être vide", Alert.AlertType.WARNING);
                return;
            }

            if (questions.isEmpty()) {
                showAlert("❌ Le test doit contenir au moins une question", Alert.AlertType.WARNING);
                return;
            }

            currentTest.setTitle(titleField.getText());
            currentTest.setDescription(descriptionField.getText());
            currentTest.setQuestions(questions);

            if (testService.update(currentTest)) {
                System.out.println("✅ Test modifié avec succès");
                showAlert("✅ Test modifié avec succès !", Alert.AlertType.INFORMATION);
                goBack();
            } else {
                showAlert("❌ Erreur lors de la modification du test", Alert.AlertType.ERROR);
            }

        } catch (SQLException e) {
            System.err.println("❌ Erreur: " + e.getMessage());
            showAlert("❌ Erreur: " + e.getMessage(), Alert.AlertType.ERROR);
            e.printStackTrace();
        }
    }

    /**
     * ✅ Supprimer le test
     */
    private void deleteTest() {
        if (currentTest == null) {
            showAlert("❌ Aucun test à supprimer", Alert.AlertType.WARNING);
            return;
        }

        Alert confirmAlert = new Alert(Alert.AlertType.CONFIRMATION);
        confirmAlert.setTitle("Confirmation de suppression");
        confirmAlert.setHeaderText("Êtes-vous sûr ?");
        confirmAlert.setContentText("Voulez-vous vraiment supprimer le test: \"" + currentTest.getTitle() + "\" ?");

        Optional<ButtonType> result = confirmAlert.showAndWait();

        if (result.isPresent() && result.get() == ButtonType.OK) {
            try {
                if (testService.delete(currentTest.getId())) {
                    System.out.println("✅ Test supprimé avec succès");
                    showAlert("✅ Test supprimé avec succès", Alert.AlertType.INFORMATION);
                    goBack();
                } else {
                    showAlert("❌ Impossible de supprimer le test", Alert.AlertType.ERROR);
                }

            } catch (SQLException e) {
                System.err.println("❌ Erreur lors de la suppression: " + e.getMessage());
                showAlert("❌ Erreur lors de la suppression: " + e.getMessage(), Alert.AlertType.ERROR);
                e.printStackTrace();
            }
        }
    }

    /**
     * ✅ Annuler les modifications
     */
    private void cancelForm() {
        Alert confirmAlert = new Alert(Alert.AlertType.CONFIRMATION);
        confirmAlert.setTitle("Confirmation");
        confirmAlert.setHeaderText("Êtes-vous sûr ?");
        confirmAlert.setContentText("Voulez-vous annuler et revenir à la liste ?");

        Optional<ButtonType> result = confirmAlert.showAndWait();
        if (result.isPresent() && result.get() == ButtonType.OK) {
            goBack();
        }
    }

    /**
     * ✅ Retourner à la liste
     */
    private void goBack() {
        System.out.println("🔄 Retour à la liste des tests généraux");
        App.loadScene("/views/GeneralTest/GeneralTestList.fxml",
                "📋 Tests Généraux");
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