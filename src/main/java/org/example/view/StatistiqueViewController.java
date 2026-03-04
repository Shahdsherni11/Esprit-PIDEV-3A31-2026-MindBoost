package org.example.view;

import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.chart.PieChart;
import javafx.scene.control.Label;
import javafx.stage.Stage;
import org.example.Service.StatistiqueService;

import java.io.IOException;
import java.util.Map;

public class StatistiqueViewController {

    @FXML private PieChart pieChart;
    @FXML private Label totalTachesLabel;
    @FXML private Label scoreMoyenLabel;
    @FXML private Label titreLabel;

    private StatistiqueService statistiqueService = new StatistiqueService();

    @FXML
    public void initialize() {
        loadPieChart();
        loadStats();
    }

    private void loadPieChart() {
        Map<String, Integer> repartition = statistiqueService.getStatutRepartition();

        ObservableList<PieChart.Data> pieData = FXCollections.observableArrayList();

        for (Map.Entry<String, Integer> entry : repartition.entrySet()) {
            pieData.add(new PieChart.Data(entry.getKey() + " (" + entry.getValue() + ")", entry.getValue()));
        }

        if (pieData.isEmpty()) {
            pieData.add(new PieChart.Data("Aucune tâche", 1));
        }

        pieChart.setData(pieData);
        pieChart.setTitle("Répartition des Tâches par Statut");
        pieChart.setLegendVisible(true);
        pieChart.setLabelsVisible(true);
        pieChart.setAnimated(true);
    }

    private void loadStats() {
        int total = statistiqueService.getTotalTaches();
        double score = statistiqueService.getScoreMoyen();

        totalTachesLabel.setText(String.valueOf(total));
        scoreMoyenLabel.setText(String.format("%.0f%%", score));
    }

    @FXML
    private void retourMenu() {
        try {
            Stage stage = (Stage) pieChart.getScene().getWindow();
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/menu-view.fxml"));
            Parent root = loader.load();
            stage.setScene(new Scene(root));
        } catch (IOException e) {
            e.printStackTrace();
        }
    }
}