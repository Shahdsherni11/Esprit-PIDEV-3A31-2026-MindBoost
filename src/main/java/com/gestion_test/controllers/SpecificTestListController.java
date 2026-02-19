package com.gestion_test.controllers;

import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.*;
import javafx.scene.layout.HBox;
import javafx.scene.layout.VBox;
import javafx.scene.layout.Region;
import javafx.scene.layout.Priority;
import javafx.geometry.Pos;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import com.gestion_test.entities.SpecificTest;
import com.gestion_test.services.SpecificTestService;
import com.gestion_test.services.AuthContext;
import com.gestion_test.utils.PermissionUtils;
import com.gestion_test.utils.TestDataHolder;
import com.gestion_test.App;

import java.net.URL;
import java.sql.SQLException;
import java.util.List;
import java.util.ResourceBundle;

public class SpecificTestListController implements Initializable {

    @FXML private ListView<SpecificTest> testsListView;
    @FXML private VBox emptyMessage;
    @FXML private TextField searchField;
    @FXML private ComboBox<String> categoryFilterCombo;
    @FXML private Button addBtn;
    @FXML private Label totalLabel;
    @FXML private Label userLabel;
    @FXML private Label roleLabel;

    private ObservableList<SpecificTest> allTests = FXCollections.observableArrayList();
    private ObservableList<SpecificTest> displayedTests = FXCollections.observableArrayList();

    @Override
    public void initialize(URL url, ResourceBundle rb) {
        System.out.println("✅ SpecificTestListController initialisé");

        displayUserInfo();
        setupComboBoxes();
        setupListView();
        loadTests();
        setupActions();
        checkPermissions();
    }

    /**
     * ✅ AFFICHER LES INFOS UTILISATEUR
     */
    private void displayUserInfo() {
        String userName = AuthContext.getCurrentUserName();
        String role = AuthContext.getCurrentRole();

        userLabel.setText("👤 " + userName);
        roleLabel.setText("📂 " + formatRole(role));

        System.out.println("👤 Utilisateur: " + userName);
        System.out.println("📂 Rôle: " + role);
    }

    /**
     * ✅ FORMATER LE RÔLE POUR L'AFFICHAGE
     */
    private String formatRole(String role) {
        if (role == null) return "Inconnu";
        return switch (role.toLowerCase()) {
            case "psychologist" -> "Psychologue";
            case "student", "user" -> "Étudiant";
            case "admin" -> "Administrateur";
            default -> role;
        };
    }

    /**
     * ✅ CONFIGURER LES COMBOBOX
     */
    private void setupComboBoxes() {
        categoryFilterCombo.setItems(FXCollections.observableArrayList(
                "Tous", "Anxiété", "Dépression", "Stress", "Trouble du Sommeil"
        ));
        categoryFilterCombo.setValue("Tous");
        categoryFilterCombo.setOnAction(e -> filterTests());
    }

    /**
     * ✅ CONFIGURER LE LISTVIEW
     */
    private void setupListView() {
        testsListView.setCellFactory(param -> new SpecificTestCell());
        testsListView.setItems(displayedTests);

        System.out.println("✅ ListView configuré");
    }

    /**
     * ✅ CHARGER LES TESTS
     */
    private void loadTests() {
        try {
            System.out.println("🔄 Chargement des tests spécifiques...");
            List<SpecificTest> tests = SpecificTestService.getAllSpecificTests();

            allTests.clear();
            allTests.addAll(tests);
            displayedTests.clear();
            displayedTests.addAll(tests);

            System.out.println("✅ " + tests.size() + " test(s) chargé(s)");
            updateStats();

            if (tests.isEmpty()) {
                emptyMessage.setVisible(true);
                testsListView.setVisible(false);
            } else {
                emptyMessage.setVisible(false);
                testsListView.setVisible(true);
            }

        } catch (SQLException e) {
            System.err.println("❌ Erreur: " + e.getMessage());
            showError("Erreur", "Erreur lors du chargement: " + e.getMessage());
        }
    }

    /**
     * ✅ METTRE À JOUR LES STATS
     */
    private void updateStats() {
        totalLabel.setText(String.valueOf(allTests.size()));
    }

