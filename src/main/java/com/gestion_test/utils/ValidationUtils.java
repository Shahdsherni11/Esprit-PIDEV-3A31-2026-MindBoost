package com.gestion_test.utils;

import com.gestion_test.entities.GeneralTest;
import com.gestion_test.entities.SpecificTest;
import com.gestion_test.entities.GeneralTest.GeneralQuestion;
import com.gestion_test.entities.GeneralTest.GeneralAnswer;
import com.gestion_test.entities.SpecificTest.SpecificQuestion;
import com.gestion_test.entities.SpecificTest.SpecificAnswer;

import java.util.List;
import java.util.HashMap;
import java.util.Map;
import java.util.ArrayList;

/**
 * ✅ VALIDATION COMPLÈTE POUR TESTS QCM
 *
 * PSYCHOLOGUE (Création/Édition):
 * ├─ Titre: 5-30 caractères obligatoire
 * ├─ Minimum questions: General=10, Specific=13
 * ├─ Réponses: EXACTEMENT 4 (A, B, C, D)
 * ├─ Texte question: obligatoire
 * ├─ Texte réponse: obligatoire
 * └─ Score réponse: 0-100
 *
 * ÉTUDIANT (Passage du test):
 * ├─ Test Général:
 * │  ├─ 1 seule réponse par question (RadioButton)
 * │  └─ TOUTES les questions répondues
 * └─ Test Spécifique:
 *    ├─ Maximum 2 réponses par question (CheckBox)
 *    └─ TOUTES les questions répondues
 */
public class ValidationUtils {

    // ===== CONSTANTES DE VALIDATION PSYCHOLOGUE =====
    public static final int TITLE_MIN_LENGTH = 5;
    public static final int TITLE_MAX_LENGTH = 30;
    public static final int GENERAL_TEST_MIN_QUESTIONS = 10;
    public static final int SPECIFIC_TEST_MIN_QUESTIONS = 13;
    public static final int QCM_REQUIRED_ANSWERS = 4;  // A, B, C, D
    public static final int SPECIFIC_TEST_MAX_CHECKED = 2;  // Max 2 réponses

    // ===== SUIVI DES RÉPONSES ÉTUDIANT =====
    private static final Map<Integer, List<Integer>> selectedAnswers = new HashMap<>();
    private static int totalQuestions = 0;
    private static ValidationListener validationListener;
    private static boolean isSpecificTest = false;

    // ===== INTERFACE DE SUIVI =====
    public interface ValidationListener {
        void onValidationChanged(ValidationStatus status);
    }

    /**
     * ✅ Classe pour le statut de validation
     */
    public static class ValidationStatus {
        private boolean isComplete;
        private int answeredCount;
        private int totalCount;
        private double progressPercentage;
        private List<Integer> missingQuestionNumbers;
        private String message;

        public ValidationStatus(boolean isComplete, int answeredCount, int totalCount) {
            this.isComplete = isComplete;
            this.answeredCount = answeredCount;
            this.totalCount = totalCount;
            this.progressPercentage = totalCount > 0 ?
                    (double) answeredCount / totalCount * 100 : 0;
            this.missingQuestionNumbers = new ArrayList<>();
            this.message = generateMessage();
        }

        private String generateMessage() {
            if (isComplete) {
                return "✅ Toutes les questions sont répondues!";
            }
            int remaining = totalCount - answeredCount;
            return String.format(
                    "⏳ Questions manquantes: %d/%d\n\n" +
                            "Répondues: %d/%d (%.1f%%)",
                    remaining,
                    totalCount,
                    answeredCount,
                    totalCount,
                    progressPercentage
            );
        }

        public boolean isComplete() { return isComplete; }
        public int getAnsweredCount() { return answeredCount; }
        public int getTotalCount() { return totalCount; }
        public double getProgressPercentage() { return progressPercentage; }
        public List<Integer> getMissingQuestions() { return missingQuestionNumbers; }
        public String getMessage() { return message; }

        public void addMissingQuestion(int questionNumber) {
            missingQuestionNumbers.add(questionNumber);
        }
    }

    // ✅✅✅ VALIDATIONS PSYCHOLOGUE (Création/Édition) ✅✅✅

