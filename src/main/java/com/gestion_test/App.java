package com.gestion_test;

import javafx.application.Application;
import javafx.fxml.FXMLLoader;
import javafx.scene.Scene;
import javafx.stage.Stage;
import javafx.scene.image.Image;
import javafx.scene.control.Alert;
import com.gestion_test.utils.MyDataBase;
import com.gestion_test.services.AuthContext;

public class App extends Application {

    // Variable pour garder une référence au stage (fenêtre principale)
    private static Stage primaryStage;

    @Override
    public void start(Stage stage) throws Exception {
        // Sauvegarder le stage principal
        primaryStage = stage;

        // ===== 1. INITIALISER LA CONNEXION BD =====
        try {
            MyDataBase db = MyDataBase.getInstance();
            if (!db.testConnection()) {
                System.err.println("❌ ERREUR: Impossible de se connecter à la base de données");
                showErrorAndExit("Erreur de Connexion",
                        "Impossible de se connecter à la base de données.\n" +
                                "Vérifiez votre configuration MySQL.");
                return;
            }
            System.out.println("✅ Connexion à la BD réussie!");
        } catch (Exception e) {
            System.err.println("❌ ERREUR BD: " + e.getMessage());
            showErrorAndExit("Erreur de Démarrage",
                    "Erreur lors de l'initialisation: " + e.getMessage());
            return;
        }

        // ===== 2. SIMULER LA CONNEXION D'UN UTILISATEUR (À REMPLACER) =====
        // TODO: Remplacer par le module User de ta collègue
        AuthContext.setCurrentUser(1, "psychologue@mindboost.com", "psychologist", "Dr. Michel");
        System.out.println("✅ Utilisateur connecté via AuthContext");

        // ===== 3. CHARGER L'INTERFACE PRINCIPALE =====
        try {
            loadDashboard(stage);
        } catch (Exception e) {
            System.err.println("❌ ERREUR FXML: " + e.getMessage());
            e.printStackTrace();
            showErrorAndExit("Erreur d'Interface",
                    "Erreur lors du chargement de l'interface: " + e.getMessage());
        }
    }

    /**
     * Charger l'écran Dashboard (accueil)
     */
    private void loadDashboard(Stage stage) throws Exception {
        FXMLLoader loader = new FXMLLoader(
                getClass().getResource("/views/Dashboard.fxml")
        );

        Scene scene = new Scene(loader.load(), 1400, 800);

        stage.setTitle("🧠 MindBoost - Gestion des Tests Psychologiques");
        stage.setScene(scene);
        stage.setMinWidth(1200);
        stage.setMinHeight(700);
        stage.show();
    }

    /**
     * ✅ CORRECTION COMPLÈTE : Charger un écran FXML quelconque
     * (À utiliser pour la navigation entre écrans)
     */
    public static void loadScene(String fxmlPath, String title) {
        try {
            System.out.println("🔄 Tentative de chargement: " + fxmlPath);

            // Vérifier que le chemin commence par /
            if (!fxmlPath.startsWith("/")) {
                fxmlPath = "/" + fxmlPath;
            }

            System.out.println("📍 Chemin final: " + fxmlPath);

            FXMLLoader loader = new FXMLLoader(App.class.getResource(fxmlPath));

            // Vérifier que la ressource existe
            if (App.class.getResource(fxmlPath) == null) {
                throw new RuntimeException("❌ Fichier FXML non trouvé: " + fxmlPath);
            }

            Scene scene = new Scene(loader.load(), 1400, 800);

            primaryStage.setTitle(title);
            primaryStage.setScene(scene);

            System.out.println("✅ Écran chargé avec succès: " + fxmlPath);

        } catch (NullPointerException e) {
            System.err.println("❌ ERREUR: Le fichier FXML n'existe pas");
            System.err.println("   Chemin cherché: " + fxmlPath);
            System.err.println("   Vérifiez la structure des dossiers dans resources/views/");
            e.printStackTrace();
            showErrorAlert("Erreur de Fichier",
                    "Le fichier FXML n'a pas pu être trouvé:\n" + fxmlPath +
                            "\n\nVérifiez que le fichier existe dans resources/views/");
        } catch (Exception e) {
            System.err.println("❌ Erreur lors du chargement: " + fxmlPath);
            System.err.println("   Message: " + e.getMessage());
            System.err.println("   Cause: " + e.getCause());
            e.printStackTrace();
            showErrorAlert("Erreur de Chargement",
                    "Impossible de charger l'écran:\n" + fxmlPath +
                            "\n\nErreur: " + e.getMessage());
        }
    }

    /**
     * Charger un écran avec un contrôleur qui a besoin d'un paramètre
     * (Pour les écrans de modification/suppression)
     */
    public static void loadSceneWithController(String fxmlPath, String title, Object controller) {
        try {
            System.out.println("🔄 Tentative de chargement avec contrôleur: " + fxmlPath);

            if (!fxmlPath.startsWith("/")) {
                fxmlPath = "/" + fxmlPath;
            }

            FXMLLoader loader = new FXMLLoader(App.class.getResource(fxmlPath));
            loader.setController(controller);
            Scene scene = new Scene(loader.load(), 1400, 800);

            primaryStage.setTitle(title);
            primaryStage.setScene(scene);

            System.out.println("✅ Écran chargé avec contrôleur: " + fxmlPath);
        } catch (Exception e) {
            System.err.println("❌ Erreur lors du chargement: " + fxmlPath);
            e.printStackTrace();
            showErrorAlert("Erreur de Chargement",
                    "Impossible de charger l'écran:\n" + fxmlPath +
                            "\n\nErreur: " + e.getMessage());
        }
    }

    /**
     * Afficher une alerte d'erreur
     */
    private static void showErrorAlert(String title, String message) {
        Alert alert = new Alert(Alert.AlertType.ERROR);
        alert.setTitle(title);
        alert.setHeaderText(null);
        alert.setContentText(message);
        alert.showAndWait();
    }

    /**
     * Afficher un message d'erreur et quitter l'application
     */
    private void showErrorAndExit(String title, String message) {
        System.err.println("❌ " + title + ": " + message);
        System.exit(1);
    }

    /**
     * Point d'entrée principal
     */
    public static void main(String[] args) {
        System.out.println("========================================");
        System.out.println("🧠 MINDBOOST - GESTION DES TESTS");
        System.out.println("========================================\n");

        launch(args);
    }

    /**
     * Appelé quand l'application se ferme
     */
    @Override
    public void stop() throws Exception {
        System.out.println("\n✅ Fermeture de l'application...");

        // Déconnecter l'utilisateur
        AuthContext.logout();

        // Fermer la connexion BD
        MyDataBase.getInstance().closeConnection();

        System.out.println("✅ Application fermée avec succès!");
        super.stop();
    }
}