package com.gestion_test.controllers;

import com.gestion_test.entities.SpecificTest;
import com.gestion_test.entities.SpecificQuestion;
import com.gestion_test.entities.SpecificAnswer;
import com.gestion_test.services.SpecificTestService;
import com.gestion_test.services.AuthContext;
import com.gestion_test.utils.TestDataHolder;
import com.gestion_test.App;
import javafx.fxml.FXML;
import javafx.scene.control.Alert;
import javafx.scene.control.Button;
import javafx.scene.control.ButtonType;
import javafx.scene.control.ComboBox;
import javafx.scene.control.Dialog;
import javafx.scene.control.Label;
import javafx.scene.control.TextArea;
import javafx.scene.control.TextField;
import javafx.geometry.Insets;
import javafx.geometry.Pos;
import javafx.scene.layout.VBox;
import javafx.scene.layout.HBox;
import javafx.scene.layout.Priority;
import javafx.scene.layout.Region;
import javafx.collections.FXCollections;

import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;
import java.util.Optional;

public class SpecificTestEditController {

    @FXML private TextField idField;
    @FXML private TextField createdDateField;
    @FXML private ComboBox<String> categoryCombo;
    @FXML private TextField titleField;
    @FXML private TextArea descriptionField;
    @FXML private ComboBox<String> statusCombo;
    @FXML private VBox questionsContainer;
    @FXML private Label questionsCountLabel;
    @FXML private Button addQuestionBtn;
    @FXML private Button updateBtn;
    @FXML private Button deleteBtn;
    @FXML private Button cancelBtn;
    @FXML private Button backBtn;

    private SpecificTest currentTest;
    private List<SpecificQuestion> questions = new ArrayList<SpecificQuestion>();
    private int questionCounter = 1;

    @FXML
    public void initialize() {
        System.out.println("SpecificTestEditController initialise");
        setupComboBoxes();
        setupActions();

        int testId = TestDataHolder.getSelectedSpecificTestId();
        if (testId > 0) {
            loadTest(testId);
        } else {
            showError("Erreur", "Aucun test selectionne");
        }
    }

    private void setupComboBoxes() {
        categoryCombo.setItems(FXCollections.observableArrayList(
                "Anxiete", "Depression", "Stress", "Trouble du Sommeil"
        ));
        statusCombo.setItems(FXCollections.observableArrayList(
                "DRAFT", "ACTIVE", "INACTIVE"
        ));
    }

    private void setupActions() {
        addQuestionBtn.setOnAction(e -> addQuestion());
        updateBtn.setOnAction(e -> updateTest());
        deleteBtn.setOnAction(e -> deleteTest());
        cancelBtn.setOnAction(e -> cancelForm());
        if (backBtn != null) {
            backBtn.setOnAction(e -> goBack());
        }
    }

    public void loadTest(int testId) {
        try {
            currentTest = SpecificTestService.getSpecificTestById(testId);
            if (currentTest != null) {
                displayTest();
            } else {
                showError("Erreur", "Test non trouve");
                goBack();
            }
        } catch (SQLException e) {
            showError("Erreur", "Erreur: " + e.getMessage());
            goBack();
        }
    }

    private void displayTest() {
        idField.setText(String.valueOf(currentTest.getId()));
        String created = currentTest.getCreatedAt();
        if (created != null && created.length() >= 10) {
            createdDateField.setText(created.substring(0, 10));
        } else {
            createdDateField.setText("N/A");
        }
        categoryCombo.setValue(currentTest.getCategory());
        titleField.setText(currentTest.getTitle());
        descriptionField.setText(currentTest.getDescription() != null ? currentTest.getDescription() : "");
        statusCombo.setValue(currentTest.getStatus());

        questions.clear();
        questionsContainer.getChildren().clear();
        if (currentTest.getQuestions() != null) {
            questions.addAll(currentTest.getQuestions());
            questionCounter = questions.size() + 1;
            for (SpecificQuestion question : questions) {
                addQuestionCard(question);
            }
        }
        updateQuestionCount();
    }

    private void addQuestion() {
        Dialog<SpecificQuestion> dialog = new Dialog<SpecificQuestion>();
        dialog.setTitle("Ajouter une Question");
        dialog.getDialogPane().getButtonTypes().addAll(ButtonType.OK, ButtonType.CANCEL);

        VBox content = createQuestionForm(null);
        dialog.getDialogPane().setContent(content);
        dialog.getDialogPane().setPrefWidth(750);
        dialog.getDialogPane().setPrefHeight(600);

        dialog.setResultConverter(dialogButton -> {
            if (dialogButton == ButtonType.OK) {
                return extractQuestionFromForm(content);
            }
            return null;
        });

        Optional<SpecificQuestion> result = dialog.showAndWait();
        result.ifPresent(question -> {
            if (question != null && question.getAnswers() != null && !question.getAnswers().isEmpty()) {
                question.setQuestionOrder(questionCounter++);
                questions.add(question);
                addQuestionCard(question);
                updateQuestionCount();
            }
        });
    }

