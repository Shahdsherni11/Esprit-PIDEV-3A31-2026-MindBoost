package com.mindboost.dao;

import com.mindboost.utils.DatabaseConnection;
import java.sql.*;
import java.util.*;

public class MindBotDAO {

    private Connection conn() { return DatabaseConnection.getInstance().getConnection(); }

    public void saveMessage(int userId, String role, String message) {
        try {
            String sql = "INSERT INTO mindbot_session (user_id,role,message) VALUES (?,?,?)";
            try (PreparedStatement ps = conn().prepareStatement(sql)) {
                ps.setInt(1, userId); ps.setString(2, role); ps.setString(3, message);
                ps.executeUpdate();
            }
        } catch (SQLException e) { e.printStackTrace(); }
    }

    public List<Map<String,String>> getHistory(int userId, int limit) throws SQLException {
        List<Map<String,String>> list = new ArrayList<>();
        String sql = "SELECT role, message FROM mindbot_session WHERE user_id=? ORDER BY created_at DESC LIMIT ?";
        try (PreparedStatement ps = conn().prepareStatement(sql)) {
            ps.setInt(1, userId); ps.setInt(2, limit);
            ResultSet rs = ps.executeQuery();
            // Reverse so oldest first
            List<Map<String,String>> temp = new ArrayList<>();
            while (rs.next()) {
                Map<String,String> m = new HashMap<>();
                m.put("role", rs.getString("role")); m.put("content", rs.getString("message"));
                temp.add(m);
            }
            Collections.reverse(temp);
            return temp;
        }
    }
}
