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
import org.example.model.TacheFocus;

import java.io.IOException;
import java.util.List;
import java.util.Optional;

public class SousTacheViewController {

    @FXML private TableView<SousTache> sousTacheTable;
    @FXML private TableColumn<SousTache, Integer> idCol;
    @FXML private TableColumn<SousTache, Integer> idTacheCol;
    @FXML private TableColumn<SousTache, String> descriptionCol;
    @FXML private TableColumn<SousTache, Integer> dureeCol;
    @FXML private TableColumn<SousTache, String> etatCol;
    @FXML private Label messageLabel;

    private SousTacheController sousTacheController = new SousTacheController();
    private TacheFocusController tacheController = new TacheFocusController();
    private SousTache selectedSousTache;

    // ✅ NOUVEAU : tâche parente reçue depuis TacheFocusViewController
    private TacheFocus tacheParente;

    // ✅ NOUVEAU : appelé depuis TacheFocusViewController
    public void setTacheParente(TacheFocus tache) {
        this.tacheParente = tache;
        refreshTable(); // recharger avec seulement les sous-tâches de cette tâche
    }

    @FXML
    public void initialize() {
        idCol.setCellValueFactory(new PropertyValueFactory<>("idSousTache"));
        idTacheCol.setCellValueFactory(new PropertyValueFactory<>("idTache"));
        descriptionCol.setCellValueFactory(new PropertyValueFactory<>("description"));
        dureeCol.setCellValueFactory(new PropertyValueFactory<>("dureeRecommandee"));
        etatCol.setCellValueFactory(new PropertyValueFactory<>("etat"));

        sousTacheTable.getSelectionModel().selectedItemProperty().addListener(
                (obs, oldVal, newVal) -> selectedSousTache = newVal
        );
    }

    private void refreshTable() {
        List<SousTache> sousTaches;

        // ✅ Si on vient de TacheFocus → afficher seulement les sous-tâches de cette tâche
        if (tacheParente != null) {
            sousTaches = sousTacheController.getSousTachesByTache(tacheParente.getIdTache());
            if (messageLabel != null) {
                messageLabel.setText("📋 Sous-tâches de : \"" + tacheParente.getTitre() + "\"");
                messageLabel.setStyle("-fx-text-fill: #a29bfe; -fx-font-weight: bold;");
            }
        } else {
            // Sinon → afficher toutes les sous-tâches (comportement original)
            sousTaches = sousTacheController.getAllSousTaches();
        }

        sousTacheTable.setItems(FXCollections.observableArrayList(sousTaches));
    }

    @FXML
    private void handleAjouter() {
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/sous-tache-form-dialog.fxml"));
            DialogPane dialogPane = loader.load();
            SousTacheFormDialogController controller = loader.getController();

            // ✅ Pré-remplir l'ID de la tâche parente si on vient de TacheFocus
            if (tacheParente != null) {
                controller.setIdTacheParente(tacheParente.getIdTache());
            }

            Dialog<ButtonType> dialog = new Dialog<>();
            dialog.setTitle("✚ Ajouter une Sous-Tâche");
            dialog.setDialogPane(dialogPane);
            Optional<ButtonType> result = dialog.showAndWait();
            if (result.isPresent() && result.get() == ButtonType.OK) {
                SousTache st = controller.getSousTache(0);
                if (st != null) {
                    sousTacheController.ajouterSousTache(st);
                    verifierProgression(st.getIdTache());
                    refreshTable();
                    showSuccess("✓ Sous-tâche ajoutée avec succès !");
                }
            }
        } catch (IOException e) { e.printStackTrace(); }
    }

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
                    // ===== PROGRESSION AUTOMATIQUE =====
                    verifierProgression(st.getIdTache());
                    refreshTable();
                    showSuccess("✓ Sous-tâche modifiée avec succès !");
                }
            }
        } catch (IOException e) { e.printStackTrace(); }
    }

    @FXML
    private void handleSupprimer() {
        if (selectedSousTache == null) { showError("❌ Sélectionnez une sous-tâche d'abord !"); return; }
        Alert confirm = new Alert(Alert.AlertType.CONFIRMATION);
        confirm.setTitle("Confirmation");
        confirm.setHeaderText("Supprimer la sous-tâche ?");
        confirm.setContentText("\"" + selectedSousTache.getDescription() + "\"");
        Optional<ButtonType> result = confirm.showAndWait();
        if (result.isPresent() && result.get() == ButtonType.OK) {
            int idTache = selectedSousTache.getIdTache();
            sousTacheController.supprimerSousTache(selectedSousTache.getIdSousTache());
            verifierProgression(idTache);
            refreshTable();
            showSuccess("✓ Sous-tâche supprimée !");
        }
    }

    // ===== PROGRESSION AUTOMATIQUE =====
    private void verifierProgression(int idTache) {
        int progression = sousTacheController.calculerProgression(idTache);
        TacheFocus tache = tacheController.getTacheById(idTache);
        if (tache == null) return;

        tache.setScoreProductivite(progression);

        if (sousTacheController.toutesTerminees(idTache)) {
            tache.setStatut("Terminée");
            tacheController.modifierTache(tache);

            Alert felicitations = new Alert(Alert.AlertType.INFORMATION);
            felicitations.setTitle("🎉 Félicitations !");
            felicitations.setHeaderText("Tâche complétée automatiquement !");
            felicitations.setContentText(
                    "✅ Toutes les sous-tâches de :\n\"" + tache.getTitre() + "\"\n\n" +
                            "sont terminées !\n" +
                            "📊 Score : 100%\n" +
                            "🏆 Statut : Terminée"
            );
            felicitations.showAndWait();
            showSuccess("🎉 Tâche \"" + tache.getTitre() + "\" complétée à 100% !");
        } else {
            tacheController.modifierTache(tache);
            showSuccess("📊 Progression : " + progression + "% pour \"" + tache.getTitre() + "\"");
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
            // ✅ Retour vers TacheFocus (pas menu principal)
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/tache-focus-view.fxml"));
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