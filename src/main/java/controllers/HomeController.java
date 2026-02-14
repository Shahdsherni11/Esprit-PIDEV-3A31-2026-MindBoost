package controllers;

import org.example.SceneManager;

public class HomeController {

    public void goToPosts() throws Exception {
        SceneManager.switchTo("PostsMenu.fxml");
    }

    public void goToAcheivements() throws Exception {
        SceneManager.switchTo("AcheivementsMenu.fxml");
    }

    public void goToSaves() throws Exception {
        SceneManager.switchTo("SavesMenu.fxml");
    }
}