<?php

namespace App\Entity;

use App\Repository\TacheFocusRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TacheFocusRepository::class)]
class TacheFocus
{
    #[ORM\Id]
#[ORM\GeneratedValue]
#[ORM\Column(name: 'id_tache')]
private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\Column(length: 255)]
    private ?string $objectifPrincipal = null;

    #[ORM\Column(nullable: true)]
    private ?int $niveauDifficulte = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $statut = null;

    #[ORM\Column(nullable: true)]
    private ?int $scoreProductivite = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $heureDebut = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $heureFin = null;

    #[ORM\OneToMany(mappedBy: 'tacheFocus', targetEntity: SousTache::class)]
    private Collection $sousTaches;

    public function __construct()
    {
        $this->sousTaches = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

        return $this;
    }

    public function getObjectifPrincipal(): ?string
    {
        return $this->objectifPrincipal;
    }

    public function setObjectifPrincipal(string $objectifPrincipal): static
    {
        $this->objectifPrincipal = $objectifPrincipal;

        return $this;
    }

    public function getNiveauDifficulte(): ?int
    {
        return $this->niveauDifficulte;
    }

    public function setNiveauDifficulte(?int $niveauDifficulte): static
    {
        $this->niveauDifficulte = $niveauDifficulte;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(?string $statut): static
    {
        $this->statut = $statut;

        return $this;
    }

    public function getScoreProductivite(): ?int
    {
        return $this->scoreProductivite;
    }

    public function setScoreProductivite(?int $scoreProductivite): static
    {
        $this->scoreProductivite = $scoreProductivite;

        return $this;
    }

    public function getHeureDebut(): ?\DateTimeInterface
    {
        return $this->heureDebut;
    }

    public function setHeureDebut(?\DateTimeInterface $heureDebut): static
    {
        $this->heureDebut = $heureDebut;

        return $this;
    }

    public function getHeureFin(): ?\DateTimeInterface
    {
        return $this->heureFin;
    }

    public function setHeureFin(?\DateTimeInterface $heureFin): static
    {
        $this->heureFin = $heureFin;

        return $this;
    }

    /**
     * @return Collection<int, SousTache>
     */
    public function getSousTaches(): Collection
    {
        return $this->sousTaches;
    }

    public function addSousTach(SousTache $sousTach): static
    {
        if (!$this->sousTaches->contains($sousTach)) {
            $this->sousTaches->add($sousTach);
            $sousTach->setTacheFocus($this);
        }

        return $this;
    }

    public function removeSousTach(SousTache $sousTach): static
    {
        if ($this->sousTaches->removeElement($sousTach)) {
            // set the owning side to null (unless already changed)
            if ($sousTach->getTacheFocus() === $this) {
                $sousTach->setTacheFocus(null);
            }
        }

        return $this;
    }
}
