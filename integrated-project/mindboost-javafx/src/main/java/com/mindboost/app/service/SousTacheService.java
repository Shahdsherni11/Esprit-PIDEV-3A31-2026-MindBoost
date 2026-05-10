package com.mindboost.app.service;

import com.mindboost.app.config.DatabaseManager;
import com.mindboost.app.model.SousTache;

public class SousTacheService extends BaseService<SousTache> {
    private final FocusService focusService;

    public SousTacheService(DatabaseManager databaseManager, FocusService focusService) {
        super(databaseManager, SousTache.class);
        this.focusService = focusService;
    }

    public String[] getSuggestionTemplates(String titre, String objectif) {
        return focusService.generateSubTaskSuggestions(titre, objectif).toArray(new String[0]);
    }
}
