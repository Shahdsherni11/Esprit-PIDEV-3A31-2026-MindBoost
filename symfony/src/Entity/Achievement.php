<?php

namespace App\Entity;

use App\Repository\AchievementRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AchievementRepository::class)]
#[ORM\Table(name: 'achievement')]
class Achievement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'acheivement_id')]
    private ?int $id = null;

    #[ORM\Column(name: 'acheivement_name', length: 255)]
    private string $achievementName = '';

    #[ORM\Column(name: 'acheivement_score', type: 'integer')]
    private int $achievementScore = 0;

    public function getId(): ?int { return $this->id; }

    public function getAchievementName(): string { return $this->achievementName; }
    public function setAchievementName(string $achievementName): static { $this->achievementName = $achievementName; return $this; }

    public function getAchievementScore(): int { return $this->achievementScore; }
    public function setAchievementScore(int $achievementScore): static { $this->achievementScore = $achievementScore; return $this; }
}
