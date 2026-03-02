package org.example.view;

import org.example.Service.OpenAIService;
import org.example.Service.SuggestionService;
import org.example.controller.SousTacheController;
import org.example.controller.TacheFocusController;
import org.example.model.SousTache;
import org.example.model.TacheFocus;
import javafx.collections.FXCollections;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.*;
import javafx.scene.control.cell.PropertyValueFactory;
import javafx.stage.Stage;

import java.io.IOException;
import java.time.LocalTime;
import java.util.List;
import java.util.Optional;

public class TacheFocusViewController {

    // ===== TABLE =====
    @FXML private TableView<TacheFocus> tacheTable;
    @FXML private TableColumn<TacheFocus, Integer> idCol;
    @FXML private TableColumn<TacheFocus, String> titreCol;
    @FXML private TableColumn<TacheFocus, String> objectifCol;
    @FXML private TableColumn<TacheFocus, Integer> difficulteCol;
    @FXML private TableColumn<TacheFocus, String> statutCol;
    @FXML private TableColumn<TacheFocus, Integer> scoreCol;
    @FXML private TableColumn<TacheFocus, LocalTime> debutCol;
    @FXML private TableColumn<TacheFocus, LocalTime> finCol;
    @FXML private Label totalLabel;
    @FXML private Label errorLabel;

    // ===== SERVICES =====
    private TacheFocusController tacheController = new TacheFocusController();
    private SuggestionService suggestionService = new SuggestionService();
    private SousTacheController sousTacheController = new SousTacheController();
    private OpenAIService openAIService = new OpenAIService();

    private TacheFocus selectedTache;

    @FXML
    public void initialize() {
        idCol.setCellValueFactory(new PropertyValueFactory<>("idTache"));
        titreCol.setCellValueFactory(new PropertyValueFactory<>("titre"));
        objectifCol.setCellValueFactory(new PropertyValueFactory<>("objectifPrincipal"));
        difficulteCol.setCellValueFactory(new PropertyValueFactory<>("niveauDifficulte"));
        statutCol.setCellValueFactory(new PropertyValueFactory<>("statut"));
        scoreCol.setCellValueFactory(new PropertyValueFactory<>("scoreProductivite"));
        debutCol.setCellValueFactory(new PropertyValueFactory<>("heureDebut"));
        finCol.setCellValueFactory(new PropertyValueFactory<>("heureFin"));

        loadTaches();

        tacheTable.getSelectionModel().selectedItemProperty().addListener(
                (obs, oldVal, newVal) -> selectedTache = newVal
        );
    }

    private void loadTaches() {
        List<TacheFocus> taches = tacheController.getAllTaches();
        tacheTable.setItems(FXCollections.observableArrayList(taches));
        totalLabel.setText(String.format("Total: %d tâches", taches.size()));
    }

