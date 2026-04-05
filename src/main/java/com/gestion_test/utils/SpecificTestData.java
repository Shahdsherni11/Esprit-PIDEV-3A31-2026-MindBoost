package com.gestion_test.utils;

import com.gestion_test.entities.SpecificQuestion;
import com.gestion_test.entities.SpecificAnswer;
import java.util.ArrayList;
import java.util.List;

public class SpecificTestData {

    public static List<SpecificQuestion> getAnxietyQuestions() {
        List<SpecificQuestion> questions = new ArrayList<SpecificQuestion>();
        String[][] data = {
                {"Avez-vous des crises de panique ?", "Jamais|Rarement|Parfois|Souvent|Tres souvent"},
                {"Vous sentez-vous nerveux sans raison ?", "Jamais|Rarement|Parfois|Souvent|Tres souvent"},
                {"Difficultes a vous detendre ?", "Jamais|Rarement|Parfois|Souvent|Tres souvent"},
                {"Craignez-vous ce qui pourrait arriver ?", "Jamais|Rarement|Parfois|Souvent|Tres souvent"},
                {"Avez-vous des palpitations cardiaques ?", "Jamais|Rarement|Parfois|Souvent|Tres souvent"},
                {"Vous evitez certaines situations par peur ?", "Jamais|Rarement|Parfois|Souvent|Tres souvent"},
                {"Sueurs froides ou chaudes ?", "Jamais|Rarement|Parfois|Souvent|Tres souvent"},
                {"Vous sentez-vous tendu physiquement ?", "Jamais|Rarement|Parfois|Souvent|Tres souvent"},
                {"Pensees negatives recurrentes ?", "Jamais|Rarement|Parfois|Souvent|Tres souvent"},
                {"Difficultes a vous concentrer par anxiete ?", "Jamais|Rarement|Parfois|Souvent|Tres souvent"},
                {"Vous reveillez-vous la nuit par l'anxiete ?", "Jamais|Rarement|Parfois|Souvent|Tres souvent"},
                {"Maux de tete lies au stress ?", "Jamais|Rarement|Parfois|Souvent|Tres souvent"},
                {"Vous inquietez-vous excessivement des details ?", "Jamais|Rarement|Parfois|Souvent|Tres souvent"}
        };

        for (int i = 0; i < data.length; i++) {
            questions.add(createQuestion(i + 1, data[i][0], data[i][1].split("\\|")));
        }
        return questions;
    }

    public static List<SpecificQuestion> getDepressionQuestions() {
        List<SpecificQuestion> questions = new ArrayList<SpecificQuestion>();
        String[][] data = {
                {"Vous sentez-vous triste ou vide ?", "Jamais|Rarement|Parfois|Souvent|Tres souvent"},
                {"Perdu interet dans les activites ?", "Jamais|Rarement|Parfois|Souvent|Tres souvent"},
                {"Pensees suicidaires ?", "Jamais|Rarement|Parfois|Souvent|Tres souvent"},
                {"Vous sentez-vous sans espoir ?", "Jamais|Rarement|Parfois|Souvent|Tres souvent"},
                {"Changements d'appetit ?", "Jamais|Rarement|Parfois|Souvent|Tres souvent"},
                {"Vous sentez-vous fatigue ?", "Jamais|Rarement|Parfois|Souvent|Tres souvent"},
                {"Difficultes a prendre des decisions ?", "Jamais|Rarement|Parfois|Souvent|Tres souvent"},
                {"Vous sentez-vous inutile ?", "Jamais|Rarement|Parfois|Souvent|Tres souvent"},
                {"Pensees de mort ?", "Jamais|Rarement|Parfois|Souvent|Tres souvent"},
                {"Vous isolez-vous des autres ?", "Jamais|Rarement|Parfois|Souvent|Tres souvent"},
                {"Difficultes de concentration ?", "Jamais|Rarement|Parfois|Souvent|Tres souvent"},
                {"Vous sentez-vous emotionnellement engourdi ?", "Jamais|Rarement|Parfois|Souvent|Tres souvent"},
                {"Vision sombre de l'avenir ?", "Jamais|Rarement|Parfois|Souvent|Tres souvent"}
        };

        for (int i = 0; i < data.length; i++) {
            questions.add(createQuestion(i + 1, data[i][0], data[i][1].split("\\|")));
        }
        return questions;
    }

