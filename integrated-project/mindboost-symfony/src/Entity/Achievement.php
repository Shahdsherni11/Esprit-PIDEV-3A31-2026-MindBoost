<?php

namespace App\Entity;

use App\Repository\AchievementRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: AchievementRepository::class)]
#[ORM\Table(name: 'achievement')]
class Achievement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'acheivement_id')]
    private ?int $id = null;

    #[Assert\NotBlank(message: 'Achievement name is required.')]
    #[Assert\Length(min: 2, max: 255, minMessage: 'Name must be at least 2 characters.', maxMessage: 'Name cannot exceed 255 characters.')]
    #[ORM\Column(name: 'acheivement_name', length: 255)]
    private string $achievementName = '';

    #[Assert\NotNull(message: 'Score is required.')]
    #[Assert\PositiveOrZero(message: 'Score must be zero or a positive integer.')]
    #[ORM\Column(name: 'acheivement_score', type: 'integer')]
    private int $achievementScore = 0;

    public function getId(): ?int { return $this->id; }

    public function getAchievementName(): string { return $this->achievementName; }
    public function setAchievementName(string $achievementName): static { $this->achievementName = $achievementName; return $this; }

    public function getAchievementScore(): int { return $this->achievementScore; }
    public function setAchievementScore(int $achievementScore): static { $this->achievementScore = $achievementScore; return $this; }
}
