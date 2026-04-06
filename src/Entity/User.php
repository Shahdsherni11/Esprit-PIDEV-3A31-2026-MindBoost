<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
// Contrôle de saisie : l'email doit être unique dans la base de données
#[UniqueEntity(fields: ['email'], message: 'Cet email est déjà utilisé.')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    // Contrôle de saisie : l'email ne doit pas être vide
    #[Assert\NotBlank(message: "L'email est obligatoire.")]
    // Contrôle de saisie : l'email doit être au format valide
    #[Assert\Email(message: "L'adresse email '{{ value }}' n'est pas valide.")]
    private ?string $email = null;

    #[ORM\Column(length: 50, options: ['default' => 'user'])]
    private string $role = 'user';

    #[ORM\Column(length: 255)]
    private ?string $password = null;

    #[ORM\Column(options: ['default' => false])]
    private bool $isVerified = false;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\OneToOne(mappedBy: 'user', cascade: ['persist', 'remove'])]
    private ?Profile $profile = null;

    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
        $this->isVerified = false;
    }

    public function getId(): ?int { return $this->id; }

    public function getEmail(): ?string { return $this->email; }
    public function setEmail(string $email): static { $this->email = $email; return $this; }

    public function getUserIdentifier(): string { return (string) $this->email; }

    public function getRoles(): array
    {
        $roles = [];
        switch ($this->role) {
            case 'admin':
                $roles[] = 'ROLE_ADMIN';
                $roles[] = 'ROLE_PSYCHOLOGIST';
                $roles[] = 'ROLE_USER';
                break;
            case 'psychologist':
                $roles[] = 'ROLE_PSYCHOLOGIST';
                $roles[] = 'ROLE_USER';
                break;
            default:
                $roles[] = 'ROLE_USER';
        }
        return array_unique($roles);
    }

    public function getRole(): string { return $this->role; }
    public function setRole(string $role): static { $this->role = $role; return $this; }

    public function getPassword(): ?string { return $this->password; }
    public function setPassword(string $password): static { $this->password = $password; return $this; }

    public function eraseCredentials(): void {}

    public function isVerified(): bool { return $this->isVerified; }
    public function setIsVerified(bool $isVerified): static { $this->isVerified = $isVerified; return $this; }

    public function getCreatedAt(): ?\DateTimeImmutable { return $this->createdAt; }
    public function setCreatedAt(?\DateTimeImmutable $createdAt): static { $this->createdAt = $createdAt; return $this; }

    public function getProfile(): ?Profile { return $this->profile; }
    public function setProfile(?Profile $profile): static
    {
        if ($profile === null && $this->profile !== null) {
            $this->profile->setUser(null);
        }
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
        return $this->email;
    }
}
