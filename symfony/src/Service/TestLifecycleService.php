<?php

namespace App\Service;

use App\Entity\GeneralTest;
use App\Entity\SpecificTest;
use App\Entity\GeneralQuestion;
use App\Entity\GeneralAnswer;
use App\Entity\SpecificQuestion;
use App\Entity\SpecificAnswer;
use Doctrine\ORM\EntityManagerInterface;

class TestLifecycleService
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function archiveGeneralTest(GeneralTest $test): void
    {
        $test->setStatus('ARCHIVED');
        $test->setUpdatedAt(new \DateTime());
        $this->entityManager->flush();
    }

    public function archiveSpecificTest(SpecificTest $test): void
    {
        $test->setStatus('ARCHIVED');
        $test->setUpdatedAt(new \DateTime());
        $this->entityManager->flush();
    }

    public function duplicateGeneralTest(GeneralTest $source): GeneralTest
    {
        $copy = new GeneralTest();
        $copy->setTitle($source->getTitle() . ' (Copie)');
        $copy->setDescription($source->getDescription());
        $copy->setStatus('DRAFT');
        $copy->setCreatedBy($source->getCreatedBy());

        foreach ($source->getQuestions() as $question) {
            $newQuestion = new GeneralQuestion();
            $newQuestion->setTest($copy);
            $newQuestion->setQuestionText($question->getQuestionText());
            $newQuestion->setQuestionOrder($question->getQuestionOrder());

            foreach ($question->getAnswers() as $answer) {
                $newAnswer = new GeneralAnswer();
                $newAnswer->setQuestion($newQuestion);
                $newAnswer->setAnswerLabel($answer->getAnswerLabel());
                $newAnswer->setAnswerText($answer->getAnswerText());
                $newAnswer->setScore($answer->getScore());
                $newAnswer->setAnswerOrder($answer->getAnswerOrder());
                $newQuestion->addAnswer($newAnswer);
            }

            $copy->addQuestion($newQuestion);
        }

        $this->entityManager->persist($copy);
        $this->entityManager->flush();

        return $copy;
    }

    public function duplicateSpecificTest(SpecificTest $source): SpecificTest
    {
        $copy = new SpecificTest();
        $copy->setGeneralTestId($source->getGeneralTestId());
        $copy->setCategory($source->getCategory());
        $copy->setTitle($source->getTitle() . ' (Copie)');
        $copy->setDescription($source->getDescription());
        $copy->setStatus('DRAFT');
        $copy->setCreatedBy($source->getCreatedBy());
        $copy->setCreatedAt(new \DateTime());
        $copy->setUpdatedAt(new \DateTime());

        foreach ($source->getQuestions() as $question) {
            $newQuestion = new SpecificQuestion();
            $newQuestion->setTest($copy);
            $newQuestion->setQuestionText($question->getQuestionText());
            $newQuestion->setQuestionOrder($question->getQuestionOrder());
            $newQuestion->setCreatedAt(new \DateTime());

            foreach ($question->getAnswers() as $answer) {
                $newAnswer = new SpecificAnswer();
                $newAnswer->setQuestion($newQuestion);
                $newAnswer->setAnswerText($answer->getAnswerText());
                $newAnswer->setScore($answer->getScore());
                $newAnswer->setAnswerOrder($answer->getAnswerOrder());
                $newAnswer->setCreatedAt(new \DateTime());
                $newQuestion->addAnswer($newAnswer);
            }

            $copy->addQuestion($newQuestion);
        }

        $this->entityManager->persist($copy);
        $this->entityManager->flush();

        return $copy;
    }
}