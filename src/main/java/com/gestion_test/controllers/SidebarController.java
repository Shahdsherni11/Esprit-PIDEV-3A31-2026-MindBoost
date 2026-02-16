package com.gestion_test.controllers;

import javafx.fxml.FXML;
import com.gestion_test.App;

public class SidebarController {

    @FXML
    private void handleOpenGeneralTests() {
        App.loadScene("/views/GeneralTest/GeneralTestList.fxml", "Tests Généraux - MindBoost");
    }

    @FXML
    private void handleOpenSpecificTests() {
        App.loadScene("/views/SpecificTest/specificTestList.fxml", "Tests Spécifiques - MindBoost");
    }
}
