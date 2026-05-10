package com.mindboost.app.service;

import com.mindboost.app.config.DatabaseManager;
import com.mindboost.app.model.GeneralTest;
import com.mindboost.app.model.Score;
import com.mindboost.app.model.SpecificScore;
import com.mindboost.app.model.SpecificTest;
import jakarta.persistence.EntityManager;

import java.time.LocalDateTime;
import java.util.ArrayList;
import java.util.Comparator;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

public class AdminInsightsService {
    private final DatabaseManager databaseManager;

    public AdminInsightsService(DatabaseManager databaseManager) {
        this.databaseManager = databaseManager;
    }

    public List<ResultHistoryItem> getResultHistory() {
        try (EntityManager em = databaseManager.createEntityManager()) {
            List<Score> generalScores = em.createQuery("select s from Score s order by s.id desc", Score.class).getResultList();
            List<SpecificScore> specificScores = em.createQuery("select s from SpecificScore s order by s.passedAt desc", SpecificScore.class).getResultList();

            Map<Integer, GeneralTest> generalTests = indexById(em.createQuery("from GeneralTest", GeneralTest.class).getResultList());
            Map<Integer, SpecificTest> specificTests = indexById(em.createQuery("from SpecificTest", SpecificTest.class).getResultList());

            List<ResultHistoryItem> history = new ArrayList<>();
            for (Score score : generalScores) {
                GeneralTest test = generalTests.get(score.getGeneralTestId());
                history.add(new ResultHistoryItem(
                    "general",
                    score.getUserId(),
                    test == null ? "Test général supprimé" : test.getTitle(),
                    "-",
                    "-",
                    score.getTotalScore(),
                    score.getPercentage(),
                    null
                ));
            }

            for (SpecificScore score : specificScores) {
                SpecificTest test = specificTests.get(score.getSpecificTestId());
                history.add(new ResultHistoryItem(
                    "specific",
                    score.getUserId(),
                    test == null ? "Test spécifique supprimé" : test.getTitle(),
                    score.getCategory(),
                    score.getLevel(),
                    score.getTotalScore(),
                    score.getPercentage(),
                    score.getPassedAt()
                ));
            }

            history.sort(Comparator.comparing(ResultHistoryItem::dateSafe).reversed());
            return history;
        }
    }

    public AnalyticsData getAnalytics() {
        try (EntityManager em = databaseManager.createEntityManager()) {
            List<SpecificScore> specificScores = em.createQuery("from SpecificScore", SpecificScore.class).getResultList();
            List<Score> scores = em.createQuery("from Score", Score.class).getResultList();

            Map<String, Integer> testsPerWeek = new HashMap<>();
            Map<String, Integer> categories = new HashMap<>();
            Map<String, Integer> levels = new HashMap<>();
            Map<String, Integer> testUsage = new HashMap<>();

            Map<Integer, SpecificTest> specificTests = indexById(em.createQuery("from SpecificTest", SpecificTest.class).getResultList());
            Map<Integer, GeneralTest> generalTests = indexById(em.createQuery("from GeneralTest", GeneralTest.class).getResultList());

            for (SpecificScore score : specificScores) {
                String week = "Semaine " + score.getWeekNumber();
                testsPerWeek.put(week, testsPerWeek.getOrDefault(week, 0) + 1);

                categories.put(score.getCategory(), categories.getOrDefault(score.getCategory(), 0) + 1);
                levels.put(score.getLevel(), levels.getOrDefault(score.getLevel(), 0) + 1);

                String testTitle = specificTests.get(score.getSpecificTestId()) != null
                    ? specificTests.get(score.getSpecificTestId()).getTitle()
                    : "Test spécifique";
                testUsage.put(testTitle, testUsage.getOrDefault(testTitle, 0) + 1);
            }

            for (Score score : scores) {
                String testTitle = generalTests.get(score.getGeneralTestId()) != null
                    ? generalTests.get(score.getGeneralTestId()).getTitle()
                    : "Test général";
                testUsage.put(testTitle, testUsage.getOrDefault(testTitle, 0) + 1);
            }

            return new AnalyticsData(
                scores.size(),
                specificScores.size(),
                testsPerWeek,
                categories,
                levels,
                testUsage
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

    public record ResultHistoryItem(
        String type,
        Integer userId,
        String testTitle,
        String category,
        String level,
        Integer score,
        Integer percentage,
        LocalDateTime passedAt
    ) {
        public LocalDateTime dateSafe() {
            return passedAt == null ? LocalDateTime.MIN : passedAt;
        }
    }

    public record AnalyticsData(
        int totalGeneralResults,
        int totalSpecificResults,
        Map<String, Integer> testsPerWeek,
        Map<String, Integer> categories,
        Map<String, Integer> levels,
        Map<String, Integer> testUsage
    ) {}
}
