<?php

namespace App\Entity;

use App\Repository\SousTacheRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: SousTacheRepository::class)]
class SousTache
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id_sous_tache')]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Assert\NotBlank(message: 'La description est obligatoire')]
    #[Assert\Length(
        min: 3,
        max: 255,
        minMessage: 'La description doit avoir au moins {{ limit }} caractères',
        maxMessage: 'La description ne peut pas dépasser {{ limit }} caractères'
    )]
    private ?string $description = null;

    #[ORM\Column(nullable: true)]
    #[Assert\NotNull(message: 'La durée est obligatoire')]
    #[Assert\Range(
        min: 1,
        max: 480,
        notInRangeMessage: 'La durée doit être entre {{ min }} et {{ max }} minutes'
    )]
    private ?int $dureeRecommandee = null;

    #[ORM\Column(length: 50, nullable: true)]
    #[Assert\NotBlank(message: "L'état est obligatoire")]
    #[Assert\Choice(
        choices: ['Non commencée', 'En cours', 'Terminée', 'À faire'],
        message: "L'état {{ value }} est invalide"
    )]
    private ?string $etat = null;

    #[ORM\Column(type: Types::TIME_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $heureDebut = null;

    #[ORM\Column(type: Types::TIME_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $heureFin = null;

    #[ORM\Column(nullable: true)]
    #[Assert\Range(
    min: 1,
    max: 480,
    notInRangeMessage: 'La durée doit être entre {{ min }} et {{ max }} minutes'
)]
    private ?int $priorite = null;

    #[ORM\ManyToOne(inversedBy: 'sousTaches')]
    #[ORM\JoinColumn(name: 'id_tache', referencedColumnName: 'id_tache')]
    #[Assert\NotNull(message: 'La tâche parente est obligatoire')]
    private ?TacheFocus $tacheFocus = null;

    public function getId(): ?int { return $this->id; }

    public function getDescription(): ?string { return $this->description; }
    public function setDescription(?string $description): static { $this->description = $description; return $this; }

    public function getDureeRecommandee(): ?int { return $this->dureeRecommandee; }
    public function setDureeRecommandee(?int $dureeRecommandee): static { $this->dureeRecommandee = $dureeRecommandee; return $this; }

    public function getEtat(): ?string { return $this->etat; }
    public function setEtat(?string $etat): static { $this->etat = $etat; return $this; }

    public function getHeureDebut(): ?\DateTimeImmutable { return $this->heureDebut; }
    public function setHeureDebut(?\DateTimeImmutable $heureDebut): static { $this->heureDebut = $heureDebut; return $this; }

    public function getHeureFin(): ?\DateTimeImmutable { return $this->heureFin; }
    public function setHeureFin(?\DateTimeImmutable $heureFin): static { $this->heureFin = $heureFin; return $this; }

    public function getPriorite(): ?int { return $this->priorite; }
    public function setPriorite(?int $priorite): static { $this->priorite = $priorite; return $this; }

    public function getTacheFocus(): ?TacheFocus { return $this->tacheFocus; }
    public function setTacheFocus(?TacheFocus $tacheFocus): static { $this->tacheFocus = $tacheFocus; return $this; }
}