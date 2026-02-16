package com.gestion_test.utils;

import com.gestion_test.entities.GeneralTest.GeneralQuestion;
import com.gestion_test.entities.GeneralTest.GeneralAnswer;
import java.util.ArrayList;
import java.util.List;

/**
 * Données pré-remplies pour les questions sur le stress et mood
 * Contient 10 questions standard pour les tests généraux
 */
public class GeneralTestData {

    /**
     * ✅ Créer les 10 questions de base sur le stress et mood
     */
    public static List<GeneralQuestion> getDefaultQuestions() {
        List<GeneralQuestion> questions = new ArrayList<>();

        // ===== QUESTION 1 : Stress général =====
        questions.add(createQuestion(1,
                "Comment décrivez-vous votre niveau de stress actuel ?",
                new String[]{
                        "Pas du tout stressé",
                        "Légèrement stressé",
                        "Modérément stressé",
                        "Très stressé",
                        "Extrêmement stressé"
                },
                new int[]{0, 25, 50, 75, 100}
        ));

        // ===== QUESTION 2 : Mood général =====
        questions.add(createQuestion(2,
                "Comment vous sentez-vous émotionnellement en ce moment ?",
                new String[]{
                        "Très bien",
                        "Bien",
                        "Neutre",
                        "Pas bien",
                        "Très mal"
                },
                new int[]{100, 75, 50, 25, 0}
        ));

        // ===== QUESTION 3 : Qualité du sommeil =====
        questions.add(createQuestion(3,
                "Comment est votre qualité de sommeil dernièrement ?",
                new String[]{
                        "Excellente",
                        "Bonne",
                        "Correcte",
                        "Mauvaise",
                        "Très mauvaise"
                },
                new int[]{100, 75, 50, 25, 0}
        ));

        // ===== QUESTION 4 : Capacité de concentration =====
        questions.add(createQuestion(4,
                "Avez-vous des difficultés à vous concentrer ?",
                new String[]{
                        "Aucune difficulté",
                        "Peu de difficultés",
                        "Difficultés modérées",
                        "Grandes difficultés",
                        "Impossibilité de se concentrer"
                },
                new int[]{0, 25, 50, 75, 100}
        ));

        // ===== QUESTION 5 : Irritabilité =====
        questions.add(createQuestion(5,
                "À quelle fréquence vous sentez-vous irritable ?",
                new String[]{
                        "Jamais",
                        "Rarement",
                        "Parfois",
                        "Souvent",
                        "Très souvent"
                },
                new int[]{0, 25, 50, 75, 100}
        ));

        // ===== QUESTION 6 : Anxiété =====
        questions.add(createQuestion(6,
                "Ressentez-vous de l'anxiété ?",
                new String[]{
                        "Jamais",
                        "Rarement",
                        "Parfois",
                        "Souvent",
                        "Constamment"
                },
                new int[]{0, 25, 50, 75, 100}
        ));

        // ===== QUESTION 7 : Niveau d'énergie =====
        questions.add(createQuestion(7,
                "Quel est votre niveau d'énergie actuel ?",
                new String[]{
                        "Très élevé",
                        "Élevé",
                        "Normal",
                        "Faible",
                        "Très faible"
                },
                new int[]{100, 75, 50, 25, 0}
        ));

        // ===== QUESTION 8 : Motivation =====
        questions.add(createQuestion(8,
                "Comment est votre motivation pour accomplir vos tâches ?",
                new String[]{
                        "Très motivé",
                        "Motivé",
                        "Neutre",
                        "Peu motivé",
                        "Pas motivé du tout"
                },
                new int[]{100, 75, 50, 25, 0}
        ));

        // ===== QUESTION 9 : Relations sociales =====
        questions.add(createQuestion(9,
                "Comment vous entendez-vous avec les autres ?",
                new String[]{
                        "Très bien",
                        "Bien",
                        "Acceptable",
                        "Mal",
                        "Très mal"
                },
                new int[]{100, 75, 50, 25, 0}
        ));

        // ===== QUESTION 10 : Bien-être global =====
        questions.add(createQuestion(10,
                "Comment évaluez-vous votre bien-être global ?",
                new String[]{
                        "Excellent",
                        "Bon",
                        "Satisfaisant",
                        "Insatisfaisant",
                        "Mauvais"
                },
                new int[]{100, 75, 50, 25, 0}
        ));

        return questions;
    }

