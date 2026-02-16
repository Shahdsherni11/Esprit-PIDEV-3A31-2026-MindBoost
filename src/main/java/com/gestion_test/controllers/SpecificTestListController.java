package com.gestion_test.controllers;

import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.*;
import javafx.scene.layout.HBox;
import javafx.scene.layout.VBox;
import javafx.scene.layout.Region;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.geometry.Pos;
import com.gestion_test.entities.SpecificTest;
import com.gestion_test.services.SpecificTestService;
import com.gestion_test.services.AuthContext;
import com.gestion_test.utils.PermissionUtils;
import com.gestion_test.utils.SpecificTestData;
import com.gestion_test.App;

import java.net.URL;
import java.sql.SQLException;
import java.util.List;
import java.util.ResourceBundle;

public class SpecificTestListController implements Initializable {

    @FXML private ListView<SpecificTest> testsList;
    @FXML private ComboBox<String> categoryFilterCombo;
    @FXML private TextField searchField;
    @FXML private Button addBtn;
    @FXML private Label totalLabel;
    @FXML private Label categoriesLabel;
    @FXML private Label activeLabel;

    private ObservableList<SpecificTest> allTests = FXCollections.observableArrayList();
    private ObservableList<SpecificTest> displayedTests = FXCollections.observableArrayList();

    @Override
    public void initialize(URL url, ResourceBundle rb) {
        checkPermissions();
        setupListView();
        setupCategoryFilter();
        loadTests();
        setupActions();
    }

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

    private void setupListView() {
        testsList.setItems(displayedTests);
        testsList.setCellFactory(param -> new ListCell<SpecificTest>() {
            @Override
            protected void updateItem(SpecificTest test, boolean empty) {
                super.updateItem(test, empty);
                if (empty || test == null) {
                    setGraphic(null);
                } else {
                    setGraphic(createTestCard(test));
                }
            }
        });
    }

    private VBox createTestCard(SpecificTest test) {
        VBox card = new VBox(10);
        card.setStyle("-fx-background-color: white; -fx-background-radius: 16; -fx-padding: 16; " +
                "-fx-effect: dropshadow(gaussian, rgba(0,0,0,0.08), 8, 0, 0, 2);");
        card.setPrefWidth(400);

        HBox headerBox = new HBox(15);
        headerBox.setAlignment(Pos.CENTER_LEFT);

        Label idLabel = new Label("ID: " + test.getId());
        idLabel.setStyle("-fx-font-size: 11; -fx-text-fill: #6b7280;");

        Label statusLabel = new Label(test.getStatus());
        statusLabel.setStyle(getStatusStyle(test.getStatus()));

        Label dateLabel = new Label(test.getCreatedAt().toString().substring(0, 10));
        dateLabel.setStyle("-fx-font-size: 11; -fx-text-fill: #6b7280;");

        Region spacer = new Region();
        HBox.setHgrow(spacer, javafx.scene.layout.Priority.ALWAYS);

        headerBox.getChildren().addAll(idLabel, statusLabel, spacer, dateLabel);

        HBox categoryBox = new HBox(8);
        Label categoryLabel = new Label(test.getCategory());
        categoryLabel.setStyle("-fx-font-size: 12; -fx-text-fill: #5b8def; -fx-font-weight: bold;");
        categoryBox.getChildren().add(categoryLabel);

        Label titleLabel = new Label(test.getTitle());
        titleLabel.setStyle("-fx-font-size: 16; -fx-font-weight: bold;");
        titleLabel.setWrapText(true);

        Label descLabel = new Label(test.getDescription() != null ? test.getDescription() : "Aucune description");
        descLabel.setStyle("-fx-font-size: 13; -fx-text-fill: #6b7280;");
        descLabel.setWrapText(true);

        int qCount = test.getQuestions() != null ? test.getQuestions().size() : 0;
        Label questionsLabel = new Label("❓ " + qCount + " questions");
        questionsLabel.setStyle("-fx-font-size: 12; -fx-text-fill: #5b8def; -fx-font-weight: bold;");

        HBox buttonsBox = new HBox(8);
        buttonsBox.setAlignment(Pos.CENTER_RIGHT);

        if (AuthContext.isUser() && "ACTIVE".equals(test.getStatus())) {
            Button takeBtn = new Button("🎯 Passer le test");
            takeBtn.setStyle("-fx-padding: 8 16; -fx-background-color: #10b981; -fx-text-fill: white; " +
                    "-fx-background-radius: 10; -fx-font-weight: bold;");
            takeBtn.setOnAction(e -> takeTest(test));
            buttonsBox.getChildren().add(takeBtn);
        }

        Button viewBtn = new Button("👁️ Voir");
        viewBtn.setStyle("-fx-padding: 8 16; -fx-background-color: #5b8def; -fx-text-fill: white; " +
                "-fx-background-radius: 10; -fx-font-weight: bold;");
        viewBtn.setOnAction(e -> viewTest(test));

        Button editBtn = new Button("✏️ Modifier");
        editBtn.setStyle("-fx-padding: 8 16; -fx-background-color: #5b8def; -fx-text-fill: white; " +
                "-fx-background-radius: 10; -fx-font-weight: bold;");
        editBtn.setOnAction(e -> editTest(test));

        Button deleteBtn = new Button("🗑️ Supprimer");
        deleteBtn.setStyle("-fx-padding: 8 16; -fx-background-color: #dc2626; -fx-text-fill: white; " +
                "-fx-background-radius: 10; -fx-font-weight: bold;");
        deleteBtn.setOnAction(e -> deleteTest(test));

        if (!PermissionUtils.canModifyTests() || test.getCreatedBy() != AuthContext.getCurrentUserId()) {
            editBtn.setDisable(true);
            deleteBtn.setDisable(true);
        }

        buttonsBox.getChildren().addAll(viewBtn, editBtn, deleteBtn);
        card.getChildren().addAll(headerBox, categoryBox, titleLabel, descLabel, questionsLabel, buttonsBox);

        return card;
    }

