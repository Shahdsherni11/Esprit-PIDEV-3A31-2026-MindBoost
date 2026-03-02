package com.gestion_test.controllers;

import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.Alert;
import javafx.scene.control.Button;
import javafx.scene.control.ButtonType;
import javafx.scene.control.ComboBox;
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
import com.gestion_test.entities.SpecificTest;
import com.gestion_test.services.SpecificTestService;
import com.gestion_test.services.ScoreService;
import com.gestion_test.services.AuthContext;
import com.gestion_test.utils.PermissionUtils;
import com.gestion_test.utils.TestDataHolder;
import com.gestion_test.App;

import java.net.URL;
import java.sql.SQLException;
import java.util.List;
import java.util.ResourceBundle;

public class SpecificTestListController implements Initializable {

    @FXML
    private ListView<SpecificTest> testsListView;
    @FXML
    private VBox emptyMessage;
    @FXML
    private TextField searchField;
    @FXML
    private ComboBox<String> categoryFilterCombo;
    @FXML
    private Button addBtn;
    @FXML
    private Label totalLabel;
    @FXML
    private Label userLabel;
    @FXML
    private Label roleLabel;

    private ObservableList<SpecificTest> allTests = FXCollections.observableArrayList();
    private ObservableList<SpecificTest> displayedTests = FXCollections.observableArrayList();

    @Override
    public void initialize(URL url, ResourceBundle rb) {
        System.out.println("SpecificTestListController initialise");

        displayUserInfo();
        setupComboBoxes();
        setupListView();
        loadTests();
        setupActions();
        checkPermissions();

        if (AuthContext.isStudent()) {
            searchField.setVisible(false);
            searchField.setManaged(false);
            categoryFilterCombo.setVisible(false);
            categoryFilterCombo.setManaged(false);
        }
    }

    private void displayUserInfo() {
        String userName = AuthContext.getCurrentUserName();
        String role = AuthContext.getCurrentRole();

        if (userLabel != null) {
            userLabel.setText(userName != null ? userName : "Utilisateur");
        }
        if (roleLabel != null) {
            roleLabel.setText(formatRole(role));
        }
    }

    private String formatRole(String role) {
        if (role == null) return "Inconnu";
        if (role.equalsIgnoreCase("psychologist")) return "Psychologue";
        if (role.equalsIgnoreCase("student") || role.equalsIgnoreCase("user")) return "Etudiant";
        if (role.equalsIgnoreCase("admin")) return "Administrateur";
        return role;
    }

    private void setupComboBoxes() {
        categoryFilterCombo.setItems(FXCollections.observableArrayList(
                "Tous", "Anxiete", "Depression", "Stress", "Trouble du Sommeil"
        ));
        categoryFilterCombo.setValue("Tous");
        categoryFilterCombo.setOnAction(e -> filterTests());
    }

    private void setupListView() {
        testsListView.setCellFactory(param -> new SpecificTestCell());
        testsListView.setItems(displayedTests);
    }

    private void loadTests() {
        try {
            System.out.println("Chargement des tests specifiques...");

            List<SpecificTest> tests;

            // Psychologue / Admin -> voir TOUS les tests
            if (AuthContext.isAdmin() || AuthContext.isPsychologist()) {
                tests = SpecificTestService.getAllSpecificTests();

                allTests.setAll(tests);
                displayedTests.setAll(tests);
                updateStats();

                if (tests.isEmpty()) {
                    showEmptyMessage("Aucun test disponible.");
                } else {
                    hideEmptyMessage();
                }
                return;
            }

            // Etudiant -> logique basee sur le pourcentage
            int userId = AuthContext.getCurrentUserId();
            int percentage = ScoreService.getLatestPercentageForUser(userId);

            System.out.println("User ID : " + userId);
            System.out.println("Pourcentage : " + percentage);

            // Pas encore de score -> message
            if (percentage < 0) {
                showEmptyMessage("Vous devez passer un test general d'abord.");
                return;
            }

            // Categorie determinee automatiquement
            String category = ScoreService.getCategoryFromPercentage(percentage);
            tests = SpecificTestService.getSpecificTestsByCategory(category);

            allTests.setAll(tests);
            displayedTests.setAll(tests);

            System.out.println(tests.size() + " test(s) pour categorie: " + category + " (" + percentage + "%)");
            updateStats();

            if (tests.isEmpty()) {
                showEmptyMessage("Aucun test disponible pour : " + category);
            } else {
                hideEmptyMessage();
            }

        } catch (SQLException e) {
            System.err.println("Erreur: " + e.getMessage());
            showError("Erreur", "Erreur lors du chargement: " + e.getMessage());
        }
    }

