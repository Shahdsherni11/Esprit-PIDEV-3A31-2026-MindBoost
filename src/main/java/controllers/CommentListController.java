package controllers;

import javafx.fxml.FXML;
import javafx.scene.control.*;
import javafx.scene.layout.HBox;
import javafx.scene.layout.VBox;
import org.example.SceneManager;
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

                    Label meta = new Label("Comment ID: " + c.getComment_id() +
                            " • User ID: " + c.getUser_id() +
                            " • Post ID: " + c.getPost_id());
                    meta.getStyleClass().add("comment-meta");

                    Label text = new Label(c.getComment());
                    text.getStyleClass().add("comment-text");

                    Label stats = new Label("👍 " + c.getLikes() + "   👎 " + c.getDislikes());
                    stats.getStyleClass().add("comment-meta");

                    Button like = new Button("👍 Like");
                    like.getStyleClass().add("post-action-btn");

                    Button dislike = new Button("👎 Dislike");
                    dislike.getStyleClass().add("post-action-btn");

                    like.setOnAction(e -> {
                        updateLike(c, true);
                        like.setDisable(true);
                        dislike.setDisable(true);
                    });

                    dislike.setOnAction(e -> {
                        updateLike(c, false);
                        like.setDisable(true);
                        dislike.setDisable(true);
                    });

                    HBox actions = new HBox(8, like, dislike);
                    actions.getStyleClass().add("comment-actions");

                    VBox card = new VBox(6, meta, text, stats, actions);
                    card.getStyleClass().add("comment-card");
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
    private void goBack() throws Exception {
        SceneManager.switchTo("PostList.fxml");
    }

    private void showAlert(Alert.AlertType type, String msg) {
        Alert alert = new Alert(type);
        alert.setContentText(msg);
        alert.showAndWait();
    }
}