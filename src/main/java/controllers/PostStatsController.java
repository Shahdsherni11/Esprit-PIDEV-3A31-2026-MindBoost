package controllers;

import javafx.animation.FadeTransition;
import javafx.animation.TranslateTransition;
import javafx.fxml.FXML;
import javafx.scene.Node;
import javafx.scene.chart.*;
import javafx.scene.control.Alert;
import javafx.scene.control.Label;
import javafx.scene.layout.FlowPane;
import javafx.util.Duration;
import org.example.SceneManager;
import org.example.entities.comment;
import org.example.entities.post;
import org.example.services.commentServices;
import org.example.services.postServices;

import java.text.DecimalFormat;

public class PostStatsController {
    @FXML private Label titleLabel;
    @FXML private Label likesLabel;
    @FXML private Label dislikesLabel;
    @FXML private Label commentsLabel;
    @FXML private Label interactionsLabel;
    @FXML private Label likeRatioLabel;
    @FXML private Label dislikeRatioLabel;
    @FXML private Label engagementLabel;
    @FXML private Label netScoreLabel;
    @FXML private Label popularityLabel;
    @FXML private Label controversyLabel;
    @FXML private Label moodLabel;

    @FXML private Label engagementWordLabel;
    @FXML private Label popularityWordLabel;
    @FXML private Label controversyWordLabel;

    @FXML private PieChart reactionsChart;
    @FXML private BarChart<String, Number> totalsChart;

    private final postServices postServices = new postServices();
    private final commentServices commentServices = new commentServices();

    @FXML
    public void initialize() {
        try {
            int postId = PostContext.getPostId();
            post selected = null;

            for (post p : postServices.afficher_post()) {
                if (p.getPost_id() == postId) {
                    selected = p;
                    break;
                }
            }

            if (selected == null) {
                showAlert(Alert.AlertType.ERROR, "Post introuvable.");
                SceneManager.switchTo("PostList.fxml");
                return;
            }

            int commentsCount = 0;
            for (comment c : commentServices.afficher_comment()) {
                if (c.getPost_id() == postId) {
                    commentsCount++;
                }
            }

            int likes = selected.getPost_likes();
            int dislikes = selected.getPost_dislikes();
            int interactions = likes + dislikes + commentsCount;

            double likeRatio = (likes + dislikes) == 0 ? 0 : (double) likes / (likes + dislikes);
            double dislikeRatio = (likes + dislikes) == 0 ? 0 : (double) dislikes / (likes + dislikes);
            double engagement = interactions == 0 ? 0 : (double) commentsCount / interactions;

            int netScore = likes - dislikes;
            int popularity = (likes * 2 + commentsCount) - dislikes;
            double controversy = (double) dislikes / (likes + dislikes + 1);

            String mood = likeRatio > 0.8 ? "Très apprécié"
                    : likeRatio < 0.4 ? "Controversé"
                    : "Moyen";

            DecimalFormat df = new DecimalFormat("0.00");

            titleLabel.setText(selected.getTitle());
            likesLabel.setText(String.valueOf(likes));
            dislikesLabel.setText(String.valueOf(dislikes));
            commentsLabel.setText(String.valueOf(commentsCount));
            interactionsLabel.setText(String.valueOf(interactions));
            likeRatioLabel.setText(df.format(likeRatio * 100) + "%");
            dislikeRatioLabel.setText(df.format(dislikeRatio * 100) + "%");
            engagementLabel.setText(df.format(engagement * 100) + "%");
            netScoreLabel.setText(String.valueOf(netScore));
            popularityLabel.setText(String.valueOf(popularity));
            controversyLabel.setText(df.format(controversy));
            moodLabel.setText(mood);

            engagementWordLabel.setText(engagement >= 0.4 ? "Fort" : engagement >= 0.2 ? "Moyen" : "Faible");
            popularityWordLabel.setText(popularity >= 50 ? "Élevée" : popularity >= 20 ? "Moyenne" : "Faible");
            controversyWordLabel.setText(controversy >= 0.5 ? "Élevée" : controversy >= 0.25 ? "Moyenne" : "Faible");

            // Pie chart colors (template palette)
            reactionsChart.setAnimated(true);
            PieChart.Data likeSlice = new PieChart.Data("Likes", likes);
            PieChart.Data dislikeSlice = new PieChart.Data("Dislikes", dislikes);
            reactionsChart.getData().setAll(likeSlice, dislikeSlice);

            likeSlice.nodeProperty().addListener((obs, o, n) -> {
                if (n != null) n.setStyle("-fx-pie-color: #F97316;"); // orange
            });
            dislikeSlice.nodeProperty().addListener((obs, o, n) -> {
                if (n != null) n.setStyle("-fx-pie-color: #F59E0B;"); // amber
            });

            // Bar chart colors
            totalsChart.setAnimated(true);
            totalsChart.getData().clear();
            XYChart.Series<String, Number> series = new XYChart.Series<>();
            series.getData().add(new XYChart.Data<>("Likes", likes));
            series.getData().add(new XYChart.Data<>("Dislikes", dislikes));
            series.getData().add(new XYChart.Data<>("Commentaires", commentsCount));
            totalsChart.getData().add(series);

            for (XYChart.Data<String, Number> d : series.getData()) {
                d.nodeProperty().addListener((obs, o, n) -> {
                    if (n == null) return;
                    switch (d.getXValue()) {
                        case "Likes" -> n.setStyle("-fx-bar-fill: #F97316;");
                        case "Dislikes" -> n.setStyle("-fx-bar-fill: #F59E0B;");
                        default -> n.setStyle("-fx-bar-fill: #FB923C;");
                    }
                });
            }

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
