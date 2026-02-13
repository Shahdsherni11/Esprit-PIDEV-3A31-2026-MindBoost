package controllers;

import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.scene.control.*;
import javafx.scene.layout.VBox;
import javafx.fxml.FXMLLoader;
import javafx.scene.Node;
import javafx.scene.Scene;
import javafx.stage.Stage;
import org.example.entities.saves;
import org.example.services.savesServices;

public class SavesListController {

    @FXML private ListView<saves> listView;
    private final savesServices savesServices = new savesServices();

    @FXML
    public void initialize() {
        try {
            listView.getItems().setAll(savesServices.afficher_saves());
            listView.setCellFactory(list -> new ListCell<>() {
                @Override
                protected void updateItem(saves s, boolean empty) {
                    super.updateItem(s, empty);
                    if (empty || s == null) {
                        setGraphic(null);
                        return;
                    }
                    Label label = new Label("Post ID: " + s.getPost_id() + " | User ID: " + s.getUser_id() + " | " + s.getDescription());
                    VBox box = new VBox(label);
                    setGraphic(box);
                }
            });
        } catch (Exception e) {
            showAlert(Alert.AlertType.ERROR, e.getMessage());
        }
    }

    @FXML
    private void goBack(ActionEvent event) throws Exception {
        FXMLLoader loader = new FXMLLoader(getClass().getResource("/SavesMenu.fxml"));
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