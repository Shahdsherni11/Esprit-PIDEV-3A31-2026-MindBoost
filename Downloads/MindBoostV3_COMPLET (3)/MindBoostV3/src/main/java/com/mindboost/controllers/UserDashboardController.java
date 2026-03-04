package com.mindboost.controllers;

import com.mindboost.dao.PsychProfileDAO;
import com.mindboost.dao.ProfileDAO;
import com.mindboost.dao.UserDAO;
import com.mindboost.models.Profile;
import com.mindboost.models.PsychProfile;
import com.mindboost.models.User;
import com.mindboost.services.AdaptiveUIService;
import com.mindboost.services.PersonalityEngineService;
import com.mindboost.utils.SceneManager;
import com.mindboost.utils.SessionManager;
import com.mindboost.utils.ValidationUtils;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.geometry.Pos;
import javafx.scene.Node;
import javafx.scene.control.*;
import javafx.scene.layout.*;

import java.sql.SQLException;

public class UserDashboardController {

    @FXML private Label welcomeLabel;
    @FXML private Label pageSubtitle;
    @FXML private Label userEmailLabel;
    @FXML private Label userRoleLabel;
    @FXML private Label accountEmailDisplay;
    @FXML private Label accountRoleDisplay;
    @FXML private Label accountCreatedDisplay;
    @FXML private Label profileNameDisplay;
    @FXML private Label profileTypeDisplay;
    @FXML private Label profilePhoneDisplay;
    @FXML private Label psychTypeDisplay;
    @FXML private Label psychScoreDisplay;
    @FXML private Label psychTypeLabel;
    @FXML private Label anomalyIndicator;
    @FXML private VBox  psychIndicator;
    @FXML private VBox  dynamicContent;
    @FXML private HBox  homeCards;
    @FXML private HBox  quickActions;

    private final UserDAO        userDAO    = new UserDAO();
    private final ProfileDAO     profileDAO = new ProfileDAO();
    private final PsychProfileDAO psychDAO  = new PsychProfileDAO();
    private User         currentUser;
    private Profile      currentProfile;
    private PsychProfile psychProfile;

    // 🧬 Moteur de détection comportement — actif pendant toute la session
    private PersonalityEngineService personalityEngine;

    @FXML public void initialize() {
        currentUser = SessionManager.getInstance().getCurrentUser();
        if (currentUser == null) { SceneManager.switchTo("/com/mindboost/fxml/Login.fxml"); return; }
        if ("admin".equals(currentUser.getRole())) { SceneManager.switchTo("/com/mindboost/fxml/AdminDashboard.fxml"); return; }

        // Démarre le moteur de comportement
        personalityEngine = new PersonalityEngineService(currentUser.getId());

        refreshProfile();
        refreshPsychProfile();
        updateHeader();
        applyAdaptiveTheme();
    }

    private void applyAdaptiveTheme() {
        // Applique le thème adaptatif selon le profil psy
        if (psychProfile != null) {
            AdaptiveUIService.UITheme theme = AdaptiveUIService.determineTheme(psychProfile);
            // L'application réelle du CSS nécessite de modifier la Scene
            // On met à jour le message de bienvenue adaptatif
        }
    }

    private void refreshPsychProfile() {
        try {
            psychProfile = psychDAO.getByUserId(currentUser.getId());
            if (psychProfile == null) {
                psychProfile = new PsychProfile(currentUser.getId());
                psychDAO.save(psychProfile);
            }

            // Met à jour les indicateurs sidebar + carte
            if (psychIndicator != null) psychIndicator.setVisible(true);
            if (psychTypeLabel != null) psychTypeLabel.setText(psychProfile.getDetectedType());
            if (psychTypeDisplay != null) {
                String emoji = switch(psychProfile.getDetectedType()) {
                    case "ANALYTIQUE" -> "🔬";
                    case "CREATIF" -> "🎨";
                    case "SOCIAL" -> "💬";
                    case "EMPATHIQUE" -> "💙";
                    case "LEADER" -> "👑";
                    default -> "🧠";
                };
                psychTypeDisplay.setText(emoji + " " + psychProfile.getDetectedType());
            }
            if (psychScoreDisplay != null) {
                double anomaly = psychProfile.getAnomalyScore();
                String anomalyTxt = anomaly >= 70 ? "🚨 Anomalie critique !" :
                                    anomaly >= 50 ? "⚠️ Anomalie détectée" :
                                    "✅ Profil stable";
                String anomalyColor = anomaly >= 70 ? "#E74C3C" : anomaly >= 50 ? "#F39C12" : "#2ECC71";
                psychScoreDisplay.setText(anomalyTxt);
                psychScoreDisplay.setStyle("-fx-text-fill:" + anomalyColor + ";-fx-font-size:12px;");
            }
            if (anomalyIndicator != null) {
                double anomaly = psychProfile.getAnomalyScore();
                if (anomaly >= 50) {
                    anomalyIndicator.setText("⚠️ " + (int)anomaly + "% anomalie");
                    anomalyIndicator.setStyle("-fx-text-fill:#F39C12;-fx-font-size:10px;");
                }
            }

            // Bienvenue personnalisé
            if (welcomeLabel != null) {
                String name = currentProfile != null ? currentProfile.getFirstName() : currentUser.getEmail().split("@")[0];
                welcomeLabel.setText(AdaptiveUIService.getPersonalizedWelcome(psychProfile, name));
            }
        } catch (Exception e) { e.printStackTrace(); }
    }

