package com.mindboost.app.service;

import com.mindboost.app.config.DatabaseManager;
import com.mindboost.app.model.SpecificAnswer;
import com.mindboost.app.model.SpecificQuestion;
import com.mindboost.app.model.SpecificTest;
import jakarta.persistence.EntityManager;
import jakarta.persistence.TypedQuery;

import java.time.LocalDateTime;
import java.util.ArrayList;
import java.util.List;

public class SpecificTestService extends BaseService<SpecificTest> {
    public SpecificTestService(DatabaseManager databaseManager) {
        super(databaseManager, SpecificTest.class);
    }

    public List<SpecificTest> findAllOrdered() {
        try (EntityManager em = databaseManager.createEntityManager()) {
            return em.createQuery("select t from SpecificTest t order by t.createdAt desc", SpecificTest.class)
                .getResultList();
        }
    }

    public SpecificTest requireById(int id) {
        return findById(id).orElseThrow(() -> new IllegalArgumentException("Test spécifique introuvable"));
    }

    public List<SpecificQuestion> getQuestionsByTest(SpecificTest test) {
        try (EntityManager em = databaseManager.createEntityManager()) {
            TypedQuery<SpecificQuestion> query = em.createQuery(
                "select q from SpecificQuestion q where q.test = :test order by q.questionOrder asc",
                SpecificQuestion.class
            );
            query.setParameter("test", test);
            return query.getResultList();
        }
    }

    public List<SpecificAnswer> getAnswersByQuestion(SpecificQuestion question) {
        try (EntityManager em = databaseManager.createEntityManager()) {
            TypedQuery<SpecificAnswer> query = em.createQuery(
                "select a from SpecificAnswer a where a.question = :question order by a.answerOrder asc",
                SpecificAnswer.class
            );
            query.setParameter("question", question);
            return query.getResultList();
        }
    }

    public List<QuestionWithAnswers> getQuestionsWithAnswers(SpecificTest test) {
        List<QuestionWithAnswers> result = new ArrayList<>();
        for (SpecificQuestion question : getQuestionsByTest(test)) {
            result.add(new QuestionWithAnswers(question, getAnswersByQuestion(question)));
        }
        return result;
    }

    public SpecificTest createTest(int generalTestId, String category, String title, String description, int createdBy, List<QuestionDraft> questions) {
        if (generalTestId <= 0) {
            throw new IllegalArgumentException("Le test général parent est obligatoire");
        }
        if (category == null || category.trim().isEmpty()) {
            throw new IllegalArgumentException("La catégorie est obligatoire");
        }
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
            throw new IllegalArgumentException("Vous devez ajouter au moins une question");
        }

        SpecificTest test = new SpecificTest();
        test.setGeneralTestId(generalTestId);
        test.setCategory(category.trim());
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
            SpecificQuestion question = new SpecificQuestion();
            question.setQuestionText(draft.text().trim());
            question.setQuestionOrder(order++);
            question.setCreatedAt(LocalDateTime.now());
            question.setTest(test);

            int answerOrder = 1;
            for (AnswerDraft answerDraft : draft.answers()) {
                if (answerDraft.text() == null || answerDraft.text().isBlank()) {
                    continue;
                }
                SpecificAnswer answer = new SpecificAnswer();
                answer.setQuestion(question);
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

    public SpecificTest updateTest(SpecificTest test, int generalTestId, String category, String title, String description, String status) {
        if (generalTestId <= 0) {
            throw new IllegalArgumentException("Le test général parent est obligatoire");
        }
        if (category == null || category.trim().isEmpty()) {
            throw new IllegalArgumentException("La catégorie est obligatoire");
        }
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

        if ("ACTIVE".equals(status)) {
            try (EntityManager em = databaseManager.createEntityManager()) {
                TypedQuery<SpecificTest> query = em.createQuery(
                    "select t from SpecificTest t where t.category = :category and t.status = 'ACTIVE'",
                    SpecificTest.class
                );
                query.setParameter("category", category.trim());
                SpecificTest existing = query.getResultStream().findFirst().orElse(null);
                if (existing != null && !existing.getId().equals(test.getId())) {
                    throw new IllegalArgumentException("Un seul test spécifique peut être actif par catégorie");
                }
            }
        }

        test.setGeneralTestId(generalTestId);
        test.setCategory(category.trim());
        test.setTitle(trimmedTitle);
        test.setDescription(description == null || description.isBlank() ? null : description.trim());
        test.setStatus(status);
        test.setUpdatedAt(LocalDateTime.now());
        return save(test);
    }

    public record QuestionWithAnswers(SpecificQuestion question, List<SpecificAnswer> answers) {}

    public record QuestionDraft(String text, List<AnswerDraft> answers) {}

    public record AnswerDraft(String text, int score) {}
}
