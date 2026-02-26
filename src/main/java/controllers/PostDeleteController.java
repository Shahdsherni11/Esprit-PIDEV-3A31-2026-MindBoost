package controllers;

import javafx.fxml.FXML;
import javafx.scene.control.Alert;
import javafx.scene.control.Label;
import javafx.scene.control.TextField;
import org.example.SceneManager;
import org.example.services.postServices;

public class PostDeleteController {
    @FXML private TextField postIdField;
    @FXML private Label postIdError;

    private final postServices postServices = new postServices();

    @FXML
    private void deletePost() {
        if (!validate()) return;

        try {
            postServices.supprimer_post(Integer.parseInt(postIdField.getText().trim()));
            showAlert(Alert.AlertType.INFORMATION, "suppresion post avec succes!");
        } catch (Exception e) {
            showAlert(Alert.AlertType.ERROR, e.getMessage());
        }
    }

    @FXML
    private void goBack() throws Exception {
        SceneManager.switchTo("PostsMenu.fxml");
    }

    private boolean validate() {
        postIdError.setText("");
        String postId = postIdField.getText().trim();

        if (postId.isEmpty() || !postId.matches("\\d+") || Integer.parseInt(postId) <= 0) {
            postIdError.setText("Post ID invalide.");
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