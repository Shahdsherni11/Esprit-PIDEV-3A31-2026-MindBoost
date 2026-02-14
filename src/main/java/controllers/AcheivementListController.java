package controllers;

import javafx.fxml.FXML;
import javafx.scene.control.*;
import javafx.scene.layout.HBox;
import javafx.scene.layout.VBox;
import org.example.SceneManager;
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

                    Label title = new Label(a.getAcheivement_name());
                    title.getStyleClass().add("post-title");

                    Label meta = new Label("ID: " + a.getAcheivement_id());
                    meta.getStyleClass().add("post-meta");

                    Label score = new Label("Score: " + a.getAcheivement_score());
                    score.getStyleClass().add("post-meta");

                    VBox card = new VBox(6, title, meta, score);
                    card.getStyleClass().add("post-card");
                    card.setMaxWidth(800);

                    HBox wrapper = new HBox(card);
                    wrapper.setStyle("-fx-alignment: center;");

                    setGraphic(wrapper);
                }
            });
        } catch (Exception e) {
            showAlert(Alert.AlertType.ERROR, e.getMessage());
        }
    }

    @FXML
    private void goBack() throws Exception {
        SceneManager.switchTo("AcheivementsMenu.fxml");
    }

    private void showAlert(Alert.AlertType type, String msg) {
        Alert alert = new Alert(type);
        alert.setContentText(msg);
        alert.showAndWait();
    }
}
