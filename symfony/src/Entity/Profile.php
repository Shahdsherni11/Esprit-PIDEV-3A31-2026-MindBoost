<?php

namespace App\Entity;

use App\Repository\ProfileRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ProfileRepository::class)]
#[ORM\HasLifecycleCallbacks]
class Profile
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(inversedBy: 'profile', targetEntity: User::class)]
    #[ORM\JoinColumn(name: 'user_id', nullable: false, onDelete: 'CASCADE')]
    private ?User $user = null;

    #[ORM\Column(name: 'first_name', length: 100)]
    #[Assert\NotBlank(message: 'Le prénom est obligatoire.')]
    #[Assert\Length(min: 2, max: 100)]
    #[Assert\Regex(pattern: '/^[a-zA-ZÀ-ÿ\s\-]+$/', message: 'Lettres uniquement.')]
    private ?string $firstName = null;

    #[ORM\Column(name: 'last_name', length: 100)]
    #[Assert\NotBlank(message: 'Le nom est obligatoire.')]
    #[Assert\Length(min: 2, max: 100)]
    #[Assert\Regex(pattern: '/^[a-zA-ZÀ-ÿ\s\-]+$/', message: 'Lettres uniquement.')]
    private ?string $lastName = null;

    #[ORM\Column(length: 20, nullable: true)]
    #[Assert\Regex(pattern: '/^(\+?[0-9\s\-]{8,15})$/', message: 'Numéro de téléphone invalide.')]
    private ?string $phone = null;

    #[ORM\Column(name: 'avatar_url', length: 255, nullable: true)]
    private ?string $avatarUrl = null;

    #[ORM\Column(type: 'text', nullable: true)]
    #[Assert\Length(max: 1000)]
    private ?string $bio = null;

    #[ORM\Column(name: 'personality_type', length: 50, nullable: true)]
    private ?string $personalityType = null;

    #[ORM\Column(name: 'created_at', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $createdAt = null;

    public function __construct()
    {
        $this->createdAt = new \DateTime();
    }

    #[ORM\PrePersist]
    public function onPrePersist(): void
    {
        if ($this->createdAt === null) {
            $this->createdAt = new \DateTime();
        }
    }

    public function getId(): ?int { return $this->id; }

    public function getUser(): ?User { return $this->user; }
    public function setUser(?User $user): static { $this->user = $user; return $this; }

    public function getFirstName(): ?string { return $this->firstName; }
    public function setFirstName(string $v): static { $this->firstName = $v; return $this; }

    public function getLastName(): ?string { return $this->lastName; }
    public function setLastName(string $v): static { $this->lastName = $v; return $this; }

    public function getFullName(): string
    {
        return trim(($this->firstName ?? '') . ' ' . ($this->lastName ?? ''));
    }

    public function getPhone(): ?string { return $this->phone; }
    public function setPhone(?string $v): static { $this->phone = $v; return $this; }

    public function getAvatarUrl(): ?string { return $this->avatarUrl; }
    public function setAvatarUrl(?string $v): static { $this->avatarUrl = $v; return $this; }

    public function getBio(): ?string { return $this->bio; }
    public function setBio(?string $v): static { $this->bio = $v; return $this; }

    public function getPersonalityType(): ?string { return $this->personalityType; }
    public function setPersonalityType(?string $v): static { $this->personalityType = $v; return $this; }

    public function getCreatedAt(): ?\DateTimeInterface { return $this->createdAt; }
    public function setCreatedAt(?\DateTimeInterface $v): static { $this->createdAt = $v; return $this; }

    public function __toString(): string { return $this->getFullName(); }
}
