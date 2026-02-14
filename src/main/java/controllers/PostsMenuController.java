package controllers;

import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.scene.control.Alert;
import org.example.SceneManager;

public class PostsMenuController {

    @FXML
    private void goToAdd(ActionEvent e) {
        safeSwitch("PostAdd.fxml");
    }

    @FXML
    private void goToEdit(ActionEvent e) {
        safeSwitch("PostEdit.fxml");
    }

    @FXML
    private void goToDelete(ActionEvent e) {
        safeSwitch("PostDelete.fxml");
    }

    @FXML
    private void goToList(ActionEvent e) {
        safeSwitch("PostList.fxml");
    }

    @FXML
    private void goBack(ActionEvent e) {
        safeSwitch("Home.fxml");
    }

    private void safeSwitch(String fxml) {
        try {
            SceneManager.switchTo(fxml);
        } catch (Exception ex) {
            Alert alert = new Alert(Alert.AlertType.ERROR);
            alert.setContentText("Failed to open " + fxml + ":\n" + ex.getMessage());
            alert.showAndWait();
            ex.printStackTrace();
        }
    }
}
