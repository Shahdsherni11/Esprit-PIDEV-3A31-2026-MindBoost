package com.mindboost.app.model;

import jakarta.persistence.*;

@Entity
@Table(name = "post")
public class Post {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Column(name = "post_id")
    private Integer id;

    @Column(columnDefinition = "LONGTEXT", nullable = false)
    private String content;

    @Column(length = 255, nullable = false)
    private String title;

    @Column(length = 100)
    private String tag;

    @Column(name = "image_url", length = 500)
    private String imageUrl;

    @Column(name = "post_likes", nullable = false)
    private Integer likes = 0;

    @Column(name = "post_dislikes", nullable = false)
    private Integer dislikes = 0;

    @Column(name = "help_meter", nullable = false)
    private Integer helpMeter = 0;

    @Column(name = "user_id", nullable = false)
    private Integer userId;

    @Column(name = "acheivement_id")
    private Integer achievementId;

    public Integer getId() {
        return id;
    }

    public String getContent() {
        return content;
    }

    public void setContent(String content) {
        this.content = content;
    }

    public String getTitle() {
        return title;
    }

    public void setTitle(String title) {
        this.title = title;
    }

    public String getTag() {
        return tag;
    }

    public void setTag(String tag) {
        this.tag = tag;
    }

    public String getImageUrl() {
        return imageUrl;
    }

    public void setImageUrl(String imageUrl) {
        this.imageUrl = imageUrl;
    }

    public Integer getLikes() {
        return likes;
    }

    public void setLikes(Integer likes) {
        this.likes = likes;
    }

    public Integer getDislikes() {
        return dislikes;
    }

    public void setDislikes(Integer dislikes) {
        this.dislikes = dislikes;
    }

    public Integer getHelpMeter() {
        return helpMeter;
    }

    public void setHelpMeter(Integer helpMeter) {
        this.helpMeter = helpMeter;
    }

    public Integer getUserId() {
        return userId;
    }

    public void setUserId(Integer userId) {
        this.userId = userId;
    }

    public Integer getAchievementId() {
        return achievementId;
    }

    public void setAchievementId(Integer achievementId) {
        this.achievementId = achievementId;
    }
}
