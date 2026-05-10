package com.mindboost.app.service;

import com.mindboost.app.config.DatabaseManager;
import com.mindboost.app.model.GeneralAnswer;
import com.mindboost.app.model.GeneralQuestion;
import com.mindboost.app.model.GeneralTest;
import jakarta.persistence.EntityManager;
import jakarta.persistence.TypedQuery;

import java.time.LocalDateTime;
import java.util.ArrayList;
import java.util.List;

public class GeneralTestService extends BaseService<GeneralTest> {
    public GeneralTestService(DatabaseManager databaseManager) {
        super(databaseManager, GeneralTest.class);
    }

    public List<GeneralTest> findAllOrdered() {
        try (EntityManager em = databaseManager.createEntityManager()) {
            return em.createQuery("select t from GeneralTest t order by t.createdAt desc", GeneralTest.class)
                .getResultList();
        }
    }

    public GeneralTest requireById(int id) {
        return findById(id).orElseThrow(() -> new IllegalArgumentException("Test général introuvable"));
    }

    public List<GeneralQuestion> getQuestionsByTest(GeneralTest test) {
        try (EntityManager em = databaseManager.createEntityManager()) {
            TypedQuery<GeneralQuestion> query = em.createQuery(
                "select q from GeneralQuestion q where q.test = :test order by q.questionOrder asc",
                GeneralQuestion.class
            );
            query.setParameter("test", test);
            return query.getResultList();
        }
    }

    public List<GeneralAnswer> getAnswersByQuestion(GeneralQuestion question) {
        try (EntityManager em = databaseManager.createEntityManager()) {
            TypedQuery<GeneralAnswer> query = em.createQuery(
                "select a from GeneralAnswer a where a.question = :question order by a.answerOrder asc",
                GeneralAnswer.class
            );
            query.setParameter("question", question);
            return query.getResultList();
        }
    }

    public List<QuestionWithAnswers> getQuestionsWithAnswers(GeneralTest test) {
        List<QuestionWithAnswers> result = new ArrayList<>();
        for (GeneralQuestion question : getQuestionsByTest(test)) {
            result.add(new QuestionWithAnswers(question, getAnswersByQuestion(question)));
        }
        return result;
    }

    public GeneralTest createTest(String title, String description, int createdBy, List<QuestionDraft> questions) {
        if (title == null || title.trim().isEmpty()) {
            throw new IllegalArgumentException("Le titre est obligatoire");
        }
        String trimmedTitle = title.trim();
        if (trimmedTitle.matches("\\d+")) {
            throw new IllegalArgumentException("Le titre ne doit pas être uniquement des nombres");
        }
        if (trimmedTitle.length() < 3 || trimmedTitle.length() > 255) {
            throw new IllegalArgumentException("Le titre doit avoir entre 3 et 255 caractères");
        }
        if (questions == null || questions.isEmpty()) {
            throw new IllegalArgumentException("Le test doit contenir au moins une question");
        }

        GeneralTest test = new GeneralTest();
        test.setTitle(trimmedTitle);
        test.setDescription(description == null || description.isBlank() ? null : description.trim());
        test.setStatus("DRAFT");
        test.setCreatedBy(createdBy);
        test.setCreatedAt(LocalDateTime.now());
        test.setUpdatedAt(LocalDateTime.now());

        int order = 1;
        for (QuestionDraft draft : questions) {
            if (draft.text() == null || draft.text().isBlank()) {
                continue;
            }
            GeneralQuestion question = new GeneralQuestion();
            question.setQuestionText(draft.text().trim());
            question.setQuestionOrder(order++);
            question.setCreatedAt(LocalDateTime.now());
            question.setTest(test);

            int answerOrder = 1;
            for (AnswerDraft answerDraft : draft.answers()) {
                if (answerDraft.text() == null || answerDraft.text().isBlank()) {
                    continue;
                }
                GeneralAnswer answer = new GeneralAnswer();
                answer.setQuestion(question);
                answer.setAnswerLabel(String.valueOf((char) (64 + answerOrder)));
                answer.setAnswerText(answerDraft.text().trim());
                answer.setScore(answerDraft.score());
                answer.setAnswerOrder(answerOrder++);
                answer.setCreatedAt(LocalDateTime.now());
                question.addAnswer(answer);
            }
            test.addQuestion(question);
        }

        if (test.getQuestions().isEmpty()) {
            throw new IllegalArgumentException("Le test doit contenir au moins une question valide");
        }

        return save(test);
    }

    public GeneralTest updateTest(GeneralTest test, String title, String description, String status) {
        if (title == null || title.trim().isEmpty()) {
            throw new IllegalArgumentException("Le titre est obligatoire");
        }
        String trimmedTitle = title.trim();
        if (trimmedTitle.matches("\\d+")) {
            throw new IllegalArgumentException("Le titre ne doit pas être uniquement des nombres");
        }
        if (trimmedTitle.length() < 3 || trimmedTitle.length() > 255) {
            throw new IllegalArgumentException("Le titre doit avoir entre 3 et 255 caractères");
        }
        if (!List.of("DRAFT", "ACTIVE", "INACTIVE", "ARCHIVED").contains(status)) {
            throw new IllegalArgumentException("Statut invalide");
        }

        test.setTitle(trimmedTitle);
        test.setDescription(description == null || description.isBlank() ? null : description.trim());
        test.setStatus(status);
        test.setUpdatedAt(LocalDateTime.now());
        return save(test);
    }

    public record QuestionWithAnswers(GeneralQuestion question, List<GeneralAnswer> answers) {}

    public record QuestionDraft(String text, List<AnswerDraft> answers) {}

    public record AnswerDraft(String text, int score) {}
}
