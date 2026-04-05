<?php

namespace App\Repository;

use App\Entity\Saves;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Saves>
 */
class SavesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Saves::class);
    }

    public function findByUserId(int $userId): array
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.userId = :userId')
            ->setParameter('userId', $userId)
            ->getQuery()
            ->getResult();
    }

    public function countByPostId(int $postId): int
    {
        return (int) $this->createQueryBuilder('s')
            ->select('COUNT(s.id)')
            ->andWhere('s.postId = :postId')
            ->setParameter('postId', $postId)
            ->getQuery()
            ->getSingleScalarResult();
    }
}
