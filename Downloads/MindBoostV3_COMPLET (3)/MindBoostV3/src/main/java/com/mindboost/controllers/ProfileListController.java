package com.mindboost.controllers;

import com.mindboost.dao.ProfileDAO;
import com.mindboost.models.Profile;
import com.mindboost.utils.SceneManager;
import com.mindboost.utils.SessionManager;
import javafx.beans.property.SimpleStringProperty;
import javafx.collections.FXCollections;
import javafx.fxml.FXML;
import javafx.scene.control.*;
import javafx.scene.layout.HBox;

import java.sql.SQLException;
import java.util.List;

public class ProfileListController {

    @FXML private TextField           searchField;
    @FXML private TableView<Profile>  table;
    @FXML private TableColumn<Profile, Integer> colId;
    @FXML private TableColumn<Profile, String>  colName;
    @FXML private TableColumn<Profile, String>  colEmail;
    @FXML private TableColumn<Profile, String>  colPhone;
    @FXML private TableColumn<Profile, String>  colType;
    @FXML private TableColumn<Profile, String>  colRole;
    @FXML private TableColumn<Profile, Void>    colActions;
    @FXML private Label countLabel;

    private final ProfileDAO profileDAO = new ProfileDAO();

    @FXML public void initialize() {
        if (!SessionManager.getInstance().isAdmin()) {
            SceneManager.switchTo("/com/mindboost/fxml/Login.fxml");
            return;
        }
        setupColumns();
        loadData(null);

        searchField.textProperty().addListener((obs, old, nw) -> loadData(nw.isEmpty() ? null : nw));
    }

    private void setupColumns() {
        colId.setCellValueFactory(d -> new javafx.beans.property.SimpleIntegerProperty(d.getValue().getId()).asObject());
        colName.setCellValueFactory(d -> new SimpleStringProperty(d.getValue().getFullName()));
        colEmail.setCellValueFactory(d -> new SimpleStringProperty(
            d.getValue().getUser() != null ? d.getValue().getUser().getEmail() : ""));
        colPhone.setCellValueFactory(d -> new SimpleStringProperty(
            d.getValue().getPhone() != null ? d.getValue().getPhone() : "—"));
        colType.setCellValueFactory(d -> new SimpleStringProperty(
            d.getValue().getPersonalityType() != null ? d.getValue().getPersonalityType() : "—"));
        colRole.setCellValueFactory(d -> new SimpleStringProperty(
            d.getValue().getUser() != null ? d.getValue().getUser().getRole() : ""));

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
                Profile p = getTableView().getItems().get(getIndex());

                editBtn.setOnAction(e -> {
                    ProfileFormController.profileToEdit = p;
                    SceneManager.switchTo("/com/mindboost/fxml/ProfileFormView.fxml");
                });

                delBtn.setOnAction(e -> {
                    Alert alert = new Alert(Alert.AlertType.CONFIRMATION,
                        "Supprimer le profil de « " + p.getFullName() + " » ?",
                        ButtonType.YES, ButtonType.NO);
                    alert.setTitle("Confirmation suppression");
                    alert.showAndWait().ifPresent(btn -> {
                        if (btn == ButtonType.YES) {
                            try {
                                profileDAO.deleteProfile(p.getId());
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
            List<Profile> profiles = (keyword == null)
                ? profileDAO.getAllProfiles() : profileDAO.search(keyword);
            table.setItems(FXCollections.observableArrayList(profiles));
            countLabel.setText(profiles.size() + " profil(s) trouvé(s)");
        } catch (SQLException e) { e.printStackTrace(); }
    }

    @FXML public void reload()         { searchField.clear(); loadData(null); }
    @FXML public void goToAdd()        { ProfileFormController.profileToEdit = null; SceneManager.switchTo("/com/mindboost/fxml/ProfileFormView.fxml"); }
    @FXML public void goDashboard()    { SceneManager.switchTo("/com/mindboost/fxml/AdminDashboard.fxml"); }
    @FXML public void goToUserList()   { SceneManager.switchTo("/com/mindboost/fxml/UserListView.fxml"); }
    @FXML public void handleLogout()   { SessionManager.getInstance().logout(); SceneManager.switchTo("/com/mindboost/fxml/Login.fxml"); }
}
