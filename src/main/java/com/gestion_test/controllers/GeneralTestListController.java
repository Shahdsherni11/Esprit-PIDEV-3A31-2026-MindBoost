package com.gestion_test.controllers;

import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.Alert;
import javafx.scene.control.Button;
import javafx.scene.control.ButtonType;
import javafx.scene.control.Label;
import javafx.scene.control.ListCell;
import javafx.scene.control.ListView;
import javafx.scene.control.TextField;
import javafx.scene.layout.HBox;
import javafx.scene.layout.Priority;
import javafx.scene.layout.Region;
import javafx.scene.layout.VBox;
import javafx.geometry.Pos;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import com.gestion_test.entities.GeneralTest;
import com.gestion_test.services.GeneralTestService;
import com.gestion_test.services.AuthContext;
import com.gestion_test.utils.PermissionUtils;
import com.gestion_test.utils.TestDataHolder;
import com.gestion_test.App;

import java.net.URL;
import java.sql.SQLException;
import java.util.List;
import java.util.ResourceBundle;

public class GeneralTestListController implements Initializable {

    @FXML private ListView<GeneralTest> testsListView;
    @FXML private TextField searchField;
    @FXML private Button addBtn;
    @FXML private Label totalLabel;
    @FXML private Label sidebarRoleLabel;

    private GeneralTestService generalTestService;
    private ObservableList<GeneralTest> allTests = FXCollections.observableArrayList();
    private ObservableList<GeneralTest> displayedTests = FXCollections.observableArrayList();

    @Override
    public void initialize(URL url, ResourceBundle rb) {
        System.out.println("GeneralTestListController initialise");
        generalTestService = new GeneralTestService();

        // Afficher le bon role dans le sidebar
        if (sidebarRoleLabel != null) {
            if (AuthContext.isStudent() || AuthContext.isUser()) {
                sidebarRoleLabel.setText("ETUDIANT");
            } else {
                sidebarRoleLabel.setText("PSYCHOLOGUE");
            }
        }

        setupListView();
        loadTests();
        setupActions();
        checkPermissions();
    }

    private void setupListView() {
        testsListView.setCellFactory(param -> new GeneralTestCell());
        testsListView.setItems(displayedTests);
    }

    private void loadTests() {
        try {
            List<GeneralTest> tests = generalTestService.getAll();
            allTests.setAll(tests);
            displayedTests.setAll(tests);
            updateStats();
        } catch (SQLException e) {
            showError("Erreur", "Erreur: " + e.getMessage());
        }
    }

    private void updateStats() {
        if (totalLabel != null) totalLabel.setText(Integer.toString(allTests.size()));
    }

    private void setupActions() {
        addBtn.setOnAction(e -> addTest());
        searchField.textProperty().addListener((obs, old, newVal) -> filterTests());
    }

    private void checkPermissions() {
        if (!PermissionUtils.canCreateTests()) {
            addBtn.setDisable(true);
            addBtn.setVisible(false);
            addBtn.setManaged(false);
        }
    }

    private void addTest() {
        if (!PermissionUtils.canCreateTests()) {
            showError("Acces refuse", PermissionUtils.getAccessDeniedMessage());
            return;
        }
        App.loadScene("/views/GeneralTest/GeneralTestAdd.fxml", "Nouveau Test General");
    }

    private void filterTests() {
        String query = searchField.getText().trim().toLowerCase();
        displayedTests.clear();
        for (GeneralTest test : allTests) {
            boolean matches = query.isEmpty() ||
                    test.getTitle().toLowerCase().contains(query) ||
                    (test.getDescription() != null && test.getDescription().toLowerCase().contains(query));
            if (matches) displayedTests.add(test);
        }
    }

    @FXML
    private void handleOpenDashboard() {
        App.loadScene("/views/Dashboard.fxml", "Dashboard");
    }

    @FXML
    private void handleOpenSpecificTests() {
        App.loadScene("/views/SpecificTest/SpecificTestList.fxml", "Tests Specifiques");
    }

    @FXML
    private void handleOpenStatistics() {
        if (AuthContext.isStudent() || AuthContext.isUser()) {
            App.loadScene("/views/StudentStats.fxml", "Mes Statistiques");
        } else {
            App.loadScene("/views/Statistics.fxml", "Statistiques");
        }
    }

    @FXML
    private void handleLogout() {
        AuthContext.logout();
        App.loadScene("/views/SelectRole.fxml", "MindBoost");
    }

    private void showError(String title, String message) {
        Alert a = new Alert(Alert.AlertType.ERROR);
        a.setTitle(title); a.setContentText(message); a.showAndWait();
    }

