package org.example.services;

import java.sql.SQLException;
import java.util.List;

public interface CRUDsaves<T> {
    void ajouter_saves(T saves) throws SQLException;
    void supprimer_saves(int post_id, int user_id) throws SQLException;
    void modifier_saves(T saves) throws SQLException;
    List<T> afficher_saves() throws SQLException;
}