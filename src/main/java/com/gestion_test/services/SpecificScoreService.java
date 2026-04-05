package com.gestion_test.services;

import com.gestion_test.utils.MyDataBase;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;
import java.util.List;

public class SpecificScoreService {

    private static final Connection connection = MyDataBase.getInstance().getConnection();

    // ===== CLASSE INTERNE WeeklyScore =====

    public static class WeeklyScore {
        private int id;
        private int userId;
        private int specificTestId;
        private String testTitle;
        private int totalScore;
        private int maxScore;
        private int percentage;
        private String category;
        private String level;
        private int weekNumber;
        private String passedAt;

        public WeeklyScore(int id, int userId, int specificTestId, String testTitle,
                           int totalScore, int maxScore, int percentage,
                           String category, String level, int weekNumber, String passedAt) {
            this.id = id;
            this.userId = userId;
            this.specificTestId = specificTestId;
            this.testTitle = testTitle;
            this.totalScore = totalScore;
            this.maxScore = maxScore;
            this.percentage = percentage;
            this.category = category;
            this.level = level;
            this.weekNumber = weekNumber;
            this.passedAt = passedAt;
        }

        public int getId() { return id; }
        public int getUserId() { return userId; }
        public int getSpecificTestId() { return specificTestId; }
        public String getTestTitle() { return testTitle; }
        public int getTotalScore() { return totalScore; }
        public int getMaxScore() { return maxScore; }
        public int getPercentage() { return percentage; }
        public String getCategory() { return category; }
        public String getLevel() { return level; }
        public int getWeekNumber() { return weekNumber; }
        public String getPassedAt() { return passedAt; }
    }

    // ===== SAUVEGARDER UN SCORE =====

    public static int saveScore(int userId, int specificTestId, int totalScore,
                                int maxScore, int percentage, String category,
                                String level, int weekNumber) throws SQLException {
        String sql = "INSERT INTO specific_score (user_id, specific_test_id, total_score, " +
                "max_score, percentage, category, level, week_number) " +
                "VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        PreparedStatement ps = connection.prepareStatement(sql, Statement.RETURN_GENERATED_KEYS);
        ps.setInt(1, userId);
        ps.setInt(2, specificTestId);
        ps.setInt(3, totalScore);
        ps.setInt(4, maxScore);
        ps.setInt(5, percentage);
        ps.setString(6, category);
        ps.setString(7, level);
        ps.setInt(8, weekNumber);
        ps.executeUpdate();

        ResultSet keys = ps.getGeneratedKeys();
        int id = 0;
        if (keys.next()) id = keys.getInt(1);
        keys.close();
        ps.close();
        return id;
    }

    // ===== SAUVEGARDER SCORE (alias simplifie) =====

    public static int saveSpecificScore(int userId, int specificTestId, int totalScore,
                                        int maxScore, int percentage, String category) throws SQLException {
        String level = calculateLevel(percentage);
        int weekNumber = getCurrentWeekNumber(userId);
        return saveScore(userId, specificTestId, totalScore, maxScore, percentage, category, level, weekNumber);
    }

    // ===== SAUVEGARDER UNE REPONSE ETUDIANT =====

    public static void saveStudentAnswer(int scoreId, int userId, int specificTestId,
                                         int questionId, String questionText,
                                         String selectedAnswerText, int answerScore) throws SQLException {
        String sql = "INSERT INTO student_answers (specific_score_id, user_id, specific_test_id, " +
                "question_id, question_text, selected_answer_text, answer_score) " +
                "VALUES (?, ?, ?, ?, ?, ?, ?)";
        PreparedStatement ps = connection.prepareStatement(sql);
        ps.setInt(1, scoreId);
        ps.setInt(2, userId);
        ps.setInt(3, specificTestId);
        ps.setInt(4, questionId);
        ps.setString(5, questionText);
        ps.setString(6, selectedAnswerText);
        ps.setInt(7, answerScore);
        ps.executeUpdate();
        ps.close();
    }

    // ===== VERIFIER SI DEJA PASSE CETTE SEMAINE =====

    public static boolean hasPassedThisWeek(int userId, int testId) throws SQLException {
        String sql = "SELECT COUNT(*) as count FROM specific_score " +
                "WHERE user_id = ? AND specific_test_id = ? " +
                "AND YEARWEEK(passed_at, 1) = YEARWEEK(NOW(), 1)";
        PreparedStatement ps = connection.prepareStatement(sql);
        ps.setInt(1, userId);
        ps.setInt(2, testId);
        ResultSet rs = ps.executeQuery();
        boolean passed = false;
        if (rs.next()) passed = rs.getInt("count") > 0;
        rs.close();
        ps.close();
        return passed;
    }

    // ===== LIRE LES SCORES =====

    public static List<WeeklyScore> getAllScoresForUser(int userId) throws SQLException {
        List<WeeklyScore> scores = new ArrayList<WeeklyScore>();

        String sql = "SELECT ss.*, st.title AS test_title FROM specific_score ss " +
                "LEFT JOIN specific_tests st ON ss.specific_test_id = st.id " +
                "WHERE ss.user_id = ? ORDER BY ss.passed_at DESC";

        PreparedStatement ps = connection.prepareStatement(sql);
        ps.setInt(1, userId);
        ResultSet rs = ps.executeQuery();

        while (rs.next()) {
            scores.add(new WeeklyScore(
                    rs.getInt("id"),
                    rs.getInt("user_id"),
                    rs.getInt("specific_test_id"),
                    rs.getString("test_title") != null ? rs.getString("test_title") : "Test",
                    rs.getInt("total_score"),
                    rs.getInt("max_score"),
                    rs.getInt("percentage"),
                    rs.getString("category"),
                    rs.getString("level"),
                    rs.getInt("week_number"),
                    rs.getString("passed_at")
            ));
        }
        rs.close();
        ps.close();
        return scores;
    }

