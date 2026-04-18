<?php

namespace App\Repository;

use App\Entity\TacheFocus;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class TacheFocusRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TacheFocus::class);
    }

    public function findBySearchAndFilter(string $search = '', string $statut = '', string $tri = 'id', string $ordre = 'ASC')
    {
        $qb = $this->createQueryBuilder('t');

        if (!empty($search)) {
            $qb->andWhere('t.titre LIKE :search OR t.objectifPrincipal LIKE :search')
               ->setParameter('search', '%' . $search . '%');
        }

        if (!empty($statut)) {
            $qb->andWhere('t.statut = :statut')
               ->setParameter('statut', $statut);
        }

        $allowedTri = ['id', 'titre', 'statut', 'niveauDifficulte', 'scoreProductivite'];

        if (!in_array($tri, $allowedTri)) {
            $tri = 'id';
        }

        $ordre = strtoupper($ordre) === 'DESC' ? 'DESC' : 'ASC';
        $qb->orderBy('t.' . $tri, $ordre);

        return $qb->getQuery();
    }
}
