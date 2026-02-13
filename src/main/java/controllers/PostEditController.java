package controllers;

import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.scene.control.Alert;
import javafx.scene.control.TextField;
import javafx.fxml.FXMLLoader;
import javafx.scene.Node;
import javafx.scene.Scene;
import javafx.stage.Stage;
import org.example.entities.post;
import org.example.services.postServices;

import java.util.List;

public class PostEditController {

    @FXML private TextField postIdField;
    @FXML private TextField contentField;
    @FXML private TextField titleField;
    @FXML private TextField tagField;
    @FXML private TextField imageField;
    @FXML private TextField userIdField;

    private final postServices postServices = new postServices();

    @FXML
    private void editPost() {
        try {
            int id = Integer.parseInt(postIdField.getText());
            post existing = findPostById(id);
            if (existing == null) {
                showAlert(Alert.AlertType.ERROR, "Post introuvable");
                return;
            }

            post updated = new post(
                    contentField.getText(),
                    titleField.getText(),
                    tagField.getText(),
                    imageField.getText(),
                    existing.getPost_likes(),
                    existing.getPost_dislikes(),
                    existing.getHelp_meter(),
                    Integer.parseInt(userIdField.getText()),
                    existing.getAcheivement_id()
            );
            updated.setPost_id(id);
            postServices.modifier_post(updated);
            showAlert(Alert.AlertType.INFORMATION, "modification avec succes!");
        } catch (Exception e) {
            showAlert(Alert.AlertType.ERROR, e.getMessage());
        }
    }

    private post findPostById(int id) throws Exception {
        List<post> posts = postServices.afficher_post();
        for (post p : posts) {
            if (p.getPost_id() == id) return p;
        }
        return null;
    }

    @FXML
    private void goBack(ActionEvent event) throws Exception {
        switchScene(event, "PostsMenu.fxml");
    }

    private void switchScene(ActionEvent event, String fxml) throws Exception {
        FXMLLoader loader = new FXMLLoader(getClass().getResource("/" + fxml));
        Scene scene = new Scene(loader.load());
        Stage stage = (Stage)((Node)event.getSource()).getScene().getWindow();
        stage.setScene(scene);
        stage.show();
    }

    private void showAlert(Alert.AlertType type, String msg) {
        Alert alert = new Alert(type);
        alert.setContentText(msg);
        alert.showAndWait();
    }
}