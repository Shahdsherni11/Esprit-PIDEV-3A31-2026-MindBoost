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