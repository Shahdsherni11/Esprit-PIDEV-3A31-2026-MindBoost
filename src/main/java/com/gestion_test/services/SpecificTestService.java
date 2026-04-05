package com.gestion_test.services;

import com.gestion_test.entities.SpecificTest;
import com.gestion_test.entities.SpecificQuestion;
import com.gestion_test.entities.SpecificAnswer;
import com.gestion_test.utils.MyDataBase;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;
import java.util.List;

public class SpecificTestService {

    private static final Connection connection = MyDataBase.getInstance().getConnection();

    // ===== LIRE =====

    public static List<SpecificTest> getAllSpecificTests() throws SQLException {
        List<SpecificTest> tests = new ArrayList<SpecificTest>();
        String sql = "SELECT * FROM specific_tests ORDER BY id DESC";
        Statement stmt = connection.createStatement();
        ResultSet rs = stmt.executeQuery(sql);
        while (rs.next()) {
            SpecificTest test = extractTest(rs);
            test.setQuestions(getQuestionsForTest(test.getId()));
            tests.add(test);
        }
        rs.close();
        return tests;
    }

    public static SpecificTest getSpecificTestById(int testId) throws SQLException {
        String sql = "SELECT * FROM specific_tests WHERE id = ?";
        PreparedStatement ps = connection.prepareStatement(sql);
        ps.setInt(1, testId);
        ResultSet rs = ps.executeQuery();
        SpecificTest test = null;
        if (rs.next()) {
            test = extractTest(rs);
            test.setQuestions(getQuestionsForTest(test.getId()));
        }
        rs.close();
        ps.close();
        return test;
    }

    public static List<SpecificTest> getSpecificTestsByCategory(String category) throws SQLException {
        List<SpecificTest> tests = new ArrayList<SpecificTest>();
        String sql = "SELECT * FROM specific_tests WHERE category = ? ORDER BY id DESC";
        PreparedStatement ps = connection.prepareStatement(sql);
        ps.setString(1, category);
        ResultSet rs = ps.executeQuery();
        while (rs.next()) {
            SpecificTest test = extractTest(rs);
            test.setQuestions(getQuestionsForTest(test.getId()));
            tests.add(test);
        }
        rs.close();
        ps.close();
        return tests;
    }

    // COLONNE = test_id (PAS specific_test_id)
    public static List<SpecificQuestion> getQuestionsForTest(int testId) throws SQLException {
        List<SpecificQuestion> questions = new ArrayList<SpecificQuestion>();
        String sql = "SELECT * FROM specific_questions WHERE test_id = ? ORDER BY question_order ASC";
        PreparedStatement ps = connection.prepareStatement(sql);
        ps.setInt(1, testId);
        ResultSet rs = ps.executeQuery();
        while (rs.next()) {
            SpecificQuestion question = new SpecificQuestion(
                    rs.getInt("id"),
                    rs.getInt("test_id"),
                    rs.getString("question_text"),
                    rs.getInt("question_order"),
                    rs.getString("created_at")
            );
            question.setAnswers(getAnswersForQuestion(question.getId()));
            questions.add(question);
        }
        rs.close();
        ps.close();
        return questions;
    }

    public static List<SpecificAnswer> getAnswersForQuestion(int questionId) throws SQLException {
        List<SpecificAnswer> answers = new ArrayList<SpecificAnswer>();
        String sql = "SELECT * FROM specific_answers WHERE question_id = ? ORDER BY answer_order ASC";
        PreparedStatement ps = connection.prepareStatement(sql);
        ps.setInt(1, questionId);
        ResultSet rs = ps.executeQuery();
        while (rs.next()) {
            answers.add(new SpecificAnswer(
                    rs.getInt("id"),
                    rs.getInt("question_id"),
                    rs.getString("answer_text"),
                    rs.getInt("score"),
                    rs.getInt("answer_order"),
                    rs.getString("created_at")
            ));
        }
        rs.close();
        ps.close();
        return answers;
    }

    // ===== CREER =====
    // specific_tests a: general_test_id, category, title, description, status, created_by

    public static int createSpecificTest(SpecificTest test, List<SpecificQuestion> questions) throws SQLException {
        String sql = "INSERT INTO specific_tests (general_test_id, category, title, description, status, created_by) VALUES (?, ?, ?, ?, ?, ?)";
        PreparedStatement ps = connection.prepareStatement(sql, Statement.RETURN_GENERATED_KEYS);
        ps.setInt(1, test.getGeneralTestId());
        ps.setString(2, test.getCategory());
        ps.setString(3, test.getTitle());
        ps.setString(4, test.getDescription());
        ps.setString(5, test.getStatus());
        ps.setInt(6, test.getCreatedBy());
        ps.executeUpdate();

        ResultSet keys = ps.getGeneratedKeys();
        int testId = 0;
        if (keys.next()) testId = keys.getInt(1);
        keys.close();
        ps.close();

        insertQuestionsAndAnswers(testId, questions);
        return testId;
    }

