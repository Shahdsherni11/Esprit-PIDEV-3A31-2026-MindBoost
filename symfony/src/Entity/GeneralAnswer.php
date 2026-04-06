<?php

namespace App\Entity;

use App\Repository\GeneralAnswerRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GeneralAnswerRepository::class)]
#[ORM\Table(name: 'general_answers')]
class GeneralAnswer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: GeneralQuestion::class, inversedBy: 'answers')]
    #[ORM\JoinColumn(name: 'question_id', referencedColumnName: 'id', nullable: false, onDelete: 'CASCADE')]
    private ?GeneralQuestion $question = null;

    #[ORM\Column(name: 'answer_label', length: 10, options: ['default' => 'A'])]
    private ?string $answerLabel = 'A';

    #[ORM\Column(name: 'answer_text', length: 255)]
    private ?string $answerText = null;

    #[ORM\Column]
    private ?int $score = 0;

    #[ORM\Column(name: 'answer_order')]
    private ?int $answerOrder = null;

    #[ORM\Column(name: 'created_at', type: 'datetime')]
    private ?\DateTimeInterface $createdAt = null;

    public function __construct()
    {
        $this->createdAt = new \DateTime();
    }

    public function getId(): ?int { return $this->id; }
    public function getQuestion(): ?GeneralQuestion { return $this->question; }
    public function setQuestion(?GeneralQuestion $question): static { $this->question = $question; return $this; }
    public function getAnswerLabel(): ?string { return $this->answerLabel; }
    public function setAnswerLabel(string $answerLabel): static { $this->answerLabel = $answerLabel; return $this; }
    public function getAnswerText(): ?string { return $this->answerText; }
    public function setAnswerText(string $answerText): static { $this->answerText = $answerText; return $this; }
    public function getScore(): ?int { return $this->score; }
    public function setScore(int $score): static { $this->score = $score; return $this; }
    public function getAnswerOrder(): ?int { return $this->answerOrder; }
    public function setAnswerOrder(int $answerOrder): static { $this->answerOrder = $answerOrder; return $this; }
    public function getCreatedAt(): ?\DateTimeInterface { return $this->createdAt; }
    public function setCreatedAt(\DateTimeInterface $createdAt): static { $this->createdAt = $createdAt; return $this; }
}