    // ===== DERNIER POURCENTAGE =====

    public static int getLatestPercentage(int userId) throws SQLException {
        String sql = "SELECT percentage FROM specific_score WHERE user_id = ? ORDER BY passed_at DESC LIMIT 1";
        PreparedStatement ps = connection.prepareStatement(sql);
        ps.setInt(1, userId);
        ResultSet rs = ps.executeQuery();
        int pct = -1;
        if (rs.next()) pct = rs.getInt("percentage");
        rs.close();
        ps.close();
        return pct;
    }

    // ===== DERNIER NIVEAU =====

    public static String getLatestLevel(int userId) throws SQLException {
        String sql = "SELECT level FROM specific_score WHERE user_id = ? ORDER BY passed_at DESC LIMIT 1";
        PreparedStatement ps = connection.prepareStatement(sql);
        ps.setInt(1, userId);
        ResultSet rs = ps.executeQuery();
        String level = "N/A";
        if (rs.next()) level = rs.getString("level");
        rs.close();
        ps.close();
        return level;
    }

    // ===== DERNIERE CATEGORIE =====

    public static String getLatestCategory(int userId) throws SQLException {
        String sql = "SELECT category FROM specific_score WHERE user_id = ? ORDER BY passed_at DESC LIMIT 1";
        PreparedStatement ps = connection.prepareStatement(sql);
        ps.setInt(1, userId);
        ResultSet rs = ps.executeQuery();
        String cat = "N/A";
        if (rs.next()) cat = rs.getString("category");
        rs.close();
        ps.close();
        return cat;
    }

    // ===== DERNIER TOTAL SCORE =====

    public static int getLatestTotalScore(int userId) throws SQLException {
        String sql = "SELECT total_score FROM specific_score WHERE user_id = ? ORDER BY passed_at DESC LIMIT 1";
        PreparedStatement ps = connection.prepareStatement(sql);
        ps.setInt(1, userId);
        ResultSet rs = ps.executeQuery();
        int score = 0;
        if (rs.next()) score = rs.getInt("total_score");
        rs.close();
        ps.close();
        return score;
    }

    // ===== DERNIER MAX SCORE =====

    public static int getLatestMaxScore(int userId) throws SQLException {
        String sql = "SELECT max_score FROM specific_score WHERE user_id = ? ORDER BY passed_at DESC LIMIT 1";
        PreparedStatement ps = connection.prepareStatement(sql);
        ps.setInt(1, userId);
        ResultSet rs = ps.executeQuery();
        int score = 0;
        if (rs.next()) score = rs.getInt("max_score");
        rs.close();
        ps.close();
        return score;
    }

    // ===== DETAILS DES REPONSES =====

    public static String getLatestAnswersDetails(int userId) throws SQLException {
        String sql = "SELECT sa.question_text, sa.selected_answer_text, sa.answer_score " +
                "FROM student_answers sa " +
                "WHERE sa.user_id = ? " +
                "ORDER BY sa.passed_at DESC, sa.id ASC " +
                "LIMIT 20";

        PreparedStatement ps = connection.prepareStatement(sql);
        ps.setInt(1, userId);
        ResultSet rs = ps.executeQuery();

        StringBuilder details = new StringBuilder();
        int num = 1;
        while (rs.next()) {
            details.append(num).append(". Question: ").append(rs.getString("question_text")).append("\n");
            details.append("   Reponse: ").append(rs.getString("selected_answer_text"));
            details.append(" (score: ").append(rs.getInt("answer_score")).append(")\n");
            num++;
        }
        rs.close();
        ps.close();

        return details.length() == 0 ? "Aucun detail disponible" : details.toString();
    }

    // ===== CALCULER LE NIVEAU =====

    public static String calculateLevel(int percentage) {
        if (percentage <= 33) return "Faible";
        if (percentage <= 66) return "Modere";
        return "Eleve";
    }

    // ===== ALIAS getLevelFromPercentage =====

    public static String getLevelFromPercentage(int percentage) {
        return calculateLevel(percentage);
    }

    // ===== CALCULER LE NUMERO DE SEMAINE =====

    public static int getCurrentWeekNumber(int userId) throws SQLException {
        String sql = "SELECT COUNT(DISTINCT week_number) as count FROM specific_score WHERE user_id = ?";
        PreparedStatement ps = connection.prepareStatement(sql);
        ps.setInt(1, userId);
        ResultSet rs = ps.executeQuery();
        int count = 0;
        if (rs.next()) count = rs.getInt("count");
        rs.close();
        ps.close();
        return count + 1;
    }

    // ===== COULEUR DU NIVEAU =====

    public static String getLevelColor(String level) {
        if (level == null) return "#9B9BB0";
        if ("Faible".equals(level)) return "#2ECC71";
        if ("Modere".equals(level)) return "#F39C12";
        if ("Eleve".equals(level)) return "#E74C3C";
        return "#9B9BB0";
    }

    // ===== EMOJI DU NIVEAU =====

    public static String getLevelEmoji(String level) {
        if (level == null) return "";
        if ("Faible".equals(level)) return "Bon";
        if ("Modere".equals(level)) return "Attention";
        if ("Eleve".equals(level)) return "Alerte";
        return "";
    }
}