package controllers;


import javafx.fxml.FXML;
import javafx.scene.control.Alert;
import javafx.scene.control.TextField;
import org.example.SceneManager;
import org.example.services.commentServices;

public class CommentDeleteController {
    @FXML private TextField commentIdField;
    private final commentServices commentServices = new commentServices();

    @FXML
    private void deleteComment() {
        try {
            commentServices.supprimer_comment(Integer.parseInt(commentIdField.getText()));
            showAlert(Alert.AlertType.INFORMATION, "suppresion avec succes!");
        } catch (Exception e) {
            showAlert(Alert.AlertType.ERROR, e.getMessage());
        }
    }

    @FXML
    private void goBack() throws Exception {
        SceneManager.switchTo("PostList.fxml");
    }

    private void showAlert(Alert.AlertType type, String msg) {
        Alert alert = new Alert(type);
        alert.setContentText(msg);
        alert.showAndWait();
    }
}