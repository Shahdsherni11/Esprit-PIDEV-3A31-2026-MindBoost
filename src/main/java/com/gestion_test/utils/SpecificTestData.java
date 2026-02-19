package com.gestion_test.utils;

import com.gestion_test.entities.SpecificTest.SpecificQuestion;
import com.gestion_test.entities.SpecificTest.SpecificAnswer;
import java.util.ArrayList;
import java.util.List;

/**
 * ✅ Questions standards pour les tests spécifiques
 * 13 questions par catégorie SANS SCORES (contrairement aux tests généraux)
 * Catégories: Anxiété, Dépression, Stress, Trouble du Sommeil
 */
public class SpecificTestData {

    /**
     * ✅ Obtenir 13 questions pour ANXIÉTÉ
     */
    public static List<SpecificQuestion> getAnxietyQuestions() {
        List<SpecificQuestion> questions = new ArrayList<>();
        String[][] data = {
                {"Avez-vous des crises de panique ?", "Jamais|Rarement|Parfois|Souvent|Très souvent"},
                {"Vous sentez-vous nerveux sans raison ?", "Jamais|Rarement|Parfois|Souvent|Très souvent"},
                {"Difficultés à vous détendre ?", "Jamais|Rarement|Parfois|Souvent|Très souvent"},
                {"Craignez-vous ce qui pourrait arriver ?", "Jamais|Rarement|Parfois|Souvent|Très souvent"},
                {"Avez-vous des palpitations cardiaques ?", "Jamais|Rarement|Parfois|Souvent|Très souvent"},
                {"Vous évitez certaines situations par peur ?", "Jamais|Rarement|Parfois|Souvent|Très souvent"},
                {"Sueurs froides ou chaudes ?", "Jamais|Rarement|Parfois|Souvent|Très souvent"},
                {"Vous sentez-vous tendu physiquement ?", "Jamais|Rarement|Parfois|Souvent|Très souvent"},
                {"Pensées négatives récurrentes ?", "Jamais|Rarement|Parfois|Souvent|Très souvent"},
                {"Difficultés à vous concentrer par anxiété ?", "Jamais|Rarement|Parfois|Souvent|Très souvent"},
                {"Vous réveillez-vous la nuit par l'anxiété ?", "Jamais|Rarement|Parfois|Souvent|Très souvent"},
                {"Maux de tête liés au stress ?", "Jamais|Rarement|Parfois|Souvent|Très souvent"},
                {"Vous inquiétez-vous excessivement des détails ?", "Jamais|Rarement|Parfois|Souvent|Très souvent"}
        };

        for (int i = 0; i < data.length; i++) {
            questions.add(createQuestion(i + 1, data[i][0], data[i][1].split("\\|")));
        }
        return questions;
    }

    /**
     * ✅ Obtenir 13 questions pour DÉPRESSION
     */
    public static List<SpecificQuestion> getDepressionQuestions() {
        List<SpecificQuestion> questions = new ArrayList<>();
        String[][] data = {
                {"Vous sentez-vous triste ou vide ?", "Jamais|Rarement|Parfois|Souvent|Très souvent"},
                {"Perdu intérêt dans les activités ?", "Jamais|Rarement|Parfois|Souvent|Très souvent"},
                {"Pensées suicidaires ?", "Jamais|Rarement|Parfois|Souvent|Très souvent"},
                {"Vous sentez-vous sans espoir ?", "Jamais|Rarement|Parfois|Souvent|Très souvent"},
                {"Changements d'appétit ?", "Jamais|Rarement|Parfois|Souvent|Très souvent"},
                {"Vous sentez-vous fatigué ?", "Jamais|Rarement|Parfois|Souvent|Très souvent"},
                {"Difficultés à prendre des décisions ?", "Jamais|Rarement|Parfois|Souvent|Très souvent"},
                {"Vous sentez-vous inutile ?", "Jamais|Rarement|Parfois|Souvent|Très souvent"},
                {"Pensées de mort ?", "Jamais|Rarement|Parfois|Souvent|Très souvent"},
                {"Vous isolez-vous des autres ?", "Jamais|Rarement|Parfois|Souvent|Très souvent"},
                {"Difficultés de concentration ?", "Jamais|Rarement|Parfois|Souvent|Très souvent"},
                {"Vous sentez-vous émotionnellement engourdi ?", "Jamais|Rarement|Parfois|Souvent|Très souvent"},
                {"Vision sombre de l'avenir ?", "Jamais|Rarement|Parfois|Souvent|Très souvent"}
        };

        for (int i = 0; i < data.length; i++) {
            questions.add(createQuestion(i + 1, data[i][0], data[i][1].split("\\|")));
        }
        return questions;
    }

