package controllers;

import javafx.fxml.FXML;
import javafx.scene.control.Alert;
import javafx.scene.control.TextField;
import org.example.SceneManager;
import org.example.services.savesServices;

public class SavesDeleteController {
    @FXML private TextField postIdField;
    @FXML private TextField userIdField;
    private final savesServices savesServices = new savesServices();

    @FXML
    private void deleteSave() {
        try {
            savesServices.supprimer_saves(
                    Integer.parseInt(postIdField.getText()),
                    Integer.parseInt(userIdField.getText())
            );
            showAlert(Alert.AlertType.INFORMATION, "suppresion avec succes!");
        } catch (Exception e) {
            showAlert(Alert.AlertType.ERROR, e.getMessage());
        }
    }

    @FXML
    private void goBack() throws Exception {
        SceneManager.switchTo("SavesMenu.fxml");
    }

    private void showAlert(Alert.AlertType type, String msg) {
        Alert alert = new Alert(type);
        alert.setContentText(msg);
        alert.showAndWait();
    }
}