    private String getStatusStyle(String status) {
        return switch (status) {
            case "ACTIVE" -> "-fx-background-color: #10b981; -fx-text-fill: white; -fx-padding: 4 8; " +
                    "-fx-background-radius: 6; -fx-font-size: 11; -fx-font-weight: bold;";
            case "DRAFT" -> "-fx-background-color: #f59e0b; -fx-text-fill: white; -fx-padding: 4 8; " +
                    "-fx-background-radius: 6; -fx-font-size: 11; -fx-font-weight: bold;";
            case "INACTIVE" -> "-fx-background-color: #ef4444; -fx-text-fill: white; -fx-padding: 4 8; " +
                    "-fx-background-radius: 6; -fx-font-size: 11; -fx-font-weight: bold;";
            default -> "-fx-text-fill: #6b7280;";
        };
    }

    private void setupCategoryFilter() {
        ObservableList<String> categories = FXCollections.observableArrayList("Toutes les catégories");
        categories.addAll(SpecificTestData.getAllCategories());
        categoryFilterCombo.setItems(categories);
        categoryFilterCombo.setValue("Toutes les catégories");
        categoryFilterCombo.setOnAction(e -> filterTests());
    }

    private void loadTests() {
        try {
            List<SpecificTest> tests = AuthContext.isPsychologist() ?
                    SpecificTestService.getMySpecificTests() :
                    SpecificTestService.getAllSpecificTests();

            allTests.clear();
            allTests.addAll(tests);
            displayedTests.clear();
            displayedTests.addAll(tests);
            updateStats();
        } catch (SQLException e) {
            showError("Erreur", "Erreur: " + e.getMessage());
        }
    }

    private void updateStats() {
        long total = allTests.size();
        long active = allTests.stream().filter(t -> "ACTIVE".equals(t.getStatus())).count();
        long categories = allTests.stream().map(SpecificTest::getCategory).distinct().count();

        totalLabel.setText(String.valueOf(total));
        activeLabel.setText(String.valueOf(active));
        categoriesLabel.setText(String.valueOf(categories));
    }

    private void setupActions() {
        addBtn.setOnAction(e -> openAddForm());
        searchField.textProperty().addListener((obs, old, newVal) -> filterTests());
    }

    private void openAddForm() {
        if (!PermissionUtils.canCreateTests()) {
            showError("Accès Refusé", PermissionUtils.getAccessDeniedMessage());
            return;
        }
        App.loadScene("/com/gestion_test/views/SpecificTest/SpecificTestAdd.fxml", "➕ Ajouter Test");
    }

    private void viewTest(SpecificTest test) {
        if (test == null) return;
        App.loadScene("/com/gestion_test/views/SpecificTest/SpecificTestView.fxml", "👁️ " + test.getTitle());
    }

    private void editTest(SpecificTest test) {
        if (test == null) return;
        if (!PermissionUtils.canModifyTests() || test.getCreatedBy() != AuthContext.getCurrentUserId()) {
            showError("Erreur", "Accès refusé");
            return;
        }
        App.loadScene("/com/gestion_test/views/SpecificTest/SpecificTestEdit.fxml", "✏️ " + test.getTitle());
    }

    private void deleteTest(SpecificTest test) {
        if (test == null) return;
        if (!PermissionUtils.canDeleteTests() || test.getCreatedBy() != AuthContext.getCurrentUserId()) {
            showError("Erreur", "Accès refusé");
            return;
        }

        Alert alert = new Alert(Alert.AlertType.CONFIRMATION);
        alert.setTitle("Confirmation");
        alert.setContentText("Êtes-vous sûr de vouloir supprimer ce test ?");
        alert.showAndWait().ifPresent(response -> {
            if (response == ButtonType.OK) {
                try {
                    SpecificTestService.deleteSpecificTest(test.getId());
                    showSuccess("Succès", "Test supprimé!");
                    loadTests();
                } catch (SQLException e) {
                    showError("Erreur", "Erreur: " + e.getMessage());
                }
            }
        });
    }

    private void takeTest(SpecificTest test) {
        if (test == null || !"ACTIVE".equals(test.getStatus())) {
            showError("Erreur", "Test non disponible");
            return;
        }
        App.loadScene("/com/gestion_test/views/SpecificTest/SpecificTestTake.fxml", "✏️ " + test.getTitle());
    }

    private void filterTests() {
        String searchQuery = searchField.getText() != null ? searchField.getText().toLowerCase() : "";
        String selectedCategory = categoryFilterCombo.getValue();

        ObservableList<SpecificTest> filtered = allTests.filtered(test -> {
            boolean matchesSearch = searchQuery.isEmpty() ||
                    test.getTitle().toLowerCase().contains(searchQuery) ||
                    (test.getDescription() != null && test.getDescription().toLowerCase().contains(searchQuery));

            boolean matchesCategory = "Toutes les catégories".equals(selectedCategory) ||
                    test.getCategory().equals(selectedCategory);

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

    private void showSuccess(String title, String message) {
        Alert alert = new Alert(Alert.AlertType.INFORMATION);
        alert.setTitle(title);
        alert.setContentText(message);
        alert.showAndWait();
    }
}