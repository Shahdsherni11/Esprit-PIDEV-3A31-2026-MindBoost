package controllers;

import javafx.fxml.FXML;
import javafx.scene.control.Alert;
import javafx.scene.control.Label;
import javafx.scene.control.TextField;
import org.example.SceneManager;
import org.example.entities.post;
import org.example.services.postServices;

public class PostEditController {
    @FXML private TextField postIdField;
    @FXML private TextField contentField;
    @FXML private TextField titleField;
    @FXML private TextField tagField;
    @FXML private TextField imageField;
    @FXML private TextField userIdField;

    @FXML private Label postIdError;
    @FXML private Label contentError;
    @FXML private Label titleError;
    @FXML private Label tagError;
    @FXML private Label imageError;
    @FXML private Label userIdError;

    private final postServices postServices = new postServices();

    @FXML
    private void editPost() {
        if (!validate()) return;

        try {
            post p = new post();
            p.setPost_id(Integer.parseInt(postIdField.getText().trim()));
            p.setContent(contentField.getText().trim());
            p.setTitle(titleField.getText().trim());
            p.setTag(tagField.getText().trim());
            p.setImage_url(imageField.getText().trim());
            p.setUser_id(Integer.parseInt(userIdField.getText().trim()));

            postServices.modifier_post(p);
            showAlert(Alert.AlertType.INFORMATION, "modification avec succes!");
        } catch (Exception e) {
            showAlert(Alert.AlertType.ERROR, e.getMessage());
        }
    }

    @FXML
    private void goBack() throws Exception {
        SceneManager.switchTo("PostsMenu.fxml");
    }

    private boolean validate() {
        boolean valid = true;

        postIdError.setText("");
        contentError.setText("");
        titleError.setText("");
        tagError.setText("");
        imageError.setText("");
        userIdError.setText("");

        String postId = postIdField.getText().trim();
        String content = contentField.getText().trim();
        String title = titleField.getText().trim();
        String tag = tagField.getText().trim();
        String image = imageField.getText().trim();
        String userId = userIdField.getText().trim();

        if (postId.isEmpty() || !postId.matches("\\d+") || Integer.parseInt(postId) <= 0) {
            postIdError.setText("Post ID invalide.");
            valid = false;
        }

        if (content.isEmpty()) { contentError.setText("Content obligatoire."); valid = false; }
        else if (content.length() > 500) { contentError.setText("Max 500 caractères."); valid = false; }

        if (title.isEmpty()) { titleError.setText("Title obligatoire."); valid = false; }
        else if (title.length() > 100) { titleError.setText("Max 100 caractères."); valid = false; }

        if (tag.isEmpty()) { tagError.setText("Tag obligatoire."); valid = false; }
        else if (tag.length() > 50) { tagError.setText("Max 50 caractères."); valid = false; }

        if (image.isEmpty()) { imageError.setText("Image URL obligatoire."); valid = false; }
        else if (image.length() > 255) { imageError.setText("Max 255 caractères."); valid = false; }

        if (userId.isEmpty() || !userId.matches("\\d+") || Integer.parseInt(userId) <= 0) {
            userIdError.setText("User ID invalide.");
            valid = false;
        }

        return valid;
    }

    private void showAlert(Alert.AlertType type, String msg) {
        Alert alert = new Alert(type);
        alert.setContentText(msg);
        alert.showAndWait();
    }
}