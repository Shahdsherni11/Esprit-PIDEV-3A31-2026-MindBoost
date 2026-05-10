package com.mindboost.app.model;

import jakarta.persistence.*;

import java.time.LocalDateTime;
import java.util.ArrayList;
import java.util.List;

@Entity
@Table(name = "specific_questions")
public class SpecificQuestion {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Integer id;

    @ManyToOne(fetch = FetchType.LAZY)
    @JoinColumn(name = "test_id")
    private SpecificTest test;

    @Column(name = "question_text", columnDefinition = "LONGTEXT", nullable = false)
    private String questionText;

    @Column(name = "question_order", nullable = false)
    private Integer questionOrder = 1;

    @Column(name = "created_at", nullable = false)
    private LocalDateTime createdAt = LocalDateTime.now();

    @OneToMany(mappedBy = "question", cascade = CascadeType.ALL, orphanRemoval = true)
    private List<SpecificAnswer> answers = new ArrayList<>();

    public Integer getId() {
        return id;
    }

    public SpecificTest getTest() {
        return test;
    }

    public void setTest(SpecificTest test) {
        this.test = test;
    }

    public String getQuestionText() {
        return questionText;
    }

    public void setQuestionText(String questionText) {
        this.questionText = questionText;
    }

    public Integer getQuestionOrder() {
        return questionOrder;
    }

    public void setQuestionOrder(Integer questionOrder) {
        this.questionOrder = questionOrder;
    }

    public LocalDateTime getCreatedAt() {
        return createdAt;
    }

    public void setCreatedAt(LocalDateTime createdAt) {
        this.createdAt = createdAt;
    }

    public List<SpecificAnswer> getAnswers() {
        return answers;
    }

    public void addAnswer(SpecificAnswer answer) {
        answers.add(answer);
        answer.setQuestion(this);
    }

    public void removeAnswer(SpecificAnswer answer) {
        answers.remove(answer);
        answer.setQuestion(null);
    }
}
