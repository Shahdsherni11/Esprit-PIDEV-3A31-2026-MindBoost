package com.mindboost.app;

import com.mindboost.app.config.AppContext;
import com.mindboost.app.ui.LoginView;
import com.mindboost.app.ui.MainLayout;
import javafx.application.Application;
import javafx.scene.Scene;
import javafx.stage.Stage;

public class MindBoostApp extends Application {
    private AppContext context;

    @Override
    public void start(Stage stage) {
        context = new AppContext();
        stage.setTitle(context.getConfig().get("app.title", "MindBoost JavaFX"));
        stage.setMinWidth(1200);
        stage.setMinHeight(760);

        showLogin(stage);
        stage.show();
    }

    private void showLogin(Stage stage) {
        LoginView loginView = new LoginView(context, user -> {
            MainLayout layout = new MainLayout(context, () -> showLogin(stage));
            Scene scene = new Scene(layout.getView(), 1200, 760);
            stage.setScene(scene);
        });

        Scene scene = new Scene(loginView.getView(), 600, 520);
        stage.setScene(scene);
    }

    @Override
    public void stop() {
        if (context != null) {
            context.shutdown();
        }
    }

    public static void main(String[] args) {
        launch(args);
    }
}
