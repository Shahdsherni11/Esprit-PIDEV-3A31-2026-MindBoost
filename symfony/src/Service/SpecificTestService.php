<?php

namespace App\Service;

use App\Entity\SpecificTest;
use App\Entity\SpecificQuestion;
use App\Entity\SpecificAnswer;
use App\Repository\SpecificTestRepository;
use App\Repository\SpecificQuestionRepository;
use App\Repository\SpecificAnswerRepository;
use Doctrine\ORM\EntityManagerInterface;

class SpecificTestService
{
    private $repository;
    private $questionRepository;
    private $answerRepository;
    private $entityManager;

    public function __construct(
        SpecificTestRepository $repository,
        SpecificQuestionRepository $questionRepository,
        SpecificAnswerRepository $answerRepository,
        EntityManagerInterface $entityManager
    ) {
        $this->repository = $repository;
        $this->questionRepository = $questionRepository;
        $this->answerRepository = $answerRepository;
        $this->entityManager = $entityManager;
    }

    private function getValidCategories(): array
    {
        return ['Anxiete', 'Stress', 'Depression', 'Trouble du Sommeil'];
    }

    public function createTest(
        int $generalTestId,
        string $category,
        string $title,
        ?string $description,
        int $createdBy,
        ?array $questions = null
    ): SpecificTest {
        if ($generalTestId <= 0) {
            throw new \Exception("Le test général parent est obligatoire");
        }

        $category = trim($category);

        if ($category === '') {
            throw new \Exception("La catégorie est obligatoire");
        }

        if (!in_array($category, $this->getValidCategories(), true)) {
            throw new \Exception("Catégorie invalide");
        }

        if (!$title || empty(trim($title))) {
            throw new \Exception("Le titre est obligatoire");
        }

        if (preg_match('/^\d+$/', trim($title))) {
            throw new \Exception("Le titre ne doit pas être uniquement des nombres");
        }

        if (strlen(trim($title)) < 3 || strlen(trim($title)) > 255) {
            throw new \Exception("Le titre doit avoir entre 3 et 255 caractères");
        }

        if (empty($questions) || !is_array($questions)) {
            throw new \Exception("Vous devez ajouter au moins une question");
        }

        $test = new SpecificTest();
        $test->setGeneralTestId($generalTestId);
        $test->setCategory($category);
        $test->setTitle(trim($title));
        $test->setDescription($description ? trim($description) : null);
        $test->setStatus('DRAFT');
        $test->setCreatedBy((int)$createdBy);
        $test->setCreatedAt(new \DateTime());
        $test->setUpdatedAt(new \DateTime());

        $this->entityManager->persist($test);
        $this->entityManager->flush();

        foreach ($questions as $questionIndex => $questionData) {
            if (empty(trim($questionData['text'] ?? ''))) {
                continue;
            }

            $question = new SpecificQuestion();
            $question->setTest($test);
            $question->setQuestionText(trim($questionData['text']));
            $question->setQuestionOrder((int)($questionData['order'] ?? ($questionIndex + 1)));
            $question->setCreatedAt(new \DateTime());

            $this->entityManager->persist($question);
            $this->entityManager->flush();

            if (!empty($questionData['answers']) && is_array($questionData['answers'])) {
                foreach ($questionData['answers'] as $answerIndex => $answerData) {
                    if (empty(trim($answerData['text'] ?? ''))) {
                        continue;
                    }

                    $answer = new SpecificAnswer();
                    $answer->setQuestion($question);
                    $answer->setAnswerText(trim($answerData['text']));
                    $answer->setScore((int)($answerData['score'] ?? 0));
                    $answer->setAnswerOrder((int)($answerData['order'] ?? ($answerIndex + 1)));
                    $answer->setCreatedAt(new \DateTime());

                    $this->entityManager->persist($answer);
                }
            }
        }

        $this->entityManager->flush();

        return $test;
    }

    public function getQuestionsWithAnswers(SpecificTest $test): array
    {
        $questions = $this->questionRepository->findBy(
            ['test' => $test],
            ['questionOrder' => 'ASC']
        );

        $result = [];
        foreach ($questions as $question) {
            $answers = $this->answerRepository->findBy(
                ['question' => $question],
                ['answerOrder' => 'ASC']
            );

            $result[] = [
                'question' => $question,
                'answers' => $answers
            ];
        }

        return $result;
    }

    public function updateTest(
        SpecificTest $test,
        int $generalTestId,
        string $category,
        string $title,
        ?string $description,
        string $status
    ): SpecificTest {
        if ($generalTestId <= 0) {
            throw new \Exception("Le test général parent est obligatoire");
        }

        $category = trim($category);

        if ($category === '') {
            throw new \Exception("La catégorie est obligatoire");
        }

        if (!in_array($category, $this->getValidCategories(), true)) {
            throw new \Exception("Catégorie invalide");
        }

        if (!$title || empty(trim($title))) {
            throw new \Exception("Le titre est obligatoire");
        }

        if (preg_match('/^\d+$/', trim($title))) {
            throw new \Exception("Le titre ne doit pas être uniquement des nombres");
        }

        if (strlen(trim($title)) < 3 || strlen(trim($title)) > 255) {
            throw new \Exception("Le titre doit avoir entre 3 et 255 caractères");
        }

        if (!in_array($status, ['DRAFT', 'ACTIVE', 'INACTIVE'], true)) {
            throw new \Exception("Statut invalide");
        }

        $isNewActivation = $status === 'ACTIVE'
            && ($test->getStatus() !== 'ACTIVE' || $test->getCategory() !== $category);

        if ($isNewActivation) {
            $existingActiveTests = $this->repository->findBy([
                'category' => $category,
                'status' => 'ACTIVE'
            ]);

            foreach ($existingActiveTests as $existingTest) {
                if ($existingTest->getId() !== $test->getId()) {
                    throw new \Exception("Il existe déjà un test spécifique actif pour la catégorie : " . $category);
                }
            }
        }

        $test->setGeneralTestId($generalTestId);
        $test->setCategory($category);
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

    public function getTestById(int $id): SpecificTest
    {
        $test = $this->repository->find($id);
        if (!$test) {
            throw new \Exception("Test spécifique non trouvé avec l'ID: " . $id);
        }
        return $test;
    }

    public function deleteTest(SpecificTest $test): void
    {
        $this->entityManager->remove($test);
        $this->entityManager->flush();
    }
}