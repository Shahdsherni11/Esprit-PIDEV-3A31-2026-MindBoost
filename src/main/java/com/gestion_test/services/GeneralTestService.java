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
     * ✅ Récupérer mes tests (avec questions)
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

                    // ✅ CHARGER LES QUESTIONS
                    test.setQuestions(getQuestionsByTest(test.getId()));

                    tests.add(test);
                }
            }
        }
        return tests;
    }

    /**
     * ✅ Créer un test général avec questions (SANS STATUS)
     */
    public int createGeneralTest(GeneralTest test, List<GeneralQuestion> questions) throws SQLException {
        if (!AuthContext.isPsychologist()) {
            throw new SQLException("❌ Seul un psychologue peut créer un test");
        }

        if (test.getTitle() == null || test.getTitle().trim().isEmpty()) {
            throw new SQLException("❌ Le titre du test ne peut pas être vide");
        }

        try {
            connection.setAutoCommit(false);

            // ✅ SUPPRESSION: status de la requête SQL
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

            if (questions != null && !questions.isEmpty()) {
                for (GeneralQuestion question : questions) {
                    if (question.getQuestionText() != null && !question.getQuestionText().trim().isEmpty()) {
                        int questionId = insertQuestion(connection, test.getId(), question);

                        if (question.getAnswers() != null && !question.getAnswers().isEmpty()) {
                            for (GeneralAnswer answer : question.getAnswers()) {
                                if (answer.getAnswerText() != null && !answer.getAnswerText().trim().isEmpty()) {
                                    insertAnswer(connection, questionId, answer);
                                }
                            }
                        }
                    }
                }
            }

            connection.commit();
            System.out.println("✅ Test créé avec succès (ID: " + test.getId() + ")");
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
                System.err.println("❌ Erreur: " + e.getMessage());
            }
        }
    }

    /**
     * ✅ Récupérer un test par ID (avec questions) - SANS STATUS
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

                    // ✅ CHARGER LES QUESTIONS
                    test.setQuestions(getQuestionsByTest(testId));

                    System.out.println("✅ Test chargé: " + test.getTitle() + " avec " +
                            (test.getQuestions() != null ? test.getQuestions().size() : 0) + " questions");

                    return test;
                }
            }
        }
        return null;
    }

    /**
     * ✅ Récupérer tous les tests (avec questions) - SANS STATUS
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

                // ✅ CHARGER LES QUESTIONS
                test.setQuestions(getQuestionsByTest(test.getId()));

                tests.add(test);
            }
        }

        return tests;
    }

    /**
     * ✅ Modifier un test (SANS STATUS)
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

        // ✅ SUPPRESSION: status de la requête SQL
        String sql = "UPDATE general_tests SET title = ?, description = ?, updated_at = NOW() WHERE id = ?";

        try (PreparedStatement pstmt = connection.prepareStatement(sql)) {
            pstmt.setString(1, test.getTitle() != null ? test.getTitle() : existing.getTitle());
            pstmt.setString(2, test.getDescription() != null ? test.getDescription() : "");
            pstmt.setInt(3, test.getId());

            int rowsAffected = pstmt.executeUpdate();
            if (rowsAffected > 0) {
                System.out.println("✅ Test modifié avec succès");
            }
            return rowsAffected > 0;
        }
    }

    /**
     * ✅ Supprimer un test
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
                System.err.println("❌ Erreur lors du rollback: " + rollbackEx.getMessage());
            }
            System.err.println("❌ Erreur lors de la suppression: " + e.getMessage());
            throw e;
        } finally {
            try {
                connection.setAutoCommit(true);
            } catch (SQLException e) {
                System.err.println("❌ Erreur: " + e.getMessage());
            }
        }
    }

    /**
     * ✅ Récupérer les questions d'un test
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
                    question.setAnswers(getAnswersByQuestion(rs.getInt("id")));

                    questions.add(question);
                }
            }
        }

        return questions;
    }

    /**
     * ✅ Récupérer les réponses d'une question
     */
    private static List<GeneralAnswer> getAnswersByQuestion(int questionId) throws SQLException {
        List<GeneralAnswer> answers = new ArrayList<>();
        String sql = "SELECT id, question_id, answer_text, score, answer_order FROM general_answers WHERE question_id = ? ORDER BY answer_order";

        try (PreparedStatement pstmt = connection.prepareStatement(sql)) {
            pstmt.setInt(1, questionId);

            try (ResultSet rs = pstmt.executeQuery()) {
                while (rs.next()) {
                    GeneralAnswer answer = new GeneralAnswer();
                    answer.setId(rs.getInt("id"));
                    answer.setQuestionId(rs.getInt("question_id"));
                    answer.setAnswerText(rs.getString("answer_text"));
                    answer.setScore(rs.getInt("score"));
                    answer.setAnswerOrder(rs.getInt("answer_order"));

                    answers.add(answer);
                }
            }
        }

        return answers;
    }

    /**
     * ✅ Insérer une question
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
     * ✅ Insérer une réponse
     */
    private static void insertAnswer(Connection conn, int questionId, GeneralAnswer answer) throws SQLException {
        String sql = "INSERT INTO general_answers (question_id, answer_text, score, answer_order) VALUES (?, ?, ?, ?)";

        try (PreparedStatement pstmt = conn.prepareStatement(sql)) {
            pstmt.setInt(1, questionId);
            pstmt.setString(2, answer.getAnswerText());
            pstmt.setInt(3, answer.getScore());
            pstmt.setInt(4, answer.getAnswerOrder());

            pstmt.executeUpdate();
        }
    }
}