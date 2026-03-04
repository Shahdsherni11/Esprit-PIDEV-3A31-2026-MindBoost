package com.mindboost.dao;

import com.mindboost.models.BehaviorEvent;
import com.mindboost.utils.DatabaseConnection;
import java.sql.*;
import java.util.*;

public class BehaviorDAO {

    private Connection conn() { return DatabaseConnection.getInstance().getConnection(); }

    public void save(BehaviorEvent e) {
        try {
            String sql = "INSERT INTO behavior_event (user_id,event_type,event_data,session_id,created_at) VALUES (?,?,?,?,?)";
            try (PreparedStatement ps = conn().prepareStatement(sql)) {
                ps.setInt(1, e.getUserId());
                ps.setString(2, e.getEventType());
                ps.setString(3, e.getEventData());
                ps.setString(4, e.getSessionId());
                ps.setTimestamp(5, Timestamp.valueOf(e.getCreatedAt()));
                ps.executeUpdate();
            }
        } catch (SQLException ex) { ex.printStackTrace(); }
    }

    public List<BehaviorEvent> getRecentByUser(int userId, int limit) throws SQLException {
        List<BehaviorEvent> list = new ArrayList<>();
        String sql = "SELECT * FROM behavior_event WHERE user_id=? ORDER BY created_at DESC LIMIT ?";
        try (PreparedStatement ps = conn().prepareStatement(sql)) {
            ps.setInt(1, userId); ps.setInt(2, limit);
            ResultSet rs = ps.executeQuery();
            while (rs.next()) {
                BehaviorEvent e = new BehaviorEvent();
                e.setId(rs.getInt("id"));
                e.setUserId(rs.getInt("user_id"));
                e.setEventType(rs.getString("event_type"));
                e.setEventData(rs.getString("event_data"));
                e.setSessionId(rs.getString("session_id"));
                Timestamp ts = rs.getTimestamp("created_at");
                if (ts != null) e.setCreatedAt(ts.toLocalDateTime());
                list.add(e);
            }
        }
        return list;
    }

    public int countByType(int userId, String type) throws SQLException {
        String sql = "SELECT COUNT(*) FROM behavior_event WHERE user_id=? AND event_type=?";
        try (PreparedStatement ps = conn().prepareStatement(sql)) {
            ps.setInt(1, userId); ps.setString(2, type);
            ResultSet rs = ps.executeQuery();
            return rs.next() ? rs.getInt(1) : 0;
        }
    }
}
