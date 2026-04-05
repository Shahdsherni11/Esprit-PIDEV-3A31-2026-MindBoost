package com.gestion_test.utils;

import com.gestion_test.entities.GeneralTest.GeneralQuestion;
import com.gestion_test.entities.GeneralTest.GeneralAnswer;
import java.util.ArrayList;
import java.util.List;

/**
 * ✅ Données pré-remplies pour les questions sur le stress et mood
 * Contient 10 questions standard pour les tests généraux QCM
 * IMPORTANT: Chaque question = 4 réponses (A, B, C, D) avec scores (100, 75, 50, 25)
 */
public class GeneralTestData {

    /**
     * ✅ Créer les 10 questions de base sur le stress et mood (FORMAT QCM: 4 OPTIONS)
     */
    public static List<GeneralQuestion> getDefaultQuestions() {
        List<GeneralQuestion> questions = new ArrayList<>();

        // ===== QUESTION 1 : Stress général =====
        questions.add(createQuestion(1,
                "Comment décrivez-vous votre niveau de stress actuel ?",
                new String[]{"Pas du tout stressé", "Légèrement stressé", "Modérément stressé", "Très stressé"},
                new int[]{100, 75, 50, 25}
        ));

        // ===== QUESTION 2 : Mood général =====
        questions.add(createQuestion(2,
                "Comment vous sentez-vous émotionnellement en ce moment ?",
                new String[]{"Très bien", "Bien", "Neutre", "Pas bien"},
                new int[]{100, 75, 50, 25}
        ));

        // ===== QUESTION 3 : Qualité du sommeil =====
        questions.add(createQuestion(3,
                "Comment est votre qualité de sommeil dernièrement ?",
                new String[]{"Excellente", "Bonne", "Correcte", "Mauvaise"},
                new int[]{100, 75, 50, 25}
        ));

        // ===== QUESTION 4 : Capacité de concentration =====
        questions.add(createQuestion(4,
                "Avez-vous des difficultés à vous concentrer ?",
                new String[]{"Aucune difficulté", "Peu de difficultés", "Difficultés modérées", "Grandes difficultés"},
                new int[]{100, 75, 50, 25}
        ));

        // ===== QUESTION 5 : Irritabilité =====
        questions.add(createQuestion(5,
                "À quelle fréquence vous sentez-vous irritable ?",
                new String[]{"Jamais", "Rarement", "Parfois", "Souvent"},
                new int[]{100, 75, 50, 25}
        ));

        // ===== QUESTION 6 : Anxiété =====
        questions.add(createQuestion(6,
                "Ressentez-vous de l'anxiété ?",
                new String[]{"Jamais", "Rarement", "Parfois", "Souvent"},
                new int[]{100, 75, 50, 25}
        ));

        // ===== QUESTION 7 : Niveau d'énergie =====
        questions.add(createQuestion(7,
                "Quel est votre niveau d'énergie actuel ?",
                new String[]{"Très élevé", "Élevé", "Normal", "Faible"},
                new int[]{100, 75, 50, 25}
        ));

        // ===== QUESTION 8 : Motivation =====
        questions.add(createQuestion(8,
                "Comment est votre motivation pour accomplir vos tâches ?",
                new String[]{"Très motivé", "Motivé", "Neutre", "Peu motivé"},
                new int[]{100, 75, 50, 25}
        ));

        // ===== QUESTION 9 : Relations sociales =====
        questions.add(createQuestion(9,
                "Comment vous entendez-vous avec les autres ?",
                new String[]{"Très bien", "Bien", "Acceptable", "Mal"},
                new int[]{100, 75, 50, 25}
        ));

        // ===== QUESTION 10 : Bien-être global =====
        questions.add(createQuestion(10,
                "Comment évaluez-vous votre bien-être global ?",
                new String[]{"Excellent", "Bon", "Satisfaisant", "Insatisfaisant"},
                new int[]{100, 75, 50, 25}
        ));

        return questions;
    }

    /**
     * ✅ Créer une question avec ses 4 réponses QCM
     *
     * @param order Ordre de la question (1-10)
     * @param questionText Texte de la question
     * @param answerTexts Tableau des 4 textes de réponses (A, B, C, D)
     * @param scores Tableau des 4 scores [100, 75, 50, 25]
     * @return GeneralQuestion avec 4 réponses
     */
    private static GeneralQuestion createQuestion(int order, String questionText, String[] answerTexts, int[] scores) {
        if (answerTexts.length != 4 || scores.length != 4) {
            throw new IllegalArgumentException("❌ Chaque question QCM doit avoir exactement 4 réponses (A, B, C, D)");
        }

        GeneralQuestion question = new GeneralQuestion(questionText, order);

        List<GeneralAnswer> answers = new ArrayList<>();
        String[] labels = {"A", "B", "C", "D"};

        for (int i = 0; i < 4; i++) {
            GeneralAnswer answer = new GeneralAnswer(
                    answerTexts[i],  // Texte de la réponse
                    labels[i],       // Label (A, B, C, D)
                    scores[i],       // Score (100, 75, 50, 25)
                    i + 1            // Ordre (1, 2, 3, 4)
            );
            answers.add(answer);
        }

        question.setAnswers(answers);
        return question;
    }

