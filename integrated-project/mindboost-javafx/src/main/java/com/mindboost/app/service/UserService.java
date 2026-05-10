package com.mindboost.app.service;

import com.mindboost.app.config.DatabaseManager;
import com.mindboost.app.model.User;
import jakarta.persistence.EntityManager;
import jakarta.persistence.TypedQuery;

import java.util.List;
import java.util.Optional;

public class UserService extends BaseService<User> {
    public UserService(DatabaseManager databaseManager) {
        super(databaseManager, User.class);
    }

    public Optional<User> findByEmail(String email) {
        try (EntityManager em = databaseManager.createEntityManager()) {
            TypedQuery<User> query = em.createQuery("select u from User u where u.email = :email", User.class);
            query.setParameter("email", email.trim());
            return query.getResultStream().findFirst();
        }
    }

    public List<User> searchByKeyword(String keyword) {
        String pattern = "%" + keyword.toLowerCase() + "%";
        try (EntityManager em = databaseManager.createEntityManager()) {
            TypedQuery<User> query = em.createQuery(
                "select u from User u left join fetch u.profile p where lower(u.email) like :kw or lower(p.firstName) like :kw or lower(p.lastName) like :kw",
                User.class
            );
            query.setParameter("kw", pattern);
            return query.getResultList();
        }
    }

    public List<User> findByRole(String role) {
        try (EntityManager em = databaseManager.createEntityManager()) {
            TypedQuery<User> query = em.createQuery("select u from User u where u.role = :role", User.class);
            query.setParameter("role", role);
            return query.getResultList();
        }
    }
}
