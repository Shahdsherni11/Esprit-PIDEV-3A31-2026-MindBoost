package com.gestion_test.services;

import com.gestion_test.entities.SpecificTest;
import com.gestion_test.entities.SpecificTest.SpecificQuestion;
import com.gestion_test.entities.SpecificTest.SpecificAnswer;
import com.gestion_test.utils.MyDataBase;

import java.sql.*;
import java.util.ArrayList;
import java.util.List;

/**
 * ✅ Service pour les tests spécifiques (SANS SCORES)
 * Important: Les tests spécifiques n'ont PAS de scores comme les tests généraux
 */
public class SpecificTestService {

    private static final Connection connection = MyDataBase.getInstance().getConnection();

    /**
     * CREATE : Créer un test spécifique complet avec questions et réponses
     */
    public static int createSpecificTest(SpecificTest test, List<SpecificQuestion> questions) throws SQLException {

        // ✅ Vérification: seul un psychologue peut créer
        if (!AuthContext.isPsychologist()) {
            throw new SQLException("❌ Seul un psychologue peut créer un test");
        }

        // ✅ Vérification: le titre est obligatoire
        if (test.getTitle() == null || test.getTitle().trim().isEmpty()) {
            throw new SQLException("❌ Le titre du test ne peut pas être vide");
        }

        // ✅ Vérification: la catégorie est obligatoire
        if (test.getCategory() == null || test.getCategory().trim().isEmpty()) {
            throw new SQLException("❌ La catégorie du test ne peut pas être vide");
        }

        try {
            connection.setAutoCommit(false);

            // 1. Insérer le test spécifique
            String sqlTest = "INSERT INTO specific_tests (general_test_id, category, title, description, status, created_by) VALUES (?, ?, ?, ?, ?, ?)";
            try (PreparedStatement pstmt = connection.prepareStatement(sqlTest, Statement.RETURN_GENERATED_KEYS)) {
                pstmt.setInt(1, test.getGeneralTestId());
                pstmt.setString(2, test.getCategory());
                pstmt.setString(3, test.getTitle());
                pstmt.setString(4, test.getDescription() != null ? test.getDescription() : "");
                pstmt.setString(5, test.getStatus() != null ? test.getStatus() : "DRAFT");
                pstmt.setInt(6, AuthContext.getCurrentUserId());

                pstmt.executeUpdate();

                try (ResultSet rs = pstmt.getGeneratedKeys()) {
                    if (rs.next()) {
                        test.setId(rs.getInt(1));
                    }
                }
            }

            // 2. Insérer les questions et réponses (si liste non vide)
            if (questions != null && !questions.isEmpty()) {
                for (SpecificQuestion question : questions) {
                    if (question.getQuestionText() != null && !question.getQuestionText().trim().isEmpty()) {
                        int questionId = insertQuestion(connection, test.getId(), question);

                        // Insérer les réponses pour cette question
                        if (question.getAnswers() != null && !question.getAnswers().isEmpty()) {
                            for (SpecificAnswer answer : question.getAnswers()) {
                                if (answer.getAnswerText() != null && !answer.getAnswerText().trim().isEmpty()) {
                                    insertAnswer(connection, questionId, answer);
                                }
                            }
                        }
                    }
                }
            }

            connection.commit();
            System.out.println("✅ Test spécifique créé avec succès (ID: " + test.getId() + ")");
            System.out.println("   Catégorie: " + test.getCategory());
            System.out.println("   Questions: " + (questions != null ? questions.size() : 0));
            return test.getId();

        } catch (SQLException e) {
            try {
                connection.rollback();
            } catch (SQLException rollbackEx) {
                System.err.println("❌ Erreur lors du rollback: " + rollbackEx.getMessage());
            }
            System.err.println("❌ Erreur lors de la création: " + e.getMessage());
            throw e;
        } finally {
            try {
                connection.setAutoCommit(true);
            } catch (SQLException e) {
                System.err.println("❌ Erreur lors du setAutoCommit(true): " + e.getMessage());
            }
        }
    }

