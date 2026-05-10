package com.mindboost.app.model;

import jakarta.persistence.*;

@Entity
@Table(name = "score")
public class Score {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Integer id;

    @Column(name = "user_id", nullable = false)
    private Integer userId;

    @Column(name = "general_test_id", nullable = false)
    private Integer generalTestId;

    @Column(name = "total_score", nullable = false)
    private Integer totalScore;

    @Column
    private Integer percentage;

    public Integer getId() {
        return id;
    }

    public Integer getUserId() {
        return userId;
    }

    public void setUserId(Integer userId) {
        this.userId = userId;
    }

    public Integer getGeneralTestId() {
        return generalTestId;
    }

    public void setGeneralTestId(Integer generalTestId) {
        this.generalTestId = generalTestId;
    }

    public Integer getTotalScore() {
        return totalScore;
    }

    public void setTotalScore(Integer totalScore) {
        this.totalScore = totalScore;
    }

    public Integer getPercentage() {
        return percentage;
    }

    public void setPercentage(Integer percentage) {
        this.percentage = percentage;
    }
}