    /**
     * ✅ Obtenir 13 questions pour STRESS
     */
    public static List<SpecificQuestion> getStressQuestions() {
        List<SpecificQuestion> questions = new ArrayList<>();
        String[][] data = {
                {"Submergé par le travail ?", "Jamais|Rarement|Parfois|Souvent|Très souvent"},
                {"Délais serrés qui vous stressent ?", "Jamais|Rarement|Parfois|Souvent|Très souvent"},
                {"Incapable de gérer vos responsabilités ?", "Jamais|Rarement|Parfois|Souvent|Très souvent"},
                {"Conflits au travail ou à l'école ?", "Jamais|Rarement|Parfois|Souvent|Très souvent"},
                {"Vous sentez-vous pressé par le temps ?", "Jamais|Rarement|Parfois|Souvent|Très souvent"},
                {"Difficultés à équilibrer vie pro/perso ?", "Jamais|Rarement|Parfois|Souvent|Très souvent"},
                {"Vous sentez-vous impuissant ?", "Jamais|Rarement|Parfois|Souvent|Très souvent"},
                {"Pensées négatives sur votre travail ?", "Jamais|Rarement|Parfois|Souvent|Très souvent"},
                {"Vous sentez-vous épuisé ?", "Jamais|Rarement|Parfois|Souvent|Très souvent"},
                {"Difficultés à vous déconnecter ?", "Jamais|Rarement|Parfois|Souvent|Très souvent"},
                {"Vous sentez-vous frustré ?", "Jamais|Rarement|Parfois|Souvent|Très souvent"},
                {"Conflits relationnels dus au stress ?", "Jamais|Rarement|Parfois|Souvent|Très souvent"},
                {"Vous doutez-vous de vos compétences ?", "Jamais|Rarement|Parfois|Souvent|Très souvent"}
        };

        for (int i = 0; i < data.length; i++) {
            questions.add(createQuestion(i + 1, data[i][0], data[i][1].split("\\|")));
        }
        return questions;
    }

    /**
     * ✅ Obtenir 13 questions pour TROUBLE DU SOMMEIL
     */
    public static List<SpecificQuestion> getSleepDisorderQuestions() {
        List<SpecificQuestion> questions = new ArrayList<>();
        String[][] data = {
                {"Difficultés à vous endormir ?", "Jamais|Rarement|Parfois|Souvent|Très souvent"},
                {"Vous réveillez-vous la nuit plusieurs fois ?", "Jamais|Rarement|Parfois|Souvent|Très souvent"},
                {"Mal à vous rendormir après le réveil ?", "Jamais|Rarement|Parfois|Souvent|Très souvent"},
                {"Vous vous réveillez trop tôt ?", "Jamais|Rarement|Parfois|Souvent|Très souvent"},
                {"Votre sommeil vous laisse-t-il reposé ?", "Toujours|Souvent|Parfois|Rarement|Jamais"},
                {"Cauchemars fréquents ?", "Jamais|Rarement|Parfois|Souvent|Très souvent"},
                {"Vous vous couchez à des heures irrégulières ?", "Jamais|Rarement|Parfois|Souvent|Très souvent"},
                {"Pensées anxieuses avant de dormir ?", "Jamais|Rarement|Parfois|Souvent|Très souvent"},
                {"Consultez votre téléphone avant de dormir ?", "Jamais|Rarement|Parfois|Souvent|Très souvent"},
                {"Difficultés à vous lever le matin ?", "Jamais|Rarement|Parfois|Souvent|Très souvent"},
                {"Vous dormez trop ou trop peu ?", "Jamais|Rarement|Parfois|Souvent|Très souvent"},
                {"Apnées du sommeil ?", "Jamais|Rarement|Parfois|Souvent|Très souvent"},
                {"Vous ronflez pendant votre sommeil ?", "Jamais|Rarement|Parfois|Souvent|Très souvent"}
        };

        for (int i = 0; i < data.length; i++) {
            questions.add(createQuestion(i + 1, data[i][0], data[i][1].split("\\|")));
        }
        return questions;
    }

