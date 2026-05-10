package com.mindboost.app.model;

import jakarta.persistence.*;

import java.time.LocalDateTime;

@Entity
@Table(name = "student_answers")
public class StudentAnswer {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Integer id;

    @Column(name = "specific_score_id", nullable = false)
    private Integer specificScoreId;

    @Column(name = "user_id", nullable = false)
    private Integer userId;

    @Column(name = "specific_test_id", nullable = false)
    private Integer specificTestId;

    @Column(name = "question_id", nullable = false)
    private Integer questionId;

    @Column(name = "question_text", columnDefinition = "LONGTEXT", nullable = false)
    private String questionText;

    @Column(name = "selected_answer_text", columnDefinition = "LONGTEXT", nullable = false)
    private String selectedAnswerText;

    @Column(name = "answer_score", nullable = false)
    private Integer answerScore = 0;

    @Column(name = "passed_at", nullable = false)
    private LocalDateTime passedAt = LocalDateTime.now();

    public Integer getId() {
        return id;
    }

    public Integer getSpecificScoreId() {
        return specificScoreId;
    }

    public void setSpecificScoreId(Integer specificScoreId) {
        this.specificScoreId = specificScoreId;
    }

    public Integer getUserId() {
        return userId;
    }

    public void setUserId(Integer userId) {
        this.userId = userId;
    }

    public Integer getSpecificTestId() {
        return specificTestId;
    }

    public void setSpecificTestId(Integer specificTestId) {
        this.specificTestId = specificTestId;
    }

    public Integer getQuestionId() {
        return questionId;
    }

    public void setQuestionId(Integer questionId) {
        this.questionId = questionId;
    }

    public String getQuestionText() {
        return questionText;
    }

    public void setQuestionText(String questionText) {
        this.questionText = questionText;
    }

    public String getSelectedAnswerText() {
        return selectedAnswerText;
    }

    public void setSelectedAnswerText(String selectedAnswerText) {
        this.selectedAnswerText = selectedAnswerText;
    }

    public Integer getAnswerScore() {
        return answerScore;
    }

    public void setAnswerScore(Integer answerScore) {
        this.answerScore = answerScore;
    }

    public LocalDateTime getPassedAt() {
        return passedAt;
    }

    public void setPassedAt(LocalDateTime passedAt) {
        this.passedAt = passedAt;
    }
}
