package controllers;

import javafx.fxml.FXML;
import javafx.scene.control.Alert;
import javafx.scene.control.Label;
import javafx.scene.control.TextField;
import org.example.SceneManager;
import org.example.services.savesServices;

public class SavesDeleteController {
    @FXML private TextField postIdField;
    @FXML private TextField userIdField;

    @FXML private Label postIdError;
    @FXML private Label userIdError;

    private final savesServices savesServices = new savesServices();

    @FXML
    private void deleteSave() {
        if (!validate()) return;

        try {
            savesServices.supprimer_saves(
                    Integer.parseInt(postIdField.getText().trim()),
                    Integer.parseInt(userIdField.getText().trim())
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

    private boolean validate() {
        postIdError.setText("");
        userIdError.setText("");

        String postId = postIdField.getText().trim();
        String userId = userIdField.getText().trim();

        if (postId.isEmpty() || !postId.matches("\\d+") || Integer.parseInt(postId) <= 0) {
            postIdError.setText("Post ID invalide.");
            return false;
        }
        if (userId.isEmpty() || !userId.matches("\\d+") || Integer.parseInt(userId) <= 0) {
            userIdError.setText("User ID invalide.");
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