    public static List<SpecificQuestion> getStressQuestions() {
        List<SpecificQuestion> questions = new ArrayList<SpecificQuestion>();
        String[][] data = {
                {"Submerge par le travail ?", "Jamais|Rarement|Parfois|Souvent|Tres souvent"},
                {"Delais serres qui vous stressent ?", "Jamais|Rarement|Parfois|Souvent|Tres souvent"},
                {"Incapable de gerer vos responsabilites ?", "Jamais|Rarement|Parfois|Souvent|Tres souvent"},
                {"Conflits au travail ou a l'ecole ?", "Jamais|Rarement|Parfois|Souvent|Tres souvent"},
                {"Vous sentez-vous presse par le temps ?", "Jamais|Rarement|Parfois|Souvent|Tres souvent"},
                {"Difficultes a equilibrer vie pro/perso ?", "Jamais|Rarement|Parfois|Souvent|Tres souvent"},
                {"Vous sentez-vous impuissant ?", "Jamais|Rarement|Parfois|Souvent|Tres souvent"},
                {"Pensees negatives sur votre travail ?", "Jamais|Rarement|Parfois|Souvent|Tres souvent"},
                {"Vous sentez-vous epuise ?", "Jamais|Rarement|Parfois|Souvent|Tres souvent"},
                {"Difficultes a vous deconnecter ?", "Jamais|Rarement|Parfois|Souvent|Tres souvent"},
                {"Vous sentez-vous frustre ?", "Jamais|Rarement|Parfois|Souvent|Tres souvent"},
                {"Conflits relationnels dus au stress ?", "Jamais|Rarement|Parfois|Souvent|Tres souvent"},
                {"Vous doutez-vous de vos competences ?", "Jamais|Rarement|Parfois|Souvent|Tres souvent"}
        };

        for (int i = 0; i < data.length; i++) {
            questions.add(createQuestion(i + 1, data[i][0], data[i][1].split("\\|")));
        }
        return questions;
    }

    public static List<SpecificQuestion> getSleepDisorderQuestions() {
        List<SpecificQuestion> questions = new ArrayList<SpecificQuestion>();
        String[][] data = {
                {"Difficultes a vous endormir ?", "Jamais|Rarement|Parfois|Souvent|Tres souvent"},
                {"Vous reveillez-vous la nuit plusieurs fois ?", "Jamais|Rarement|Parfois|Souvent|Tres souvent"},
                {"Mal a vous rendormir apres le reveil ?", "Jamais|Rarement|Parfois|Souvent|Tres souvent"},
                {"Vous vous reveillez trop tot ?", "Jamais|Rarement|Parfois|Souvent|Tres souvent"},
                {"Votre sommeil vous laisse-t-il repose ?", "Toujours|Souvent|Parfois|Rarement|Jamais"},
                {"Cauchemars frequents ?", "Jamais|Rarement|Parfois|Souvent|Tres souvent"},
                {"Vous vous couchez a des heures irregulieres ?", "Jamais|Rarement|Parfois|Souvent|Tres souvent"},
                {"Pensees anxieuses avant de dormir ?", "Jamais|Rarement|Parfois|Souvent|Tres souvent"},
                {"Consultez votre telephone avant de dormir ?", "Jamais|Rarement|Parfois|Souvent|Tres souvent"},
                {"Difficultes a vous lever le matin ?", "Jamais|Rarement|Parfois|Souvent|Tres souvent"},
                {"Vous dormez trop ou trop peu ?", "Jamais|Rarement|Parfois|Souvent|Tres souvent"},
                {"Apnees du sommeil ?", "Jamais|Rarement|Parfois|Souvent|Tres souvent"},
                {"Vous ronflez pendant votre sommeil ?", "Jamais|Rarement|Parfois|Souvent|Tres souvent"}
        };

        for (int i = 0; i < data.length; i++) {
            questions.add(createQuestion(i + 1, data[i][0], data[i][1].split("\\|")));
        }
        return questions;
    }

