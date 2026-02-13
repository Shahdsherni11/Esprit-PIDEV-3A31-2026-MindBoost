package controllers;

import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.scene.control.*;
import javafx.scene.layout.VBox;
import javafx.scene.layout.HBox;
import javafx.fxml.FXMLLoader;
import javafx.scene.Node;
import javafx.scene.Scene;
import javafx.stage.Stage;
import org.example.entities.comment;
import org.example.services.commentServices;

public class CommentListController {

    @FXML private ListView<comment> commentListView;
    private final commentServices commentServices = new commentServices();

    @FXML
    public void initialize() {
        try {
            int postId = PostContext.getPostId();
            for (comment c : commentServices.afficher_comment()) {
                if (c.getPost_id() == postId) {
                    commentListView.getItems().add(c);
                }
            }

            commentListView.setCellFactory(list -> new ListCell<>() {
                @Override
                protected void updateItem(comment c, boolean empty) {
                    super.updateItem(c, empty);
                    if (empty || c == null) {
                        setGraphic(null);
                        return;
                    }

                    Label header = new Label("Comment ID: " + c.getComment_id() + " | User ID: " + c.getUser_id() + " | Post ID: " + c.getPost_id());
                    Label text = new Label(c.getComment());
                    Label stats = new Label("Likes: " + c.getLikes() + " | Dislikes: " + c.getDislikes());

                    Button like = new Button("+Like");
                    like.setOnAction(e -> updateLike(c, true));

                    Button dislike = new Button("+Dislike");
                    dislike.setOnAction(e -> updateLike(c, false));

                    HBox actions = new HBox(5, like, dislike);
                    VBox box = new VBox(5, header, text, stats, actions);

                    setGraphic(box);
                }
            });

        } catch (Exception e) {
            showAlert(Alert.AlertType.ERROR, e.getMessage());
        }
    }

    private void updateLike(comment c, boolean like) {
        try {
            if (like) c.setLikes(c.getLikes() + 1);
            else c.setDislikes(c.getDislikes() + 1);

            commentServices.modifier_comment(c);
            commentListView.getItems().clear();
            initialize();
        } catch (Exception e) {
            showAlert(Alert.AlertType.ERROR, e.getMessage());
        }
    }

    @FXML
    private void goBack(ActionEvent event) throws Exception {
        FXMLLoader loader = new FXMLLoader(getClass().getResource("/PostList.fxml"));
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