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
    @FXML private VBox emptyMessage;
    @FXML private TextField searchField;
    @FXML private Button addBtn;
    @FXML private Label totalLabel;

    private ObservableList<GeneralTest> allTests = FXCollections.observableArrayList();
    private ObservableList<GeneralTest> displayedTests = FXCollections.observableArrayList();

    @Override
    public void initialize(URL url, ResourceBundle rb) {
        System.out.println("✅ GeneralTestListController initialisé");
        checkPermissions();
        setupListView();
        loadTests();
        setupActions();
    }

    /**
     * ✅ Vérifier les permissions
     */
    private void checkPermissions() {
        if (!AuthContext.isAuthenticated()) {
            showError("Erreur", "Vous devez être connecté");
            return;
        }

        if (!PermissionUtils.canCreateTests()) {
            addBtn.setDisable(true);
            addBtn.setTooltip(new Tooltip("Seuls les psychologues peuvent créer"));
        }
    }

    /**
     * ✅ Configurer le ListView avec des cellules personnalisées
     */
    private void setupListView() {
        testsListView.setCellFactory(param -> new GeneralTestCell());
        testsListView.setItems(displayedTests);

        System.out.println("✅ ListView configuré");
    }

    /**
     * ✅ Charger tous les tests
     */
    private void loadTests() {
        try {
            System.out.println("🔄 Chargement des tests généraux...");

            List<GeneralTest> tests = AuthContext.isPsychologist() ?
                    GeneralTestService.getMyGeneralTests() :
                    GeneralTestService.getAllGeneralTests();

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
            showError("Erreur", "Erreur: " + e.getMessage());
        }
    }

    /**
     * ✅ Mettre à jour les stats
     */
    private void updateStats() {
        totalLabel.setText(String.valueOf(allTests.size()));
    }

    /**
     * ✅ Configurer les actions
     */
    private void setupActions() {
        addBtn.setOnAction(e -> openAddForm());
        searchField.textProperty().addListener((obs, old, newVal) -> filterTests(newVal));
    }

    /**
     * ✅ Ouvrir le formulaire d'ajout
     */
    private void openAddForm() {
        if (!PermissionUtils.canCreateTests()) {
            showError("Accès Refusé", PermissionUtils.getAccessDeniedMessage());
            return;
        }

        App.loadScene("/views/GeneralTest/GeneralTestAdd.fxml", "➕ Créer un Test");
    }

    /**
     * ✅ Filtrer les tests
     */
    private void filterTests(String query) {
        if (query == null || query.isEmpty()) {
            displayedTests.clear();
            displayedTests.addAll(allTests);
            return;
        }

        ObservableList<GeneralTest> filtered = allTests.filtered(test ->
                test.getTitle().toLowerCase().contains(query.toLowerCase()) ||
                        (test.getDescription() != null && test.getDescription().toLowerCase().contains(query.toLowerCase()))
        );

        displayedTests.clear();
        displayedTests.addAll(filtered);
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

    /**
     * ✅ CELLULE PERSONNALISÉE POUR LE LISTVIEW
     */
    private class GeneralTestCell extends ListCell<GeneralTest> {

        @Override
        protected void updateItem(GeneralTest test, boolean empty) {
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

            Region spacer = new Region();
            HBox.setHgrow(spacer, Priority.ALWAYS);

            // ===== BOUTONS D'ACTION AVEC LABELS =====
            HBox actions = new HBox(6);
            actions.setAlignment(Pos.CENTER_RIGHT);

            // ✅ BOUTON VIEW AVEC LABEL
            Button viewBtn = new Button("👁️ Voir");
            viewBtn.setStyle("-fx-padding: 8 12; -fx-font-size: 11; -fx-background-color: #3b82f6; " +
                    "-fx-text-fill: white; -fx-background-radius: 6; -fx-cursor: hand; -fx-font-weight: bold;");
            viewBtn.setOnAction(e -> viewTest(test));

            // ✅ BOUTON EDIT AVEC LABEL
            Button editBtn = new Button("✏️ Modifier");
            editBtn.setStyle("-fx-padding: 8 12; -fx-font-size: 11; -fx-background-color: #5b8def; " +
                    "-fx-text-fill: white; -fx-background-radius: 6; -fx-cursor: hand; -fx-font-weight: bold;");
            editBtn.setOnAction(e -> editTest(test));

            // ✅ BOUTON DELETE AVEC LABEL
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
            header.getChildren().addAll(idLabel, titleLabel, spacer, actions);

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
            Label statsLabel = new Label("❓ " + questionCount + " question(s) | " +
                    "📅 " + (test.getCreatedAt() != null ? test.getCreatedAt().toString().substring(0, 10) : "N/A"));
            statsLabel.setStyle("-fx-font-size: 10px; -fx-text-fill: #9ca3af;");

            footer.getChildren().add(statsLabel);
            content.getChildren().add(footer);

            // ===== ASSEMBLAGE =====
            cell.getChildren().addAll(header, content);
            setGraphic(cell);
        }

        /**
         * ✅ Voir les détails d'un test
         */
        private void viewTest(GeneralTest test) {
            if (test == null) return;

            // ✅ ÉTUDIANT: Passe le test
            if (AuthContext.isStudent()) {
                System.out.println("🎯 Étudiant passe le test: " + test.getTitle());
                TestDataHolder.setSelectedGeneralTestId(test.getId());
                App.loadScene("/views/GeneralTest/GeneralTestTake.fxml", "🧪 Passer - " + test.getTitle());
            }
            // ✅ PSYCHOLOGUE: Voit les détails
            else if (AuthContext.isPsychologist()) {
                System.out.println("👁️ Psychologue voit les détails: " + test.getTitle());
                TestDataHolder.setSelectedGeneralTestId(test.getId());
                App.loadScene("/views/GeneralTest/GeneralTestView.fxml", "📖 " + test.getTitle());
            }
        }

        /**
         * ✅ Modifier un test
         */
        private void editTest(GeneralTest test) {
            if (test == null) return;
            if (!PermissionUtils.canModifyTests() || test.getCreatedBy() != AuthContext.getCurrentUserId()) {
                showError("Erreur", "Accès refusé");
                return;
            }

            TestDataHolder.setSelectedGeneralTestId(test.getId());
            // ✅ CHEMIN CORRECT (AVEC MAJUSCULES)
            App.loadScene("/views/GeneralTest/GeneralTestEdit.fxml", "✏️ Modifier");
        }

        /**
         * ✅ Supprimer un test
         */
        private void deleteTest(GeneralTest test) {
            if (test == null) return;

            Alert alert = new Alert(Alert.AlertType.CONFIRMATION);
            alert.setTitle("Confirmation");
            alert.setHeaderText("⚠️ Êtes-vous sûr ?");
            alert.setContentText("Voulez-vous vraiment supprimer ce test ?\n\nCette action est irréversible !");

            alert.showAndWait().ifPresent(response -> {
                if (response == ButtonType.OK) {
                    try {
                        GeneralTestService.deleteGeneralTest(test.getId());
                        loadTests();
                        showSuccess("Succès", "Test supprimé !");
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