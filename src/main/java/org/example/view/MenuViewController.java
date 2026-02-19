package org.example.view;

import javafx.application.Platform;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.Label;
import javafx.scene.input.MouseEvent;
import javafx.stage.Stage;
import org.example.controller.TacheFocusController;
import org.example.controller.SousTacheController;
import org.example.model.TacheFocus;

import java.io.IOException;
import java.util.List;

public class MenuViewController {

    @FXML private Label totalTachesLabel;
    @FXML private Label totalSousTachesLabel;
    @FXML private Label avgScoreLabel;

    private TacheFocusController tacheController = new TacheFocusController();
    private SousTacheController sousTacheController = new SousTacheController();

    @FXML
    public void initialize() {
        loadStatistics();
    }

    private void loadStatistics() {
        try {
            // Get taches count
            List<TacheFocus> taches = tacheController.getAllTaches();
            int tachesCount = taches.size();
            totalTachesLabel.setText("Total: " + tachesCount);

            // Get sous-taches count
            int sousTachesCount = sousTacheController.getAllSousTaches().size();
            totalSousTachesLabel.setText("Total: " + sousTachesCount);

            // Calculate average score
            double avgScore = taches.stream()
                    .mapToInt(TacheFocus::getScoreProductivite)
                    .average()
                    .orElse(0.0);
            avgScoreLabel.setText(String.format("%.0f%%", avgScore));
        } catch (Exception e) {
            e.printStackTrace();
            // Set default values on error
            totalTachesLabel.setText("Total: 0");
            totalSousTachesLabel.setText("Total: 0");
            avgScoreLabel.setText("0%");
        }
    }

    @FXML
    private void openTacheView(MouseEvent event) {
        loadView("/tache-focus-view.fxml");
    }

    @FXML
    private void openSousTacheView(MouseEvent event) {
        loadView("/sous-tache-view.fxml");
    }

    @FXML
    private void handleQuit() {
        Platform.exit();
    }

    private void loadView(String fxmlPath) {
        try {
            Stage stage = (Stage) totalTachesLabel.getScene().getWindow();
            FXMLLoader loader = new FXMLLoader(getClass().getResource(fxmlPath));
            Parent root = loader.load();
            Scene scene = new Scene(root);
            stage.setScene(scene);
        } catch (IOException e) {
            e.printStackTrace();
        }
    }
}
