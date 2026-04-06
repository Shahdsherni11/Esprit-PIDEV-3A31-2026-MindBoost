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

    public function searchByKeyword(string $keyword): array
    {
        return $this->createQueryBuilder('p')
            ->join('p.user', 'u')
            ->where('LOWER(p.firstName) LIKE LOWER(:kw)')
            ->orWhere('LOWER(p.lastName) LIKE LOWER(:kw)')
            ->orWhere('LOWER(u.email) LIKE LOWER(:kw)')
            ->setParameter('kw', '%' . $keyword . '%')
            ->orderBy('p.lastName', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function filterByPersonalityType(string $type): array
    {
        return $this->createQueryBuilder('p')
            ->where('p.personalityType = :type')
            ->setParameter('type', $type)
            ->orderBy('p.lastName', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function countByPersonalityType(): array
    {
        return $this->createQueryBuilder('p')
            ->select('p.personalityType AS type, COUNT(p.id) AS total')
            ->where('p.personalityType IS NOT NULL')
            ->groupBy('p.personalityType')
            ->orderBy('total', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function findAllWithUser(): array
    {
        return $this->createQueryBuilder('p')
            ->join('p.user', 'u')
            ->addSelect('u')
            ->orderBy('p.lastName', 'ASC')
            ->getQuery()
            ->getResult();
    }
}
