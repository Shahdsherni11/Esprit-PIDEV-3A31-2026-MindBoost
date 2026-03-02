package org.example.view;

import javafx.collections.FXCollections;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.*;
import javafx.scene.control.cell.PropertyValueFactory;
import javafx.stage.Stage;
import org.example.controller.SousTacheController;
import org.example.controller.TacheFocusController;
import org.example.model.SousTache;

import java.io.IOException;
import java.util.List;
import java.util.Optional;

public class SousTacheViewController {

    // ===== TABLE =====
    @FXML private TableView<SousTache> sousTacheTable;
    @FXML private TableColumn<SousTache, Integer> idCol;
    @FXML private TableColumn<SousTache, Integer> idTacheCol;
    @FXML private TableColumn<SousTache, String> descriptionCol;
    @FXML private TableColumn<SousTache, Integer> dureeCol;
    @FXML private TableColumn<SousTache, String> etatCol;
    @FXML private Label messageLabel;

    // ===== SERVICES =====
    private SousTacheController sousTacheController = new SousTacheController();
    private TacheFocusController tacheController = new TacheFocusController();
    private SousTache selectedSousTache;

    @FXML
    public void initialize() {
        idCol.setCellValueFactory(new PropertyValueFactory<>("idSousTache"));
        idTacheCol.setCellValueFactory(new PropertyValueFactory<>("idTache"));
        descriptionCol.setCellValueFactory(new PropertyValueFactory<>("description"));
        dureeCol.setCellValueFactory(new PropertyValueFactory<>("dureeRecommandee"));
        etatCol.setCellValueFactory(new PropertyValueFactory<>("etat"));

        refreshTable();

        sousTacheTable.getSelectionModel().selectedItemProperty().addListener(
                (obs, oldVal, newVal) -> selectedSousTache = newVal
        );
    }

    private void refreshTable() {
        List<SousTache> sousTaches = sousTacheController.getAllSousTaches();
        sousTacheTable.setItems(FXCollections.observableArrayList(sousTaches));
    }

    // ===== AJOUTER — popup =====
    @FXML
    private void handleAjouter() {
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/sous-tache-form-dialog.fxml"));
            DialogPane dialogPane = loader.load();
            SousTacheFormDialogController controller = loader.getController();

            Dialog<ButtonType> dialog = new Dialog<>();
            dialog.setTitle("✚ Ajouter une Sous-Tâche");
            dialog.setDialogPane(dialogPane);

            Optional<ButtonType> result = dialog.showAndWait();
            if (result.isPresent() && result.get() == ButtonType.OK) {
                SousTache st = controller.getSousTache(0);
                if (st != null) {
                    sousTacheController.ajouterSousTache(st);
                    refreshTable();
                    showSuccess("✓ Sous-tâche ajoutée avec succès !");
                }
            }
        } catch (IOException e) {
            e.printStackTrace();
        }
    }

    // ===== MODIFIER — popup pré-rempli =====
    @FXML
    private void handleModifier() {
        if (selectedSousTache == null) { showError("❌ Sélectionnez une sous-tâche d'abord !"); return; }
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/sous-tache-form-dialog.fxml"));
            DialogPane dialogPane = loader.load();
            SousTacheFormDialogController controller = loader.getController();
            controller.setSousTache(selectedSousTache);

            Dialog<ButtonType> dialog = new Dialog<>();
            dialog.setTitle("✎ Modifier la Sous-Tâche");
            dialog.setDialogPane(dialogPane);

            Optional<ButtonType> result = dialog.showAndWait();
            if (result.isPresent() && result.get() == ButtonType.OK) {
                SousTache st = controller.getSousTache(selectedSousTache.getIdSousTache());
                if (st != null) {
                    sousTacheController.modifierSousTache(st);
                    refreshTable();
                    showSuccess("✓ Sous-tâche modifiée avec succès !");
                }
            }
        } catch (IOException e) {
            e.printStackTrace();
        }
    }

    // ===== SUPPRIMER =====
    @FXML
    private void handleSupprimer() {
        if (selectedSousTache == null) { showError("❌ Sélectionnez une sous-tâche d'abord !"); return; }
        Alert confirm = new Alert(Alert.AlertType.CONFIRMATION);
        confirm.setTitle("Confirmation");
        confirm.setHeaderText("Supprimer la sous-tâche ?");
        confirm.setContentText("\"" + selectedSousTache.getDescription() + "\"");
        Optional<ButtonType> result = confirm.showAndWait();
        if (result.isPresent() && result.get() == ButtonType.OK) {
            sousTacheController.supprimerSousTache(selectedSousTache.getIdSousTache());
            refreshTable();
            showSuccess("✓ Sous-tâche supprimée !");
        }
    }

    @FXML
    private void handleRefresh() {
        refreshTable();
        showSuccess("✓ Liste actualisée !");
    }

    @FXML
    private void handleRetour() {
        try {
            Stage stage = (Stage) sousTacheTable.getScene().getWindow();
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/menu-view.fxml"));
            Parent root = loader.load();
            stage.setScene(new Scene(root));
        } catch (IOException e) { e.printStackTrace(); }
    }

    private void showError(String msg) {
        messageLabel.setText(msg);
        messageLabel.setStyle("-fx-text-fill: #e74c3c; -fx-font-weight: bold;");
    }

    private void showSuccess(String msg) {
        messageLabel.setText(msg);
        messageLabel.setStyle("-fx-text-fill: #27ae60; -fx-font-weight: bold;");
    }
}