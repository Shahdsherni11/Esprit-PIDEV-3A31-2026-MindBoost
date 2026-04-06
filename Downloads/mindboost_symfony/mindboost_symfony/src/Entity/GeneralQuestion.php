<?php

namespace App\Entity;

use App\Repository\GeneralQuestionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: GeneralQuestionRepository::class)]
#[ORM\Table(name: 'general_questions')]
class GeneralQuestion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: GeneralTest::class, inversedBy: 'questions')]
    #[ORM\JoinColumn(name: 'test_id', nullable: false, onDelete: 'CASCADE')]
    private ?GeneralTest $generalTest = null;

    #[ORM\Column(name: 'question_text', type: 'text')]
    #[Assert\NotBlank(message: 'La question ne peut pas être vide.')]
    private ?string $questionText = null;

    #[ORM\Column(name: 'question_order', type: 'integer')]
    private int $questionOrder = 1;

    #[ORM\Column(name: 'created_at', type: 'datetime')]
    private ?\DateTimeInterface $createdAt = null;

    #[ORM\OneToMany(mappedBy: 'question', targetEntity: GeneralAnswer::class, cascade: ['persist', 'remove'], orphanRemoval: true)]
    #[ORM\OrderBy(['answerOrder' => 'ASC'])]
    private Collection $answers;

    public function __construct()
    {
        $this->createdAt = new \DateTime();
        $this->answers   = new ArrayCollection();
    }

    public function getId(): ?int { return $this->id; }
    public function getGeneralTest(): ?GeneralTest { return $this->generalTest; }
    public function setGeneralTest(?GeneralTest $v): static { $this->generalTest = $v; return $this; }
    public function getQuestionText(): ?string { return $this->questionText; }
    public function setQuestionText(string $v): static { $this->questionText = $v; return $this; }
    public function getQuestionOrder(): int { return $this->questionOrder; }
    public function setQuestionOrder(int $v): static { $this->questionOrder = $v; return $this; }
    public function getCreatedAt(): ?\DateTimeInterface { return $this->createdAt; }
    public function setCreatedAt(\DateTimeInterface $v): static { $this->createdAt = $v; return $this; }
    public function getAnswers(): Collection { return $this->answers; }
    public function __toString(): string { return $this->questionText ?? ''; }
}
