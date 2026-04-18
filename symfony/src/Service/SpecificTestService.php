<?php

namespace App\Service;

use App\Entity\SpecificAnswer;
use App\Entity\SpecificQuestion;
use App\Entity\SpecificTest;
use App\Repository\SpecificAnswerRepository;
use App\Repository\SpecificQuestionRepository;
use App\Repository\SpecificTestRepository;
use Doctrine\ORM\EntityManagerInterface;

class SpecificTestService
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private SpecificTestRepository $testRepository,
        private SpecificQuestionRepository $questionRepository,
        private SpecificAnswerRepository $answerRepository
    ) {
    }

    public function getAllTests(): array
    {
        return $this->testRepository->findBy([], ['createdAt' => 'DESC']);
    }

    public function getTestById(int $id): ?SpecificTest
    {
        $test = $this->testRepository->find($id);

        if (!$test) {
            throw new \Exception('Test spécifique introuvable');
        }

        return $test;
    }

    public function getQuestionsByTest(SpecificTest $test): array
    {
        return $this->questionRepository->findBy(['test' => $test], ['questionOrder' => 'ASC']);
    }

    public function getAnswersByQuestion(SpecificQuestion $question): array
    {
        return $this->answerRepository->findBy(['question' => $question], ['answerOrder' => 'ASC']);
    }

    public function getQuestionsWithAnswers(SpecificTest $test): array
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

    public function createTest(array $data): SpecificTest
    {
        $generalTestId = (int) ($data['general_test_id'] ?? 0);
        $category = trim($data['category'] ?? '');
        $title = trim($data['title'] ?? '');
        $description = trim($data['description'] ?? '');
        $createdBy = (int) ($data['created_by'] ?? 1);
        $questionsData = $data['questions'] ?? [];

        if ($generalTestId <= 0) {
            throw new \Exception('Le test général parent est obligatoire');
        }

        if (empty($category)) {
            throw new \Exception('La catégorie est obligatoire');
        }

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

        $test = new SpecificTest();
        $test->setGeneralTestId($generalTestId);
        $test->setCategory($category);
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

            $question = new SpecificQuestion();
            $question->setTest($test);
            $question->setQuestionText($questionText);
            $question->setQuestionOrder($questionOrder > 0 ? $questionOrder : 1);
            $question->setCreatedAt(new \DateTime());

            $answerOrder = 1;
            foreach ($answersData as $answerData) {
                $answerText = trim($answerData['text'] ?? '');
                $score = (int) ($answerData['score'] ?? 0);

                if (empty($answerText)) {
                    continue;
                }

                $answer = new SpecificAnswer();
                $answer->setQuestion($question);
                $answer->setAnswerText($answerText);
                $answer->setScore($score);
                $answer->setAnswerOrder($answerOrder);
                $answer->setCreatedAt(new \DateTime());

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

    public function updateTest(SpecificTest $test, array $data): SpecificTest
    {
        $generalTestId = (int) ($data['general_test_id'] ?? 0);
        $category = trim($data['category'] ?? '');
        $title = trim($data['title'] ?? '');
        $description = trim($data['description'] ?? '');
        $status = trim($data['status'] ?? 'DRAFT');

        if ($generalTestId <= 0) {
            throw new \Exception('Le test général parent est obligatoire');
        }

        if (empty($category)) {
            throw new \Exception('La catégorie est obligatoire');
        }

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

        if ($status === 'ACTIVE') {
            $existingActive = $this->testRepository->findOneBy([
                'category' => $category,
                'status' => 'ACTIVE'
            ]);

            if ($existingActive && $existingActive->getId() !== $test->getId()) {
                throw new \Exception('Un seul test spécifique peut être actif par catégorie');
            }
        }

        $test->setGeneralTestId($generalTestId);
        $test->setCategory($category);
        $test->setTitle($title);
        $test->setDescription($description ?: null);
        $test->setStatus($status);
        $test->setUpdatedAt(new \DateTime());

        $this->entityManager->flush();

        return $test;
    }

    public function deleteTest(SpecificTest $test): void
    {
        $this->entityManager->remove($test);
        $this->entityManager->flush();
    }
}