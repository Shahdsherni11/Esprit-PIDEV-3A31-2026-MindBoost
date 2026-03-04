package com.mindboost.controllers;

import com.mindboost.dao.BehaviorDAO;
import com.mindboost.dao.PsychProfileDAO;
import com.mindboost.dao.UserDAO;
import com.mindboost.models.PsychProfile;
import com.mindboost.models.User;
import com.mindboost.services.AdaptiveUIService;
import com.mindboost.services.BrevoEmailService;
import com.mindboost.utils.SessionManager;
import javafx.application.Platform;
import javafx.fxml.FXML;
import javafx.scene.canvas.*;
import javafx.scene.control.*;
import javafx.scene.layout.*;
import javafx.scene.paint.*;

import java.util.List;

public class PsychMapController {

    @FXML private Canvas radarCanvas;
    @FXML private Label typeLabel;
    @FXML private Label anomalyLabel;
    @FXML private Label lastUpdatedLabel;
    @FXML private ProgressBar anxietyBar;
    @FXML private ProgressBar resilienceBar;
    @FXML private ProgressBar sociabilityBar;
    @FXML private ProgressBar focusBar;
    @FXML private ProgressBar moodBar;
    @FXML private Label anxietyPct;
    @FXML private Label resiliencePct;
    @FXML private Label sociabilityPct;
    @FXML private Label focusPct;
    @FXML private Label moodPct;
    @FXML private VBox alertBox;
    @FXML private Label alertLabel;
    @FXML private Button sendAlertBtn;
    @FXML private ComboBox<String> psyEmailCombo;
    @FXML private Label themeLabel;

    private final PsychProfileDAO psychDAO = new PsychProfileDAO();
    private final UserDAO userDAO = new UserDAO();
    private PsychProfile profile;

    @FXML
    public void initialize() {
        User user = SessionManager.getInstance().getCurrentUser();
        if (user == null) return;

        try {
            profile = psychDAO.getByUserId(user.getId());
            if (profile == null) {
                profile = new PsychProfile(user.getId());
                psychDAO.save(profile);
            }

            updateUI();
            drawRadarChart();
            loadPsychologists();
            checkAnomalyAlert();
        } catch (Exception e) {
            e.printStackTrace();
        }
    }

    private void updateUI() {
        // Type détecté
        typeLabel.setText(getTypeEmoji(profile.getDetectedType()) + " " + profile.getDetectedType());
        typeLabel.setStyle("-fx-text-fill:#6C63FF;-fx-font-size:20px;-fx-font-weight:bold;");

        // Score anomalie
        double anomaly = profile.getAnomalyScore();
        anomalyLabel.setText(String.format("Score d'anomalie: %.0f%%", anomaly));
        String anomalyColor = anomaly >= 70 ? "#E74C3C" : anomaly >= 50 ? "#F39C12" : "#2ECC71";
        anomalyLabel.setStyle("-fx-text-fill:" + anomalyColor + ";-fx-font-size:14px;");

        // Barres de progression
        setBar(anxietyBar, anxietyPct, profile.getAnxiety(), "#E74C3C");
        setBar(resilienceBar, resiliencePct, profile.getResilience(), "#2ECC71");
        setBar(sociabilityBar, sociabilityPct, profile.getSociability(), "#4ECDC4");
        setBar(focusBar, focusPct, profile.getFocus(), "#6C63FF");
        setBar(moodBar, moodPct, profile.getMood(), "#F39C12");

        // Thème recommandé
        AdaptiveUIService.UITheme theme = AdaptiveUIService.determineTheme(profile);
        themeLabel.setText("🔮 Thème appliqué: " + theme.name());

        // Date mise à jour
        if (profile.getLastUpdated() != null) {
            lastUpdatedLabel.setText("Dernière analyse: " + profile.getLastUpdated().toLocalDate());
        }
    }

    private void setBar(ProgressBar bar, Label pct, double value, String color) {
        bar.setProgress(value / 100.0);
        bar.setStyle("-fx-accent:" + color + ";");
        pct.setText((int) value + "%");
        pct.setStyle("-fx-text-fill:" + color + ";-fx-font-weight:bold;");
    }

