<?php

namespace App\Repository;

use App\Entity\SpecificTest;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SpecificTest>
 */
class SpecificTestRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SpecificTest::class);
    }

    /**
     * Trouver tous les tests par ID de test général
     */
    public function findByGeneralTestId(int $generalTestId): array
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.general_test_id = :generalTestId')
            ->setParameter('generalTestId', $generalTestId)
            ->orderBy('s.id', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Trouver tous les tests par catégorie
     */
    public function findByCategory(string $category): array
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.category = :category')
            ->setParameter('category', $category)
            ->orderBy('s.id', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Trouver tous les tests triés par date de création
     */
    public function findAllOrderedByCreatedAt(): array
    {
        return $this->createQueryBuilder('s')
            ->orderBy('s.created_at', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Trouver un test par titre et catégorie
     */
    public function findByTitleAndCategory(string $title, string $category): ?SpecificTest
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.title = :title')
            ->andWhere('s.category = :category')
            ->setParameter('title', $title)
            ->setParameter('category', $category)
            ->getQuery()
            ->getOneOrNullResult();
    }
}