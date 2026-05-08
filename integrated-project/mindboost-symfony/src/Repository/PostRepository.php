<?php

namespace App\Repository;

use App\Entity\Post;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Post>
 */
class PostRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Post::class);
    }

    public function findByTag(string $tag): array
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.tag = :tag')
            ->setParameter('tag', $tag)
            ->orderBy('p.id', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function searchByTitle(string $query): array
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.title LIKE :query OR p.content LIKE :query')
            ->setParameter('query', '%' . $query . '%')
            ->orderBy('p.id', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function findMostLiked(): ?Post
    {
        return $this->createQueryBuilder('p')
            ->orderBy('p.likes', 'DESC')
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
    }
}