    /**
     * ✅ VALIDATION COMPLÈTE TEST GÉNÉRAL (PSYCHOLOGUE)
     */
    public static ValidationResult validateGeneralTest(GeneralTest test) {
        ValidationResult result = new ValidationResult();
        System.out.println("🔍 Validation TEST GÉNÉRAL (Psychologue)...");

        // ===== 1️⃣ TITRE: 5-30 caractères =====
        if (isEmpty(test.getTitle())) {
            result.addError("❌ Titre obligatoire");
        } else if (test.getTitle().length() < TITLE_MIN_LENGTH ||
                test.getTitle().length() > TITLE_MAX_LENGTH) {
            result.addError(String.format(
                    "❌ Titre invalide!\n\n" +
                            "Requis: %d-%d caractères\n" +
                            "Actuellement: %d caractères",
                    TITLE_MIN_LENGTH,
                    TITLE_MAX_LENGTH,
                    test.getTitle().length()
            ));
        }

        // ===== 2️⃣ MINIMUM 10 QUESTIONS =====
        if (test.getQuestions() == null || test.getQuestions().isEmpty()) {
            result.addError("❌ Le test doit avoir au minimum " + GENERAL_TEST_MIN_QUESTIONS + " questions");
            return result;
        }

        if (test.getQuestions().size() < GENERAL_TEST_MIN_QUESTIONS) {
            result.addError(String.format(
                    "❌ Nombre de questions insuffisant!\n\n" +
                            "Minimum requis: %d\n" +
                            "Actuellement: %d\n" +
                            "Manquant: %d",
                    GENERAL_TEST_MIN_QUESTIONS,
                    test.getQuestions().size(),
                    GENERAL_TEST_MIN_QUESTIONS - test.getQuestions().size()
            ));
            return result;
        }

        result.setTotalQuestions(test.getQuestions().size());

        // ===== 3️⃣ VALIDER CHAQUE QUESTION =====
        for (int i = 0; i < test.getQuestions().size(); i++) {
            GeneralQuestion question = test.getQuestions().get(i);
            String questionNum = "Q" + (i + 1);

            // Texte de la question
            if (isEmpty(question.getQuestionText())) {
                result.addError(questionNum + ": Texte obligatoire");
                continue;
            }

            // ===== 4️⃣ EXACTEMENT 4 RÉPONSES (A, B, C, D) =====
            if (question.getAnswers() == null || question.getAnswers().isEmpty()) {
                result.addError(questionNum + ": Doit avoir " + QCM_REQUIRED_ANSWERS + " réponses");
                result.addQuestionError(i + 1);
                continue;
            }

            if (question.getAnswers().size() != QCM_REQUIRED_ANSWERS) {
                result.addError(String.format(
                        "❌ %s: Nombre de réponses invalide!\n" +
                                "Requis: %d (A, B, C, D)\n" +
                                "Actuellement: %d",
                        questionNum,
                        QCM_REQUIRED_ANSWERS,
                        question.getAnswers().size()
                ));
                result.addQuestionError(i + 1);
                continue;
            }

            // ===== 5️⃣ VALIDER CHAQUE RÉPONSE =====
            validateGeneralAnswers(question, questionNum, result);
        }

        if (result.getErrors().isEmpty()) {
            result.setValid(true);
            result.setMessage("✅ Test général valide!");
            System.out.println("✅ Test GÉNÉRAL validé!");
        } else {
            result.setValid(false);
            System.out.println("❌ Validation GÉNÉRAL échouée!");
        }

        return result;
    }

    /**
     * ✅ Valider les réponses du test général
     */
    private static void validateGeneralAnswers(GeneralQuestion question, String questionNum, ValidationResult result) {
        String[] labels = {"A", "B", "C", "D"};
        int index = 0;

        for (GeneralAnswer answer : question.getAnswers()) {
            // Texte réponse
            if (isEmpty(answer.getAnswerText())) {
                result.addError(questionNum + " - " + labels[index] + ": Texte obligatoire");
            }

            // Label (A, B, C, D)
            if (!answer.getAnswerLabel().equals(labels[index])) {
                result.addError(questionNum + ": " + labels[index] + " attendue");
            }

            // Score (0-100)
            if (!isInRange(answer.getScore(), 0, 100)) {
                result.addError(String.format(
                        "%s - %s: Score invalide (%d)\n" +
                                "Requis: 0-100",
                        questionNum,
                        labels[index],
                        answer.getScore()
                ));
            }

            index++;
        }
    }

