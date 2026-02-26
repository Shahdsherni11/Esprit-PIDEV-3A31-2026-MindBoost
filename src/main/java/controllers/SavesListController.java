package controllers;

import javafx.fxml.FXML;
import javafx.scene.control.*;
import javafx.scene.layout.HBox;
import javafx.scene.layout.VBox;
import org.example.SceneManager;
import org.example.entities.saves;
import org.example.services.savesServices;

import java.util.ArrayList;
import java.util.List;

public class SavesListController {
    @FXML private ListView<saves> listView;
    @FXML private TextField searchField;
    @FXML private Label noResultLabel;

    private final savesServices savesServices = new savesServices();
    private List<saves> allSaves = new ArrayList<>();
    private List<saves> currentSaves = new ArrayList<>();

    @FXML
    public void initialize() {
        try {
            allSaves = savesServices.afficher_saves();
            setList(allSaves);

            listView.setCellFactory(list -> new ListCell<>() {
                @Override
                protected void updateItem(saves s, boolean empty) {
                    super.updateItem(s, empty);
                    if (empty || s == null) {
                        setGraphic(null);
                        return;
                    }

                    Label title = new Label("Saved Post");
                    title.getStyleClass().add("post-title");

                    Label meta = new Label("Post ID: " + s.getPost_id() + " • User ID: " + s.getUser_id());
                    meta.getStyleClass().add("post-meta");

                    Label desc = new Label(s.getDescription());
                    desc.getStyleClass().add("post-content");

                    VBox card = new VBox(6, title, meta, desc);
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
    private void searchSaves() {
        String text = searchField.getText().trim();
        if (text.isEmpty()) {
            setList(allSaves);
            return;
        }

        try {
            int postId = Integer.parseInt(text);
            List<saves> filtered = new ArrayList<>();
            for (saves s : allSaves) {
                if (s.getPost_id() == postId) {
                    filtered.add(s);
                }
            }
            setList(filtered);
        } catch (NumberFormatException e) {
            setList(new ArrayList<>());
        }
    }

    @FXML
    private void resetList() {
        searchField.clear();
        setList(allSaves);
    }

    private void setList(List<saves> list) {
        currentSaves = new ArrayList<>(list);
        listView.getItems().setAll(list);
        noResultLabel.setVisible(list.isEmpty());
        noResultLabel.setManaged(list.isEmpty());
    }

    @FXML
    private void goBack() throws Exception {
        SceneManager.switchTo("SavesMenu.fxml");
    }

    private void showAlert(Alert.AlertType type, String msg) {
        Alert alert = new Alert(type);
        alert.setContentText(msg);
        alert.showAndWait();
    }
}