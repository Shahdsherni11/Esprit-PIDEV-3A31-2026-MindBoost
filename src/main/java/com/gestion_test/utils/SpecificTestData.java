package com.gestion_test.utils;

import com.gestion_test.entities.SpecificTest.SpecificQuestion;
import com.gestion_test.entities.SpecificTest.SpecificAnswer;
import java.util.ArrayList;
import java.util.List;

/**
 * Questions standards pour les tests spécifiques
 */
public class SpecificTestData {

    /**
     * ✅ Obtenir 13 questions pour ANXIÉTÉ
     */
    public static List<SpecificQuestion> getAnxietyQuestions() {
        List<SpecificQuestion> questions = new ArrayList<>();
        String[][] data = {
                {"Avez-vous des crises de panique ?", "Jamais|Rarement|Parfois|Souvent|Très souvent", "0|20|40|60|80"},
                {"Vous sentez-vous nerveux sans raison ?", "Jamais|Rarement|Parfois|Souvent|Très souvent", "0|20|40|60|80"},
                {"Difficultés à vous détendre ?", "Jamais|Rarement|Parfois|Souvent|Très souvent", "0|20|40|60|80"},
                {"Craignez-vous ce qui pourrait arriver ?", "Jamais|Rarement|Parfois|Souvent|Très souvent", "0|20|40|60|80"},
                {"Avez-vous des palpitations cardiaques ?", "Jamais|Rarement|Parfois|Souvent|Très souvent", "0|20|40|60|80"},
                {"Vous évitez certaines situations par peur ?", "Jamais|Rarement|Parfois|Souvent|Très souvent", "0|20|40|60|80"},
                {"Sueurs froides ou chaudes ?", "Jamais|Rarement|Parfois|Souvent|Très souvent", "0|20|40|60|80"},
                {"Vous sentez-vous tendu physiquement ?", "Jamais|Rarement|Parfois|Souvent|Très souvent", "0|20|40|60|80"},
                {"Pensées négatives récurrentes ?", "Jamais|Rarement|Parfois|Souvent|Très souvent", "0|20|40|60|80"},
                {"Difficultés à vous concentrer par anxiété ?", "Jamais|Rarement|Parfois|Souvent|Très souvent", "0|20|40|60|80"},
                {"Vous réveillez-vous la nuit par l'anxiété ?", "Jamais|Rarement|Parfois|Souvent|Très souvent", "0|20|40|60|80"},
                {"Maux de tête liés au stress ?", "Jamais|Rarement|Parfois|Souvent|Très souvent", "0|20|40|60|80"},
                {"Vous inquiétez-vous excessivement des détails ?", "Jamais|Rarement|Parfois|Souvent|Très souvent", "0|20|40|60|80"}
        };

        for (int i = 0; i < data.length; i++) {
            questions.add(createQuestion(i + 1, data[i][0], data[i][1].split("\\|"), parseScores(data[i][2])));
        }
        return questions;
    }

    /**
     * ✅ Obtenir 13 questions pour DÉPRESSION
     */
    public static List<SpecificQuestion> getDepressionQuestions() {
        List<SpecificQuestion> questions = new ArrayList<>();
        String[][] data = {
                {"Vous sentez-vous triste ou vide ?", "Jamais|Rarement|Parfois|Souvent|Très souvent", "0|20|40|60|80"},
                {"Perdu intérêt dans les activités ?", "Jamais|Rarement|Parfois|Souvent|Très souvent", "0|20|40|60|80"},
                {"Pensées suicidaires ?", "Jamais|Rarement|Parfois|Souvent|Très souvent", "0|20|40|60|80"},
                {"Vous sentez-vous sans espoir ?", "Jamais|Rarement|Parfois|Souvent|Très souvent", "0|20|40|60|80"},
                {"Changements d'appétit ?", "Jamais|Rarement|Parfois|Souvent|Très souvent", "0|20|40|60|80"},
                {"Vous sentez-vous fatigué ?", "Jamais|Rarement|Parfois|Souvent|Très souvent", "0|20|40|60|80"},
                {"Difficultés à prendre des décisions ?", "Jamais|Rarement|Parfois|Souvent|Très souvent", "0|20|40|60|80"},
                {"Vous sentez-vous inutile ?", "Jamais|Rarement|Parfois|Souvent|Très souvent", "0|20|40|60|80"},
                {"Pensées de mort ?", "Jamais|Rarement|Parfois|Souvent|Très souvent", "0|20|40|60|80"},
                {"Vous isolez-vous des autres ?", "Jamais|Rarement|Parfois|Souvent|Très souvent", "0|20|40|60|80"},
                {"Difficultés de concentration ?", "Jamais|Rarement|Parfois|Souvent|Très souvent", "0|20|40|60|80"},
                {"Vous sentez-vous émotionnellement engourdi ?", "Jamais|Rarement|Parfois|Souvent|Très souvent", "0|20|40|60|80"},
                {"Vision sombre de l'avenir ?", "Jamais|Rarement|Parfois|Souvent|Très souvent", "0|20|40|60|80"}
        };

        for (int i = 0; i < data.length; i++) {
            questions.add(createQuestion(i + 1, data[i][0], data[i][1].split("\\|"), parseScores(data[i][2])));
        }
        return questions;
    }

