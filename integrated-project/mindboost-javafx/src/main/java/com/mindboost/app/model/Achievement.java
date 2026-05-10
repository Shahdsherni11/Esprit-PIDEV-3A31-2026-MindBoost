package com.mindboost.app.model;

import jakarta.persistence.*;

@Entity
@Table(name = "achievement")
public class Achievement {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Column(name = "acheivement_id")
    private Integer id;

    @Column(name = "acheivement_name", length = 255, nullable = false)
    private String achievementName;

    @Column(name = "acheivement_score", nullable = false)
    private Integer achievementScore = 0;

    public Integer getId() {
        return id;
    }

    public String getAchievementName() {
        return achievementName;
    }

    public void setAchievementName(String achievementName) {
        this.achievementName = achievementName;
    }

    public Integer getAchievementScore() {
        return achievementScore;
    }

    public void setAchievementScore(Integer achievementScore) {
        this.achievementScore = achievementScore;
    }
}
