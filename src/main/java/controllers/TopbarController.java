package controllers;

import org.example.SceneManager;

public class TopbarController {
    public void goHome() throws Exception { SceneManager.switchTo("Home.fxml"); }
    public void goPosts() throws Exception { SceneManager.switchTo("PostsMenu.fxml"); }
    public void goAchievements() throws Exception { SceneManager.switchTo("AcheivementsMenu.fxml"); }
    public void goSaves() throws Exception { SceneManager.switchTo("SavesMenu.fxml"); }
}