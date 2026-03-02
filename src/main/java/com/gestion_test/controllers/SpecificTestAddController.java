package com.gestion_test.controllers;

import com.gestion_test.entities.GeneralTest;
import com.gestion_test.entities.SpecificTest;
import com.gestion_test.entities.SpecificQuestion;
import com.gestion_test.entities.SpecificAnswer;
import com.gestion_test.services.GeneralTestService;
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

public class SpecificTestAddController {

    @FXML private ComboBox<GeneralTest> generalTestCombo;
    @FXML private ComboBox<String> categoryCombo;
    @FXML private TextField titleField;
    @FXML private TextArea descriptionArea;
    @FXML private ComboBox<String> statusCombo;
    @FXML private VBox questionsContainer;
    @FXML private Label questionsCountLabel;
    @FXML private Button addQuestionBtn;
    @FXML private Button cancelBtn;
    @FXML private Button saveBtn;
    @FXML private Button backBtn;

    private List<SpecificQuestion> questions = new ArrayList<SpecificQuestion>();
    private int questionCounter = 1;

    @FXML
    public void initialize() {
        System.out.println("SpecificTestAddController initialise");
        setupComboBoxes();
        setupActions();
    }

    private void setupComboBoxes() {
        try {
            List<GeneralTest> generalTests = GeneralTestService.getAllGeneralTests();
            generalTestCombo.setItems(FXCollections.observableArrayList(generalTests));

            categoryCombo.setItems(FXCollections.observableArrayList(
                    "Anxiete", "Depression", "Stress", "Trouble du Sommeil"
            ));

            statusCombo.setItems(FXCollections.observableArrayList(
                    "DRAFT", "ACTIVE", "INACTIVE"
            ));
            statusCombo.setValue("DRAFT");

        } catch (SQLException e) {
            System.err.println("Erreur chargement ComboBox: " + e.getMessage());
            showError("Erreur", "Erreur: " + e.getMessage());
        }
    }

    private void setupActions() {
        addQuestionBtn.setOnAction(e -> addQuestion());
        saveBtn.setOnAction(e -> saveTest());
        cancelBtn.setOnAction(e -> cancelForm());
        if (backBtn != null) {
            backBtn.setOnAction(e -> goBack());
        }
    }

