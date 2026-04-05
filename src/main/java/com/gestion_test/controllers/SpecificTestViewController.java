package com.gestion_test.controllers;

import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.Alert;
import javafx.scene.control.Button;
import javafx.scene.control.Label;
import javafx.scene.layout.VBox;
import javafx.scene.layout.HBox;
import javafx.scene.layout.Region;
import javafx.scene.layout.Priority;
import javafx.geometry.Pos;
import com.gestion_test.entities.SpecificTest;
import com.gestion_test.entities.SpecificQuestion;
import com.gestion_test.entities.SpecificAnswer;
import com.gestion_test.services.SpecificTestService;
import com.gestion_test.services.AuthContext;
import com.gestion_test.utils.TestDataHolder;
import com.gestion_test.App;

import java.net.URL;
import java.sql.SQLException;
import java.util.ResourceBundle;

public class SpecificTestViewController implements Initializable {

    @FXML private Label idLabel;
    @FXML private Label categoryLabel;
    @FXML private Label statusLabel;
    @FXML private Label createdAtLabel;
    @FXML private Label titleLabel;
    @FXML private Label descriptionLabel;
    @FXML private Label questionsCountLabel;
    @FXML private VBox questionsContainer;
    @FXML private Button editBtn;
    @FXML private Button editBtn2;
    @FXML private Button backBtn;
    @FXML private Button backBtn2;

    private SpecificTest currentTest;

    @Override
    public void initialize(URL url, ResourceBundle rb) {
        System.out.println("SpecificTestViewController initialise");
        setupActions();

        int testId = TestDataHolder.getSelectedSpecificTestId();
        if (testId > 0) {
            loadTest(testId);
        } else {
            showError("Erreur", "Aucun test selectionne");
        }
    }

    public void loadTest(int testId) {
        try {
            currentTest = SpecificTestService.getSpecificTestById(testId);
            if (currentTest != null) {
                displayTest();
            } else {
                showError("Erreur", "Test non trouve");
            }
        } catch (SQLException e) {
            showError("Erreur", "Erreur: " + e.getMessage());
        }
    }

    private void displayTest() {
        if (currentTest == null) return;

        idLabel.setText(String.valueOf(currentTest.getId()));
        categoryLabel.setText(currentTest.getCategory() != null ? currentTest.getCategory() : "N/A");
        statusLabel.setText(currentTest.getStatus() != null ? currentTest.getStatus() : "N/A");

        String created = currentTest.getCreatedAt();
        createdAtLabel.setText(created != null && created.length() >= 10 ? created.substring(0, 10) : "N/A");

        titleLabel.setText(currentTest.getTitle() != null ? currentTest.getTitle() : "N/A");
        descriptionLabel.setText(currentTest.getDescription() != null ?
                currentTest.getDescription() : "Aucune description");

        questionsContainer.getChildren().clear();
        if (currentTest.getQuestions() != null && !currentTest.getQuestions().isEmpty()) {
            questionsCountLabel.setText("(" + currentTest.getQuestions().size() + ")");
            for (SpecificQuestion question : currentTest.getQuestions()) {
                questionsContainer.getChildren().add(createQuestionCard(question));
            }
        } else {
            questionsCountLabel.setText("(0)");
        }
    }

    private VBox createQuestionCard(SpecificQuestion question) {
        VBox card = new VBox(8);
        card.setStyle("-fx-border-color: #e5e7eb; -fx-border-radius: 8; -fx-padding: 12; -fx-background-color: #f9fafb;");

        HBox headerBox = new HBox(12);
        headerBox.setAlignment(Pos.CENTER_LEFT);

        Label numberLabel = new Label("Q" + question.getQuestionOrder());
        numberLabel.setStyle("-fx-font-weight: bold; -fx-text-fill: #5b8def; -fx-min-width: 40;");

        Label titleLbl = new Label(question.getQuestionText());
        titleLbl.setStyle("-fx-font-weight: bold;");
        titleLbl.setWrapText(true);

        Region spacer = new Region();
        HBox.setHgrow(spacer, Priority.ALWAYS);

        headerBox.getChildren().addAll(numberLabel, titleLbl, spacer);

        VBox answersBox = new VBox(4);
        answersBox.setStyle("-fx-padding: 10 0 0 30;");
        if (question.getAnswers() != null) {
            for (SpecificAnswer answer : question.getAnswers()) {
                Label answerLabel = new Label("  " + answer.getAnswerOrder() + ". " + answer.getAnswerText());
                answersBox.getChildren().add(answerLabel);
            }
        }

        card.getChildren().addAll(headerBox, answersBox);
        return card;
    }

    private void setupActions() {
        if (editBtn != null) editBtn.setOnAction(e -> editTest());
        if (editBtn2 != null) editBtn2.setOnAction(e -> editTest());
        if (backBtn != null) backBtn.setOnAction(e -> goBack());
        if (backBtn2 != null) backBtn2.setOnAction(e -> goBack());
    }

    private void editTest() {
        if (currentTest == null) return;
        TestDataHolder.setSelectedSpecificTestId(currentTest.getId());
        App.loadScene("/views/SpecificTest/SpecificTestEdit.fxml", "Modifier - " + currentTest.getTitle());
    }

    private void goBack() {
        TestDataHolder.resetSpecificTestId();
        App.loadScene("/views/SpecificTest/SpecificTestList.fxml", "Tests Specifiques");
    }

    private void showError(String title, String message) {
        Alert alert = new Alert(Alert.AlertType.ERROR);
        alert.setTitle(title);
        alert.setContentText(message);
        alert.showAndWait();
    }
}