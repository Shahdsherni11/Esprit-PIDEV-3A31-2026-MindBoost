package controllers;

import javafx.fxml.FXML;
import javafx.scene.control.Alert;
import javafx.scene.control.TextField;
import org.example.SceneManager;
import org.example.entities.comment;
import org.example.services.commentServices;

public class CommentAddController {
    @FXML private TextField postIdField;
    @FXML private TextField userIdField;
    @FXML private TextField commentField;

    private final commentServices commentServices = new commentServices();

    @FXML
    public void initialize() {
        postIdField.setText(String.valueOf(PostContext.getPostId()));
    }

    @FXML
    private void addComment() {
        try {
            comment c = new comment(
                    commentField.getText(),
                    0,0,
                    Integer.parseInt(userIdField.getText()),
                    Integer.parseInt(postIdField.getText())
            );
            commentServices.ajouter_comment(c);
            showAlert(Alert.AlertType.INFORMATION, "comment ajoutée avec succes!");
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