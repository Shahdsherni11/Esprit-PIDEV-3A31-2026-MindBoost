package controllers;

import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.scene.Node;
import javafx.scene.Scene;
import javafx.stage.Stage;

public class PostsMenuController {

    @FXML
    private void goToAdd(ActionEvent event) throws Exception {
        switchScene(event, "PostAdd.fxml");
    }

    @FXML
    private void goToEdit(ActionEvent event) throws Exception {
        switchScene(event, "PostEdit.fxml");
    }

    @FXML
    private void goToDelete(ActionEvent event) throws Exception {
        switchScene(event, "PostDelete.fxml");
    }

    @FXML
    private void goToList(ActionEvent event) throws Exception {
        switchScene(event, "PostList.fxml");
    }

    @FXML
    private void goBack(ActionEvent event) throws Exception {
        switchScene(event, "Home.fxml");
    }

    private void switchScene(ActionEvent event, String fxml) throws Exception {
        FXMLLoader loader = new FXMLLoader(getClass().getResource("/" + fxml));
        Scene scene = new Scene(loader.load());
        Stage stage = (Stage)((Node)event.getSource()).getScene().getWindow();
        stage.setScene(scene);
        stage.show();
    }
}