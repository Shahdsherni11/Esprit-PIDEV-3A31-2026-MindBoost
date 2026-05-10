package com.mindboost.app.model;

import jakarta.persistence.*;

import java.time.LocalDateTime;

@Entity
@Table(name = "specific_score")
public class SpecificScore {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Integer id;

    @Column(name = "user_id", nullable = false)
    private Integer userId;

    @Column(name = "specific_test_id", nullable = false)
    private Integer specificTestId;

    @Column(name = "total_score", nullable = false)
    private Integer totalScore = 0;

    @Column(name = "max_score", nullable = false)
    private Integer maxScore = 0;

    @Column(nullable = false)
    private Integer percentage = 0;

    @Column(length = 100, nullable = false)
    private String category;

    @Column(length = 20, nullable = false)
    private String level = "Faible";

    @Column(name = "week_number", nullable = false)
    private Integer weekNumber = 1;

    @Column(name = "passed_at", nullable = false)
    private LocalDateTime passedAt = LocalDateTime.now();

    public Integer getId() {
        return id;
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

    public Integer getTotalScore() {
        return totalScore;
    }

    public void setTotalScore(Integer totalScore) {
        this.totalScore = totalScore;
    }

    public Integer getMaxScore() {
        return maxScore;
    }

    public void setMaxScore(Integer maxScore) {
        this.maxScore = maxScore;
    }

    public Integer getPercentage() {
        return percentage;
    }

    public void setPercentage(Integer percentage) {
        this.percentage = percentage;
    }

    public String getCategory() {
        return category;
    }

    public void setCategory(String category) {
        this.category = category;
    }

    public String getLevel() {
        return level;
    }

    public void setLevel(String level) {
        this.level = level;
    }

    public Integer getWeekNumber() {
        return weekNumber;
    }

    public void setWeekNumber(Integer weekNumber) {
        this.weekNumber = weekNumber;
    }

    public LocalDateTime getPassedAt() {
        return passedAt;
    }

    public void setPassedAt(LocalDateTime passedAt) {
        this.passedAt = passedAt;
    }
}