    /**
     * READ : Récupérer un test spécifique par ID avec ses questions et réponses
     */
    public static SpecificTest getSpecificTestById(int testId) throws SQLException {

        String sql = "SELECT id, general_test_id, category, title, description, status, created_by, created_at, updated_at FROM specific_tests WHERE id = ?";

        try (PreparedStatement pstmt = connection.prepareStatement(sql)) {
            pstmt.setInt(1, testId);

            try (ResultSet rs = pstmt.executeQuery()) {
                if (rs.next()) {
                    SpecificTest test = new SpecificTest();
                    test.setId(rs.getInt("id"));
                    test.setGeneralTestId(rs.getInt("general_test_id"));
                    test.setCategory(rs.getString("category"));
                    test.setTitle(rs.getString("title"));
                    test.setDescription(rs.getString("description"));
                    test.setStatus(rs.getString("status"));
                    test.setCreatedBy(rs.getInt("created_by"));

                    // ✅ Vérification NULL pour les timestamps
                    if (rs.getTimestamp("created_at") != null) {
                        test.setCreatedAt(rs.getTimestamp("created_at").toLocalDateTime());
                    }
                    if (rs.getTimestamp("updated_at") != null) {
                        test.setUpdatedAt(rs.getTimestamp("updated_at").toLocalDateTime());
                    }

                    // Charger les questions et réponses
                    test.setQuestions(getQuestionsByTest(testId));

                    System.out.println("✅ Test spécifique chargé: " + test.getTitle());
                    return test;
                }
            }
        }
        return null;
    }

    /**
     * READ : Récupérer tous les tests spécifiques
     */
    public static List<SpecificTest> getAllSpecificTests() throws SQLException {

        List<SpecificTest> tests = new ArrayList<>();
        String sql = "SELECT id, general_test_id, category, title, description, status, created_by, created_at, updated_at FROM specific_tests ORDER BY created_at DESC";

        try (Statement stmt = connection.createStatement();
             ResultSet rs = stmt.executeQuery(sql)) {

            while (rs.next()) {
                SpecificTest test = new SpecificTest();
                test.setId(rs.getInt("id"));
                test.setGeneralTestId(rs.getInt("general_test_id"));
                test.setCategory(rs.getString("category"));
                test.setTitle(rs.getString("title"));
                test.setDescription(rs.getString("description"));
                test.setStatus(rs.getString("status"));
                test.setCreatedBy(rs.getInt("created_by"));

                // ✅ Vérification NULL pour les timestamps
                if (rs.getTimestamp("created_at") != null) {
                    test.setCreatedAt(rs.getTimestamp("created_at").toLocalDateTime());
                }
                if (rs.getTimestamp("updated_at") != null) {
                    test.setUpdatedAt(rs.getTimestamp("updated_at").toLocalDateTime());
                }

                tests.add(test);
            }
        }

        System.out.println("✅ " + tests.size() + " test(s) spécifique(s) chargé(s)");
        return tests;
    }

    /**
     * READ : Récupérer mes tests (tests créés par l'utilisateur psychologue connecté)
     */
    public static List<SpecificTest> getMySpecificTests() throws SQLException {

        // ✅ Vérification: seul un psychologue peut voir ses tests
        if (!AuthContext.isPsychologist()) {
            throw new SQLException("❌ Seul un psychologue peut voir ses tests");
        }

        List<SpecificTest> tests = new ArrayList<>();
        String sql = "SELECT id, general_test_id, category, title, description, status, created_by, created_at, updated_at FROM specific_tests WHERE created_by = ? ORDER BY created_at DESC";

        try (PreparedStatement pstmt = connection.prepareStatement(sql)) {
            pstmt.setInt(1, AuthContext.getCurrentUserId());

            try (ResultSet rs = pstmt.executeQuery()) {
                while (rs.next()) {
                    SpecificTest test = new SpecificTest();
                    test.setId(rs.getInt("id"));
                    test.setGeneralTestId(rs.getInt("general_test_id"));
                    test.setCategory(rs.getString("category"));
                    test.setTitle(rs.getString("title"));
                    test.setDescription(rs.getString("description"));
                    test.setStatus(rs.getString("status"));
                    test.setCreatedBy(rs.getInt("created_by"));

                    // ✅ Vérification NULL pour les timestamps
                    if (rs.getTimestamp("created_at") != null) {
                        test.setCreatedAt(rs.getTimestamp("created_at").toLocalDateTime());
                    }
                    if (rs.getTimestamp("updated_at") != null) {
                        test.setUpdatedAt(rs.getTimestamp("updated_at").toLocalDateTime());
                    }

                    tests.add(test);
                }
            }
        }

        System.out.println("✅ " + tests.size() + " test(s) trouvé(s) pour l'utilisateur");
        return tests;
    }