    private void addQuestion() {
        Dialog<SpecificQuestion> dialog = new Dialog<SpecificQuestion>();
        dialog.setTitle("Ajouter une Question");
        dialog.setHeaderText("Creer une nouvelle question avec ses reponses");
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
                System.out.println("Question ajoutee: " + question.getQuestionText());
            } else {
                showError("Erreur", "La question doit avoir au moins une reponse");
            }
        });
    }

    private VBox createQuestionForm(SpecificQuestion existingQuestion) {
        VBox mainBox = new VBox(15);
        mainBox.setPadding(new Insets(15));

        VBox questionBox = new VBox(6);
        Label questionLabel = new Label("Texte de la question:");
        questionLabel.setStyle("-fx-font-weight: bold; -fx-font-size: 13;");
        TextArea questionArea = new TextArea();
        questionArea.setPrefRowCount(3);
        questionArea.setWrapText(true);
        questionArea.setStyle("-fx-font-size: 12; -fx-padding: 10;");
        questionArea.setPromptText("Entrez la question...");

        if (existingQuestion != null && existingQuestion.getQuestionText() != null) {
            questionArea.setText(existingQuestion.getQuestionText());
        }
        questionBox.getChildren().addAll(questionLabel, questionArea);

        VBox answersBox = new VBox(10);
        Label answersLabel = new Label("Reponses:");
        answersLabel.setStyle("-fx-font-weight: bold; -fx-font-size: 13;");

        VBox answersContentBox = new VBox(10);
        answersContentBox.setStyle("-fx-border-color: #e5e7eb; -fx-border-radius: 8; -fx-padding: 12; -fx-background-color: #f9fafb;");

        List<TextField> answerFields = new ArrayList<TextField>();
        for (int i = 0; i < 3; i++) {
            HBox answerRow = createAnswerRow(i + 1, answerFields, answersContentBox);
            answersContentBox.getChildren().add(answerRow);
        }

        Button addAnswerBtn = new Button("+ Ajouter une reponse");
        addAnswerBtn.setStyle("-fx-padding: 8 16; -fx-font-size: 11; -fx-background-color: #5b8def; " +
                "-fx-text-fill: white; -fx-background-radius: 8;");
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
        row.setStyle("-fx-background-color: white; -fx-padding: 10; -fx-background-radius: 6; " +
                "-fx-border-color: #e5e7eb; -fx-border-width: 1;");

        Label orderLabel = new Label(index + ".");
        orderLabel.setStyle("-fx-font-weight: bold; -fx-font-size: 13; -fx-min-width: 30; " +
                "-fx-text-fill: #5b8def;");

        TextField answerField = new TextField();
        answerField.setPromptText("Texte de la reponse " + index);
        answerField.setPrefWidth(400);
        answerField.setStyle("-fx-padding: 8 12; -fx-background-radius: 6; -fx-border-color: #e5e7eb;");

        Button deleteBtn = new Button("X");
        deleteBtn.setStyle("-fx-padding: 6 10; -fx-font-size: 10; -fx-background-color: #dc2626; " +
                "-fx-text-fill: white; -fx-background-radius: 6;");
        deleteBtn.setOnAction(e -> {
            parentBox.getChildren().remove(row);
            answerFields.remove(answerField);
        });

        answerFields.add(answerField);
        row.getChildren().addAll(orderLabel, answerField, deleteBtn);

        return row;
    }

    @SuppressWarnings("unchecked")
    private SpecificQuestion extractQuestionFromForm(VBox form) {
        Object[] data = (Object[]) form.getUserData();
        TextArea questionArea = (TextArea) data[0];
        List<TextField> answerFields = (List<TextField>) data[1];

        String questionText = questionArea.getText().trim();
        if (questionText.isEmpty()) {
            showError("Erreur", "Le texte de la question ne peut pas etre vide");
            return null;
        }

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
                answer.setScore(answerOrder); // score = position (1, 2, 3...)
                answerOrder++;
                answers.add(answer);
            }
        }

        if (answers.isEmpty()) {
            showError("Erreur", "La question doit avoir au moins une reponse");
            return null;
        }

        question.setAnswers(answers);
        return question;
    }

    private void addQuestionCard(SpecificQuestion question) {
        VBox card = new VBox(8);
        card.setStyle("-fx-border-color: #e5e7eb; -fx-border-radius: 8; -fx-padding: 14; " +
                "-fx-background-color: #f9fafb; -fx-border-width: 1;");

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

        int questionIndex = questions.indexOf(question);

        Button editBtn = new Button("Modifier");
        editBtn.setStyle("-fx-padding: 6 10; -fx-font-size: 10; -fx-background-color: #5b8def; " +
                "-fx-text-fill: white; -fx-background-radius: 6;");
        editBtn.setOnAction(e -> editQuestion(questionIndex));

        Button deleteBtn = new Button("Supprimer");
        deleteBtn.setStyle("-fx-padding: 6 10; -fx-font-size: 10; -fx-background-color: #dc2626; " +
                "-fx-text-fill: white; -fx-background-radius: 6;");
        deleteBtn.setOnAction(e -> {
            questions.remove(questionIndex);
            questionsContainer.getChildren().remove(card);
            updateQuestionCount();
        });

        headerBox.getChildren().addAll(numberLabel, titleLabel, spacer, editBtn, deleteBtn);

        VBox answersBox = new VBox(4);
        answersBox.setStyle("-fx-padding: 10 0 0 30;");
        for (SpecificAnswer answer : question.getAnswers()) {
            Label answerLabel = new Label("  " + answer.getAnswerOrder() + ". " + answer.getAnswerText());
            answerLabel.setStyle("-fx-font-size: 11; -fx-text-fill: #6b7280;");
            answersBox.getChildren().add(answerLabel);
        }

        card.getChildren().addAll(headerBox, answersBox);
        questionsContainer.getChildren().add(card);
    }

    private void editQuestion(int index) {
        SpecificQuestion question = questions.get(index);

        Dialog<SpecificQuestion> dialog = new Dialog<SpecificQuestion>();
        dialog.setTitle("Modifier une Question");
        dialog.setHeaderText("Modifier la question selectionnee");
        dialog.getDialogPane().getButtonTypes().addAll(ButtonType.OK, ButtonType.CANCEL);

        VBox content = createQuestionForm(question);
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
        for (SpecificQuestion question : questions) {
            addQuestionCard(question);
        }
    }

    private void updateQuestionCount() {
        questionsCountLabel.setText(questions.size() + "/13");
        if (questions.size() >= 13) {
            questionsCountLabel.setStyle("-fx-text-fill: #10b981; -fx-font-weight: bold;");
        } else {
            questionsCountLabel.setStyle("-fx-text-fill: #ef4444; -fx-font-weight: bold;");
        }
    }

    private void saveTest() {
        try {
            if (categoryCombo.getValue() == null) {
                showError("Erreur", "Selectionnez une categorie");
                return;
            }

            if (titleField.getText().trim().isEmpty()) {
                showError("Erreur", "Le titre ne peut pas etre vide");
                return;
            }

            if (questions.isEmpty()) {
                showError("Erreur", "Le test doit contenir au moins une question");
                return;
            }

            if (questions.size() < 13) {
                Alert alert = new Alert(Alert.AlertType.WARNING);
                alert.setTitle("Attention");
                alert.setHeaderText("Nombre de questions insuffisant");
                alert.setContentText("Il est recommande d'avoir 13 questions.\n" +
                        "Actuellement: " + questions.size() + " question(s)\n" +
                        "Voulez-vous continuer?");

                Optional<ButtonType> result = alert.showAndWait();
                if (result.isEmpty() || result.get() == ButtonType.CANCEL) {
                    return;
                }
            }

            SpecificTest test = new SpecificTest();

            // general_test_id est obligatoire dans la BDD
            if (generalTestCombo.getValue() != null) {
                test.setGeneralTestId(generalTestCombo.getValue().getId());
            } else {
                showError("Erreur", "Selectionnez un test general parent");
                return;
            }

            test.setCategory(categoryCombo.getValue());
            test.setTitle(titleField.getText().trim());
            test.setDescription(descriptionArea.getText() != null ? descriptionArea.getText().trim() : "");
            test.setStatus(statusCombo.getValue());
            test.setCreatedBy(AuthContext.getCurrentUserId());

            int testId = SpecificTestService.createSpecificTest(test, questions);
            System.out.println("Test specifique cree avec ID: " + testId);
            showSuccess("Succes", "Test specifique cree avec succes!\nID: " + testId);
            goBack();

        } catch (SQLException e) {
            System.err.println("Erreur sauvegarde: " + e.getMessage());
            showError("Erreur", "Erreur: " + e.getMessage());
        }
    }

    private void cancelForm() {
        Alert alert = new Alert(Alert.AlertType.CONFIRMATION);
        alert.setTitle("Confirmation");
        alert.setHeaderText("Etes-vous sur?");
        alert.setContentText("Les donnees seront perdues.");

        Optional<ButtonType> result = alert.showAndWait();
        if (result.isPresent() && result.get() == ButtonType.OK) {
            goBack();
        }
    }

    private void goBack() {
        App.loadScene("/views/SpecificTest/SpecificTestList.fxml", "Tests Specifiques");
    }

    private void showError(String title, String message) {
        Alert alert = new Alert(Alert.AlertType.ERROR);
        alert.setTitle(title);
        alert.setHeaderText(null);
        alert.setContentText(message);
        alert.showAndWait();
    }

    private void showSuccess(String title, String message) {
        Alert alert = new Alert(Alert.AlertType.INFORMATION);
        alert.setTitle(title);
        alert.setHeaderText(null);
        alert.setContentText(message);
        alert.showAndWait();
    }
}