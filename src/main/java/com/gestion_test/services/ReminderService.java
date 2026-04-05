package com.gestion_test.services;

import com.gestion_test.utils.MyDataBase;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;
import java.util.Timer;
import java.util.TimerTask;

public class ReminderService {

    private static Timer reminderTimer;
    private static boolean isRunning = false;

    public static void startReminderSystem() {
        if (isRunning) return;
        isRunning = true;

        reminderTimer = new Timer(true);
        reminderTimer.scheduleAtFixedRate(new TimerTask() {
            @Override
            public void run() {
                System.out.println("Verification des rappels...");
                checkAndSendReminders();
            }
        }, 5000, 3600000);

        System.out.println("Systeme de rappels demarre");
    }

    public static void stopReminderSystem() {
        if (reminderTimer != null) {
            reminderTimer.cancel();
            isRunning = false;
            System.out.println("Systeme de rappels arrete");
        }
    }

    public static void checkAndSendReminders() {
        try {
            List<StudentInfo> students = getStudentsWithoutTestThisWeek();
            System.out.println(students.size() + " etudiant(s) n'ont pas passe de test cette semaine");

            for (StudentInfo student : students) {
                boolean sent = EmailService.sendWeeklyReminder(student.email, student.name);
                if (sent) System.out.println("Rappel envoye a: " + student.email);
                try { Thread.sleep(2000); } catch (InterruptedException e) { }
            }
        } catch (SQLException e) {
            System.err.println("Erreur rappels: " + e.getMessage());
        }
    }

    public static boolean sendReminderToStudent(int userId) {
        try {
            Connection conn = MyDataBase.getInstance().getConnection();
            String sql = "SELECT email FROM user WHERE id = ?";
            PreparedStatement ps = conn.prepareStatement(sql);
            ps.setInt(1, userId);
            ResultSet rs = ps.executeQuery();

            if (rs.next()) {
                String email = rs.getString("email");
                rs.close();
                ps.close();
                return EmailService.sendWeeklyReminder(email, email);
            }
            rs.close();
            ps.close();
        } catch (SQLException e) {
            System.err.println("Erreur: " + e.getMessage());
        }
        return false;
    }

    private static List<StudentInfo> getStudentsWithoutTestThisWeek() throws SQLException {
        List<StudentInfo> students = new ArrayList<StudentInfo>();

        Connection conn = MyDataBase.getInstance().getConnection();
        String sql = "SELECT u.id, u.email FROM user u " +
                "WHERE u.role = 'user' " +
                "AND u.id NOT IN (" +
                "  SELECT DISTINCT ss.user_id FROM specific_score ss " +
                "  WHERE YEARWEEK(ss.passed_at, 1) = YEARWEEK(NOW(), 1)" +
                ")";

        PreparedStatement ps = conn.prepareStatement(sql);
        ResultSet rs = ps.executeQuery();

        while (rs.next()) {
            StudentInfo info = new StudentInfo();
            info.id = rs.getInt("id");
            info.email = rs.getString("email");
            info.name = info.email;
            students.add(info);
        }
        rs.close();
        ps.close();
        return students;
    }

    public static class StudentInfo {
        public int id;
        public String email;
        public String name;
    }
}