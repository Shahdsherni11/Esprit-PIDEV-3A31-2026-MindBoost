package org.example;

import javafx.fxml.FXMLLoader;
import javafx.geometry.Rectangle2D;
import javafx.scene.Scene;
import javafx.stage.Screen;
import javafx.stage.Stage;

public class SceneManager {
    private static Stage primaryStage;

    public static void init(Stage stage) {
        primaryStage = stage;
        primaryStage.setResizable(true);
    }

    public static void switchTo(String fxml) throws Exception {
        FXMLLoader loader = new FXMLLoader(SceneManager.class.getResource("/" + fxml));
        Scene scene = new Scene(loader.load());
        Rectangle2D bounds = Screen.getPrimary().getVisualBounds();

        primaryStage.setScene(scene);
        primaryStage.setX(bounds.getMinX());
        primaryStage.setY(bounds.getMinY());
        primaryStage.setWidth(bounds.getWidth());
        primaryStage.setHeight(bounds.getHeight());
        primaryStage.setResizable(true);
        primaryStage.show();
    }
}