package com.gestion_test.controllers;

import com.gestion_test.services.ChatGPTService;
import com.gestion_test.services.EmailService;
import com.gestion_test.services.PDFExportService;
import com.gestion_test.services.ReminderService;
import com.gestion_test.services.SpecificScoreService;
import com.gestion_test.services.SpecificScoreService.WeeklyScore;
import com.gestion_test.services.ScoreService;
import com.gestion_test.services.AuthContext;
import com.gestion_test.utils.MyDataBase;
import com.gestion_test.App;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.Alert;
import javafx.scene.control.Button;
import javafx.scene.control.ComboBox;
import javafx.scene.control.Label;
import javafx.scene.control.ScrollPane;
import javafx.scene.control.Separator;
import javafx.scene.control.TextArea;
import javafx.scene.chart.LineChart;
import javafx.scene.chart.CategoryAxis;
import javafx.scene.chart.NumberAxis;
import javafx.scene.chart.XYChart;
import javafx.scene.layout.VBox;
import javafx.scene.layout.HBox;
import javafx.scene.layout.Region;
import javafx.geometry.Pos;
import javafx.collections.FXCollections;
import javafx.concurrent.Task;
import javafx.scene.input.KeyCode;
import javafx.scene.input.KeyEvent;

import java.net.URL;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;
import java.util.ResourceBundle;

public class StudentStatsController implements Initializable {

    // ===== STATS =====
    @FXML private Label categoryLabel;
    @FXML private Label levelLabel;
    @FXML private Label generalScoreLabel;
    @FXML private Label specificScoreLabel;
    @FXML private LineChart<String, Number> evolutionChart;
    @FXML private CategoryAxis evolutionXAxis;
    @FXML private NumberAxis evolutionYAxis;
    @FXML private VBox historyContainer;
    @FXML private Label adviceLabel;
    @FXML private ComboBox<String> studentSelector;
    @FXML private HBox studentSelectorBox;
    @FXML private Label sidebarRoleLabel;

    // ===== RAPPELS =====
    @FXML private VBox reminderBox;
    @FXML private Label reminderLabel;

    // ===== CHAT IA =====
    @FXML private VBox aiChatPanel;
    @FXML private VBox aiChatContainer;
    @FXML private TextArea aiMessageInput;
    @FXML private Button aiSendBtn;
    @FXML private Button aiToggleBtn;
    @FXML private Button analyzeBtn;
    @FXML private ScrollPane aiChatScrollPane;
    @FXML private Label aiStatusLabel;

    private int selectedUserId;
    private List<int[]> studentList = new ArrayList<int[]>();
    private String userCategory = "N/A";
    private String userLevel = "N/A";
    private int userPercentage = 0;
    private boolean aiChatInitialized = false;

    @Override
    public void initialize(URL url, ResourceBundle rb) {
        System.out.println("StudentStatsController initialise");

        if (sidebarRoleLabel != null) {
            if (AuthContext.isStudent() || AuthContext.isUser()) {
                sidebarRoleLabel.setText("ETUDIANT");
            } else {
                sidebarRoleLabel.setText("PSYCHOLOGUE");
            }
        }

        if (AuthContext.isPsychologist() || AuthContext.isAdmin()) {
            setupStudentSelector();
            if (aiToggleBtn != null) {
                aiToggleBtn.setVisible(false);
                aiToggleBtn.setManaged(false);
            }
        } else {
            if (studentSelectorBox != null) {
                studentSelectorBox.setVisible(false);
                studentSelectorBox.setManaged(false);
            }
            selectedUserId = AuthContext.getCurrentUserId();
            loadAllData();
            checkReminder();
        }
    }

    // ===== RAPPELS =====

