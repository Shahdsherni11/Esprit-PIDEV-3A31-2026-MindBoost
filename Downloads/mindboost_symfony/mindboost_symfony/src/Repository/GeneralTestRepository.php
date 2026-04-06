<?php

namespace App\Repository;

use App\Entity\GeneralTest;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class GeneralTestRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GeneralTest::class);
    }

    /** Tests actifs disponibles pour les utilisateurs */
    public function findActive(): array
    {
        return $this->createQueryBuilder('t')
            ->where("t.status = 'ACTIVE'")
            ->orderBy('t.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /** Recherche par titre (DQL) */
    public function searchByTitle(string $keyword): array
    {
        return $this->createQueryBuilder('t')
            ->where('LOWER(t.title) LIKE LOWER(:kw)')
            ->orWhere('LOWER(t.description) LIKE LOWER(:kw)')
            ->setParameter('kw', '%' . $keyword . '%')
            ->orderBy('t.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /** Stats par statut pour le dashboard admin */
    public function countByStatus(): array
    {
        return $this->createQueryBuilder('t')
            ->select('t.status AS status, COUNT(t.id) AS total')
            ->groupBy('t.status')
            ->getQuery()
            ->getResult();
    }

    /** Tous les tests pour l'admin */
    public function findAll(): array
    {
        return $this->createQueryBuilder('t')
            ->orderBy('t.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }
}
