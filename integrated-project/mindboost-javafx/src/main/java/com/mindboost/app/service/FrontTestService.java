package com.mindboost.app.service;

public class FrontTestService {
    public String determineCategory(int score) {
        if (score <= 10) {
            return "Stress";
        }
        if (score <= 20) {
            return "Anxiete";
        }
        if (score <= 30) {
            return "Depression";
        }
        return "Trouble du Sommeil";
    }

    public String determineLevel(int percentage) {
        if (percentage < 34) {
            return "Faible";
        }
        if (percentage < 67) {
            return "Moyen";
        }
        return "Élevé";
    }

    public int calculatePercentage(int score, int maxScore) {
        if (maxScore <= 0) {
            return 0;
        }
        return (int) Math.round((score / (double) maxScore) * 100);
    }
}
