package controllers;

import javafx.fxml.FXML;
import javafx.scene.control.Alert;
import javafx.scene.control.Label;
import javafx.scene.control.TextField;
import org.example.SceneManager;
import org.example.services.acheivementsServices;

public class AcheivementDeleteController {
    @FXML private TextField idField;
    @FXML private Label idError;

    private final acheivementsServices acheivementsServices = new acheivementsServices();

    @FXML
    private void deleteAcheivement() {
        if (!validate()) return;

        try {
            acheivementsServices.supprimer_acheivement(Integer.parseInt(idField.getText().trim()));
            showAlert(Alert.AlertType.INFORMATION, "suppresion avec succes!");
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
        String id = idField.getText().trim();

        if (id.isEmpty() || !id.matches("\\d+") || Integer.parseInt(id) <= 0) {
            idError.setText("ID invalide.");
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