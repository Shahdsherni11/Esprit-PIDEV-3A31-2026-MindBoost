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

                    Label header = new Label("User ID: " + p.getUser_id() + " | Post ID: " + p.getPost_id());
                    Label title = new Label(p.getTitle());
                    Label content = new Label(p.getContent());
                    Label image = new Label("Image: " + p.getImage_url());
                    Label stats = new Label("Likes: " + p.getPost_likes() + " | Dislikes: " + p.getPost_dislikes());

                    Button like = new Button("+Like");
                    like.setOnAction(e -> updateLike(p, true));

                    Button dislike = new Button("+Dislike");
                    dislike.setOnAction(e -> updateLike(p, false));

                    Button addComment = new Button("+Ajouter Commentaire");
                    addComment.setOnAction(e -> openCommentPage(e, "CommentAdd.fxml", p.getPost_id()));

                    Button showComments = new Button("Afficher Commentaires");
                    showComments.setOnAction(e -> openCommentPage(e, "CommentList.fxml", p.getPost_id()));

                    Button editComment = new Button("Modifier Commentaire");
                    editComment.setOnAction(e -> openCommentPage(e, "CommentEdit.fxml", p.getPost_id()));

                    Button deleteComment = new Button("Supprimer Commentaire");
                    deleteComment.setOnAction(e -> openCommentPage(e, "CommentDelete.fxml", p.getPost_id()));

                    HBox actions = new HBox(5, like, dislike, addComment, showComments, editComment, deleteComment);
                    VBox box = new VBox(5, header, title, content, image, stats, actions);

                    setGraphic(box);
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

            postServices.modifier_post(p);
            postListView.getItems().setAll(postServices.afficher_post());
        } catch (Exception e) {
            showAlert(Alert.AlertType.ERROR, e.getMessage());
        }
    }

    private void openCommentPage(ActionEvent event, String fxml, int postId) {
        try {
            PostContext.setPostId(postId);
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/" + fxml));
            Scene scene = new Scene(loader.load());
            Stage stage = (Stage)((Node)event.getSource()).getScene().getWindow();
            stage.setScene(scene);
            stage.show();
        } catch (Exception e) {
            showAlert(Alert.AlertType.ERROR, e.getMessage());
        }
    }

    @FXML
    private void goBack(ActionEvent event) throws Exception {
        FXMLLoader loader = new FXMLLoader(getClass().getResource("/PostsMenu.fxml"));
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