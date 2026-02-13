package controllers;

import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.scene.Node;
import javafx.scene.Scene;
import javafx.stage.Stage;

public class AcheivementsMenuController {

    @FXML private void goToAdd(ActionEvent e) throws Exception { switchScene(e,"AcheivementAdd.fxml"); }
    @FXML private void goToEdit(ActionEvent e) throws Exception { switchScene(e,"AcheivementEdit.fxml"); }
    @FXML private void goToDelete(ActionEvent e) throws Exception { switchScene(e,"AcheivementDelete.fxml"); }
    @FXML private void goToList(ActionEvent e) throws Exception { switchScene(e,"AcheivementList.fxml"); }
    @FXML private void goBack(ActionEvent e) throws Exception { switchScene(e,"Home.fxml"); }

    private void switchScene(ActionEvent event, String fxml) throws Exception {
        FXMLLoader loader = new FXMLLoader(getClass().getResource("/" + fxml));
        Scene scene = new Scene(loader.load());
        Stage stage = (Stage)((Node)event.getSource()).getScene().getWindow();
        stage.setScene(scene);
        stage.show();
    }
}