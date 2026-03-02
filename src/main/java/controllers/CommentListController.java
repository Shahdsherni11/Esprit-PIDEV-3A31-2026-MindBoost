package controllers;

import javafx.fxml.FXML;
import javafx.geometry.Pos;
import javafx.scene.control.*;
import javafx.scene.effect.GaussianBlur;
import javafx.scene.layout.*;
import org.example.SceneManager;
import org.example.entities.comment;
import org.example.services.commentServices;
import org.example.utils.ProfanityService;

import java.util.ArrayList;
import java.util.Comparator;
import java.util.List;

public class CommentListController {
    @FXML private ListView<comment> commentListView;
    @FXML private ComboBox<String> sortCombo;
    @FXML private Label noResultLabel;

    private final commentServices commentServices = new commentServices();
    private List<comment> allComments = new ArrayList<>();
    private List<comment> currentComments = new ArrayList<>();

    @FXML
    public void initialize() {
        try {
            loadComments();
            setList(allComments);

            sortCombo.getItems().setAll("Plus de likes", "Plus de dislikes");
            sortCombo.setOnAction(e -> applySort());

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

                    boolean flagged = ProfanityService.isProfane(c.getComment());

                    StackPane stack = new StackPane(card);

                    if (flagged) {
                        card.setEffect(new GaussianBlur(14));

                        Button viewBtn = new Button("👁 View");
                        viewBtn.getStyleClass().add("blur-view-btn");

                        VBox overlay = new VBox(viewBtn);
                        overlay.getStyleClass().add("blur-overlay");
                        overlay.setAlignment(Pos.CENTER);

                        viewBtn.setOnAction(evt -> {
                            card.setEffect(null);
                            overlay.setVisible(false);
                            overlay.setManaged(false);
                        });

                        stack.getChildren().add(overlay);
                        StackPane.setAlignment(overlay, Pos.CENTER);
                    }

                    HBox wrapper = new HBox(stack);
                    wrapper.setStyle("-fx-alignment: center;");

                    setGraphic(wrapper);
                }
            });

        } catch (Exception e) {
            showAlert(Alert.AlertType.ERROR, e.getMessage());
        }
    }

    private void loadComments() throws Exception {
        allComments.clear();
        int postId = PostContext.getPostId();
        for (comment c : commentServices.afficher_comment()) {
            if (c.getPost_id() == postId) {
                allComments.add(c);
            }
        }
    }

    @FXML
    private void resetList() {
        sortCombo.getSelectionModel().clearSelection();
        setList(allComments);
    }

    private void applySort() {
        if (sortCombo.getValue() == null) return;

        List<comment> sorted = new ArrayList<>(currentComments);
        if (sortCombo.getValue().equals("Plus de likes")) {
            sorted.sort(Comparator.comparingInt(comment::getLikes).reversed());
        } else {
            sorted.sort(Comparator.comparingInt(comment::getDislikes).reversed());
        }
        setList(sorted);
    }

    private void setList(List<comment> comments) {
        currentComments = new ArrayList<>(comments);
        commentListView.getItems().setAll(comments);
        noResultLabel.setVisible(comments.isEmpty());
        noResultLabel.setManaged(comments.isEmpty());
    }

    private void updateLike(comment c, boolean like) {
        try {
            if (like) c.setLikes(c.getLikes() + 1);
            else c.setDislikes(c.getDislikes() + 1);

            commentServices.modifier_comment(c);
            loadComments();
            setList(allComments);
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