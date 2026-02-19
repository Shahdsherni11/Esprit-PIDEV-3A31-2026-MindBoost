package com.gestion_test;

import javafx.application.Application;
import javafx.fxml.FXMLLoader;
import javafx.scene.Scene;
import javafx.stage.Stage;
import javafx.scene.control.Alert;
import com.gestion_test.utils.MyDataBase;
import com.gestion_test.services.AuthContext;

/**
 * ✅ APP.JAVA - VERSION FINALE
 *
 * RESPONSABILITÉ: Gestion complète de l'interface JavaFX
 *
 * Cette classe:
 * 1. Initialise la base de données
 * 2. Affiche l'écran de sélection du rôle (SelectRole.fxml)
 * 3. Gère la navigation entre tous les écrans
 * 4. Gère la fermeture propre de l'application
 *
 * FLUX:
 * 1. start() → Initialise BD → Charge SelectRole.fxml
 * 2. Utilisateur sélectionne rôle (Psychologue ou Étudiant)
 * 3. loadScene() navigue vers l'écran approprié
 * 4. stop() → Fermeture propre
 */
public class App extends Application {

    // ===== VARIABLES STATIQUES =====
    private static Stage primaryStage;
    private static Scene currentScene;

    @Override
    public void start(Stage stage) throws Exception {
        System.out.println("========================================");
        System.out.println("🧠 MINDBOOST - GESTION DES TESTS");
        System.out.println("========================================\n");

        primaryStage = stage;

        // ===== 1. INITIALISER LA CONNEXION BD =====
        try {
            System.out.println("🔌 Connexion à la base de données...");
            MyDataBase db = MyDataBase.getInstance();

            if (!db.testConnection()) {
                System.err.println("❌ ERREUR: Impossible de se connecter à la base de données");
                showErrorAndExit("Erreur de Connexion",
                        "❌ Impossible de se connecter à la base de données.\n\n" +
                                "Vérifiez que:\n" +
                                "• MySQL est démarré\n" +
                                "• La base 'app_psychologique' existe\n" +
                                "• L'utilisateur root existe\n" +
                                "• Le mot de passe est correct");
                return;
            }
            System.out.println("✅ Connexion BD réussie!\n");
        } catch (Exception e) {
            System.err.println("❌ ERREUR BD: " + e.getMessage());
            e.printStackTrace();
            showErrorAndExit("Erreur de Démarrage",
                    "Erreur lors de l'initialisation de la BD:\n\n" + e.getMessage());
            return;
        }

        // ===== 2. CHARGER SELECTROLE.FXML (PREMIER ÉCRAN) =====
        try {
            System.out.println("📄 Chargement de SelectRole.fxml...");
            FXMLLoader loader = new FXMLLoader(
                    getClass().getResource("/views/SelectRole.fxml")
            );

            if (loader.getLocation() == null) {
                throw new RuntimeException("❌ SelectRole.fxml non trouvé!");
            }

            Scene scene = new Scene(loader.load(), 900, 700);
            currentScene = scene;

            stage.setTitle("🧠 MindBoost - Sélection du Rôle");
            stage.setScene(scene);
            stage.setMinWidth(800);
            stage.setMinHeight(600);
            stage.setWidth(900);
            stage.setHeight(700);
            stage.setOnCloseRequest(e -> cleanup());
            stage.show();

            System.out.println("✅ SelectRole.fxml chargé avec succès!\n");
        } catch (Exception e) {
            System.err.println("❌ ERREUR FXML: " + e.getMessage());
            e.printStackTrace();
            showErrorAndExit("Erreur d'Interface",
                    "Erreur lors du chargement de l'interface:\n\n" + e.getMessage());
            return;
        }

        System.out.println("========================================");
        System.out.println("✅ Application prête!");
        System.out.println("========================================\n");
    }

    /**
     * ✅ CHARGER N'IMPORTE QUEL ÉCRAN FXML
     *
     * Utilisé pour naviguer entre les écrans
     *
     * @param fxmlPath Chemin complet du fichier FXML
     * @param title Titre de la fenêtre
     */
    public static void loadScene(String fxmlPath, String title) {
        try {
            System.out.println("🔄 Chargement de l'écran...");
            System.out.println("   └─ Chemin: " + fxmlPath);

            // Normaliser le chemin
            if (!fxmlPath.startsWith("/")) {
                fxmlPath = "/" + fxmlPath;
            }

            // Charger le fichier FXML
            FXMLLoader loader = new FXMLLoader(App.class.getResource(fxmlPath));

            // Vérifier que la ressource existe
            if (App.class.getResource(fxmlPath) == null) {
                throw new RuntimeException("❌ Fichier FXML non trouvé: " + fxmlPath);
            }

            // Créer la nouvelle scène
            Scene scene = new Scene(loader.load(), 1400, 800);
            currentScene = scene;

            // Mettre à jour le stage
            if (primaryStage != null) {
                String userName = AuthContext.getCurrentUserName();
                primaryStage.setTitle(title + (userName != null ? " | " + userName : ""));
                primaryStage.setScene(scene);
                primaryStage.show();

                System.out.println("✅ Écran chargé avec succès!");
                System.out.println("   ├─ Titre: " + title);
                if (userName != null) {
                    System.out.println("   └─ Utilisateur: " + userName);
                }
                System.out.println();
            } else {
                System.err.println("❌ ERREUR: primaryStage n'est pas initialisé!");
            }
        } catch (NullPointerException e) {
            System.err.println("❌ ERREUR: Le fichier FXML n'existe pas");
            System.err.println("   └─ Chemin cherché: " + fxmlPath);
            showErrorAlert("Erreur de Fichier",
                    "❌ Le fichier FXML n'a pas pu être trouvé:\n\n" + fxmlPath);
        } catch (Exception e) {
            System.err.println("❌ Erreur lors du chargement: " + fxmlPath);
            System.err.println("   ├─ Message: " + e.getMessage());
            System.err.println("   └─ Cause: " + (e.getCause() != null ? e.getCause().toString() : "Inconnue") + "\n");
            e.printStackTrace();
            showErrorAlert("Erreur de Chargement",
                    "❌ Impossible de charger l'écran:\n\n" + fxmlPath +
                            "\n\nErreur: " + e.getMessage());
        }
    }

