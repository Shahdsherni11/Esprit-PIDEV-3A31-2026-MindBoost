package com.gestion_test.entities;

import java.util.ArrayList;
import java.util.List;

public class SpecificTest {

    private int id;
    private int generalTestId;
    private String category;
    private String title;
    private String description;
    private String status;
    private int createdBy;
    private String createdAt;
    private String updatedAt;
    private List<SpecificQuestion> questions;

    public SpecificTest() {
        this.questions = new ArrayList<SpecificQuestion>();
    }

    public SpecificTest(int id, int generalTestId, String category, String title,
                        String description, String status, int createdBy,
                        String createdAt, String updatedAt) {
        this.id = id;
        this.generalTestId = generalTestId;
        this.category = category;
        this.title = title;
        this.description = description;
        this.status = status;
        this.createdBy = createdBy;
        this.createdAt = createdAt;
        this.updatedAt = updatedAt;
        this.questions = new ArrayList<SpecificQuestion>();
    }

    // Ancien constructeur simplifie (pour compatibilite)
    public SpecificTest(int id, String title, String description,
                        String category, String status, String createdAt) {
        this.id = id;
        this.title = title;
        this.description = description;
        this.category = category;
        this.status = status;
        this.createdAt = createdAt;
        this.questions = new ArrayList<SpecificQuestion>();
    }

    public int getId() { return id; }
    public void setId(int id) { this.id = id; }

    public int getGeneralTestId() { return generalTestId; }
    public void setGeneralTestId(int generalTestId) { this.generalTestId = generalTestId; }

    public String getCategory() { return category; }
    public void setCategory(String category) { this.category = category; }

    public String getTitle() { return title; }
    public void setTitle(String title) { this.title = title; }

    public String getDescription() { return description; }
    public void setDescription(String description) { this.description = description; }

    public String getStatus() { return status; }
    public void setStatus(String status) { this.status = status; }

    public int getCreatedBy() { return createdBy; }
    public void setCreatedBy(int createdBy) { this.createdBy = createdBy; }

    public String getCreatedAt() { return createdAt; }
    public void setCreatedAt(String createdAt) { this.createdAt = createdAt; }

    public String getUpdatedAt() { return updatedAt; }
    public void setUpdatedAt(String updatedAt) { this.updatedAt = updatedAt; }

    public List<SpecificQuestion> getQuestions() { return questions; }
    public void setQuestions(List<SpecificQuestion> questions) { this.questions = questions; }

    @Override
    public String toString() {
        return title != null ? title : "Test #" + id;
    }
}