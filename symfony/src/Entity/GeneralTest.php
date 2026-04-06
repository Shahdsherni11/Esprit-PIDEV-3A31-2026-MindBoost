<?php

namespace App\Entity;

use App\Repository\GeneralTestRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: GeneralTestRepository::class)]
#[ORM\Table(name: 'general_tests')]
class GeneralTest
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'Le titre est obligatoire')]
    #[Assert\Length(
        min: 3,
        max: 255,
        minMessage: 'Le titre doit avoir au moins 3 caractères',
        maxMessage: 'Le titre ne peut pas dépasser 255 caractères'
    )]
    #[Assert\Regex(
        pattern: '/^(?!\d+$).+$/',
        message: 'Le titre ne doit pas être uniquement des nombres'
    )]
    private ?string $title = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 50, options: ['default' => 'DRAFT'])]
    private ?string $status = 'DRAFT';

    #[ORM\Column(name: 'created_by')]
    private ?int $createdBy = null;

    #[ORM\Column(name: 'created_at', type: 'datetime')]
    private ?\DateTimeInterface $createdAt = null;

    #[ORM\Column(name: 'updated_at', type: 'datetime')]
    private ?\DateTimeInterface $updatedAt = null;

    #[ORM\OneToMany(mappedBy: 'test', targetEntity: GeneralQuestion::class, cascade: ['persist', 'remove'], orphanRemoval: true)]
    private Collection $questions;

    public function __construct()
    {
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
        $this->questions = new ArrayCollection();
    }

    public function getId(): ?int { return $this->id; }
    public function getTitle(): ?string { return $this->title; }
    public function setTitle(string $title): static { $this->title = $title; return $this; }
    public function getDescription(): ?string { return $this->description; }
    public function setDescription(?string $description): static { $this->description = $description; return $this; }
    public function getStatus(): ?string { return $this->status; }
    public function setStatus(string $status): static { $this->status = $status; return $this; }
    public function getCreatedBy(): ?int { return $this->createdBy; }
    public function setCreatedBy(int $createdBy): static { $this->createdBy = $createdBy; return $this; }
    public function getCreatedAt(): ?\DateTimeInterface { return $this->createdAt; }
    public function setCreatedAt(\DateTimeInterface $createdAt): static { $this->createdAt = $createdAt; return $this; }
    public function getUpdatedAt(): ?\DateTimeInterface { return $this->updatedAt; }
    public function setUpdatedAt(\DateTimeInterface $updatedAt): static { $this->updatedAt = $updatedAt; return $this; }

    public function getQuestions(): Collection
    {
        return $this->questions;
    }

    public function addQuestion(GeneralQuestion $question): static
    {
        if (!$this->questions->contains($question)) {
            $this->questions->add($question);
            $question->setTest($this);
        }
        return $this;
    }

    public function removeQuestion(GeneralQuestion $question): static
    {
        if ($this->questions->removeElement($question)) {
            if ($question->getTest() === $this) {
                $question->setTest(null);
            }
        }
        return $this;
    }
}