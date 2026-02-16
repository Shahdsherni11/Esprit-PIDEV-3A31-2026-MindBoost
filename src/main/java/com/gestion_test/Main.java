package com.gestion_test;

import com.gestion_test.utils.MyDataBase;
import java.sql.Connection;
import java.sql.ResultSet;
import java.sql.Statement;

public class Main {
    public static void main(String[] args) {

        System.out.println("\n========================================");
        System.out.println("GESTION DES TESTS PSYCHOLOGIQUES");
        System.out.println("========================================\n");

        try {
            MyDataBase db = MyDataBase.getInstance();
            Connection connection = db.getConnection();

            if (db.testConnection()) {
                System.out.println("✅ Connexion à la BD réussie!\n");
            } else {
                System.err.println("❌ Impossible de se connecter\n");
                return;
            }

            System.out.println("Tables disponibles:\n");
            String sql = "SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'app_psychologique'";
            try (Statement stmt = connection.createStatement();
                 ResultSet rs = stmt.executeQuery(sql)) {

                int count = 0;
                while (rs.next()) {
                    System.out.println("  📄 " + rs.getString("TABLE_NAME"));
                    count++;
                }
                System.out.println("\nTotal: " + count + " table(s)\n");
            }

            System.out.println("========================================");
            System.out.println("✅ Application prête!");
            System.out.println("========================================\n");

        } catch (Exception e) {
            System.err.println("❌ Erreur: " + e.getMessage());
            e.printStackTrace();
        } finally {
            MyDataBase.getInstance().closeConnection();
        }
    }
}