    private void checkReminder() {
        if (reminderBox == null) return;
        try {
            boolean hasTestThisWeek = false;
            List<WeeklyScore> scores = SpecificScoreService.getAllScoresForUser(selectedUserId);
            for (WeeklyScore score : scores) {
                if (score.getPassedAt() != null && score.getPassedAt().length() >= 10) {
                    String dateStr = score.getPassedAt().substring(0, 10);
                    java.time.LocalDate testDate = java.time.LocalDate.parse(dateStr);
                    java.time.LocalDate now = java.time.LocalDate.now();
                    java.time.temporal.WeekFields weekFields = java.time.temporal.WeekFields.ISO;
                    if (testDate.get(weekFields.weekOfWeekBasedYear()) == now.get(weekFields.weekOfWeekBasedYear()) &&
                            testDate.getYear() == now.getYear()) {
                        hasTestThisWeek = true;
                        break;
                    }
                }
            }

            if (!hasTestThisWeek) {
                reminderBox.setVisible(true);
                reminderBox.setManaged(true);
                if (reminderLabel != null) {
                    reminderLabel.setText("Vous n'avez pas encore passe de test specifique cette semaine. " +
                            "Passez votre test pour suivre votre progression !");
                }
            } else {
                reminderBox.setVisible(false);
                reminderBox.setManaged(false);
            }
        } catch (SQLException e) {
            reminderBox.setVisible(false);
            reminderBox.setManaged(false);
        }
    }

    @FXML
    private void handleDismissReminder() {
        if (reminderBox != null) {
            reminderBox.setVisible(false);
            reminderBox.setManaged(false);
        }
    }

    // ===== EXPORT PDF =====

    @FXML
    private void handleExportPDF() {
        String name = AuthContext.getCurrentUserName();
        if (name == null || name.isEmpty()) name = "Etudiant";
        String email = AuthContext.getCurrentEmail();
        if (email == null) email = "N/A";

        final String finalName = name;
        final String finalEmail = email;

        Task<String> task = new Task<String>() {
            @Override
            protected String call() {
                return PDFExportService.exportStudentReport(selectedUserId, finalName, finalEmail);
            }
        };

        task.setOnSucceeded(e -> {
            String path = task.getValue();
            if (path != null) {
                Alert alert = new Alert(Alert.AlertType.INFORMATION);
                alert.setTitle("PDF Exporte");
                alert.setHeaderText("Rapport genere avec succes !");
                alert.setContentText("Fichier sauvegarde dans :\n" + path);
                alert.showAndWait();

                // Ouvrir le fichier
                try {
                    java.awt.Desktop.getDesktop().open(new java.io.File(path));
                } catch (Exception ex) {
                    System.err.println("Impossible d'ouvrir le PDF: " + ex.getMessage());
                }
            } else {
                Alert alert = new Alert(Alert.AlertType.ERROR);
                alert.setTitle("Erreur");
                alert.setContentText("Erreur lors de la generation du PDF.");
                alert.showAndWait();
            }
        });

        task.setOnFailed(e -> {
            Alert alert = new Alert(Alert.AlertType.ERROR);
            alert.setTitle("Erreur");
            alert.setContentText("Erreur: " + task.getException().getMessage());
            alert.showAndWait();
        });

        new Thread(task).start();
    }

    // ===== ENVOYER PAR EMAIL =====

    @FXML
    private void handleSendEmail() {
        String email = AuthContext.getCurrentEmail();
        String name = AuthContext.getCurrentUserName();

        if (email == null || email.isEmpty()) {
            Alert alert = new Alert(Alert.AlertType.WARNING);
            alert.setTitle("Email manquant");
            alert.setContentText("Aucune adresse email associee a votre compte.");
            alert.showAndWait();
            return;
        }

        final String finalEmail = email;
        final String finalName = name != null ? name : "Etudiant";

        Task<Boolean> task = new Task<Boolean>() {
            @Override
            protected Boolean call() {
                try {
                    String category = SpecificScoreService.getLatestCategory(selectedUserId);
                    String level = SpecificScoreService.getLatestLevel(selectedUserId);
                    int percentage = SpecificScoreService.getLatestPercentage(selectedUserId);
                    int totalScore = SpecificScoreService.getLatestTotalScore(selectedUserId);
                    int maxScore = SpecificScoreService.getLatestMaxScore(selectedUserId);

                    return EmailService.sendTestResultEmail(finalEmail, finalName,
                            "Resume des Tests", category, level, percentage, totalScore, maxScore);
                } catch (SQLException ex) {
                    System.err.println("Erreur: " + ex.getMessage());
                    return false;
                }
            }
        };

        task.setOnSucceeded(e -> {
            if (task.getValue()) {
                Alert alert = new Alert(Alert.AlertType.INFORMATION);
                alert.setTitle("Email envoye");
                alert.setHeaderText("Email envoye avec succes !");
                alert.setContentText("Un resume de vos resultats a ete envoye a :\n" + finalEmail);
                alert.showAndWait();
            } else {
                Alert alert = new Alert(Alert.AlertType.ERROR);
                alert.setTitle("Erreur");
                alert.setContentText("Impossible d'envoyer l'email. Verifiez la configuration.");
                alert.showAndWait();
            }
        });

        task.setOnFailed(e -> {
            Alert alert = new Alert(Alert.AlertType.ERROR);
            alert.setTitle("Erreur");
            alert.setContentText("Erreur: " + task.getException().getMessage());
            alert.showAndWait();
        });

        new Thread(task).start();
    }

