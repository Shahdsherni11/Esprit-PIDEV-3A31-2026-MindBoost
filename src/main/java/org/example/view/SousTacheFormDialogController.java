package org.example.view;

import javafx.collections.FXCollections;
import javafx.fxml.FXML;
import javafx.scene.control.*;
import org.example.controller.TacheFocusController;
import org.example.model.SousTache;
import org.example.model.TacheFocus;

import java.time.LocalTime;
import java.util.List;

public class SousTacheFormDialogController {

    @FXML private ComboBox<TacheFocus> tacheParentComboBox;
    @FXML private TextField descriptionField;
    @FXML private Spinner<Integer> dureeSpinner;
    @FXML private ComboBox<String> etatComboBox;
    @FXML private TextField heureDebutField;
    @FXML private TextField heureFinField;
    @FXML private Spinner<Integer> prioriteSpinner;
    @FXML private Label errorLabel;

    private TacheFocusController tacheController = new TacheFocusController();

    @FXML
    public void initialize() {
        dureeSpinner.setValueFactory(new SpinnerValueFactory.IntegerSpinnerValueFactory(5, 480, 30));
        prioriteSpinner.setValueFactory(new SpinnerValueFactory.IntegerSpinnerValueFactory(1, 5, 1));
        etatComboBox.setItems(FXCollections.observableArrayList(
                "À faire", "En cours", "Terminée", "Bloquée"
        ));
        // Charger les tâches parentes
        List<TacheFocus> taches = tacheController.getAllTaches();
        tacheParentComboBox.setItems(FXCollections.observableArrayList(taches));
    }

    // Pré-remplir pour modification
    public void setSousTache(SousTache st) {
        descriptionField.setText(st.getDescription());
        TacheFocus parent = tacheController.getTacheById(st.getIdTache());
        tacheParentComboBox.setValue(parent);
        dureeSpinner.getValueFactory().setValue(st.getDureeRecommandee());
        etatComboBox.setValue(st.getEtat());
        heureDebutField.setText(st.getHeureDebut() != null ? st.getHeureDebut().toString() : "");
        heureFinField.setText(st.getHeureFin() != null ? st.getHeureFin().toString() : "");
        prioriteSpinner.getValueFactory().setValue(st.getPriorite());
    }

    // Valider et retourner la sous-tâche
    public SousTache getSousTache(int idExistant) {
        if (descriptionField.getText().isEmpty()) {
            errorLabel.setText("❌ Description obligatoire !");
            return null;
        }
        if (tacheParentComboBox.getValue() == null) {
            errorLabel.setText("❌ Tâche parente obligatoire !");
            return null;
        }
        if (etatComboBox.getValue() == null) {
            errorLabel.setText("❌ État obligatoire !");
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

        SousTache st = new SousTache();
        st.setIdSousTache(idExistant);
        st.setIdTache(tacheParentComboBox.getValue().getIdTache());
        st.setDescription(descriptionField.getText());
        st.setDureeRecommandee(dureeSpinner.getValue());
        st.setEtat(etatComboBox.getValue());
        st.setHeureDebut(debut);
        st.setHeureFin(fin);
        st.setPriorite(prioriteSpinner.getValue());
        return st;
    }
}