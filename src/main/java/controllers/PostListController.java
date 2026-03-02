package controllers;

import javafx.application.Platform;
import javafx.fxml.FXML;
import javafx.geometry.Pos;
import javafx.scene.control.*;
import javafx.scene.effect.GaussianBlur;
import javafx.scene.image.Image;
import javafx.scene.image.ImageView;
import javafx.scene.layout.*;
import org.example.SceneManager;
import org.example.entities.post;
import org.example.services.postServices;
import org.example.utils.AIClient;
import org.example.utils.ProfanityService;

import java.util.ArrayList;
import java.util.Comparator;
import java.util.List;

public class PostListController {
    @FXML private ListView<post> postListView;
    @FXML private TextField searchField;
    @FXML private ComboBox<String> sortCombo;
    @FXML private Label noResultLabel;

    private final postServices postServices = new postServices();
    private List<post> allPosts = new ArrayList<>();
    private List<post> currentPosts = new ArrayList<>();

    @FXML
    public void initialize() {
        try {
            allPosts = postServices.afficher_post();
            setList(allPosts);

            sortCombo.getItems().setAll("Plus de likes", "Plus de dislikes");
            sortCombo.setOnAction(e -> applySort());

            postListView.setCellFactory(list -> new ListCell<>() {
                @Override
                protected void updateItem(post p, boolean empty) {
                    super.updateItem(p, empty);
                    if (empty || p == null) {
                        setGraphic(null);
                        return;
                    }

                    try {
                        String safeTitle = p.getTitle() == null ? "" : p.getTitle();
                        String safeContent = p.getContent() == null ? "" : p.getContent();

                        Label title = new Label(safeTitle);
                        title.getStyleClass().add("post-title");

                        Label meta = new Label("User ID: " + p.getUser_id() + " • Post ID: " + p.getPost_id());
                        meta.getStyleClass().add("post-meta");

                        ImageView postImage = new ImageView();
                        postImage.setFitWidth(520);
                        postImage.setPreserveRatio(true);

                        if (p.getImage_url() != null && !p.getImage_url().isBlank()) {
                            try {
                                Image img = new Image(p.getImage_url(), true);
                                postImage.setImage(img);
                            } catch (Exception e) {
                                postImage.setImage(null);
                            }
                        }

                        if (postImage.getImage() == null) {
                            postImage.setVisible(false);
                            postImage.setManaged(false);
                        }

                        Label content = new Label(safeContent);
                        content.getStyleClass().add("post-content");

                        Label translatedLabel = new Label();
                        translatedLabel.getStyleClass().add("post-content");
                        translatedLabel.setVisible(false);
                        translatedLabel.setManaged(false);

                        Label summaryLabel = new Label("Résumé en cours...");
                        summaryLabel.getStyleClass().add("post-content");

                        VBox summaryBox = new VBox(6, summaryLabel);
                        summaryBox.getStyleClass().add("summary-box");
                        summaryBox.setVisible(false);
                        summaryBox.setManaged(false);

                        Button summaryBtn = new Button("🧠 Summary");
                        summaryBtn.getStyleClass().add("post-action-btn");

                        summaryBtn.setOnAction(e -> {
                            if (summaryBox.isVisible()) {
                                summaryBox.setVisible(false);
                                summaryBox.setManaged(false);
                            } else {
                                summaryBox.setVisible(true);
                                summaryBox.setManaged(true);
                                new Thread(() -> {
                                    try {
                                        if (safeContent.isBlank()) {
                                            Platform.runLater(() -> summaryLabel.setText("Aucun contenu."));
                                            return;
                                        }
                                        String summary = AIClient.summarize(safeContent);
                                        Platform.runLater(() -> summaryLabel.setText(summary));
                                    } catch (Exception ex) {
                                        Platform.runLater(() -> summaryLabel.setText("Erreur résumé: " + ex.getMessage()));
                                    }
                                }).start();
                            }
                        });

                        Button trEn = new Button("EN");
                        Button trFr = new Button("FR");
                        Button trAr = new Button("AR");

                        for (Button b : List.of(trEn, trFr, trAr)) {
                            b.getStyleClass().add("post-action-btn");
                        }

                        trEn.setOnAction(e -> translate(safeContent, "en", translatedLabel));
                        trFr.setOnAction(e -> translate(safeContent, "fr", translatedLabel));
                        trAr.setOnAction(e -> translate(safeContent, "ar", translatedLabel));

                        HBox translateBox = new HBox(8, new Label("Translate:"), trEn, trFr, trAr);
                        translateBox.getStyleClass().add("comment-actions");

                        Label stats = new Label("👍 " + p.getPost_likes() + "   👎 " + p.getPost_dislikes());
                        stats.getStyleClass().add("post-meta");

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

                        Button viewStats = new Button("📊 Stats");
                        viewStats.getStyleClass().add("post-action-btn");
                        viewStats.setOnAction(e -> openStatsPage(p.getPost_id()));

                        HBox actions = new HBox(8, like, dislike, addComment, showComments, editComment, deleteComment, viewStats, summaryBtn);
                        actions.getStyleClass().add("post-actions");

                        VBox card = new VBox(6, title, meta, postImage, content, translateBox, translatedLabel, summaryBox, stats, actions);
                        card.getStyleClass().add("post-card");
                        card.setMaxWidth(800);

                        boolean flagged = ProfanityService.isProfane(safeTitle)
                                || ProfanityService.isProfane(safeContent);

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
                    } catch (Exception ex) {
                        ex.printStackTrace();
                        setGraphic(null);
                    }
                }
            });
        } catch (Exception e) {
            showAlert(Alert.AlertType.ERROR, e.getMessage());
        }
    }

