<?php

namespace App\Service;

use App\Entity\GeneralTest;
use App\Entity\GeneralQuestion;
use App\Entity\GeneralAnswer;
use App\Repository\GeneralTestRepository;
use Doctrine\ORM\EntityManagerInterface;

class GeneralTestService
{
    private $repository;
    private $entityManager;

    public function __construct(
        GeneralTestRepository $repository,
        EntityManagerInterface $entityManager
    ) {
        $this->repository = $repository;
        $this->entityManager = $entityManager;
    }

    public function createTest(string $title, ?string $description, int $createdBy, ?array $questions = null): GeneralTest
    {
        if (empty(trim($title))) {
            throw new \Exception("Le titre ne peut pas être vide");
        }

        if (preg_match('/^\d+$/', trim($title))) {
            throw new \Exception("Le titre ne doit pas être uniquement des nombres");
        }

        if (strlen(trim($title)) < 3 || strlen(trim($title)) > 255) {
            throw new \Exception("Le titre doit avoir entre 3 et 255 caractères");
        }

        $test = new GeneralTest();
        $test->setTitle(trim($title));
        $test->setDescription($description ? trim($description) : null);
        $test->setStatus('DRAFT');
        $test->setCreatedBy($createdBy);
        $test->setCreatedAt(new \DateTime());
        $test->setUpdatedAt(new \DateTime());

        if (!empty($questions) && is_array($questions)) {
            foreach ($questions as $questionIndex => $questionData) {
                if (empty(trim($questionData['text'] ?? ''))) {
                    continue;
                }

                $question = new GeneralQuestion();
                $question->setTest($test);
                $question->setQuestionText(trim($questionData['text']));
                $question->setQuestionOrder((int)($questionData['order'] ?? ($questionIndex + 1)));
                $question->setCreatedAt(new \DateTime());

                if (!empty($questionData['answers']) && is_array($questionData['answers'])) {
                    foreach ($questionData['answers'] as $answerIndex => $answerData) {
                        if (empty(trim($answerData['text'] ?? ''))) {
                            continue;
                        }

                        $answer = new GeneralAnswer();
                        $answer->setQuestion($question);
                        $answer->setAnswerLabel($answerData['label'] ?? chr(65 + $answerIndex));
                        $answer->setAnswerText(trim($answerData['text']));
                        $answer->setScore((int)($answerData['score'] ?? 0));
                        $answer->setAnswerOrder((int)($answerData['order'] ?? ($answerIndex + 1)));
                        $answer->setCreatedAt(new \DateTime());

                        $question->addAnswer($answer);
                    }
                }

                $test->addQuestion($question);
            }
        }

        $this->entityManager->persist($test);
        $this->entityManager->flush();

        return $test;
    }

    public function getQuestionsWithAnswers(GeneralTest $test): array
    {
        $result = [];
        foreach ($test->getQuestions() as $question) {
            $answers = $question->getAnswers()->toArray();
            usort($answers, fn($a, $b) => $a->getAnswerOrder() <=> $b->getAnswerOrder());

            $result[] = [
                'question' => $question,
                'answers' => $answers
            ];
        }

        usort($result, fn($a, $b) => $a['question']->getQuestionOrder() <=> $b['question']->getQuestionOrder());

        return $result;
    }

    public function updateTest(GeneralTest $test, string $title, ?string $description, string $status): GeneralTest
    {
        if (empty(trim($title))) {
            throw new \Exception("Le titre ne peut pas être vide");
        }

        if (preg_match('/^\d+$/', trim($title))) {
            throw new \Exception("Le titre ne doit pas être uniquement des nombres");
        }

        if (strlen(trim($title)) < 3 || strlen(trim($title)) > 255) {
            throw new \Exception("Le titre doit avoir entre 3 et 255 caractères");
        }

        if (!in_array($status, ['DRAFT', 'ACTIVE', 'INACTIVE'])) {
            throw new \Exception("Statut invalide");
        }

        $test->setTitle(trim($title));
        $test->setDescription($description ? trim($description) : null);
        $test->setStatus($status);
        $test->setUpdatedAt(new \DateTime());

        $this->entityManager->flush();

        return $test;
    }

    public function getAllTests()
    {
        return $this->repository->findAll();
    }

    public function getTestById(int $id): GeneralTest
    {
        $test = $this->repository->find($id);
        if (!$test) {
            throw new \Exception("Test non trouvé avec l'ID: " . $id);
        }
        return $test;
    }

    public function deleteTest(GeneralTest $test): void
    {
        $this->entityManager->remove($test);
        $this->entityManager->flush();
    }
}