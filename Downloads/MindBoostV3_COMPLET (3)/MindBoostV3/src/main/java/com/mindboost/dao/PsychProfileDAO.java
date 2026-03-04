package com.mindboost.dao;

import com.mindboost.models.PsychProfile;
import com.mindboost.utils.DatabaseConnection;
import java.sql.*;

public class PsychProfileDAO {

    private Connection conn() { return DatabaseConnection.getInstance().getConnection(); }

    public PsychProfile getByUserId(int userId) throws SQLException {
        String sql = "SELECT * FROM psych_profile WHERE user_id=?";
        try (PreparedStatement ps = conn().prepareStatement(sql)) {
            ps.setInt(1, userId);
            ResultSet rs = ps.executeQuery();
            if (rs.next()) return map(rs);
        }
        return null;
    }

    public boolean save(PsychProfile p) throws SQLException {
        // UPSERT
        String sql = "INSERT INTO psych_profile (user_id,anxiety,resilience,sociability,focus,mood,anomaly_score,detected_type) " +
                     "VALUES (?,?,?,?,?,?,?,?) ON DUPLICATE KEY UPDATE " +
                     "anxiety=VALUES(anxiety), resilience=VALUES(resilience), sociability=VALUES(sociability), " +
                     "focus=VALUES(focus), mood=VALUES(mood), anomaly_score=VALUES(anomaly_score), detected_type=VALUES(detected_type)";
        try (PreparedStatement ps = conn().prepareStatement(sql)) {
            ps.setInt(1, p.getUserId());
            ps.setDouble(2, p.getAnxiety());
            ps.setDouble(3, p.getResilience());
            ps.setDouble(4, p.getSociability());
            ps.setDouble(5, p.getFocus());
            ps.setDouble(6, p.getMood());
            ps.setDouble(7, p.getAnomalyScore());
            ps.setString(8, p.getDetectedType());
            return ps.executeUpdate() > 0;
        }
    }

    private PsychProfile map(ResultSet rs) throws SQLException {
        PsychProfile p = new PsychProfile();
        p.setId(rs.getInt("id"));
        p.setUserId(rs.getInt("user_id"));
        p.setAnxiety(rs.getDouble("anxiety"));
        p.setResilience(rs.getDouble("resilience"));
        p.setSociability(rs.getDouble("sociability"));
        p.setFocus(rs.getDouble("focus"));
        p.setMood(rs.getDouble("mood"));
        p.setAnomalyScore(rs.getDouble("anomaly_score"));
        p.setDetectedType(rs.getString("detected_type"));
        Timestamp ts = rs.getTimestamp("last_updated");
        if (ts != null) p.setLastUpdated(ts.toLocalDateTime());
        return p;
    }
}
