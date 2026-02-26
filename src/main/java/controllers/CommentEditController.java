package controllers;

import javafx.fxml.FXML;
import javafx.scene.control.Alert;
import javafx.scene.control.Label;
import javafx.scene.control.TextField;
import org.example.SceneManager;
import org.example.entities.comment;
import org.example.services.commentServices;

public class CommentEditController {
    @FXML private TextField commentIdField;
    @FXML private TextField postIdField;
    @FXML private TextField userIdField;
    @FXML private TextField commentField;

    @FXML private Label commentIdError;
    @FXML private Label postIdError;
    @FXML private Label userIdError;
    @FXML private Label commentError;

    private final commentServices commentServices = new commentServices();

    @FXML
    private void editComment() {
        if (!validate()) return;

        try {
            comment c = new comment();
            c.setComment_id(Integer.parseInt(commentIdField.getText().trim()));
            c.setPost_id(Integer.parseInt(postIdField.getText().trim()));
            c.setUser_id(Integer.parseInt(userIdField.getText().trim()));
            c.setComment(commentField.getText().trim());

            commentServices.modifier_comment(c);
            showAlert(Alert.AlertType.INFORMATION, "modification avec succes!");
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
        postIdError.setText("");
        userIdError.setText("");
        commentError.setText("");

        String commentId = commentIdField.getText().trim();
        String postId = postIdField.getText().trim();
        String userId = userIdField.getText().trim();
        String comment = commentField.getText().trim();

        if (commentId.isEmpty() || !commentId.matches("\\d+") || Integer.parseInt(commentId) <= 0) {
            commentIdError.setText("Comment ID invalide.");
            return false;
        }
        if (postId.isEmpty() || !postId.matches("\\d+") || Integer.parseInt(postId) <= 0) {
            postIdError.setText("Post ID invalide.");
            return false;
        }
        if (userId.isEmpty() || !userId.matches("\\d+") || Integer.parseInt(userId) <= 0) {
            userIdError.setText("User ID invalide.");
            return false;
        }
        if (comment.isEmpty()) { commentError.setText("Comment obligatoire."); return false; }
        if (comment.length() > 300) { commentError.setText("Max 300 caractères."); return false; }

        return true;
    }

    private void showAlert(Alert.AlertType type, String msg) {
        Alert alert = new Alert(type);
        alert.setContentText(msg);
        alert.showAndWait();
    }
}