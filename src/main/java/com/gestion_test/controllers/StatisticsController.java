package com.gestion_test.controllers;

import com.gestion_test.services.StatisticsService;
import com.gestion_test.services.StatisticsService.StudentResult;
import com.gestion_test.services.PDFExportService;
import com.gestion_test.services.EmailService;
import com.gestion_test.services.ReminderService;
import com.gestion_test.services.SpecificScoreService;
import com.gestion_test.services.AuthContext;
import com.gestion_test.utils.MyDataBase;
import com.gestion_test.App;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.Alert;
import javafx.scene.control.Button;
import javafx.scene.control.Label;
import javafx.scene.control.Separator;
import javafx.scene.layout.VBox;
import javafx.scene.layout.HBox;
import javafx.scene.layout.Region;
import javafx.geometry.Pos;
import javafx.scene.chart.PieChart;
import javafx.scene.chart.BarChart;
import javafx.scene.chart.CategoryAxis;
import javafx.scene.chart.NumberAxis;
import javafx.scene.chart.XYChart;
import javafx.beans.value.ChangeListener;
import javafx.beans.value.ObservableValue;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.concurrent.Task;
import javafx.scene.Node;

import java.net.URL;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.List;
import java.util.Map;
import java.util.ResourceBundle;

public class StatisticsController implements Initializable {

    @FXML private Label totalGeneralTestsLabel;
    @FXML private Label totalSpecificTestsLabel;
    @FXML private Label totalStudentsLabel;
    @FXML private Label averageScoreLabel;
    @FXML private PieChart categoryPieChart;
    @FXML private BarChart<String, Number> scoreBarChart;
    @FXML private CategoryAxis scoreBarXAxis;
    @FXML private NumberAxis scoreBarYAxis;
    @FXML private VBox resultsTableContainer;
    @FXML private VBox specificResultsContainer;

    @Override
    public void initialize(URL url, ResourceBundle rb) {
        System.out.println("StatisticsController initialise");
        loadStatistics();
        loadCategoryPieChart();
        loadScoreBarChart();
        loadResultsTable();
        loadSpecificResults();
    }

    // ===== EXPORT PDF POUR TOUS LES ETUDIANTS =====

    @FXML
    private void handleExportPDF() {
        try {
            Connection conn = MyDataBase.getInstance().getConnection();
            String sql = "SELECT DISTINCT ss.user_id, u.email FROM specific_score ss " +
                    "JOIN user u ON ss.user_id = u.id ORDER BY ss.user_id";
            PreparedStatement ps = conn.prepareStatement(sql);
            ResultSet rs = ps.executeQuery();

            boolean hasStudents = false;
            int exportCount = 0;
            StringBuilder exportedFiles = new StringBuilder();

            while (rs.next()) {
                hasStudents = true;
                int userId = rs.getInt("user_id");
                String email = rs.getString("email");

                String path = PDFExportService.exportStudentReport(userId, email, email);
                if (path != null) {
                    exportCount++;
                    exportedFiles.append("- ").append(email).append("\n");
                }
            }
            rs.close();
            ps.close();

            if (!hasStudents) {
                Alert alert = new Alert(Alert.AlertType.INFORMATION);
                alert.setTitle("Information");
                alert.setContentText("Aucun etudiant n'a passe de test.");
                alert.showAndWait();
                return;
            }

            Alert alert = new Alert(Alert.AlertType.INFORMATION);
            alert.setTitle("Export PDF");
            alert.setHeaderText(exportCount + " rapport(s) PDF genere(s) !");
            alert.setContentText("Fichiers dans le dossier Telechargements:\n\n" + exportedFiles.toString());
            alert.showAndWait();

        } catch (SQLException e) {
            Alert alert = new Alert(Alert.AlertType.ERROR);
            alert.setTitle("Erreur");
            alert.setContentText("Erreur: " + e.getMessage());
            alert.showAndWait();
        }
    }

    // ===== ENVOYER RAPPELS AUX ETUDIANTS SANS TEST =====

