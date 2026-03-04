package com.mindboost.controllers;

import com.mindboost.dao.ProfileDAO;
import com.mindboost.dao.UserDAO;
import com.mindboost.models.User;
import com.mindboost.utils.SceneManager;
import com.mindboost.utils.SessionManager;
import javafx.beans.property.SimpleStringProperty;
import javafx.collections.FXCollections;
import javafx.fxml.FXML;
import javafx.scene.control.*;
import javafx.scene.control.cell.PropertyValueFactory;

import java.sql.SQLException;
import java.util.List;

public class AdminDashboardController {

    @FXML private Label      adminEmailLabel;
    @FXML private Label      totalUsersLabel;
    @FXML private Label      psychoCountLabel;
    @FXML private Label      userCountLabel;
    @FXML private Label      profileCountLabel;
    @FXML private TableView<User> recentUsersTable;
    @FXML private TableColumn<User, Integer> colId;
    @FXML private TableColumn<User, String>  colEmail;
    @FXML private TableColumn<User, String>  colRole;
    @FXML private TableColumn<User, String>  colVerified;
    @FXML private TableColumn<User, String>  colDate;

    private final UserDAO    userDAO    = new UserDAO();
    private final ProfileDAO profileDAO = new ProfileDAO();

    @FXML public void initialize() {
        // ✅ Security check: only admin can access this view
        if (!SessionManager.getInstance().isAdmin()) {
            SceneManager.switchTo("/com/mindboost/fxml/Login.fxml");
            return;
        }

        User admin = SessionManager.getInstance().getCurrentUser();
        if (admin != null) adminEmailLabel.setText(admin.getEmail());

        loadStats();
        loadRecentUsers();
    }

    private void loadStats() {
        try {
            totalUsersLabel.setText(String.valueOf(userDAO.countTotal()));
            psychoCountLabel.setText(String.valueOf(userDAO.countByRole("psychologist")));
            userCountLabel.setText(String.valueOf(userDAO.countByRole("user")));
            profileCountLabel.setText(String.valueOf(profileDAO.countTotal()));
        } catch (SQLException e) { e.printStackTrace(); }
    }

    private void loadRecentUsers() {
        try {
            colId.setCellValueFactory(new PropertyValueFactory<>("id"));
            colEmail.setCellValueFactory(new PropertyValueFactory<>("email"));
            colRole.setCellValueFactory(new PropertyValueFactory<>("role"));
            colVerified.setCellValueFactory(d ->
                new SimpleStringProperty(d.getValue().isVerified() ? "✅ Oui" : "❌ Non"));
            colDate.setCellValueFactory(d ->
                new SimpleStringProperty(
                    d.getValue().getCreatedAt() != null
                        ? d.getValue().getCreatedAt().toLocalDate().toString() : ""));

            List<User> users = userDAO.getAllUsers();
            recentUsersTable.setItems(FXCollections.observableArrayList(
                users.subList(0, Math.min(8, users.size()))
            ));
        } catch (SQLException e) { e.printStackTrace(); }
    }

    // Navigation
    @FXML public void showDashboard()    { initialize(); }
    @FXML public void goToUserList()     { SceneManager.switchTo("/com/mindboost/fxml/UserListView.fxml"); }
    @FXML public void goToProfileList()  { SceneManager.switchTo("/com/mindboost/fxml/ProfileListView.fxml"); }

    @FXML public void goToAddUser() {
        SceneManager.switchTo("/com/mindboost/fxml/UserFormView.fxml");
    }

    @FXML public void goToAddProfile() {
        SceneManager.switchTo("/com/mindboost/fxml/ProfileFormView.fxml");
    }

    @FXML public void handleLogout() {
        SessionManager.getInstance().logout();
        SceneManager.switchTo("/com/mindboost/fxml/Login.fxml");
    }
}
