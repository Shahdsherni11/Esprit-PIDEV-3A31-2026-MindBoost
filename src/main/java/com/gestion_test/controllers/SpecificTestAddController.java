package com.gestion_test.controllers;

import com.gestion_test.entities.GeneralTest;
import com.gestion_test.entities.SpecificTest;
import com.gestion_test.entities.SpecificTest.SpecificQuestion;
import com.gestion_test.entities.SpecificTest.SpecificAnswer;
import com.gestion_test.services.GeneralTestService;
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
 * ✅ Controller pour créer un test spécifique QCM (sans scores)
 */
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

    private List<SpecificQuestion> questions = new ArrayList<>();
    private int questionCounter = 1;

    @FXML
    public void initialize() {
        System.out.println("✅ SpecificTestAddController initialisé");
        setupComboBoxes();
        setupActions();
    }

    /**
     * ✅ Configurer les ComboBox
     */
    private void setupComboBoxes() {
        try {
            // Charger les tests généraux
            List<GeneralTest> generalTests = GeneralTestService.getAllGeneralTests();
            generalTestCombo.setItems(FXCollections.observableArrayList(generalTests));

            // Catégories
            categoryCombo.setItems(FXCollections.observableArrayList(
                    "Anxiété", "Dépression", "Stress", "Trouble du Sommeil"
            ));

            // Statuts
            statusCombo.setItems(FXCollections.observableArrayList(
                    "DRAFT", "ACTIVE", "INACTIVE"
            ));
            statusCombo.setValue("DRAFT");

            System.out.println("✅ ComboBox configurés");

        } catch (SQLException e) {
            System.err.println("❌ Erreur chargement ComboBox: " + e.getMessage());
            showError("Erreur", "Erreur: " + e.getMessage());
        }
    }

    /**
     * ✅ Configurer les actions des boutons
     */
    private void setupActions() {
        addQuestionBtn.setOnAction(e -> addQuestion());
        saveBtn.setOnAction(e -> saveTest());
        cancelBtn.setOnAction(e -> cancelForm());
        if (backBtn != null) {
            backBtn.setOnAction(e -> goBack());
        }
    }

    /**
     * ✅ AJOUTER UNE QUESTION
     */
    private void addQuestion() {
        Dialog<SpecificQuestion> dialog = new Dialog<>();
        dialog.setTitle("➕ Ajouter une Question");
        dialog.setHeaderText("Créer une nouvelle question avec ses réponses");
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
                System.out.println("✅ Question ajoutée: " + question.getQuestionText());
            } else {
                showError("Erreur", "❌ La question doit avoir au moins une réponse");
            }
        });
    }

    /**
     * ✅ CRÉER LE FORMULAIRE DE QUESTION
     */
    private VBox createQuestionForm(SpecificQuestion existingQuestion) {
        VBox mainBox = new VBox(15);
        mainBox.setPadding(new Insets(15));

        // ===== TEXTE DE LA QUESTION =====
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

        // ===== CONTENEUR POUR LES RÉPONSES =====
        VBox answersBox = new VBox(10);
        Label answersLabel = new Label("📋 Réponses (sans scores):");
        answersLabel.setStyle("-fx-font-weight: bold; -fx-font-size: 13;");

        VBox answersContentBox = new VBox(10);
        answersContentBox.setStyle("-fx-border-color: #e5e7eb; -fx-border-radius: 8; -fx-padding: 12; -fx-background-color: #f9fafb;");

        // Créer 3 champs de réponses par défaut
        List<TextField> answerFields = new ArrayList<>();
        for (int i = 0; i < 3; i++) {
            HBox answerRow = createAnswerRow(i + 1, answerFields, answersContentBox);
            answersContentBox.getChildren().add(answerRow);
        }

        // Bouton pour ajouter des réponses
        Button addAnswerBtn = new Button("➕ Ajouter une réponse");
        addAnswerBtn.setStyle("-fx-padding: 8 16; -fx-font-size: 11; -fx-background-color: #5b8def; " +
                "-fx-text-fill: white; -fx-background-radius: 8;");
        addAnswerBtn.setOnAction(e -> {
            HBox answerRow = createAnswerRow(answerFields.size() + 1, answerFields, answersContentBox);
            answersContentBox.getChildren().add(answerRow);
        });

        answersBox.getChildren().addAll(answersLabel, answersContentBox, addAnswerBtn);

        // Pré-remplir avec les réponses existantes
        if (existingQuestion != null && existingQuestion.getAnswers() != null) {
            for (int i = 0; i < existingQuestion.getAnswers().size() && i < answerFields.size(); i++) {
                answerFields.get(i).setText(existingQuestion.getAnswers().get(i).getAnswerText());
            }
        }

        // Stocker les références
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
        answerField.setPromptText("Texte de la réponse " + index);
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
            showError("Erreur", "❌ Le texte de la question ne peut pas être vide");
            return null;
        }

        // Créer la question
        SpecificQuestion question = new SpecificQuestion(questionText, 0);

        // Créer les réponses
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
            showError("Erreur", "❌ La question doit avoir au moins une réponse");
            return null;
        }

        question.setAnswers(answers);
        return question;
    }

    /**
     * ✅ AJOUTER UNE CARD DE QUESTION AU CONTENEUR
     */
    private void addQuestionCard(SpecificQuestion question) {
        VBox card = new VBox(8);
        card.setStyle("-fx-border-color: #e5e7eb; -fx-border-radius: 8; -fx-padding: 14; " +
                "-fx-background-color: #f9fafb; -fx-border-width: 1;");

        // En-tête avec numéro et titre
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

        // Afficher les réponses
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
                System.out.println("✅ Question modifiée");
            }
        });
    }

    /**
     * ✅ RAFRAÎCHIR L'AFFICHAGE DES QUESTIONS
     */
    private void refreshQuestionsDisplay() {
        questionsContainer.getChildren().clear();
        for (SpecificQuestion question : questions) {
            addQuestionCard(question);
        }
    }

    /**
     * ✅ METTRE À JOUR LE COMPTEUR DE QUESTIONS
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
     * ✅ SAUVEGARDER LE TEST
     */
    private void saveTest() {
        try {
            // ===== VALIDATIONS =====
            if (generalTestCombo.getValue() == null) {
                showError("Erreur", "❌ Sélectionnez un test général parent");
                return;
            }

            if (categoryCombo.getValue() == null) {
                showError("Erreur", "❌ Sélectionnez une catégorie");
                return;
            }

            if (titleField.getText().trim().isEmpty()) {
                showError("Erreur", "❌ Le titre du test ne peut pas être vide");
                return;
            }

            if (questions.isEmpty()) {
                showError("Erreur", "❌ Le test doit contenir au moins une question");
                return;
            }

            if (questions.size() < 13) {
                Alert alert = new Alert(Alert.AlertType.WARNING);
                alert.setTitle("Attention");
                alert.setHeaderText("Nombre de questions insuffisant");
                alert.setContentText("Il est recommandé d'avoir 13 questions.\n\n" +
                        "Vous avez actuellement: " + questions.size() + " question(s)\n\n" +
                        "Voulez-vous continuer?");

                Optional<ButtonType> result = alert.showAndWait();
                if (result.isEmpty() || result.get() == ButtonType.CANCEL) {
                    return;
                }
            }

            // ===== CRÉER LE TEST =====
            SpecificTest test = new SpecificTest();
            test.setGeneralTestId(generalTestCombo.getValue().getId());
            test.setCategory(categoryCombo.getValue());
            test.setTitle(titleField.getText());
            test.setDescription(descriptionArea.getText());
            test.setStatus(statusCombo.getValue());

            int testId = SpecificTestService.createSpecificTest(test, questions);

            System.out.println("✅ Test spécifique créé avec succès!");
            showSuccess("Succès", "✅ Test spécifique créé avec succès!\n\nID: " + testId);
            goBack();

        } catch (SQLException e) {
            System.err.println("❌ Erreur lors de la sauvegarde: " + e.getMessage());
            showError("Erreur", "❌ Erreur lors de la sauvegarde: " + e.getMessage());
            e.printStackTrace();
        }
    }

    /**
     * ✅ ANNULER LA CRÉATION
     */
    private void cancelForm() {
        Alert alert = new Alert(Alert.AlertType.CONFIRMATION);
        alert.setTitle("Confirmation");
        alert.setHeaderText("Êtes-vous sûr?");
        alert.setContentText("Voulez-vous annuler et perdre les données?");

        Optional<ButtonType> result = alert.showAndWait();
        if (result.isPresent() && result.get() == ButtonType.OK) {
            goBack();
        }
    }

    /**
     * ✅ RETOURNER À LA LISTE
     */
    private void goBack() {
        App.loadScene("/views/SpecificTest/SpecificTestList.fxml", "🎯 Tests Spécifiques");
    }

    /**
     * ✅ AFFICHER UNE ALERTE D'ERREUR
     */
    private void showError(String title, String message) {
        Alert alert = new Alert(Alert.AlertType.ERROR);
        alert.setTitle(title);
        alert.setHeaderText(null);
        alert.setContentText(message);
        alert.showAndWait();
    }

    /**
     * ✅ AFFICHER UN MESSAGE DE SUCCÈS
     */
    private void showSuccess(String title, String message) {
        Alert alert = new Alert(Alert.AlertType.INFORMATION);
        alert.setTitle(title);
        alert.setHeaderText(null);
        alert.setContentText(message);
        alert.showAndWait();
    }
}