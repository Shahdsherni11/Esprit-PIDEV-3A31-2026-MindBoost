<?php

namespace App\Entity;

use App\Repository\TacheFocusRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: TacheFocusRepository::class)]
#[ORM\Table(name: 'tache_focus')]
#[ORM\HasLifecycleCallbacks]
class TacheFocus
{
    public const STATUTS = ['Non commencée', 'En cours', 'Terminée', 'Abandonnée'];

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id_tache')]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'Le titre est obligatoire.')]
    #[Assert\Length(min: 3, max: 255, minMessage: 'Minimum {{ limit }} caractères.')]
    private ?string $titre = null;

    #[ORM\Column(name: 'objectif_principal', type: 'text', nullable: true)]
    #[Assert\Length(max: 1000)]
    private ?string $objectifPrincipal = null;

    #[ORM\Column(name: 'niveau_difficulte', type: 'integer', options: ['default' => 1])]
    #[Assert\Range(min: 1, max: 5, notInRangeMessage: 'La difficulté doit être entre {{ min }} et {{ max }}.')]
    private int $niveauDifficulte = 1;

    #[ORM\Column(length: 50, options: ['default' => 'Non commencée'])]
    private string $statut = 'Non commencée';

    #[ORM\Column(name: 'score_productivite', type: 'integer', options: ['default' => 0])]
    #[Assert\Range(min: 0, max: 100)]
    private int $scoreProductivite = 0;

    #[ORM\Column(name: 'id_user', type: 'integer', nullable: true)]
    private ?int $idUser = null;

    #[ORM\Column(name: 'heure_debut', type: 'time', nullable: true)]
    private ?\DateTimeInterface $heureDebut = null;

    #[ORM\Column(name: 'heure_fin', type: 'time', nullable: true)]
    #[Assert\Expression(
        "this.getHeureFin() === null or this.getHeureDebut() === null or this.getHeureFin() > this.getHeureDebut()",
        message: "L'heure de fin doit être après l'heure de début."
    )]
    private ?\DateTimeInterface $heureFin = null;

    #[ORM\Column(type: 'integer', options: ['default' => 1])]
    #[Assert\Range(min: 1, max: 5)]
    private int $priorite = 1;

    #[ORM\Column(name: 'created_at', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $createdAt = null;

    #[ORM\OneToMany(mappedBy: 'tacheFocus', targetEntity: SousTache::class, cascade: ['persist', 'remove'], orphanRemoval: true)]
    private Collection $sousTaches;

    public function __construct()
    {
        $this->createdAt  = new \DateTime();
        $this->sousTaches = new ArrayCollection();
    }

    #[ORM\PrePersist]
    public function onPrePersist(): void
    {
        if ($this->createdAt === null) {
            $this->createdAt = new \DateTime();
        }
    }

    public function getId(): ?int { return $this->id; }

    public function getTitre(): ?string { return $this->titre; }
    public function setTitre(string $v): static { $this->titre = $v; return $this; }

    public function getObjectifPrincipal(): ?string { return $this->objectifPrincipal; }
    public function setObjectifPrincipal(?string $v): static { $this->objectifPrincipal = $v; return $this; }

    public function getNiveauDifficulte(): int { return $this->niveauDifficulte; }
    public function setNiveauDifficulte(int $v): static { $this->niveauDifficulte = $v; return $this; }

    public function getStatut(): string { return $this->statut; }
    public function setStatut(string $v): static { $this->statut = $v; return $this; }

    public function getScoreProductivite(): int { return $this->scoreProductivite; }
    public function setScoreProductivite(int $v): static { $this->scoreProductivite = max(0, min(100, $v)); return $this; }

    public function getIdUser(): ?int { return $this->idUser; }
    public function setIdUser(?int $v): static { $this->idUser = $v; return $this; }

    public function getHeureDebut(): ?\DateTimeInterface { return $this->heureDebut; }
    public function setHeureDebut(?\DateTimeInterface $v): static { $this->heureDebut = $v; return $this; }

    public function getHeureFin(): ?\DateTimeInterface { return $this->heureFin; }
    public function setHeureFin(?\DateTimeInterface $v): static { $this->heureFin = $v; return $this; }

    public function getPriorite(): int { return $this->priorite; }
    public function setPriorite(int $v): static { $this->priorite = $v; return $this; }

    public function getCreatedAt(): ?\DateTimeInterface { return $this->createdAt; }
    public function setCreatedAt(\DateTimeInterface $v): static { $this->createdAt = $v; return $this; }

    public function getSousTaches(): Collection { return $this->sousTaches; }

    public function getDureeTotal(): int
    {
        if ($this->heureDebut && $this->heureFin) {
            $diff = $this->heureFin->diff($this->heureDebut);
            return ($diff->h * 60) + $diff->i;
        }
        return 0;
    }

    public function getNombresSousTachesTerminees(): int
    {
        return $this->sousTaches->filter(fn($s) => $s->getEtat() === 'Terminée')->count();
    }

    public function getProgressionPourcentage(): int
    {
        $total = $this->sousTaches->count();
        if ($total === 0) return 0;
        return (int)(($this->getNombresSousTachesTerminees() / $total) * 100);
    }

    public function __toString(): string { return $this->titre ?? ''; }
}
