<?php

namespace App\Entity;

use App\Repository\CommentRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommentRepository::class)]
#[ORM\Table(name: 'comment')]
class Comment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'comment_id')]
    private ?int $id = null;

    #[ORM\Column(name: 'comment', type: 'text')]
    private string $comment = '';

    #[ORM\Column(type: 'integer', options: ['default' => 0])]
    private int $likes = 0;

    #[ORM\Column(type: 'integer', options: ['default' => 0])]
    private int $dislikes = 0;

    #[ORM\Column(name: 'user_id', type: 'integer')]
    private int $userId = 0;

    #[ORM\Column(name: 'post_id', type: 'integer')]
    private int $postId = 0;

    public function getId(): ?int { return $this->id; }

    public function getComment(): string { return $this->comment; }
    public function setComment(string $comment): static { $this->comment = $comment; return $this; }

    public function getLikes(): int { return $this->likes; }
    public function setLikes(int $likes): static { $this->likes = $likes; return $this; }

    public function getDislikes(): int { return $this->dislikes; }
    public function setDislikes(int $dislikes): static { $this->dislikes = $dislikes; return $this; }

    public function getUserId(): int { return $this->userId; }
    public function setUserId(int $userId): static { $this->userId = $userId; return $this; }

    public function getPostId(): int { return $this->postId; }
    public function setPostId(int $postId): static { $this->postId = $postId; return $this; }
}
