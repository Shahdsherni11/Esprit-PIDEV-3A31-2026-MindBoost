package com.mindboost.models;

import java.time.LocalDateTime;

public class BehaviorEvent {
    private int id;
    private int userId;
    private String eventType; // click, navigation, typing_speed, pause, idle
    private String eventData; // JSON
    private String sessionId;
    private LocalDateTime createdAt;

    public BehaviorEvent() {}
    public BehaviorEvent(int userId, String eventType, String eventData, String sessionId) {
        this.userId = userId;
        this.eventType = eventType;
        this.eventData = eventData;
        this.sessionId = sessionId;
        this.createdAt = LocalDateTime.now();
    }

    public int getId() { return id; } public void setId(int id) { this.id = id; }
    public int getUserId() { return userId; } public void setUserId(int v) { this.userId = v; }
    public String getEventType() { return eventType; } public void setEventType(String v) { this.eventType = v; }
    public String getEventData() { return eventData; } public void setEventData(String v) { this.eventData = v; }
    public String getSessionId() { return sessionId; } public void setSessionId(String v) { this.sessionId = v; }
    public LocalDateTime getCreatedAt() { return createdAt; } public void setCreatedAt(LocalDateTime v) { this.createdAt = v; }
}