    private VBox createQuestionForm(SpecificQuestion existingQuestion) {
        VBox mainBox = new VBox(15);
        mainBox.setPadding(new Insets(15));

        VBox questionBox = new VBox(6);
        Label questionLabel = new Label("Texte de la question:");
        questionLabel.setStyle("-fx-font-weight: bold;");
        TextArea questionArea = new TextArea();
        questionArea.setPrefRowCount(3);
        questionArea.setWrapText(true);
        questionArea.setPromptText("Entrez la question...");

        if (existingQuestion != null && existingQuestion.getQuestionText() != null) {
            questionArea.setText(existingQuestion.getQuestionText());
        }
        questionBox.getChildren().addAll(questionLabel, questionArea);

        VBox answersBox = new VBox(10);
        Label answersLabel = new Label("Reponses:");
        answersLabel.setStyle("-fx-font-weight: bold;");

        VBox answersContentBox = new VBox(10);

        List<TextField> answerFields = new ArrayList<TextField>();
        for (int i = 0; i < 3; i++) {
            HBox answerRow = createAnswerRow(i + 1, answerFields, answersContentBox);
            answersContentBox.getChildren().add(answerRow);
        }

        Button addAnswerBtn = new Button("+ Ajouter une reponse");
        addAnswerBtn.setOnAction(e -> {
            HBox answerRow = createAnswerRow(answerFields.size() + 1, answerFields, answersContentBox);
            answersContentBox.getChildren().add(answerRow);
        });

        answersBox.getChildren().addAll(answersLabel, answersContentBox, addAnswerBtn);

        if (existingQuestion != null && existingQuestion.getAnswers() != null) {
            for (int i = 0; i < existingQuestion.getAnswers().size() && i < answerFields.size(); i++) {
                answerFields.get(i).setText(existingQuestion.getAnswers().get(i).getAnswerText());
            }
        }

        mainBox.setUserData(new Object[]{questionArea, answerFields});
        mainBox.getChildren().addAll(questionBox, answersBox);
        return mainBox;
    }

    private HBox createAnswerRow(int index, List<TextField> answerFields, VBox parentBox) {
        HBox row = new HBox(10);
        row.setAlignment(Pos.CENTER_LEFT);

        Label orderLabel = new Label(index + ".");
        orderLabel.setStyle("-fx-font-weight: bold; -fx-min-width: 30;");

        TextField answerField = new TextField();
        answerField.setPromptText("Reponse " + index);
        answerField.setPrefWidth(400);

        Button delBtn = new Button("X");
        delBtn.setOnAction(e -> {
            parentBox.getChildren().remove(row);
            answerFields.remove(answerField);
        });

        answerFields.add(answerField);
        row.getChildren().addAll(orderLabel, answerField, delBtn);
        return row;
    }

    @SuppressWarnings("unchecked")
    private SpecificQuestion extractQuestionFromForm(VBox form) {
        Object[] data = (Object[]) form.getUserData();
        TextArea questionArea = (TextArea) data[0];
        List<TextField> answerFields = (List<TextField>) data[1];

        String questionText = questionArea.getText().trim();
        if (questionText.isEmpty()) return null;

        SpecificQuestion question = new SpecificQuestion();
        question.setQuestionText(questionText);
        question.setQuestionOrder(0);

        List<SpecificAnswer> answers = new ArrayList<SpecificAnswer>();
        int answerOrder = 1;
        for (TextField field : answerFields) {
            String answerText = field.getText().trim();
            if (!answerText.isEmpty()) {
                SpecificAnswer answer = new SpecificAnswer();
                answer.setAnswerText(answerText);
                answer.setAnswerOrder(answerOrder);
                answer.setScore(answerOrder);
                answerOrder++;
                answers.add(answer);
            }
        }

        if (answers.isEmpty()) return null;

        question.setAnswers(answers);
        return question;
    }

