package com.gestion_test.controllers;

import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.scene.Scene;
import javafx.scene.control.*;
import javafx.scene.layout.HBox;
import javafx.scene.layout.VBox;
import javafx.scene.layout.Region;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.geometry.Pos;
import javafx.stage.Stage;
import com.gestion_test.entities.GeneralTest;
import com.gestion_test.services.GeneralTestService;
import com.gestion_test.services.AuthContext;
import com.gestion_test.utils.PermissionUtils;
import com.gestion_test.App;

import java.net.URL;
import java.sql.SQLException;
import java.util.List;
import java.util.ResourceBundle;

public class GeneralTestListController implements Initializable {

    @FXML private ListView<GeneralTest> testsList;
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
     * ✅ Configurer la ListView
     */
    private void setupListView() {
        testsList.setItems(displayedTests);
        testsList.setCellFactory(param -> new ListCell<GeneralTest>() {
            @Override
            protected void updateItem(GeneralTest test, boolean empty) {
                super.updateItem(test, empty);
                if (empty || test == null) {
                    setGraphic(null);
                } else {
                    setGraphic(createTestCard(test));
                }
            }
        });
    }

    /**
     * ✅ Créer une card pour chaque test
     */
    private VBox createTestCard(GeneralTest test) {
        VBox card = new VBox(10);
        card.setStyle("-fx-background-color: white; -fx-background-radius: 16; -fx-padding: 16; " +
                "-fx-effect: dropshadow(gaussian, rgba(0,0,0,0.08), 8, 0, 0, 2);");
        card.setPrefWidth(400);

        HBox headerBox = new HBox(15);
        headerBox.setAlignment(Pos.CENTER_LEFT);

        Label idLabel = new Label("ID: " + test.getId());
        idLabel.setStyle("-fx-font-size: 11; -fx-text-fill: #6b7280;");

        // ✅ SUPPRESSION: statusLabel

        Label dateLabel = new Label(test.getCreatedAt().toString().substring(0, 10));
        dateLabel.setStyle("-fx-font-size: 11; -fx-text-fill: #6b7280;");

        Region spacer = new Region();
        HBox.setHgrow(spacer, javafx.scene.layout.Priority.ALWAYS);

        headerBox.getChildren().addAll(idLabel, spacer, dateLabel);

        Label titleLabel = new Label(test.getTitle());
        titleLabel.setStyle("-fx-font-size: 16; -fx-font-weight: bold;");
        titleLabel.setWrapText(true);

        Label descLabel = new Label(test.getDescription() != null ? test.getDescription() : "Aucune description");
        descLabel.setStyle("-fx-font-size: 13; -fx-text-fill: #6b7280;");
        descLabel.setWrapText(true);

        int qCount = test.getQuestions() != null ? test.getQuestions().size() : 0;
        Label questionsLabel = new Label("❓ " + qCount + " question(s)");
        questionsLabel.setStyle("-fx-font-size: 12; -fx-text-fill: #5b8def; -fx-font-weight: bold;");

        HBox buttonsBox = new HBox(8);
        buttonsBox.setAlignment(Pos.CENTER_RIGHT);

        // ✅ SUPPRESSION: vérification de status "ACTIVE"

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
        card.getChildren().addAll(headerBox, titleLabel, descLabel, questionsLabel, buttonsBox);

        return card;
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
            for (GeneralTest test : tests) {
                int qCount = test.getQuestions() != null ? test.getQuestions().size() : 0;
                System.out.println("   - " + test.getTitle() + " (" + qCount + " questions)");
            }

            updateStats();
        } catch (SQLException e) {
            System.err.println("❌ Erreur lors du chargement des tests: " + e.getMessage());
            e.printStackTrace();
            showError("Erreur", "Erreur: " + e.getMessage());
        }
    }

    /**
     * ✅ Mettre à jour les statistiques (SANS status)
     */
    private void updateStats() {
        long total = allTests.size();

        totalLabel.setText(String.valueOf(total));

        System.out.println("📊 Stats: Total=" + total);
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

        System.out.println("🔄 Tentative de chargement de GeneralTestAdd.fxml");

        try {
            App.loadScene("/views/GeneralTest/GeneralTestAdd.fxml", "➕ Ajouter Test");
            System.out.println("✅ Écran GeneralTestAdd chargé avec succès");
        } catch (Exception e) {
            System.err.println("❌ Erreur lors du chargement du formulaire: " + e.getMessage());
            e.printStackTrace();
            showError("Erreur", "Impossible de charger l'écran: " + e.getMessage());
        }
    }

    /**
     * ✅ Voir les détails du test
     */
    private void viewTest(GeneralTest test) {
        if (test == null) return;

        System.out.println("🔄 Chargement de GeneralTestView pour: " + test.getTitle());
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/views/GeneralTest/GeneralTestView.fxml"));
            Scene scene = new Scene(loader.load(), 1400, 800);

            GeneralTestViewController controller = loader.getController();
            controller.loadTest(test.getId());

            Stage stage = (Stage) testsList.getScene().getWindow();
            stage.setTitle("👁️ " + test.getTitle());
            stage.setScene(scene);

            System.out.println("✅ Vue du test chargée avec succès");
        } catch (Exception e) {
            System.err.println("❌ Erreur lors du chargement: " + e.getMessage());
            e.printStackTrace();
            showError("Erreur", "Impossible de charger le test: " + e.getMessage());
        }
    }

    /**
     * ✅ Modifier le test
     */
    private void editTest(GeneralTest test) {
        if (test == null) return;
        if (!PermissionUtils.canModifyTests() || test.getCreatedBy() != AuthContext.getCurrentUserId()) {
            showError("Erreur", "Accès refusé");
            return;
        }
        System.out.println("🔄 Chargement de GeneralTestEdit pour: " + test.getTitle());
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/views/GeneralTest/GeneralTestEdit.fxml"));
            Scene scene = new Scene(loader.load(), 1400, 800);

            GeneralTestEditController controller = loader.getController();
            controller.loadTest(test.getId());

            Stage stage = (Stage) testsList.getScene().getWindow();
            stage.setTitle("✏️ Modifier - " + test.getTitle());
            stage.setScene(scene);
        } catch (Exception e) {
            System.err.println("❌ Erreur: " + e.getMessage());
            e.printStackTrace();
            showError("Erreur", "Impossible de charger le test: " + e.getMessage());
        }
    }

    /**
     * ✅ Supprimer le test
     */
    private void deleteTest(GeneralTest test) {
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
                    GeneralTestService.deleteGeneralTest(test.getId());
                    showSuccess("Succès", "Test supprimé!");
                    loadTests();
                } catch (SQLException e) {
                    showError("Erreur", "Erreur: " + e.getMessage());
                }
            }
        });
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

    /**
     * ✅ Afficher une erreur
     */
    private void showError(String title, String message) {
        System.err.println("❌ " + title + ": " + message);
        Alert alert = new Alert(Alert.AlertType.ERROR);
        alert.setTitle(title);
        alert.setContentText(message);
        alert.showAndWait();
    }

    /**
     * ✅ Afficher un succès
     */
    private void showSuccess(String title, String message) {
        System.out.println("✅ " + title + ": " + message);
        Alert alert = new Alert(Alert.AlertType.INFORMATION);
        alert.setTitle(title);
        alert.setContentText(message);
        alert.showAndWait();
    }
}