    /**
     * UPDATE : Modifier un test spécifique
     * ✅ CORRIGÉ: Accepte une List<SpecificQuestion> en paramètre
     */
    public static boolean updateSpecificTest(SpecificTest test, List<SpecificQuestion> questions) throws SQLException {

        // ✅ Vérification: seul un psychologue peut modifier
        if (!AuthContext.isPsychologist()) {
            throw new SQLException("❌ Seul un psychologue peut modifier un test");
        }

        // ✅ Vérifier que le test existe
        SpecificTest existing = getSpecificTestById(test.getId());
        if (existing == null) {
            throw new SQLException("❌ Le test n'existe pas");
        }

        // ✅ Vérifier que c'est son propre test
        if (existing.getCreatedBy() != AuthContext.getCurrentUserId()) {
            throw new SQLException("❌ Vous ne pouvez modifier que vos propres tests");
        }

        try {
            connection.setAutoCommit(false);

            // Mettre à jour les infos du test
            String sql = "UPDATE specific_tests SET category = ?, title = ?, description = ?, status = ?, updated_at = NOW() WHERE id = ?";

            try (PreparedStatement pstmt = connection.prepareStatement(sql)) {
                pstmt.setString(1, test.getCategory() != null ? test.getCategory() : existing.getCategory());
                pstmt.setString(2, test.getTitle() != null ? test.getTitle() : existing.getTitle());
                pstmt.setString(3, test.getDescription() != null ? test.getDescription() : "");
                pstmt.setString(4, test.getStatus() != null ? test.getStatus() : existing.getStatus());
                pstmt.setInt(5, test.getId());

                int rowsAffected = pstmt.executeUpdate();

                if (rowsAffected > 0) {
                    // Supprimer les anciennes questions et réponses
                    deleteQuestionsForTest(test.getId());

                    // Insérer les nouvelles questions et réponses
                    if (questions != null && !questions.isEmpty()) {
                        for (SpecificQuestion question : questions) {
                            if (question.getQuestionText() != null && !question.getQuestionText().trim().isEmpty()) {
                                int questionId = insertQuestion(connection, test.getId(), question);

                                if (question.getAnswers() != null && !question.getAnswers().isEmpty()) {
                                    for (SpecificAnswer answer : question.getAnswers()) {
                                        if (answer.getAnswerText() != null && !answer.getAnswerText().trim().isEmpty()) {
                                            insertAnswer(connection, questionId, answer);
                                        }
                                    }
                                }
                            }
                        }
                    }

                    connection.commit();
                    System.out.println("✅ Test spécifique modifié avec succès");
                    return true;
                }
            }

            connection.rollback();
            return false;

        } catch (SQLException e) {
            try {
                connection.rollback();
            } catch (SQLException rollbackEx) {
                System.err.println("❌ Erreur rollback: " + rollbackEx.getMessage());
            }
            System.err.println("�� Erreur modification: " + e.getMessage());
            throw e;
        } finally {
            try {
                connection.setAutoCommit(true);
            } catch (SQLException e) {
                System.err.println("❌ Erreur setAutoCommit: " + e.getMessage());
            }
        }
    }

    /**
     * DELETE : Supprimer un test spécifique
     */
    public static boolean deleteSpecificTest(int testId) throws SQLException {

        // ✅ Vérification: seul un psychologue peut supprimer
        if (!AuthContext.isPsychologist()) {
            throw new SQLException("❌ Seul un psychologue peut supprimer un test");
        }

        // ✅ Vérifier que le test existe
        SpecificTest test = getSpecificTestById(testId);
        if (test == null) {
            throw new SQLException("❌ Le test n'existe pas");
        }

        // ✅ Vérifier que c'est son propre test
        if (test.getCreatedBy() != AuthContext.getCurrentUserId()) {
            throw new SQLException("❌ Vous ne pouvez supprimer que vos propres tests");
        }

        try {
            connection.setAutoCommit(false);

            // Supprimer les réponses
            String sqlDeleteAnswers = "DELETE FROM specific_answers WHERE question_id IN (SELECT id FROM specific_questions WHERE test_id = ?)";
            try (PreparedStatement pstmt = connection.prepareStatement(sqlDeleteAnswers)) {
                pstmt.setInt(1, testId);
                pstmt.executeUpdate();
            }

            // Supprimer les questions
            String sqlDeleteQuestions = "DELETE FROM specific_questions WHERE test_id = ?";
            try (PreparedStatement pstmt = connection.prepareStatement(sqlDeleteQuestions)) {
                pstmt.setInt(1, testId);
                pstmt.executeUpdate();
            }

            // Supprimer le test
            String sqlDeleteTest = "DELETE FROM specific_tests WHERE id = ?";
            try (PreparedStatement pstmt = connection.prepareStatement(sqlDeleteTest)) {
                pstmt.setInt(1, testId);
                int rowsAffected = pstmt.executeUpdate();

                if (rowsAffected > 0) {
                    connection.commit();
                    System.out.println("✅ Test spécifique supprimé avec succès");
                    return true;
                }
            }

            connection.rollback();
            return false;

        } catch (SQLException e) {
            try {
                connection.rollback();
            } catch (SQLException rollbackEx) {
                System.err.println("❌ Erreur rollback: " + rollbackEx.getMessage());
            }
            System.err.println("❌ Erreur suppression: " + e.getMessage());
            throw e;
        } finally {
            try {
                connection.setAutoCommit(true);
            } catch (SQLException e) {
                System.err.println("❌ Erreur: " + e.getMessage());
            }
        }
    }

