package controllers;

import javafx.fxml.FXML;
import javafx.scene.control.Alert;
import javafx.scene.control.Label;
import javafx.scene.control.TextField;
import org.example.SceneManager;
import org.example.services.commentServices;

public class CommentDeleteController {
    @FXML private TextField commentIdField;
    @FXML private Label commentIdError;

    private final commentServices commentServices = new commentServices();

    @FXML
    private void deleteComment() {
        if (!validate()) return;

        try {
            commentServices.supprimer_comment(Integer.parseInt(commentIdField.getText().trim()));
            showAlert(Alert.AlertType.INFORMATION, "suppresion avec succes!");
        } catch (Exception e) {
            showAlert(Alert.AlertType.ERROR, e.getMessage());
        }
    }

    @FXML
    private void goBack() throws Exception {
        SceneManager.switchTo("PostList.fxml");
    }

    private boolean validate() {
        commentIdError.setText("");
        String id = commentIdField.getText().trim();

        if (id.isEmpty() || !id.matches("\\d+") || Integer.parseInt(id) <= 0) {
            commentIdError.setText("Comment ID invalide.");
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