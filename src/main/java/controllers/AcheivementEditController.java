package controllers;

import javafx.fxml.FXML;
import javafx.scene.control.Alert;
import javafx.scene.control.Label;
import javafx.scene.control.TextField;
import org.example.SceneManager;
import org.example.entities.acheivements;
import org.example.services.acheivementsServices;

public class AcheivementEditController {
    @FXML private TextField idField;
    @FXML private TextField nameField;
    @FXML private TextField scoreField;

    @FXML private Label idError;
    @FXML private Label nameError;
    @FXML private Label scoreError;

    private final acheivementsServices acheivementsServices = new acheivementsServices();

    @FXML
    private void editAcheivement() {
        if (!validate()) return;

        try {
            acheivements a = new acheivements();
            a.setAcheivement_id(Integer.parseInt(idField.getText().trim()));
            a.setAcheivement_name(nameField.getText().trim());
            a.setAcheivement_score(Integer.parseInt(scoreField.getText().trim()));

            acheivementsServices.modifier_acheivement(a);
            showAlert(Alert.AlertType.INFORMATION, "modification avec succes!");
        } catch (Exception e) {
            showAlert(Alert.AlertType.ERROR, e.getMessage());
        }
    }

    @FXML
    private void goBack() throws Exception {
        SceneManager.switchTo("AcheivementsMenu.fxml");
    }

    private boolean validate() {
        idError.setText("");
        nameError.setText("");
        scoreError.setText("");

        String id = idField.getText().trim();
        String name = nameField.getText().trim();
        String score = scoreField.getText().trim();

        if (id.isEmpty() || !id.matches("\\d+") || Integer.parseInt(id) <= 0) {
            idError.setText("ID invalide.");
            return false;
        }

        if (name.isEmpty()) { nameError.setText("Name obligatoire."); return false; }
        if (name.length() > 100) { nameError.setText("Max 100 caractères."); return false; }

        if (score.isEmpty() || !score.matches("\\d+") || Integer.parseInt(score) <= 0) {
            scoreError.setText("Score invalide.");
            return false;
        }

        return true;
    }

    private void showAlert(Alert.AlertType type, String msg) {
        Alert alert = new Alert(type);
        alert.setContentText(msg);
        alert.showAndWait();
    }
}