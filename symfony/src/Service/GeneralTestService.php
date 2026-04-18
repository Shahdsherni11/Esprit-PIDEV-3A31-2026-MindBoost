<?php

namespace App\Service;

use App\Entity\GeneralAnswer;
use App\Entity\GeneralQuestion;
use App\Entity\GeneralTest;
use App\Repository\GeneralAnswerRepository;
use App\Repository\GeneralQuestionRepository;
use App\Repository\GeneralTestRepository;
use Doctrine\ORM\EntityManagerInterface;

class GeneralTestService
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private GeneralTestRepository $testRepository,
        private GeneralQuestionRepository $questionRepository,
        private GeneralAnswerRepository $answerRepository
    ) {
    }

    public function getAllTests(): array
    {
        return $this->testRepository->findBy([], ['createdAt' => 'DESC']);
    }

    public function getTestById(int $id): ?GeneralTest
    {
        $test = $this->testRepository->find($id);

        if (!$test) {
            throw new \Exception('Test général introuvable');
        }

        return $test;
    }

    public function getQuestionsByTest(GeneralTest $test): array
    {
        return $this->questionRepository->findBy(['test' => $test], ['questionOrder' => 'ASC']);
    }

    public function getAnswersByQuestion(GeneralQuestion $question): array
    {
        return $this->answerRepository->findBy(['question' => $question], ['answerOrder' => 'ASC']);
    }

    public function getQuestionsWithAnswers(GeneralTest $test): array
    {
        $questions = $this->getQuestionsByTest($test);
        $result = [];

        foreach ($questions as $question) {
            $result[] = [
                'question' => $question,
                'answers' => $this->getAnswersByQuestion($question),
            ];
        }

        return $result;
    }

    public function createTest(array $data): GeneralTest
    {
        $title = trim($data['title'] ?? '');
        $description = trim($data['description'] ?? '');
        $createdBy = (int) ($data['created_by'] ?? 1);
        $questionsData = $data['questions'] ?? [];

        if (empty($title)) {
            throw new \Exception('Le titre est obligatoire');
        }

        if (is_numeric($title)) {
            throw new \Exception('Le titre ne doit pas être uniquement des nombres');
        }

        if (strlen($title) < 3) {
            throw new \Exception('Le titre doit contenir au moins 3 caractères');
        }

        if (empty($questionsData)) {
            throw new \Exception('Le test doit contenir au moins une question');
        }

        $test = new GeneralTest();
        $test->setTitle($title);
        $test->setDescription($description ?: null);
        $test->setStatus('DRAFT');
        $test->setCreatedBy($createdBy);

        foreach ($questionsData as $questionData) {
            $questionText = trim($questionData['text'] ?? '');
            $questionOrder = (int) ($questionData['order'] ?? 0);
            $answersData = $questionData['answers'] ?? [];

            if (empty($questionText)) {
                continue;
            }

            $question = new GeneralQuestion();
            $question->setTest($test);
            $question->setQuestionText($questionText);
            $question->setQuestionOrder($questionOrder > 0 ? $questionOrder : 1);

            $answerOrder = 1;
            foreach ($answersData as $answerData) {
                $answerText = trim($answerData['text'] ?? '');
                $score = (int) ($answerData['score'] ?? 0);

                if (empty($answerText)) {
                    continue;
                }

                $answer = new GeneralAnswer();
                $answer->setQuestion($question);
                $answer->setAnswerLabel(chr(64 + $answerOrder));
                $answer->setAnswerText($answerText);
                $answer->setScore($score);
                $answer->setAnswerOrder($answerOrder);

                $question->addAnswer($answer);
                $answerOrder++;
            }

            $test->addQuestion($question);
        }

        if ($test->getQuestions()->isEmpty()) {
            throw new \Exception('Le test doit contenir au moins une question valide');
        }

        $this->entityManager->persist($test);
        $this->entityManager->flush();

        return $test;
    }

    public function updateTest(GeneralTest $test, array $data): GeneralTest
    {
        $title = trim($data['title'] ?? '');
        $description = trim($data['description'] ?? '');
        $status = trim($data['status'] ?? 'DRAFT');

        if (empty($title)) {
            throw new \Exception('Le titre est obligatoire');
        }

        if (is_numeric($title)) {
            throw new \Exception('Le titre ne doit pas être uniquement des nombres');
        }

        if (strlen($title) < 3) {
            throw new \Exception('Le titre doit contenir au moins 3 caractères');
        }

        if (!in_array($status, ['DRAFT', 'ACTIVE', 'INACTIVE', 'ARCHIVED'])) {
            throw new \Exception('Statut invalide');
        }

        $test->setTitle($title);
        $test->setDescription($description ?: null);
        $test->setStatus($status);
        $test->setUpdatedAt(new \DateTime());

        $this->entityManager->flush();

        return $test;
    }

    public function deleteTest(GeneralTest $test): void
    {
        $this->entityManager->remove($test);
        $this->entityManager->flush();
    }
}