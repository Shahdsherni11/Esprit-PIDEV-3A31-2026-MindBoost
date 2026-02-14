package controllers;

import javafx.fxml.FXML;
import javafx.scene.control.Label;
import javafx.scene.image.Image;
import javafx.scene.image.ImageView;
import org.example.entities.post;

public class PostCellController {
    @FXML private ImageView postImage;
    @FXML private Label titleLabel;
    @FXML private Label tagLabel;

    public void setData(post p) {
        postImage.setImage(new Image(p.getImage_url(), true));
        titleLabel.setText(p.getTitle());
        tagLabel.setText(p.getTag());
    }
}
