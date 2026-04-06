package controllers;

import javafx.fxml.FXML;
import javafx.scene.control.*;
import javafx.scene.layout.HBox;
import javafx.scene.layout.VBox;
import org.example.SceneManager;
import org.example.entities.acheivements;
import org.example.services.acheivementsServices;

import java.util.ArrayList;
import java.util.Comparator;
import java.util.List;

public class AcheivementListController {
    @FXML private ListView<acheivements> listView;
    @FXML private TextField searchField;
    @FXML private ComboBox<String> sortCombo;
    @FXML private Label noResultLabel;

    private final acheivementsServices acheivementsServices = new acheivementsServices();
    private List<acheivements> allAcheivements = new ArrayList<>();
    private List<acheivements> currentAcheivements = new ArrayList<>();

    @FXML
    public void initialize() {
        try {
            allAcheivements = acheivementsServices.afficher_acheivement();
            setList(allAcheivements);

            sortCombo.getItems().setAll("Score décroissant", "Score croissant");
            sortCombo.setOnAction(e -> applySort());

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
    private void searchAcheivements() {
        String text = searchField.getText().trim();
        if (text.isEmpty()) {
            setList(allAcheivements);
            return;
        }

        try {
            int id = Integer.parseInt(text);
            List<acheivements> filtered = new ArrayList<>();
            for (acheivements a : allAcheivements) {
                if (a.getAcheivement_id() == id) {
                    filtered.add(a);
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
        sortCombo.getSelectionModel().clearSelection();
        setList(allAcheivements);
    }

    private void applySort() {
        if (sortCombo.getValue() == null) return;

        List<acheivements> sorted = new ArrayList<>(currentAcheivements);
        if (sortCombo.getValue().equals("Score décroissant")) {
            sorted.sort(Comparator.comparingInt(acheivements::getAcheivement_score).reversed());
        } else {
            sorted.sort(Comparator.comparingInt(acheivements::getAcheivement_score));
        }
        setList(sorted);
    }

    private void setList(List<acheivements> list) {
        currentAcheivements = new ArrayList<>(list);
        listView.getItems().setAll(list);
        noResultLabel.setVisible(list.isEmpty());
        noResultLabel.setManaged(list.isEmpty());
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
