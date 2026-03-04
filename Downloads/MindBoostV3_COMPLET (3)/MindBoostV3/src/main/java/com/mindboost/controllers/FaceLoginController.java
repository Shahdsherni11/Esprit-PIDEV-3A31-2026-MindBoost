package com.mindboost.controllers;

import com.github.sarxos.webcam.Webcam;
import com.github.sarxos.webcam.WebcamResolution;
import com.mindboost.dao.FaceEncodingDAO;
import com.mindboost.dao.ProfileDAO;
import com.mindboost.dao.UserDAO;
import com.mindboost.models.FaceEncoding;
import com.mindboost.models.User;
import com.mindboost.services.FaceRecognitionService;
import com.mindboost.utils.SceneManager;
import com.mindboost.utils.SessionManager;
import javafx.animation.*;
import javafx.application.Platform;
import javafx.embed.swing.SwingFXUtils;
import javafx.fxml.FXML;
import javafx.scene.control.*;
import javafx.scene.image.*;
import javafx.scene.layout.*;
import javafx.scene.paint.Color;
import javafx.scene.shape.Circle;
import javafx.util.Duration;

import java.awt.image.BufferedImage;
import java.util.List;
import java.util.concurrent.*;
import java.util.concurrent.atomic.AtomicBoolean;

public class FaceLoginController {

    @FXML private ImageView      cameraView;
    @FXML private Label          statusLabel;
    @FXML private Label          countdownLabel;
    @FXML private Button         captureBtn;
    @FXML private Button         enrollBtn;
    @FXML private Button         backBtn;
    @FXML private ProgressBar    progressBar;
    @FXML private Circle         faceCircle;

    private Webcam webcam;
    private ScheduledExecutorService cameraExecutor;
    private final AtomicBoolean faceDetected  = new AtomicBoolean(false);
    private final AtomicBoolean running       = new AtomicBoolean(false);

    private final UserDAO        userDAO    = new UserDAO();
    private final ProfileDAO     profileDAO = new ProfileDAO();
    private final FaceEncodingDAO faceDAO   = new FaceEncodingDAO();

    // ──────────────────────────────────────────────────────────────────────
    @FXML
    public void initialize() {
        setupCircleAnimation();
        startCamera();
    }

    private void setupCircleAnimation() {
        if (faceCircle == null) return;
        faceCircle.setFill(Color.TRANSPARENT);
        faceCircle.setStroke(Color.web("#6C63FF"));
        faceCircle.setStrokeWidth(3);

        ScaleTransition pulse = new ScaleTransition(Duration.millis(1200), faceCircle);
        pulse.setFromX(0.93); pulse.setToX(1.07);
        pulse.setFromY(0.93); pulse.setToY(1.07);
        pulse.setCycleCount(Animation.INDEFINITE);
        pulse.setAutoReverse(true);
        pulse.play();
    }

    // ──────────────────────────────────────────────────────────────────────
    // CAMÉRA
    // ──────────────────────────────────────────────────────────────────────
    private void startCamera() {
        setStatus("📷 Initialisation de la caméra...", "#9B9BB0");

        new Thread(() -> {
            try {
                webcam = FaceRecognitionService.openWebcam();
                running.set(true);

                // Lance le thread de preview ~15 fps
                cameraExecutor = Executors.newSingleThreadScheduledExecutor();
                cameraExecutor.scheduleAtFixedRate(this::updateFrame, 0, 66, TimeUnit.MILLISECONDS);

                Platform.runLater(() -> setStatus("🔍 Positionnez votre visage dans le cadre", "#9B9BB0"));

            } catch (Exception e) {
                Platform.runLater(() ->
                    setStatus("❌ Caméra non disponible : " + e.getMessage()
                        + "\n→ Vérifiez qu'une webcam est branchée.", "#E74C3C"));
            }
        }, "webcam-init").start();
    }

    private void updateFrame() {
        if (!running.get()) return;
        BufferedImage frame = FaceRecognitionService.captureFrame(webcam);
        if (frame == null) return;

        boolean face = FaceRecognitionService.hasFace(frame);
        faceDetected.set(face);

        // Convertit pour affichage JavaFX
        WritableImage fxImg = SwingFXUtils.toFXImage(frame, null);

        Platform.runLater(() -> {
            cameraView.setImage(fxImg);
            if (face) {
                setStatus("✅ Visage détecté — Cliquez 'Connexion par Visage'", "#2ECC71");
                if (faceCircle != null) faceCircle.setStroke(Color.web("#2ECC71"));
            } else {
                setStatus("🔍 Positionnez votre visage dans le cadre...", "#9B9BB0");
                if (faceCircle != null) faceCircle.setStroke(Color.web("#6C63FF"));
            }
        });
    }