    // ===== SELECTEUR ETUDIANT (PSYCHOLOGUE) =====

    private void setupStudentSelector() {
        if (studentSelector == null || studentSelectorBox == null) {
            selectedUserId = getFirstStudentId();
            loadAllData();
            return;
        }

        studentSelectorBox.setVisible(true);
        studentSelectorBox.setManaged(true);

        try {
            Connection conn = MyDataBase.getInstance().getConnection();
            String sql = "SELECT u.id, u.email FROM user u WHERE u.role = 'user' ORDER BY u.id";
            PreparedStatement ps = conn.prepareStatement(sql);
            ResultSet rs = ps.executeQuery();

            List<String> items = new ArrayList<String>();
            studentList.clear();

            while (rs.next()) {
                int userId = rs.getInt("id");
                String email = rs.getString("email");
                items.add("ID:" + userId + " - " + email);
                studentList.add(new int[]{userId});
            }
            rs.close();
            ps.close();

            if (items.isEmpty()) {
                items.add("Aucun etudiant");
                studentSelector.setItems(FXCollections.observableArrayList(items));
                return;
            }

            studentSelector.setItems(FXCollections.observableArrayList(items));
            studentSelector.setOnAction(e -> {
                int idx = studentSelector.getSelectionModel().getSelectedIndex();
                if (idx >= 0 && idx < studentList.size()) {
                    selectedUserId = studentList.get(idx)[0];
                    loadAllData();
                }
            });

            studentSelector.getSelectionModel().selectFirst();
            if (!studentList.isEmpty()) {
                selectedUserId = studentList.get(0)[0];
                loadAllData();
            }

        } catch (SQLException e) {
            System.err.println("Erreur: " + e.getMessage());
        }
    }

    private int getFirstStudentId() {
        try {
            Connection conn = MyDataBase.getInstance().getConnection();
            String sql = "SELECT id FROM user WHERE role = 'user' LIMIT 1";
            PreparedStatement ps = conn.prepareStatement(sql);
            ResultSet rs = ps.executeQuery();
            if (rs.next()) {
                int id = rs.getInt("id");
                rs.close();
                ps.close();
                return id;
            }
            rs.close();
            ps.close();
        } catch (SQLException e) {
            System.err.println("Erreur: " + e.getMessage());
        }
        return AuthContext.getCurrentUserId();
    }

    // ===== CHARGEMENT DONNEES =====

    private void loadAllData() {
        loadStats();
        loadEvolutionChart();
        loadHistory();
        loadAdvice();
    }

    private void loadStats() {
        try {
            int generalPct = ScoreService.getLatestPercentageForUser(selectedUserId);
            if (generalPct >= 0) {
                generalScoreLabel.setText(generalPct + "%");
                userCategory = ScoreService.getCategoryFromPercentage(generalPct);
                categoryLabel.setText(userCategory);
                userPercentage = generalPct;
            } else {
                generalScoreLabel.setText("N/A");
                categoryLabel.setText("Aucun test");
            }

            int specificPct = SpecificScoreService.getLatestPercentage(selectedUserId);
            if (specificPct >= 0) {
                specificScoreLabel.setText(specificPct + "%");
                userLevel = SpecificScoreService.getLatestLevel(selectedUserId);
                String color = SpecificScoreService.getLevelColor(userLevel);
                levelLabel.setText(userLevel);
                levelLabel.setStyle("-fx-font-size: 20px; -fx-font-weight: bold; -fx-text-fill: " + color + ";");
            } else {
                specificScoreLabel.setText("N/A");
                levelLabel.setText("N/A");
            }
        } catch (SQLException e) {
            System.err.println("Erreur stats: " + e.getMessage());
        }
    }

