package com.mindboost;

import com.mindboost.utils.ConfigLoader;
import com.mindboost.utils.SceneManager;
import javafx.application.Application;
import javafx.fxml.FXMLLoader;
import javafx.scene.Scene;
import javafx.stage.Stage;

public class MainApp extends Application {

    @Override
    public void start(Stage primaryStage) throws Exception {
        // Charge la configuration (clés API)
        ConfigLoader.load();

        // Initialise le SceneManager
        SceneManager.setPrimaryStage(primaryStage);

        FXMLLoader loader = new FXMLLoader(getClass().getResource("/com/mindboost/fxml/Login.fxml"));
        Scene scene = new Scene(loader.load(), 1100, 720);
        scene.getStylesheets().add(
            getClass().getResource("/com/mindboost/css/mindboost.css").toExternalForm()
        );

        primaryStage.setTitle("MindBoost V3 — AI Psychological Wellness Platform");
        primaryStage.setScene(scene);
        primaryStage.setMinWidth(1000);
        primaryStage.setMinHeight(680);
        primaryStage.show();
    }

    public static void main(String[] args) {
        launch(args);
    }
}
