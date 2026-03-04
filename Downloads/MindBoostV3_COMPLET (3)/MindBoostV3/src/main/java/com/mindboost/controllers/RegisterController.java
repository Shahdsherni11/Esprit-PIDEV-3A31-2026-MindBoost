package com.mindboost.controllers;

import com.mindboost.dao.UserDAO;
import com.mindboost.models.User;
import com.mindboost.utils.SceneManager;
import com.mindboost.utils.ValidationUtils;
import javafx.fxml.FXML;
import javafx.scene.control.*;

public class RegisterController {

    @FXML private TextField     emailField;
    @FXML private PasswordField passwordField;
    @FXML private PasswordField confirmPasswordField;
    @FXML private ComboBox<String> roleCombo;
    @FXML private Label         errorLabel;

    private final UserDAO userDAO = new UserDAO();

    @FXML public void initialize() {
        roleCombo.getItems().addAll("user", "psychologist");
        roleCombo.setValue("user");
    }

    @FXML public void handleRegister() {
        String email   = emailField.getText().trim();
        String pass    = passwordField.getText();
        String confirm = confirmPasswordField.getText();
        String role    = roleCombo.getValue();

        String err = ValidationUtils.validateUser(email, pass, role);
        if (err != null) { showError(err); return; }

        if (!pass.equals(confirm)) { showError("Les mots de passe ne correspondent pas."); return; }

        try {
            if (userDAO.getByEmail(email) != null) {
                showError("Cet email est déjà utilisé."); return;
            }
            User newUser = new User(email, pass, role);
            if (userDAO.addUser(newUser)) {
                SceneManager.switchTo("/com/mindboost/fxml/Login.fxml");
            } else {
                showError("Erreur lors de l'inscription.");
            }
        } catch (Exception e) {
            showError("Erreur : " + e.getMessage());
        }
    }

    @FXML public void goToLogin() {
        SceneManager.switchTo("/com/mindboost/fxml/Login.fxml");
    }

    private void showError(String msg) {
        errorLabel.setText(msg);
        errorLabel.setVisible(true);
    }
}