    @FXML
    private void handleSendReminders() {
        Task<String> task = new Task<String>() {
            @Override
            protected String call() {
                try {
                    Connection conn = MyDataBase.getInstance().getConnection();
                    String sql = "SELECT u.id, u.email FROM user u " +
                            "WHERE u.role = 'user' " +
                            "AND u.id NOT IN (" +
                            "  SELECT DISTINCT ss.user_id FROM specific_score ss " +
                            "  WHERE YEARWEEK(ss.passed_at, 1) = YEARWEEK(NOW(), 1)" +
                            ")";

                    PreparedStatement ps = conn.prepareStatement(sql);
                    ResultSet rs = ps.executeQuery();

                    int sentCount = 0;
                    int totalStudents = 0;
                    StringBuilder details = new StringBuilder();

                    while (rs.next()) {
                        totalStudents++;
                        String email = rs.getString("email");

                        boolean sent = EmailService.sendWeeklyReminder(email, email);
                        if (sent) {
                            sentCount++;
                            details.append("Envoye a: ").append(email).append("\n");
                        } else {
                            details.append("Echec: ").append(email).append("\n");
                        }
                        try { Thread.sleep(1500); } catch (InterruptedException e) { }
                    }
                    rs.close();
                    ps.close();

                    if (totalStudents == 0) {
                        return "AUCUN|Tous les etudiants ont deja passe leur test cette semaine!";
                    }
                    return sentCount + "/" + totalStudents + "|" + details.toString();

                } catch (SQLException e) {
                    return "ERREUR|" + e.getMessage();
                }
            }
        };

        task.setOnSucceeded(e -> {
            String result = task.getValue();
            String[] parts = result.split("\\|", 2);

            if ("AUCUN".equals(parts[0])) {
                Alert alert = new Alert(Alert.AlertType.INFORMATION);
                alert.setTitle("Rappels");
                alert.setHeaderText("Aucun rappel necessaire");
                alert.setContentText(parts.length > 1 ? parts[1] : "");
                alert.showAndWait();
            } else if ("ERREUR".equals(parts[0])) {
                Alert alert = new Alert(Alert.AlertType.ERROR);
                alert.setTitle("Erreur");
                alert.setContentText("Erreur: " + (parts.length > 1 ? parts[1] : ""));
                alert.showAndWait();
            } else {
                Alert alert = new Alert(Alert.AlertType.INFORMATION);
                alert.setTitle("Rappels envoyes");
                alert.setHeaderText(parts[0] + " rappel(s) envoye(s)");
                alert.setContentText(parts.length > 1 ? parts[1] : "");
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

    // ===== STATS GENERALES =====

    private void loadStatistics() {
        try {
            int generalCount = StatisticsService.getTotalGeneralTests();
            int specificCount = StatisticsService.getTotalSpecificTests();
            int studentsCount = StatisticsService.getTotalStudentsTested();
            double avgScore = StatisticsService.getAverageGeneralScore();

            totalGeneralTestsLabel.setText(Integer.toString(generalCount));
            totalSpecificTestsLabel.setText(Integer.toString(specificCount));
            totalStudentsLabel.setText(Integer.toString(studentsCount));
            averageScoreLabel.setText(Integer.toString((int) avgScore) + "%");
        } catch (SQLException e) {
            System.err.println("Erreur stats: " + e.getMessage());
            totalGeneralTestsLabel.setText("0");
            totalSpecificTestsLabel.setText("0");
            totalStudentsLabel.setText("0");
            averageScoreLabel.setText("0%");
        }
    }

    // ===== PIE CHART =====

    private void loadCategoryPieChart() {
        try {
            Map<String, Integer> distribution = StatisticsService.getCategoryDistribution();
            ObservableList<PieChart.Data> pieData = FXCollections.observableArrayList();

            for (Map.Entry<String, Integer> entry : distribution.entrySet()) {
                if (entry.getValue() > 0) {
                    String label = entry.getKey() + " (" + entry.getValue() + ")";
                    pieData.add(new PieChart.Data(label, entry.getValue()));
                }
            }

            if (pieData.isEmpty()) {
                pieData.add(new PieChart.Data("Aucune donnee", 1));
            }

            categoryPieChart.setData(pieData);
            categoryPieChart.setTitle(null);
            applyPieColors();

        } catch (SQLException e) {
            System.err.println("Erreur PieChart: " + e.getMessage());
        }
    }

    private void applyPieColors() {
        int colorIndex = 0;
        for (PieChart.Data data : categoryPieChart.getData()) {
            String color = getCategoryColorByIndex(colorIndex);
            if (data.getNode() != null) {
                data.getNode().setStyle("-fx-pie-color: " + color + ";");
            }
            colorIndex++;
        }
    }

    private String getCategoryColorByIndex(int index) {
        if (index == 0) return "#ef4444";
        if (index == 1) return "#f59e0b";
        if (index == 2) return "#3b82f6";
        if (index == 3) return "#8b5cf6";
        return "#10b981";
    }

    // ===== BAR CHART =====

    private void loadScoreBarChart() {
        try {
            Map<String, Integer> distribution = StatisticsService.getScoreDistribution();

            XYChart.Series<String, Number> series = new XYChart.Series<String, Number>();
            series.setName("Etudiants");

            int v1 = distribution.get("0-24") != null ? distribution.get("0-24") : 0;
            int v2 = distribution.get("25-49") != null ? distribution.get("25-49") : 0;
            int v3 = distribution.get("50-74") != null ? distribution.get("50-74") : 0;
            int v4 = distribution.get("75-100") != null ? distribution.get("75-100") : 0;

            XYChart.Data<String, Number> d1 = new XYChart.Data<String, Number>("0-24% Stress", v1);
            XYChart.Data<String, Number> d2 = new XYChart.Data<String, Number>("25-49% Anxiete", v2);
            XYChart.Data<String, Number> d3 = new XYChart.Data<String, Number>("50-74% Depression", v3);
            XYChart.Data<String, Number> d4 = new XYChart.Data<String, Number>("75-100% Sommeil", v4);

            series.getData().add(d1);
            series.getData().add(d2);
            series.getData().add(d3);
            series.getData().add(d4);

            scoreBarChart.getData().clear();
            scoreBarChart.getData().add(series);
            scoreBarChart.setTitle(null);
            scoreBarChart.setLegendVisible(false);

            applyBarColor(d1, "#ef4444");
            applyBarColor(d2, "#f59e0b");
            applyBarColor(d3, "#3b82f6");
            applyBarColor(d4, "#8b5cf6");

        } catch (SQLException e) {
            System.err.println("Erreur BarChart: " + e.getMessage());
        }
    }

    private void applyBarColor(XYChart.Data<String, Number> data, final String color) {
        if (data.getNode() != null) {
            data.getNode().setStyle("-fx-bar-fill: " + color + ";");
        } else {
            data.nodeProperty().addListener(new ChangeListener<Node>() {
                @Override
                public void changed(ObservableValue<? extends Node> obs, Node oldVal, Node newVal) {
                    if (newVal != null) {
                        newVal.setStyle("-fx-bar-fill: " + color + ";");
                    }
                }
            });
        }
    }

    // ===== TABLEAU RESULTATS GENERAUX =====

    private void loadResultsTable() {
        if (resultsTableContainer == null) return;
        resultsTableContainer.getChildren().clear();

        try {
            List<StudentResult> results = StatisticsService.getStudentResults();

            if (results.isEmpty()) {
                Label emptyLabel = new Label("Aucun resultat disponible");
                emptyLabel.setStyle("-fx-text-fill: #9B9BB0; -fx-font-size: 14px;");
                resultsTableContainer.getChildren().add(emptyLabel);
                return;
            }

            HBox headerRow = createGeneralHeaderRow();
            resultsTableContainer.getChildren().add(headerRow);

            for (StudentResult result : results) {
                HBox row = createGeneralDataRow(result);
                resultsTableContainer.getChildren().add(row);
            }

        } catch (SQLException e) {
            System.err.println("Erreur tableau: " + e.getMessage());
            Label errorLabel = new Label("Erreur: " + e.getMessage());
            errorLabel.setStyle("-fx-text-fill: #E74C3C; -fx-font-size: 12px;");
            resultsTableContainer.getChildren().add(errorLabel);
        }
    }

    private HBox createGeneralHeaderRow() {
        HBox row = new HBox(0);
        row.setAlignment(Pos.CENTER_LEFT);
        row.setStyle("-fx-background-color: rgba(108,99,255,0.15); -fx-padding: 12 0; -fx-background-radius: 8 8 0 0;");
        String s = "-fx-font-size: 12px; -fx-font-weight: bold; -fx-text-fill: #6C63FF; -fx-padding: 0 8;";

        Label l1 = new Label("ID"); l1.setStyle(s + "-fx-min-width: 60;");
        Label l2 = new Label("User"); l2.setStyle(s + "-fx-min-width: 80;");
        Label l3 = new Label("Test"); l3.setStyle(s + "-fx-min-width: 150;");
        Label l4 = new Label("Score"); l4.setStyle(s + "-fx-min-width: 80;");
        Label l5 = new Label("Pourcentage"); l5.setStyle(s + "-fx-min-width: 100;");
        Label l6 = new Label("Categorie"); l6.setStyle(s + "-fx-min-width: 140;");

        row.getChildren().addAll(l1, l2, l3, l4, l5, l6);
        return row;
    }

    private HBox createGeneralDataRow(StudentResult result) {
        HBox row = new HBox(0);
        row.setAlignment(Pos.CENTER_LEFT);
        row.setStyle("-fx-background-color: rgba(255,255,255,0.03); " +
                "-fx-border-color: transparent transparent rgba(255,255,255,0.05) transparent; " +
                "-fx-border-width: 0 0 1 0; -fx-padding: 10 0;");
        String cs = "-fx-font-size: 12px; -fx-text-fill: #E8E8F0; -fx-padding: 0 8;";

        Label c1 = new Label(Integer.toString(result.getId())); c1.setStyle(cs + "-fx-min-width: 60;");
        Label c2 = new Label("User " + result.getUserId()); c2.setStyle(cs + "-fx-min-width: 80;");
        Label c3 = new Label(result.getTestTitle()); c3.setStyle(cs + "-fx-min-width: 150;");
        Label c4 = new Label(Integer.toString(result.getTotalScore())); c4.setStyle(cs + "-fx-min-width: 80;");
        Label c5 = new Label(result.getPercentage() + "%"); c5.setStyle(cs + "-fx-min-width: 100;");

        String catColor = getCategoryColor(result.getCategory());
        Label c6 = new Label(result.getCategory());
        c6.setStyle("-fx-padding: 4 10; -fx-background-color: " + catColor + "33; " +
                "-fx-text-fill: " + catColor + "; -fx-background-radius: 12; " +
                "-fx-font-size: 11px; -fx-font-weight: bold; -fx-min-width: 140; -fx-alignment: CENTER;");

        row.getChildren().addAll(c1, c2, c3, c4, c5, c6);
        return row;
    }

    // ===== TABLEAU RESULTATS SPECIFIQUES AVEC BOUTONS =====

    private void loadSpecificResults() {
        if (specificResultsContainer == null) return;
        specificResultsContainer.getChildren().clear();

        try {
            Connection conn = MyDataBase.getInstance().getConnection();

            String sql = "SELECT ss.id, ss.user_id, u.email, " +
                    "st.title AS test_title, st.category AS test_category, " +
                    "ss.total_score, ss.max_score, ss.percentage, " +
                    "ss.category, ss.level, ss.week_number, ss.passed_at " +
                    "FROM specific_score ss " +
                    "JOIN user u ON ss.user_id = u.id " +
                    "JOIN specific_tests st ON ss.specific_test_id = st.id " +
                    "ORDER BY ss.passed_at DESC";

            PreparedStatement ps = conn.prepareStatement(sql);
            ResultSet rs = ps.executeQuery();

            // Header
            HBox header = new HBox(0);
            header.setAlignment(Pos.CENTER_LEFT);
            header.setStyle("-fx-background-color: rgba(78,205,196,0.15); -fx-padding: 12 0; -fx-background-radius: 8 8 0 0;");
            String hs = "-fx-font-size: 11px; -fx-font-weight: bold; -fx-text-fill: #4ECDC4; -fx-padding: 0 6;";

            Label h1 = new Label("ID"); h1.setStyle(hs + "-fx-min-width: 35;");
            Label h2 = new Label("Etudiant"); h2.setStyle(hs + "-fx-min-width: 130;");
            Label h3 = new Label("Test"); h3.setStyle(hs + "-fx-min-width: 90;");
            Label h4 = new Label("Score"); h4.setStyle(hs + "-fx-min-width: 65;");
            Label h5 = new Label("%"); h5.setStyle(hs + "-fx-min-width: 45;");
            Label h6 = new Label("Categorie"); h6.setStyle(hs + "-fx-min-width: 110;");
            Label h7 = new Label("Niveau"); h7.setStyle(hs + "-fx-min-width: 80;");
            Label h8 = new Label("Sem."); h8.setStyle(hs + "-fx-min-width: 45;");
            Label h9 = new Label("Date"); h9.setStyle(hs + "-fx-min-width: 80;");
            Label h10 = new Label("Actions"); h10.setStyle(hs + "-fx-min-width: 140;");

            header.getChildren().addAll(h1, h2, h3, h4, h5, h6, h7, h8, h9, h10);
            specificResultsContainer.getChildren().add(header);

            boolean hasData = false;

            while (rs.next()) {
                hasData = true;

                int id = rs.getInt("id");
                int userId = rs.getInt("user_id");
                String email = rs.getString("email");
                String testTitle = rs.getString("test_title");
                int totalScore = rs.getInt("total_score");
                int maxScore = rs.getInt("max_score");
                int percentage = rs.getInt("percentage");
                String category = rs.getString("category");
                String level = rs.getString("level");
                int weekNumber = rs.getInt("week_number");
                String passedAt = rs.getString("passed_at");

                HBox row = new HBox(0);
                row.setAlignment(Pos.CENTER_LEFT);
                row.setStyle("-fx-background-color: rgba(255,255,255,0.03); " +
                        "-fx-border-color: transparent transparent rgba(255,255,255,0.05) transparent; " +
                        "-fx-border-width: 0 0 1 0; -fx-padding: 8 0;");
                String cs = "-fx-font-size: 11px; -fx-text-fill: #E8E8F0; -fx-padding: 0 6;";

                Label c1 = new Label(String.valueOf(id)); c1.setStyle(cs + "-fx-min-width: 35;");
                Label c2 = new Label(email != null ? email : "User " + userId); c2.setStyle(cs + "-fx-min-width: 130;");
                Label c3 = new Label(testTitle != null ? testTitle : "N/A"); c3.setStyle(cs + "-fx-min-width: 90;");
                Label c4 = new Label(totalScore + "/" + maxScore); c4.setStyle(cs + "-fx-min-width: 65;");

                String pctColor = "#2ECC71";
                if (percentage >= 66) pctColor = "#E74C3C";
                else if (percentage >= 33) pctColor = "#F39C12";
                Label c5 = new Label(percentage + "%");
                c5.setStyle(cs + "-fx-min-width: 45; -fx-font-weight: bold; -fx-text-fill: " + pctColor + ";");

                String catColor = getSpecificCategoryColor(category);
                Label c6 = new Label(category != null ? category : "N/A");
                c6.setStyle("-fx-padding: 3 6; -fx-background-color: " + catColor + "33; " +
                        "-fx-text-fill: " + catColor + "; -fx-background-radius: 12; " +
                        "-fx-font-size: 10px; -fx-font-weight: bold; -fx-min-width: 110; -fx-alignment: CENTER;");

                String lvlColor = getLevelColor(level);
                Label c7 = new Label(level != null ? level : "N/A");
                c7.setStyle("-fx-padding: 3 6; -fx-background-color: " + lvlColor + "33; " +
                        "-fx-text-fill: " + lvlColor + "; -fx-background-radius: 12; " +
                        "-fx-font-size: 10px; -fx-font-weight: bold; -fx-min-width: 80; -fx-alignment: CENTER;");

                Label c8 = new Label("S" + weekNumber); c8.setStyle(cs + "-fx-min-width: 45;");

                String dateStr = "N/A";
                if (passedAt != null && passedAt.length() >= 10) dateStr = passedAt.substring(0, 10);
                Label c9 = new Label(dateStr); c9.setStyle(cs + "-fx-min-width: 80;");

                // BOUTONS ACTIONS
                HBox actionsBox = new HBox(4);
                actionsBox.setAlignment(Pos.CENTER_LEFT);
                actionsBox.setStyle("-fx-min-width: 140;");

                final int fUserId = userId;
                final String fEmail = email;
                final String fCategory = category;
                final String fLevel = level;
                final int fPercentage = percentage;
                final int fTotalScore = totalScore;
                final int fMaxScore = maxScore;
                final String fTestTitle = testTitle;

                Button pdfBtn = new Button("PDF");
                pdfBtn.setStyle("-fx-padding: 3 8; -fx-background-color: #4ECDC4; -fx-text-fill: white; " +
                        "-fx-background-radius: 6; -fx-font-size: 9px; -fx-font-weight: bold; -fx-cursor: hand;");
                pdfBtn.setOnAction(ev -> {
                    new Thread(() -> {
                        String path = PDFExportService.exportStudentReport(fUserId, fEmail, fEmail);
                        javafx.application.Platform.runLater(() -> {
                            if (path != null) {
                                Alert a = new Alert(Alert.AlertType.INFORMATION);
                                a.setTitle("PDF"); a.setContentText("PDF genere:\n" + path); a.showAndWait();
                                try { java.awt.Desktop.getDesktop().open(new java.io.File(path)); } catch (Exception ex) { }
                            }
                        });
                    }).start();
                });

                Button emailBtn = new Button("Email");
                emailBtn.setStyle("-fx-padding: 3 8; -fx-background-color: #6C63FF; -fx-text-fill: white; " +
                        "-fx-background-radius: 6; -fx-font-size: 9px; -fx-font-weight: bold; -fx-cursor: hand;");
                emailBtn.setOnAction(ev -> {
                    new Thread(() -> {
                        boolean sent = EmailService.sendTestResultEmail(fEmail, fEmail, fTestTitle,
                                fCategory, fLevel, fPercentage, fTotalScore, fMaxScore);
                        javafx.application.Platform.runLater(() -> {
                            Alert a = new Alert(sent ? Alert.AlertType.INFORMATION : Alert.AlertType.ERROR);
                            a.setTitle(sent ? "Email envoye" : "Erreur");
                            a.setContentText(sent ? "Email envoye a: " + fEmail : "Echec de l'envoi.");
                            a.showAndWait();
                        });
                    }).start();
                });

                actionsBox.getChildren().addAll(pdfBtn, emailBtn);
                row.getChildren().addAll(c1, c2, c3, c4, c5, c6, c7, c8, c9, actionsBox);
                specificResultsContainer.getChildren().add(row);
            }

            rs.close();
            ps.close();

            if (!hasData) {
                Label empty = new Label("Aucun etudiant n'a encore passe de test specifique.");
                empty.setStyle("-fx-text-fill: #9B9BB0; -fx-font-size: 13px; -fx-padding: 20;");
                specificResultsContainer.getChildren().add(empty);
            }

        } catch (SQLException e) {
            System.err.println("Erreur resultats specifiques: " + e.getMessage());
            Label error = new Label("Erreur: " + e.getMessage());
            error.setStyle("-fx-text-fill: #E74C3C; -fx-font-size: 12px;");
            specificResultsContainer.getChildren().add(error);
        }
    }

    // ===== COULEURS =====

    private String getCategoryColor(String category) {
        if (category == null) return "#9B9BB0";
        if ("Stress".equals(category)) return "#ef4444";
        if ("Anxiete".equals(category)) return "#f59e0b";
        if ("Depression".equals(category)) return "#3b82f6";
        if ("Trouble du Sommeil".equals(category)) return "#8b5cf6";
        return "#9B9BB0";
    }

    private String getSpecificCategoryColor(String category) {
        if (category == null) return "#9B9BB0";
        if (category.contains("Anxi")) return "#3498DB";
        if (category.contains("epr")) return "#F39C12";
        if (category.contains("Stress")) return "#E74C3C";
        if (category.contains("ommeil")) return "#9B59B6";
        return "#9B9BB0";
    }

    private String getLevelColor(String level) {
        if (level == null) return "#9B9BB0";
        if ("Faible".equals(level)) return "#2ECC71";
        if ("Modere".equals(level)) return "#F39C12";
        if ("Eleve".equals(level)) return "#E74C3C";
        return "#9B9BB0";
    }

    // ===== NAVIGATION =====

    @FXML
    private void handleViewStudentDetails() {
        App.loadScene("/views/StudentStats.fxml", "Stats Etudiants");
    }

    @FXML
    private void handleRefresh() {
        loadStatistics();
        loadCategoryPieChart();
        loadScoreBarChart();
        loadResultsTable();
        loadSpecificResults();
    }

    @FXML
    private void handleBack() {
        App.loadScene("/views/Dashboard.fxml", "Dashboard Psychologue");
    }

    @FXML
    private void handleOpenGeneralTests() {
        App.loadScene("/views/GeneralTest/GeneralTestList.fxml", "Tests Generaux");
    }

    @FXML
    private void handleOpenSpecificTests() {
        App.loadScene("/views/SpecificTest/SpecificTestList.fxml", "Tests Specifiques");
    }

    @FXML
    private void handleLogout() {
        AuthContext.logout();
        App.loadScene("/views/SelectRole.fxml", "MindBoost");
    }
}