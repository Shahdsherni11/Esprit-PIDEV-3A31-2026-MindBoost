package controllers;

import javafx.fxml.FXML;
import javafx.scene.control.*;
import org.example.SceneManager;
import org.example.services.acheivementsServices;

public class AcheivementDeleteController {
    @FXML private TextField idField;
    private final acheivementsServices acheivementsServices = new acheivementsServices();

    @FXML
    private void deleteAcheivement() {
        try {
            acheivementsServices.supprimer_acheivement(Integer.parseInt(idField.getText()));
            showAlert(Alert.AlertType.INFORMATION, "suppresion avec succes!");
        } catch (Exception e) {
            showAlert(Alert.AlertType.ERROR, e.getMessage());
        }
    }

    @FXML
    private void goBack() throws Exception {
        SceneManager.switchTo("AcheivementsMenu.fxml");
    }

    private void showAlert(Alert.AlertType type, String msg) {
        Alert alert = new Alert(type);
        alert.setContentText(msg);
        alert.showAndWait();
    }
}