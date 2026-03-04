package com.mindboost.models;

import java.time.LocalDateTime;

public class PsychProfile {
    private int id;
    private int userId;
    private double anxiety;      // 0-100
    private double resilience;   // 0-100
    private double sociability;  // 0-100
    private double focus;        // 0-100
    private double mood;         // 0-100
    private double anomalyScore; // 0-100
    private String detectedType; // ANALYTIQUE, CREATIF, SOCIAL, EMPATHIQUE, LEADER
    private LocalDateTime lastUpdated;

    public PsychProfile() {
        this.anxiety = 50; this.resilience = 50; this.sociability = 50;
        this.focus = 50; this.mood = 50; this.anomalyScore = 0;
    }

    public PsychProfile(int userId) {
        this();
        this.userId = userId;
        this.detectedType = "ANALYTIQUE";
    }

    /** Calcule et met à jour le type détecté selon les scores */
    public void recalculateType() {
        double max = Math.max(Math.max(sociability, focus),
                    Math.max(Math.max(resilience, mood), anxiety));
        if (max == sociability)  detectedType = "SOCIAL";
        else if (max == focus)   detectedType = "ANALYTIQUE";
        else if (max == resilience) detectedType = "LEADER";
        else if (max == mood)    detectedType = "CREATIF";
        else                     detectedType = "EMPATHIQUE";
    }

    /** Score d'anomalie : déviation importante par rapport à 50 */
    public void recalculateAnomaly() {
        double avg = (anxiety + resilience + sociability + focus + mood) / 5.0;
        double deviation = Math.abs(avg - 50);
        // Anomalie si anxiété très haute ou mood très bas
        double anxietyFactor = anxiety > 75 ? (anxiety - 75) * 2 : 0;
        double moodFactor    = mood < 25 ? (25 - mood) * 2 : 0;
        this.anomalyScore = Math.min(100, deviation + anxietyFactor + moodFactor);
    }

    public String getAlertMessage() {
        if (anomalyScore >= 70) return "🚨 CRITIQUE : Score d'anomalie " + (int)anomalyScore + "%. Intervention recommandée.";
        if (anomalyScore >= 50) return "⚠️ ATTENTION : Profil instable détecté (score " + (int)anomalyScore + "%).";
        return null;
    }

    // Getters / Setters
    public int getId() { return id; } public void setId(int id) { this.id = id; }
    public int getUserId() { return userId; } public void setUserId(int u) { this.userId = u; }
    public double getAnxiety() { return anxiety; } public void setAnxiety(double v) { this.anxiety = v; }
    public double getResilience() { return resilience; } public void setResilience(double v) { this.resilience = v; }
    public double getSociability() { return sociability; } public void setSociability(double v) { this.sociability = v; }
    public double getFocus() { return focus; } public void setFocus(double v) { this.focus = v; }
    public double getMood() { return mood; } public void setMood(double v) { this.mood = v; }
    public double getAnomalyScore() { return anomalyScore; } public void setAnomalyScore(double v) { this.anomalyScore = v; }
    public String getDetectedType() { return detectedType; } public void setDetectedType(String v) { this.detectedType = v; }
    public LocalDateTime getLastUpdated() { return lastUpdated; } public void setLastUpdated(LocalDateTime v) { this.lastUpdated = v; }
}
