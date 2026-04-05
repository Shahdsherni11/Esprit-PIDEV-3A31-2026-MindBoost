package com.gestion_test.entities;

public class SpecificAnswer {
    private int id;
    private int questionId;
    private String answerText;
    private int score;
    private int answerOrder;
    private String createdAt;

    public SpecificAnswer() {}

    public SpecificAnswer(int id, int questionId, String answerText, int score, int answerOrder, String createdAt) {
        this.id = id;
        this.questionId = questionId;
        this.answerText = answerText;
        this.score = score;
        this.answerOrder = answerOrder;
        this.createdAt = createdAt;
    }

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

    public String getCreatedAt() { return createdAt; }
    public void setCreatedAt(String createdAt) { this.createdAt = createdAt; }
}