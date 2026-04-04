<?php

namespace App\Entity;

use App\Repository\PostRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PostRepository::class)]
#[ORM\Table(name: 'post')]
class Post
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'post_id')]
    private ?int $id = null;

    #[ORM\Column(type: 'text')]
    private string $content = '';

    #[ORM\Column(length: 255)]
    private string $title = '';

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $tag = null;

    #[ORM\Column(name: 'image_url', length: 500, nullable: true)]
    private ?string $imageUrl = null;

    #[ORM\Column(name: 'post_likes', type: 'integer', options: ['default' => 0])]
    private int $likes = 0;

    #[ORM\Column(name: 'post_dislikes', type: 'integer', options: ['default' => 0])]
    private int $dislikes = 0;

    #[ORM\Column(name: 'help_meter', type: 'integer', options: ['default' => 0])]
    private int $helpMeter = 0;

    #[ORM\Column(name: 'user_id', type: 'integer')]
    private int $userId = 0;

    #[ORM\Column(name: 'acheivement_id', type: 'integer', nullable: true)]
    private ?int $acheivementId = null;

    public function getId(): ?int { return $this->id; }

    public function getContent(): string { return $this->content; }
    public function setContent(string $content): static { $this->content = $content; return $this; }

    public function getTitle(): string { return $this->title; }
    public function setTitle(string $title): static { $this->title = $title; return $this; }

    public function getTag(): ?string { return $this->tag; }
    public function setTag(?string $tag): static { $this->tag = $tag; return $this; }

    public function getImageUrl(): ?string { return $this->imageUrl; }
    public function setImageUrl(?string $imageUrl): static { $this->imageUrl = $imageUrl; return $this; }

    public function getLikes(): int { return $this->likes; }
    public function setLikes(int $likes): static { $this->likes = $likes; return $this; }

    public function getDislikes(): int { return $this->dislikes; }
    public function setDislikes(int $dislikes): static { $this->dislikes = $dislikes; return $this; }

    public function getHelpMeter(): int { return $this->helpMeter; }
    public function setHelpMeter(int $helpMeter): static { $this->helpMeter = $helpMeter; return $this; }

    public function getUserId(): int { return $this->userId; }
    public function setUserId(int $userId): static { $this->userId = $userId; return $this; }

    public function getAcheivementId(): ?int { return $this->acheivementId; }
    public function setAcheivementId(?int $acheivementId): static { $this->acheivementId = $acheivementId; return $this; }
}
