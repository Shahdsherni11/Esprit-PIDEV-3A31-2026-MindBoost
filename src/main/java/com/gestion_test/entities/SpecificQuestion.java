package com.gestion_test.entities;

import java.util.ArrayList;
import java.util.List;

public class SpecificQuestion {

    private int id;
    private int testId;  // colonne = test_id dans la BDD
    private String questionText;
    private int questionOrder;
    private String createdAt;
    private List<SpecificAnswer> answers;

    public SpecificQuestion() {
        this.answers = new ArrayList<SpecificAnswer>();
    }

    public SpecificQuestion(int id, int testId, String questionText,
                            int questionOrder, String createdAt) {
        this.id = id;
        this.testId = testId;
        this.questionText = questionText;
        this.questionOrder = questionOrder;
        this.createdAt = createdAt;
        this.answers = new ArrayList<SpecificAnswer>();
    }

    public int getId() { return id; }
    public void setId(int id) { this.id = id; }

    public int getTestId() { return testId; }
    public void setTestId(int testId) { this.testId = testId; }

    public String getQuestionText() { return questionText; }
    public void setQuestionText(String questionText) { this.questionText = questionText; }

    public int getQuestionOrder() { return questionOrder; }
    public void setQuestionOrder(int questionOrder) { this.questionOrder = questionOrder; }

    public String getCreatedAt() { return createdAt; }
    public void setCreatedAt(String createdAt) { this.createdAt = createdAt; }

    public List<SpecificAnswer> getAnswers() { return answers; }
    public void setAnswers(List<SpecificAnswer> answers) { this.answers = answers; }
}