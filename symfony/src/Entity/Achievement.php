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
    private string $acheivementName = '';

    #[ORM\Column(name: 'acheivement_score', type: 'integer')]
    private int $acheivementScore = 0;

    public function getId(): ?int { return $this->id; }

    public function getAcheivementName(): string { return $this->acheivementName; }
    public function setAcheivementName(string $acheivementName): static { $this->acheivementName = $acheivementName; return $this; }

    public function getAcheivementScore(): int { return $this->acheivementScore; }
    public function setAcheivementScore(int $acheivementScore): static { $this->acheivementScore = $acheivementScore; return $this; }
}
