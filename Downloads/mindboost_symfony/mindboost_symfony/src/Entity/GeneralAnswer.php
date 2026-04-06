<?php

namespace App\Entity;

use App\Repository\GeneralAnswerRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: GeneralAnswerRepository::class)]
#[ORM\Table(name: 'general_answers')]
class GeneralAnswer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: GeneralQuestion::class, inversedBy: 'answers')]
    #[ORM\JoinColumn(name: 'question_id', nullable: false, onDelete: 'CASCADE')]
    private ?GeneralQuestion $question = null;

    #[ORM\Column(name: 'answer_label', length: 10, options: ['default' => 'A'])]
    private string $answerLabel = 'A';

    #[ORM\Column(name: 'answer_text', length: 255)]
    #[Assert\NotBlank(message: 'Le texte de la réponse est obligatoire.')]
    private ?string $answerText = null;

    #[ORM\Column(type: 'integer', options: ['default' => 0])]
    #[Assert\Range(min: 0, max: 100)]
    private int $score = 0;

    #[ORM\Column(name: 'answer_order', type: 'integer')]
    private int $answerOrder = 1;

    #[ORM\Column(name: 'created_at', type: 'datetime')]
    private ?\DateTimeInterface $createdAt = null;

    public function __construct()
    {
        $this->createdAt = new \DateTime();
    }

    public function getId(): ?int { return $this->id; }
    public function getQuestion(): ?GeneralQuestion { return $this->question; }
    public function setQuestion(?GeneralQuestion $v): static { $this->question = $v; return $this; }
    public function getAnswerLabel(): string { return $this->answerLabel; }
    public function setAnswerLabel(string $v): static { $this->answerLabel = $v; return $this; }
    public function getAnswerText(): ?string { return $this->answerText; }
    public function setAnswerText(string $v): static { $this->answerText = $v; return $this; }
    public function getScore(): int { return $this->score; }
    public function setScore(int $v): static { $this->score = $v; return $this; }
    public function getAnswerOrder(): int { return $this->answerOrder; }
    public function setAnswerOrder(int $v): static { $this->answerOrder = $v; return $this; }
    public function getCreatedAt(): ?\DateTimeInterface { return $this->createdAt; }
    public function setCreatedAt(\DateTimeInterface $v): static { $this->createdAt = $v; return $this; }
    public function __toString(): string { return $this->answerText ?? ''; }
}
