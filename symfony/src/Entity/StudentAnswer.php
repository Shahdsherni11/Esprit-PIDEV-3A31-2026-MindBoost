<?php

namespace App\Entity;

use App\Repository\StudentAnswerRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StudentAnswerRepository::class)]
#[ORM\Table(name: 'student_answers')]
class StudentAnswer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(name: 'specific_score_id')]
    private ?int $specificScoreId = null;

    #[ORM\Column(name: 'user_id')]
    private ?int $userId = null;

    #[ORM\Column(name: 'specific_test_id')]
    private ?int $specificTestId = null;

    #[ORM\Column(name: 'question_id')]
    private ?int $questionId = null;

    #[ORM\Column(name: 'question_text', type: 'text')]
    private ?string $questionText = null;

    #[ORM\Column(name: 'selected_answer_text', type: 'text')]
    private ?string $selectedAnswerText = null;

    #[ORM\Column(name: 'answer_score')]
    private ?int $answerScore = 0;

    #[ORM\Column(name: 'passed_at', type: 'datetime')]
    private ?\DateTimeInterface $passedAt = null;

    public function __construct()
    {
        $this->passedAt = new \DateTime();
    }

    public function getId(): ?int { return $this->id; }
    public function getSpecificScoreId(): ?int { return $this->specificScoreId; }
    public function setSpecificScoreId(int $specificScoreId): static { $this->specificScoreId = $specificScoreId; return $this; }
    public function getUserId(): ?int { return $this->userId; }
    public function setUserId(int $userId): static { $this->userId = $userId; return $this; }
    public function getSpecificTestId(): ?int { return $this->specificTestId; }
    public function setSpecificTestId(int $specificTestId): static { $this->specificTestId = $specificTestId; return $this; }
    public function getQuestionId(): ?int { return $this->questionId; }
    public function setQuestionId(int $questionId): static { $this->questionId = $questionId; return $this; }
    public function getQuestionText(): ?string { return $this->questionText; }
    public function setQuestionText(string $questionText): static { $this->questionText = $questionText; return $this; }
    public function getSelectedAnswerText(): ?string { return $this->selectedAnswerText; }
    public function setSelectedAnswerText(string $selectedAnswerText): static { $this->selectedAnswerText = $selectedAnswerText; return $this; }
    public function getAnswerScore(): ?int { return $this->answerScore; }
    public function setAnswerScore(int $answerScore): static { $this->answerScore = $answerScore; return $this; }
    public function getPassedAt(): ?\DateTimeInterface { return $this->passedAt; }
    public function setPassedAt(\DateTimeInterface $passedAt): static { $this->passedAt = $passedAt; return $this; }
}