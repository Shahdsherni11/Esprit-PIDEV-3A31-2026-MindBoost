package com.gestion_test;

import com.gestion_test.utils.MyDataBase;
import java.sql.Connection;
import java.sql.ResultSet;
import java.sql.Statement;

/**
 * ✅ MAIN.JAVA - VERSION FINALE
 *
 * RESPONSABILITÉ: Tester la base de données uniquement
 *
 * Cette classe:
 * 1. Teste la connexion à MySQL
 * 2. Affiche toutes les tables
 * 3. Affiche les statistiques
 * 4. Vérifie que tout est prêt
 *
 * IMPORTANT: Cette classe N'est PAS le point d'entrée de l'application JavaFX
 * Le point d'entrée JavaFX est dans App.java ou un autre Launcher
 */
public class Main {

    public static void main(String[] args) {
        System.out.println("\n========================================");
        System.out.println("🧠 GESTION DES TESTS PSYCHOLOGIQUES");
        System.out.println("========================================\n");

        MyDataBase db = null;

        try {
            // ===== 1. OBTENIR L'INSTANCE DE LA BD =====
            System.out.println("🔌 Tentative de connexion à la BD...");
            db = MyDataBase.getInstance();
            Connection connection = db.getConnection();

            // ===== 2. TESTER LA CONNEXION =====
            if (!db.testConnection()) {
                System.err.println("❌ Impossible de se connecter à la BD");
                System.err.println("\n⚠️ Vérifiez que:");
                System.err.println("   ├─ MySQL est démarré");
                System.err.println("   ├─ La base 'app_psychologique' existe");
                System.err.println("   ├─ L'utilisateur root existe");
                System.err.println("   └─ Le mot de passe est correct\n");
                return;
            }

            System.out.println("✅ Connexion réussie!\n");

            // ===== 3. AFFICHER LES TABLES =====
            System.out.println("📋 TABLES DISPONIBLES:\n");
            String sql = "SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES " +
                    "WHERE TABLE_SCHEMA = 'app_psychologique' " +
                    "ORDER BY TABLE_NAME";

            try (Statement stmt = connection.createStatement();
                 ResultSet rs = stmt.executeQuery(sql)) {

                int count = 0;
                while (rs.next()) {
                    String tableName = rs.getString("TABLE_NAME");

                    // Obtenir le nombre de lignes
                    String countSql = "SELECT COUNT(*) as count FROM " + tableName;
                    try (Statement countStmt = connection.createStatement();
                         ResultSet countRs = countStmt.executeQuery(countSql)) {
                        if (countRs.next()) {
                            int rowCount = countRs.getInt("count");
                            System.out.println("  📄 " + String.format("%-30s", tableName) +
                                    "(" + rowCount + " ligne" + (rowCount > 1 ? "s" : "") + ")");
                        }
                    }
                    count++;
                }

                System.out.println("\n" + "Total: " + count + " table(s)\n");
            }

            // ===== 4. AFFICHER LES STATS =====
            System.out.println("📊 STATISTIQUES:\n");
            printTableStats(connection, "users", "Utilisateurs");
            printTableStats(connection, "general_tests", "Tests Généraux");
            printTableStats(connection, "general_questions", "Questions Générales");
            printTableStats(connection, "general_answers", "Réponses Générales");
            printTableStats(connection, "specific_tests", "Tests Spécifiques");
            printTableStats(connection, "specific_questions", "Questions Spécifiques");
            printTableStats(connection, "specific_answers", "Réponses Spécifiques");
            printTableStats(connection, "student_results", "Résultats Étudiants");

            // ===== 5. AFFICHAGE FINAL =====
            System.out.println("\n========================================");
            System.out.println("✅ Vérification terminée avec succès!");
            System.out.println("========================================\n");
            System.out.println("💡 POUR LANCER L'APPLICATION:");
            System.out.println("   └─ Exécutez la classe Launcher ou App\n");

        } catch (Exception e) {
            System.err.println("❌ ERREUR: " + e.getMessage());
            System.err.println("\n📋 Stack trace:");
            e.printStackTrace();
            System.err.println();
        } finally {
            // ===== 6. FERMER LA CONNEXION =====
            if (db != null) {
                try {
                    System.out.println("🔌 Fermeture de la connexion...");
                    db.closeConnection();
                    System.out.println("✅ Connexion fermée\n");
                } catch (Exception e) {
                    System.err.println("⚠️ Erreur lors de la fermeture: " + e.getMessage());
                }
            }
        }
    }

    /**
     * ✅ AFFICHER LES STATISTIQUES D'UNE TABLE
     */
    private static void printTableStats(Connection connection, String tableName, String displayName) {
        try {
            String sql = "SELECT COUNT(*) as count FROM " + tableName;

            try (Statement stmt = connection.createStatement();
                 ResultSet rs = stmt.executeQuery(sql)) {

                if (rs.next()) {
                    int count = rs.getInt("count");
                    String status = count > 0 ? "✅" : "⚠️";
                    System.out.println(status + " " + String.format("%-30s", displayName) + ": " + count);
                }
            }
        } catch (Exception e) {
            System.err.println("❌ " + displayName + ": Erreur - " + e.getMessage());
        }
    }
}