    /**
     * ✅ Obtenir 13 questions pour STRESS
     */
    public static List<SpecificQuestion> getStressQuestions() {
        List<SpecificQuestion> questions = new ArrayList<>();
        String[][] data = {
                {"Submergé par le travail ?", "Jamais|Rarement|Parfois|Souvent|Très souvent", "0|20|40|60|80"},
                {"Délais serrés qui vous stressent ?", "Jamais|Rarement|Parfois|Souvent|Très souvent", "0|20|40|60|80"},
                {"Incapable de gérer vos responsabilités ?", "Jamais|Rarement|Parfois|Souvent|Très souvent", "0|20|40|60|80"},
                {"Conflits au travail ou à l'école ?", "Jamais|Rarement|Parfois|Souvent|Très souvent", "0|20|40|60|80"},
                {"Vous sentez-vous pressé par le temps ?", "Jamais|Rarement|Parfois|Souvent|Très souvent", "0|20|40|60|80"},
                {"Difficultés à équilibrer vie pro/perso ?", "Jamais|Rarement|Parfois|Souvent|Très souvent", "0|20|40|60|80"},
                {"Vous sentez-vous impuissant ?", "Jamais|Rarement|Parfois|Souvent|Très souvent", "0|20|40|60|80"},
                {"Pensées négatives sur votre travail ?", "Jamais|Rarement|Parfois|Souvent|Très souvent", "0|20|40|60|80"},
                {"Vous sentez-vous épuisé ?", "Jamais|Rarement|Parfois|Souvent|Très souvent", "0|20|40|60|80"},
                {"Difficultés à vous déconnecter ?", "Jamais|Rarement|Parfois|Souvent|Très souvent", "0|20|40|60|80"},
                {"Vous sentez-vous frustré ?", "Jamais|Rarement|Parfois|Souvent|Très souvent", "0|20|40|60|80"},
                {"Conflits relationnels dus au stress ?", "Jamais|Rarement|Parfois|Souvent|Très souvent", "0|20|40|60|80"},
                {"Vous doutez-vous de vos compétences ?", "Jamais|Rarement|Parfois|Souvent|Très souvent", "0|20|40|60|80"}
        };

        for (int i = 0; i < data.length; i++) {
            questions.add(createQuestion(i + 1, data[i][0], data[i][1].split("\\|"), parseScores(data[i][2])));
        }
        return questions;
    }

    /**
     * ✅ Obtenir 13 questions pour TROUBLE DU SOMMEIL
     */
    public static List<SpecificQuestion> getSleepDisorderQuestions() {
        List<SpecificQuestion> questions = new ArrayList<>();
        String[][] data = {
                {"Difficultés à vous endormir ?", "Jamais|Rarement|Parfois|Souvent|Très souvent", "0|20|40|60|80"},
                {"Vous réveillez-vous la nuit plusieurs fois ?", "Jamais|Rarement|Parfois|Souvent|Très souvent", "0|20|40|60|80"},
                {"Mal à vous rendormir après le réveil ?", "Jamais|Rarement|Parfois|Souvent|Très souvent", "0|20|40|60|80"},
                {"Vous vous réveillez trop tôt ?", "Jamais|Rarement|Parfois|Souvent|Très souvent", "0|20|40|60|80"},
                {"Votre sommeil vous laisse-t-il reposé ?", "Toujours|Souvent|Parfois|Rarement|Jamais", "0|20|40|60|80"},
                {"Cauchemars fréquents ?", "Jamais|Rarement|Parfois|Souvent|Très souvent", "0|20|40|60|80"},
                {"Vous vous couchez à des heures irrégulières ?", "Jamais|Rarement|Parfois|Souvent|Très souvent", "0|20|40|60|80"},
                {"Pensées anxieuses avant de dormir ?", "Jamais|Rarement|Parfois|Souvent|Très souvent", "0|20|40|60|80"},
                {"Consultez votre téléphone avant de dormir ?", "Jamais|Rarement|Parfois|Souvent|Très souvent", "0|20|40|60|80"},
                {"Difficultés à vous lever le matin ?", "Jamais|Rarement|Parfois|Souvent|Très souvent", "0|20|40|60|80"},
                {"Vous dormez trop ou trop peu ?", "Jamais|Rarement|Parfois|Souvent|Très souvent", "0|20|40|60|80"},
                {"Apnées du sommeil ?", "Jamais|Rarement|Parfois|Souvent|Très souvent", "0|20|40|60|80"},
                {"Vous ronflez pendant votre sommeil ?", "Jamais|Rarement|Parfois|Souvent|Très souvent", "0|20|40|60|80"}
        };

        for (int i = 0; i < data.length; i++) {
            questions.add(createQuestion(i + 1, data[i][0], data[i][1].split("\\|"), parseScores(data[i][2])));
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
     * ✅ Créer une question avec ses réponses
     */
    private static SpecificQuestion createQuestion(int order, String questionText, String[] answerTexts, int[] scores) {
        SpecificQuestion question = new SpecificQuestion(questionText, order);
        List<SpecificAnswer> answers = new ArrayList<>();
        for (int i = 0; i < answerTexts.length; i++) {
            answers.add(new SpecificAnswer(answerTexts[i], scores[i], i + 1));
        }
        question.setAnswers(answers);
        return question;
    }

    private static int[] parseScores(String scoresStr) {
        String[] parts = scoresStr.split("\\|");
        int[] scores = new int[parts.length];
        for (int i = 0; i < parts.length; i++) {
            scores[i] = Integer.parseInt(parts[i]);
        }
        return scores;
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
        return "❌ Nombre de questions insuffisant!\n\nMinimum 13 questions obligatoires.\n" +
                "Actuellement: " + current + "\nManquant: " + (needed > 0 ? needed : 0);
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
}