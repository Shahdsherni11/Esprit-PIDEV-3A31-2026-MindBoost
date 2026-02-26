package controllers;

import javafx.fxml.FXML;
import javafx.scene.control.Alert;
import javafx.scene.control.Label;
import javafx.scene.control.TextField;
import org.example.SceneManager;
import org.example.entities.saves;
import org.example.services.savesServices;

public class SavesEditController {
    @FXML private TextField descField;
    @FXML private TextField postIdField;
    @FXML private TextField userIdField;

    @FXML private Label descError;
    @FXML private Label postIdError;
    @FXML private Label userIdError;

    private final savesServices savesServices = new savesServices();

    @FXML
    private void editSave() {
        if (!validate()) return;

        try {
            saves s = new saves();
            s.setDescription(descField.getText().trim());
            s.setPost_id(Integer.parseInt(postIdField.getText().trim()));
            s.setUser_id(Integer.parseInt(userIdField.getText().trim()));

            savesServices.modifier_saves(s);
            showAlert(Alert.AlertType.INFORMATION, "modification avec succes!");
        } catch (Exception e) {
            showAlert(Alert.AlertType.ERROR, e.getMessage());
        }
    }

    @FXML
    private void goBack() throws Exception {
        SceneManager.switchTo("SavesMenu.fxml");
    }

    private boolean validate() {
        descError.setText("");
        postIdError.setText("");
        userIdError.setText("");

        String desc = descField.getText().trim();
        String postId = postIdField.getText().trim();
        String userId = userIdField.getText().trim();

        if (desc.isEmpty()) { descError.setText("Description obligatoire."); return false; }
        if (desc.length() > 255) { descError.setText("Max 255 caractères."); return false; }

        if (postId.isEmpty() || !postId.matches("\\d+") || Integer.parseInt(postId) <= 0) {
            postIdError.setText("Post ID invalide.");
            return false;
        }

        if (userId.isEmpty() || !userId.matches("\\d+") || Integer.parseInt(userId) <= 0) {
            userIdError.setText("User ID invalide.");
            return false;
        }

        return true;
    }

    private void showAlert(Alert.AlertType type, String msg) {
        Alert alert = new Alert(type);
        alert.setContentText(msg);
        alert.showAndWait();
    }
}