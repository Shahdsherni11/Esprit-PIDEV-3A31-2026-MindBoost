package org.example.view;

import org.example.service.SuggestionService;
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

    // ================= UI =================
    @FXML private TextField titreField;
    @FXML private TextArea objectifArea;
    @FXML private Spinner<Integer> difficulteSpinner;
    @FXML private ComboBox<String> statutComboBox;
    @FXML private Spinner<Integer> scoreSpinner;
    @FXML private TextField userIdField;
    @FXML private TextField heureDebutField;
    @FXML private TextField heureFinField;
    @FXML private Spinner<Integer> prioriteSpinner;
    @FXML private TableView<TacheFocus> tacheTable;

    @FXML private TableColumn<TacheFocus, Integer> idCol;
    @FXML private TableColumn<TacheFocus, String> titreCol;
    @FXML private TableColumn<TacheFocus, String> objectifCol;
    @FXML private TableColumn<TacheFocus, Integer> difficulteCol;
    @FXML private TableColumn<TacheFocus, String> statutCol;
    @FXML private TableColumn<TacheFocus, Integer> scoreCol;
    @FXML private TableColumn<TacheFocus, LocalTime> debutCol;
    @FXML private TableColumn<TacheFocus, LocalTime> finCol;

    @FXML private Label errorLabel;
    @FXML private Label totalLabel;

    // ================= BUSINESS =================  ← ICI les variables, pas dans initialize()
    private TacheFocusController tacheController = new TacheFocusController();
    private SuggestionService suggestionService = new SuggestionService();
    private SousTacheController sousTacheController = new SousTacheController();

    private TacheFocus selectedTache;

    // ================= INIT =================
    @FXML
    public void initialize() {
        // Configure spinners
        difficulteSpinner.setValueFactory(new SpinnerValueFactory.IntegerSpinnerValueFactory(1, 5, 1));
        scoreSpinner.setValueFactory(new SpinnerValueFactory.IntegerSpinnerValueFactory(0, 100, 0));
        prioriteSpinner.setValueFactory(new SpinnerValueFactory.IntegerSpinnerValueFactory(1, 5, 1));

        // Configure statut combo box
        statutComboBox.setItems(FXCollections.observableArrayList(
                "Non commencée", "En cours", "Terminée", "En pause", "Annulée"
        ));

        // Table columns
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
                (obs, oldVal, newVal) -> fillForm(newVal)
        );
    }

    // ================= LOAD DATA =================
    private void loadTaches() {
        List<TacheFocus> taches = tacheController.getAllTaches();
        tacheTable.setItems(FXCollections.observableArrayList(taches));
        totalLabel.setText(String.format("Total: %d tâches", taches.size()));
    }

    // ================= VALIDATION =================
    private boolean validateInput() {
        errorLabel.setText("");

        if (titreField.getText().isEmpty()) {
            errorLabel.setText("Titre obligatoire");
            return false;
        }

        if (statutComboBox.getValue() == null) {
            errorLabel.setText("Statut obligatoire");
            return false;
        }

        return true;
    }

    // ================= ACTIONS =================
    @FXML
    private void handleAjouter() {

        if (!validateInput()) return;

        LocalTime debut = null;
        LocalTime fin = null;

        try {
            if (!heureDebutField.getText().isEmpty()) debut = LocalTime.parse(heureDebutField.getText());
            if (!heureFinField.getText().isEmpty()) fin = LocalTime.parse(heureFinField.getText());
        } catch (Exception e) {
            errorLabel.setText("Format d'heure invalide (HH:MM:SS)");
            return;
        }

        int userId = 0;
        try {
            if (!userIdField.getText().isEmpty()) userId = Integer.parseInt(userIdField.getText());
        } catch (NumberFormatException e) {
            errorLabel.setText("ID utilisateur invalide");
            return;
        }

        TacheFocus t = new TacheFocus(
                0,
                titreField.getText(),
                objectifArea.getText(),
                difficulteSpinner.getValue(),
                statutComboBox.getValue(),
                scoreSpinner.getValue(),
                userId,
                debut,
                fin,
                prioriteSpinner.getValue()
        );

        tacheController.ajouterTache(t);
        loadTaches();
        clearForm();
    }

    @FXML
    private void handleModifier() {

        if (selectedTache == null) return;
        if (!validateInput()) return;

        LocalTime debut = null;
        LocalTime fin = null;

        try {
            if (!heureDebutField.getText().isEmpty()) debut = LocalTime.parse(heureDebutField.getText());
            if (!heureFinField.getText().isEmpty()) fin = LocalTime.parse(heureFinField.getText());
        } catch (Exception e) {
            errorLabel.setText("Format d'heure invalide (HH:MM:SS)");
            return;
        }

        int userId = 0;
        try {
            if (!userIdField.getText().isEmpty()) userId = Integer.parseInt(userIdField.getText());
        } catch (NumberFormatException e) {
            errorLabel.setText("ID utilisateur invalide");
            return;
        }

        selectedTache.setTitre(titreField.getText());
        selectedTache.setObjectifPrincipal(objectifArea.getText());
        selectedTache.setNiveauDifficulte(difficulteSpinner.getValue());
        selectedTache.setStatut(statutComboBox.getValue());
        selectedTache.setScoreProductivite(scoreSpinner.getValue());
        selectedTache.setIdUser(userId);
        selectedTache.setHeureDebut(debut);
        selectedTache.setHeureFin(fin);
        selectedTache.setPriorite(prioriteSpinner.getValue());

        tacheController.modifierTache(selectedTache);
        loadTaches();
    }

    @FXML
    private void handleSupprimer() {
        if (selectedTache == null) return;
        tacheController.supprimerTache(selectedTache.getIdTache());
        loadTaches();
        clearForm();
    }

    @FXML
    private void handleRefresh() {
        loadTaches();
        errorLabel.setText("✓ Liste actualisée!");
        errorLabel.setStyle("-fx-text-fill: #27ae60; -fx-font-weight: bold;");
    }

    @FXML
    private void handleRetour() {
        try {
            Stage stage = (Stage) titreField.getScene().getWindow();
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/menu-view.fxml"));
            Parent root = loader.load();
            Scene scene = new Scene(root);
            stage.setScene(scene);
        } catch (IOException e) {
            e.printStackTrace();
            errorLabel.setText("❌ Erreur lors du retour au menu!");
        }
    }

    @FXML
    private void handleClear() {
        clearForm();
    }

    // ================= SUGGESTION =================
    @FXML
    private void handleSuggerer() {
        if (selectedTache == null) {
            errorLabel.setText("❌ Sélectionnez une tâche d'abord!");
            return;
        }

        List<SousTache> suggestions = suggestionService.suggererSousTaches(
                selectedTache.getIdTache(),
                selectedTache.getTitre()
        );

        Alert alert = new Alert(Alert.AlertType.CONFIRMATION);
        alert.setTitle("Suggestions");
        alert.setHeaderText("💡 " + suggestions.size() + " sous-tâches suggérées pour:\n" + selectedTache.getTitre());

        StringBuilder sb = new StringBuilder();
        for (SousTache st : suggestions) {
            sb.append("✓ ").append(st.getDescription())
                    .append(" (").append(st.getDureeRecommandee()).append(" min)\n");
        }
        alert.setContentText(sb.toString());

        Optional<ButtonType> result = alert.showAndWait();
        if (result.isPresent() && result.get() == ButtonType.OK) {
            for (SousTache st : suggestions) {
                sousTacheController.ajouterSousTache(st);
            }
            errorLabel.setText("✓ " + suggestions.size() + " sous-tâches ajoutées!");
            errorLabel.setStyle("-fx-text-fill: #27ae60; -fx-font-weight: bold;");
        }
    }

    // ================= UTIL =================
    private void fillForm(TacheFocus t) {
        if (t == null) return;

        selectedTache = t;
        titreField.setText(t.getTitre());
        objectifArea.setText(t.getObjectifPrincipal());
        difficulteSpinner.getValueFactory().setValue(t.getNiveauDifficulte());
        statutComboBox.setValue(t.getStatut());
        scoreSpinner.getValueFactory().setValue(t.getScoreProductivite());
        userIdField.setText(String.valueOf(t.getIdUser()));
        heureDebutField.setText(t.getHeureDebut() != null ? t.getHeureDebut().toString() : "");
        heureFinField.setText(t.getHeureFin() != null ? t.getHeureFin().toString() : "");
        prioriteSpinner.getValueFactory().setValue(t.getPriorite());
    }

    private void clearForm() {
        titreField.clear();
        objectifArea.clear();
        difficulteSpinner.getValueFactory().setValue(1);
        statutComboBox.setValue(null);
        scoreSpinner.getValueFactory().setValue(0);
        userIdField.clear();
        heureDebutField.clear();
        heureFinField.clear();
        prioriteSpinner.getValueFactory().setValue(1);
        selectedTache = null;
    }
}