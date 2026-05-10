package com.mindboost.app.service;

import com.mindboost.app.config.DatabaseManager;
import com.mindboost.app.model.Saves;

public class SavesService extends BaseService<Saves> {
    public SavesService(DatabaseManager databaseManager) {
        super(databaseManager, Saves.class);
    }
}
