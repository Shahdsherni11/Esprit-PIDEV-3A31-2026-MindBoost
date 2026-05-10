package com.mindboost.app.service;

import com.mindboost.app.config.DatabaseManager;
import com.mindboost.app.model.Profile;
import jakarta.persistence.EntityManager;
import jakarta.persistence.TypedQuery;

import java.util.List;

public class ProfileService extends BaseService<Profile> {
    public ProfileService(DatabaseManager databaseManager) {
        super(databaseManager, Profile.class);
    }

    public List<Profile> searchByKeyword(String keyword) {
        String pattern = "%" + keyword.toLowerCase() + "%";
        try (EntityManager em = databaseManager.createEntityManager()) {
            TypedQuery<Profile> query = em.createQuery(
                "select p from Profile p join fetch p.user u where lower(p.firstName) like :kw or lower(p.lastName) like :kw or lower(u.email) like :kw",
                Profile.class
            );
            query.setParameter("kw", pattern);
            return query.getResultList();
        }
    }

    public List<Profile> filterByPersonalityType(String type) {
        try (EntityManager em = databaseManager.createEntityManager()) {
            TypedQuery<Profile> query = em.createQuery("select p from Profile p where p.personalityType = :type", Profile.class);
            query.setParameter("type", type);
            return query.getResultList();
        }
    }
}