    private void updateHeader() {
        String name = currentProfile != null ? currentProfile.getFirstName() : currentUser.getEmail().split("@")[0];
        if (welcomeLabel != null && psychProfile == null)
            welcomeLabel.setText("Bienvenue, " + name + " ! 🌟");
        if (userEmailLabel != null) userEmailLabel.setText(currentUser.getEmail());
        if (userRoleLabel != null)  userRoleLabel.setText(currentUser.getRole().toUpperCase());
        if (accountEmailDisplay != null) accountEmailDisplay.setText(currentUser.getEmail());
        if (accountRoleDisplay != null) {
            accountRoleDisplay.setText(currentUser.getRole().toUpperCase());
            accountRoleDisplay.setStyle("-fx-text-fill:" + roleColor(currentUser.getRole()) + ";-fx-font-size:14px;-fx-font-weight:bold;");
        }
        if (accountCreatedDisplay != null && currentUser.getCreatedAt() != null)
            accountCreatedDisplay.setText("Membre depuis : " + currentUser.getCreatedAt().toLocalDate());

        if (currentProfile != null) {
            if (profileNameDisplay != null) profileNameDisplay.setText(currentProfile.getFullName());
            if (profileTypeDisplay != null) profileTypeDisplay.setText(currentProfile.getPersonalityType() != null
                ? "🧠 " + currentProfile.getPersonalityType() : "Type non défini");
            if (profilePhoneDisplay != null) profilePhoneDisplay.setText(currentProfile.getPhone() != null
                ? "📞 " + currentProfile.getPhone() : "Téléphone non renseigné");
        }
    }

    private void refreshProfile() {
        try {
            currentProfile = profileDAO.getByUserId(currentUser.getId());
            SessionManager.getInstance().setCurrentProfile(currentProfile);
        } catch (SQLException e) { e.printStackTrace(); }
    }

    // ==============================
    // NAVIGATION — NOUVELLES FONCTIONNALITÉS
    // ==============================

    @FXML public void showHome() {
        dynamicContent.getChildren().clear();
        if (homeCards != null) homeCards.setVisible(true);
        if (quickActions != null) quickActions.setVisible(true);
        // Enregistre la navigation
        if (personalityEngine != null) personalityEngine.recordNavigation("home");
    }

