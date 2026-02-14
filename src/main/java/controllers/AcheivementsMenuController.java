package controllers;

import org.example.SceneManager;

public class AcheivementsMenuController {
    public void goToAdd() throws Exception { SceneManager.switchTo("AcheivementAdd.fxml"); }
    public void goToEdit() throws Exception { SceneManager.switchTo("AcheivementEdit.fxml"); }
    public void goToDelete() throws Exception { SceneManager.switchTo("AcheivementDelete.fxml"); }
    public void goToList() throws Exception { SceneManager.switchTo("AcheivementList.fxml"); }
    public void goBack() throws Exception { SceneManager.switchTo("Home.fxml"); }
}