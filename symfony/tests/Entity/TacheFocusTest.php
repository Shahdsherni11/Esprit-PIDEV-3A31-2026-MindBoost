<?php

namespace App\Tests\Entity;

use App\Entity\TacheFocus;
use App\Entity\SousTache;
use PHPUnit\Framework\TestCase;

class TacheFocusTest extends TestCase
{
    public function testSetAndGetTitre(): void
    {
        $tache = new TacheFocus();
        $tache->setTitre('Révision Mathématiques');
        $this->assertSame('Révision Mathématiques', $tache->getTitre());
    }

    public function testSetAndGetObjectifPrincipal(): void
    {
        $tache = new TacheFocus();
        $tache->setObjectifPrincipal('Terminer le chapitre 3');
        $this->assertSame('Terminer le chapitre 3', $tache->getObjectifPrincipal());
    }

    public function testSetAndGetNiveauDifficulte(): void
    {
        $tache = new TacheFocus();
        $tache->setNiveauDifficulte(3);
        $this->assertSame(3, $tache->getNiveauDifficulte());
    }

    public function testSetAndGetStatut(): void
    {
        $tache = new TacheFocus();
        $tache->setStatut('En cours');
        $this->assertSame('En cours', $tache->getStatut());
    }

    public function testSetAndGetScoreProductivite(): void
    {
        $tache = new TacheFocus();
        $tache->setScoreProductivite(85);
        $this->assertSame(85, $tache->getScoreProductivite());
    }

    public function testSousTachesCollectionIsEmptyOnCreation(): void
    {
        $tache = new TacheFocus();
        $this->assertCount(0, $tache->getSousTaches());
    }

    public function testAddSousTache(): void
    {
        $tache = new TacheFocus();
        $sousTache = new SousTache();
        $sousTache->setDescription('Lire le cours');
        $tache->addSousTach($sousTache);
        $this->assertCount(1, $tache->getSousTaches());
        $this->assertSame($tache, $sousTache->getTacheFocus());
    }

    public function testIdIsNullBeforePersist(): void
    {
        $tache = new TacheFocus();
        $this->assertNull($tache->getId());
    }
}