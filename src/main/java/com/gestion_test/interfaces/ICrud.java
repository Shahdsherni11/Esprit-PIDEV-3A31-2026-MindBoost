package com.gestion_test.interfaces;

import java.sql.SQLException;
import java.util.List;

public interface ICrud<T> {

    /**
     * Créer une entité
     */
    int create(T entity) throws SQLException;

    /**
     * Récupérer une entité par ID
     */
    T getById(int id) throws SQLException;

    /**
     * Récupérer toutes les entités
     */
    List<T> getAll() throws SQLException;

    /**
     * Modifier une entité
     */
    boolean update(T entity) throws SQLException;

    /**
     * Supprimer une entité
     */
    boolean delete(int id) throws SQLException;
}
