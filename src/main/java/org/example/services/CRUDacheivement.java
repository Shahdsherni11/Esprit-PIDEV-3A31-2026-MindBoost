package org.example.services;

import java.sql.SQLException;
import java.util.List;

public interface CRUDacheivement<T> {
    void ajouter_acheivement(T acheivement) throws SQLException;
    void supprimer_acheivement(int id) throws SQLException;
    void modifier_acheivement(T acheivement) throws SQLException;
    List<T> afficher_acheivement() throws SQLException;
}