    private void showEmptyMessage(String message) {
        emptyMessage.getChildren().clear();
        Label msg = new Label(message);
        msg.setStyle("-fx-text-fill: #9B9BB0; -fx-font-size: 14px;");
        emptyMessage.getChildren().add(msg);
        emptyMessage.setVisible(true);
        emptyMessage.setManaged(true);
        testsListView.setVisible(false);
        testsListView.setManaged(false);
    }

    private void hideEmptyMessage() {
        emptyMessage.getChildren().clear();
        emptyMessage.setVisible(false);
        emptyMessage.setManaged(false);
        testsListView.setVisible(true);
        testsListView.setManaged(true);
    }

    private void updateStats() {
        if (totalLabel != null) {
            totalLabel.setText(Integer.toString(allTests.size()));
        }
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
        App.loadScene("/views/SpecificTest/SpecificTestAdd.fxml", "Nouveau Test Specifique");
    }

    private void filterTests() {
        if (AuthContext.isStudent()) {
            displayedTests.clear();
            displayedTests.addAll(allTests);
            return;
        }

        String searchQuery = searchField.getText().trim().toLowerCase();
        String selectedCategory = categoryFilterCombo.getValue();

        ObservableList<SpecificTest> filtered = allTests.filtered(test -> {
            boolean matchesSearch = searchQuery.isEmpty() ||
                    test.getTitle().toLowerCase().contains(searchQuery) ||
                    (test.getDescription() != null &&
                            test.getDescription().toLowerCase().contains(searchQuery));

            boolean matchesCategory = "Tous".equals(selectedCategory) ||
                    test.getCategory().equalsIgnoreCase(selectedCategory);

            return matchesSearch && matchesCategory;
        });

        displayedTests.clear();
        displayedTests.addAll(filtered);
    }

    // ===== NAVIGATION =====

    @FXML
    private void handleOpenDashboard() {
        App.loadScene("/views/Dashboard.fxml", "Dashboard Psychologue");
    }

    @FXML
    private void handleOpenGeneralTests() {
        App.loadScene("/views/GeneralTest/GeneralTestList.fxml", "Tests Generaux");
    }

    @FXML
    private void handleOpenStatistics() {
        App.loadScene("/views/Statistics.fxml", "Statistiques");
    }

    @FXML
    private void handleLogout() {
        AuthContext.logout();
        App.loadScene("/views/SelectRole.fxml", "MindBoost");
    }

    private void showError(String title, String message) {
        Alert alert = new Alert(Alert.AlertType.ERROR);
        alert.setTitle(title);
        alert.setContentText(message);
        alert.showAndWait();
    }

    // ===== CELLULE PERSONNALISEE =====

    private class SpecificTestCell extends ListCell<SpecificTest> {

