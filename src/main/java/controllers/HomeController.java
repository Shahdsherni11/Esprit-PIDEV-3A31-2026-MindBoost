package controllers;

import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.scene.Node;
import javafx.scene.Scene;
import javafx.stage.Stage;

public class HomeController {

    @FXML
    private void goToPosts(ActionEvent event) throws Exception {
        switchScene(event, "PostsMenu.fxml");
    }

    @FXML
    private void goToAcheivements(ActionEvent event) throws Exception {
        switchScene(event, "AcheivementsMenu.fxml");
    }

    @FXML
    private void goToSaves(ActionEvent event) throws Exception {
        switchScene(event, "SavesMenu.fxml");
    }

    private void switchScene(ActionEvent event, String fxml) throws Exception {
        FXMLLoader loader = new FXMLLoader(getClass().getResource("/" + fxml));
        Scene scene = new Scene(loader.load());
        Stage stage = (Stage)((Node)event.getSource()).getScene().getWindow();
        stage.setScene(scene);
        stage.show();
    }
}