    public static List<SpecificQuestion> getQuestionsByCategory(String category) {
        if (category == null) return new ArrayList<SpecificQuestion>();

        String cat = category.toLowerCase();
        if (cat.contains("anxi")) return getAnxietyQuestions();
        if (cat.contains("depr")) return getDepressionQuestions();
        if (cat.contains("stress")) return getStressQuestions();
        if (cat.contains("sommeil") || cat.contains("sleep")) return getSleepDisorderQuestions();
        return new ArrayList<SpecificQuestion>();
    }

    /**
     * Creer une question avec ses reponses
     * Utilise les nouveaux constructeurs de SpecificQuestion et SpecificAnswer
     */
    private static SpecificQuestion createQuestion(int order, String questionText, String[] answerTexts) {
        SpecificQuestion question = new SpecificQuestion();
        question.setQuestionText(questionText);
        question.setQuestionOrder(order);

        List<SpecificAnswer> answers = new ArrayList<SpecificAnswer>();
        for (int i = 0; i < answerTexts.length; i++) {
            SpecificAnswer answer = new SpecificAnswer();
            answer.setAnswerText(answerTexts[i]);
            answer.setAnswerOrder(i + 1);
            answer.setScore(i + 1); // 1=Jamais, 2=Rarement, 3=Parfois, 4=Souvent, 5=Tres souvent
            answers.add(answer);
        }

        question.setAnswers(answers);
        return question;
    }

    public static boolean hasMinimumQuestions(List<SpecificQuestion> questions) {
        return questions != null && questions.size() >= 13;
    }

    public static String getMinimumQuestionsMessage(int current) {
        int needed = 13 - current;
        return "Nombre de questions insuffisant!\n\n" +
                "Minimum 13 questions obligatoires.\n\n" +
                "Actuellement: " + current + " question(s)\n" +
                "Manquant: " + (needed > 0 ? needed : 0) + " question(s)";
    }

    public static String getQuestionsStats(List<SpecificQuestion> questions) {
        if (questions == null || questions.isEmpty()) {
            return "Aucune question";
        }

        int totalAnswers = 0;
        int maxAnswers = 0;
        int minAnswers = Integer.MAX_VALUE;

        for (SpecificQuestion q : questions) {
            int answerCount = q.getAnswers() != null ? q.getAnswers().size() : 0;
            totalAnswers += answerCount;
            if (answerCount > maxAnswers) maxAnswers = answerCount;
            if (answerCount < minAnswers) minAnswers = answerCount;
        }

        double avg = (double) totalAnswers / questions.size();

        return "Statistiques:\n" +
                "Nombre de questions: " + questions.size() + "\n" +
                "Reponses par question: Min=" + minAnswers + ", Max=" + maxAnswers +
                ", Moy=" + String.format("%.1f", avg);
    }

    public static List<String> getAllCategories() {
        List<String> categories = new ArrayList<String>();
        categories.add("Anxiete");
        categories.add("Depression");
        categories.add("Stress");
        categories.add("Trouble du Sommeil");
        return categories;
    }

    public static String getCategoriesAsText() {
        return "Categories disponibles:\n" +
                "Anxiete (13 questions)\n" +
                "Depression (13 questions)\n" +
                "Stress (13 questions)\n" +
                "Trouble du Sommeil (13 questions)";
    }
}