    private void drawRadarChart() {
        if (radarCanvas == null) return;
        GraphicsContext gc = radarCanvas.getGraphicsContext2D();
        double w = radarCanvas.getWidth();
        double h = radarCanvas.getHeight();
        double cx = w / 2, cy = h / 2;
        double maxR = Math.min(w, h) / 2 - 30;

        gc.clearRect(0, 0, w, h);

        // Grilles
        for (int level = 1; level <= 4; level++) {
            double r = maxR * level / 4.0;
            gc.setStroke(Color.web("rgba(255,255,255,0.08)"));
            gc.setLineWidth(1);
            drawPolygon(gc, cx, cy, r, 5, -Math.PI / 2);
        }

        // Labels des axes
        String[] labels = {"😰 Anxiété", "💪 Résilience", "💬 Social", "🎯 Focus", "😊 Humeur"};
        double[] values = {
            profile.getAnxiety(), profile.getResilience(),
            profile.getSociability(), profile.getFocus(), profile.getMood()
        };

        for (int i = 0; i < 5; i++) {
            double angle = -Math.PI / 2 + i * 2 * Math.PI / 5;
            double lx = cx + (maxR + 22) * Math.cos(angle);
            double ly = cy + (maxR + 22) * Math.sin(angle);
            gc.setFill(Color.web("#9B9BB0"));
            gc.setFont(javafx.scene.text.Font.font("Segoe UI", 11));
            gc.fillText(labels[i], lx - 32, ly + 4);

            // Ligne d'axe
            gc.setStroke(Color.web("rgba(255,255,255,0.15)"));
            gc.strokeLine(cx, cy, cx + maxR * Math.cos(angle), cy + maxR * Math.sin(angle));
        }

        // Polygon données
        double[] px = new double[5], py = new double[5];
        for (int i = 0; i < 5; i++) {
            double angle = -Math.PI / 2 + i * 2 * Math.PI / 5;
            double r = maxR * values[i] / 100.0;
            px[i] = cx + r * Math.cos(angle);
            py[i] = cy + r * Math.sin(angle);
        }

        // Fill
        gc.setFill(Color.web("rgba(108,99,255,0.25)"));
        gc.fillPolygon(px, py, 5);

        // Border
        gc.setStroke(Color.web("#6C63FF"));
        gc.setLineWidth(2.5);
        gc.strokePolygon(px, py, 5);

        // Points
        for (int i = 0; i < 5; i++) {
            gc.setFill(Color.web("#A89CFF"));
            gc.fillOval(px[i] - 5, py[i] - 5, 10, 10);
        }
    }

    private void drawPolygon(GraphicsContext gc, double cx, double cy, double r, int sides, double startAngle) {
        double[] x = new double[sides], y = new double[sides];
        for (int i = 0; i < sides; i++) {
            double angle = startAngle + i * 2 * Math.PI / sides;
            x[i] = cx + r * Math.cos(angle);
            y[i] = cy + r * Math.sin(angle);
        }
        gc.strokePolygon(x, y, sides);
    }

    private void checkAnomalyAlert() throws Exception {
        String alertMsg = profile.getAlertMessage();
        if (alertMsg != null && alertBox != null) {
            alertBox.setVisible(true);
            alertLabel.setText(alertMsg);
        } else if (alertBox != null) {
            alertBox.setVisible(false);
        }
    }

    private void loadPsychologists() throws Exception {
        if (psyEmailCombo == null) return;
        List<User> psychs = userDAO.getAllUsers();
        psychs.stream()
            .filter(u -> "psychologist".equals(u.getRole()))
            .forEach(u -> psyEmailCombo.getItems().add(u.getEmail()));
        if (!psyEmailCombo.getItems().isEmpty())
            psyEmailCombo.setValue(psyEmailCombo.getItems().get(0));
    }

    @FXML
    public void handleSendAlert() {
        String psyEmail = psyEmailCombo != null ? psyEmailCombo.getValue() : null;
        if (psyEmail == null || psyEmail.isEmpty()) {
            showInfo("❌ Aucun psychologue sélectionné.");
            return;
        }

        User user = SessionManager.getInstance().getCurrentUser();
        String patientName = user != null ? user.getEmail() : "Patient";
        String alertMsg = profile.getAlertMessage() != null ? profile.getAlertMessage() : "Alerte manuelle envoyée.";

        sendAlertBtn.setDisable(true);
        sendAlertBtn.setText("⏳ Envoi...");

        new Thread(() -> {
            try {
                boolean sent = BrevoEmailService.sendPsychAlert(
                    psyEmail, "Dr. Psychologue", patientName, alertMsg, profile.getAnomalyScore());
                Platform.runLater(() -> {
                    if (sent) {
                        sendAlertBtn.setText("✅ Alerté envoyée !");
                        sendAlertBtn.setStyle("-fx-background-color:#2ECC71;");
                    } else {
                        sendAlertBtn.setText("⚠️ Vérifiez la clé Brevo");
                        sendAlertBtn.setDisable(false);
                    }
                });
            } catch (Exception e) {
                Platform.runLater(() -> {
                    sendAlertBtn.setText("❌ Erreur: " + e.getMessage().substring(0, Math.min(30, e.getMessage().length())));
                    sendAlertBtn.setDisable(false);
                });
            }
        }).start();
    }

    @FXML
    public void handleRefresh() {
        try {
            profile = psychDAO.getByUserId(SessionManager.getInstance().getCurrentUser().getId());
            if (profile == null) profile = new PsychProfile(SessionManager.getInstance().getCurrentUser().getId());
            updateUI();
            drawRadarChart();
            checkAnomalyAlert();
        } catch (Exception e) { e.printStackTrace(); }
    }

    private void showInfo(String msg) {
        Alert alert = new Alert(Alert.AlertType.INFORMATION, msg);
        alert.setTitle("MindBoost"); alert.showAndWait();
    }

    private String getTypeEmoji(String type) {
        if (type == null) return "🧠";
        return switch (type) {
            case "ANALYTIQUE" -> "🔬";
            case "CREATIF"    -> "🎨";
            case "SOCIAL"     -> "💬";
            case "EMPATHIQUE" -> "💙";
            case "LEADER"     -> "👑";
            default           -> "🧠";
        };
    }
}
