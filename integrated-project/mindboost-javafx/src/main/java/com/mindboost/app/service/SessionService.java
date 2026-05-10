package com.mindboost.app.service;

import com.mindboost.app.model.User;

public class SessionService {
    private User currentUser;

    public void setCurrentUser(User user) {
        this.currentUser = user;
    }

    public User getCurrentUser() {
        return currentUser;
    }

    public void clear() {
        currentUser = null;
    }

    public boolean isAdmin() {
        return currentUser != null && currentUser.isAdmin();
    }

    public boolean isPsychologist() {
        return currentUser != null && currentUser.isPsychologist();
    }

    public int getCurrentUserId() {
        if (currentUser == null || currentUser.getId() == null) {
            return 1;
        }
        return currentUser.getId();
    }
}
