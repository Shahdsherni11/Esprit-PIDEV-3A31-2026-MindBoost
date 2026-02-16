package com.gestion_test.utils;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;

public class MyDataBase {

    // ========================================
    // CONFIGURATION BD : app_psychologique
    // (Tests Psycho + Users + Profiles)
    // ========================================
    final String USERNAME = "root";
    final String URL = "jdbc:mysql://localhost:3306/app_psychologique";
    final String PASSWORD = "";

    Connection connection;
    static MyDataBase instance;

    /**
     * Constructeur privé (Singleton)
     */
    private MyDataBase() {
        try {
            Class.forName("com.mysql.cj.jdbc.Driver");
            System.out.println("✅ Driver MySQL chargé");

            connection = DriverManager.getConnection(URL, USERNAME, PASSWORD);
            System.out.println("✅ Connexion à la BD établie");
            System.out.println("   URL: " + URL);
            System.out.println("   User: " + USERNAME);

        } catch (ClassNotFoundException e) {
            System.err.println("❌ Driver MySQL non trouvé: " + e.getMessage());
        } catch (SQLException e) {
            System.err.println("❌ Erreur de connexion: " + e.getMessage());
        }
    }

    public static MyDataBase getInstance() {
        if (instance == null) {
            instance = new MyDataBase();
        }
        return instance;
    }

    public Connection getConnection() {
        return connection;
    }

    public boolean testConnection() {
        try {
            return connection != null && !connection.isClosed();
        } catch (SQLException e) {
            return false;
        }
    }

    public void closeConnection() {
        try {
            if (connection != null && !connection.isClosed()) {
                connection.close();
                System.out.println("✅ Connexion fermée");
            }
        } catch (SQLException e) {
            System.err.println("❌ Erreur: " + e.getMessage());
        }
    }

}