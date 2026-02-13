package org.example;

import javafx.application.Application;
import javafx.fxml.FXMLLoader;
import javafx.scene.Scene;
import javafx.stage.Stage;
import org.example.SceneManager;

public class MainFX extends Application {
    @Override
    public void start(Stage stage) throws Exception {
        SceneManager.init(stage);
        SceneManager.switchTo("Home.fxml");
        stage.setTitle("Forum CRUD");
    }
}