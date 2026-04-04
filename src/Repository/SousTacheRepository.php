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

    public function findBySearchAndFilter(string $search = '', string $etat = '', string $tacheId = ''): array
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

        if (!empty($tacheId)) {
            $qb->andWhere('s.tacheFocus = :tacheId')
               ->setParameter('tacheId', $tacheId);
        }

        return $qb->orderBy('s.priorite', 'ASC')
                  ->getQuery()
                  ->getResult();
    }
}