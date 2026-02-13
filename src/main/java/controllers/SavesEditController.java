package controllers;

import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.scene.control.*;
import javafx.fxml.FXMLLoader;
import javafx.scene.Node;
import javafx.scene.Scene;
import javafx.stage.Stage;
import org.example.entities.saves;
import org.example.services.savesServices;

public class SavesEditController {

    @FXML private TextField descField;
    @FXML private TextField postIdField;
    @FXML private TextField userIdField;

    private final savesServices savesServices = new savesServices();

    @FXML
    private void editSave() {
        try {
            saves s = new saves(descField.getText(), Integer.parseInt(postIdField.getText()), Integer.parseInt(userIdField.getText()));
            savesServices.modifier_saves(s);
            showAlert(Alert.AlertType.INFORMATION, "modification avec succes!");
        } catch (Exception e) {
            showAlert(Alert.AlertType.ERROR, e.getMessage());
        }
    }

    @FXML
    private void goBack(ActionEvent event) throws Exception {
        switchScene(event, "SavesMenu.fxml");
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