    /**
     * ✅ CONFIGURER LES ACTIONS
     */
    private void setupActions() {
        addBtn.setOnAction(e -> addTest());
        searchField.textProperty().addListener((obs, old, newVal) -> filterTests());
    }

    /**
     * ✅ VÉRIFIER LES PERMISSIONS
     */
    private void checkPermissions() {
        if (!PermissionUtils.canCreateTests()) {
            addBtn.setDisable(true);
        }
    }

    /**
     * ✅ AJOUTER UN TEST
     */
    private void addTest() {
        if (!PermissionUtils.canCreateTests()) {
            showError("Accès refusé", PermissionUtils.getAccessDeniedMessage());
            return;
        }
        // ✅ CHEMIN CORRECT (AVEC MAJUSCULES)
        App.loadScene("/views/SpecificTest/SpecificTestAdd.fxml", "➕ Nouveau Test Spécifique");
    }

    /**
     * ✅ FILTRER LES TESTS
     */
    private void filterTests() {
        String searchQuery = searchField.getText().trim().toLowerCase();
        String selectedCategory = categoryFilterCombo.getValue();

        ObservableList<SpecificTest> filtered = allTests.filtered(test -> {
            boolean matchesSearch = searchQuery.isEmpty() ||
                    test.getTitle().toLowerCase().contains(searchQuery) ||
                    (test.getDescription() != null && test.getDescription().toLowerCase().contains(searchQuery));

            boolean matchesCategory = "Tous".equals(selectedCategory) ||
                    test.getCategory().equalsIgnoreCase(selectedCategory);

            return matchesSearch && matchesCategory;
        });

        displayedTests.clear();
        displayedTests.addAll(filtered);
    }

    private void showError(String title, String message) {
        Alert alert = new Alert(Alert.AlertType.ERROR);
        alert.setTitle(title);
        alert.setContentText(message);
        alert.showAndWait();
    }

    /**
     * ✅ CELLULE PERSONNALISÉE POUR LE LISTVIEW
     */
    private class SpecificTestCell extends ListCell<SpecificTest> {