    // ===== AJOUTER — ouvre popup =====
    @FXML
    private void handleAjouter() {
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/tache-form-dialog.fxml"));
            DialogPane dialogPane = loader.load();
            TacheFormDialogController controller = loader.getController();

            Dialog<ButtonType> dialog = new Dialog<>();
            dialog.setTitle("✚ Ajouter une Tâche Focus");
            dialog.setDialogPane(dialogPane);

            Optional<ButtonType> result = dialog.showAndWait();
            if (result.isPresent() && result.get() == ButtonType.OK) {
                TacheFocus t = controller.getTache(0);
                if (t != null) {
                    tacheController.ajouterTache(t);
                    loadTaches();
                    showSuccess("✓ Tâche ajoutée avec succès !");
                }
            }
        } catch (IOException e) {
            e.printStackTrace();
        }
    }

    // ===== MODIFIER — ouvre popup avec données =====
    @FXML
    private void handleModifier() {
        if (selectedTache == null) {
            showError("❌ Sélectionnez une tâche d'abord !");
            return;
        }
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/tache-form-dialog.fxml"));
            DialogPane dialogPane = loader.load();
            TacheFormDialogController controller = loader.getController();
            controller.setTache(selectedTache); // pré-remplir

            Dialog<ButtonType> dialog = new Dialog<>();
            dialog.setTitle("✎ Modifier la Tâche Focus");
            dialog.setDialogPane(dialogPane);

            Optional<ButtonType> result = dialog.showAndWait();
            if (result.isPresent() && result.get() == ButtonType.OK) {
                TacheFocus t = controller.getTache(selectedTache.getIdTache());
                if (t != null) {
                    tacheController.modifierTache(t);
                    loadTaches();
                    showSuccess("✓ Tâche modifiée avec succès !");
                }
            }
        } catch (IOException e) {
            e.printStackTrace();
        }
    }

    // ===== SUPPRIMER =====
    @FXML
    private void handleSupprimer() {
        if (selectedTache == null) {
            showError("❌ Sélectionnez une tâche d'abord !");
            return;
        }
        Alert confirm = new Alert(Alert.AlertType.CONFIRMATION);
        confirm.setTitle("Confirmation");
        confirm.setHeaderText("Supprimer la tâche ?");
        confirm.setContentText("\"" + selectedTache.getTitre() + "\"");
        Optional<ButtonType> result = confirm.showAndWait();
        if (result.isPresent() && result.get() == ButtonType.OK) {
            tacheController.supprimerTache(selectedTache.getIdTache());
            loadTaches();
            showSuccess("✓ Tâche supprimée !");
        }
    }

    // ===== SUGGESTION =====
    @FXML
    private void handleSuggerer() {
        if (selectedTache == null) { showError("❌ Sélectionnez une tâche d'abord !"); return; }
        List<SousTache> suggestions = suggestionService.suggererSousTaches(
                selectedTache.getIdTache(), selectedTache.getTitre());
        Alert alert = new Alert(Alert.AlertType.CONFIRMATION);
        alert.setTitle("Suggestions");
        alert.setHeaderText("💡 " + suggestions.size() + " sous-tâches suggérées pour:\n" + selectedTache.getTitre());
        StringBuilder sb = new StringBuilder();
        for (SousTache st : suggestions)
            sb.append("✓ ").append(st.getDescription()).append(" (").append(st.getDureeRecommandee()).append(" min)\n");
        alert.setContentText(sb.toString());
        Optional<ButtonType> result = alert.showAndWait();
        if (result.isPresent() && result.get() == ButtonType.OK) {
            for (SousTache st : suggestions) sousTacheController.ajouterSousTache(st);
            showSuccess("✓ " + suggestions.size() + " sous-tâches ajoutées !");
        }
    }

    // ===== OPENAI IA =====
    @FXML
    private void handleAnalyserIA() {
        if (selectedTache == null) { showError("❌ Sélectionnez une tâche d'abord !"); return; }
        showSuccess("⏳ Analyse IA en cours...");
        new Thread(() -> {
            List<String> sousTachesIA = openAIService.genererSousTachesIA(
                    selectedTache.getTitre(), selectedTache.getObjectifPrincipal());
            javafx.application.Platform.runLater(() -> {
                Alert alert = new Alert(Alert.AlertType.CONFIRMATION);
                alert.setTitle("🤖 Analyse IA — OpenAI");
                alert.setHeaderText("Plan de travail généré par IA pour :\n\"" + selectedTache.getTitre() + "\"");
                StringBuilder sb = new StringBuilder();
                for (int i = 0; i < sousTachesIA.size(); i++)
                    sb.append(i + 1).append(". ").append(sousTachesIA.get(i)).append("\n");
                alert.setContentText(sb.toString());
                Optional<ButtonType> result = alert.showAndWait();
                if (result.isPresent() && result.get() == ButtonType.OK) {
                    for (String desc : sousTachesIA) {
                        SousTache st = new SousTache(0, selectedTache.getIdTache(), desc, 30, "Non commencée", null, null, 1);
                        sousTacheController.ajouterSousTache(st);
                    }
                    showSuccess("✓ " + sousTachesIA.size() + " sous-tâches IA ajoutées !");
                } else errorLabel.setText("");
            });
        }).start();
    }

    @FXML
    private void handleRefresh() {
        loadTaches();
        showSuccess("✓ Liste actualisée !");
    }

    @FXML
    private void handleRetour() {
        try {
            Stage stage = (Stage) tacheTable.getScene().getWindow();
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/menu-view.fxml"));
            Parent root = loader.load();
            stage.setScene(new Scene(root));
        } catch (IOException e) { e.printStackTrace(); }
    }

    private void showError(String msg) {
        errorLabel.setText(msg);
        errorLabel.setStyle("-fx-text-fill: #e74c3c; -fx-font-weight: bold;");
    }

    private void showSuccess(String msg) {
        errorLabel.setText(msg);
        errorLabel.setStyle("-fx-text-fill: #27ae60; -fx-font-weight: bold;");
    }
}