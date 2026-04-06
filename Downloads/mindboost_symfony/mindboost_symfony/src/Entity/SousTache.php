<?php

namespace App\Entity;

use App\Repository\SousTacheRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: SousTacheRepository::class)]
#[ORM\Table(name: 'sous_tache')]
class SousTache
{
    public const ETATS = ['À faire', 'En cours', 'Terminée', 'Abandonnée'];

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id_sous_tache')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: TacheFocus::class, inversedBy: 'sousTaches')]
    #[ORM\JoinColumn(name: 'id_tache', referencedColumnName: 'id_tache', nullable: false, onDelete: 'CASCADE')]
    private ?TacheFocus $tacheFocus = null;

    #[ORM\Column(type: 'text')]
    #[Assert\NotBlank(message: 'La description est obligatoire.')]
    #[Assert\Length(min: 3, minMessage: 'Minimum {{ limit }} caractères.')]
    private ?string $description = null;

    #[ORM\Column(name: 'duree_recommandee', type: 'integer', nullable: true)]
    #[Assert\Positive(message: 'La durée doit être positive.')]
    private ?int $dureeRecommandee = null;

    #[ORM\Column(length: 50, options: ['default' => 'À faire'])]
    private string $etat = 'À faire';

    #[ORM\Column(name: 'heure_debut', type: 'time', nullable: true)]
    private ?\DateTimeInterface $heureDebut = null;

    #[ORM\Column(name: 'heure_fin', type: 'time', nullable: true)]
    private ?\DateTimeInterface $heureFin = null;

    #[ORM\Column(type: 'integer', options: ['default' => 1])]
    #[Assert\Range(min: 1, max: 5)]
    private int $priorite = 1;

    #[ORM\Column(name: 'created_at', type: 'datetime')]
    private ?\DateTimeInterface $createdAt = null;

    public function __construct()
    {
        $this->createdAt = new \DateTime();
    }

    public function getId(): ?int { return $this->id; }

    public function getTacheFocus(): ?TacheFocus { return $this->tacheFocus; }
    public function setTacheFocus(?TacheFocus $v): static { $this->tacheFocus = $v; return $this; }

    public function getDescription(): ?string { return $this->description; }
    public function setDescription(string $v): static { $this->description = $v; return $this; }

    public function getDureeRecommandee(): ?int { return $this->dureeRecommandee; }
    public function setDureeRecommandee(?int $v): static { $this->dureeRecommandee = $v; return $this; }

    public function getEtat(): string { return $this->etat; }
    public function setEtat(string $v): static { $this->etat = $v; return $this; }

    public function getHeureDebut(): ?\DateTimeInterface { return $this->heureDebut; }
    public function setHeureDebut(?\DateTimeInterface $v): static { $this->heureDebut = $v; return $this; }

    public function getHeureFin(): ?\DateTimeInterface { return $this->heureFin; }
    public function setHeureFin(?\DateTimeInterface $v): static { $this->heureFin = $v; return $this; }

    public function getPriorite(): int { return $this->priorite; }
    public function setPriorite(int $v): static { $this->priorite = $v; return $this; }

    public function getCreatedAt(): ?\DateTimeInterface { return $this->createdAt; }
    public function setCreatedAt(\DateTimeInterface $v): static { $this->createdAt = $v; return $this; }

    public function __toString(): string { return $this->description ?? ''; }
}