    private void loadEvolutionChart() {
        try {
            List<WeeklyScore> scores = SpecificScoreService.getAllScoresForUser(selectedUserId);
            XYChart.Series<String, Number> series = new XYChart.Series<String, Number>();
            series.setName("Evolution");

            if (scores.isEmpty()) {
                series.getData().add(new XYChart.Data<String, Number>("Aucun", 0));
            } else {
                for (int i = scores.size() - 1; i >= 0; i--) {
                    WeeklyScore score = scores.get(i);
                    series.getData().add(new XYChart.Data<String, Number>(
                            "S" + score.getWeekNumber(), score.getPercentage()));
                }
            }

            evolutionChart.getData().clear();
            evolutionChart.getData().add(series);
            evolutionChart.setTitle(null);
            evolutionChart.setLegendVisible(false);
        } catch (SQLException e) {
            System.err.println("Erreur chart: " + e.getMessage());
        }
    }

    private void loadHistory() {
        if (historyContainer == null) return;
        historyContainer.getChildren().clear();

        try {
            List<WeeklyScore> scores = SpecificScoreService.getAllScoresForUser(selectedUserId);

            if (scores.isEmpty()) {
                Label empty = new Label("Aucun historique.");
                empty.setStyle("-fx-text-fill: #9B9BB0; -fx-font-size: 13px;");
                historyContainer.getChildren().add(empty);
                return;
            }

            HBox header = new HBox(0);
            header.setAlignment(Pos.CENTER_LEFT);
            header.setStyle("-fx-background-color: rgba(108,99,255,0.15); -fx-padding: 12 0; -fx-background-radius: 8 8 0 0;");
            String hs = "-fx-font-size: 12px; -fx-font-weight: bold; -fx-text-fill: #6C63FF; -fx-padding: 0 8;";

            Label h1 = new Label("Semaine"); h1.setStyle(hs + "-fx-min-width: 80;");
            Label h2 = new Label("Test"); h2.setStyle(hs + "-fx-min-width: 140;");
            Label h3 = new Label("Score"); h3.setStyle(hs + "-fx-min-width: 80;");
            Label h4 = new Label("%"); h4.setStyle(hs + "-fx-min-width: 60;");
            Label h5 = new Label("Categorie"); h5.setStyle(hs + "-fx-min-width: 130;");
            Label h6 = new Label("Niveau"); h6.setStyle(hs + "-fx-min-width: 100;");
            Label h7 = new Label("Date"); h7.setStyle(hs + "-fx-min-width: 100;");
            header.getChildren().addAll(h1, h2, h3, h4, h5, h6, h7);
            historyContainer.getChildren().add(header);

            for (WeeklyScore score : scores) {
                HBox row = new HBox(0);
                row.setAlignment(Pos.CENTER_LEFT);
                row.setStyle("-fx-background-color: rgba(255,255,255,0.03); " +
                        "-fx-border-color: transparent transparent rgba(255,255,255,0.05) transparent; " +
                        "-fx-border-width: 0 0 1 0; -fx-padding: 10 0;");
                String cs = "-fx-font-size: 12px; -fx-text-fill: #E8E8F0; -fx-padding: 0 8;";

                Label c1 = new Label("S" + score.getWeekNumber()); c1.setStyle(cs + "-fx-min-width: 80;");
                Label c2 = new Label(score.getTestTitle()); c2.setStyle(cs + "-fx-min-width: 140;");
                Label c3 = new Label(score.getTotalScore() + "/" + score.getMaxScore()); c3.setStyle(cs + "-fx-min-width: 80;");
                Label c4 = new Label(score.getPercentage() + "%"); c4.setStyle(cs + "-fx-min-width: 60; -fx-font-weight: bold;");
                Label c5 = new Label(score.getCategory()); c5.setStyle(cs + "-fx-min-width: 130;");

                String lvlColor = SpecificScoreService.getLevelColor(score.getLevel());
                Label c6 = new Label(score.getLevel());
                c6.setStyle("-fx-padding: 4 10; -fx-background-color: " + lvlColor + "33; " +
                        "-fx-text-fill: " + lvlColor + "; -fx-background-radius: 12; " +
                        "-fx-font-size: 11px; -fx-font-weight: bold; -fx-min-width: 100; -fx-alignment: CENTER;");

                String date = "N/A";
                if (score.getPassedAt() != null && score.getPassedAt().length() >= 10) {
                    date = score.getPassedAt().substring(0, 10);
                }
                Label c7 = new Label(date); c7.setStyle(cs + "-fx-min-width: 100;");

                row.getChildren().addAll(c1, c2, c3, c4, c5, c6, c7);
                historyContainer.getChildren().add(row);
            }
        } catch (SQLException e) {
            System.err.println("Erreur historique: " + e.getMessage());
        }
    }

