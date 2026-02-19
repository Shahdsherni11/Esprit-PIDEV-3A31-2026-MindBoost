package com.gestion_test.controllers;

import com.gestion_test.entities.GeneralTest;
import com.gestion_test.entities.GeneralTest.GeneralQuestion;
import com.gestion_test.entities.GeneralTest.GeneralAnswer;
import com.gestion_test.services.GeneralTestService;
import com.gestion_test.utils.TestDataHolder;
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
    private Button backBtn;  // ✅ AJOUTÉ

    @FXML
    private Button addQuestionBtn;

    @FXML
    private Button editQuestionBtn;  // ✅ AJOUTÉ

    @FXML
    private Button removeQuestionBtn;  // ✅ AJOUTÉ

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

        // ✅ TOUS LES BOUTONS LIÉS
        backBtn.setOnAction(e -> goBack());
        addQuestionBtn.setOnAction(e -> addQuestion());
        editQuestionBtn.setOnAction(e -> editQuestion());
        removeQuestionBtn.setOnAction(e -> removeQuestion());
        deleteBtn.setOnAction(e -> deleteTest());
        updateBtn.setOnAction(e -> updateTest());
        cancelBtn.setOnAction(e -> cancelForm());

        System.out.println("✅ GeneralTestEditController initialisé");

        // ✅ CHARGER LE TEST DEPUIS TestDataHolder
        int testId = TestDataHolder.getSelectedGeneralTestId();
        System.out.println("🔄 ID du test récupéré: " + testId);

        if (testId > 0) {
            loadTest(testId);
        } else {
            System.err.println("❌ Aucun ID de test trouvé!");
            showAlert("❌ Erreur", "Aucun test sélectionné", Alert.AlertType.ERROR);
        }
    }

    /**
     * ✅ Charger le test par ID
     */
    public void loadTest(int testId) {
        try {
            System.out.println("🔄 Chargement du test ID: " + testId);
            currentTest = GeneralTestService.getGeneralTestById(testId);
            if (currentTest != null) {
                displayTest();
                System.out.println("✅ Test chargé: " + currentTest.getTitle());
            } else {
                System.err.println("❌ Test non trouvé");
                showAlert("❌ Erreur", "Test non trouvé", Alert.AlertType.ERROR);
            }
        } catch (SQLException e) {
            System.err.println("❌ Erreur: " + e.getMessage());
            showAlert("❌ Erreur", "Erreur: " + e.getMessage(), Alert.AlertType.ERROR);
        }
    }

    /**
     * ✅ Afficher les détails du test
     */
    private void displayTest() {
        idField.setText(String.valueOf(currentTest.getId()));
        createdDateField.setText(currentTest.getCreatedAt() != null ?
                currentTest.getCreatedAt().toString() : "N/A");
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
     * ✅ Ajouter une nouvelle question QCM
     */
    private void addQuestion() {
        Dialog<GeneralQuestion> dialog = new Dialog<>();
        dialog.setTitle("➕ Ajouter une Question QCM");
        dialog.setHeaderText("Créer une nouvelle question avec 4 options (A, B, C, D)");

        dialog.getDialogPane().getButtonTypes().addAll(ButtonType.OK, ButtonType.CANCEL);

        VBox content = createQuestionForm(null);
        dialog.getDialogPane().setContent(content);
        dialog.getDialogPane().setPrefWidth(700);
        dialog.getDialogPane().setPrefHeight(600);

        dialog.setResultConverter(dialogButton -> {
            if (dialogButton == ButtonType.OK) {
                return extractQuestionFromForm(content, null);
            }
            return null;
        });

        Optional<GeneralQuestion> result = dialog.showAndWait();
        result.ifPresent(question -> {
            if (question != null && question.getAnswers().size() == 4) {
                questions.add(question);
                questionsList.getItems().add(question);
                questionsList.refresh();
                System.out.println("✅ Question ajoutée");
            } else {
                showAlert("❌ Erreur", "Chaque question doit avoir exactement 4 réponses (A, B, C, D)", Alert.AlertType.WARNING);
            }
        });
    }

    /**
     * ✅ Modifier une question existante
     */
    private void editQuestion() {
        int selectedIndex = questionsList.getSelectionModel().getSelectedIndex();
        if (selectedIndex < 0) {
            showAlert("❌ Erreur", "Sélectionnez une question à modifier", Alert.AlertType.WARNING);
            return;
        }

        GeneralQuestion selectedQuestion = questionsList.getItems().get(selectedIndex);

        Dialog<GeneralQuestion> dialog = new Dialog<>();
        dialog.setTitle("✏️ Modifier une Question QCM");
        dialog.setHeaderText("Modifier la question sélectionnée");

        dialog.getDialogPane().getButtonTypes().addAll(ButtonType.OK, ButtonType.CANCEL);

        VBox content = createQuestionForm(selectedQuestion);
        dialog.getDialogPane().setContent(content);
        dialog.getDialogPane().setPrefWidth(700);
        dialog.getDialogPane().setPrefHeight(600);

        dialog.setResultConverter(dialogButton -> {
            if (dialogButton == ButtonType.OK) {
                return extractQuestionFromForm(content, selectedQuestion);
            }
            return null;
        });

        Optional<GeneralQuestion> result = dialog.showAndWait();
        result.ifPresent(question -> {
            if (question != null && question.getAnswers().size() == 4) {
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
            showAlert("❌ Erreur", "Sélectionnez une question à supprimer", Alert.AlertType.WARNING);
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
            questionsList.refresh();
            showAlert("✅ Succès", "Question supprimée", Alert.AlertType.INFORMATION);
        }
    }

    /**
     * ✅ Créer le formulaire de question QCM avec 4 options
     */
    private VBox createQuestionForm(GeneralQuestion question) {
        VBox vbox = new VBox(10);
        vbox.setPadding(new Insets(15));

        // Texte de la question
        Label questionLabel = new Label("📝 Texte de la question:");
        questionLabel.setStyle("-fx-font-weight: bold;");
        TextField questionTextField = new TextField();
        questionTextField.setPromptText("Entrez la question...");
        questionTextField.setStyle("-fx-font-size: 12;");
        if (question != null && question.getQuestionText() != null) {
            questionTextField.setText(question.getQuestionText());
        }

        // Ordre de la question
        Label orderLabel = new Label("🔢 Ordre de la question:");
        orderLabel.setStyle("-fx-font-weight: bold;");
        Spinner<Integer> orderSpinner = new Spinner<>(1, 100, question != null ? question.getQuestionOrder() : 1);
        orderSpinner.setPrefWidth(200);

        // Séparateur
        Separator separator1 = new Separator();
        separator1.setPadding(new Insets(10, 0, 10, 0));

        // Options QCM
        Label optionsLabel = new Label("📋 Options de réponse (A, B, C, D):");
        optionsLabel.setStyle("-fx-font-weight: bold; -fx-font-size: 13;");

        // Options A, B, C, D
        TextField[] answerFields = new TextField[4];
        Spinner<Integer>[] scoreSpinners = new Spinner[4];
        String[] labels = {"A", "B", "C", "D"};
        int[] defaultScores = {100, 75, 50, 25};

        VBox optionsBox = new VBox(10);
        optionsBox.setStyle("-fx-border-color: #e0e0e0; -fx-border-radius: 5; -fx-padding: 10;");

        for (int i = 0; i < 4; i++) {
            HBox optionRow = new HBox(10);
            optionRow.setAlignment(javafx.geometry.Pos.CENTER_LEFT);

            // Label (A, B, C, D)
            Label optionLabel = new Label(labels[i] + ")");
            optionLabel.setStyle("-fx-font-weight: bold; -fx-font-size: 14; -fx-min-width: 30;");

            // Champ texte de la réponse
            answerFields[i] = new TextField();
            answerFields[i].setPromptText("Texte de l'option " + labels[i]);
            answerFields[i].setPrefWidth(300);

            // Score
            Label scoreLabel = new Label("Score:");
            scoreLabel.setStyle("-fx-font-weight: bold;");

            scoreSpinners[i] = new Spinner<>(0, 100, defaultScores[i]);
            scoreSpinners[i].setPrefWidth(80);

            // Pré-remplir avec les données existantes
            if (question != null && question.getAnswers() != null && question.getAnswers().size() > i) {
                GeneralAnswer answer = question.getAnswers().get(i);
                answerFields[i].setText(answer.getAnswerText());
                scoreSpinners[i].getValueFactory().setValue(answer.getScore());
            }

            optionRow.getChildren().addAll(optionLabel, answerFields[i], scoreLabel, scoreSpinners[i]);
            optionsBox.getChildren().add(optionRow);
        }

        // Assemblage final
        vbox.getChildren().addAll(
                questionLabel, questionTextField,
                orderLabel, orderSpinner,
                separator1,
                optionsLabel,
                optionsBox
        );

        // Stocker les références pour extraction
        vbox.setUserData(new Object[]{questionTextField, orderSpinner, answerFields, scoreSpinners});

        return vbox;
    }

    /**
     * ✅ Extraire la question depuis le formulaire
     */
    private GeneralQuestion extractQuestionFromForm(VBox form, GeneralQuestion existingQuestion) {
        Object[] data = (Object[]) form.getUserData();
        TextField questionTextField = (TextField) data[0];
        Spinner<Integer> orderSpinner = (Spinner<Integer>) data[1];
        TextField[] answerFields = (TextField[]) data[2];
        Spinner<Integer>[] scoreSpinners = (Spinner<Integer>[]) data[3];

        // Validation
        if (questionTextField.getText().trim().isEmpty()) {
            showAlert("❌ Erreur", "Le texte de la question ne peut pas être vide", Alert.AlertType.WARNING);
            return null;
        }

        for (int i = 0; i < 4; i++) {
            if (answerFields[i].getText().trim().isEmpty()) {
                showAlert("❌ Erreur", "Toutes les options (A, B, C, D) doivent avoir un texte", Alert.AlertType.WARNING);
                return null;
            }
        }

        // Créer la question
        GeneralQuestion question = existingQuestion != null ? existingQuestion : new GeneralQuestion();
        question.setQuestionText(questionTextField.getText());
        question.setQuestionOrder(orderSpinner.getValue());

        // Créer les 4 réponses
        List<GeneralAnswer> answers = new ArrayList<>();
        String[] labels = {"A", "B", "C", "D"};
        for (int i = 0; i < 4; i++) {
            GeneralAnswer answer = new GeneralAnswer(
                    answerFields[i].getText(),
                    labels[i],
                    scoreSpinners[i].getValue(),
                    i + 1
            );
            answers.add(answer);
        }

        question.setAnswers(answers);
        return question;
    }

    /**
     * ✅ Mettre à jour le test
     */
    private void updateTest() {
        try {
            if (titleField.getText().trim().isEmpty()) {
                showAlert("❌ Erreur", "Le titre du test ne peut pas être vide", Alert.AlertType.WARNING);
                return;
            }

            if (questions.isEmpty()) {
                showAlert("❌ Erreur", "Le test doit contenir au moins une question", Alert.AlertType.WARNING);
                return;
            }

            currentTest.setTitle(titleField.getText());
            currentTest.setDescription(descriptionField.getText());
            currentTest.setQuestions(questions);

            if (testService.update(currentTest)) {
                System.out.println("✅ Test modifié avec succès");
                showAlert("✅ Succès", "Test modifié avec succès !", Alert.AlertType.INFORMATION);
                goBack();
            } else {
                showAlert("❌ Erreur", "Impossible de modifier le test", Alert.AlertType.ERROR);
            }

        } catch (SQLException e) {
            System.err.println("❌ Erreur: " + e.getMessage());
            showAlert("❌ Erreur", "Erreur: " + e.getMessage(), Alert.AlertType.ERROR);
            e.printStackTrace();
        }
    }

    /**
     * ✅ Supprimer le test
     */
    private void deleteTest() {
        if (currentTest == null) {
            showAlert("❌ Erreur", "Aucun test à supprimer", Alert.AlertType.WARNING);
            return;
        }

        Alert confirmAlert = new Alert(Alert.AlertType.CONFIRMATION);
        confirmAlert.setTitle("Confirmation de suppression");
        confirmAlert.setHeaderText("Êtes-vous sûr ?");
        confirmAlert.setContentText("Voulez-vous vraiment supprimer ce test ?");

        Optional<ButtonType> result = confirmAlert.showAndWait();

        if (result.isPresent() && result.get() == ButtonType.OK) {
            try {
                if (GeneralTestService.deleteGeneralTest(currentTest.getId())) {
                    System.out.println("✅ Test supprimé avec succès");
                    showAlert("✅ Succès", "Test supprimé avec succès", Alert.AlertType.INFORMATION);
                    goBack();
                } else {
                    showAlert("❌ Erreur", "Impossible de supprimer le test", Alert.AlertType.ERROR);
                }

            } catch (SQLException e) {
                System.err.println("❌ Erreur suppression: " + e.getMessage());
                showAlert("❌ Erreur", "Erreur lors de la suppression: " + e.getMessage(), Alert.AlertType.ERROR);
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
        TestDataHolder.resetGeneralTestId();
        App.loadScene("/views/GeneralTest/GeneralTestList.fxml", "📋 Tests Généraux");
    }

    /**
     * ✅ Afficher une alerte
     */
    private void showAlert(String title, String message, Alert.AlertType type) {
        Alert alert = new Alert(type);
        alert.setTitle(title);
        alert.setHeaderText(null);
        alert.setContentText(message);
        alert.showAndWait();
    }
}