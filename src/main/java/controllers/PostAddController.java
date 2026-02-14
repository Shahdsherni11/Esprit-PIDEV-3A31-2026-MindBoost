package controllers;

import javafx.fxml.FXML;
import javafx.scene.control.Alert;
import javafx.scene.control.TextField;
import org.example.SceneManager;
import org.example.entities.post;
import org.example.services.postServices;

public class PostAddController {
    @FXML private TextField contentField;
    @FXML private TextField titleField;
    @FXML private TextField tagField;
    @FXML private TextField imageField;
    @FXML private TextField userIdField;

    private final postServices postServices = new postServices();

    @FXML
    private void addPost() {
        try {
            post post = new post(
                    contentField.getText(),
                    titleField.getText(),
                    tagField.getText(),
                    imageField.getText(),
                    0,0,0,
                    Integer.parseInt(userIdField.getText()),
                    0
            );
            postServices.ajouter_post(post);
            showAlert(Alert.AlertType.INFORMATION, "post ajoutée avec succes!");
        } catch (Exception e) {
            showAlert(Alert.AlertType.ERROR, e.getMessage());
        }
    }

    @FXML
    private void goBack() throws Exception {
        SceneManager.switchTo("PostsMenu.fxml");
    }

    private void showAlert(Alert.AlertType type, String msg) {
        Alert alert = new Alert(type);
        alert.setContentText(msg);
        alert.showAndWait();
    }
}