package com.gestion_test.entities;

import java.time.LocalDateTime;
import java.util.List;

/**
 * ✅ Entité pour les Tests Spécifiques (QCM sans scores)
 */
public class SpecificTest {
    private int id;
    private int generalTestId;
    private String category;
    private String title;
    private String description;
    private String status;
    private int createdBy;
    private LocalDateTime createdAt;
    private LocalDateTime updatedAt;
    private List<SpecificQuestion> questions;

    public SpecificTest() {}

    public SpecificTest(int generalTestId, String category, String title, String status, int createdBy) {
        this.generalTestId = generalTestId;
        this.category = category;
        this.title = title;
        this.status = status;
        this.createdBy = createdBy;
    }

    // ===== GETTERS ET SETTERS =====
    public int getId() { return id; }
    public void setId(int id) { this.id = id; }

    public int getGeneralTestId() { return generalTestId; }
    public void setGeneralTestId(int generalTestId) { this.generalTestId = generalTestId; }

    public String getCategory() { return category; }
    public void setCategory(String category) { this.category = category; }

    public String getTitle() { return title; }
    public void setTitle(String title) { this.title = title; }

    public String getDescription() { return description; }
    public void setDescription(String description) { this.description = description; }

    public String getStatus() { return status; }
    public void setStatus(String status) { this.status = status; }

    public int getCreatedBy() { return createdBy; }
    public void setCreatedBy(int createdBy) { this.createdBy = createdBy; }

    public LocalDateTime getCreatedAt() { return createdAt; }
    public void setCreatedAt(LocalDateTime createdAt) { this.createdAt = createdAt; }

    public LocalDateTime getUpdatedAt() { return updatedAt; }
    public void setUpdatedAt(LocalDateTime updatedAt) { this.updatedAt = updatedAt; }

    public List<SpecificQuestion> getQuestions() { return questions; }
    public void setQuestions(List<SpecificQuestion> questions) { this.questions = questions; }

    @Override
    public String toString() {
        return "SpecificTest{id=" + id + ", category='" + category + "', title='" + title + "'}";
    }

    // ===== CLASSE INTERNE : SpecificQuestion =====
    public static class SpecificQuestion {
        private int id;
        private int testId;
        private String questionText;
        private int questionOrder;
        private List<SpecificAnswer> answers;

        public SpecificQuestion() {}

        public SpecificQuestion(String questionText, int questionOrder) {
            this.questionText = questionText;
            this.questionOrder = questionOrder;
        }

        public int getId() { return id; }
        public void setId(int id) { this.id = id; }

        public int getTestId() { return testId; }
        public void setTestId(int testId) { this.testId = testId; }

        public String getQuestionText() { return questionText; }
        public void setQuestionText(String questionText) { this.questionText = questionText; }

        public int getQuestionOrder() { return questionOrder; }
        public void setQuestionOrder(int questionOrder) { this.questionOrder = questionOrder; }

        public List<SpecificAnswer> getAnswers() { return answers; }
        public void setAnswers(List<SpecificAnswer> answers) { this.answers = answers; }

        @Override
        public String toString() {
            return "[Q" + questionOrder + "] " + questionText;
        }
    }

    // ===== CLASSE INTERNE : SpecificAnswer (AVEC LABEL) =====
    public static class SpecificAnswer {
        private int id;
        private int questionId;
        private String answerText;
        private int answerOrder;
        private String answerLabel;  // ✅ LABEL A, B, C, D

        public SpecificAnswer() {}

        public SpecificAnswer(String answerText, int answerOrder) {
            this.answerText = answerText;
            this.answerOrder = answerOrder;
            this.answerLabel = String.valueOf((char) ('A' + answerOrder - 1));
        }

        public int getId() { return id; }
        public void setId(int id) { this.id = id; }

        public int getQuestionId() { return questionId; }
        public void setQuestionId(int questionId) { this.questionId = questionId; }

        public String getAnswerText() { return answerText; }
        public void setAnswerText(String answerText) { this.answerText = answerText; }

        public int getAnswerOrder() { return answerOrder; }
        public void setAnswerOrder(int answerOrder) { this.answerOrder = answerOrder; }

        /**
         * ✅ GETTER: Obtenir le label (A, B, C, D)
         */
        public String getAnswerLabel() {
            if (answerLabel == null || answerLabel.isEmpty()) {
                answerLabel = String.valueOf((char) ('A' + answerOrder - 1));
            }
            return answerLabel;
        }

        /**
         * ✅ SETTER: Définir le label (A, B, C, D)
         */
        public void setAnswerLabel(String answerLabel) {
            this.answerLabel = answerLabel;
        }

        @Override
        public String toString() {
            return getAnswerLabel() + ". " + answerText;
        }
    }
}