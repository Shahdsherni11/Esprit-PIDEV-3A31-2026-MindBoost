package controllers;

import org.example.SceneManager;

public class SavesMenuController {
    public void goToAdd() throws Exception { SceneManager.switchTo("SavesAdd.fxml"); }
    public void goToEdit() throws Exception { SceneManager.switchTo("SavesEdit.fxml"); }
    public void goToDelete() throws Exception { SceneManager.switchTo("SavesDelete.fxml"); }
    public void goToList() throws Exception { SceneManager.switchTo("SavesList.fxml"); }
    public void goBack() throws Exception { SceneManager.switchTo("Home.fxml"); }
}
