package com.mindboost.app.service;

import com.mindboost.app.config.DatabaseManager;
import com.mindboost.app.model.Achievement;

public class AchievementService extends BaseService<Achievement> {
    public AchievementService(DatabaseManager databaseManager) {
        super(databaseManager, Achievement.class);
    }
}
