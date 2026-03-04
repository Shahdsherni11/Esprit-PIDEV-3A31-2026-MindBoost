package com.mindboost.controllers;

import com.mindboost.dao.ProfileDAO;
import com.mindboost.dao.UserDAO;
import com.mindboost.models.User;
import com.mindboost.utils.SceneManager;
import com.mindboost.utils.SessionManager;
import com.mindboost.utils.ValidationUtils;
import javafx.fxml.FXML;
import javafx.scene.control.*;

public class LoginController {

    @FXML private TextField emailField;
    @FXML private PasswordField passwordField;
    @FXML private Label errorLabel;

    private final UserDAO userDAO = new UserDAO();
    private final ProfileDAO profileDAO = new ProfileDAO();

    @FXML public void initialize() {
        passwordField.setOnAction(e -> handleLogin());
    }

    @FXML public void handleLogin() {
        String email    = emailField.getText().trim();
        String password = passwordField.getText();

        if (!ValidationUtils.isValidEmail(email)) { showError("Email invalide."); return; }
        if (password.isEmpty()) { showError("Mot de passe requis."); return; }

        try {
            User user = userDAO.authenticate(email, password);
            if (user == null) {
                showError("Email ou mot de passe incorrect.");
                passwordField.clear();
                return;
            }
            SessionManager.getInstance().setCurrentUser(user);
            SessionManager.getInstance().setCurrentProfile(profileDAO.getByUserId(user.getId()));

            if ("admin".equals(user.getRole()))
                SceneManager.switchTo("/com/mindboost/fxml/AdminDashboard.fxml");
            else
                SceneManager.switchTo("/com/mindboost/fxml/UserDashboard.fxml");
        } catch (Exception e) {
            showError("Erreur base de données : " + e.getMessage());
        }
    }

    /** 👁️ Navigue vers la reconnaissance faciale */
    @FXML public void handleFaceLogin() {
        SceneManager.switchTo("/com/mindboost/fxml/FaceLogin.fxml");
    }

    @FXML public void handleRegister() {
        SceneManager.switchTo("/com/mindboost/fxml/Register.fxml");
    }

    private void showError(String msg) {
        errorLabel.setText(msg); errorLabel.setVisible(true);
    }
}
