<?php

namespace App\Repository;

use App\Entity\Comment;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Comment>
 */
class CommentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Comment::class);
    }

    public function findByPostId(int $postId): array
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.postId = :postId')
            ->setParameter('postId', $postId)
            ->orderBy('c.id', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function countByPostId(int $postId): int
    {
        return (int) $this->createQueryBuilder('c')
            ->select('COUNT(c.id)')
            ->andWhere('c.postId = :postId')
            ->setParameter('postId', $postId)
            ->getQuery()
            ->getSingleScalarResult();
    }

    public function sumLikesByPostId(int $postId): int
    {
        return (int) $this->createQueryBuilder('c')
            ->select('SUM(c.likes)')
            ->andWhere('c.postId = :postId')
            ->setParameter('postId', $postId)
            ->getQuery()
            ->getSingleScalarResult();
    }

    public function sumDislikesByPostId(int $postId): int
    {
        return (int) $this->createQueryBuilder('c')
            ->select('SUM(c.dislikes)')
            ->andWhere('c.postId = :postId')
            ->setParameter('postId', $postId)
            ->getQuery()
            ->getSingleScalarResult();
    }

    /** Returns [ userId => commentCount ] for the given post, sorted desc. */
    public function commentsPerUserByPostId(int $postId): array
    {
        $rows = $this->createQueryBuilder('c')
            ->select('c.userId, COUNT(c.id) AS cnt')
            ->andWhere('c.postId = :postId')
            ->setParameter('postId', $postId)
            ->groupBy('c.userId')
            ->orderBy('cnt', 'DESC')
            ->getQuery()
            ->getResult();

        $result = [];
        foreach ($rows as $row) {
            $result[$row['userId']] = (int) $row['cnt'];
        }
        return $result;
    }
}
