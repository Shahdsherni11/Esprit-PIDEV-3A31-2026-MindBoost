package controllers;

import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.scene.Node;
import javafx.scene.Scene;
import javafx.stage.Stage;
import org.example.SceneUtil;
import org.example.SceneManager;

public class PostsMenuController {

    @FXML
    private void goToAdd(ActionEvent event) throws Exception {
        SceneManager.switchTo("PostAdd.fxml");
    }

    @FXML
    private void goToEdit(ActionEvent event) throws Exception {
        SceneManager.switchTo("PostEdit.fxml");
    }

    @FXML
    private void goToDelete(ActionEvent event) throws Exception {
        SceneManager.switchTo("PostDelete.fxml");
    }

    @FXML
    private void goToList(ActionEvent event) throws Exception {
        SceneManager.switchTo("PostList.fxml");
    }

    @FXML
    private void goBack(ActionEvent event) throws Exception {
        SceneManager.switchTo("Home.fxml");
    }
}