    private void loadAdvice() {
        if (adviceLabel == null) return;
        try {
            String category = SpecificScoreService.getLatestCategory(selectedUserId);
            String level = SpecificScoreService.getLatestLevel(selectedUserId);
            int pct = SpecificScoreService.getLatestPercentage(selectedUserId);

            if ("N/A".equals(category) || "N/A".equals(level) || pct < 0) {
                adviceLabel.setText("Passez un test specifique pour recevoir des conseils personnalises.");
                return;
            }

            String advice = category + " - Niveau " + level + " (" + pct + "%)\n\n";

            if ("Trouble du Sommeil".equals(category)) {
                if ("Faible".equals(level)) {
                    advice += "Votre sommeil semble correct. Continuez a maintenir une bonne hygiene de sommeil:\n" +
                            "- Couchez-vous et levez-vous a heures fixes\n" +
                            "- Evitez les ecrans 1h avant le coucher\n" +
                            "- Gardez votre chambre fraiche et sombre";
                } else if ("Modere".equals(level)) {
                    advice += "Votre sommeil est perturbe. Voici des conseils:\n" +
                            "- Etablissez une routine relaxante avant le coucher\n" +
                            "- Evitez la cafeine apres 14h\n" +
                            "- Pratiquez la respiration profonde (4-7-8)\n" +
                            "- Limitez les siestes a 20 minutes maximum\n" +
                            "- Essayez la meditation guidee pour le sommeil";
                } else {
                    advice += "Vos troubles du sommeil sont significatifs. Recommandations:\n" +
                            "- Consultez un medecin ou un specialiste du sommeil\n" +
                            "- Tenez un journal du sommeil pendant 2 semaines\n" +
                            "- Evitez l'alcool et les repas lourds le soir\n" +
                            "- Technique de relaxation musculaire progressive\n" +
                            "- Une consultation est fortement recommandee";
                }
            } else if ("Anxiete".equals(category)) {
                if ("Faible".equals(level)) {
                    advice += "Votre niveau d'anxiete est bas, c'est positif!\n" +
                            "- Continuez vos activites regulieres\n" +
                            "- Maintenez une vie sociale active\n" +
                            "- Pratiquez une activite physique reguliere";
                } else if ("Modere".equals(level)) {
                    advice += "Votre anxiete est moderee. Essayez:\n" +
                            "- La technique de respiration 4-7-8\n" +
                            "- La meditation de pleine conscience (10 min/jour)\n" +
                            "- L'exercice physique regulier (30 min/jour)\n" +
                            "- Identifier et noter vos sources de stress\n" +
                            "- Parler a un ami ou un proche de confiance";
                } else {
                    advice += "Votre niveau d'anxiete est eleve. Il est important de:\n" +
                            "- Consulter un psychologue ou un medecin\n" +
                            "- Pratiquer la coherence cardiaque quotidiennement\n" +
                            "- Eviter les stimulants (cafe, boissons energisantes)\n" +
                            "- Faire de l'exercice physique chaque jour\n" +
                            "- Ne pas rester isole, parlez a quelqu'un";
                }
            } else if ("Depression".equals(category)) {
                if ("Faible".equals(level)) {
                    advice += "Votre humeur semble stable. Continuez:\n" +
                            "- Maintenez vos activites sociales\n" +
                            "- Exposez-vous a la lumiere naturelle chaque jour\n" +
                            "- Pratiquez des activites qui vous font plaisir";
                } else if ("Modere".equals(level)) {
                    advice += "Des signes de baisse d'humeur sont detectes:\n" +
                            "- Maintenez une routine quotidienne structuree\n" +
                            "- Sortez marcher 30 minutes par jour\n" +
                            "- Notez 3 choses positives chaque soir\n" +
                            "- Gardez contact avec vos proches\n" +
                            "- Consultez si ca dure plus de 2 semaines";
                } else {
                    advice += "Les indicateurs sont preoccupants. Agissez:\n" +
                            "- Consultez un professionnel de sante mentale rapidement\n" +
                            "- Ne restez pas seul(e)\n" +
                            "- Appelez un proche de confiance\n" +
                            "- Ligne d'ecoute: 3114\n" +
                            "- Chaque pas compte, meme petit";
                }
            } else if ("Stress".equals(category)) {
                if ("Faible".equals(level)) {
                    advice += "Votre stress est bien gere. Continuez:\n" +
                            "- Planifiez vos taches a l'avance\n" +
                            "- Prenez des pauses regulieres\n" +
                            "- Maintenez vos loisirs";
                } else if ("Modere".equals(level)) {
                    advice += "Votre stress est modere. Essayez:\n" +
                            "- La technique Pomodoro (25 min travail, 5 min pause)\n" +
                            "- Priorisez vos taches (urgent vs important)\n" +
                            "- Faites de l'exercice physique 3 fois par semaine\n" +
                            "- Pratiquez la relaxation avant de dormir\n" +
                            "- Apprenez a dire non quand necessaire";
                } else {
                    advice += "Votre stress est eleve. Recommandations:\n" +
                            "- Consultez un professionnel\n" +
                            "- Identifiez les sources de stress evitables\n" +
                            "- Pratiquez le yoga ou le tai-chi\n" +
                            "- Ecrivez vos pensees (decharge emotionnelle)\n" +
                            "- Reduisez votre charge si possible";
                }
            } else {
                advice += "Continuez a passer des tests regulierement pour suivre votre evolution.";
            }

            advice += "\n\nCliquez le bouton 'IA' en bas a droite pour des conseils plus personnalises.";
            adviceLabel.setText(advice);

        } catch (SQLException e) {
            adviceLabel.setText("Erreur lors du chargement des conseils.");
        }
    }