    /**
     * ✅ Vérifier si une liste de questions a au moins 10 questions
     */
    public static boolean hasMinimumQuestions(List<GeneralQuestion> questions) {
        return questions != null && questions.size() >= 10;
    }

    /**
     * ✅ Obtenir le nombre minimum de questions requises
     */
    public static int getMinimumQuestionsRequired() {
        return 10;
    }

    /**
     * ✅ Message d'erreur pour nombre de questions insuffisant
     */
    public static String getMinimumQuestionsMessage(int current) {
        int needed = getMinimumQuestionsRequired() - current;
        return "❌ Nombre de questions insuffisant!\n\n" +
                "Ce test doit avoir au minimum " + getMinimumQuestionsRequired() + " questions.\n\n" +
                "Actuellement: " + current + " question(s)\n" +
                "Manquant: " + (needed > 0 ? needed : 0) + " question(s)";
    }

    /**
     * ✅ Message pour confirmer le chargement des questions standards
     */
    public static String getLoadStandardQuestionsMessage() {
        return "Cela ajoutera 10 questions standard sur le stress et mood.\n\n" +
                "Format QCM: 4 options par question (A, B, C, D)\n\n" +
                "Les questions existantes seront conservées.";
    }

    /**
     * ✅ Obtenir les catégories de questions
     */
    public static String getQuestionsCategories() {
        return "📊 Catégories des questions (TEST GÉNÉRAL QCM):\n" +
                "• Stress général\n" +
                "• Mood/Humeur\n" +
                "• Sommeil\n" +
                "• Concentration\n" +
                "• Irritabilité\n" +
                "• Anxiété\n" +
                "• Énergie\n" +
                "• Motivation\n" +
                "• Relations sociales\n" +
                "• Bien-être global";
    }

    /**
     * ✅ Valider les questions pour un test général
     */
    public static List<String> validateQuestions(List<GeneralQuestion> questions) {
        List<String> errors = new ArrayList<>();

        if (!hasMinimumQuestions(questions)) {
            errors.add("Minimum " + getMinimumQuestionsRequired() + " questions obligatoires");
            return errors;
        }

        for (int i = 0; i < questions.size(); i++) {
            GeneralQuestion q = questions.get(i);

            // ✅ IMPORTANT: Vérifier exactement 4 réponses
            if (q.getAnswers() == null || q.getAnswers().size() != 4) {
                errors.add("Question " + (i + 1) + ": doit avoir exactement 4 réponses (A, B, C, D)");
            }

            if (q.getAnswers() != null) {
                for (GeneralAnswer a : q.getAnswers()) {
                    if (!ValidationUtils.isInRange(a.getScore(), 0, 100)) {
                        errors.add("Question " + (i + 1) + ": score invalide (doit être 0-100)");
                        break;
                    }
                }
            }
        }

        return errors;
    }

    /**
     * ✅ Obtenir des statistiques sur les questions
     */
    public static String getQuestionsStats(List<GeneralQuestion> questions) {
        if (questions == null || questions.isEmpty()) {
            return "Aucune question";
        }

        int totalAnswers = 0;
        int maxAnswers = 0;
        int minAnswers = Integer.MAX_VALUE;

        for (GeneralQuestion q : questions) {
            int answerCount = q.getAnswers() != null ? q.getAnswers().size() : 0;
            totalAnswers += answerCount;
            maxAnswers = Math.max(maxAnswers, answerCount);
            minAnswers = Math.min(minAnswers, answerCount);
        }

        return String.format(
                "📊 Statistiques (TEST GÉNÉRAL):\n" +
                        "• Nombre de questions: %d\n" +
                        "• Format: QCM (4 options par question)\n" +
                        "• Réponses par question: Min=%d, Max=%d, Moy=%.1f",
                questions.size(),
                minAnswers,
                maxAnswers,
                (double) totalAnswers / questions.size()
        );
    }

    /**
     * ✅ Cloner les questions standards
     */
    public static List<GeneralQuestion> cloneDefaultQuestions() {
        return new ArrayList<>(getDefaultQuestions());
    }

    /**
     * ✅ Obtenir une question standard par son index (1-10)
     */
    public static GeneralQuestion getDefaultQuestion(int index) {
        if (index < 1 || index > 10) {
            return null;
        }
        List<GeneralQuestion> questions = getDefaultQuestions();
        return questions.get(index - 1);
    }
}