    /**
     * ✅ Obtenir les questions selon la catégorie
     */
    public static List<SpecificQuestion> getQuestionsByCategory(String category) {
        return switch (category.toLowerCase()) {
            case "anxiété" -> getAnxietyQuestions();
            case "dépression" -> getDepressionQuestions();
            case "stress" -> getStressQuestions();
            case "trouble du sommeil" -> getSleepDisorderQuestions();
            default -> new ArrayList<>();
        };
    }

    /**
     * ✅ Créer une question avec ses réponses (SANS SCORES)
     */
    private static SpecificQuestion createQuestion(int order, String questionText, String[] answerTexts) {
        SpecificQuestion question = new SpecificQuestion(questionText, order);
        List<SpecificAnswer> answers = new ArrayList<>();

        for (int i = 0; i < answerTexts.length; i++) {
            answers.add(new SpecificAnswer(
                    answerTexts[i],  // Texte de la réponse
                    i + 1            // Ordre (1, 2, 3, 4, 5)
            ));
        }

        question.setAnswers(answers);
        return question;
    }

    /**
     * ✅ Vérifier minimum 13 questions
     */
    public static boolean hasMinimumQuestions(List<SpecificQuestion> questions) {
        return questions != null && questions.size() >= 13;
    }

    /**
     * ✅ Message d'erreur
     */
    public static String getMinimumQuestionsMessage(int current) {
        int needed = 13 - current;
        return "❌ Nombre de questions insuffisant!\n\n" +
                "Minimum 13 questions obligatoires (TEST SPÉCIFIQUE).\n\n" +
                "Actuellement: " + current + " question(s)\n" +
                "Manquant: " + (needed > 0 ? needed : 0) + " question(s)";
    }

    /**
     * ✅ Obtenir les statistiques d'un test spécifique
     */
    public static String getQuestionsStats(List<SpecificQuestion> questions) {
        if (questions == null || questions.isEmpty()) {
            return "❌ Aucune question";
        }

        int totalAnswers = 0;
        int maxAnswers = 0;
        int minAnswers = Integer.MAX_VALUE;

        for (SpecificQuestion q : questions) {
            int answerCount = q.getAnswers() != null ? q.getAnswers().size() : 0;
            totalAnswers += answerCount;
            maxAnswers = Math.max(maxAnswers, answerCount);
            minAnswers = Math.min(minAnswers, answerCount);
        }

        return String.format(
                "📊 Statistiques (TEST SPÉCIFIQUE):\n" +
                        "• Nombre de questions: %d\n" +
                        "• Format: SANS SCORES (reponses simples)\n" +
                        "• Réponses par question: Min=%d, Max=%d, Moy=%.1f",
                questions.size(),
                minAnswers,
                maxAnswers,
                (double) totalAnswers / questions.size()
        );
    }

    /**
     * ✅ Obtenir toutes les catégories
     */
    public static List<String> getAllCategories() {
        List<String> categories = new ArrayList<>();
        categories.add("Anxiété");
        categories.add("Dépression");
        categories.add("Stress");
        categories.add("Trouble du Sommeil");
        return categories;
    }

    /**
     * ✅ Obtenir les catégories comme texte
     */
    public static String getCategoriesAsText() {
        return "📊 Catégories disponibles (TESTS SPÉCIFIQUES):\n" +
                "• Anxiété (13 questions)\n" +
                "• Dépression (13 questions)\n" +
                "• Stress (13 questions)\n" +
                "• Trouble du Sommeil (13 questions)";
    }
}