    // ===== MÉTHODES PRIVÉES =====

    /**
     * ✅ Insérer une question dans la BD
     */
    private static int insertQuestion(Connection conn, int testId, SpecificQuestion question) throws SQLException {
        String sql = "INSERT INTO specific_questions (test_id, question_text, question_order) VALUES (?, ?, ?)";

        try (PreparedStatement pstmt = conn.prepareStatement(sql, Statement.RETURN_GENERATED_KEYS)) {
            pstmt.setInt(1, testId);
            pstmt.setString(2, question.getQuestionText());
            pstmt.setInt(3, question.getQuestionOrder());

            pstmt.executeUpdate();

            try (ResultSet rs = pstmt.getGeneratedKeys()) {
                if (rs.next()) {
                    return rs.getInt(1);
                }
            }
        }
        return -1;
    }

    /**
     * ✅ Insérer une réponse dans la BD (SANS SCORE pour tests spécifiques)
     */
    private static void insertAnswer(Connection conn, int questionId, SpecificAnswer answer) throws SQLException {
        String sql = "INSERT INTO specific_answers (question_id, answer_text, answer_order) VALUES (?, ?, ?)";

        try (PreparedStatement pstmt = conn.prepareStatement(sql)) {
            pstmt.setInt(1, questionId);
            pstmt.setString(2, answer.getAnswerText());
            pstmt.setInt(3, answer.getAnswerOrder());

            pstmt.executeUpdate();
        }
    }

    /**
     * ✅ Récupérer les questions d'un test
     */
    private static List<SpecificQuestion> getQuestionsByTest(int testId) throws SQLException {
        List<SpecificQuestion> questions = new ArrayList<>();
        String sql = "SELECT id, test_id, question_text, question_order FROM specific_questions WHERE test_id = ? ORDER BY question_order";

        try (PreparedStatement pstmt = connection.prepareStatement(sql)) {
            pstmt.setInt(1, testId);

            try (ResultSet rs = pstmt.executeQuery()) {
                while (rs.next()) {
                    SpecificQuestion question = new SpecificQuestion();
                    question.setId(rs.getInt("id"));
                    question.setTestId(rs.getInt("test_id"));
                    question.setQuestionText(rs.getString("question_text"));
                    question.setQuestionOrder(rs.getInt("question_order"));

                    // ✅ Charger les réponses pour cette question
                    question.setAnswers(getAnswersByQuestion(rs.getInt("id")));

                    questions.add(question);
                }
            }
        }

        return questions;
    }

    /**
     * ✅ Récupérer les réponses d'une question (SANS SCORES)
     */
    private static List<SpecificAnswer> getAnswersByQuestion(int questionId) throws SQLException {
        List<SpecificAnswer> answers = new ArrayList<>();
        String sql = "SELECT id, question_id, answer_text, answer_order FROM specific_answers WHERE question_id = ? ORDER BY answer_order";

        try (PreparedStatement pstmt = connection.prepareStatement(sql)) {
            pstmt.setInt(1, questionId);

            try (ResultSet rs = pstmt.executeQuery()) {
                while (rs.next()) {
                    SpecificAnswer answer = new SpecificAnswer();
                    answer.setId(rs.getInt("id"));
                    answer.setQuestionId(rs.getInt("question_id"));
                    answer.setAnswerText(rs.getString("answer_text"));
                    answer.setAnswerOrder(rs.getInt("answer_order"));
                    // ✅ PAS de score pour les tests spécifiques

                    answers.add(answer);
                }
            }
        }

        return answers;
    }

    /**
     * ✅ Supprimer les questions d'un test
     */
    private static void deleteQuestionsForTest(int testId) throws SQLException {
        String sqlDeleteAnswers = "DELETE FROM specific_answers WHERE question_id IN (SELECT id FROM specific_questions WHERE test_id = ?)";
        try (PreparedStatement pstmt = connection.prepareStatement(sqlDeleteAnswers)) {
            pstmt.setInt(1, testId);
            pstmt.executeUpdate();
        }

        String sqlDeleteQuestions = "DELETE FROM specific_questions WHERE test_id = ?";
        try (PreparedStatement pstmt = connection.prepareStatement(sqlDeleteQuestions)) {
            pstmt.setInt(1, testId);
            pstmt.executeUpdate();
        }
    }
}