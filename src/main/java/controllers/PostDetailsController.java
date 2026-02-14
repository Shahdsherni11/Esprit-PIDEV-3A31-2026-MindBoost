package controllers;

import javafx.fxml.FXML;
import javafx.scene.control.Label;
import javafx.scene.image.Image;
import javafx.scene.image.ImageView;
import org.example.SceneManager;
import org.example.entities.post;

public class PostDetailsController {
    @FXML private ImageView postImage;
    @FXML private Label titleLabel;
    @FXML private Label contentLabel;

    public void setData(post p) {
        postImage.setImage(new Image(p.getImage_url(), true));
        titleLabel.setText(p.getTitle());
        contentLabel.setText(p.getContent());
    }

    @FXML
    private void goBack() throws Exception {
        SceneManager.switchTo("PostList.fxml");
    }
}
