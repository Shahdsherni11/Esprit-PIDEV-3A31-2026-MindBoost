<?php

namespace App\Repository;

use App\Entity\GeneralTest;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<GeneralTest>
 */
class GeneralTestRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GeneralTest::class);
    }

    /**
     * Trouver tous les tests par statut
     */
    public function findByStatus(string $status): array
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.status = :status')
            ->setParameter('status', $status)
            ->orderBy('g.id', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Trouver tous les tests triés par date de création
     */
    public function findAllOrderedByCreatedAt(): array
    {
        return $this->createQueryBuilder('g')
            ->orderBy('g.created_at', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Trouver un test par titre
     */
    public function findByTitle(string $title): ?GeneralTest
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.title = :title')
            ->setParameter('title', $title)
            ->getQuery()
            ->getOneOrNullResult();
    }
}