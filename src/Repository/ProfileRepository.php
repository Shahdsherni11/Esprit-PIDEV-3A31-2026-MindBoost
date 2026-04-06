<?php

namespace App\Repository;

use App\Entity\Profile;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ProfileRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Profile::class);
    }

    public function findAllWithUsers(): array
    {
        return $this->createQueryBuilder('p')
            ->join('p.user', 'u')
            ->addSelect('u')
            ->orderBy('p.firstName', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function searchProfiles(string $keyword): array
    {
        return $this->createQueryBuilder('p')
            ->join('p.user', 'u')
            ->addSelect('u')
            ->where('p.firstName LIKE :keyword')
            ->orWhere('p.lastName LIKE :keyword')
            ->orWhere('p.phone LIKE :keyword')
            ->orWhere('u.email LIKE :keyword')
            ->setParameter('keyword', '%' . $keyword . '%')
            ->orderBy('p.firstName', 'ASC')
            ->getQuery()
            ->getResult();
    }
}
