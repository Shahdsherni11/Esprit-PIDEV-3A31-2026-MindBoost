package org.example.services;

import java.sql.SQLException;
import java.util.List;

public interface CRUDusr<T> {
    void ajouter_user(T user) throws SQLException;
    void supprimer_user(int id) throws SQLException;
    void modifier_user(T user) throws SQLException;
     List<T> afficher_user() throws SQLException;
}
