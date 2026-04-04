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
}
