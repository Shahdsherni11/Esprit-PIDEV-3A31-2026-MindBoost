package org.example.view;

import javafx.collections.FXCollections;
import javafx.fxml.FXML;
import javafx.scene.control.*;
import org.example.model.TacheFocus;

import java.time.LocalTime;

public class TacheFormDialogController {

    @FXML private TextField titreField;
    @FXML private TextArea objectifArea;
    @FXML private Spinner<Integer> difficulteSpinner;
    @FXML private ComboBox<String> statutComboBox;
    @FXML private Spinner<Integer> scoreSpinner;
    @FXML private TextField userIdField;
    @FXML private TextField heureDebutField;
    @FXML private TextField heureFinField;
    @FXML private Spinner<Integer> prioriteSpinner;
    @FXML private Label errorLabel;

    @FXML
    public void initialize() {
        difficulteSpinner.setValueFactory(new SpinnerValueFactory.IntegerSpinnerValueFactory(1, 5, 1));
        scoreSpinner.setValueFactory(new SpinnerValueFactory.IntegerSpinnerValueFactory(0, 100, 0));
        prioriteSpinner.setValueFactory(new SpinnerValueFactory.IntegerSpinnerValueFactory(1, 5, 1));
        statutComboBox.setItems(FXCollections.observableArrayList(
                "Non commencée", "En cours", "Terminée", "En pause", "Annulée"
        ));
    }

    // Remplir le formulaire pour modification
    public void setTache(TacheFocus t) {
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

    // Valider et retourner la tâche
    public TacheFocus getTache(int idExistant) {
        if (titreField.getText().isEmpty()) {
            errorLabel.setText("❌ Titre obligatoire !");
            return null;
        }
        if (statutComboBox.getValue() == null) {
            errorLabel.setText("❌ Statut obligatoire !");
            return null;
        }

        LocalTime debut = null, fin = null;
        try {
            if (!heureDebutField.getText().isEmpty()) debut = LocalTime.parse(heureDebutField.getText());
            if (!heureFinField.getText().isEmpty()) fin = LocalTime.parse(heureFinField.getText());
        } catch (Exception e) {
            errorLabel.setText("❌ Format heure invalide (HH:MM:SS)");
            return null;
        }

        int userId = 0;
        try {
            if (!userIdField.getText().isEmpty()) userId = Integer.parseInt(userIdField.getText());
        } catch (NumberFormatException e) {
            errorLabel.setText("❌ ID utilisateur invalide");
            return null;
        }

        return new TacheFocus(
                idExistant,
                titreField.getText(),
                objectifArea.getText(),
                difficulteSpinner.getValue(),
                statutComboBox.getValue(),
                scoreSpinner.getValue(),
                userId,
                debut, fin,
                prioriteSpinner.getValue()
        );
    }
}