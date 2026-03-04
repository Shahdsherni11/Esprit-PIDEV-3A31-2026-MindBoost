package com.mindboost.dao;

import com.mindboost.models.User;
import com.mindboost.utils.DatabaseConnection;
import com.mindboost.utils.PasswordUtils;

import java.sql.*;
import java.time.LocalDateTime;
import java.util.ArrayList;
import java.util.List;

public class UserDAO {

    private Connection conn() {
        return DatabaseConnection.getInstance().getConnection();
    }

    // CREATE
    public boolean addUser(User user) throws SQLException {
        String sql = "INSERT INTO user (email, password, role, is_verified, created_at) VALUES (?,?,?,?,?)";
        try (PreparedStatement ps = conn().prepareStatement(sql, Statement.RETURN_GENERATED_KEYS)) {
            ps.setString(1, user.getEmail().trim().toLowerCase());
            ps.setString(2, PasswordUtils.hashPassword(user.getPassword()));
            ps.setString(3, user.getRole());
            ps.setBoolean(4, user.isVerified());
            ps.setTimestamp(5, Timestamp.valueOf(LocalDateTime.now()));
            int rows = ps.executeUpdate();
            if (rows > 0) {
                ResultSet keys = ps.getGeneratedKeys();
                if (keys.next()) user.setId(keys.getInt(1));
                return true;
            }
        }
        return false;
    }

    // READ ALL
    public List<User> getAllUsers() throws SQLException {
        List<User> list = new ArrayList<>();
        String sql = "SELECT * FROM user ORDER BY created_at DESC";
        try (Statement st = conn().createStatement(); ResultSet rs = st.executeQuery(sql)) {
            while (rs.next()) list.add(map(rs));
        }
        return list;
    }

    // READ BY ID
    public User getById(int id) throws SQLException {
        String sql = "SELECT * FROM user WHERE id = ?";
        try (PreparedStatement ps = conn().prepareStatement(sql)) {
            ps.setInt(1, id);
            ResultSet rs = ps.executeQuery();
            if (rs.next()) return map(rs);
        }
        return null;
    }

    // READ BY EMAIL
    public User getByEmail(String email) throws SQLException {
        String sql = "SELECT * FROM user WHERE email = ?";
        try (PreparedStatement ps = conn().prepareStatement(sql)) {
            ps.setString(1, email.trim().toLowerCase());
            ResultSet rs = ps.executeQuery();
            if (rs.next()) return map(rs);
        }
        return null;
    }

    // UPDATE
    public boolean updateUser(User user) throws SQLException {
        String sql = "UPDATE user SET email=?, role=?, is_verified=? WHERE id=?";
        try (PreparedStatement ps = conn().prepareStatement(sql)) {
            ps.setString(1, user.getEmail().trim().toLowerCase());
            ps.setString(2, user.getRole());
            ps.setBoolean(3, user.isVerified());
            ps.setInt(4, user.getId());
            return ps.executeUpdate() > 0;
        }
    }

    // UPDATE PASSWORD
    public boolean updatePassword(int userId, String newPassword) throws SQLException {
        String sql = "UPDATE user SET password=? WHERE id=?";
        try (PreparedStatement ps = conn().prepareStatement(sql)) {
            ps.setString(1, PasswordUtils.hashPassword(newPassword));
            ps.setInt(2, userId);
            return ps.executeUpdate() > 0;
        }
    }

    // DELETE
    public boolean deleteUser(int id) throws SQLException {
        String sql = "DELETE FROM user WHERE id=?";
        try (PreparedStatement ps = conn().prepareStatement(sql)) {
            ps.setInt(1, id);
            return ps.executeUpdate() > 0;
        }
    }

    // AUTHENTICATE
    public User authenticate(String email, String password) throws SQLException {
        User user = getByEmail(email);
        if (user != null && PasswordUtils.verifyPassword(password, user.getPassword())) return user;
        return null;
    }

    // SEARCH
    public List<User> search(String keyword) throws SQLException {
        List<User> list = new ArrayList<>();
        String sql = "SELECT * FROM user WHERE email LIKE ? OR role LIKE ?";
        try (PreparedStatement ps = conn().prepareStatement(sql)) {
            String k = "%" + keyword + "%";
            ps.setString(1, k); ps.setString(2, k);
            ResultSet rs = ps.executeQuery();
            while (rs.next()) list.add(map(rs));
        }
        return list;
    }

    // STATS
    public int countTotal() throws SQLException {
        try (Statement st = conn().createStatement();
             ResultSet rs = st.executeQuery("SELECT COUNT(*) FROM user")) {
            return rs.next() ? rs.getInt(1) : 0;
        }
    }

    public int countByRole(String role) throws SQLException {
        String sql = "SELECT COUNT(*) FROM user WHERE role=?";
        try (PreparedStatement ps = conn().prepareStatement(sql)) {
            ps.setString(1, role);
            ResultSet rs = ps.executeQuery();
            return rs.next() ? rs.getInt(1) : 0;
        }
    }

    // Users without profile (for profile creation)
    public List<User> getUsersWithoutProfile() throws SQLException {
        List<User> list = new ArrayList<>();
        String sql = "SELECT * FROM user WHERE id NOT IN (SELECT user_id FROM profile) ORDER BY email";
        try (Statement st = conn().createStatement(); ResultSet rs = st.executeQuery(sql)) {
            while (rs.next()) list.add(map(rs));
        }
        return list;
    }

    private User map(ResultSet rs) throws SQLException {
        User u = new User();
        u.setId(rs.getInt("id"));
        u.setEmail(rs.getString("email"));
        u.setPassword(rs.getString("password"));
        u.setRole(rs.getString("role"));
        u.setVerified(rs.getBoolean("is_verified"));
        Timestamp ts = rs.getTimestamp("created_at");
        if (ts != null) u.setCreatedAt(ts.toLocalDateTime());
        return u;
    }
}
