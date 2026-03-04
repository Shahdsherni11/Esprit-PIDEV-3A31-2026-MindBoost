package com.mindboost.utils;

import com.mindboost.models.Profile;
import com.mindboost.models.User;

public class SessionManager {

    private static SessionManager instance;
    private User currentUser;
    private Profile currentProfile;

    private SessionManager() {}

    public static synchronized SessionManager getInstance() {
        if (instance == null) instance = new SessionManager();
        return instance;
    }

    public User getCurrentUser() { return currentUser; }
    public void setCurrentUser(User u) { this.currentUser = u; }
    public Profile getCurrentProfile() { return currentProfile; }
    public void setCurrentProfile(Profile p) { this.currentProfile = p; }

    public boolean isAdmin() {
        return currentUser != null && "admin".equals(currentUser.getRole());
    }

    public void logout() {
        currentUser = null;
        currentProfile = null;
    }
}