    // ===== CHAT IA =====

    @FXML
    private void handleToggleAIChat() {
        if (aiChatPanel == null) return;

        boolean isVisible = aiChatPanel.isVisible();
        aiChatPanel.setVisible(!isVisible);
        aiChatPanel.setManaged(!isVisible);

        if (!isVisible && !aiChatInitialized) {
            aiChatInitialized = true;
            addBotMessage("Bonjour! Je suis votre assistant MindBoost IA.\n\n" +
                    "Cliquez 'Analyser' pour une analyse de vos resultats, " +
                    "ou posez-moi vos questions directement.");
        }
    }

    @FXML
    private void handleAISendMessage() {
        if (aiMessageInput == null) return;
        String message = aiMessageInput.getText().trim();
        if (message.isEmpty()) return;

        addUserMessage(message);
        aiMessageInput.clear();
        setAILoading(true);

        Task<String> task = new Task<String>() {
            @Override
            protected String call() {
                return ChatGPTService.chatWithContext(message, userCategory, userLevel, userPercentage);
            }
        };

        task.setOnSucceeded(e -> {
            addBotMessage(task.getValue());
            setAILoading(false);
        });

        task.setOnFailed(e -> {
            addBotMessage("Erreur: Impossible de contacter l'IA.");
            setAILoading(false);
        });

        new Thread(task).start();
    }

