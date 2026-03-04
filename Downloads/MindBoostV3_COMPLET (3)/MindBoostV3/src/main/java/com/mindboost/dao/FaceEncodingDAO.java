package com.mindboost.dao;

import com.mindboost.models.FaceEncoding;
import com.mindboost.utils.DatabaseConnection;
import java.sql.*;

public class FaceEncodingDAO {

    private Connection conn() { return DatabaseConnection.getInstance().getConnection(); }

    public boolean save(FaceEncoding fe) throws SQLException {
        String sql = "INSERT INTO face_encoding (user_id, encoding, image_path) VALUES (?,?,?) " +
                     "ON DUPLICATE KEY UPDATE encoding=VALUES(encoding), image_path=VALUES(image_path)";
        try (PreparedStatement ps = conn().prepareStatement(sql)) {
            ps.setInt(1, fe.getUserId());
            ps.setString(2, fe.getEncoding());
            ps.setString(3, fe.getImagePath());
            return ps.executeUpdate() > 0;
        }
    }

    public FaceEncoding getByUserId(int userId) throws SQLException {
        String sql = "SELECT * FROM face_encoding WHERE user_id=?";
        try (PreparedStatement ps = conn().prepareStatement(sql)) {
            ps.setInt(1, userId);
            ResultSet rs = ps.executeQuery();
            if (rs.next()) {
                FaceEncoding fe = new FaceEncoding();
                fe.setId(rs.getInt("id"));
                fe.setUserId(rs.getInt("user_id"));
                fe.setEncoding(rs.getString("encoding"));
                fe.setImagePath(rs.getString("image_path"));
                Timestamp ts = rs.getTimestamp("created_at");
                if (ts != null) fe.setCreatedAt(ts.toLocalDateTime());
                return fe;
            }
        }
        return null;
    }

    public java.util.List<FaceEncoding> getAllEncodings() throws SQLException {
        java.util.List<FaceEncoding> list = new java.util.ArrayList<>();
        String sql = "SELECT * FROM face_encoding";
        try (Statement st = conn().createStatement(); ResultSet rs = st.executeQuery(sql)) {
            while (rs.next()) {
                FaceEncoding fe = new FaceEncoding();
                fe.setId(rs.getInt("id")); fe.setUserId(rs.getInt("user_id"));
                fe.setEncoding(rs.getString("encoding")); fe.setImagePath(rs.getString("image_path"));
                list.add(fe);
            }
        }
        return list;
    }
}
