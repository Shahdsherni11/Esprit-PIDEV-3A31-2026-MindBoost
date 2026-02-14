package controllers;

import javafx.fxml.FXML;
import javafx.scene.control.*;
import javafx.scene.layout.HBox;
import javafx.scene.layout.VBox;
import org.example.SceneManager;
import org.example.entities.post;
import org.example.services.postServices;

public class PostListController {
    @FXML private ListView<post> postListView;
    private final postServices postServices = new postServices();

    @FXML
    public void initialize() {
        try {
            postListView.getItems().setAll(postServices.afficher_post());
            postListView.setCellFactory(list -> new ListCell<>() {
                @Override
                protected void updateItem(post p, boolean empty) {
                    super.updateItem(p, empty);
                    if (empty || p == null) {
                        setGraphic(null);
                        return;
                    }

                    Label title = new Label(p.getTitle());
                    title.getStyleClass().add("post-title");

                    Label meta = new Label("User ID: " + p.getUser_id() + " • Post ID: " + p.getPost_id());
                    meta.getStyleClass().add("post-meta");

                    Label content = new Label(p.getContent());
                    content.getStyleClass().add("post-content");

                    Label stats = new Label("👍 " + p.getPost_likes() + "   👎 " + p.getPost_dislikes());
                    stats.getStyleClass().add("post-meta");

                    Label image = new Label("Image: " + p.getImage_url());
                    image.getStyleClass().add("post-meta");

                    Button like = new Button("👍 Like");
                    like.getStyleClass().add("post-action-btn");

                    Button dislike = new Button("👎 Dislike");
                    dislike.getStyleClass().add("post-action-btn");

                    like.setOnAction(e -> {
                        updateLike(p, true);
                        like.setDisable(true);
                        dislike.setDisable(true);
                    });

                    dislike.setOnAction(e -> {
                        updateLike(p, false);
                        like.setDisable(true);
                        dislike.setDisable(true);
                    });

                    Button addComment = new Button("💬 Add");
                    addComment.getStyleClass().add("post-action-btn");
                    addComment.setOnAction(e -> openCommentPage("CommentAdd.fxml", p.getPost_id()));

                    Button showComments = new Button("🗨️ View");
                    showComments.getStyleClass().add("post-action-btn");
                    showComments.setOnAction(e -> openCommentPage("CommentList.fxml", p.getPost_id()));

                    Button editComment = new Button("✏️ Edit");
                    editComment.getStyleClass().add("post-action-btn");
                    editComment.setOnAction(e -> openCommentPage("CommentEdit.fxml", p.getPost_id()));

                    Button deleteComment = new Button("🗑️ Delete");
                    deleteComment.getStyleClass().add("post-action-btn");
                    deleteComment.setOnAction(e -> openCommentPage("CommentDelete.fxml", p.getPost_id()));

                    HBox actions = new HBox(8, like, dislike, addComment, showComments, editComment, deleteComment);
                    actions.getStyleClass().add("post-actions");

                    VBox card = new VBox(6, title, meta, content, stats, image, actions);
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

    private void updateLike(post p, boolean like) {
        try {
            if (like) p.setPost_likes(p.getPost_likes() + 1);
            else p.setPost_dislikes(p.getPost_dislikes() + 1);

            postServices.updateReactions(p.getPost_id(), p.getPost_likes(), p.getPost_dislikes());
            postListView.getItems().setAll(postServices.afficher_post());
        } catch (Exception e) {
            showAlert(Alert.AlertType.ERROR, e.getMessage());
        }
    }

    private void openCommentPage(String fxml, int postId) {
        try {
            PostContext.setPostId(postId);
            SceneManager.switchTo(fxml);
        } catch (Exception e) {
            showAlert(Alert.AlertType.ERROR, e.getMessage());
        }
    }

    @FXML
    private void goBack() throws Exception {
        SceneManager.switchTo("PostsMenu.fxml");
    }

    private void showAlert(Alert.AlertType type, String msg) {
        Alert alert = new Alert(type);
        alert.setContentText(msg);
        alert.showAndWait();
    }
}