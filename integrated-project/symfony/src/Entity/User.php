<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Uid\Ulid;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: 'users')]
#[UniqueEntity(fields: ['email'], message: 'Email is already taken.')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\Column(type: 'ulid', unique: true)]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator('doctrine.ulid_generator')]
    private ?Ulid $id = null;

    #[ORM\Column(length: 255, unique: true)]
    #[Groups(['user:read', 'user:write'])]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $password = null;

    #[ORM\Column(length: 255)]
    #[Groups(['user:read', 'user:write'])]
    private ?string $displayName = null;

    #[ORM\Column(type: 'json')]
    private array $roles = ['ROLE_PATIENT'];

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['user:read', 'user:write'])]
    private ?string $avatarUrl = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $createdAt = null;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Emotion::class, cascade: ['persist', 'remove'])]
    private Collection $emotions;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Journal::class, cascade: ['persist', 'remove'])]
    private Collection $journals;

    public function __construct()
    {
        $this->emotions = new ArrayCollection();
        $this->journals = new ArrayCollection();
        $this->createdAt = new \DateTimeImmutable();
    }

    public function getId(): ?Ulid
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getDisplayName(): ?string
    {
        return $this->displayName;
    }

    public function setDisplayName(string $displayName): self
    {
        $this->displayName = $displayName;

        return $this;
    }

    /**
     * @return Collection<int, Emotion>
     */
    public function getEmotions(): Collection
    {
        return $this->emotions;
    }

    public function addEmotion(Emotion $emotion): self
    {
        if (!$this->emotions->contains($emotion)) {
            $this->emotions[] = $emotion;
            $emotion->setUser($this);
        }

        return $this;
    }

    public function removeEmotion(Emotion $emotion): self
    {
        if ($this->emotions->removeElement($emotion)) {
            // set the owning side to null (unless already changed)
            if ($emotion->getUser() === $this) {
                $emotion->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Journal>
     */
    public function getJournals(): Collection
    {
        return $this->journals;
    }

    public function addJournal(Journal $journal): self
    {
        if (!$this->journals->contains($journal)) {
            $this->journals[] = $journal;
            $journal->setUser($this);
        }

        return $this;
    }

    public function removeJournal(Journal $journal): self
    {
        if ($this->journals->removeElement($journal)) {
            // set the owning side to null (unless already changed)
            if ($journal->getUser() === $this) {
                $journal->setUser(null);
            }
        }

        return $this;
    }

    public function getRoles(): array
    {
        $roles = $this->roles;
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    public function getAvatarUrl(): ?string
    {
        return $this->avatarUrl;
    }

    public function setAvatarUrl(?string $avatarUrl): self
    {
        $this->avatarUrl = $avatarUrl;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }
}