    /** 🧭 Cartographie Psychologique 5D */
    @FXML public void showPsychMap() {
        if (personalityEngine != null) {
            personalityEngine.recordNavigation("psych_map");
            runBehaviorAnalysis();
        }
        dynamicContent.getChildren().clear();
        if (homeCards != null) homeCards.setVisible(false);
        if (quickActions != null) quickActions.setVisible(false);
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/com/mindboost/fxml/PsychMap.fxml"));
            Node node = loader.load();
            dynamicContent.getChildren().add(node);
        } catch (Exception e) {
            showError("Erreur chargement Carte Psy: " + e.getMessage());
        }
    }

    /** 🤖 MindBot Chat */
    @FXML public void showMindBot() {
        if (personalityEngine != null) personalityEngine.recordNavigation("mindbot");
        dynamicContent.getChildren().clear();
        if (homeCards != null) homeCards.setVisible(false);
        if (quickActions != null) quickActions.setVisible(false);
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/com/mindboost/fxml/MindBotChat.fxml"));
            Node node = loader.load();
            dynamicContent.getChildren().add(node);
        } catch (Exception e) {
            showError("Erreur chargement MindBot: " + e.getMessage());
        }
    }

    /** Lance l'analyse comportementale en arrière-plan */
    private void runBehaviorAnalysis() {
        new Thread(() -> {
            try {
                psychProfile = personalityEngine.analyzeAndUpdate();
                javafx.application.Platform.runLater(this::refreshPsychProfile);
            } catch (Exception e) { e.printStackTrace(); }
        }).start();
    }

    // ==============================
    // PROFIL — CRUD existant
    // ==============================

    @FXML public void showMyProfile() {
        if (personalityEngine != null) { personalityEngine.recordNavigation("profile"); personalityEngine.recordClick("profile_menu"); }
        dynamicContent.getChildren().clear();
        if (homeCards != null) homeCards.setVisible(false);
        if (quickActions != null) quickActions.setVisible(false);
        refreshProfile();

        VBox card = new VBox(14); card.getStyleClass().add("form-container"); card.setMaxWidth(620);
        Label title = new Label("👤  Mon Profil"); title.getStyleClass().add("section-title");
        card.getChildren().add(title);

        if (currentProfile != null) {
            addRow(card, "Prénom",       currentProfile.getFirstName());
            addRow(card, "Nom",          currentProfile.getLastName());
            addRow(card, "Téléphone",    nvl(currentProfile.getPhone()));
            addRow(card, "Personnalité", nvl(currentProfile.getPersonalityType()));
            addRow(card, "Bio",          nvl(currentProfile.getBio()));

            HBox btns = new HBox(12);
            Button editBtn = new Button("✏️  Modifier"); editBtn.getStyleClass().add("btn-primary"); editBtn.setOnAction(e -> showEditProfile());
            Button delBtn  = new Button("🗑  Supprimer"); delBtn.getStyleClass().add("btn-danger");  delBtn.setOnAction(e -> deleteMyProfile());
            btns.getChildren().addAll(editBtn, delBtn);
            card.getChildren().add(btns);
        } else {
            Label info = new Label("Vous n'avez pas encore créé votre profil.");
            info.setStyle("-fx-text-fill:#9B9BB0;");
            Button createBtn = new Button("➕  Créer mon profil"); createBtn.getStyleClass().add("btn-primary");
            createBtn.setOnAction(e -> showEditProfile());
            card.getChildren().addAll(info, createBtn);
        }
        dynamicContent.getChildren().add(card);
    }

    @FXML public void showEditProfile() {
        dynamicContent.getChildren().clear();
        if (homeCards != null) homeCards.setVisible(false);
        if (quickActions != null) quickActions.setVisible(false);
        refreshProfile();

        VBox form = new VBox(16); form.getStyleClass().add("form-container"); form.setMaxWidth(580);
        Label title = new Label(currentProfile == null ? "➕  Créer mon Profil" : "✏️  Modifier mon Profil");
        title.getStyleClass().add("section-title");

        Label fnLbl = lbl("Prénom *"); TextField fnField = field(currentProfile != null ? currentProfile.getFirstName() : "", "John");
        Label lnLbl = lbl("Nom *");    TextField lnField = field(currentProfile != null ? currentProfile.getLastName() : "", "Doe");
        Label phoneLbl = lbl("Téléphone"); TextField phoneField = field(currentProfile != null ? nvlEmpty(currentProfile.getPhone()) : "", "+21612345678");
        Label typeLbl = lbl("Type MBTI");
        ComboBox<String> typeCombo = new ComboBox<>();
        typeCombo.getItems().addAll("INTJ","INTP","ENTJ","ENTP","INFJ","INFP","ENFJ","ENFP","ISTJ","ISFJ","ESTJ","ESFJ","ISTP","ISFP","ESTP","ESFP");
        typeCombo.getStyleClass().add("form-combo"); typeCombo.setPrefWidth(540);
        if (currentProfile != null && currentProfile.getPersonalityType() != null) typeCombo.setValue(currentProfile.getPersonalityType());
        Label bioLbl = lbl("Bio"); TextArea bioArea = new TextArea(currentProfile != null ? nvlEmpty(currentProfile.getBio()) : "");
        bioArea.getStyleClass().add("form-area"); bioArea.setPrefRowCount(3);
        Label errLbl = new Label(); errLbl.getStyleClass().add("error-label"); errLbl.setVisible(false);
        Label okLbl = new Label();  okLbl.getStyleClass().add("success-label"); okLbl.setVisible(false);
        Button saveBtn = new Button(currentProfile == null ? "➕  Créer" : "💾  Sauvegarder");
        saveBtn.getStyleClass().add("btn-primary");

        // Tracking frappe
        fnField.setOnKeyTyped(e -> { if (personalityEngine != null) personalityEngine.recordKeyPress(); });
        lnField.setOnKeyTyped(e -> { if (personalityEngine != null) personalityEngine.recordKeyPress(); });

        saveBtn.setOnAction(e -> {
            if (personalityEngine != null) personalityEngine.recordClick("save_profile");
            String err = ValidationUtils.validateProfile(fnField.getText().trim(), lnField.getText().trim(), phoneField.getText().trim(), "");
            if (err != null) { errLbl.setText(err); errLbl.setVisible(true); return; }
            try {
                if (currentProfile == null) {
                    Profile p = new Profile(currentUser.getId(), fnField.getText().trim(), lnField.getText().trim());
                    p.setPhone(phoneField.getText().trim().isEmpty() ? null : phoneField.getText().trim());
                    p.setPersonalityType(typeCombo.getValue());
                    p.setBio(bioArea.getText().trim().isEmpty() ? null : bioArea.getText().trim());
                    profileDAO.addProfile(p);
                } else {
                    currentProfile.setFirstName(fnField.getText().trim()); currentProfile.setLastName(lnField.getText().trim());
                    currentProfile.setPhone(phoneField.getText().trim().isEmpty() ? null : phoneField.getText().trim());
                    currentProfile.setPersonalityType(typeCombo.getValue());
                    currentProfile.setBio(bioArea.getText().trim().isEmpty() ? null : bioArea.getText().trim());
                    profileDAO.updateProfile(currentProfile);
                }
                refreshProfile(); updateHeader();
                okLbl.setText("✅ Profil sauvegardé !"); okLbl.setVisible(true); errLbl.setVisible(false);
            } catch (SQLException ex) { errLbl.setText("Erreur : " + ex.getMessage()); errLbl.setVisible(true); }
        });

        form.getChildren().addAll(title, fnLbl, fnField, lnLbl, lnField, phoneLbl, phoneField, typeLbl, typeCombo, bioLbl, bioArea, errLbl, okLbl, saveBtn);
        dynamicContent.getChildren().add(form);
    }

    private void deleteMyProfile() {
        Alert alert = new Alert(Alert.AlertType.CONFIRMATION, "Supprimer votre profil ?", ButtonType.YES, ButtonType.NO);
        alert.showAndWait().ifPresent(btn -> {
            if (btn == ButtonType.YES) {
                try { profileDAO.deleteProfile(currentProfile.getId()); currentProfile = null; updateHeader(); showMyProfile(); }
                catch (SQLException e) { e.printStackTrace(); }
            }
        });
    }

    @FXML public void showMyAccount() {
        dynamicContent.getChildren().clear();
        if (homeCards != null) homeCards.setVisible(false);
        if (quickActions != null) quickActions.setVisible(false);
        VBox form = new VBox(16); form.getStyleClass().add("form-container"); form.setMaxWidth(560);
        Label title = new Label("👤  Mon Compte"); title.getStyleClass().add("section-title");
        addRow(form, "Email", currentUser.getEmail()); addRow(form, "Rôle", currentUser.getRole().toUpperCase());
        Label newEmailLbl = lbl("Modifier email"); TextField newEmailField = field(currentUser.getEmail(), "nouveau@email.com");
        Label errLbl = new Label(); errLbl.getStyleClass().add("error-label"); errLbl.setVisible(false);
        Label okLbl = new Label();  okLbl.getStyleClass().add("success-label"); okLbl.setVisible(false);
        Button updateBtn = new Button("💾  Mettre à jour"); updateBtn.getStyleClass().add("btn-primary");
        updateBtn.setOnAction(e -> {
            try {
                String newEmail = newEmailField.getText().trim();
                if (!ValidationUtils.isValidEmail(newEmail)) { errLbl.setText("Email invalide."); errLbl.setVisible(true); return; }
                currentUser.setEmail(newEmail); userDAO.updateUser(currentUser);
                okLbl.setText("✅ Email mis à jour !"); okLbl.setVisible(true);
            } catch (Exception ex) { errLbl.setText(ex.getMessage()); errLbl.setVisible(true); }
        });

        Button deleteBtn = new Button("🗑  Supprimer mon compte"); deleteBtn.getStyleClass().add("btn-danger");
        deleteBtn.setOnAction(e -> {
            Alert a = new Alert(Alert.AlertType.CONFIRMATION, "Supprimer votre compte définitivement ?", ButtonType.YES, ButtonType.NO);
            a.showAndWait().ifPresent(btn -> {
                if (btn == ButtonType.YES) {
                    try { userDAO.deleteUser(currentUser.getId()); SessionManager.getInstance().logout(); SceneManager.switchTo("/com/mindboost/fxml/Login.fxml"); }
                    catch (SQLException ex) { ex.printStackTrace(); }
                }
            });
        });
        form.getChildren().addAll(title, newEmailLbl, newEmailField, errLbl, okLbl, updateBtn, new Separator(), deleteBtn);
        dynamicContent.getChildren().add(form);
    }

    @FXML public void showChangePassword() {
        dynamicContent.getChildren().clear();
        if (homeCards != null) homeCards.setVisible(false);
        if (quickActions != null) quickActions.setVisible(false);
        VBox form = new VBox(16); form.getStyleClass().add("form-container"); form.setMaxWidth(500);
        Label title = new Label("🔐  Changer le Mot de Passe"); title.getStyleClass().add("section-title");
        PasswordField curField = new PasswordField(); curField.getStyleClass().add("form-field"); curField.setPromptText("Mot de passe actuel");
        PasswordField newField = new PasswordField(); newField.getStyleClass().add("form-field"); newField.setPromptText("Nouveau mot de passe");
        PasswordField confField = new PasswordField(); confField.getStyleClass().add("form-field"); confField.setPromptText("Confirmer");
        Label errLbl = new Label(); errLbl.getStyleClass().add("error-label"); errLbl.setVisible(false);
        Label okLbl = new Label(); okLbl.getStyleClass().add("success-label"); okLbl.setVisible(false);
        Button saveBtn = new Button("💾  Mettre à jour"); saveBtn.getStyleClass().add("btn-primary");
        saveBtn.setOnAction(e -> {
            try {
                if (userDAO.authenticate(currentUser.getEmail(), curField.getText()) == null) { errLbl.setText("Mot de passe actuel incorrect."); errLbl.setVisible(true); return; }
                if (!ValidationUtils.isValidPassword(newField.getText())) { errLbl.setText("Mot de passe invalide."); errLbl.setVisible(true); return; }
                if (!newField.getText().equals(confField.getText())) { errLbl.setText("Les mots de passe ne correspondent pas."); errLbl.setVisible(true); return; }
                userDAO.updatePassword(currentUser.getId(), newField.getText());
                okLbl.setText("✅ Mot de passe mis à jour !"); okLbl.setVisible(true);
            } catch (Exception ex) { errLbl.setText(ex.getMessage()); errLbl.setVisible(true); }
        });
        form.getChildren().addAll(title, lbl("Actuel"), curField, lbl("Nouveau"), newField, lbl("Confirmer"), confField, errLbl, okLbl, saveBtn);
        dynamicContent.getChildren().add(form);
    }

    @FXML public void handleLogout() {
        SessionManager.getInstance().logout();
        SceneManager.switchTo("/com/mindboost/fxml/Login.fxml");
    }

    // Helpers
    private void addRow(VBox p, String l, String v) {
        HBox row = new HBox(16); row.setAlignment(Pos.CENTER_LEFT);
        row.setStyle("-fx-padding:8 0;-fx-border-color:transparent transparent rgba(255,255,255,0.06) transparent;-fx-border-width:1;");
        Label lbl = new Label(l + " :"); lbl.setStyle("-fx-text-fill:#9B9BB0;-fx-font-size:13px;-fx-min-width:160;");
        Label val = new Label(v != null ? v : "—"); val.setStyle("-fx-text-fill:white;-fx-font-size:14px;"); val.setWrapText(true);
        row.getChildren().addAll(lbl, val); p.getChildren().add(row);
    }
    private Label lbl(String t) { Label l = new Label(t); l.getStyleClass().add("form-label"); return l; }
    private TextField field(String v, String prompt) { TextField tf = new TextField(v != null ? v : ""); tf.getStyleClass().add("form-field"); tf.setPromptText(prompt); return tf; }
    private String nvl(String s) { return s != null && !s.isEmpty() ? s : "Non renseigné"; }
    private String nvlEmpty(String s) { return s != null ? s : ""; }
    private String roleColor(String r) { return switch(r) { case "psychologist" -> "#4ECDC4"; case "admin" -> "#FF6B9D"; default -> "#A89CFF"; }; }
    private void showError(String msg) { Label err = new Label("❌ " + msg); err.setStyle("-fx-text-fill:#E74C3C;"); dynamicContent.getChildren().add(err); }
}
