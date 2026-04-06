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

    public function findByStatus(string $status): array
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.status = :status')
            ->setParameter('status', $status)
            ->orderBy('g.id', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function findAllOrderedByCreatedAt(): array
    {
        return $this->createQueryBuilder('g')
            ->orderBy('g.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function findByTitle(string $title): ?GeneralTest
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.title = :title')
            ->setParameter('title', $title)
            ->getQuery()
            ->getOneOrNullResult();
    }
}