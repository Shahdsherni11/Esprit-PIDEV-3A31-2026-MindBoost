package com.mindboost.app.service;

import com.mindboost.app.config.DatabaseManager;
import com.mindboost.app.model.Profile;
import com.mindboost.app.model.User;
import jakarta.persistence.EntityManager;
import jakarta.persistence.NoResultException;
import jakarta.persistence.TypedQuery;
import org.mindrot.jbcrypt.BCrypt;

import java.time.LocalDateTime;

public class AuthService {
    private final DatabaseManager databaseManager;
    private final SessionService sessionService;

    public AuthService(DatabaseManager databaseManager, SessionService sessionService) {
        this.databaseManager = databaseManager;
        this.sessionService = sessionService;
    }

    public User login(String email, String password) {
        try (EntityManager em = databaseManager.createEntityManager()) {
            TypedQuery<User> query = em.createQuery("select u from User u where u.email = :email", User.class);
            query.setParameter("email", email.trim());
            User user = query.getSingleResult();
            if (user == null || user.getPassword() == null) {
                throw new IllegalArgumentException("Identifiants invalides");
            }
            if (!BCrypt.checkpw(password, user.getPassword())) {
                throw new IllegalArgumentException("Identifiants invalides");
            }
            sessionService.setCurrentUser(user);
            return user;
        } catch (NoResultException e) {
            throw new IllegalArgumentException("Identifiants invalides");
        }
    }

    public User register(String email, String password, String firstName, String lastName) {
        try (EntityManager em = databaseManager.createEntityManager()) {
            em.getTransaction().begin();

            TypedQuery<Long> query = em.createQuery("select count(u) from User u where u.email = :email", Long.class);
            query.setParameter("email", email.trim());
            if (query.getSingleResult() > 0) {
                throw new IllegalArgumentException("Cet email est déjà utilisé.");
            }

            User user = new User();
            user.setEmail(email.trim());
            user.setPassword(BCrypt.hashpw(password, BCrypt.gensalt()));
            user.setRole("user");
            user.setVerified(false);
            user.setCreatedAt(LocalDateTime.now());

            Profile profile = new Profile();
            profile.setFirstName(firstName == null || firstName.isBlank() ? "Nouveau" : firstName.trim());
            profile.setLastName(lastName == null || lastName.isBlank() ? "Membre" : lastName.trim());
            profile.setUser(user);
            user.setProfile(profile);

            em.persist(user);
            em.getTransaction().commit();

            sessionService.setCurrentUser(user);
            return user;
        }
    }

    public void logout() {
        sessionService.clear();
    }
}
