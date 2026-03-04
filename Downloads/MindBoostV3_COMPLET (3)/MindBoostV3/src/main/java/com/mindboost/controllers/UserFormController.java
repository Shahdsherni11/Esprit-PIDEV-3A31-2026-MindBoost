package com.mindboost.controllers;

import com.mindboost.dao.UserDAO;
import com.mindboost.models.User;
import com.mindboost.utils.SceneManager;
import com.mindboost.utils.SessionManager;
import com.mindboost.utils.ValidationUtils;
import javafx.fxml.FXML;
import javafx.scene.control.*;

public class UserFormController {

    // Static transfer of user to edit (simple approach for JavaFX)
    public static User userToEdit = null;

    @FXML private Label         pageTitle;
    @FXML private Label         pageSubtitle;
    @FXML private TextField     emailField;
    @FXML private PasswordField passwordField;
    @FXML private Label         passwordHint;
    @FXML private Label         passwordLabel;
    @FXML private ComboBox<String> roleCombo;
    @FXML private CheckBox      verifiedCheck;
    @FXML private Button        saveBtn;
    @FXML private Label         errorLabel;
    @FXML private Label         successLabel;

    private final UserDAO userDAO = new UserDAO();
    private boolean isEdit = false;

    @FXML public void initialize() {
        if (!SessionManager.getInstance().isAdmin()) {
            SceneManager.switchTo("/com/mindboost/fxml/Login.fxml");
            return;
        }

        roleCombo.getItems().addAll("user", "psychologist", "admin");

        if (userToEdit != null) {
            isEdit = true;
            pageTitle.setText("Modifier l'Utilisateur");
            pageSubtitle.setText("Modification du compte : " + userToEdit.getEmail());
            saveBtn.setText("💾  Sauvegarder");
            passwordLabel.setText("Nouveau mot de passe (optionnel)");
            passwordHint.setVisible(true);

            emailField.setText(userToEdit.getEmail());
            roleCombo.setValue(userToEdit.getRole());
            verifiedCheck.setSelected(userToEdit.isVerified());
        } else {
            isEdit = false;
            pageTitle.setText("Ajouter un Utilisateur");
            pageSubtitle.setText("Créer un nouveau compte sur la plateforme");
            saveBtn.setText("➕  Créer l'utilisateur");
        }
    }

    @FXML public void handleSave() {
        String email    = emailField.getText().trim();
        String password = passwordField.getText();
        String role     = roleCombo.getValue();

        // Validate email
        if (!ValidationUtils.isValidEmail(email)) {
            showError("Email invalide. Format : exemple@domaine.com"); return;
        }
        // Validate role
        if (role == null || role.isEmpty()) {
            showError("Veuillez sélectionner un rôle."); return;
        }

        try {
            if (isEdit && userToEdit != null) {
                // Check email conflict
                User existing = userDAO.getByEmail(email);
                if (existing != null && existing.getId() != userToEdit.getId()) {
                    showError("Cet email est déjà utilisé par un autre compte."); return;
                }

                userToEdit.setEmail(email);
                userToEdit.setRole(role);
                userToEdit.setVerified(verifiedCheck.isSelected());
                userDAO.updateUser(userToEdit);

                // Update password only if provided
                if (!password.isEmpty()) {
                    if (!ValidationUtils.isValidPassword(password)) {
                        showError("Mot de passe : min 8 chars, 1 majuscule, 1 chiffre."); return;
                    }
                    userDAO.updatePassword(userToEdit.getId(), password);
                }

                showSuccess("✅ Utilisateur modifié avec succès !");
                userToEdit = null;

            } else {
                // CREATE
                if (!ValidationUtils.isValidPassword(password)) {
                    showError("Mot de passe : min 8 chars, 1 majuscule, 1 chiffre."); return;
                }
                if (userDAO.getByEmail(email) != null) {
                    showError("Cet email est déjà utilisé."); return;
                }
                User newUser = new User(email, password, role);
                newUser.setVerified(verifiedCheck.isSelected());
                userDAO.addUser(newUser);
                showSuccess("✅ Utilisateur créé avec succès !");
                clearForm();
            }
        } catch (Exception e) {
            showError("Erreur base de données : " + e.getMessage());
            e.printStackTrace();
        }
    }

    private void clearForm() {
        emailField.clear();
        passwordField.clear();
        roleCombo.setValue("user");
        verifiedCheck.setSelected(false);
    }

    private void showError(String msg) {
        errorLabel.setText(msg); errorLabel.setVisible(true);
        successLabel.setVisible(false);
    }

    private void showSuccess(String msg) {
        successLabel.setText(msg); successLabel.setVisible(true);
        errorLabel.setVisible(false);
    }

    @FXML public void goToList()        { userToEdit = null; SceneManager.switchTo("/com/mindboost/fxml/UserListView.fxml"); }
    @FXML public void goDashboard()     { SceneManager.switchTo("/com/mindboost/fxml/AdminDashboard.fxml"); }
    @FXML public void goToProfileList() { SceneManager.switchTo("/com/mindboost/fxml/ProfileListView.fxml"); }
    @FXML public void handleLogout()    { SessionManager.getInstance().logout(); SceneManager.switchTo("/com/mindboost/fxml/Login.fxml"); }
}
