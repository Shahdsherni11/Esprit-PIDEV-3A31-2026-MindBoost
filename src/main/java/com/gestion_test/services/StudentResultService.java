package com.gestion_test.services;

import com.gestion_test.utils.MyDataBase;
import java.sql.*;
import java.time.LocalDateTime;

/**
 * ✅ Service pour stocker les résultats des étudiants
 *
 * STRUCTURE:
 * - Un étudiant = 1 score général + 1 catégorie + 1 test spécifique
 * - Après test général → Assignation automatique du test spécifique
 * - Après test spécifique → Enregistrement du score final
 */
public class StudentResultService {

    private static final Connection connection = MyDataBase.getInstance().getConnection();

    /**
     * ✅ SAUVEGARDER LE RÉSULTAT DU TEST GÉNÉRAL
     *
     * Effectue:
     * 1. Insère le résultat du test général
     * 2. Enregistre le score et la catégorie
     * 3. Définit le statut à "PENDING"
     *
     * @param studentId ID de l'étudiant
     * @param generalTestId ID du test général
     * @param score Score obtenu (0-100)
     * @param category Catégorie déterminée (DEPRESSION, STRESS, ANXIETY, SLEEP_DISORDER)
     * @return ID du résultat enregistré, -1 si erreur
     */
    public static int saveGeneralTestResult(int studentId, int generalTestId, int score, String category) throws SQLException {
        System.out.println("💾 Enregistrement du résultat général...");

        String sql = "INSERT INTO student_results " +
                "(student_id, general_test_id, general_test_score, category, status, created_at) " +
                "VALUES (?, ?, ?, ?, 'PENDING', NOW())";

        try (PreparedStatement pstmt = connection.prepareStatement(sql, Statement.RETURN_GENERATED_KEYS)) {
            pstmt.setInt(1, studentId);
            pstmt.setInt(2, generalTestId);
            pstmt.setInt(3, score);
            pstmt.setString(4, category);

            pstmt.executeUpdate();

            try (ResultSet rs = pstmt.getGeneratedKeys()) {
                if (rs.next()) {
                    int resultId = rs.getInt(1);
                    System.out.println("✅ Résultat général enregistré avec succès!");
                    System.out.println("   ├─ ID du résultat: " + resultId);
                    System.out.println("   ├─ Étudiant ID: " + studentId);
                    System.out.println("   ├─ Score: " + score + "/100");
                    System.out.println("   └─ Catégorie: " + category);
                    return resultId;
                }
            }
        } catch (SQLException e) {
            System.err.println("❌ Erreur lors de l'enregistrement: " + e.getMessage());
            throw e;
        }
        return -1;
    }

    /**
     * ✅ SAUVEGARDER LE RÉSULTAT DU TEST SPÉCIFIQUE
     *
     * Effectue:
     * 1. Trouve le résultat existant de l'étudiant
     * 2. Met à jour avec le score du test spécifique
     * 3. Change le statut à "COMPLETED"
     *
     * @param studentId ID de l'étudiant
     * @param specificTestId ID du test spécifique
     * @param score Score obtenu (0-100)
     * @return true si succès, false sinon
     */
    public static boolean saveSpecificTestResult(int studentId, int specificTestId, int score) throws SQLException {
        System.out.println("💾 Enregistrement du résultat spécifique...");

        String sql = "UPDATE student_results " +
                "SET specific_test_id = ?, specific_test_score = ?, status = 'COMPLETED', updated_at = NOW() " +
                "WHERE student_id = ? LIMIT 1";

        try (PreparedStatement pstmt = connection.prepareStatement(sql)) {
            pstmt.setInt(1, specificTestId);
            pstmt.setInt(2, score);
            pstmt.setInt(3, studentId);

            int rowsAffected = pstmt.executeUpdate();

            if (rowsAffected > 0) {
                System.out.println("✅ Résultat spécifique enregistré avec succès!");
                System.out.println("   ├─ Étudiant ID: " + studentId);
                System.out.println("   ├─ Test spécifique ID: " + specificTestId);
                System.out.println("   ├─ Score: " + score + "/100");
                System.out.println("   └─ Statut: COMPLETED");
                return true;
            } else {
                System.err.println("⚠️ Aucune ligne mise à jour (étudiant non trouvé)");
                return false;
            }
        } catch (SQLException e) {
            System.err.println("❌ Erreur lors de la mise à jour: " + e.getMessage());
            throw e;
        }
    }

