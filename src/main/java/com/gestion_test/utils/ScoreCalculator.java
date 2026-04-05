package com.gestion_test.utils;

import com.gestion_test.entities.GeneralTest;
import com.gestion_test.entities.GeneralTest.GeneralQuestion;
import com.gestion_test.entities.GeneralTest.GeneralAnswer;

import java.util.Map;

public class ScoreCalculator {

    /**
     * ✅ Énumération des catégories de scores
     */
    public enum Category {
        TRES_BAS("Très Bas", "0-20"),
        BAS("Bas", "21-40"),
        MOYEN("Moyen", "41-60"),
        ELEVE("Élevé", "61-80"),
        TRES_ELEVE("Très Élevé", "81-100");

        private final String label;
        private final String range;

        Category(String label, String range) {
            this.label = label;
            this.range = range;
        }

        public String getLabel() {
            return label;
        }

        public String getRange() {
            return range;
        }
    }

    /**
     * ✅ Calculer le score moyen du test QCM
     * Score = (Somme des scores des réponses) / Nombre de questions
     */
    public static int calculateScore(GeneralTest test, Map<Integer, Integer> selectedAnswers) {
        int totalScore = 0;
        int answeredQuestions = 0;

        if (test.getQuestions() == null || test.getQuestions().isEmpty()) {
            return 0;
        }

        for (GeneralQuestion question : test.getQuestions()) {
            Integer selectedAnswerId = selectedAnswers.get(question.getId());

            if (selectedAnswerId != null && question.getAnswers() != null) {
                for (GeneralAnswer answer : question.getAnswers()) {
                    if (answer.getId() == selectedAnswerId) {
                        totalScore += answer.getScore();
                        answeredQuestions++;
                        break;
                    }
                }
            }
        }

        // Calculer la moyenne
        if (answeredQuestions == 0) {
            return 0;
        }

        return (totalScore / answeredQuestions);
    }

    /**
     * ✅ Classifier le score dans une catégorie
     */
    public static Category classifyScore(int score) {
        if (score >= 0 && score <= 20) {
            return Category.TRES_BAS;
        } else if (score >= 21 && score <= 40) {
            return Category.BAS;
        } else if (score >= 41 && score <= 60) {
            return Category.MOYEN;
        } else if (score >= 61 && score <= 80) {
            return Category.ELEVE;
        } else {
            return Category.TRES_ELEVE;
        }
    }

    /**
     * ✅ Générer un rapport avec interprétation
     */
    public static String generateReport(int score, Category category, GeneralTest test) {
        StringBuilder report = new StringBuilder();

        report.append("📊 RÉSULTAT DU TEST QCM\n");
        report.append("════════════════════════════════════════\n\n");

        report.append("Test: ").append(test.getTitle()).append("\n");
        report.append("Score obtenu: ").append(score).append("/100\n");
        report.append("Catégorie: ").append(category.getLabel()).append(" (").append(category.getRange()).append(")\n\n");

        report.append("════════════════════════════════════════\n");
        report.append("📝 INTERPRÉTATION\n");
        report.append("════════════════════════════════════════\n\n");

        switch (category) {
            case TRES_BAS:
                report.append("❌ Score très bas (0-20)\n\n");
                report.append("Votre score indique un niveau très faible.\n");
                report.append("Nous vous recommandons vivement de consulter un professionnel.\n");
                break;

            case BAS:
                report.append("⚠️ Score bas (21-40)\n\n");
                report.append("Votre score est inférieur à la moyenne.\n");
                report.append("Veuillez considérer une consultation professionnelle.\n");
                break;

            case MOYEN:
                report.append("ℹ️ Score moyen (41-60)\n\n");
                report.append("Votre score se situe dans la moyenne.\n");
                report.append("Continuez à surveiller votre bien-être et vos symptômes.\n");
                break;

            case ELEVE:
                report.append("✅ Score élevé (61-80)\n\n");
                report.append("Votre score est bon.\n");
                report.append("Maintenez vos bonnes habitudes et votre bien-être.\n");
                break;

            case TRES_ELEVE:
                report.append("🎉 Score très élevé (81-100)\n\n");
                report.append("Excellent résultat!\n");
                report.append("Vous maintenez un excellent niveau de bien-être et de santé mentale.\n");
                break;
        }

        report.append("\n════════════════════════════════════════\n");
        report.append("✅ Merci d'avoir complété ce test QCM.\n");

        return report.toString();
    }

    /**
     * ✅ Obtenir une description textuelle du score
     */
    public static String getScoreDescription(int score) {
        Category category = classifyScore(score);
        return category.getLabel() + " (" + category.getRange() + ")";
    }
}