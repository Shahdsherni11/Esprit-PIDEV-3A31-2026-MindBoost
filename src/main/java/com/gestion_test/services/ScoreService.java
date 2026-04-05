package com.gestion_test.services;

import com.gestion_test.utils.MyDataBase;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;

public class ScoreService {
    private static final Connection connection = MyDataBase.getInstance().getConnection();

    public static void saveTotalScore(int userId, int generalTestId, int totalScore, int percentage) throws SQLException {
        String sql = "INSERT INTO score (user_id, general_test_id, totalscore, percentage) VALUES (?, ?, ?, ?)";

        PreparedStatement ps = connection.prepareStatement(sql);
        ps.setInt(1, userId);
        ps.setInt(2, generalTestId);
        ps.setInt(3, totalScore);
        ps.setInt(4, percentage);
        ps.executeUpdate();
        ps.close();

        System.out.println("Score sauvegarde : " + percentage + "% pour user " + userId);
    }

    public static int getLatestPercentageForUser(int userId) throws SQLException {
        String sql = "SELECT percentage FROM score WHERE user_id = ? ORDER BY id DESC LIMIT 1";

        PreparedStatement ps = connection.prepareStatement(sql);
        ps.setInt(1, userId);
        ResultSet rs = ps.executeQuery();

        if (rs.next()) {
            int result = rs.getInt("percentage");
            rs.close();
            ps.close();
            return result;
        }

        rs.close();
        ps.close();
        return -1;
    }

    public static boolean hasStudentPassedGeneralTest(int userId) throws SQLException {
        String sql = "SELECT COUNT(*) AS c FROM score WHERE user_id = ?";

        PreparedStatement ps = connection.prepareStatement(sql);
        ps.setInt(1, userId);
        ResultSet rs = ps.executeQuery();

        if (rs.next()) {
            int count = rs.getInt("c");
            rs.close();
            ps.close();
            return count > 0;
        }

        rs.close();
        ps.close();
        return false;
    }

    /**
     * CORRIGE : Sans accents pour matcher partout
     * 0-24   = Stress
     * 25-49  = Anxiete
     * 50-74  = Depression
     * 75-100 = Trouble du Sommeil
     */
    public static String getCategoryFromPercentage(int percentage) {
        if (percentage >= 0 && percentage < 25) {
            return "Stress";
        }
        if (percentage >= 25 && percentage < 50) {
            return "Anxiete";
        }
        if (percentage >= 50 && percentage < 75) {
            return "Depression";
        }
        if (percentage >= 75 && percentage <= 100) {
            return "Trouble du Sommeil";
        }
        return "Stress";
    }
}