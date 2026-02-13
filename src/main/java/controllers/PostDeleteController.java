package controllers;

import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.scene.control.Alert;
import javafx.scene.control.TextField;
import javafx.fxml.FXMLLoader;
import javafx.scene.Node;
import javafx.scene.Scene;
import javafx.stage.Stage;
import org.example.services.postServices;

public class PostDeleteController {

    @FXML private TextField postIdField;
    private final postServices postServices = new postServices();

    @FXML
    private void deletePost() {
        try {
            postServices.supprimer_post(Integer.parseInt(postIdField.getText()));
            showAlert(Alert.AlertType.INFORMATION, "suppresion post avec succes!");
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