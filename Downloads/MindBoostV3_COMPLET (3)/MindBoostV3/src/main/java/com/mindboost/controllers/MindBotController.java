package com.mindboost.controllers;

import com.mindboost.dao.MindBotDAO;
import com.mindboost.dao.PsychProfileDAO;
import com.mindboost.models.PsychProfile;
import com.mindboost.models.User;
import com.mindboost.services.AdaptiveUIService;
import com.mindboost.services.OpenRouterService;
import com.mindboost.utils.SessionManager;
import javafx.application.Platform;
import javafx.fxml.FXML;
import javafx.geometry.Insets;
import javafx.geometry.Pos;
import javafx.scene.control.*;
import javafx.scene.layout.*;
import javafx.scene.text.Text;
import javafx.scene.text.TextFlow;

import java.util.*;

public class MindBotController {

    @FXML private VBox chatBox;
    @FXML private TextField inputField;
    @FXML private Button sendBtn;
    @FXML private ScrollPane chatScroll;
    @FXML private Label contextLabel;
    @FXML private ProgressIndicator loadingIndicator;

    private final MindBotDAO botDAO = new MindBotDAO();
    private final PsychProfileDAO psychDAO = new PsychProfileDAO();
    private User currentUser;
    private PsychProfile psychProfile;
    private final List<Map<String,String>> conversationHistory = new ArrayList<>();

    @FXML
    public void initialize() {
        currentUser = SessionManager.getInstance().getCurrentUser();
        if (currentUser == null) return;

        loadingIndicator.setVisible(false);

        // Charge le profil psychologique
        try {
            psychProfile = psychDAO.getByUserId(currentUser.getId());
        } catch (Exception e) { e.printStackTrace(); }

        // Affiche le contexte
        if (psychProfile != null && contextLabel != null) {
            contextLabel.setText(
                "🧠 Profil: " + psychProfile.getDetectedType() +
                " | 😰 Anxiété: " + (int)psychProfile.getAnxiety() + "%" +
                " | 😊 Humeur: " + (int)psychProfile.getMood() + "%"
            );
        }

        // Message d'accueil contextuel
        String welcome = getContextualWelcome();
        addBotMessage(welcome);

        // Charge l'historique récent
        try {
            conversationHistory.addAll(botDAO.getHistory(currentUser.getId(), 10));
        } catch (Exception e) { e.printStackTrace(); }

        // Enter pour envoyer
        inputField.setOnAction(e -> handleSend());
    }

    private String getContextualWelcome() {
        if (psychProfile == null)
            return "Bonjour ! Je suis MindBot 🤖, votre assistant bien-être. Comment puis-je vous aider aujourd'hui ?";

        if (psychProfile.getAnxiety() > 65)
            return "Bonjour 😊 Je suis MindBot. Je sens que vous portez beaucoup ces derniers temps. Voulez-vous qu'on en parle ?";
        if (psychProfile.getMood() < 35)
            return "Bonjour. Je suis là pour vous 💙 Qu'est-ce qui vous pèse aujourd'hui ?";
        if (psychProfile.getFocus() > 65)
            return "Bonjour ! 🎯 Vous semblez très concentré aujourd'hui. Comment puis-je vous soutenir ?";
        return "Bonjour ! Je suis MindBot 🤖 Votre espace de bien-être mental. Comment allez-vous ?";
    }

    @FXML
    public void handleSend() {
        String msg = inputField.getText().trim();
        if (msg.isEmpty()) return;

        inputField.clear();
        addUserMessage(msg);

        // Sauvegarde dans historique
        botDAO.saveMessage(currentUser.getId(), "user", msg);
        conversationHistory.add(Map.of("role", "user", "content", msg));

        // Affiche chargement
        loadingIndicator.setVisible(true);
        sendBtn.setDisable(true);

        // Appel API en arrière-plan
        String psychContext = AdaptiveUIService.buildPsychContext(psychProfile);
        List<Map<String,String>> histCopy = new ArrayList<>(conversationHistory);

        new Thread(() -> {
            try {
                String response = OpenRouterService.chat(msg, psychContext, histCopy);
                Platform.runLater(() -> {
                    addBotMessage(response);
                    botDAO.saveMessage(currentUser.getId(), "assistant", response);
                    conversationHistory.add(Map.of("role", "assistant", "content", response));
                    loadingIndicator.setVisible(false);
                    sendBtn.setDisable(false);
                });
            } catch (Exception e) {
                Platform.runLater(() -> {
                    addBotMessage("⚠️ Je suis temporairement indisponible. Vérifiez votre connexion ou votre clé API OpenRouter.");
                    loadingIndicator.setVisible(false);
                    sendBtn.setDisable(false);
                });
            }
        }).start();
    }

    @FXML
    public void handleQuickMood() { inputField.setText("Je me sens anxieux aujourd'hui"); }
    @FXML
    public void handleQuickRelax() { inputField.setText("Donne-moi un exercice de respiration"); }
    @FXML
    public void handleQuickAdvice() { inputField.setText("Comment améliorer ma concentration ?"); }

    private void addUserMessage(String text) {
        HBox row = new HBox();
        row.setAlignment(Pos.CENTER_RIGHT);
        row.setPadding(new Insets(4, 8, 4, 60));

        VBox bubble = new VBox(4);
        bubble.setStyle("-fx-background-color:linear-gradient(to right,#6C63FF,#5A52D5);" +
                        "-fx-background-radius:18 18 4 18;-fx-padding:12 16;");
        Label label = new Label(text);
        label.setStyle("-fx-text-fill:white;-fx-font-size:14px;");
        label.setWrapText(true);
        label.setMaxWidth(380);
        bubble.getChildren().add(label);
        row.getChildren().add(bubble);
        chatBox.getChildren().add(row);
        scrollToBottom();
    }

    private void addBotMessage(String text) {
        HBox row = new HBox(10);
        row.setAlignment(Pos.CENTER_LEFT);
        row.setPadding(new Insets(4, 60, 4, 8));

        Label avatar = new Label("🤖");
        avatar.setStyle("-fx-font-size:22px;");

        VBox bubble = new VBox(4);
        bubble.setStyle("-fx-background-color:rgba(255,255,255,0.08);" +
                        "-fx-background-radius:4 18 18 18;-fx-padding:12 16;" +
                        "-fx-border-color:rgba(108,99,255,0.3);-fx-border-width:1;-fx-border-radius:4 18 18 18;");
        Label label = new Label(text);
        label.setStyle("-fx-text-fill:#E8E8F0;-fx-font-size:14px;");
        label.setWrapText(true);
        label.setMaxWidth(400);
        bubble.getChildren().add(label);
        row.getChildren().addAll(avatar, bubble);
        chatBox.getChildren().add(row);
        scrollToBottom();
    }

    private void scrollToBottom() {
        Platform.runLater(() -> chatScroll.setVvalue(1.0));
    }
}