    /**
     * ✅ VALIDATION COMPLÈTE TEST SPÉCIFIQUE (PSYCHOLOGUE)
     */
    public static ValidationResult validateSpecificTest(SpecificTest test) {
        ValidationResult result = new ValidationResult();
        System.out.println("🔍 Validation TEST SPÉCIFIQUE (Psychologue)...");

        // ===== 1️⃣ TITRE: 5-30 caractères =====
        if (isEmpty(test.getTitle())) {
            result.addError("❌ Titre obligatoire");
        } else if (test.getTitle().length() < TITLE_MIN_LENGTH ||
                test.getTitle().length() > TITLE_MAX_LENGTH) {
            result.addError(String.format(
                    "❌ Titre invalide!\n\n" +
                            "Requis: %d-%d caractères\n" +
                            "Actuellement: %d caractères",
                    TITLE_MIN_LENGTH,
                    TITLE_MAX_LENGTH,
                    test.getTitle().length()
            ));
        }

        // ===== 2️⃣ CATÉGORIE OBLIGATOIRE =====
        if (isEmpty(test.getCategory())) {
            result.addError("❌ Catégorie obligatoire");
        }

        // ===== 3️⃣ MINIMUM 13 QUESTIONS =====
        if (test.getQuestions() == null || test.getQuestions().isEmpty()) {
            result.addError("❌ Le test doit avoir au minimum " + SPECIFIC_TEST_MIN_QUESTIONS + " questions");
            return result;
        }

        if (test.getQuestions().size() < SPECIFIC_TEST_MIN_QUESTIONS) {
            result.addError(String.format(
                    "❌ Nombre de questions insuffisant!\n\n" +
                            "Minimum requis: %d\n" +
                            "Actuellement: %d\n" +
                            "Manquant: %d",
                    SPECIFIC_TEST_MIN_QUESTIONS,
                    test.getQuestions().size(),
                    SPECIFIC_TEST_MIN_QUESTIONS - test.getQuestions().size()
            ));
            return result;
        }

        result.setTotalQuestions(test.getQuestions().size());

        // ===== 4️⃣ VALIDER CHAQUE QUESTION =====
        for (int i = 0; i < test.getQuestions().size(); i++) {
            SpecificQuestion question = test.getQuestions().get(i);
            String questionNum = "Q" + (i + 1);

            // Texte de la question
            if (isEmpty(question.getQuestionText())) {
                result.addError(questionNum + ": Texte obligatoire");
                continue;
            }

            // ===== 5️⃣ EXACTEMENT 4 RÉPONSES (A, B, C, D) =====
            if (question.getAnswers() == null || question.getAnswers().isEmpty()) {
                result.addError(questionNum + ": Doit avoir " + QCM_REQUIRED_ANSWERS + " réponses");
                result.addQuestionError(i + 1);
                continue;
            }

            if (question.getAnswers().size() != QCM_REQUIRED_ANSWERS) {
                result.addError(String.format(
                        "❌ %s: Nombre de réponses invalide!\n" +
                                "Requis: %d (A, B, C, D)\n" +
                                "Actuellement: %d",
                        questionNum,
                        QCM_REQUIRED_ANSWERS,
                        question.getAnswers().size()
                ));
                result.addQuestionError(i + 1);
                continue;
            }

            // ===== 6️⃣ VALIDER CHAQUE RÉPONSE =====
            validateSpecificAnswers(question, questionNum, result);
        }

        if (result.getErrors().isEmpty()) {
            result.setValid(true);
            result.setMessage("✅ Test spécifique valide!");
            System.out.println("✅ Test SPÉCIFIQUE validé!");
        } else {
            result.setValid(false);
            System.out.println("❌ Validation SPÉCIFIQUE échouée!");
        }

        return result;
    }

