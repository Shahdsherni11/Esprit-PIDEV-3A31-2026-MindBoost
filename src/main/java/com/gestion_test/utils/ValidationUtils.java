package com.gestion_test.utils;

import com.gestion_test.entities.SpecificTest;
import com.gestion_test.entities.SpecificQuestion;
import com.gestion_test.entities.SpecificAnswer;

import java.util.List;
import java.util.HashMap;
import java.util.Map;
import java.util.ArrayList;

public class ValidationUtils {

    public static final int TITLE_MIN_LENGTH = 5;
    public static final int TITLE_MAX_LENGTH = 30;
    public static final int GENERAL_TEST_MIN_QUESTIONS = 10;
    public static final int SPECIFIC_TEST_MIN_QUESTIONS = 13;
    public static final int QCM_REQUIRED_ANSWERS = 4;
    public static final int SPECIFIC_TEST_MAX_CHECKED = 2;

    private static final Map<Integer, List<Integer>> selectedAnswers = new HashMap<Integer, List<Integer>>();
    private static int totalQuestions = 0;
    private static ValidationListener validationListener;
    private static boolean isSpecificTest = false;

    public interface ValidationListener {
        void onValidationChanged(ValidationStatus status);
    }

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
            this.progressPercentage = totalCount > 0 ? (double) answeredCount / totalCount * 100 : 0;
            this.missingQuestionNumbers = new ArrayList<Integer>();
            this.message = isComplete ? "Toutes les questions repondues!" :
                    "Repondues: " + answeredCount + "/" + totalCount;
        }

        public boolean isComplete() { return isComplete; }
        public int getAnsweredCount() { return answeredCount; }
        public int getTotalCount() { return totalCount; }
        public double getProgressPercentage() { return progressPercentage; }
        public List<Integer> getMissingQuestions() { return missingQuestionNumbers; }
        public String getMessage() { return message; }
        public void addMissingQuestion(int q) { missingQuestionNumbers.add(q); }
    }

    // ===== VALIDATION SPECIFIQUE =====

    public static ValidationResult validateSpecificTest(SpecificTest test) {
        ValidationResult result = new ValidationResult();

        if (isEmpty(test.getTitle())) {
            result.addError("Titre obligatoire");
        }
        if (isEmpty(test.getCategory())) {
            result.addError("Categorie obligatoire");
        }
        if (test.getQuestions() == null || test.getQuestions().size() < SPECIFIC_TEST_MIN_QUESTIONS) {
            int current = test.getQuestions() != null ? test.getQuestions().size() : 0;
            result.addError("Minimum " + SPECIFIC_TEST_MIN_QUESTIONS + " questions (actuellement: " + current + ")");
        }

        if (result.getErrors().isEmpty()) {
            result.setValid(true);
            result.setMessage("Test valide!");
        }
        return result;
    }

    // ===== ETUDIANT =====

    public static void initializeTest(int total, ValidationListener listener, boolean isSpecific) {
        totalQuestions = total;
        selectedAnswers.clear();
        validationListener = listener;
        isSpecificTest = isSpecific;
        notifyValidationChanged();
    }

    public static boolean answerQuestion(int questionNumber, int answerId, boolean isChecking) {
        if (!selectedAnswers.containsKey(questionNumber)) {
            selectedAnswers.put(questionNumber, new ArrayList<Integer>());
        }
        List<Integer> answers = selectedAnswers.get(questionNumber);

        if (isChecking) {
            if (!isSpecificTest && answers.size() >= 1) return false;
            if (isSpecificTest && answers.size() >= SPECIFIC_TEST_MAX_CHECKED) return false;
            if (!answers.contains(answerId)) answers.add(answerId);
        } else {
            answers.remove(Integer.valueOf(answerId));
        }
        notifyValidationChanged();
        return true;
    }

    public static boolean isTestComplete() {
        if (totalQuestions == 0) return false;
        for (int i = 1; i <= totalQuestions; i++) {
            List<Integer> a = selectedAnswers.get(i);
            if (a == null || a.isEmpty()) return false;
        }
        return true;
    }

    public static ValidationStatus getValidationStatus() {
        int answered = getAnsweredCount();
        ValidationStatus status = new ValidationStatus(isTestComplete(), answered, totalQuestions);
        for (int i = 1; i <= totalQuestions; i++) {
            List<Integer> a = selectedAnswers.get(i);
            if (a == null || a.isEmpty()) status.addMissingQuestion(i);
        }
        return status;
    }

    public static int getAnsweredCount() {
        int count = 0;
        for (int i = 1; i <= totalQuestions; i++) {
            List<Integer> a = selectedAnswers.get(i);
            if (a != null && !a.isEmpty()) count++;
        }
        return count;
    }

    public static boolean canCheckAnswer(int questionNumber) {
        List<Integer> a = selectedAnswers.get(questionNumber);
        if (a == null || a.isEmpty()) return true;
        if (!isSpecificTest && a.size() >= 1) return false;
        if (isSpecificTest && a.size() >= SPECIFIC_TEST_MAX_CHECKED) return false;
        return true;
    }

    public static Map<Integer, List<Integer>> getAllAnswers() {
        return new HashMap<Integer, List<Integer>>(selectedAnswers);
    }

    public static void reset() {
        selectedAnswers.clear();
        totalQuestions = 0;
        notifyValidationChanged();
    }

    private static void notifyValidationChanged() {
        if (validationListener != null) {
            validationListener.onValidationChanged(getValidationStatus());
        }
    }

    public static boolean isEmpty(String str) { return str == null || str.trim().isEmpty(); }
    public static boolean isNotEmpty(String str) { return !isEmpty(str); }
    public static boolean isInRange(int n, int min, int max) { return n >= min && n <= max; }

    public static class ValidationResult {
        private boolean valid = false;
        private String message = "";
        private List<String> errors = new ArrayList<String>();
        private List<Integer> questionErrors = new ArrayList<Integer>();
        private int totalQuestions = 0;

        public boolean isValid() { return valid; }
        public void setValid(boolean v) { this.valid = v; }
        public String getMessage() { return message; }
        public void setMessage(String m) { this.message = m; }
        public List<String> getErrors() { return errors; }
        public void addError(String e) { errors.add(e); }
        public List<Integer> getQuestionErrors() { return questionErrors; }
        public void addQuestionError(int q) { questionErrors.add(q); }
        public int getTotalQuestions() { return totalQuestions; }
        public void setTotalQuestions(int t) { this.totalQuestions = t; }

        public String getFormattedErrorMessage() {
            if (valid) return message;
            StringBuilder sb = new StringBuilder("Erreurs:\n");
            for (String e : errors) sb.append("- ").append(e).append("\n");
            return sb.toString();
        }
    }
}