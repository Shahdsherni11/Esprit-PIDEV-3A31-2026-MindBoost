<?php

namespace App\Entity;

use App\Repository\ScoreRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ScoreRepository::class)]
#[ORM\Table(name: 'score')]
class Score
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(name: 'user_id')]
    private ?int $userId = null;

    #[ORM\Column(name: 'general_test_id')]
    private ?int $generalTestId = null;

    #[ORM\Column(name: 'totalScore')]
    private ?int $totalScore = null;

    #[ORM\Column(nullable: true)]
    private ?int $percentage = null;

    public function getId(): ?int { return $this->id; }
    public function getUserId(): ?int { return $this->userId; }
    public function setUserId(int $userId): static { $this->userId = $userId; return $this; }
    public function getGeneralTestId(): ?int { return $this->generalTestId; }
    public function setGeneralTestId(int $generalTestId): static { $this->generalTestId = $generalTestId; return $this; }
    public function getTotalScore(): ?int { return $this->totalScore; }
    public function setTotalScore(int $totalScore): static { $this->totalScore = $totalScore; return $this; }
    public function getPercentage(): ?int { return $this->percentage; }
    public function setPercentage(?int $percentage): static { $this->percentage = $percentage; return $this; }
}