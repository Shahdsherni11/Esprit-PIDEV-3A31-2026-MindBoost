<?php

namespace App\Entity;

use App\Repository\SavesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SavesRepository::class)]
#[ORM\Table(name: 'saves')]
class Saves
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $description = null;

    #[ORM\Column(name: 'post_id', type: 'integer')]
    private int $postId = 0;

    #[ORM\Column(name: 'user_id', type: 'integer')]
    private int $userId = 0;

    public function getId(): ?int { return $this->id; }

    public function getDescription(): ?string { return $this->description; }
    public function setDescription(?string $description): static { $this->description = $description; return $this; }

    public function getPostId(): int { return $this->postId; }
    public function setPostId(int $postId): static { $this->postId = $postId; return $this; }

    public function getUserId(): int { return $this->userId; }
    public function setUserId(int $userId): static { $this->userId = $userId; return $this; }
}
