package org.example.services;

import java.sql.SQLException;
import java.util.List;

public interface CRUDcomment<T> {
    void ajouter_comment(T comment) throws SQLException;
    void supprimer_comment(int id) throws SQLException;
    void modifier_comment(T comment) throws SQLException;
    List<T> afficher_comment() throws SQLException;
}