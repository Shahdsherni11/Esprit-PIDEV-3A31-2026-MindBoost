package com.gestion_test.controllers;

import com.gestion_test.services.ChatGPTService;
import com.gestion_test.services.SpecificScoreService;
import com.gestion_test.services.ScoreService;
import com.gestion_test.services.AuthContext;
import com.gestion_test.App;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.Button;
import javafx.scene.control.Label;
import javafx.scene.control.ScrollPane;
import javafx.scene.control.TextArea;
import javafx.scene.layout.HBox;
import javafx.scene.layout.VBox;
import javafx.geometry.Pos;
import javafx.concurrent.Task;

import java.net.URL;
import java.sql.SQLException;
import java.util.ResourceBundle;

public class AIChatController implements Initializable {

    @FXML
    private VBox chatContainer;
    @FXML
    private TextArea messageInput;
    @FXML
    private Button sendBtn;
    @FXML
    private Button analyzeBtn;
    @FXML
    private ScrollPane chatScrollPane;
    @FXML
    private Label statusLabel;

    private String userCategory = "N/A";
    private String userLevel = "N/A";
    private int userPercentage = 0;

    @Override
    public void initialize(URL url, ResourceBundle rb) {
        System.out.println("AIChatController initialise");
        loadUserContext();
        addBotMessage("Bonjour! Je suis votre assistant en sante mentale.\n\n" +
                "Je peux vous aider de 2 facons:\n" +
                "1. Cliquez 'Analyser mes resultats' pour une analyse complete\n" +
                "2. Posez-moi vos questions directement\n\n" +
                "Comment puis-je vous aider?");
    }

    private void loadUserContext() {
        int userId = AuthContext.getCurrentUserId();
        try {
            userPercentage = ScoreService.getLatestPercentageForUser(userId);
            if (userPercentage >= 0) {
                userCategory = ScoreService.getCategoryFromPercentage(userPercentage);
            }
            userLevel = SpecificScoreService.getLatestLevel(userId);
        } catch (SQLException e) {
            System.err.println("Erreur chargement contexte: " + e.getMessage());
        }
    }

    @FXML
    private void handleSendMessage() {
        String message = messageInput.getText().trim();
        if (message.isEmpty()) return;

        // Afficher le message de l'utilisateur
        addUserMessage(message);
        messageInput.clear();

        // Desactiver pendant le chargement
        sendBtn.setDisable(true);
        analyzeBtn.setDisable(true);
        statusLabel.setText("L'IA reflechit...");

        // Appel API dans un thread separe
        Task<String> task = new Task<String>() {
            @Override
            protected String call() {
                return ChatGPTService.chatWithContext(message, userCategory, userLevel, userPercentage);
            }
        };

        task.setOnSucceeded(e -> {
            String response = task.getValue();
            addBotMessage(response);
            sendBtn.setDisable(false);
            analyzeBtn.setDisable(false);
            statusLabel.setText("");
        });

        task.setOnFailed(e -> {
            addBotMessage("Erreur: Impossible de contacter l'IA.");
            sendBtn.setDisable(false);
            analyzeBtn.setDisable(false);
            statusLabel.setText("");
        });

        new Thread(task).start();
    }

    @FXML
    private void handleAnalyzeResults() {
        addUserMessage("Analyse mes resultats de test s'il te plait");

        sendBtn.setDisable(true);
        analyzeBtn.setDisable(true);
        statusLabel.setText("Analyse en cours...");

        int userId = AuthContext.getCurrentUserId();

        Task<String> task = new Task<String>() {
            @Override
            protected String call() {
                try {
                    // Recuperer les details des reponses
                    String answersDetails = SpecificScoreService.getLatestAnswersDetails(userId);

                    String testTitle = "Test Specifique";
                    int totalScore = 0;
                    int maxScore = 0;

                    try {
                        totalScore = SpecificScoreService.getLatestTotalScore(userId);
                        maxScore = SpecificScoreService.getLatestMaxScore(userId);
                    } catch (Exception ex) {
                        // Valeurs par defaut
                    }

                    return ChatGPTService.analyzeTestResults(
                            userCategory, userLevel, userPercentage,
                            totalScore, maxScore, testTitle, answersDetails
                    );
                } catch (SQLException e) {
                    return ChatGPTService.analyzeTestResults(
                            userCategory, userLevel, userPercentage,
                            0, 0, "Test", "Details non disponibles"
                    );
                }
            }
        };

        task.setOnSucceeded(e -> {
            String response = task.getValue();
            addBotMessage(response);
            sendBtn.setDisable(false);
            analyzeBtn.setDisable(false);
            statusLabel.setText("");
        });

        task.setOnFailed(e -> {
            addBotMessage("Erreur lors de l'analyse.");
            sendBtn.setDisable(false);
            analyzeBtn.setDisable(false);
            statusLabel.setText("");
        });

        new Thread(task).start();
    }

    private void addUserMessage(String text) {
        HBox box = new HBox();
        box.setAlignment(Pos.CENTER_RIGHT);
        box.setStyle("-fx-padding: 5 10;");

        Label msg = new Label(text);
        msg.setWrapText(true);
        msg.setMaxWidth(500);
        msg.setStyle("-fx-background-color: #6C63FF; -fx-text-fill: white; " +
                "-fx-padding: 12 16; -fx-background-radius: 16 16 4 16; " +
                "-fx-font-size: 13px;");

        box.getChildren().add(msg);
        chatContainer.getChildren().add(box);
        scrollToBottom();
    }

    private void addBotMessage(String text) {
        HBox box = new HBox();
        box.setAlignment(Pos.CENTER_LEFT);
        box.setStyle("-fx-padding: 5 10;");

        VBox msgBox = new VBox(4);

        Label name = new Label("MindBoost IA");
        name.setStyle("-fx-text-fill: #4ECDC4; -fx-font-size: 10px; -fx-font-weight: bold;");

        Label msg = new Label(text);
        msg.setWrapText(true);
        msg.setMaxWidth(550);
        msg.setStyle("-fx-background-color: rgba(255,255,255,0.08); -fx-text-fill: #E8E8F0; " +
                "-fx-padding: 12 16; -fx-background-radius: 16 16 16 4; " +
                "-fx-font-size: 13px; -fx-line-spacing: 3;");

        msgBox.getChildren().addAll(name, msg);
        box.getChildren().add(msgBox);
        chatContainer.getChildren().add(box);
        scrollToBottom();
    }

    private void scrollToBottom() {
        chatScrollPane.layout();
        chatScrollPane.setVvalue(1.0);
    }

    @FXML
    private void handleKeyPress(javafx.scene.input.KeyEvent event) {
        if (event.getCode() == javafx.scene.input.KeyCode.ENTER && !event.isShiftDown()) {
            event.consume();
            handleSendMessage();
        }
    }

    // ===== NAVIGATION =====

    @FXML
    private void handleOpenGeneralTests() {
        App.loadScene("/views/GeneralTest/GeneralTestList.fxml", "Tests Generaux");
    }

    @FXML
    private void handleOpenSpecificTests() {
        App.loadScene("/views/SpecificTest/SpecificTestList.fxml", "Tests Specifiques");
    }

    @FXML
    private void handleOpenStats() {
        App.loadScene("/views/StudentStats.fxml", "Mes Statistiques");
    }

    @FXML
    private void handleLogout() {
        AuthContext.logout();
        App.loadScene("/views/SelectRole.fxml", "MindBoost");
    }
}