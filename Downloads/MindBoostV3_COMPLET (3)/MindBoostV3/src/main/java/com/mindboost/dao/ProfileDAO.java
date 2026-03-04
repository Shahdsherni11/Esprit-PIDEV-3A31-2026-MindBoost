package com.mindboost.dao;

import com.mindboost.models.Profile;
import com.mindboost.models.User;
import com.mindboost.utils.DatabaseConnection;

import java.sql.*;
import java.time.LocalDateTime;
import java.util.ArrayList;
import java.util.List;

public class ProfileDAO {

    private Connection conn() {
        return DatabaseConnection.getInstance().getConnection();
    }

    // CREATE
    public boolean addProfile(Profile p) throws SQLException {
        String sql = "INSERT INTO profile (user_id,first_name,last_name,phone,avatar_url,bio,personality_type,created_at) VALUES (?,?,?,?,?,?,?,?)";
        try (PreparedStatement ps = conn().prepareStatement(sql, Statement.RETURN_GENERATED_KEYS)) {
            ps.setInt(1, p.getUserId());
            ps.setString(2, p.getFirstName());
            ps.setString(3, p.getLastName());
            ps.setString(4, p.getPhone());
            ps.setString(5, p.getAvatarUrl());
            ps.setString(6, p.getBio());
            ps.setString(7, p.getPersonalityType());
            ps.setTimestamp(8, Timestamp.valueOf(LocalDateTime.now()));
            int rows = ps.executeUpdate();
            if (rows > 0) {
                ResultSet keys = ps.getGeneratedKeys();
                if (keys.next()) p.setId(keys.getInt(1));
                return true;
            }
        }
        return false;
    }

    // READ ALL
    public List<Profile> getAllProfiles() throws SQLException {
        List<Profile> list = new ArrayList<>();
        String sql = "SELECT p.*, u.email, u.role, u.is_verified FROM profile p JOIN user u ON p.user_id=u.id ORDER BY p.created_at DESC";
        try (Statement st = conn().createStatement(); ResultSet rs = st.executeQuery(sql)) {
            while (rs.next()) list.add(mapWithUser(rs));
        }
        return list;
    }

    // READ BY ID
    public Profile getById(int id) throws SQLException {
        String sql = "SELECT p.*, u.email, u.role, u.is_verified FROM profile p JOIN user u ON p.user_id=u.id WHERE p.id=?";
        try (PreparedStatement ps = conn().prepareStatement(sql)) {
            ps.setInt(1, id);
            ResultSet rs = ps.executeQuery();
            if (rs.next()) return mapWithUser(rs);
        }
        return null;
    }

    // READ BY USER ID
    public Profile getByUserId(int userId) throws SQLException {
        String sql = "SELECT p.*, u.email, u.role, u.is_verified FROM profile p JOIN user u ON p.user_id=u.id WHERE p.user_id=?";
        try (PreparedStatement ps = conn().prepareStatement(sql)) {
            ps.setInt(1, userId);
            ResultSet rs = ps.executeQuery();
            if (rs.next()) return mapWithUser(rs);
        }
        return null;
    }

    // UPDATE
    public boolean updateProfile(Profile p) throws SQLException {
        String sql = "UPDATE profile SET first_name=?,last_name=?,phone=?,avatar_url=?,bio=?,personality_type=? WHERE id=?";
        try (PreparedStatement ps = conn().prepareStatement(sql)) {
            ps.setString(1, p.getFirstName());
            ps.setString(2, p.getLastName());
            ps.setString(3, p.getPhone());
            ps.setString(4, p.getAvatarUrl());
            ps.setString(5, p.getBio());
            ps.setString(6, p.getPersonalityType());
            ps.setInt(7, p.getId());
            return ps.executeUpdate() > 0;
        }
    }

    // DELETE
    public boolean deleteProfile(int id) throws SQLException {
        String sql = "DELETE FROM profile WHERE id=?";
        try (PreparedStatement ps = conn().prepareStatement(sql)) {
            ps.setInt(1, id);
            return ps.executeUpdate() > 0;
        }
    }

    // SEARCH
    public List<Profile> search(String keyword) throws SQLException {
        List<Profile> list = new ArrayList<>();
        String sql = "SELECT p.*, u.email, u.role, u.is_verified FROM profile p JOIN user u ON p.user_id=u.id WHERE p.first_name LIKE ? OR p.last_name LIKE ? OR u.email LIKE ? OR p.personality_type LIKE ?";
        try (PreparedStatement ps = conn().prepareStatement(sql)) {
            String k = "%" + keyword + "%";
            ps.setString(1, k); ps.setString(2, k); ps.setString(3, k); ps.setString(4, k);
            ResultSet rs = ps.executeQuery();
            while (rs.next()) list.add(mapWithUser(rs));
        }
        return list;
    }

    // COUNT
    public int countTotal() throws SQLException {
        try (Statement st = conn().createStatement();
             ResultSet rs = st.executeQuery("SELECT COUNT(*) FROM profile")) {
            return rs.next() ? rs.getInt(1) : 0;
        }
    }

    private Profile mapWithUser(ResultSet rs) throws SQLException {
        Profile p = new Profile();
        p.setId(rs.getInt("id"));
        p.setUserId(rs.getInt("user_id"));
        p.setFirstName(rs.getString("first_name"));
        p.setLastName(rs.getString("last_name"));
        p.setPhone(rs.getString("phone"));
        p.setAvatarUrl(rs.getString("avatar_url"));
        p.setBio(rs.getString("bio"));
        p.setPersonalityType(rs.getString("personality_type"));
        Timestamp ts = rs.getTimestamp("created_at");
        if (ts != null) p.setCreatedAt(ts.toLocalDateTime());
        User u = new User();
        u.setId(rs.getInt("user_id"));
        u.setEmail(rs.getString("email"));
        u.setRole(rs.getString("role"));
        u.setVerified(rs.getBoolean("is_verified"));
        p.setUser(u);
        return p;
    }
}