        @Override
        protected void updateItem(SpecificTest test, boolean empty) {
            super.updateItem(test, empty);

            if (empty || test == null) {
                setGraphic(null);
                return;
            }

            // ===== CRÉER LE CONTENU DE LA CELLULE =====
            VBox cell = new VBox(8);
            cell.setStyle("-fx-border-color: #e5e7eb; -fx-border-radius: 8; -fx-padding: 12; " +
                    "-fx-background-color: #f9fafb; -fx-border-width: 1; -fx-spacing: 8;");

            // ===== EN-TÊTE: ID + TITRE + ACTIONS =====
            HBox header = new HBox(12);
            header.setAlignment(Pos.CENTER_LEFT);

            Label idLabel = new Label("ID: " + test.getId());
            idLabel.setStyle("-fx-font-size: 11px; -fx-text-fill: #9ca3af; -fx-font-weight: bold;");

            Label titleLabel = new Label(test.getTitle());
            titleLabel.setStyle("-fx-font-size: 14px; -fx-font-weight: bold; -fx-text-fill: #111827;");

            Label categoryBadge = new Label(test.getCategory());
            categoryBadge.setStyle("-fx-padding: 2 8; -fx-background-color: #dbeafe; " +
                    "-fx-text-fill: #0c4a6e; -fx-background-radius: 12; " +
                    "-fx-font-size: 10px; -fx-font-weight: bold;");

            Region spacer = new Region();
            HBox.setHgrow(spacer, Priority.ALWAYS);

            // ===== BOUTONS D'ACTION AVEC LABELS =====
            HBox actions = new HBox(6);
            actions.setAlignment(Pos.CENTER_RIGHT);

            Button viewBtn = new Button("👁️ Voir");
            viewBtn.setStyle("-fx-padding: 8 12; -fx-font-size: 11; -fx-background-color: #3b82f6; " +
                    "-fx-text-fill: white; -fx-background-radius: 6; -fx-cursor: hand; -fx-font-weight: bold;");
            viewBtn.setOnAction(e -> viewTest(test));

            Button editBtn = new Button("✏️ Modifier");
            editBtn.setStyle("-fx-padding: 8 12; -fx-font-size: 11; -fx-background-color: #5b8def; " +
                    "-fx-text-fill: white; -fx-background-radius: 6; -fx-cursor: hand; -fx-font-weight: bold;");
            editBtn.setOnAction(e -> editTest(test));

            Button deleteBtn = new Button("🗑️ Supprimer");
            deleteBtn.setStyle("-fx-padding: 8 12; -fx-font-size: 11; -fx-background-color: #dc2626; " +
                    "-fx-text-fill: white; -fx-background-radius: 6; -fx-cursor: hand; -fx-font-weight: bold;");
            deleteBtn.setOnAction(e -> deleteTest(test));

            // Désactiver edit/delete si pas propriétaire
            if (!PermissionUtils.canModifyTests() || test.getCreatedBy() != AuthContext.getCurrentUserId()) {
                editBtn.setDisable(true);
                deleteBtn.setDisable(true);
            }

            actions.getChildren().addAll(viewBtn, editBtn, deleteBtn);
            header.getChildren().addAll(idLabel, titleLabel, categoryBadge, spacer, actions);

            // ===== CONTENU: DESCRIPTION + STATS =====
            VBox content = new VBox(6);

            String description = test.getDescription();
            if (description != null && !description.isEmpty()) {
                Label descLabel = new Label(description.length() > 100 ?
                        description.substring(0, 100) + "..." : description);
                descLabel.setStyle("-fx-font-size: 11px; -fx-text-fill: #6b7280; -fx-wrap-text: true;");
                content.getChildren().add(descLabel);
            }

            // ===== FOOTER: STATISTIQUES =====
            HBox footer = new HBox(20);
            footer.setStyle("-fx-padding: 8 0; -fx-background-color: transparent;");

            int questionCount = test.getQuestions() != null ? test.getQuestions().size() : 0;
            String status = test.getStatus() != null ? test.getStatus() : "UNKNOWN";

            Label statsLabel = new Label("❓ " + questionCount + " questions | " +
                    "📊 " + status + " | " +
                    "📅 " + (test.getCreatedAt() != null ? test.getCreatedAt().toString().substring(0, 10) : "N/A"));
            statsLabel.setStyle("-fx-font-size: 10px; -fx-text-fill: #9ca3af;");

            footer.getChildren().add(statsLabel);
            content.getChildren().add(footer);

            // ===== ASSEMBLAGE =====
            cell.getChildren().addAll(header, content);
            setGraphic(cell);
        }

        /**
         * ✅ Voir un test
         */
        private void viewTest(SpecificTest test) {
            if (test == null) return;

            // ✅ PASSER L'ID VIA TestDataHolder
            TestDataHolder.setSelectedSpecificTestId(test.getId());
            // ✅ CHEMIN CORRECT (AVEC MAJUSCULES)
            App.loadScene("/views/SpecificTest/SpecificTestView.fxml", "👁️ " + test.getTitle());
        }

        /**
         * ✅ Modifier un test
         */
        private void editTest(SpecificTest test) {
            if (test == null) return;
            if (!PermissionUtils.canModifyTests() || test.getCreatedBy() != AuthContext.getCurrentUserId()) {
                showError("Erreur", "Accès refusé");
                return;
            }

            TestDataHolder.setSelectedSpecificTestId(test.getId());
            // ✅ CHEMIN CORRECT (AVEC MAJUSCULES)
            App.loadScene("/views/SpecificTest/SpecificTestEdit.fxml", "✏️ Modifier");
        }

        /**
         * ✅ Supprimer un test
         */
        private void deleteTest(SpecificTest test) {
            if (test == null) return;

            Alert alert = new Alert(Alert.AlertType.CONFIRMATION);
            alert.setTitle("Confirmation");
            alert.setHeaderText("⚠️ Êtes-vous sûr?");
            alert.setContentText("Êtes-vous sûr de vouloir supprimer ce test?\n\nCette action est irréversible!");

            alert.showAndWait().ifPresent(response -> {
                if (response == ButtonType.OK) {
                    try {
                        SpecificTestService.deleteSpecificTest(test.getId());
                        loadTests();
                        showSuccess("Succès", "Test supprimé!");
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

        private void showSuccess(String title, String message) {
            Alert alert = new Alert(Alert.AlertType.INFORMATION);
            alert.setTitle(title);
            alert.setContentText(message);
            alert.showAndWait();
        }
    }
}