package com.gestion_test.services;

import com.gestion_test.utils.MyDataBase;

import java.sql.Connection;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;
import java.util.LinkedHashMap;
import java.util.List;
import java.util.Map;

public class StatisticsService {

    private static final Connection connection = MyDataBase.getInstance().getConnection();

    public static int getTotalGeneralTests() throws SQLException {
        String sql = "SELECT COUNT(*) AS total FROM general_tests";
        Statement stmt = connection.createStatement();
        ResultSet rs = stmt.executeQuery(sql);
        if (rs.next()) {
            return rs.getInt("total");
        }
        return 0;
    }

    public static int getTotalSpecificTests() throws SQLException {
        String sql = "SELECT COUNT(*) AS total FROM specific_tests";
        Statement stmt = connection.createStatement();
        ResultSet rs = stmt.executeQuery(sql);
        if (rs.next()) {
            return rs.getInt("total");
        }
        return 0;
    }

    public static int getTotalStudentsTested() throws SQLException {
        String sql = "SELECT COUNT(DISTINCT user_id) AS total FROM score";
        Statement stmt = connection.createStatement();
        ResultSet rs = stmt.executeQuery(sql);
        if (rs.next()) {
            return rs.getInt("total");
        }
        return 0;
    }

    public static double getAverageGeneralScore() throws SQLException {
        String sql = "SELECT AVG(percentage) AS avg_score FROM score";
        Statement stmt = connection.createStatement();
        ResultSet rs = stmt.executeQuery(sql);
        if (rs.next()) {
            return Math.round(rs.getDouble("avg_score") * 100.0) / 100.0;
        }
        return 0;
    }

    /**
     * CORRIGE : Pas d'initialisation fixe
     * Laisse ScoreService decider les noms de categories
     * Pas de probleme d'accents
     */
    public static Map<String, Integer> getCategoryDistribution() throws SQLException {
        Map<String, Integer> distribution = new LinkedHashMap<String, Integer>();

        String sql = "SELECT percentage FROM score";
        Statement stmt = connection.createStatement();
        ResultSet rs = stmt.executeQuery(sql);

        while (rs.next()) {
            int percentage = rs.getInt("percentage");
            String category = ScoreService.getCategoryFromPercentage(percentage);

            Integer current = distribution.get(category);
            if (current != null) {
                distribution.put(category, current + 1);
            } else {
                distribution.put(category, 1);
            }
        }

        return distribution;
    }

    /**
     * CORRIGE : Tranches alignees avec les categories
     * 0-24  = Stress
     * 25-49 = Anxiete
     * 50-74 = Depression
     * 75-100 = Trouble du Sommeil
     */
    public static Map<String, Integer> getScoreDistribution() throws SQLException {
        Map<String, Integer> distribution = new LinkedHashMap<String, Integer>();
        distribution.put("0-24", 0);
        distribution.put("25-49", 0);
        distribution.put("50-74", 0);
        distribution.put("75-100", 0);

        String sql = "SELECT percentage FROM score";
        Statement stmt = connection.createStatement();
        ResultSet rs = stmt.executeQuery(sql);

        while (rs.next()) {
            int p = rs.getInt("percentage");

            if (p >= 0 && p < 25) {
                distribution.put("0-24", distribution.get("0-24") + 1);
            } else if (p >= 25 && p < 50) {
                distribution.put("25-49", distribution.get("25-49") + 1);
            } else if (p >= 50 && p < 75) {
                distribution.put("50-74", distribution.get("50-74") + 1);
            } else if (p >= 75 && p <= 100) {
                distribution.put("75-100", distribution.get("75-100") + 1);
            }
        }

        return distribution;
    }

    /**
     * Liste des resultats des etudiants
     */
    public static List<StudentResult> getStudentResults() throws SQLException {
        List<StudentResult> results = new ArrayList<StudentResult>();

        String sql = "SELECT s.id, s.user_id, s.totalscore, s.percentage, " +
                "g.title AS test_title " +
                "FROM score s " +
                "LEFT JOIN general_tests g ON s.general_test_id = g.id " +
                "ORDER BY s.id DESC";

        Statement stmt = connection.createStatement();
        ResultSet rs = stmt.executeQuery(sql);

        while (rs.next()) {
            int id = rs.getInt("id");
            int userId = rs.getInt("user_id");
            int totalScore = rs.getInt("totalscore");
            int percentage = rs.getInt("percentage");
            String testTitle = rs.getString("test_title");
            String category = ScoreService.getCategoryFromPercentage(percentage);

            if (testTitle == null) {
                testTitle = "Test inconnu";
            }

            StudentResult result = new StudentResult(id, userId, testTitle, totalScore, percentage, category);
            results.add(result);
        }

        return results;
    }

    public static class StudentResult {
        private int id;
        private int userId;
        private String testTitle;
        private int totalScore;
        private int percentage;
        private String category;

        public StudentResult(int id, int userId, String testTitle, int totalScore, int percentage, String category) {
            this.id = id;
            this.userId = userId;
            this.testTitle = testTitle;
            this.totalScore = totalScore;
            this.percentage = percentage;
            this.category = category;
        }

        public int getId() { return id; }
        public int getUserId() { return userId; }
        public String getTestTitle() { return testTitle; }
        public int getTotalScore() { return totalScore; }
        public int getPercentage() { return percentage; }
        public String getCategory() { return category; }
    }
}