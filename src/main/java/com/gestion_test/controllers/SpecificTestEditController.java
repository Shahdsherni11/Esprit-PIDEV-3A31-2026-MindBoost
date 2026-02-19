package com.gestion_test.controllers;

import com.gestion_test.entities.SpecificTest;
import com.gestion_test.entities.SpecificTest.SpecificQuestion;
import com.gestion_test.entities.SpecificTest.SpecificAnswer;
import com.gestion_test.services.SpecificTestService;
import com.gestion_test.services.AuthContext;
import com.gestion_test.utils.TestDataHolder;
import com.gestion_test.App;
import javafx.fxml.FXML;
import javafx.scene.control.*;
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

/**
 * ✅ Controller pour modifier un test spécifique QCM
 */
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
    private List<SpecificQuestion> questions = new ArrayList<>();
    private int questionCounter = 1;

    @FXML
    public void initialize() {
        System.out.println("✅ SpecificTestEditController initialisé");

        setupComboBoxes();
        setupActions();

        // ✅ CHARGER LE TEST DEPUIS TestDataHolder
        int testId = TestDataHolder.getSelectedSpecificTestId();
        System.out.println("🔄 ID du test récupéré: " + testId);

        if (testId > 0) {
            loadTest(testId);
        } else {
            System.err.println("❌ Aucun ID de test trouvé!");
            showError("Erreur", "Aucun test sélectionné");
        }
    }

    /**
     * ✅ Configurer les ComboBox
     */
    private void setupComboBoxes() {
        categoryCombo.setItems(FXCollections.observableArrayList(
                "Anxiété", "Dépression", "Stress", "Trouble du Sommeil"
        ));

        statusCombo.setItems(FXCollections.observableArrayList(
                "DRAFT", "ACTIVE", "INACTIVE"
        ));
    }

    /**
     * ✅ Configurer les actions
     */
    private void setupActions() {
        addQuestionBtn.setOnAction(e -> addQuestion());
        updateBtn.setOnAction(e -> updateTest());
        deleteBtn.setOnAction(e -> deleteTest());
        cancelBtn.setOnAction(e -> cancelForm());
        if (backBtn != null) {
            backBtn.setOnAction(e -> goBack());
        }
    }

    /**
     * ✅ CHARGER UN TEST POUR MODIFICATION
     */
    public void loadTest(int testId) {
        try {
            System.out.println("🔄 Chargement du test ID: " + testId);
            currentTest = SpecificTestService.getSpecificTestById(testId);

            if (currentTest != null) {
                displayTest();
                System.out.println("✅ Test chargé pour modification: " + currentTest.getTitle());
            } else {
                showError("Erreur", "Test non trouvé");
                goBack();
            }
        } catch (SQLException e) {
            System.err.println("❌ Erreur: " + e.getMessage());
            showError("Erreur", "Erreur: " + e.getMessage());
            goBack();
        }
    }

    /**
     * ✅ AFFICHER LES DÉTAILS DU TEST
     */
    private void displayTest() {
        idField.setText(String.valueOf(currentTest.getId()));
        createdDateField.setText(currentTest.getCreatedAt() != null ?
                currentTest.getCreatedAt().toString().substring(0, 10) : "N/A");
        categoryCombo.setValue(currentTest.getCategory());
        titleField.setText(currentTest.getTitle());
        descriptionField.setText(currentTest.getDescription() != null ? currentTest.getDescription() : "");
        statusCombo.setValue(currentTest.getStatus());

        // Charger les questions
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

    /**
     * ✅ AJOUTER UNE QUESTION
     */
    private void addQuestion() {
        Dialog<SpecificQuestion> dialog = new Dialog<>();
        dialog.setTitle("➕ Ajouter une Question");
        dialog.setHeaderText("Créer une nouvelle question");
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
            } else {
                showError("Erreur", "La question doit avoir au moins une réponse");
            }
        });
    }

    /**
     * ✅ CRÉER LE FORMULAIRE DE QUESTION
     */
    private VBox createQuestionForm(SpecificQuestion existingQuestion) {
        VBox mainBox = new VBox(15);
        mainBox.setPadding(new Insets(15));

        // Texte de la question
        VBox questionBox = new VBox(6);
        Label questionLabel = new Label("📝 Texte de la question:");
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

        // Réponses
        VBox answersBox = new VBox(10);
        Label answersLabel = new Label("📋 Réponses (sans scores):");
        answersLabel.setStyle("-fx-font-weight: bold; -fx-font-size: 13;");

        VBox answersContentBox = new VBox(10);
        answersContentBox.setStyle("-fx-border-color: #e5e7eb; -fx-border-radius: 8; -fx-padding: 12; -fx-background-color: #f9fafb;");

        List<TextField> answerFields = new ArrayList<>();
        for (int i = 0; i < 3; i++) {
            HBox answerRow = createAnswerRow(i + 1, answerFields, answersContentBox);
            answersContentBox.getChildren().add(answerRow);
        }

        Button addAnswerBtn = new Button("➕ Ajouter une réponse");
        addAnswerBtn.setStyle("-fx-padding: 8 16; -fx-font-size: 11; -fx-background-color: #5b8def; " +
                "-fx-text-fill: white; -fx-background-radius: 8;");
        addAnswerBtn.setOnAction(e -> {
            HBox answerRow = createAnswerRow(answerFields.size() + 1, answerFields, answersContentBox);
            answersContentBox.getChildren().add(answerRow);
        });

        answersBox.getChildren().addAll(answersLabel, answersContentBox, addAnswerBtn);

        // Pré-remplir
        if (existingQuestion != null && existingQuestion.getAnswers() != null) {
            for (int i = 0; i < existingQuestion.getAnswers().size() && i < answerFields.size(); i++) {
                answerFields.get(i).setText(existingQuestion.getAnswers().get(i).getAnswerText());
            }
        }

        mainBox.setUserData(new Object[]{questionArea, answerFields});
        mainBox.getChildren().addAll(questionBox, answersBox);

        return mainBox;
    }

    /**
     * ✅ CRÉER UNE LIGNE DE RÉPONSE
     */
    private HBox createAnswerRow(int index, List<TextField> answerFields, VBox parentBox) {
        HBox row = new HBox(10);
        row.setAlignment(Pos.CENTER_LEFT);
        row.setStyle("-fx-background-color: white; -fx-padding: 10; -fx-background-radius: 6; " +
                "-fx-border-color: #e5e7eb; -fx-border-width: 1;");

        Label orderLabel = new Label(index + ".");
        orderLabel.setStyle("-fx-font-weight: bold; -fx-font-size: 13; -fx-min-width: 30; " +
                "-fx-text-fill: #5b8def;");

        TextField answerField = new TextField();
        answerField.setPromptText("Réponse " + index);
        answerField.setPrefWidth(400);
        answerField.setStyle("-fx-padding: 8 12; -fx-background-radius: 6; -fx-border-color: #e5e7eb;");

        Button deleteBtn = new Button("❌");
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

    /**
     * ✅ EXTRAIRE LA QUESTION DEPUIS LE FORMULAIRE
     */
    private SpecificQuestion extractQuestionFromForm(VBox form) {
        Object[] data = (Object[]) form.getUserData();
        TextArea questionArea = (TextArea) data[0];
        List<TextField> answerFields = (List<TextField>) data[1];

        String questionText = questionArea.getText().trim();
        if (questionText.isEmpty()) {
            showError("Erreur", "Le texte de la question ne peut pas être vide");
            return null;
        }

        SpecificQuestion question = new SpecificQuestion(questionText, 0);

        List<SpecificAnswer> answers = new ArrayList<>();
        int answerOrder = 1;
        for (TextField field : answerFields) {
            String answerText = field.getText().trim();
            if (!answerText.isEmpty()) {
                SpecificAnswer answer = new SpecificAnswer(answerText, answerOrder++);
                answers.add(answer);
            }
        }

        if (answers.isEmpty()) {
            showError("Erreur", "La question doit avoir au moins une réponse");
            return null;
        }

        question.setAnswers(answers);
        return question;
    }

    /**
     * ✅ AJOUTER UNE CARD DE QUESTION
     */
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
        Button editBtn = new Button("✏️");
        editBtn.setStyle("-fx-padding: 6 10; -fx-font-size: 10; -fx-background-color: #5b8def; " +
                "-fx-text-fill: white; -fx-background-radius: 6;");
        editBtn.setOnAction(e -> editQuestion(questionIndex));

        Button deleteBtn = new Button("🗑️");
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

    /**
     * ✅ MODIFIER UNE QUESTION
     */
    private void editQuestion(int index) {
        SpecificQuestion question = questions.get(index);

        Dialog<SpecificQuestion> dialog = new Dialog<>();
        dialog.setTitle("✏️ Modifier une Question");
        dialog.setHeaderText("Modifier la question sélectionnée");
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

    /**
     * ✅ RAFRAÎCHIR L'AFFICHAGE
     */
    private void refreshQuestionsDisplay() {
        questionsContainer.getChildren().clear();
        for (SpecificQuestion question : questions) {
            addQuestionCard(question);
        }
    }

    /**
     * ✅ METTRE À JOUR LE COMPTEUR
     */
    private void updateQuestionCount() {
        questionsCountLabel.setText(questions.size() + "/13");
        if (questions.size() >= 13) {
            questionsCountLabel.setStyle("-fx-text-fill: #10b981; -fx-font-weight: bold;");
        } else {
            questionsCountLabel.setStyle("-fx-text-fill: #ef4444; -fx-font-weight: bold;");
        }
    }

    /**
     * ✅ METTRE À JOUR LE TEST
     */
    private void updateTest() {
        try {
            // Validations
            if (categoryCombo.getValue() == null) {
                showError("Erreur", "Sélectionnez une catégorie");
                return;
            }

            if (titleField.getText().trim().isEmpty()) {
                showError("Erreur", "Le titre du test ne peut pas être vide");
                return;
            }

            if (questions.isEmpty()) {
                showError("Erreur", "Le test doit contenir au moins une question");
                return;
            }

            // Mettre à jour le test
            currentTest.setCategory(categoryCombo.getValue());
            currentTest.setTitle(titleField.getText());
            currentTest.setDescription(descriptionField.getText());
            currentTest.setStatus(statusCombo.getValue());

            if (SpecificTestService.updateSpecificTest(currentTest, questions)) {
                System.out.println("✅ Test modifié avec succès");
                showSuccess("Succès", "✅ Test modifié avec succès!");
                goBack();
            } else {
                showError("Erreur", "Impossible de modifier le test");
            }

        } catch (SQLException e) {
            System.err.println("❌ Erreur: " + e.getMessage());
            showError("Erreur", "Erreur: " + e.getMessage());
        }
    }

    /**
     * ✅ SUPPRIMER LE TEST
     */
    private void deleteTest() {
        Alert alert = new Alert(Alert.AlertType.CONFIRMATION);
        alert.setTitle("Confirmation");
        alert.setHeaderText("⚠️ Êtes-vous sûr?");
        alert.setContentText("Êtes-vous sûr de vouloir supprimer ce test?\n\nCette action est irréversible!");

        Optional<ButtonType> result = alert.showAndWait();
        if (result.isPresent() && result.get() == ButtonType.OK) {
            try {
                if (SpecificTestService.deleteSpecificTest(currentTest.getId())) {
                    System.out.println("✅ Test supprimé avec succès");
                    showSuccess("Succès", "✅ Test supprimé avec succès!");
                    goBack();
                }
            } catch (SQLException e) {
                System.err.println("❌ Erreur suppression: " + e.getMessage());
                showError("Erreur", "Erreur: " + e.getMessage());
            }
        }
    }

    /**
     * ✅ ANNULER
     */
    private void cancelForm() {
        Alert alert = new Alert(Alert.AlertType.CONFIRMATION);
        alert.setTitle("Confirmation");
        alert.setHeaderText("Êtes-vous sûr?");
        alert.setContentText("Voulez-vous annuler les modifications?");

        Optional<ButtonType> result = alert.showAndWait();
        if (result.isPresent() && result.get() == ButtonType.OK) {
            goBack();
        }
    }

    /**
     * ✅ RETOUR
     */
    private void goBack() {
        System.out.println("🔄 Retour à la liste des tests spécifiques");
        TestDataHolder.resetSpecificTestId();
        // ✅ CHEMIN CORRECT (AVEC MAJUSCULES)
        App.loadScene("/views/SpecificTest/SpecificTestList.fxml", "🎯 Tests Spécifiques");
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