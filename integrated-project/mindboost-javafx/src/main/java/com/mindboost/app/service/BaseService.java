package com.mindboost.app.service;

import com.mindboost.app.config.DatabaseManager;
import jakarta.persistence.EntityManager;
import jakarta.persistence.TypedQuery;

import java.util.List;
import java.util.Optional;

public abstract class BaseService<T> {
    protected final DatabaseManager databaseManager;
    private final Class<T> entityClass;

    protected BaseService(DatabaseManager databaseManager, Class<T> entityClass) {
        this.databaseManager = databaseManager;
        this.entityClass = entityClass;
    }

    public List<T> findAll() {
        try (EntityManager em = databaseManager.createEntityManager()) {
            TypedQuery<T> query = em.createQuery("from " + entityClass.getSimpleName(), entityClass);
            return query.getResultList();
        }
    }

    public Optional<T> findById(int id) {
        try (EntityManager em = databaseManager.createEntityManager()) {
            return Optional.ofNullable(em.find(entityClass, id));
        }
    }

    public T save(T entity) {
        try (EntityManager em = databaseManager.createEntityManager()) {
            em.getTransaction().begin();
            T merged = em.merge(entity);
            em.getTransaction().commit();
            return merged;
        }
    }

    public void delete(T entity) {
        try (EntityManager em = databaseManager.createEntityManager()) {
            em.getTransaction().begin();
            T managed = em.merge(entity);
            em.remove(managed);
            em.getTransaction().commit();
        }
    }
}
