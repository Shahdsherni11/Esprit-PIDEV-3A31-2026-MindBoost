<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: 'user')]
#[ORM\HasLifecycleCallbacks]
#[UniqueEntity(fields: ['email'], message: 'Cet email est déjà utilisé.')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    #[Assert\NotBlank(message: "L'email est obligatoire.")]
    #[Assert\Email(message: "L'adresse email '{{ value }}' n'est pas valide.")]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $password = null;

    #[ORM\Column(length: 50, options: ['default' => 'user'])]
    private string $role = 'user';

    #[ORM\Column(name: 'is_verified', type: 'boolean', options: ['default' => false])]
    private bool $isVerified = false;

    #[ORM\Column(name: 'created_at', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $createdAt = null;

    #[ORM\OneToOne(mappedBy: 'user', targetEntity: Profile::class, cascade: ['persist', 'remove'])]
    private ?Profile $profile = null;

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

    public function getEmail(): ?string { return $this->email; }
    public function setEmail(string $email): static { $this->email = $email; return $this; }

    public function getUserIdentifier(): string { return (string) $this->email; }

    public function getRoles(): array
    {
        return match($this->role) {
            'admin'        => ['ROLE_ADMIN', 'ROLE_USER'],
            'psychologist' => ['ROLE_PSYCHOLOGIST', 'ROLE_USER'],
            default        => ['ROLE_USER'],
        };
    }

    public function getRole(): string { return $this->role; }
    public function setRole(string $role): static { $this->role = $role; return $this; }

    public function isAdmin(): bool { return $this->role === 'admin'; }
    public function isPsychologist(): bool { return $this->role === 'psychologist'; }

    public function getPassword(): ?string { return $this->password; }
    public function setPassword(string $password): static { $this->password = $password; return $this; }

    public function eraseCredentials(): void {}

    public function isVerified(): bool { return $this->isVerified; }
    public function setIsVerified(bool $isVerified): static { $this->isVerified = $isVerified; return $this; }

    public function getCreatedAt(): ?\DateTimeInterface { return $this->createdAt; }
    public function setCreatedAt(\DateTimeInterface $createdAt): static { $this->createdAt = $createdAt; return $this; }

    public function getProfile(): ?Profile { return $this->profile; }
    public function setProfile(?Profile $profile): static
    {
        if ($profile !== null && $profile->getUser() !== $this) {
            $profile->setUser($this);
        }
        $this->profile = $profile;
        return $this;
    }

    public function getDisplayName(): string
    {
        if ($this->profile && $this->profile->getFirstName()) {
            return $this->profile->getFirstName() . ' ' . $this->profile->getLastName();
        }
        return explode('@', $this->email ?? 'user@app')[0];
    }

    /** BC-compat helpers used by old session-based code */
    public function getFirstName(): string
    {
        return $this->profile?->getFirstName() ?? '';
    }

    public function getLastName(): string
    {
        return $this->profile?->getLastName() ?? '';
    }

    public function getBio(): ?string
    {
        return $this->profile?->getBio();
    }

    public function getPhone(): ?string
    {
        return $this->profile?->getPhone();
    }

    public function getAvatarUrl(): ?string
    {
        return $this->profile?->getAvatarUrl();
    }

    public function __toString(): string { return $this->email ?? ''; }
}
