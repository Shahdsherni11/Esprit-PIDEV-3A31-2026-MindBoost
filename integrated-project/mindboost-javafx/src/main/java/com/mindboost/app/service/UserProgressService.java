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

public class UserProgressService {
    private final DatabaseManager databaseManager;

    public UserProgressService(DatabaseManager databaseManager) {
        this.databaseManager = databaseManager;
    }

    public List<HistoryItem> getUserHistory(int userId) {
        try (EntityManager em = databaseManager.createEntityManager()) {
            List<Score> generalScores = em.createQuery(
                "select s from Score s where s.userId = :userId order by s.id desc", Score.class)
                .setParameter("userId", userId)
                .getResultList();

            List<SpecificScore> specificScores = em.createQuery(
                "select s from SpecificScore s where s.userId = :userId order by s.passedAt desc", SpecificScore.class)
                .setParameter("userId", userId)
                .getResultList();

            Map<Integer, GeneralTest> generalTests = indexById(em.createQuery("from GeneralTest", GeneralTest.class).getResultList());
            Map<Integer, SpecificTest> specificTests = indexById(em.createQuery("from SpecificTest", SpecificTest.class).getResultList());

            List<HistoryItem> history = new ArrayList<>();

            for (Score score : generalScores) {
                GeneralTest test = generalTests.get(score.getGeneralTestId());
                history.add(new HistoryItem(
                    "general",
                    test == null ? "Test général" : test.getTitle(),
                    score.getTotalScore(),
                    score.getPercentage(),
                    "-",
                    "-",
                    null
                ));
            }

            for (SpecificScore score : specificScores) {
                SpecificTest test = specificTests.get(score.getSpecificTestId());
                history.add(new HistoryItem(
                    "specific",
                    test == null ? "Test spécifique" : test.getTitle(),
                    score.getTotalScore(),
                    score.getPercentage(),
                    score.getCategory(),
                    score.getLevel(),
                    score.getPassedAt()
                ));
            }

            history.sort(Comparator.comparing(HistoryItem::dateSafe).reversed());
            return history;
        }
    }

    public List<EvolutionItem> getEvolution(int userId) {
        try (EntityManager em = databaseManager.createEntityManager()) {
            List<SpecificScore> specificScores = em.createQuery(
                "select s from SpecificScore s where s.userId = :userId order by s.passedAt asc", SpecificScore.class)
                .setParameter("userId", userId)
                .getResultList();

            List<EvolutionItem> evolution = new ArrayList<>();
            SpecificScore previous = null;

            for (SpecificScore score : specificScores) {
                int diff = 0;
                String trend = "stable";
                if (previous != null) {
                    diff = score.getPercentage() - previous.getPercentage();
                    if (diff > 0) {
                        trend = "amélioration";
                    } else if (diff < 0) {
                        trend = "aggravation";
                    }
                }

                evolution.add(new EvolutionItem(
                    score.getWeekNumber(),
                    score.getCategory(),
                    score.getLevel(),
                    score.getPercentage(),
                    score.getPassedAt(),
                    diff,
                    trend
                ));
                previous = score;
            }

            return evolution;
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

    public record HistoryItem(String type, String title, Integer score, Integer percentage, String category, String level, LocalDateTime date) {
        public LocalDateTime dateSafe() {
            return date == null ? LocalDateTime.MIN : date;
        }
    }

    public record EvolutionItem(Integer week, String category, String level, Integer percentage, LocalDateTime date, Integer difference, String trend) {}
}
