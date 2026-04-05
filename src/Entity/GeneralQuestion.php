<?php

namespace App\Entity;

use App\Repository\GeneralQuestionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GeneralQuestionRepository::class)]
#[ORM\Table(name: 'general_questions')]
class GeneralQuestion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: GeneralTest::class, inversedBy: 'questions')]
    #[ORM\JoinColumn(name: 'test_id', referencedColumnName: 'id', onDelete: 'CASCADE')]
    private ?GeneralTest $test = null;

    #[ORM\Column(type: 'text')]
    private ?string $questionText = null;

    #[ORM\Column]
    private ?int $questionOrder = null;

    #[ORM\Column(type: 'datetime')]
    private ?\DateTimeInterface $createdAt = null;

    #[ORM\OneToMany(mappedBy: 'question', targetEntity: GeneralAnswer::class, cascade: ['persist', 'remove'])]
    private Collection $answers;

    public function __construct()
    {
        $this->createdAt = new \DateTime();
        $this->answers = new ArrayCollection();
    }

    public function getId(): ?int { return $this->id; }
    public function getTest(): ?GeneralTest { return $this->test; }
    public function setTest(?GeneralTest $test): static { $this->test = $test; return $this; }
    public function getQuestionText(): ?string { return $this->questionText; }
    public function setQuestionText(string $questionText): static { $this->questionText = $questionText; return $this; }
    public function getQuestionOrder(): ?int { return $this->questionOrder; }
    public function setQuestionOrder(int $questionOrder): static { $this->questionOrder = $questionOrder; return $this; }
    public function getCreatedAt(): ?\DateTimeInterface { return $this->createdAt; }
    public function setCreatedAt(\DateTimeInterface $createdAt): static { $this->createdAt = $createdAt; return $this; }
    public function getAnswers(): Collection { return $this->answers; }
}