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
import java.time.LocalTime;
import java.util.List;
import java.util.Optional;

public class SousTacheViewController {

    // ================= UI Components =================
    @FXML private TextField descriptionField;
    @FXML private ComboBox<TacheFocus> tacheParentComboBox;
    @FXML private Spinner<Integer> dureeSpinner;
    @FXML private ComboBox<String> etatComboBox;
    @FXML private TextField heureDebutField;
    @FXML private TextField heureFinField;
    @FXML private Spinner<Integer> prioriteSpinner;
    @FXML private TableView<SousTache> sousTacheTable;
    @FXML private TableColumn<SousTache, Integer> idCol;
    @FXML private TableColumn<SousTache, Integer> idTacheCol;
    @FXML private TableColumn<SousTache, String> descriptionCol;
    @FXML private TableColumn<SousTache, Integer> dureeCol;
    @FXML private TableColumn<SousTache, String> etatCol;
    @FXML private Label messageLabel;

    // ================= Business Logic =================
    private SousTacheController sousTacheController = new SousTacheController();
    private TacheFocusController tacheController = new TacheFocusController();
    private SousTache selectedSousTache;

    // ================= Initialization =================
    @FXML
    public void initialize() {
        // Configure spinners
        dureeSpinner.setValueFactory(new SpinnerValueFactory.IntegerSpinnerValueFactory(5, 480, 30));
        prioriteSpinner.setValueFactory(new SpinnerValueFactory.IntegerSpinnerValueFactory(1, 5, 1));
        
        // Configure etat combo box
        etatComboBox.setItems(FXCollections.observableArrayList(
            "À faire", "En cours", "Terminée", "Bloquée"
        ));
        
        // Load parent tasks
        loadParentTaches();
        
        // Configure table columns
        idCol.setCellValueFactory(new PropertyValueFactory<>("idSousTache"));
        idTacheCol.setCellValueFactory(new PropertyValueFactory<>("idTache"));
        descriptionCol.setCellValueFactory(new PropertyValueFactory<>("description"));
        dureeCol.setCellValueFactory(new PropertyValueFactory<>("dureeRecommandee"));
        etatCol.setCellValueFactory(new PropertyValueFactory<>("etat"));

        // Handle row selection
        sousTacheTable.getSelectionModel().selectedItemProperty().addListener((obs, oldSelection, newSelection) -> {
            if (newSelection != null) {
                selectedSousTache = newSelection;
                fillForm(newSelection);
            }
        });

        // Load initial data
        refreshTable();
    }
    
    private void loadParentTaches() {
        List<TacheFocus> taches = tacheController.getAllTaches();
        tacheParentComboBox.setItems(FXCollections.observableArrayList(taches));
    }

    // ================= CRUD Operations =================
    
    @FXML
    private void handleAjouter() {
        String description = descriptionField.getText().trim();

        // Validation
        if (description.isEmpty()) {
            showError("La description est obligatoire!");
            return;
        }
        
        if (tacheParentComboBox.getValue() == null) {
            showError("Veuillez sélectionner une tâche parente!");
            return;
        }
        
        if (etatComboBox.getValue() == null) {
            showError("L'état est obligatoire!");
            return;
        }
        
        int idTache = tacheParentComboBox.getValue().getIdTache();

        LocalTime debut = null;
        LocalTime fin = null;
        
        try {
            if (!heureDebutField.getText().isEmpty()) {
                debut = LocalTime.parse(heureDebutField.getText());
            }
            if (!heureFinField.getText().isEmpty()) {
                fin = LocalTime.parse(heureFinField.getText());
            }
        } catch (Exception e) {
            showError("Format d'heure invalide (HH:MM:SS)");
            return;
        }

        // Create and save
        SousTache newSousTache = new SousTache();
        newSousTache.setIdTache(idTache);
        newSousTache.setDescription(description);
        newSousTache.setDureeRecommandee(dureeSpinner.getValue());
        newSousTache.setEtat(etatComboBox.getValue());
        newSousTache.setHeureDebut(debut);
        newSousTache.setHeureFin(fin);
        newSousTache.setPriorite(prioriteSpinner.getValue());

        sousTacheController.ajouterSousTache(newSousTache);
        showSuccess("Sous-tâche ajoutée avec succès!");
        refreshTable();
        handleClear();
    }

