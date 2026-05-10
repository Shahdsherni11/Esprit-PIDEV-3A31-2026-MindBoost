package com.mindboost.app.service;

import com.mindboost.app.config.DatabaseManager;
import com.mindboost.app.model.GeneralAnswer;
import com.mindboost.app.model.GeneralQuestion;
import com.mindboost.app.model.GeneralTest;
import com.mindboost.app.model.SpecificAnswer;
import com.mindboost.app.model.SpecificQuestion;
import com.mindboost.app.model.SpecificTest;

import java.time.LocalDateTime;

public class TestLifecycleService {
    private final DatabaseManager databaseManager;

    public TestLifecycleService(DatabaseManager databaseManager) {
        this.databaseManager = databaseManager;
    }

    public void archiveGeneralTest(GeneralTest test) {
        test.setStatus("ARCHIVED");
        test.setUpdatedAt(LocalDateTime.now());
        new GeneralTestService(databaseManager).save(test);
    }

    public void archiveSpecificTest(SpecificTest test) {
        test.setStatus("ARCHIVED");
        test.setUpdatedAt(LocalDateTime.now());
        new SpecificTestService(databaseManager).save(test);
    }

    public GeneralTest duplicateGeneralTest(GeneralTest source) {
        GeneralTest copy = new GeneralTest();
        copy.setTitle(source.getTitle() + " (Copie)");
        copy.setDescription(source.getDescription());
        copy.setStatus("DRAFT");
        copy.setCreatedBy(source.getCreatedBy());
        copy.setCreatedAt(LocalDateTime.now());
        copy.setUpdatedAt(LocalDateTime.now());

        for (GeneralQuestion question : source.getQuestions()) {
            GeneralQuestion newQuestion = new GeneralQuestion();
            newQuestion.setQuestionText(question.getQuestionText());
            newQuestion.setQuestionOrder(question.getQuestionOrder());
            newQuestion.setCreatedAt(LocalDateTime.now());
            newQuestion.setTest(copy);

            for (GeneralAnswer answer : question.getAnswers()) {
                GeneralAnswer newAnswer = new GeneralAnswer();
                newAnswer.setAnswerLabel(answer.getAnswerLabel());
                newAnswer.setAnswerText(answer.getAnswerText());
                newAnswer.setScore(answer.getScore());
                newAnswer.setAnswerOrder(answer.getAnswerOrder());
                newAnswer.setCreatedAt(LocalDateTime.now());
                newAnswer.setQuestion(newQuestion);
                newQuestion.addAnswer(newAnswer);
            }

            copy.addQuestion(newQuestion);
        }

        return new GeneralTestService(databaseManager).save(copy);
    }

    public SpecificTest duplicateSpecificTest(SpecificTest source) {
        SpecificTest copy = new SpecificTest();
        copy.setGeneralTestId(source.getGeneralTestId());
        copy.setCategory(source.getCategory());
        copy.setTitle(source.getTitle() + " (Copie)");
        copy.setDescription(source.getDescription());
        copy.setStatus("DRAFT");
        copy.setCreatedBy(source.getCreatedBy());
        copy.setCreatedAt(LocalDateTime.now());
        copy.setUpdatedAt(LocalDateTime.now());

        for (SpecificQuestion question : source.getQuestions()) {
            SpecificQuestion newQuestion = new SpecificQuestion();
            newQuestion.setQuestionText(question.getQuestionText());
            newQuestion.setQuestionOrder(question.getQuestionOrder());
            newQuestion.setCreatedAt(LocalDateTime.now());
            newQuestion.setTest(copy);

            for (SpecificAnswer answer : question.getAnswers()) {
                SpecificAnswer newAnswer = new SpecificAnswer();
                newAnswer.setAnswerText(answer.getAnswerText());
                newAnswer.setScore(answer.getScore());
                newAnswer.setAnswerOrder(answer.getAnswerOrder());
                newAnswer.setCreatedAt(LocalDateTime.now());
                newAnswer.setQuestion(newQuestion);
                newQuestion.addAnswer(newAnswer);
            }

            copy.addQuestion(newQuestion);
        }

        return new SpecificTestService(databaseManager).save(copy);
    }
}
