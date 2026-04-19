<?php

namespace App\Repository;

use App\Entity\SpecificTest;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class SpecificTestRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SpecificTest::class);
    }

    public function findByGeneralTestId(int $generalTestId): array
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.generalTestId = :generalTestId')
            ->setParameter('generalTestId', $generalTestId)
            ->orderBy('s.id', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function findByCategory(string $category): array
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.category = :category')
            ->setParameter('category', $category)
            ->orderBy('s.id', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function findAllOrderedByCreatedAt(): array
    {
        return $this->createQueryBuilder('s')
            ->orderBy('s.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }

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