package com.mindboost.app.model;

import jakarta.persistence.*;

import java.time.LocalDateTime;
import java.util.ArrayList;
import java.util.List;

@Entity
@Table(name = "specific_tests")
public class SpecificTest {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Integer id;

    @Column(name = "general_test_id")
    private Integer generalTestId;

    @Column(length = 100, nullable = false)
    private String category;

    @Column(length = 255, nullable = false)
    private String title;

    @Column(columnDefinition = "LONGTEXT")
    private String description;

    @Column(length = 50, nullable = false)
    private String status = "DRAFT";

    @Column(name = "created_by", nullable = false)
    private Integer createdBy = 1;

    @Column(name = "created_at", nullable = false)
    private LocalDateTime createdAt = LocalDateTime.now();

    @Column(name = "updated_at", nullable = false)
    private LocalDateTime updatedAt = LocalDateTime.now();

    @OneToMany(mappedBy = "test", cascade = CascadeType.ALL, orphanRemoval = true)
    private List<SpecificQuestion> questions = new ArrayList<>();

    public Integer getId() {
        return id;
    }

    public Integer getGeneralTestId() {
        return generalTestId;
    }

    public void setGeneralTestId(Integer generalTestId) {
        this.generalTestId = generalTestId;
    }

    public String getCategory() {
        return category;
    }

    public void setCategory(String category) {
        this.category = category;
    }

    public String getTitle() {
        return title;
    }

    public void setTitle(String title) {
        this.title = title;
    }

    public String getDescription() {
        return description;
    }

    public void setDescription(String description) {
        this.description = description;
    }

    public String getStatus() {
        return status;
    }

    public void setStatus(String status) {
        this.status = status;
    }

    public Integer getCreatedBy() {
        return createdBy;
    }

    public void setCreatedBy(Integer createdBy) {
        this.createdBy = createdBy;
    }

    public LocalDateTime getCreatedAt() {
        return createdAt;
    }

    public void setCreatedAt(LocalDateTime createdAt) {
        this.createdAt = createdAt;
    }

    public LocalDateTime getUpdatedAt() {
        return updatedAt;
    }

    public void setUpdatedAt(LocalDateTime updatedAt) {
        this.updatedAt = updatedAt;
    }

    public List<SpecificQuestion> getQuestions() {
        return questions;
    }

    public void addQuestion(SpecificQuestion question) {
        questions.add(question);
        question.setTest(this);
    }

    public void removeQuestion(SpecificQuestion question) {
        questions.remove(question);
        question.setTest(null);
    }
}