    /**
     * ✅ Créer une question avec ses réponses
     *
     * @param order Ordre de la question (1, 2, 3, ...)
     * @param questionText Texte de la question
     * @param answerTexts Tableau des textes de réponses
     * @param scores Tableau des scores correspondants (0-100)
     * @return GeneralQuestion avec toutes ses réponses
     */
    private static GeneralQuestion createQuestion(int order, String questionText, String[] answerTexts, int[] scores) {
        // Créer la question
        GeneralQuestion question = new GeneralQuestion(questionText, order);

        // Créer les réponses
        List<GeneralAnswer> answers = new ArrayList<>();
        for (int i = 0; i < answerTexts.length; i++) {
            GeneralAnswer answer = new GeneralAnswer(
                    answerTexts[i],  // Texte de la réponse
                    scores[i],       // Score (0-100)
                    i + 1            // Ordre (1, 2, 3, ...)
            );
            answers.add(answer);
        }

        // Ajouter les réponses à la question
        question.setAnswers(answers);
        return question;
    }

    /**
     * ✅ Vérifier si une liste de questions a au moins 10 questions
     *
     * @param questions Liste des questions
     * @return true si >= 10 questions, false sinon
     */
    public static boolean hasMinimumQuestions(List<GeneralQuestion> questions) {
        return questions != null && questions.size() >= 10;
    }

    /**
     * ✅ Obtenir le nombre minimum de questions requises
     *
     * @return 10 (nombre minimum obligatoire)
     */
    public static int getMinimumQuestionsRequired() {
        return 10;
    }

    /**
     * ✅ Message d'erreur pour nombre de questions insuffisant
     *
     * @param current Nombre de questions actuellement
     * @return Message d'erreur formaté
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
     *
     * @return Message de confirmation
     */
    public static String getLoadStandardQuestionsMessage() {
        return "Cela ajoutera 10 questions standard sur le stress et mood.\n\n" +
                "Les questions existantes seront conservées.";
    }

    /**
     * ✅ Obtenir les catégories de questions
     *
     * @return Catégories des questions du test
     */
    public static String getQuestionsCategories() {
        return "📊 Catégories des questions:\n" +
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
     * ✅ Valider les questions pour un test
     * Vérifie que chaque question a au moins une réponse
     *
     * @param questions Liste des questions à valider
     * @return Liste des erreurs (vide si valide)
     */
    public static List<String> validateQuestions(List<GeneralQuestion> questions) {
        List<String> errors = new ArrayList<>();

        if (!hasMinimumQuestions(questions)) {
            errors.add("Minimum " + getMinimumQuestionsRequired() + " questions obligatoires");
            return errors;
        }

        for (int i = 0; i < questions.size(); i++) {
            GeneralQuestion q = questions.get(i);

            if (q.getAnswers() == null || q.getAnswers().isEmpty()) {
                errors.add("Question " + (i + 1) + ": doit avoir au minimum une réponse");
            } else if (q.getAnswers().size() > 10) {
                errors.add("Question " + (i + 1) + ": ne peut pas avoir plus de 10 réponses");
            }

            for (GeneralAnswer a : q.getAnswers()) {
                if (!ValidationUtils.isInRange(a.getScore(), 0, 100)) {
                    errors.add("Question " + (i + 1) + ": score invalide (doit être 0-100)");
                    break;
                }
            }
        }

        return errors;
    }

    /**
     * ✅ Obtenir des statistiques sur les questions
     *
     * @param questions Liste des questions
     * @return Statistiques formatées
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
                "📊 Statistiques:\n" +
                        "• Nombre de questions: %d\n" +
                        "• Nombre total de réponses: %d\n" +
                        "• Réponses par question: Min=%d, Max=%d, Moy=%.1f",
                questions.size(),
                totalAnswers,
                minAnswers,
                maxAnswers,
                (double) totalAnswers / questions.size()
        );
    }

    /**
     * ✅ Cloner les questions standards (utile pour copier un test)
     *
     * @return Copie des 10 questions standards
     */
    public static List<GeneralQuestion> cloneDefaultQuestions() {
        return new ArrayList<>(getDefaultQuestions());
    }

    /**
     * ✅ Obtenir une question standard par son index (1-10)
     *
     * @param index Index de la question (1-10)
     * @return GeneralQuestion ou null si index invalide
     */
    public static GeneralQuestion getDefaultQuestion(int index) {
        if (index < 1 || index > 10) {
            return null;
        }
        List<GeneralQuestion> questions = getDefaultQuestions();
        return questions.get(index - 1);
    }
}