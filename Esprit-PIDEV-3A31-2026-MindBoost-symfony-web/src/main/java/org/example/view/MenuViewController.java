package org.example.view;

import javafx.application.Platform;
import javafx.concurrent.Task;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.Label;
import javafx.scene.input.MouseEvent;
import javafx.stage.Stage;
import org.example.Service.CitationService;
import org.example.controller.TacheFocusController;
import org.example.controller.SousTacheController;
import org.example.model.TacheFocus;

import java.io.IOException;
import java.util.List;

public class MenuViewController {

    @FXML private Label totalTachesLabel;
    @FXML private Label totalSousTachesLabel;
    @FXML private Label avgScoreLabel;
    @FXML private Label citationLabel;
    @FXML private Label citationAuteurLabel;

    private TacheFocusController tacheController = new TacheFocusController();
    private SousTacheController sousTacheController = new SousTacheController();
    private CitationService citationService = new CitationService();

    @FXML
    public void initialize() {
        loadStatistics();
        loadCitation();
    }

    private void loadStatistics() {
        try {
            List<TacheFocus> taches = tacheController.getAllTaches();
            totalTachesLabel.setText("Total: " + taches.size());
            totalSousTachesLabel.setText("Total: " + sousTacheController.getAllSousTaches().size());
            double avgScore = taches.stream()
                    .mapToInt(TacheFocus::getScoreProductivite)
                    .average()
                    .orElse(0.0);
            avgScoreLabel.setText(String.format("%.0f%%", avgScore));
        } catch (Exception e) {
            e.printStackTrace();
            totalTachesLabel.setText("Total: 0");
            totalSousTachesLabel.setText("Total: 0");
            avgScoreLabel.setText("0%");
        }
    }

    private void loadCitation() {
        Task<String[]> task = new Task<>() {
            @Override
            protected String[] call() {
                return citationService.getCitation();
            }
        };
        task.setOnSucceeded(e -> {
            String[] citation = task.getValue();
            if (citationLabel != null)
                citationLabel.setText("\" " + citation[0] + " \"");
            if (citationAuteurLabel != null)
                citationAuteurLabel.setText("— " + citation[1]);
        });
        task.setOnFailed(e -> {
            if (citationLabel != null)
                citationLabel.setText("\" La productivité naît de la discipline. \"");
            if (citationAuteurLabel != null)
                citationAuteurLabel.setText("— MindBood");
        });
        new Thread(task).start();
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
    private void openStatistiqueView(MouseEvent event) {
        loadView("/statistique-view.fxml");
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
            stage.setScene(new Scene(root));
        } catch (IOException e) {
            e.printStackTrace();
        }
    }
}