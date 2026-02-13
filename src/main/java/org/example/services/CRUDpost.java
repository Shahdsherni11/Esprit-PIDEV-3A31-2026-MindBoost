package org.example.services;

import java.sql.SQLException;
import java.util.List;

public interface CRUDpost<T> {
    void ajouter_post(T post) throws SQLException;
    void supprimer_post(int post_id) throws SQLException;
    void modifier_post(T post) throws SQLException;
    List<T> afficher_post() throws SQLException;
}

