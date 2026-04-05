<?php

namespace App\Entity;

use App\Repository\SpecificScoreRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SpecificScoreRepository::class)]
#[ORM\Table(name: 'specific_score')]
class SpecificScore
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $userId = null;

    #[ORM\Column]
    private ?int $specificTestId = null;

    #[ORM\Column]
    private ?int $totalScore = 0;

    #[ORM\Column]
    private ?int $maxScore = 0;

    #[ORM\Column]
    private ?int $percentage = 0;

    #[ORM\Column(length: 100)]
    private ?string $category = null;

    #[ORM\Column(length: 20)]
    private ?string $level = 'Faible';

    #[ORM\Column]
    private ?int $weekNumber = null;

    #[ORM\Column(type: 'datetime')]
    private ?\DateTimeInterface $passedAt = null;

    public function __construct()
    {
        $this->passedAt = new \DateTime();
    }

    public function getId(): ?int { return $this->id; }
    public function getUserId(): ?int { return $this->userId; }
    public function setUserId(int $userId): static { $this->userId = $userId; return $this; }
    public function getSpecificTestId(): ?int { return $this->specificTestId; }
    public function setSpecificTestId(int $specificTestId): static { $this->specificTestId = $specificTestId; return $this; }
    public function getTotalScore(): ?int { return $this->totalScore; }
    public function setTotalScore(int $totalScore): static { $this->totalScore = $totalScore; return $this; }
    public function getMaxScore(): ?int { return $this->maxScore; }
    public function setMaxScore(int $maxScore): static { $this->maxScore = $maxScore; return $this; }
    public function getPercentage(): ?int { return $this->percentage; }
    public function setPercentage(int $percentage): static { $this->percentage = $percentage; return $this; }
    public function getCategory(): ?string { return $this->category; }
    public function setCategory(string $category): static { $this->category = $category; return $this; }
    public function getLevel(): ?string { return $this->level; }
    public function setLevel(string $level): static { $this->level = $level; return $this; }
    public function getWeekNumber(): ?int { return $this->weekNumber; }
    public function setWeekNumber(int $weekNumber): static { $this->weekNumber = $weekNumber; return $this; }
    public function getPassedAt(): ?\DateTimeInterface { return $this->passedAt; }
    public function setPassedAt(\DateTimeInterface $passedAt): static { $this->passedAt = $passedAt; return $this; }
}