    /**
     * ✅ OBTENIR LE TEST SPÉCIFIQUE POUR UNE CATÉGORIE
     *
     * Il y a un seul test spécifique par catégorie.
     * Cette méthode le retrouve basé sur la catégorie.
     *
     * @param category Catégorie (DEPRESSION, STRESS, ANXIETY, SLEEP_DISORDER)
     * @return ID du test spécifique, -1 si non trouvé
     */
    public static int getSpecificTestIdForCategory(String category) throws SQLException {
        System.out.println("🔍 Recherche du test spécifique pour catégorie: " + category);

        String sql = "SELECT id FROM specific_tests WHERE category = ? AND status = 'ACTIVE' LIMIT 1";

        try (PreparedStatement pstmt = connection.prepareStatement(sql)) {
            pstmt.setString(1, category);

            try (ResultSet rs = pstmt.executeQuery()) {
                if (rs.next()) {
                    int testId = rs.getInt("id");
                    System.out.println("✅ Test spécifique trouvé!");
                    System.out.println("   ├─ Catégorie: " + category);
                    System.out.println("   └─ Test ID: " + testId);
                    return testId;
                } else {
                    System.err.println("⚠️ Aucun test spécifique trouvé pour la catégorie: " + category);
                    return -1;
                }
            }
        } catch (SQLException e) {
            System.err.println("❌ Erreur lors de la recherche: " + e.getMessage());
            throw e;
        }
    }

    /**
     * ✅ VÉRIFIER SI L'ÉTUDIANT A DÉJÀ PASSÉ UN TEST GÉNÉRAL
     *
     * Évite les doublons en vérifiant si un résultat existe déjà.
     *
     * @param studentId ID de l'étudiant
     * @param generalTestId ID du test général
     * @return true si déjà passé, false sinon
     */
    public static boolean hasStudentAlreadyTakenGeneralTest(int studentId, int generalTestId) throws SQLException {
        System.out.println("🔍 Vérification si l'étudiant a déjà passé ce test...");

        String sql = "SELECT COUNT(*) as count FROM student_results " +
                "WHERE student_id = ? AND general_test_id = ?";

        try (PreparedStatement pstmt = connection.prepareStatement(sql)) {
            pstmt.setInt(1, studentId);
            pstmt.setInt(2, generalTestId);

            try (ResultSet rs = pstmt.executeQuery()) {
                if (rs.next()) {
                    boolean exists = rs.getInt("count") > 0;
                    if (exists) {
                        System.out.println("⚠️ L'étudiant a déjà passé ce test");
                    } else {
                        System.out.println("✅ Test pas encore passé par cet étudiant");
                    }
                    return exists;
                }
            }
        } catch (SQLException e) {
            System.err.println("❌ Erreur lors de la vérification: " + e.getMessage());
            throw e;
        }
        return false;
    }

    /**
     * ✅ OBTENIR LA CATÉGORIE ASSIGNÉE À L'ÉTUDIANT
     *
     * Récupère la catégorie déterminée par le test général.
     *
     * @param studentId ID de l'étudiant
     * @return La catégorie assignée, null si non trouvée
     */
    public static String getStudentAssignedCategory(int studentId) throws SQLException {
        System.out.println("🔍 Récupération de la catégorie assignée...");

        String sql = "SELECT category FROM student_results " +
                "WHERE student_id = ? " +
                "ORDER BY created_at DESC LIMIT 1";

        try (PreparedStatement pstmt = connection.prepareStatement(sql)) {
            pstmt.setInt(1, studentId);

            try (ResultSet rs = pstmt.executeQuery()) {
                if (rs.next()) {
                    String category = rs.getString("category");
                    System.out.println("✅ Catégorie trouvée: " + category);
                    return category;
                } else {
                    System.out.println("⚠️ Pas de catégorie assignée pour cet étudiant");
                    return null;
                }
            }
        } catch (SQLException e) {
            System.err.println("❌ Erreur lors de la récupération: " + e.getMessage());
            throw e;
        }
    }