    @FXML
    private void handleModifier() {
        if (selectedSousTache == null) {
            showError("Veuillez sélectionner une sous-tâche à modifier!");
            return;
        }

        String description = descriptionField.getText().trim();

        // Validation
        if (description.isEmpty()) {
            showError("La description est obligatoire!");
            return;
        }
        
        if (etatComboBox.getValue() == null) {
            showError("L'état est obligatoire!");
            return;
        }
        
        LocalTime debut = null;
        LocalTime fin = null;
        
        try {
            if (!heureDebutField.getText().isEmpty()) {
                debut = LocalTime.parse(heureDebutField.getText());
            }
            if (!heureFinField.getText().isEmpty()) {
                fin = LocalTime.parse(heureFinField.getText());
            }
        } catch (Exception e) {
            showError("Format d'heure invalide (HH:MM:SS)");
            return;
        }

        // Confirmation dialog
        Alert confirmAlert = new Alert(Alert.AlertType.CONFIRMATION);
        confirmAlert.setTitle("Confirmation");
        confirmAlert.setHeaderText("Modifier la sous-tâche");
        confirmAlert.setContentText("Êtes-vous sûr de vouloir modifier cette sous-tâche?");
        
        Optional<ButtonType> result = confirmAlert.showAndWait();
        if (result.isPresent() && result.get() == ButtonType.OK) {
            selectedSousTache.setDescription(description);
            selectedSousTache.setDureeRecommandee(dureeSpinner.getValue());
            selectedSousTache.setEtat(etatComboBox.getValue());
            selectedSousTache.setHeureDebut(debut);
            selectedSousTache.setHeureFin(fin);
            selectedSousTache.setPriorite(prioriteSpinner.getValue());

            sousTacheController.modifierSousTache(selectedSousTache);
            showSuccess("Sous-tâche modifiée avec succès!");
            refreshTable();
            handleClear();
        }
    }

    @FXML
    private void handleSupprimer() {
        if (selectedSousTache == null) {
            showError("Veuillez sélectionner une sous-tâche à supprimer!");
            return;
        }

        // Confirmation dialog
        Alert confirmAlert = new Alert(Alert.AlertType.CONFIRMATION);
        confirmAlert.setTitle("Confirmation");
        confirmAlert.setHeaderText("Supprimer la sous-tâche");
        confirmAlert.setContentText("Êtes-vous sûr de vouloir supprimer cette sous-tâche?\nCette action est irréversible!");
        
        Optional<ButtonType> result = confirmAlert.showAndWait();
        if (result.isPresent() && result.get() == ButtonType.OK) {
            sousTacheController.supprimerSousTache(selectedSousTache.getIdSousTache());
            showSuccess("Sous-tâche supprimée avec succès!");
            refreshTable();
            handleClear();
        }
    }

    @FXML
    private void handleClear() {
        descriptionField.clear();
        tacheParentComboBox.setValue(null);
        dureeSpinner.getValueFactory().setValue(30);
        etatComboBox.setValue(null);
        heureDebutField.clear();
        heureFinField.clear();
        prioriteSpinner.getValueFactory().setValue(1);
        messageLabel.setText("");
        selectedSousTache = null;
        sousTacheTable.getSelectionModel().clearSelection();
    }

    @FXML
    private void handleRefresh() {
        refreshTable();
        loadParentTaches();
        showSuccess("Liste actualisée!");
    }

    @FXML
    private void handleRetour() {
        try {
            // Get current stage
            Stage stage = (Stage) descriptionField.getScene().getWindow();
            
            // Load main menu
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/menu-view.fxml"));
            Parent root = loader.load();
            
            Scene scene = new Scene(root);
            stage.setScene(scene);
        } catch (IOException e) {
            e.printStackTrace();
            showError("Erreur lors du retour au menu!");
        }
    }

    // ================= Helper Methods =================
    
    private void refreshTable() {
        List<SousTache> sousTaches = sousTacheController.getAllSousTaches();
        sousTacheTable.setItems(FXCollections.observableArrayList(sousTaches));
    }

    private void fillForm(SousTache sousTache) {
        descriptionField.setText(sousTache.getDescription());
        
        // Find and set the parent tache in combo box
        TacheFocus parentTache = tacheController.getTacheById(sousTache.getIdTache());
        tacheParentComboBox.setValue(parentTache);
        
        dureeSpinner.getValueFactory().setValue(sousTache.getDureeRecommandee());
        etatComboBox.setValue(sousTache.getEtat());
        heureDebutField.setText(sousTache.getHeureDebut() != null ? sousTache.getHeureDebut().toString() : "");
        heureFinField.setText(sousTache.getHeureFin() != null ? sousTache.getHeureFin().toString() : "");
        prioriteSpinner.getValueFactory().setValue(sousTache.getPriorite());
        messageLabel.setText("");
    }

    private void showError(String message) {
        messageLabel.setText("❌ " + message);
        messageLabel.setStyle("-fx-text-fill: #e74c3c; -fx-font-weight: bold;");
    }

    private void showSuccess(String message) {
        messageLabel.setText("✓ " + message);
        messageLabel.setStyle("-fx-text-fill: #27ae60; -fx-font-weight: bold;");
    }
}
