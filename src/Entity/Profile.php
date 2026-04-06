<?php

namespace App\Entity;

use App\Repository\ProfileRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ProfileRepository::class)]
#[ORM\Table(name: 'profile')]
class Profile
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(inversedBy: 'profile')]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    private ?User $user = null;

    #[ORM\Column(length: 100)]
    // Contrôle de saisie : le prénom ne doit pas être vide
    #[Assert\NotBlank(message: 'Le prénom est obligatoire.')]
    // Contrôle de saisie : le prénom doit avoir entre 2 et 100 caractères
    #[Assert\Length(min: 2, max: 100, minMessage: 'Le prénom doit avoir au moins {{ limit }} caractères.')]
    private ?string $firstName = null;

    #[ORM\Column(length: 100)]
    // Contrôle de saisie : le nom ne doit pas être vide
    #[Assert\NotBlank(message: 'Le nom est obligatoire.')]
    // Contrôle de saisie : le nom doit avoir entre 2 et 100 caractères
    #[Assert\Length(min: 2, max: 100, minMessage: 'Le nom doit avoir au moins {{ limit }} caractères.')]
    private ?string $lastName = null;

    #[ORM\Column(length: 20, nullable: true)]
    // Contrôle de saisie : le numéro de téléphone doit être au format valide (7-20 caractères)
    #[Assert\Regex(pattern: '/^[0-9+\s\-]{7,20}$/', message: 'Numéro de téléphone invalide.')]
    private ?string $phone = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $avatarUrl = null;

    #[ORM\Column(type: 'text', nullable: true)]
    // Contrôle de saisie : la bio ne peut pas dépasser 500 caractères
    #[Assert\Length(max: 500, maxMessage: 'La bio ne peut pas dépasser {{ limit }} caractères.')]
    private ?string $bio = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $personalityType = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $createdAt = null;

    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
    }

    public function getId(): ?int { return $this->id; }

    public function getUser(): ?User { return $this->user; }
    public function setUser(?User $user): static { $this->user = $user; return $this; }

    public function getFirstName(): ?string { return $this->firstName; }
    public function setFirstName(string $firstName): static { $this->firstName = $firstName; return $this; }

    public function getLastName(): ?string { return $this->lastName; }
    public function setLastName(string $lastName): static { $this->lastName = $lastName; return $this; }

    public function getFullName(): string { return ($this->firstName ?? '') . ' ' . ($this->lastName ?? ''); }

    public function getPhone(): ?string { return $this->phone; }
    public function setPhone(?string $phone): static { $this->phone = $phone; return $this; }

    public function getAvatarUrl(): ?string { return $this->avatarUrl; }
    public function setAvatarUrl(?string $avatarUrl): static { $this->avatarUrl = $avatarUrl; return $this; }

    public function getBio(): ?string { return $this->bio; }
    public function setBio(?string $bio): static { $this->bio = $bio; return $this; }

    public function getPersonalityType(): ?string { return $this->personalityType; }
    public function setPersonalityType(?string $personalityType): static { $this->personalityType = $personalityType; return $this; }

    public function getCreatedAt(): ?\DateTimeImmutable { return $this->createdAt; }
    public function setCreatedAt(?\DateTimeImmutable $createdAt): static { $this->createdAt = $createdAt; return $this; }
}
