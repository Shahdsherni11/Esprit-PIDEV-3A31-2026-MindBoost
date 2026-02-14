package controllers;

import javafx.fxml.FXML;
import javafx.scene.control.Alert;
import javafx.scene.control.TextField;
import org.example.SceneManager;
import org.example.entities.saves;
import org.example.services.savesServices;

public class SavesAddController {
    @FXML private TextField descField;
    @FXML private TextField postIdField;
    @FXML private TextField userIdField;

    private final savesServices savesServices = new savesServices();

    @FXML
    private void addSave() {
        try {
            saves s = new saves(descField.getText(), Integer.parseInt(postIdField.getText()), Integer.parseInt(userIdField.getText()));
            savesServices.ajouter_saves(s);
            showAlert(Alert.AlertType.INFORMATION, "saves ajoutée avec succes!");
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