    /**
     * ✅ Valider les réponses du test spécifique
     */
    private static void validateSpecificAnswers(SpecificQuestion question, String questionNum, ValidationResult result) {
        String[] labels = {"A", "B", "C", "D"};
        int index = 0;

        for (SpecificAnswer answer : question.getAnswers()) {
            // Texte réponse
            if (isEmpty(answer.getAnswerText())) {
                result.addError(questionNum + " - " + labels[index] + ": Texte obligatoire");
            }

            // ✅ CORRIGER: Utiliser les méthodes correctes
            answer.setAnswerLabel(labels[index]);  // ✅ LIGNE 339

            index++;
        }
    }

    // ✅✅✅ VALIDATIONS ÉTUDIANT (Passage du test) ✅✅✅

    /**
     * ✅ Initialiser la validation pour un test
     * @param totalQuestionsCount Nombre total de questions
     * @param listener Interface pour les changements
     * @param isSpecific true pour test spécifique, false pour général
     */
    public static void initializeTest(int totalQuestionsCount, ValidationListener listener, boolean isSpecific) {
        totalQuestions = totalQuestionsCount;
        selectedAnswers.clear();
        validationListener = listener;
        isSpecificTest = isSpecific;

        System.out.println("✅ Test " + (isSpecific ? "SPÉCIFIQUE" : "GÉNÉRAL") +
                " initialisé (" + totalQuestions + " questions)");
        notifyValidationChanged();
    }

    /**
     * ✅ ENREGISTRER UNE RÉPONSE
     *
     * Test Général: Une seule réponse par question
     * Test Spécifique: Maximum 2 réponses par question
     */
    public static boolean answerQuestion(int questionNumber, int answerId, boolean isChecking) {
        if (!selectedAnswers.containsKey(questionNumber)) {
            selectedAnswers.put(questionNumber, new ArrayList<>());
        }

        List<Integer> answers = selectedAnswers.get(questionNumber);

        if (isChecking) {
            // ===== COCHER UNE RÉPONSE =====

            // Test Général: Maximum 1
            if (!isSpecificTest && answers.size() >= 1) {
                System.out.println("❌ Une seule réponse par question!");
                return false;
            }

            // Test Spécifique: Maximum 2
            if (isSpecificTest && answers.size() >= SPECIFIC_TEST_MAX_CHECKED) {
                System.out.println("❌ Maximum " + SPECIFIC_TEST_MAX_CHECKED + " réponses par question!");
                return false;
            }

            if (!answers.contains(answerId)) {
                answers.add(answerId);
                System.out.println("✅ Q" + questionNumber + " → Réponse " + answerId + " cochée");
            }
        } else {
            // ===== DÉCOCHER UNE RÉPONSE =====
            answers.remove((Integer) answerId);
            System.out.println("❌ Q" + questionNumber + " → Réponse " + answerId + " décochée");
        }

        System.out.println("   Progression: " + getAnsweredCount() + "/" + totalQuestions);
        notifyValidationChanged();
        return true;
    }

    /**
     * ✅ Vérifier si le test est complet
     * TOUTES les questions doivent avoir au moins UNE réponse
     */
    public static boolean isTestComplete() {
        if (totalQuestions == 0) {
            return false;
        }

        for (int i = 1; i <= totalQuestions; i++) {
            List<Integer> answers = selectedAnswers.get(i);
            if (answers == null || answers.isEmpty()) {
                return false;
            }
        }

        return true;
    }

    /**
     * ✅ Obtenir le statut de validation
     */
    public static ValidationStatus getValidationStatus() {
        boolean isComplete = isTestComplete();
        int answered = getAnsweredCount();

        ValidationStatus status = new ValidationStatus(isComplete, answered, totalQuestions);

        if (!isComplete) {
            for (int i = 1; i <= totalQuestions; i++) {
                List<Integer> answers = selectedAnswers.get(i);
                if (answers == null || answers.isEmpty()) {
                    status.addMissingQuestion(i);
                }
            }
        }

        return status;
    }

    /**
     * ✅ Obtenir le nombre de questions répondues
     */
    public static int getAnsweredCount() {
        int count = 0;
        for (int i = 1; i <= totalQuestions; i++) {
            List<Integer> answers = selectedAnswers.get(i);
            if (answers != null && !answers.isEmpty()) {
                count++;
            }
        }
        return count;
    }

    /**
     * ✅ Obtenir le nombre total de questions
     */
    public static int getTotalQuestionCount() {
        return totalQuestions;
    }

