package com.mindboost.controllers;

import com.mindboost.dao.ProfileDAO;
import com.mindboost.dao.UserDAO;
import com.mindboost.models.Profile;
import com.mindboost.models.User;
import com.mindboost.utils.SceneManager;
import com.mindboost.utils.SessionManager;
import com.mindboost.utils.ValidationUtils;
import javafx.fxml.FXML;
import javafx.scene.control.*;
import javafx.scene.layout.VBox;

import java.sql.SQLException;
import java.util.List;

public class ProfileFormController {

    public static Profile profileToEdit = null;

    @FXML private Label              pageTitle;
    @FXML private Label              pageSubtitle;
    @FXML private VBox               userSelectorBox;
    @FXML private ComboBox<User>     userCombo;
    @FXML private TextField          firstNameField;
    @FXML private TextField          lastNameField;
    @FXML private TextField          phoneField;
    @FXML private ComboBox<String>   typeCombo;
    @FXML private TextField          avatarField;
    @FXML private TextArea           bioArea;
    @FXML private Button             saveBtn;
    @FXML private Label              errorLabel;
    @FXML private Label              successLabel;

    private final ProfileDAO profileDAO = new ProfileDAO();
    private final UserDAO    userDAO    = new UserDAO();
    private boolean isEdit = false;

    private static final String[] MBTI_TYPES = {
        "INTJ","INTP","ENTJ","ENTP","INFJ","INFP","ENFJ","ENFP",
        "ISTJ","ISFJ","ESTJ","ESFJ","ISTP","ISFP","ESTP","ESFP"
    };

    @FXML public void initialize() {
        if (!SessionManager.getInstance().isAdmin()) {
            SceneManager.switchTo("/com/mindboost/fxml/Login.fxml");
            return;
        }

        typeCombo.getItems().addAll(MBTI_TYPES);

        if (profileToEdit != null) {
            isEdit = true;
            pageTitle.setText("Modifier le Profil");
            pageSubtitle.setText("Modification du profil : " + profileToEdit.getFullName());
            saveBtn.setText("💾  Sauvegarder");
            userSelectorBox.setVisible(false);
            userSelectorBox.setManaged(false);

            firstNameField.setText(profileToEdit.getFirstName());
            lastNameField.setText(profileToEdit.getLastName());
            if (profileToEdit.getPhone() != null)         phoneField.setText(profileToEdit.getPhone());
            if (profileToEdit.getAvatarUrl() != null)     avatarField.setText(profileToEdit.getAvatarUrl());
            if (profileToEdit.getBio() != null)            bioArea.setText(profileToEdit.getBio());
            if (profileToEdit.getPersonalityType() != null) typeCombo.setValue(profileToEdit.getPersonalityType());

        } else {
            isEdit = false;
            pageTitle.setText("Ajouter un Profil");
            pageSubtitle.setText("Créer un profil pour un utilisateur existant");
            saveBtn.setText("➕  Créer le profil");

            // Load users without profiles
            try {
                List<User> usersWithoutProfile = userDAO.getUsersWithoutProfile();
                userCombo.getItems().addAll(usersWithoutProfile);
                if (usersWithoutProfile.isEmpty()) {
                    userCombo.setPromptText("Tous les utilisateurs ont déjà un profil");
                    userCombo.setDisable(true);
                }
            } catch (SQLException e) { e.printStackTrace(); }
        }
    }

    @FXML public void handleSave() {
        String firstName = firstNameField.getText().trim();
        String lastName  = lastNameField.getText().trim();
        String phone     = phoneField.getText().trim();
        String avatar    = avatarField.getText().trim();
        String type      = typeCombo.getValue();
        String bio       = bioArea.getText().trim();

        String validationError = ValidationUtils.validateProfile(firstName, lastName, phone, avatar);
        if (validationError != null) { showError(validationError); return; }

        try {
            if (isEdit && profileToEdit != null) {
                profileToEdit.setFirstName(firstName);
                profileToEdit.setLastName(lastName);
                profileToEdit.setPhone(phone.isEmpty() ? null : phone);
                profileToEdit.setAvatarUrl(avatar.isEmpty() ? null : avatar);
                profileToEdit.setPersonalityType(type);
                profileToEdit.setBio(bio.isEmpty() ? null : bio);
                profileDAO.updateProfile(profileToEdit);
                showSuccess("✅ Profil modifié avec succès !");
                profileToEdit = null;

            } else {
                User selectedUser = userCombo.getValue();
                if (selectedUser == null) { showError("Veuillez sélectionner un utilisateur."); return; }

                Profile newProfile = new Profile(selectedUser.getId(), firstName, lastName);
                newProfile.setPhone(phone.isEmpty() ? null : phone);
                newProfile.setAvatarUrl(avatar.isEmpty() ? null : avatar);
                newProfile.setPersonalityType(type);
                newProfile.setBio(bio.isEmpty() ? null : bio);
                profileDAO.addProfile(newProfile);
                showSuccess("✅ Profil créé avec succès !");
                clearForm();
            }
        } catch (SQLException e) {
            showError("Erreur base de données : " + e.getMessage());
            e.printStackTrace();
        }
    }

    private void clearForm() {
        firstNameField.clear(); lastNameField.clear();
        phoneField.clear(); avatarField.clear(); bioArea.clear();
        typeCombo.setValue(null); userCombo.setValue(null);
    }

    private void showError(String msg) {
        errorLabel.setText(msg); errorLabel.setVisible(true);
        successLabel.setVisible(false);
    }

    private void showSuccess(String msg) {
        successLabel.setText(msg); successLabel.setVisible(true);
        errorLabel.setVisible(false);
    }

    @FXML public void goToList()       { profileToEdit = null; SceneManager.switchTo("/com/mindboost/fxml/ProfileListView.fxml"); }
    @FXML public void goDashboard()    { SceneManager.switchTo("/com/mindboost/fxml/AdminDashboard.fxml"); }
    @FXML public void goToUserList()   { SceneManager.switchTo("/com/mindboost/fxml/UserListView.fxml"); }
    @FXML public void handleLogout()   { SessionManager.getInstance().logout(); SceneManager.switchTo("/com/mindboost/fxml/Login.fxml"); }
}
