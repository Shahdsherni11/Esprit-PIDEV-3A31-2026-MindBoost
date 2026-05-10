package com.mindboost.app.service;

import com.mindboost.app.config.DatabaseManager;
import com.mindboost.app.model.GeneralTest;
import com.mindboost.app.model.Score;
import com.mindboost.app.model.SpecificScore;
import com.mindboost.app.model.SpecificTest;
import jakarta.persistence.EntityManager;

import java.util.HashMap;
import java.util.List;
import java.util.Map;

public class AdminStatisticsService {
    private final DatabaseManager databaseManager;

    public AdminStatisticsService(DatabaseManager databaseManager) {
        this.databaseManager = databaseManager;
    }

    public AdminStats getDashboardData() {
        try (EntityManager em = databaseManager.createEntityManager()) {
            List<Score> generalScores = em.createQuery("from Score", Score.class).getResultList();
            List<SpecificScore> specificScores = em.createQuery("from SpecificScore", SpecificScore.class).getResultList();
            Map<Integer, GeneralTest> generalTests = indexById(em.createQuery("from GeneralTest", GeneralTest.class).getResultList());
            Map<Integer, SpecificTest> specificTests = indexById(em.createQuery("from SpecificTest", SpecificTest.class).getResultList());

            Map<Integer, Boolean> studentIds = new HashMap<>();
            Map<String, Integer> categoryCounts = new HashMap<>();
            Map<String, Integer> levelCounts = new HashMap<>();
            Map<String, Integer> scoreRanges = new HashMap<>();
            scoreRanges.put("0-24", 0);
            scoreRanges.put("25-49", 0);
            scoreRanges.put("50-74", 0);
            scoreRanges.put("75-100", 0);
            Map<String, Integer> weeklyCounts = new HashMap<>();
            Map<String, Integer> generalUsage = new HashMap<>();
            Map<String, Integer> specificUsage = new HashMap<>();

            int generalSum = 0;
            int generalCount = 0;

            for (Score score : generalScores) {
                studentIds.put(score.getUserId(), true);
                generalSum += score.getPercentage() == null ? 0 : score.getPercentage();
                generalCount++;
                String title = generalTests.get(score.getGeneralTestId()) != null
                    ? generalTests.get(score.getGeneralTestId()).getTitle()
                    : "Test général";
                generalUsage.put(title, generalUsage.getOrDefault(title, 0) + 1);
            }

            for (SpecificScore score : specificScores) {
                studentIds.put(score.getUserId(), true);
                String category = score.getCategory() == null ? "Non définie" : score.getCategory();
                String level = score.getLevel() == null ? "Non défini" : score.getLevel();
                int percentage = score.getPercentage() == null ? 0 : score.getPercentage();

                categoryCounts.put(category, categoryCounts.getOrDefault(category, 0) + 1);
                levelCounts.put(level, levelCounts.getOrDefault(level, 0) + 1);

                if (percentage <= 24) {
                    scoreRanges.put("0-24", scoreRanges.get("0-24") + 1);
                } else if (percentage <= 49) {
                    scoreRanges.put("25-49", scoreRanges.get("25-49") + 1);
                } else if (percentage <= 74) {
                    scoreRanges.put("50-74", scoreRanges.get("50-74") + 1);
                } else {
                    scoreRanges.put("75-100", scoreRanges.get("75-100") + 1);
                }

                String weekLabel = "Semaine " + (score.getWeekNumber() == null ? 0 : score.getWeekNumber());
                weeklyCounts.put(weekLabel, weeklyCounts.getOrDefault(weekLabel, 0) + 1);

                String title = specificTests.get(score.getSpecificTestId()) != null
                    ? specificTests.get(score.getSpecificTestId()).getTitle()
                    : "Test spécifique";
                specificUsage.put(title, specificUsage.getOrDefault(title, 0) + 1);
            }

            return new AdminStats(
                generalScores.size(),
                specificScores.size(),
                studentIds.size(),
                generalCount > 0 ? Math.round((float) generalSum / generalCount) : 0,
                categoryCounts,
                levelCounts,
                scoreRanges,
                weeklyCounts,
                generalUsage,
                specificUsage
            );
        }
    }

    private <T> Map<Integer, T> indexById(List<T> entities) {
        Map<Integer, T> indexed = new HashMap<>();
        for (T entity : entities) {
            try {
                Integer id = (Integer) entity.getClass().getMethod("getId").invoke(entity);
                if (id != null) {
                    indexed.put(id, entity);
                }
            } catch (Exception ignored) {
            }
        }
        return indexed;
    }

    public record AdminStats(
        int totalGeneralResults,
        int totalSpecificResults,
        int totalStudentsTested,
        int averageGeneralScore,
        Map<String, Integer> categoryCounts,
        Map<String, Integer> levelCounts,
        Map<String, Integer> scoreRanges,
        Map<String, Integer> weeklyCounts,
        Map<String, Integer> generalUsage,
        Map<String, Integer> specificUsage
    ) {}
}