    /**
     * ✅ Obtenir le pourcentage de progression
     */
    public static double getProgressPercentage() {
        if (totalQuestions == 0) return 0;
        return (double) getAnsweredCount() / totalQuestions * 100;
    }

    /**
     * ✅ Obtenir le nombre de questions manquantes
     */
    public static int getMissingCount() {
        return totalQuestions - getAnsweredCount();
    }

    /**
     * ✅ Obtenir toutes les réponses
     */
    public static Map<Integer, List<Integer>> getAllAnswers() {
        return new HashMap<>(selectedAnswers);
    }

    /**
     * ✅ Vérifier si on peut cocher une réponse
     */
    public static boolean canCheckAnswer(int questionNumber) {
        List<Integer> answers = selectedAnswers.get(questionNumber);

        if (answers == null || answers.isEmpty()) {
            return true;
        }

        // Test Général: 1 maximum
        if (!isSpecificTest && answers.size() >= 1) {
            return false;
        }

        // Test Spécifique: 2 maximum
        if (isSpecificTest && answers.size() >= SPECIFIC_TEST_MAX_CHECKED) {
            return false;
        }

        return true;
    }

    /**
     * ✅ Obtenir le nombre de réponses cochées pour une question
     */
    public static int getCheckedCount(int questionNumber) {
        List<Integer> answers = selectedAnswers.get(questionNumber);
        return answers != null ? answers.size() : 0;
    }

    /**
     * ✅ Réinitialiser
     */
    public static void reset() {
        selectedAnswers.clear();
        totalQuestions = 0;
        System.out.println("🔄 Validation réinitialisée");
        notifyValidationChanged();
    }

    /**
     * ✅ Notifier les changements
     */
    private static void notifyValidationChanged() {
        if (validationListener != null) {
            ValidationStatus status = getValidationStatus();
            validationListener.onValidationChanged(status);
        }
    }

    // ===== VALIDATIONS GÉNÉRALES =====

    public static boolean isEmpty(String str) {
        return str == null || str.trim().isEmpty();
    }

    public static boolean isNotEmpty(String str) {
        return !isEmpty(str);
    }

    public static boolean hasMinLength(String str, int minLength) {
        return isNotEmpty(str) && str.trim().length() >= minLength;
    }

    public static boolean hasMaxLength(String str, int maxLength) {
        return isEmpty(str) || str.trim().length() <= maxLength;
    }

    public static boolean hasLengthBetween(String str, int minLength, int maxLength) {
        return hasMinLength(str, minLength) && hasMaxLength(str, maxLength);
    }

    public static boolean isPositive(int number) {
        return number > 0;
    }

    public static boolean isPositiveOrZero(int number) {
        return number >= 0;
    }

    public static boolean isInRange(int number, int min, int max) {
        return number >= min && number <= max;
    }

    public static <T> boolean hasMinSize(List<T> list, int minSize) {
        return list != null && list.size() >= minSize;
    }

    public static <T> boolean hasMaxSize(List<T> list, int maxSize) {
        return list == null || list.size() <= maxSize;
    }

    /**
     * ✅ Classe pour le résultat de validation
     */
    public static class ValidationResult {
        private boolean valid = false;
        private String message = "";
        private List<String> errors = new ArrayList<>();
        private List<Integer> questionErrors = new ArrayList<>();
        private int totalQuestions = 0;

        public boolean isValid() { return valid; }
        public void setValid(boolean valid) { this.valid = valid; }

        public String getMessage() { return message; }
        public void setMessage(String message) { this.message = message; }

        public List<String> getErrors() { return errors; }
        public void addError(String error) { this.errors.add(error); }

        public List<Integer> getQuestionErrors() { return questionErrors; }
        public void addQuestionError(int questionNumber) { questionErrors.add(questionNumber); }

        public int getTotalQuestions() { return totalQuestions; }
        public void setTotalQuestions(int total) { this.totalQuestions = total; }

        public String getFormattedErrorMessage() {
            if (valid) return message;

            StringBuilder sb = new StringBuilder("❌ VALIDATION ÉCHOUÉE\n\n");
            for (int i = 0; i < errors.size(); i++) {
                sb.append("❌ ").append(errors.get(i));
                if (i < errors.size() - 1) sb.append("\n\n");
            }
            return sb.toString();
        }
    }
}