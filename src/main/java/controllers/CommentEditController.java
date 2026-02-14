package controllers;

import javafx.fxml.FXML;
import javafx.scene.control.Alert;
import javafx.scene.control.TextField;
import org.example.SceneManager;
import org.example.entities.comment;
import org.example.services.commentServices;

import java.util.List;

public class CommentEditController {
    @FXML private TextField commentIdField;
    @FXML private TextField postIdField;
    @FXML private TextField userIdField;
    @FXML private TextField commentField;

    private final commentServices commentServices = new commentServices();

    @FXML
    public void initialize() {
        postIdField.setText(String.valueOf(PostContext.getPostId()));
    }

    @FXML
    private void editComment() {
        try {
            int id = Integer.parseInt(commentIdField.getText());
            comment existing = findCommentById(id);
            if (existing == null) {
                showAlert(Alert.AlertType.ERROR, "Comment introuvable");
                return;
            }

            comment updated = new comment(
                    commentField.getText(),
                    existing.getLikes(),
                    existing.getDislikes(),
                    Integer.parseInt(userIdField.getText()),
                    Integer.parseInt(postIdField.getText())
            );
            updated.setComment_id(id);
            commentServices.modifier_comment(updated);
            showAlert(Alert.AlertType.INFORMATION, "modification avec succes!");
        } catch (Exception e) {
            showAlert(Alert.AlertType.ERROR, e.getMessage());
        }
    }

    private comment findCommentById(int id) throws Exception {
        List<comment> comments = commentServices.afficher_comment();
        for (comment c : comments) {
            if (c.getComment_id() == id) return c;
        }
        return null;
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