    // ──────────────────────────────────────────────────────────────────────
    // LOGIN PAR VISAGE
    // ──────────────────────────────────────────────────────────────────────
    @FXML
    public void handleFaceLogin() {
        if (!faceDetected.get()) {
            setStatus("❌ Aucun visage détecté. Repositionnez-vous devant la caméra.", "#E74C3C");
            return;
        }
        captureBtn.setDisable(true);
        progressBar.setProgress(ProgressBar.INDETERMINATE_PROGRESS);
        setStatus("🔍 Analyse du visage en cours...", "#A89CFF");

        new Thread(() -> {
            try {
                BufferedImage frame = FaceRecognitionService.captureFrame(webcam);
                BufferedImage faceRegion = FaceRecognitionService.cropFaceRegion(frame);
                double[] descriptor = FaceRecognitionService.computeDescriptor(faceRegion);

                List<User> allUsers = userDAO.getAllUsers();
                User recognized = FaceRecognitionService.recognizeFace(descriptor, allUsers);

                Platform.runLater(() -> {
                    progressBar.setProgress(1.0);
                    if (recognized != null) {
                        setStatus("✅ Bienvenue " + recognized.getEmail() + " !", "#2ECC71");
                        SessionManager.getInstance().setCurrentUser(recognized);
                        try { SessionManager.getInstance().setCurrentProfile(profileDAO.getByUserId(recognized.getId())); }
                        catch (Exception ignored) {}

                        // Délai pour montrer le succès
                        PauseTransition pause = new PauseTransition(Duration.seconds(1.2));
                        pause.setOnFinished(e -> {
                            stopCamera();
                            if ("admin".equals(recognized.getRole()))
                                SceneManager.switchTo("/com/mindboost/fxml/AdminDashboard.fxml");
                            else
                                SceneManager.switchTo("/com/mindboost/fxml/UserDashboard.fxml");
                        });
                        pause.play();
                    } else {
                        progressBar.setProgress(0);
                        setStatus("❌ Visage non reconnu.\nClique 'Enregistrer mon visage' d'abord.", "#E74C3C");
                        captureBtn.setDisable(false);
                    }
                });
            } catch (Exception e) {
                Platform.runLater(() -> {
                    progressBar.setProgress(0);
                    setStatus("⚠️ Erreur : " + e.getMessage(), "#E74C3C");
                    captureBtn.setDisable(false);
                });
            }
        }, "face-login").start();
    }

    // ──────────────────────────────────────────────────────────────────────
    // ENREGISTREMENT DU VISAGE
    // ──────────────────────────────────────────────────────────────────────
    @FXML
    public void handleEnrollFace() {
        TextInputDialog dialog = new TextInputDialog();
        dialog.setTitle("Enregistrer votre visage");
        dialog.setHeaderText("Associer votre visage à un compte existant");
        dialog.setContentText("Votre email :");

        dialog.showAndWait().ifPresent(email -> {
            if (email.isBlank()) return;
            enrollBtn.setDisable(true);

            new Thread(() -> {
                try {
                    User user = userDAO.getByEmail(email.trim().toLowerCase());
                    if (user == null) {
                        Platform.runLater(() -> {
                            setStatus("❌ Aucun compte trouvé pour : " + email, "#E74C3C");
                            enrollBtn.setDisable(false);
                        });
                        return;
                    }

                    // Compte à rebours 3-2-1
                    for (int i = 3; i >= 1; i--) {
                        final String txt = String.valueOf(i);
                        Platform.runLater(() -> {
                            if (countdownLabel != null) countdownLabel.setText(txt);
                        });
                        Thread.sleep(900);
                    }
                    Platform.runLater(() -> { if (countdownLabel != null) countdownLabel.setText("📸"); });
                    Thread.sleep(200);

                    // Capture
                    BufferedImage frame = FaceRecognitionService.captureFrame(webcam);
                    if (frame == null || !FaceRecognitionService.hasFace(frame)) {
                        Platform.runLater(() -> {
                            if (countdownLabel != null) countdownLabel.setText("");
                            setStatus("❌ Aucun visage détecté au moment de la capture. Réessayez.", "#E74C3C");
                            enrollBtn.setDisable(false);
                        });
                        return;
                    }

                    BufferedImage faceRegion = FaceRecognitionService.cropFaceRegion(frame);
                    double[] descriptor = FaceRecognitionService.computeDescriptor(faceRegion);
                    FaceEncoding fe = new FaceEncoding(user.getId(), FaceRecognitionService.descriptorToJson(descriptor));
                    faceDAO.save(fe);

                    Platform.runLater(() -> {
                        if (countdownLabel != null) countdownLabel.setText("");
                        setStatus("✅ Visage enregistré pour " + user.getEmail()
                            + " !\nVous pouvez maintenant vous connecter par visage.", "#2ECC71");
                        enrollBtn.setDisable(false);
                    });

                } catch (Exception e) {
                    Platform.runLater(() -> {
                        if (countdownLabel != null) countdownLabel.setText("");
                        setStatus("⚠️ Erreur : " + e.getMessage(), "#E74C3C");
                        enrollBtn.setDisable(false);
                    });
                }
            }, "face-enroll").start();
        });
    }

    // ──────────────────────────────────────────────────────────────────────
    @FXML
    public void handleBack() {
        stopCamera();
        SceneManager.switchTo("/com/mindboost/fxml/Login.fxml");
    }

    // ──────────────────────────────────────────────────────────────────────
    // UTILITAIRES
    // ──────────────────────────────────────────────────────────────────────
    private void setStatus(String msg, String colorHex) {
        Platform.runLater(() -> {
            if (statusLabel == null) return;
            statusLabel.setText(msg);
            statusLabel.setStyle("-fx-text-fill:" + colorHex + ";-fx-font-size:13px;");
        });
    }

    public void stopCamera() {
        running.set(false);
        if (cameraExecutor != null) {
            cameraExecutor.shutdownNow();
        }
        // Ferme la webcam dans un thread séparé pour éviter le freeze UI
        if (webcam != null && webcam.isOpen()) {
            new Thread(() -> webcam.close(), "webcam-close").start();
        }
    }

    /** Appelé automatiquement quand la scène est déchargée */
    public void stop() { stopCamera(); }
}
