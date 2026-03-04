package com.mindboost.controllers;

import com.mindboost.dao.UserDAO;
import com.mindboost.models.User;
import com.mindboost.utils.SceneManager;
import com.mindboost.utils.SessionManager;
import javafx.beans.property.SimpleStringProperty;
import javafx.collections.FXCollections;
import javafx.fxml.FXML;
import javafx.scene.control.*;
import javafx.scene.control.cell.PropertyValueFactory;
import javafx.scene.layout.HBox;

import java.sql.SQLException;
import java.util.List;

public class UserListController {

    @FXML private TextField        searchField;
    @FXML private TableView<User>  table;
    @FXML private TableColumn<User, Integer> colId;
    @FXML private TableColumn<User, String>  colEmail;
    @FXML private TableColumn<User, String>  colRole;
    @FXML private TableColumn<User, String>  colVerified;
    @FXML private TableColumn<User, String>  colDate;
    @FXML private TableColumn<User, Void>    colActions;
    @FXML private Label countLabel;

    private final UserDAO userDAO = new UserDAO();

    @FXML public void initialize() {
        // Security: admin only
        if (!SessionManager.getInstance().isAdmin()) {
            SceneManager.switchTo("/com/mindboost/fxml/Login.fxml");
            return;
        }
        setupColumns();
        loadData(null);

        searchField.textProperty().addListener((obs, old, nw) -> loadData(nw.isEmpty() ? null : nw));
    }

    private void setupColumns() {
        colId.setCellValueFactory(new PropertyValueFactory<>("id"));
        colEmail.setCellValueFactory(new PropertyValueFactory<>("email"));

        // Role with badge color
        colRole.setCellValueFactory(new PropertyValueFactory<>("role"));
        colRole.setCellFactory(col -> new TableCell<>() {
            @Override protected void updateItem(String role, boolean empty) {
                super.updateItem(role, empty);
                if (empty || role == null) { setGraphic(null); setText(null); return; }
                Label badge = new Label(role.toUpperCase());
                badge.getStyleClass().addAll("badge", "badge-" + role);
                setGraphic(badge); setText(null);
            }
        });

        colVerified.setCellValueFactory(d ->
            new SimpleStringProperty(d.getValue().isVerified() ? "✅ Oui" : "❌ Non"));

        colDate.setCellValueFactory(d ->
            new SimpleStringProperty(
                d.getValue().getCreatedAt() != null
                    ? d.getValue().getCreatedAt().toLocalDate().toString() : ""));

        // Actions column: Edit + Delete
        colActions.setCellFactory(col -> new TableCell<>() {
            private final Button editBtn = new Button("✏️ Modifier");
            private final Button delBtn  = new Button("🗑 Supprimer");
            {
                editBtn.getStyleClass().addAll("btn-edit", "btn-small");
                delBtn.getStyleClass().addAll("btn-danger", "btn-small");
            }
            @Override protected void updateItem(Void item, boolean empty) {
                super.updateItem(item, empty);
                if (empty) { setGraphic(null); return; }
                User u = getTableView().getItems().get(getIndex());

                editBtn.setOnAction(e -> {
                    // Pass user to form via session temp storage
                    UserFormController.userToEdit = u;
                    SceneManager.switchTo("/com/mindboost/fxml/UserFormView.fxml");
                });

                delBtn.setOnAction(e -> {
                    Alert alert = new Alert(Alert.AlertType.CONFIRMATION,
                        "Supprimer l'utilisateur « " + u.getEmail() + " » ?\nSon profil sera aussi supprimé.",
                        ButtonType.YES, ButtonType.NO);
                    alert.setTitle("Confirmation suppression");
                    alert.showAndWait().ifPresent(btn -> {
                        if (btn == ButtonType.YES) {
                            try {
                                userDAO.deleteUser(u.getId());
                                loadData(null);
                            } catch (SQLException ex) { ex.printStackTrace(); }
                        }
                    });
                });

                HBox box = new HBox(8, editBtn, delBtn);
                setGraphic(box);
            }
        });
    }

    private void loadData(String keyword) {
        try {
            List<User> users = (keyword == null) ? userDAO.getAllUsers() : userDAO.search(keyword);
            table.setItems(FXCollections.observableArrayList(users));
            countLabel.setText(users.size() + " utilisateur(s) trouvé(s)");
        } catch (SQLException e) { e.printStackTrace(); }
    }

    @FXML public void reload()           { searchField.clear(); loadData(null); }
    @FXML public void goToAdd()          { UserFormController.userToEdit = null; SceneManager.switchTo("/com/mindboost/fxml/UserFormView.fxml"); }
    @FXML public void goDashboard()      { SceneManager.switchTo("/com/mindboost/fxml/AdminDashboard.fxml"); }
    @FXML public void goToProfileList()  { SceneManager.switchTo("/com/mindboost/fxml/ProfileListView.fxml"); }
    @FXML public void handleLogout()     { SessionManager.getInstance().logout(); SceneManager.switchTo("/com/mindboost/fxml/Login.fxml"); }
}
