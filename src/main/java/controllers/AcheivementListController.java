package controllers;

import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.scene.control.*;
import javafx.scene.layout.VBox;
import javafx.fxml.FXMLLoader;
import javafx.scene.Node;
import javafx.scene.Scene;
import javafx.stage.Stage;
import org.example.entities.acheivements;
import org.example.services.acheivementsServices;

public class AcheivementListController {

    @FXML private ListView<acheivements> listView;
    private final acheivementsServices acheivementsServices = new acheivementsServices();

    @FXML
    public void initialize() {
        try {
            listView.getItems().setAll(acheivementsServices.afficher_acheivement());
            listView.setCellFactory(list -> new ListCell<>() {
                @Override
                protected void updateItem(acheivements a, boolean empty) {
                    super.updateItem(a, empty);
                    if (empty || a == null) {
                        setGraphic(null);
                        return;
                    }
                    Label label = new Label("ID: " + a.getAcheivement_id() + " | " + a.getAcheivement_name() + " | Score: " + a.getAcheivement_score());
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
        FXMLLoader loader = new FXMLLoader(getClass().getResource("/AcheivementsMenu.fxml"));
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
