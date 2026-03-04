package com.mindboost.models;

import java.time.LocalDateTime;

public class FaceEncoding {
    private int id;
    private int userId;
    private String encoding;   // JSON array de doubles
    private String imagePath;
    private LocalDateTime createdAt;

    public FaceEncoding() {}
    public FaceEncoding(int userId, String encoding) {
        this.userId = userId;
        this.encoding = encoding;
        this.createdAt = LocalDateTime.now();
    }

    public int getId() { return id; } public void setId(int id) { this.id = id; }
    public int getUserId() { return userId; } public void setUserId(int v) { this.userId = v; }
    public String getEncoding() { return encoding; } public void setEncoding(String v) { this.encoding = v; }
    public String getImagePath() { return imagePath; } public void setImagePath(String v) { this.imagePath = v; }
    public LocalDateTime getCreatedAt() { return createdAt; } public void setCreatedAt(LocalDateTime v) { this.createdAt = v; }
}