    private void addQuestionCard(SpecificQuestion question) {
        VBox card = new VBox(8);
        card.setStyle("-fx-border-color: #e5e7eb; -fx-border-radius: 8; -fx-padding: 14; -fx-background-color: #f9fafb;");

        HBox headerBox = new HBox(12);
        headerBox.setAlignment(Pos.CENTER_LEFT);

        Label numberLabel = new Label("Q" + question.getQuestionOrder());
        numberLabel.setStyle("-fx-font-weight: bold; -fx-text-fill: #5b8def; -fx-min-width: 40;");

        Label titleLbl = new Label(question.getQuestionText());
        titleLbl.setWrapText(true);

        Region spacer = new Region();
        HBox.setHgrow(spacer, Priority.ALWAYS);

        int questionIndex = questions.indexOf(question);

        Button editBtn = new Button("Modifier");
        editBtn.setOnAction(e -> editQuestion(questionIndex));

        Button delBtn = new Button("Supprimer");
        delBtn.setOnAction(e -> {
            questions.remove(questionIndex);
            questionsContainer.getChildren().remove(card);
            updateQuestionCount();
        });

        headerBox.getChildren().addAll(numberLabel, titleLbl, spacer, editBtn, delBtn);

        VBox answersBox = new VBox(4);
        answersBox.setStyle("-fx-padding: 10 0 0 30;");
        if (question.getAnswers() != null) {
            for (SpecificAnswer answer : question.getAnswers()) {
                Label answerLabel = new Label("  " + answer.getAnswerOrder() + ". " + answer.getAnswerText());
                answersBox.getChildren().add(answerLabel);
            }
        }

        card.getChildren().addAll(headerBox, answersBox);
        questionsContainer.getChildren().add(card);
    }

    private void editQuestion(int index) {
        SpecificQuestion question = questions.get(index);
        Dialog<SpecificQuestion> dialog = new Dialog<SpecificQuestion>();
        dialog.setTitle("Modifier une Question");
        dialog.getDialogPane().getButtonTypes().addAll(ButtonType.OK, ButtonType.CANCEL);

        VBox content = createQuestionForm(question);
        dialog.getDialogPane().setContent(content);
        dialog.getDialogPane().setPrefWidth(750);

        dialog.setResultConverter(dialogButton -> {
            if (dialogButton == ButtonType.OK) return extractQuestionFromForm(content);
            return null;
        });

        Optional<SpecificQuestion> result = dialog.showAndWait();
        result.ifPresent(updatedQuestion -> {
            if (updatedQuestion != null) {
                updatedQuestion.setQuestionOrder(question.getQuestionOrder());
                questions.set(index, updatedQuestion);
                refreshQuestionsDisplay();
            }
        });
    }

    private void refreshQuestionsDisplay() {
        questionsContainer.getChildren().clear();
        for (SpecificQuestion q : questions) addQuestionCard(q);
    }

    private void updateQuestionCount() {
        questionsCountLabel.setText(questions.size() + "/13");
    }

    private void updateTest() {
        try {
            if (categoryCombo.getValue() == null || titleField.getText().trim().isEmpty() || questions.isEmpty()) {
                showError("Erreur", "Remplissez tous les champs");
                return;
            }

            currentTest.setCategory(categoryCombo.getValue());
            currentTest.setTitle(titleField.getText().trim());
            currentTest.setDescription(descriptionField.getText());
            currentTest.setStatus(statusCombo.getValue());

            SpecificTestService.updateSpecificTest(currentTest, questions);
            showSuccess("Succes", "Test modifie!");
            goBack();
        } catch (SQLException e) {
            showError("Erreur", e.getMessage());
        }
    }

    private void deleteTest() {
        Alert alert = new Alert(Alert.AlertType.CONFIRMATION);
        alert.setContentText("Supprimer ce test?");
        Optional<ButtonType> result = alert.showAndWait();
        if (result.isPresent() && result.get() == ButtonType.OK) {
            try {
                SpecificTestService.deleteSpecificTest(currentTest.getId());
                showSuccess("Succes", "Test supprime!");
                goBack();
            } catch (SQLException e) {
                showError("Erreur", e.getMessage());
            }
        }
    }

    private void cancelForm() {
        goBack();
    }

    private void goBack() {
        TestDataHolder.resetSpecificTestId();
        App.loadScene("/views/SpecificTest/SpecificTestList.fxml", "Tests Specifiques");
    }

    private void showError(String title, String message) {
        Alert a = new Alert(Alert.AlertType.ERROR);
        a.setTitle(title);
        a.setContentText(message);
        a.showAndWait();
    }

    private void showSuccess(String title, String message) {
        Alert a = new Alert(Alert.AlertType.INFORMATION);
        a.setTitle(title);
        a.setContentText(message);
        a.showAndWait();
    }
}