    /**
     * ✅ OBTENIR LE RÉSUMÉ COMPLET DES RÉSULTATS D'UN ÉTUDIANT
     *
     * Affiche:
     * - Score du test général
     * - Catégorie assignée
     * - Score du test spécifique (si complété)
     * - Statut global
     *
     * @param studentId ID de l'étudiant
     * @return Résumé formaté, message d'erreur si non trouvé
     */
    public static String getStudentResultsSummary(int studentId) throws SQLException {
        System.out.println("📊 Récupération du résumé des résultats...");

        String sql = "SELECT " +
                "gt.title as general_test_title, " +
                "sr.general_test_score, " +
                "sr.category, " +
                "st.title as specific_test_title, " +
                "sr.specific_test_score, " +
                "sr.status, " +
                "sr.created_at, " +
                "sr.updated_at " +
                "FROM student_results sr " +
                "LEFT JOIN general_tests gt ON sr.general_test_id = gt.id " +
                "LEFT JOIN specific_tests st ON sr.specific_test_id = st.id " +
                "WHERE sr.student_id = ? " +
                "ORDER BY sr.created_at DESC LIMIT 1";

        try (PreparedStatement pstmt = connection.prepareStatement(sql)) {
            pstmt.setInt(1, studentId);

            try (ResultSet rs = pstmt.executeQuery()) {
                if (rs.next()) {
                    int generalScore = rs.getInt("general_test_score");
                    String category = rs.getString("category");
                    int specificScore = rs.getInt("specific_test_score");
                    String status = rs.getString("status");
                    String generalTestTitle = rs.getString("general_test_title");
                    String specificTestTitle = rs.getString("specific_test_title");

                    String categoryEmoji = switch (category) {
                        case "DEPRESSION" -> "💭";
                        case "STRESS" -> "😰";
                        case "ANXIETY" -> "😟";
                        case "SLEEP_DISORDER" -> "😴";
                        default -> "❓";
                    };

                    String statusLabel = switch (status) {
                        case "PENDING" -> "⏳ En attente du test spécifique";
                        case "COMPLETED" -> "✅ Complété";
                        default -> "❓ Inconnu";
                    };

                    return String.format(
                            "📊 RÉSUMÉ DES RÉSULTATS\n\n" +
                                    "🧪 TEST GÉNÉRAL\n" +
                                    "   ├─ Titre: %s\n" +
                                    "   └─ Score: %d/100\n\n" +
                                    "📂 CATÉGORIE\n" +
                                    "   └─ %s %s\n\n" +
                                    "🧪 TEST SPÉCIFIQUE\n" +
                                    "   ├─ Titre: %s\n" +
                                    "   ├─ Score: %s\n" +
                                    "   └─ Statut: %s\n\n" +
                                    "📌 STATUT GLOBAL: %s",
                            generalTestTitle,
                            generalScore,
                            categoryEmoji,
                            category,
                            (specificTestTitle != null ? specificTestTitle : "Non défini"),
                            (specificScore > 0 ? specificScore + "/100" : "--"),
                            (specificScore > 0 ? "✅ Complété" : "⏳ En attente"),
                            statusLabel
                    );
                }
            }
        } catch (SQLException e) {
            System.err.println("❌ Erreur lors de la récupération: " + e.getMessage());
            throw e;
        }

        System.out.println("⚠️ Pas de résultats trouvés pour l'étudiant " + studentId);
        return "❌ Pas de résultats trouvés pour cet étudiant";
    }

    /**
     * ✅ OBTENIR TOUS LES RÉSULTATS D'UN ÉTUDIANT (Historique)
     *
     * Retourne tous les tests que l'étudiant a passés.
     *
     * @param studentId ID de l'étudiant
     * @return Liste formatée des résultats
     */
    public static String getStudentResultsHistory(int studentId) throws SQLException {
        System.out.println("📚 Récupération de l'historique des résultats...");

        String sql = "SELECT " +
                "sr.id, " +
                "gt.title, " +
                "sr.general_test_score, " +
                "sr.status, " +
                "sr.created_at " +
                "FROM student_results sr " +
                "LEFT JOIN general_tests gt ON sr.general_test_id = gt.id " +
                "WHERE sr.student_id = ? " +
                "ORDER BY sr.created_at DESC";

        StringBuilder history = new StringBuilder("📚 HISTORIQUE DES RÉSULTATS\n\n");
        boolean found = false;

        try (PreparedStatement pstmt = connection.prepareStatement(sql)) {
            pstmt.setInt(1, studentId);

            try (ResultSet rs = pstmt.executeQuery()) {
                while (rs.next()) {
                    found = true;
                    int resultId = rs.getInt("id");
                    String title = rs.getString("title");
                    int score = rs.getInt("general_test_score");
                    String status = rs.getString("status");
                    Timestamp createdAt = rs.getTimestamp("created_at");

                    history.append(String.format(
                            "📌 Test #%d\n" +
                                    "   ├─ Titre: %s\n" +
                                    "   ├─ Score: %d/100\n" +
                                    "   ├─ Statut: %s\n" +
                                    "   └─ Date: %s\n\n",
                            resultId,
                            title,
                            score,
                            status,
                            createdAt != null ? createdAt.toString() : "Inconnue"
                    ));
                }
            }
        } catch (SQLException e) {
            System.err.println("❌ Erreur lors de la récupération: " + e.getMessage());
            throw e;
        }

        if (!found) {
            return "❌ Aucun résultat trouvé";
        }

        System.out.println("✅ Historique récupéré");
        return history.toString();
    }

    /**
     * ✅ SUPPRIMER LES RÉSULTATS D'UN ÉTUDIANT (Administration)
     *
     * À utiliser avec prudence - supprime tous les résultats d'un étudiant.
     *
     * @param studentId ID de l'étudiant
     * @return true si succès, false sinon
     */
    public static boolean deleteStudentResults(int studentId) throws SQLException {
        System.out.println("🗑️ Suppression des résultats de l'étudiant " + studentId);

        String sql = "DELETE FROM student_results WHERE student_id = ?";

        try (PreparedStatement pstmt = connection.prepareStatement(sql)) {
            pstmt.setInt(1, studentId);

            int rowsAffected = pstmt.executeUpdate();

            if (rowsAffected > 0) {
                System.out.println("✅ " + rowsAffected + " résultat(s) supprimé(s)");
                return true;
            } else {
                System.out.println("⚠️ Aucun résultat trouvé à supprimer");
                return false;
            }
        } catch (SQLException e) {
            System.err.println("❌ Erreur lors de la suppression: " + e.getMessage());
            throw e;
        }
    }
}