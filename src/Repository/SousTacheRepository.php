<?php

namespace App\Repository;

use App\Entity\SousTache;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class SousTacheRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SousTache::class);
    }

    // ===== RECHERCHE + FILTRE =====
    public function findBySearchAndFilter(string $search = '', string $etat = ''): array
    {
        $qb = $this->createQueryBuilder('s');

        if (!empty($search)) {
            $qb->andWhere('s.description LIKE :search')
               ->setParameter('search', '%' . $search . '%');
        }

        if (!empty($etat)) {
            $qb->andWhere('s.etat = :etat')
               ->setParameter('etat', $etat);
        }

        return $qb->orderBy('s.priorite', 'ASC')
                  ->getQuery()
                  ->getResult();
    }
}