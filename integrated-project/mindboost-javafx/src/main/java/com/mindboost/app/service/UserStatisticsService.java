package com.mindboost.app.service;

import com.mindboost.app.config.DatabaseManager;
import com.mindboost.app.model.SpecificScore;
import jakarta.persistence.EntityManager;

import java.time.LocalDateTime;
import java.util.ArrayList;
import java.util.Comparator;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

public class UserStatisticsService {
    private final DatabaseManager databaseManager;

    public UserStatisticsService(DatabaseManager databaseManager) {
        this.databaseManager = databaseManager;
    }

    public UserStats getUserStatistics(int userId) {
        try (EntityManager em = databaseManager.createEntityManager()) {
            List<SpecificScore> scores = em.createQuery(
                "select s from SpecificScore s where s.userId = :userId order by s.passedAt asc", SpecificScore.class)
                .setParameter("userId", userId)
                .getResultList();

            int totalTests = scores.size();
            int bestPercentage = 0;
            int sum = 0;

            Map<String, Integer> categories = new HashMap<>();
            Map<String, Integer> levels = new HashMap<>();
            Map<String, Integer> weeklyProgress = new HashMap<>();
            List<HistoryItem> history = new ArrayList<>();

            for (SpecificScore score : scores) {
                int percentage = score.getPercentage() == null ? 0 : score.getPercentage();
                sum += percentage;
                bestPercentage = Math.max(bestPercentage, percentage);

                String category = score.getCategory() == null ? "Non définie" : score.getCategory();
                String level = score.getLevel() == null ? "Non défini" : score.getLevel();
                String week = "Semaine " + (score.getWeekNumber() == null ? 0 : score.getWeekNumber());

                categories.put(category, categories.getOrDefault(category, 0) + 1);
                levels.put(level, levels.getOrDefault(level, 0) + 1);
                weeklyProgress.put(week, percentage);

                history.add(new HistoryItem(score.getWeekNumber(), category, level, percentage, score.getPassedAt()));
            }

            history.sort(Comparator.comparing(HistoryItem::dateSafe));

            List<String> categoryLabels = categories.keySet().stream().sorted().toList();
            List<Integer> categoryValues = categoryLabels.stream().map(categories::get).toList();
            List<String> levelLabels = levels.keySet().stream().sorted().toList();
            List<Integer> levelValues = levelLabels.stream().map(levels::get).toList();
            List<String> weeklyLabels = weeklyProgress.keySet().stream().sorted().toList();
            List<Integer> weeklyValues = weeklyLabels.stream().map(weeklyProgress::get).toList();

            return new UserStats(
                totalTests,
                bestPercentage,
                totalTests > 0 ? Math.round((float) sum / totalTests) : 0,
                categoryLabels.isEmpty() ? "-" : categoryLabels.get(0),
                levelLabels.isEmpty() ? "-" : levelLabels.get(0),
                categories,
                levels,
                weeklyProgress,
                history,
                categoryLabels,
                categoryValues,
                levelLabels,
                levelValues,
                weeklyLabels,
                weeklyValues
            );
        }
    }

    public record HistoryItem(Integer week, String category, String level, Integer percentage, LocalDateTime date) {
        public LocalDateTime dateSafe() {
            return date == null ? LocalDateTime.MIN : date;
        }
    }

    public record UserStats(
        int totalTests,
        int bestPercentage,
        int averagePercentage,
        String dominantCategory,
        String dominantLevel,
        Map<String, Integer> categories,
        Map<String, Integer> levels,
        Map<String, Integer> weeklyProgress,
        List<HistoryItem> history,
        List<String> categoryLabels,
        List<Integer> categoryValues,
        List<String> levelLabels,
        List<Integer> levelValues,
        List<String> weeklyLabels,
        List<Integer> weeklyValues
    ) {}
}