    private class GeneralTestCell extends ListCell<GeneralTest> {
        @Override
        protected void updateItem(GeneralTest test, boolean empty) {
            super.updateItem(test, empty);
            if (empty || test == null) { setGraphic(null); return; }

            VBox cell = new VBox(8);
            cell.setStyle("-fx-background-color: rgba(255,255,255,0.05); -fx-background-radius: 12; " +
                    "-fx-border-color: rgba(255,255,255,0.08); -fx-border-radius: 12; -fx-border-width: 1; -fx-padding: 16;");

            HBox header = new HBox(12);
            header.setAlignment(Pos.CENTER_LEFT);
            Label idLabel = new Label("ID: " + test.getId());
            idLabel.setStyle("-fx-font-size: 11px; -fx-text-fill: #9B9BB0; -fx-font-weight: bold;");
            Label titleLabel = new Label(test.getTitle());
            titleLabel.setStyle("-fx-font-size: 14px; -fx-font-weight: bold; -fx-text-fill: white;");
            Region spacer = new Region();
            HBox.setHgrow(spacer, Priority.ALWAYS);
            HBox actions = new HBox(6);
            actions.setAlignment(Pos.CENTER_RIGHT);

            if (AuthContext.isStudent() || AuthContext.isUser()) {
                Button takeBtn = new Button("Passer le Test");
                takeBtn.setStyle("-fx-padding: 8 16; -fx-background-color: linear-gradient(to right, #4ECDC4, #3DBDB5); " +
                        "-fx-text-fill: white; -fx-background-radius: 6; -fx-font-weight: bold;");
                takeBtn.setOnAction(e -> {
                    TestDataHolder.setSelectedGeneralTestId(test.getId());
                    App.loadScene("/views/GeneralTest/GeneralTestTake.fxml", "Passer - " + test.getTitle());
                });
                actions.getChildren().add(takeBtn);
            } else {
                Button viewBtn = new Button("Voir");
                viewBtn.setStyle("-fx-padding: 8 16; -fx-background-color: linear-gradient(to right, #6C63FF, #5A52D5); " +
                        "-fx-text-fill: white; -fx-background-radius: 6; -fx-font-weight: bold;");
                viewBtn.setOnAction(e -> {
                    TestDataHolder.setSelectedGeneralTestId(test.getId());
                    App.loadScene("/views/GeneralTest/GeneralTestView.fxml", test.getTitle());
                });
                Button editBtn = new Button("Modifier");
                editBtn.setStyle("-fx-padding: 8 16; -fx-background-color: linear-gradient(to right, #4ECDC4, #3DBDB5); " +
                        "-fx-text-fill: white; -fx-background-radius: 6; -fx-font-weight: bold;");
                editBtn.setOnAction(e -> {
                    TestDataHolder.setSelectedGeneralTestId(test.getId());
                    App.loadScene("/views/GeneralTest/GeneralTestEdit.fxml", "Modifier");
                });
                Button deleteBtn = new Button("Supprimer");
                deleteBtn.setStyle("-fx-padding: 8 16; -fx-background-color: linear-gradient(to right, #E74C3C, #C0392B); " +
                        "-fx-text-fill: white; -fx-background-radius: 6; -fx-font-weight: bold;");
                deleteBtn.setOnAction(e -> {
                    Alert alert = new Alert(Alert.AlertType.CONFIRMATION);
                    alert.setContentText("Supprimer ce test?");
                    alert.showAndWait().ifPresent(r -> {
                        if (r == ButtonType.OK) {
                            try { generalTestService.delete(test.getId()); loadTests(); }
                            catch (SQLException ex) { showCellError(ex.getMessage()); }
                        }
                    });
                });
                actions.getChildren().addAll(viewBtn, editBtn, deleteBtn);
            }
            header.getChildren().addAll(idLabel, titleLabel, spacer, actions);

            VBox content = new VBox(6);
            String desc = test.getDescription();
            if (desc != null && !desc.isEmpty()) {
                Label descLabel = new Label(desc.length() > 100 ? desc.substring(0, 100) + "..." : desc);
                descLabel.setStyle("-fx-font-size: 11px; -fx-text-fill: #9B9BB0;");
                content.getChildren().add(descLabel);
            }
            int qCount = test.getQuestions() != null ? test.getQuestions().size() : 0;
            String dateStr = test.getCreatedAt() != null ? test.getCreatedAt().toString().substring(0, 10) : "N/A";
            Label statsLabel = new Label(qCount + " question(s) | " + dateStr);
            statsLabel.setStyle("-fx-font-size: 10px; -fx-text-fill: #9B9BB0;");
            content.getChildren().add(statsLabel);

            cell.getChildren().addAll(header, content);
            setGraphic(cell);
        }

        private void showCellError(String msg) {
            Alert a = new Alert(Alert.AlertType.ERROR);
            a.setTitle("Erreur"); a.setContentText(msg); a.showAndWait();
        }
    }
}