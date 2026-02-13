package controllers;

import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.scene.control.Alert;
import javafx.scene.control.TextField;
import javafx.fxml.FXMLLoader;
import javafx.scene.Node;
import javafx.scene.Scene;
import javafx.stage.Stage;
import org.example.entities.comment;
import org.example.services.commentServices;

public class CommentAddController {

    @FXML private TextField postIdField;
    @FXML private TextField userIdField;
    @FXML private TextField commentField;

    private final commentServices commentServices = new commentServices();

    @FXML
    public void initialize() {
        postIdField.setText(String.valueOf(PostContext.getPostId()));
    }

    @FXML
    private void addComment() {
        try {
            comment c = new comment(
                    commentField.getText(),
                    0,0,
                    Integer.parseInt(userIdField.getText()),
                    Integer.parseInt(postIdField.getText())
            );
            commentServices.ajouter_comment(c);
            showAlert(Alert.AlertType.INFORMATION, "comment ajoutée avec succes!");
        } catch (Exception e) {
            showAlert(Alert.AlertType.ERROR, e.getMessage());
        }
    }

    @FXML
    private void goBack(ActionEvent event) throws Exception {
        switchScene(event, "PostList.fxml");
    }

    private void switchScene(ActionEvent event, String fxml) throws Exception {
        FXMLLoader loader = new FXMLLoader(getClass().getResource("/" + fxml));
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