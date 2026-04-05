package com.gestion_test;

import javafx.application.Application;
import javafx.fxml.FXMLLoader;
import javafx.scene.Scene;
import javafx.stage.Stage;
import javafx.scene.control.Alert;
import com.gestion_test.utils.MyDataBase;
import com.gestion_test.services.AuthContext;
import com.gestion_test.services.ReminderService;

public class App extends Application {

    private static Stage primaryStage;
    private static Scene currentScene;

    @Override
    public void start(Stage stage) throws Exception {
        System.out.println("========================================");
        System.out.println("MINDBOOST - GESTION DES TESTS");
        System.out.println("========================================\n");

        primaryStage = stage;

        // 1. Init DB
        try {
            MyDataBase db = MyDataBase.getInstance();
            if (!db.testConnection()) {
                showErrorAndExit("Erreur de Connexion", "Impossible de se connecter a la base de donnees.");
                return;
            }
            System.out.println("Connexion BD reussie!\n");
        } catch (Exception e) {
            showErrorAndExit("Erreur de Demarrage", "Erreur: " + e.getMessage());
            return;
        }

        // 2. Demarrer le systeme de rappels
        try {
            ReminderService.startReminderSystem();
            System.out.println("Systeme de rappels demarre!\n");
        } catch (Exception e) {
            System.err.println("Rappels non demarres: " + e.getMessage());
        }

        // 3. Load SelectRole
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/views/SelectRole.fxml"));
            if (loader.getLocation() == null) {
                throw new RuntimeException("SelectRole.fxml non trouve!");
            }

            Scene scene = new Scene(loader.load(), 900, 700);
            currentScene = scene;

            stage.setTitle("MindBoost - Selection du Role");
            stage.setScene(scene);
            stage.setMinWidth(800);
            stage.setMinHeight(600);
            stage.setWidth(900);
            stage.setHeight(700);
            stage.setOnCloseRequest(e -> cleanup());
            stage.show();

            System.out.println("Application prete!\n");
        } catch (Exception e) {
            e.printStackTrace();
            showErrorAndExit("Erreur d'Interface", "Erreur: " + e.getMessage());
        }
    }

    public static void loadScene(String fxmlPath, String title) {
        try {
            if (!fxmlPath.startsWith("/")) {
                fxmlPath = "/" + fxmlPath;
            }

            FXMLLoader loader = new FXMLLoader(App.class.getResource(fxmlPath));
            if (App.class.getResource(fxmlPath) == null) {
                throw new RuntimeException("Fichier FXML non trouve: " + fxmlPath);
            }

            Scene scene = new Scene(loader.load(), 1400, 800);
            currentScene = scene;

            if (primaryStage != null) {
                String userName = AuthContext.getCurrentUserName();
                primaryStage.setTitle(title + (userName != null ? " | " + userName : ""));
                primaryStage.setScene(scene);
                primaryStage.show();
                System.out.println("Ecran charge: " + title);
            }
        } catch (NullPointerException e) {
            System.err.println("Fichier FXML non trouve: " + fxmlPath);
            showErrorAlert("Erreur", "Impossible de charger:\n" + fxmlPath);
        } catch (Exception e) {
            System.err.println("Erreur chargement: " + fxmlPath + " - " + e.getMessage());
            e.printStackTrace();
            showErrorAlert("Erreur", "Impossible de charger:\n" + fxmlPath + "\n\n" + e.getMessage());
        }
    }

    public static void loadSceneWithController(String fxmlPath, String title, Object controller) {
        try {
            if (!fxmlPath.startsWith("/")) fxmlPath = "/" + fxmlPath;
            FXMLLoader loader = new FXMLLoader(App.class.getResource(fxmlPath));
            loader.setController(controller);
            Scene scene = new Scene(loader.load(), 1400, 800);
            currentScene = scene;
            if (primaryStage != null) {
                String userName = AuthContext.getCurrentUserName();
                primaryStage.setTitle(title + (userName != null ? " | " + userName : ""));
                primaryStage.setScene(scene);
                primaryStage.show();
            }
        } catch (Exception e) {
            e.printStackTrace();
            showErrorAlert("Erreur", "Impossible de charger:\n" + fxmlPath + "\n\n" + e.getMessage());
        }
    }

    public static Scene getCurrentScene() { return currentScene; }
    public static Stage getPrimaryStage() { return primaryStage; }

    private static void showErrorAlert(String title, String message) {
        Alert alert = new Alert(Alert.AlertType.ERROR);
        alert.setTitle(title);
        alert.setHeaderText(null);
        alert.setContentText(message);
        alert.showAndWait();
    }

    private void showErrorAndExit(String title, String message) {
        Alert alert = new Alert(Alert.AlertType.ERROR);
        alert.setTitle(title);
        alert.setHeaderText(null);
        alert.setContentText(message);
        alert.showAndWait();
        System.exit(1);
    }

    private void cleanup() {
        try {
            // Arreter les rappels
            ReminderService.stopReminderSystem();

            if (AuthContext.isAuthenticated()) AuthContext.logout();
            MyDataBase.getInstance().closeConnection();
            System.out.println("Application fermee");
        } catch (Exception e) {
            System.err.println("Erreur nettoyage: " + e.getMessage());
        }
    }

    public static void main(String[] args) {
        System.out.println("DEMARRAGE DE L'APPLICATION\n");
        try {
            launch(args);
        } catch (Exception e) {
            System.err.println("Erreur critique: " + e.getMessage());
            System.exit(1);
        }
    }

    @Override
    public void stop() throws Exception {
        cleanup();
        super.stop();
    }
}