        @Override
        protected void updateItem(SpecificTest test, boolean empty) {
            super.updateItem(test, empty);

            if (empty || test == null) {
                setGraphic(null);
                return;
            }

            VBox cell = new VBox(8);
            cell.setStyle("-fx-background-color: rgba(255,255,255,0.05); -fx-background-radius: 12; " +
                    "-fx-border-color: rgba(255,255,255,0.08); -fx-border-radius: 12; " +
                    "-fx-border-width: 1; -fx-padding: 16;");

            // En-tete
            HBox header = new HBox(12);
            header.setAlignment(Pos.CENTER_LEFT);

            Label idLabel = new Label("ID: " + test.getId());
            idLabel.setStyle("-fx-font-size: 11px; -fx-text-fill: #9B9BB0; -fx-font-weight: bold;");

            Label titleLabel = new Label(test.getTitle());
            titleLabel.setStyle("-fx-font-size: 14px; -fx-font-weight: bold; -fx-text-fill: white;");

            Label categoryBadge = new Label(test.getCategory());
            categoryBadge.setStyle("-fx-padding: 2 8; -fx-background-color: rgba(108,99,255,0.2); " +
                    "-fx-text-fill: #A89CFF; -fx-background-radius: 12; " +
                    "-fx-font-size: 10px; -fx-font-weight: bold;");

            Region spacer = new Region();
            HBox.setHgrow(spacer, Priority.ALWAYS);

            HBox actions = new HBox(6);
            actions.setAlignment(Pos.CENTER_RIGHT);

            // ETUDIANT : Bouton passer le test
            if (AuthContext.isStudent()) {
                Button takeBtn = new Button("Passer le Test");
                takeBtn.setStyle("-fx-padding: 8 16; -fx-font-size: 11px; -fx-background-color: linear-gradient(to right, #4ECDC4, #3DBDB5); " +
                        "-fx-text-fill: white; -fx-background-radius: 6; -fx-cursor: hand; -fx-font-weight: bold;");
                takeBtn.setOnAction(e -> takeTest(test));
                actions.getChildren().add(takeBtn);
            } else {
                // PSYCHOLOGUE : Boutons voir/modifier/supprimer
                Button viewBtn = new Button("Voir");
                viewBtn.setStyle("-fx-padding: 8 16; -fx-font-size: 11px; -fx-background-color: linear-gradient(to right, #6C63FF, #5A52D5); " +
                        "-fx-text-fill: white; -fx-background-radius: 6; -fx-cursor: hand; -fx-font-weight: bold;");
                viewBtn.setOnAction(e -> viewTest(test));

                Button editBtn = new Button("Modifier");
                editBtn.setStyle("-fx-padding: 8 16; -fx-font-size: 11px; -fx-background-color: linear-gradient(to right, #4ECDC4, #3DBDB5); " +
                        "-fx-text-fill: white; -fx-background-radius: 6; -fx-cursor: hand; -fx-font-weight: bold;");
                editBtn.setOnAction(e -> editTest(test));

                Button deleteBtn = new Button("Supprimer");
                deleteBtn.setStyle("-fx-padding: 8 16; -fx-font-size: 11px; -fx-background-color: linear-gradient(to right, #E74C3C, #C0392B); " +
                        "-fx-text-fill: white; -fx-background-radius: 6; -fx-cursor: hand; -fx-font-weight: bold;");
                deleteBtn.setOnAction(e -> deleteTest(test));

                actions.getChildren().addAll(viewBtn, editBtn, deleteBtn);
            }

            header.getChildren().addAll(idLabel, titleLabel, categoryBadge, spacer, actions);

            // Description
            VBox content = new VBox(6);
            String description = test.getDescription();
            if (description != null && !description.isEmpty()) {
                String shortDesc = description.length() > 100 ? description.substring(0, 100) + "..." : description;
                Label descLabel = new Label(shortDesc);
                descLabel.setStyle("-fx-font-size: 11px; -fx-text-fill: #9B9BB0; -fx-wrap-text: true;");
                content.getChildren().add(descLabel);
            }

            // Footer
            int questionCount = test.getQuestions() != null ? test.getQuestions().size() : 0;
            String status = test.getStatus() != null ? test.getStatus() : "UNKNOWN";
            String dateStr = test.getCreatedAt() != null ? test.getCreatedAt().toString().substring(0, 10) : "N/A";

            Label statsLabel = new Label(questionCount + " questions | " + status + " | " + dateStr);
            statsLabel.setStyle("-fx-font-size: 10px; -fx-text-fill: #9B9BB0;");
            content.getChildren().add(statsLabel);

            cell.getChildren().addAll(header, content);
            setGraphic(cell);
        }

        private void takeTest(SpecificTest test) {
            if (test == null) return;
            System.out.println("Etudiant passe le test: " + test.getTitle());
            TestDataHolder.setSelectedSpecificTestId(test.getId());
            App.loadScene("/views/SpecificTest/SpecificTestTake.fxml", "Passer - " + test.getTitle());
        }

        private void viewTest(SpecificTest test) {
            if (test == null) return;
            TestDataHolder.setSelectedSpecificTestId(test.getId());
            App.loadScene("/views/SpecificTest/SpecificTestView.fxml", test.getTitle());
        }

        private void editTest(SpecificTest test) {
            if (test == null) return;
            TestDataHolder.setSelectedSpecificTestId(test.getId());
            App.loadScene("/views/SpecificTest/SpecificTestEdit.fxml", "Modifier");
        }

        private void deleteTest(SpecificTest test) {
            if (test == null) return;

            Alert alert = new Alert(Alert.AlertType.CONFIRMATION);
            alert.setTitle("Confirmation");
            alert.setHeaderText("Etes-vous sur?");
            alert.setContentText("Cette action est irreversible!");

            alert.showAndWait().ifPresent(response -> {
                if (response == ButtonType.OK) {
                    try {
                        SpecificTestService.deleteSpecificTest(test.getId());
                        loadTests();
                    } catch (SQLException e) {
                        showError("Erreur", "Erreur: " + e.getMessage());
                    }
                }
            });
        }

        private void showError(String title, String message) {
            Alert alert = new Alert(Alert.AlertType.ERROR);
            alert.setTitle(title);
            alert.setContentText(message);
            alert.showAndWait();
        }
    }
}