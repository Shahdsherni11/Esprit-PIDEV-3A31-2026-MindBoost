package controllers;

import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.scene.control.*;
import javafx.fxml.FXMLLoader;
import javafx.scene.Node;
import javafx.scene.Scene;
import javafx.stage.Stage;
import org.example.entities.acheivements;
import org.example.services.acheivementsServices;

public class AcheivementAddController {

    @FXML private TextField nameField;
    @FXML private TextField scoreField;

    private final acheivementsServices acheivementsServices = new acheivementsServices();

    @FXML
    private void addAcheivement() {
        try {
            acheivements a = new acheivements(nameField.getText(), Integer.parseInt(scoreField.getText()));
            acheivementsServices.ajouter_acheivement(a);
            showAlert(Alert.AlertType.INFORMATION, "acheivement ajoutée avec succes!");
        } catch (Exception e) {
            showAlert(Alert.AlertType.ERROR, e.getMessage());
        }
    }

    @FXML
    private void goBack(ActionEvent event) throws Exception {
        switchScene(event, "AcheivementsMenu.fxml");
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
