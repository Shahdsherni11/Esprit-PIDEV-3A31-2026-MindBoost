package com.gestion_test.entities;

import java.time.LocalDateTime;
import java.util.List;

public class GeneralTest {
    private int id;
    private String title;
    private String description;
    // ✅ SUPPRESSION: private String status;
    private int createdBy;
    private LocalDateTime createdAt;
    private LocalDateTime updatedAt;
    private List<GeneralQuestion> questions;

    public GeneralTest() {}

    public GeneralTest(String title, String description, int createdBy) {
        this.title = title;
        this.description = description;
        // ✅ SUPPRESSION: this.status
        this.createdBy = createdBy;
    }

    // ===== GETTERS ET SETTERS =====
    public int getId() { return id; }
    public void setId(int id) { this.id = id; }

    public String getTitle() { return title; }
    public void setTitle(String title) { this.title = title; }

    public String getDescription() { return description; }
    public void setDescription(String description) { this.description = description; }

    // ✅ SUPPRESSION: getStatus() et setStatus()

    public int getCreatedBy() { return createdBy; }
    public void setCreatedBy(int createdBy) { this.createdBy = createdBy; }

    public LocalDateTime getCreatedAt() { return createdAt; }
    public void setCreatedAt(LocalDateTime createdAt) { this.createdAt = createdAt; }

    public LocalDateTime getUpdatedAt() { return updatedAt; }
    public void setUpdatedAt(LocalDateTime updatedAt) { this.updatedAt = updatedAt; }

    public List<GeneralQuestion> getQuestions() { return questions; }
    public void setQuestions(List<GeneralQuestion> questions) { this.questions = questions; }

    @Override
    public String toString() {
        return "GeneralTest{id=" + id + ", title='" + title + "'}";
    }

    // ===== CLASSE INTERNE : GeneralQuestion =====
    public static class GeneralQuestion {
        private int id;
        private int testId;
        private String questionText;
        private int questionOrder;
        private List<GeneralAnswer> answers;

        public GeneralQuestion() {}

        public GeneralQuestion(String questionText, int questionOrder) {
            this.questionText = questionText;
            this.questionOrder = questionOrder;
        }

        // Getters et Setters
        public int getId() { return id; }
        public void setId(int id) { this.id = id; }

        public int getTestId() { return testId; }
        public void setTestId(int testId) { this.testId = testId; }

        public String getQuestionText() { return questionText; }
        public void setQuestionText(String questionText) { this.questionText = questionText; }

        public int getQuestionOrder() { return questionOrder; }
        public void setQuestionOrder(int questionOrder) { this.questionOrder = questionOrder; }

        public List<GeneralAnswer> getAnswers() { return answers; }
        public void setAnswers(List<GeneralAnswer> answers) { this.answers = answers; }

        @Override
        public String toString() {
            return "[Q" + questionOrder + "] " + questionText;
        }
    }

    // ===== CLASSE INTERNE : GeneralAnswer =====
    public static class GeneralAnswer {
        private int id;
        private int questionId;
        private String answerText;
        private int score;
        private int answerOrder;

        public GeneralAnswer() {}

        public GeneralAnswer(String answerText, int score, int answerOrder) {
            this.answerText = answerText;
            this.score = score;
            this.answerOrder = answerOrder;
        }

        // Getters et Setters
        public int getId() { return id; }
        public void setId(int id) { this.id = id; }

        public int getQuestionId() { return questionId; }
        public void setQuestionId(int questionId) { this.questionId = questionId; }

        public String getAnswerText() { return answerText; }
        public void setAnswerText(String answerText) { this.answerText = answerText; }

        public int getScore() { return score; }
        public void setScore(int score) { this.score = score; }

        public int getAnswerOrder() { return answerOrder; }
        public void setAnswerOrder(int answerOrder) { this.answerOrder = answerOrder; }

        @Override
        public String toString() {
            return "[A" + answerOrder + "] " + answerText + " (Score: " + score + ")";
        }
    }
}