    private void translate(String text, String lang, Label target) {
        target.setText("Translating...");
        target.setVisible(true);
        target.setManaged(true);

        new Thread(() -> {
            try {
                if (text == null || text.isBlank()) {
                    Platform.runLater(() -> target.setText("Aucun contenu."));
                    return;
                }
                String result = AIClient.translate(text, lang);
                Platform.runLater(() -> target.setText(result));
            } catch (Exception e) {
                Platform.runLater(() -> target.setText("Erreur traduction."));
            }
        }).start();
    }

    @FXML
    private void searchPosts() {
        String term = searchField.getText().trim().toLowerCase();
        if (term.isEmpty()) {
            setList(allPosts);
            return;
        }

        List<post> filtered = new ArrayList<>();
        for (post p : allPosts) {
            String title = p.getTitle() == null ? "" : p.getTitle().toLowerCase();
            String content = p.getContent() == null ? "" : p.getContent().toLowerCase();
            if (title.contains(term) || content.contains(term)) {
                filtered.add(p);
            }
        }
        setList(filtered);
    }

    @FXML
    private void resetList() {
        searchField.clear();
        sortCombo.getSelectionModel().clearSelection();
        setList(allPosts);
    }

    private void applySort() {
        if (sortCombo.getValue() == null) return;

        List<post> sorted = new ArrayList<>(currentPosts);
        if (sortCombo.getValue().equals("Plus de likes")) {
            sorted.sort(Comparator.comparingInt(post::getPost_likes).reversed());
        } else {
            sorted.sort(Comparator.comparingInt(post::getPost_dislikes).reversed());
        }
        setList(sorted);
    }

    private void setList(List<post> posts) {
        currentPosts = new ArrayList<>(posts);
        postListView.getItems().setAll(posts);
        noResultLabel.setVisible(posts.isEmpty());
        noResultLabel.setManaged(posts.isEmpty());
    }

    private void updateLike(post p, boolean like) {
        try {
            if (like) p.setPost_likes(p.getPost_likes() + 1);
            else p.setPost_dislikes(p.getPost_dislikes() + 1);

            postServices.updateReactions(p.getPost_id(), p.getPost_likes(), p.getPost_dislikes());
            allPosts = postServices.afficher_post();
            setList(allPosts);
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

    private void openStatsPage(int postId) {
        try {
            PostContext.setPostId(postId);
            SceneManager.switchTo("PostStats.fxml");
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