package com.gestion_test.services;

import com.gestion_test.entities.GeneralTest;
import com.gestion_test.entities.GeneralTest.GeneralQuestion;
import com.gestion_test.entities.GeneralTest.GeneralAnswer;
import com.gestion_test.interfaces.ICrud;
import com.gestion_test.utils.MyDataBase;

import java.sql.*;
import java.util.ArrayList;
import java.util.List;

public class GeneralTestService implements ICrud<GeneralTest> {

    private static final Connection connection = MyDataBase.getInstance().getConnection();

    @Override
    public int create(GeneralTest test) throws SQLException {
        return createGeneralTest(test, test.getQuestions());
    }

    @Override
    public GeneralTest getById(int id) throws SQLException {
        return getGeneralTestById(id);
    }

    @Override
    public List<GeneralTest> getAll() throws SQLException {
        return getAllGeneralTests();
    }

    @Override
    public boolean update(GeneralTest test) throws SQLException {
        return updateGeneralTest(test);
    }

    @Override
    public boolean delete(int id) throws SQLException {
        return deleteGeneralTest(id);
    }

    /**
     * ✅ CREATE: Créer un test général QCM avec questions et réponses
     */
    public int createGeneralTest(GeneralTest test, List<GeneralQuestion> questions) throws SQLException {
        if (!AuthContext.isPsychologist()) {
            throw new SQLException("❌ Seul un psychologue peut créer un test");
        }

        if (test.getTitle() == null || test.getTitle().trim().isEmpty()) {
            throw new SQLException("❌ Le titre du test ne peut pas être vide");
        }

        if (questions == null || questions.isEmpty()) {
            throw new SQLException("❌ Le test doit contenir au moins une question");
        }

        try {
            connection.setAutoCommit(false);

            // 1️⃣ Insérer le test général
            String sqlTest = "INSERT INTO general_tests (title, description, created_by) VALUES (?, ?, ?)";
            try (PreparedStatement pstmt = connection.prepareStatement(sqlTest, Statement.RETURN_GENERATED_KEYS)) {
                pstmt.setString(1, test.getTitle());
                pstmt.setString(2, test.getDescription() != null ? test.getDescription() : "");
                pstmt.setInt(3, AuthContext.getCurrentUserId());

                pstmt.executeUpdate();

                try (ResultSet rs = pstmt.getGeneratedKeys()) {
                    if (rs.next()) {
                        test.setId(rs.getInt(1));
                    }
                }
            }

            // 2️⃣ Insérer les questions et réponses
            for (GeneralQuestion question : questions) {
                if (question.getQuestionText() != null && !question.getQuestionText().trim().isEmpty()) {

                    // Vérifier qu'il y a exactement 4 réponses
                    if (question.getAnswers() == null || question.getAnswers().size() != 4) {
                        throw new SQLException("❌ Chaque question doit avoir exactement 4 réponses (A, B, C, D)");
                    }

                    int questionId = insertQuestion(connection, test.getId(), question);

                    // Insérer les 4 réponses QCM
                    for (GeneralAnswer answer : question.getAnswers()) {
                        if (answer.getAnswerText() != null && !answer.getAnswerText().trim().isEmpty()) {
                            insertAnswer(connection, questionId, answer);
                        }
                    }
                }
            }

            connection.commit();
            System.out.println("✅ Test QCM créé avec succès");
            System.out.println("   ID: " + test.getId());
            System.out.println("   Titre: " + test.getTitle());
            System.out.println("   Questions: " + questions.size());
            return test.getId();

        } catch (SQLException e) {
            try {
                connection.rollback();
            } catch (SQLException rollbackEx) {
                System.err.println("❌ Erreur rollback: " + rollbackEx.getMessage());
            }
            System.err.println("❌ Erreur création: " + e.getMessage());
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
     * ✅ READ: Obtenir un test par ID avec ses questions et réponses
     */
    public static GeneralTest getGeneralTestById(int testId) throws SQLException {
        String sql = "SELECT id, title, description, created_by, created_at, updated_at FROM general_tests WHERE id = ?";

        try (PreparedStatement pstmt = connection.prepareStatement(sql)) {
            pstmt.setInt(1, testId);

            try (ResultSet rs = pstmt.executeQuery()) {
                if (rs.next()) {
                    GeneralTest test = new GeneralTest();
                    test.setId(rs.getInt("id"));
                    test.setTitle(rs.getString("title"));
                    test.setDescription(rs.getString("description"));
                    test.setCreatedBy(rs.getInt("created_by"));

                    if (rs.getTimestamp("created_at") != null) {
                        test.setCreatedAt(rs.getTimestamp("created_at").toLocalDateTime());
                    }
                    if (rs.getTimestamp("updated_at") != null) {
                        test.setUpdatedAt(rs.getTimestamp("updated_at").toLocalDateTime());
                    }

                    // Charger les questions et réponses
                    test.setQuestions(getQuestionsByTest(testId));

                    System.out.println("✅ Test QCM chargé: " + test.getTitle());
                    System.out.println("   Questions: " + (test.getQuestions() != null ? test.getQuestions().size() : 0));
                    return test;
                }
            }
        }
        System.out.println("⚠️ Test non trouvé: " + testId);
        return null;
    }

    /**
     * ✅ READ: Obtenir tous les tests
     */
    public static List<GeneralTest> getAllGeneralTests() throws SQLException {
        List<GeneralTest> tests = new ArrayList<>();
        String sql = "SELECT id, title, description, created_by, created_at, updated_at FROM general_tests ORDER BY created_at DESC";

        try (Statement stmt = connection.createStatement();
             ResultSet rs = stmt.executeQuery(sql)) {

            while (rs.next()) {
                GeneralTest test = new GeneralTest();
                test.setId(rs.getInt("id"));
                test.setTitle(rs.getString("title"));
                test.setDescription(rs.getString("description"));
                test.setCreatedBy(rs.getInt("created_by"));

                if (rs.getTimestamp("created_at") != null) {
                    test.setCreatedAt(rs.getTimestamp("created_at").toLocalDateTime());
                }
                if (rs.getTimestamp("updated_at") != null) {
                    test.setUpdatedAt(rs.getTimestamp("updated_at").toLocalDateTime());
                }

                test.setQuestions(getQuestionsByTest(test.getId()));
                tests.add(test);
            }
        }

        System.out.println("✅ " + tests.size() + " test(s) chargé(s)");
        return tests;
    }

    /**
     * ✅ READ: Obtenir mes tests (pour le psychologue connecté)
     */
    public static List<GeneralTest> getMyGeneralTests() throws SQLException {
        if (!AuthContext.isPsychologist()) {
            throw new SQLException("❌ Seul un psychologue peut voir ses tests");
        }

        List<GeneralTest> tests = new ArrayList<>();
        String sql = "SELECT id, title, description, created_by, created_at, updated_at FROM general_tests WHERE created_by = ? ORDER BY created_at DESC";

        try (PreparedStatement pstmt = connection.prepareStatement(sql)) {
            pstmt.setInt(1, AuthContext.getCurrentUserId());

            try (ResultSet rs = pstmt.executeQuery()) {
                while (rs.next()) {
                    GeneralTest test = new GeneralTest();
                    test.setId(rs.getInt("id"));
                    test.setTitle(rs.getString("title"));
                    test.setDescription(rs.getString("description"));
                    test.setCreatedBy(rs.getInt("created_by"));

                    if (rs.getTimestamp("created_at") != null) {
                        test.setCreatedAt(rs.getTimestamp("created_at").toLocalDateTime());
                    }
                    if (rs.getTimestamp("updated_at") != null) {
                        test.setUpdatedAt(rs.getTimestamp("updated_at").toLocalDateTime());
                    }

                    test.setQuestions(getQuestionsByTest(test.getId()));
                    tests.add(test);
                }
            }
        }

        System.out.println("✅ " + tests.size() + " test(s) trouvé(s) pour cet utilisateur");
        return tests;
    }

    /**
     * ✅ UPDATE: Modifier un test QCM
     */
    public boolean updateGeneralTest(GeneralTest test) throws SQLException {
        if (!AuthContext.isPsychologist()) {
            throw new SQLException("❌ Seul un psychologue peut modifier un test");
        }

        GeneralTest existing = getGeneralTestById(test.getId());
        if (existing == null) {
            throw new SQLException("❌ Le test n'existe pas");
        }

        if (existing.getCreatedBy() != AuthContext.getCurrentUserId()) {
            throw new SQLException("❌ Vous ne pouvez modifier que vos propres tests");
        }

        String sql = "UPDATE general_tests SET title = ?, description = ?, updated_at = NOW() WHERE id = ?";

        try (PreparedStatement pstmt = connection.prepareStatement(sql)) {
            pstmt.setString(1, test.getTitle() != null ? test.getTitle() : existing.getTitle());
            pstmt.setString(2, test.getDescription() != null ? test.getDescription() : "");
            pstmt.setInt(3, test.getId());

            int rowsAffected = pstmt.executeUpdate();

            if (rowsAffected > 0) {
                // ✅ Supprimer les anciennes questions et réponses
                deleteQuestionsForTest(test.getId());

                // ✅ Insérer les nouvelles questions et réponses
                if (test.getQuestions() != null && !test.getQuestions().isEmpty()) {
                    for (GeneralQuestion question : test.getQuestions()) {
                        if (question.getQuestionText() != null && !question.getQuestionText().trim().isEmpty()) {

                            if (question.getAnswers() == null || question.getAnswers().size() != 4) {
                                throw new SQLException("❌ Chaque question doit avoir exactement 4 réponses");
                            }

                            int questionId = insertQuestion(connection, test.getId(), question);

                            for (GeneralAnswer answer : question.getAnswers()) {
                                if (answer.getAnswerText() != null && !answer.getAnswerText().trim().isEmpty()) {
                                    insertAnswer(connection, questionId, answer);
                                }
                            }
                        }
                    }
                }

                System.out.println("✅ Test modifié avec succès");
                return true;
            }
        }
        return false;
    }

    /**
     * ✅ DELETE: Supprimer un test QCM
     */
    public static boolean deleteGeneralTest(int testId) throws SQLException {
        if (!AuthContext.isPsychologist()) {
            throw new SQLException("❌ Seul un psychologue peut supprimer un test");
        }

        GeneralTest test = getGeneralTestById(testId);
        if (test == null) {
            throw new SQLException("❌ Le test n'existe pas");
        }

        if (test.getCreatedBy() != AuthContext.getCurrentUserId()) {
            throw new SQLException("❌ Vous ne pouvez supprimer que vos propres tests");
        }

        try {
            connection.setAutoCommit(false);

            // Supprimer les réponses
            String sqlDeleteAnswers = "DELETE FROM general_answers WHERE question_id IN (SELECT id FROM general_questions WHERE test_id = ?)";
            try (PreparedStatement pstmt = connection.prepareStatement(sqlDeleteAnswers)) {
                pstmt.setInt(1, testId);
                pstmt.executeUpdate();
            }

            // Supprimer les questions
            String sqlDeleteQuestions = "DELETE FROM general_questions WHERE test_id = ?";
            try (PreparedStatement pstmt = connection.prepareStatement(sqlDeleteQuestions)) {
                pstmt.setInt(1, testId);
                pstmt.executeUpdate();
            }

            // Supprimer le test
            String sqlDeleteTest = "DELETE FROM general_tests WHERE id = ?";
            try (PreparedStatement pstmt = connection.prepareStatement(sqlDeleteTest)) {
                pstmt.setInt(1, testId);
                int rowsAffected = pstmt.executeUpdate();

                if (rowsAffected > 0) {
                    connection.commit();
                    System.out.println("✅ Test supprimé avec succès");
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
                System.err.println("❌ Erreur setAutoCommit: " + e.getMessage());
            }
        }
    }

    /**
     * ✅ HELPER: Obtenir les questions d'un test avec leurs réponses QCM
     */
    private static List<GeneralQuestion> getQuestionsByTest(int testId) throws SQLException {
        List<GeneralQuestion> questions = new ArrayList<>();
        String sql = "SELECT id, test_id, question_text, question_order FROM general_questions WHERE test_id = ? ORDER BY question_order";

        try (PreparedStatement pstmt = connection.prepareStatement(sql)) {
            pstmt.setInt(1, testId);

            try (ResultSet rs = pstmt.executeQuery()) {
                while (rs.next()) {
                    GeneralQuestion question = new GeneralQuestion();
                    question.setId(rs.getInt("id"));
                    question.setTestId(rs.getInt("test_id"));
                    question.setQuestionText(rs.getString("question_text"));
                    question.setQuestionOrder(rs.getInt("question_order"));

                    // Charger les 4 réponses QCM
                    question.setAnswers(getAnswersByQuestion(rs.getInt("id")));

                    questions.add(question);
                }
            }
        }

        return questions;
    }

    /**
     * ✅ HELPER: Obtenir les 4 réponses QCM d'une question
     */
    private static List<GeneralAnswer> getAnswersByQuestion(int questionId) throws SQLException {
        List<GeneralAnswer> answers = new ArrayList<>();
        String sql = "SELECT id, question_id, answer_text, answer_label, score, answer_order FROM general_answers WHERE question_id = ? ORDER BY answer_order";

        try (PreparedStatement pstmt = connection.prepareStatement(sql)) {
            pstmt.setInt(1, questionId);

            try (ResultSet rs = pstmt.executeQuery()) {
                while (rs.next()) {
                    GeneralAnswer answer = new GeneralAnswer();
                    answer.setId(rs.getInt("id"));
                    answer.setQuestionId(rs.getInt("question_id"));
                    answer.setAnswerText(rs.getString("answer_text"));
                    answer.setAnswerLabel(rs.getString("answer_label"));
                    answer.setScore(rs.getInt("score"));
                    answer.setAnswerOrder(rs.getInt("answer_order"));

                    answers.add(answer);
                }
            }
        }

        return answers;
    }

    /**
     * ✅ HELPER: Insérer une question
     */
    private static int insertQuestion(Connection conn, int testId, GeneralQuestion question) throws SQLException {
        String sql = "INSERT INTO general_questions (test_id, question_text, question_order) VALUES (?, ?, ?)";

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
     * ✅ HELPER: Insérer une réponse QCM
     */
    private static void insertAnswer(Connection conn, int questionId, GeneralAnswer answer) throws SQLException {
        String sql = "INSERT INTO general_answers (question_id, answer_text, answer_label, score, answer_order) VALUES (?, ?, ?, ?, ?)";

        try (PreparedStatement pstmt = conn.prepareStatement(sql)) {
            pstmt.setInt(1, questionId);
            pstmt.setString(2, answer.getAnswerText());
            pstmt.setString(3, answer.getAnswerLabel()); // A, B, C, D
            pstmt.setInt(4, answer.getScore()); // 100, 75, 50, 25
            pstmt.setInt(5, answer.getAnswerOrder());

            pstmt.executeUpdate();
        }
    }

    /**
     * ✅ HELPER: Supprimer les questions d'un test
     */
    private static void deleteQuestionsForTest(int testId) throws SQLException {
        String sqlDeleteAnswers = "DELETE FROM general_answers WHERE question_id IN (SELECT id FROM general_questions WHERE test_id = ?)";
        try (PreparedStatement pstmt = connection.prepareStatement(sqlDeleteAnswers)) {
            pstmt.setInt(1, testId);
            pstmt.executeUpdate();
        }

        String sqlDeleteQuestions = "DELETE FROM general_questions WHERE test_id = ?";
        try (PreparedStatement pstmt = connection.prepareStatement(sqlDeleteQuestions)) {
            pstmt.setInt(1, testId);
            pstmt.executeUpdate();
        }
    }
}