    /**
     * ✅ CHARGER UN ÉCRAN AVEC UN CONTRÔLEUR PERSONNALISÉ
     */
    public static void loadSceneWithController(String fxmlPath, String title, Object controller) {
        try {
            System.out.println("🔄 Chargement avec contrôleur personnalisé...");
            System.out.println("   ├─ Chemin: " + fxmlPath);
            System.out.println("   └─ Contrôleur: " + controller.getClass().getSimpleName());

            if (!fxmlPath.startsWith("/")) {
                fxmlPath = "/" + fxmlPath;
            }

            FXMLLoader loader = new FXMLLoader(App.class.getResource(fxmlPath));
            loader.setController(controller);

            Scene scene = new Scene(loader.load(), 1400, 800);
            currentScene = scene;

            if (primaryStage != null) {
                String userName = AuthContext.getCurrentUserName();
                primaryStage.setTitle(title + (userName != null ? " | " + userName : ""));
                primaryStage.setScene(scene);
                primaryStage.show();

                System.out.println("✅ Écran chargé avec succès!\n");
            }
        } catch (Exception e) {
            System.err.println("❌ Erreur lors du chargement: " + fxmlPath);
            e.printStackTrace();
            showErrorAlert("Erreur de Chargement",
                    "❌ Impossible de charger l'écran:\n\n" + fxmlPath +
                            "\n\nErreur: " + e.getMessage());
        }
    }

    /**
     * ✅ OBTENIR LA SCÈNE ACTUELLE
     */
    public static Scene getCurrentScene() {
        return currentScene;
    }

    /**
     * ✅ OBTENIR LE STAGE PRINCIPAL
     */
    public static Stage getPrimaryStage() {
        return primaryStage;
    }

    /**
     * ✅ AFFICHER UNE ALERTE D'ERREUR
     */
    private static void showErrorAlert(String title, String message) {
        Alert alert = new Alert(Alert.AlertType.ERROR);
        alert.setTitle(title);
        alert.setHeaderText(null);
        alert.setContentText(message);
        alert.getDialogPane().setPrefWidth(500);
        alert.getDialogPane().setPrefHeight(300);
        alert.showAndWait();
    }

    /**
     * ✅ AFFICHER UN MESSAGE D'ERREUR ET QUITTER
     */
    private void showErrorAndExit(String title, String message) {
        Alert alert = new Alert(Alert.AlertType.ERROR);
        alert.setTitle(title);
        alert.setHeaderText(null);
        alert.setContentText(message);
        alert.getDialogPane().setPrefWidth(500);
        alert.getDialogPane().setPrefHeight(300);
        alert.showAndWait();

        System.exit(1);
    }

    /**
     * ✅ NETTOYER LES RESSOURCES AVANT FERMETURE
     */
    private void cleanup() {
        try {
            if (AuthContext.isAuthenticated()) {
                System.out.println("🔐 Déconnexion de l'utilisateur...");
                AuthContext.logout();
            }

            System.out.println("🔌 Fermeture de la connexion BD...");
            MyDataBase.getInstance().closeConnection();

            System.out.println("✅ Application fermée avec succès!");
        } catch (Exception e) {
            System.err.println("⚠️ Erreur lors du nettoyage: " + e.getMessage());
        }
    }

    /**
     * ✅ POINT D'ENTRÉE PRINCIPAL
     *
     * C'est cette classe qui lance l'application JavaFX!
     */
    public static void main(String[] args) {
        System.out.println("\n========================================");
        System.out.println("🚀 DÉMARRAGE DE L'APPLICATION");
        System.out.println("========================================\n");

        try {
            launch(args);
        } catch (Exception e) {
            System.err.println("❌ Erreur critique: " + e.getMessage());
            e.printStackTrace();
            System.exit(1);
        }
    }

    /**
     * ✅ APPELÉ QUAND L'APPLICATION SE FERME
     */
    @Override
    public void stop() throws Exception {
        System.out.println("\n========================================");
        System.out.println("🔓 FERMETURE DE L'APPLICATION");
        System.out.println("========================================\n");

        cleanup();
        super.stop();
    }
}