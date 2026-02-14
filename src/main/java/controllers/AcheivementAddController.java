package controllers;

import javafx.fxml.FXML;
import javafx.scene.control.*;
import org.example.SceneManager;
import org.example.entities.acheivements;
import org.example.services.acheivementsServices;

public class AcheivementAddController {
    @FXML private TextField nameField;
    @FXML private TextField scoreField;

    private final acheivementsServices acheivementsServices = new acheivementsServices();

    @FXML
    private void addAcheivement() {
        try {
            acheivements a = new acheivements(nameField.getText(), Integer.parseInt(scoreField.getText()));
            acheivementsServices.ajouter_acheivement(a);
            showAlert(Alert.AlertType.INFORMATION, "acheivement ajoutée avec succes!");
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