    @FXML
    private void handleAnalyzeResults() {
        addUserMessage("Analyse mes resultats de test");
        setAILoading(true);

        Task<String> task = new Task<String>() {
            @Override
            protected String call() {
                try {
                    String answersDetails = SpecificScoreService.getLatestAnswersDetails(selectedUserId);
                    int totalScore = SpecificScoreService.getLatestTotalScore(selectedUserId);
                    int maxScore = SpecificScoreService.getLatestMaxScore(selectedUserId);

                    return ChatGPTService.analyzeTestResults(
                            userCategory, userLevel, userPercentage,
                            totalScore, maxScore, "Test Specifique", answersDetails);
                } catch (SQLException ex) {
                    return ChatGPTService.analyzeTestResults(
                            userCategory, userLevel, userPercentage,
                            0, 0, "Test", "Details non disponibles");
                }
            }
        };

        task.setOnSucceeded(e -> {
            addBotMessage(task.getValue());
            setAILoading(false);
        });

        task.setOnFailed(e -> {
            addBotMessage("Erreur lors de l'analyse.");
            setAILoading(false);
        });

        new Thread(task).start();
    }

    @FXML
    private void handleAIKeyPress(KeyEvent event) {
        if (event.getCode() == KeyCode.ENTER && !event.isShiftDown()) {
            event.consume();
            handleAISendMessage();
        }
    }

    private void setAILoading(boolean loading) {
        if (aiSendBtn != null) aiSendBtn.setDisable(loading);
        if (analyzeBtn != null) analyzeBtn.setDisable(loading);
        if (aiStatusLabel != null) aiStatusLabel.setText(loading ? "L'IA reflechit..." : "");
    }

    private void addUserMessage(String text) {
        if (aiChatContainer == null) return;

        HBox box = new HBox();
        box.setAlignment(Pos.CENTER_RIGHT);
        box.setStyle("-fx-padding: 4 6;");

        Label msg = new Label(text);
        msg.setWrapText(true);
        msg.setMaxWidth(300);
        msg.setStyle("-fx-background-color: #6C63FF; -fx-text-fill: #FFFFFF; " +
                "-fx-padding: 10 14; -fx-background-radius: 14 14 4 14; -fx-font-size: 12px; " +
                "-fx-font-weight: bold;");

        box.getChildren().add(msg);
        aiChatContainer.getChildren().add(box);
        scrollAIChatToBottom();
    }

    private void addBotMessage(String text) {
        if (aiChatContainer == null) return;

        HBox box = new HBox();
        box.setAlignment(Pos.CENTER_LEFT);
        box.setStyle("-fx-padding: 4 6;");

        VBox msgBox = new VBox(3);

        Label name = new Label("MindBoost IA");
        name.setStyle("-fx-text-fill: #4ECDC4; -fx-font-size: 9px; -fx-font-weight: bold;");

        TextArea msg = new TextArea(text);
        msg.setWrapText(true);
        msg.setEditable(false);
        msg.setPrefWidth(320);

        int lignes = text.split("\n").length;
        int chars = text.length();
        int hauteur = Math.max(80, Math.min(400, (lignes * 18) + (chars / 40 * 18)));
        msg.setPrefHeight(hauteur);
        msg.setMaxHeight(400);

        msg.setStyle("-fx-control-inner-background: rgba(40,40,60,0.95); " +
                "-fx-text-fill: #E8E8F0; " +
                "-fx-font-size: 12px; " +
                "-fx-background-radius: 14; " +
                "-fx-border-radius: 14; " +
                "-fx-border-color: rgba(108,99,255,0.3); " +
                "-fx-border-width: 1; " +
                "-fx-padding: 8; " +
                "-fx-focus-color: transparent; " +
                "-fx-faint-focus-color: transparent;");

        msgBox.getChildren().addAll(name, msg);
        box.getChildren().add(msgBox);
        aiChatContainer.getChildren().add(box);
        scrollAIChatToBottom();
    }

    private void scrollAIChatToBottom() {
        if (aiChatScrollPane != null) {
            aiChatScrollPane.layout();
            aiChatScrollPane.setVvalue(1.0);
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
    private void handleRefresh() {
        loadAllData();
        if (AuthContext.isStudent() || AuthContext.isUser()) {
            checkReminder();
        }
    }

    @FXML
    private void handleLogout() {
        AuthContext.logout();
        App.loadScene("/views/SelectRole.fxml", "MindBoost");
    }

    @FXML
    private void handleBack() {
        if (AuthContext.isPsychologist() || AuthContext.isAdmin()) {
            App.loadScene("/views/Statistics.fxml", "Statistiques");
        } else {
            App.loadScene("/views/SpecificTest/SpecificTestList.fxml", "Tests Specifiques");
        }
    }
}