package controllers;

import javafx.fxml.FXMLLoader;
import javafx.scene.control.ListCell;
import javafx.scene.layout.HBox;
import org.example.entities.post;

public class PostCell extends ListCell<post> {
    private HBox root;
    private PostCellController controller;

    @Override
    protected void updateItem(post item, boolean empty) {
        super.updateItem(item, empty);

        if (empty || item == null) {
            setGraphic(null);
            return;
        }

        if (root == null) {
            try {
                FXMLLoader loader = new FXMLLoader(getClass().getResource("/PostCell.fxml"));
                root = loader.load();
                controller = loader.getController();
            } catch (Exception e) {
                e.printStackTrace();
            }
        }

        controller.setData(item);
        setGraphic(root);
    }
}