    // ===== MODIFIER =====

    public static void updateSpecificTest(SpecificTest test, List<SpecificQuestion> questions) throws SQLException {
        String sql = "UPDATE specific_tests SET general_test_id=?, category=?, title=?, description=?, status=? WHERE id=?";
        PreparedStatement ps = connection.prepareStatement(sql);
        ps.setInt(1, test.getGeneralTestId());
        ps.setString(2, test.getCategory());
        ps.setString(3, test.getTitle());
        ps.setString(4, test.getDescription());
        ps.setString(5, test.getStatus());
        ps.setInt(6, test.getId());
        ps.executeUpdate();
        ps.close();

        // Supprimer anciennes reponses
        String sqlDA = "DELETE FROM specific_answers WHERE question_id IN (SELECT id FROM specific_questions WHERE test_id=?)";
        PreparedStatement psDA = connection.prepareStatement(sqlDA);
        psDA.setInt(1, test.getId());
        psDA.executeUpdate();
        psDA.close();

        // Supprimer anciennes questions
        String sqlDQ = "DELETE FROM specific_questions WHERE test_id=?";
        PreparedStatement psDQ = connection.prepareStatement(sqlDQ);
        psDQ.setInt(1, test.getId());
        psDQ.executeUpdate();
        psDQ.close();

        insertQuestionsAndAnswers(test.getId(), questions);
    }

    // ===== SUPPRIMER =====

    public static void deleteSpecificTest(int testId) throws SQLException {
        String sqlDA = "DELETE FROM specific_answers WHERE question_id IN (SELECT id FROM specific_questions WHERE test_id=?)";
        PreparedStatement ps1 = connection.prepareStatement(sqlDA);
        ps1.setInt(1, testId);
        ps1.executeUpdate();
        ps1.close();

        String sqlDQ = "DELETE FROM specific_questions WHERE test_id=?";
        PreparedStatement ps2 = connection.prepareStatement(sqlDQ);
        ps2.setInt(1, testId);
        ps2.executeUpdate();
        ps2.close();

        String sqlDT = "DELETE FROM specific_tests WHERE id=?";
        PreparedStatement ps3 = connection.prepareStatement(sqlDT);
        ps3.setInt(1, testId);
        ps3.executeUpdate();
        ps3.close();
    }

    // ===== METHODES PRIVEES =====

    // COLONNE = test_id (PAS specific_test_id)
    private static void insertQuestionsAndAnswers(int testId, List<SpecificQuestion> questions) throws SQLException {
        for (SpecificQuestion question : questions) {
            String sqlQ = "INSERT INTO specific_questions (test_id, question_text, question_order) VALUES (?,?,?)";
            PreparedStatement psQ = connection.prepareStatement(sqlQ, Statement.RETURN_GENERATED_KEYS);
            psQ.setInt(1, testId);
            psQ.setString(2, question.getQuestionText());
            psQ.setInt(3, question.getQuestionOrder());
            psQ.executeUpdate();

            ResultSet qKeys = psQ.getGeneratedKeys();
            int qId = 0;
            if (qKeys.next()) qId = qKeys.getInt(1);
            qKeys.close();
            psQ.close();

            if (question.getAnswers() != null) {
                for (SpecificAnswer answer : question.getAnswers()) {
                    String sqlA = "INSERT INTO specific_answers (question_id, answer_text, score, answer_order) VALUES (?,?,?,?)";
                    PreparedStatement psA = connection.prepareStatement(sqlA);
                    psA.setInt(1, qId);
                    psA.setString(2, answer.getAnswerText());
                    psA.setInt(3, answer.getScore());
                    psA.setInt(4, answer.getAnswerOrder());
                    psA.executeUpdate();
                    psA.close();
                }
            }
        }
    }

    // Extraire un SpecificTest depuis ResultSet (toutes les colonnes de la BDD)
    private static SpecificTest extractTest(ResultSet rs) throws SQLException {
        return new SpecificTest(
                rs.getInt("id"),
                rs.getInt("general_test_id"),
                rs.getString("category"),
                rs.getString("title"),
                rs.getString("description"),
                rs.getString("status"),
                rs.getInt("created_by"),
                rs.getString("created_at"),
                rs.getString("updated_at")
        );
    }
}