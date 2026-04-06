<?php

namespace App\Repository;

use App\Entity\TacheFocus;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class TacheFocusRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TacheFocus::class);
    }

    /** Tâches d'un utilisateur triées par priorité (DQL) */
    public function findByUser(int $userId): array
    {
        return $this->createQueryBuilder('t')
            ->where('t.idUser = :uid')
            ->setParameter('uid', $userId)
            ->orderBy('t.priorite', 'ASC')
            ->addOrderBy('t.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /** Recherche par titre ou objectif (DQL) */
    public function searchByKeyword(int $userId, string $keyword): array
    {
        return $this->createQueryBuilder('t')
            ->where('t.idUser = :uid')
            ->andWhere('LOWER(t.titre) LIKE LOWER(:kw) OR LOWER(t.objectifPrincipal) LIKE LOWER(:kw)')
            ->setParameter('uid', $userId)
            ->setParameter('kw', '%' . $keyword . '%')
            ->orderBy('t.priorite', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /** Filtre par statut (DQL) */
    public function findByUserAndStatut(int $userId, string $statut): array
    {
        return $this->createQueryBuilder('t')
            ->where('t.idUser = :uid')
            ->andWhere('t.statut = :statut')
            ->setParameter('uid', $userId)
            ->setParameter('statut', $statut)
            ->orderBy('t.priorite', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /** Statistiques productivité utilisateur (DQL) */
    public function getStatsForUser(int $userId): array
    {
        $qb = $this->createQueryBuilder('t')->where('t.idUser = :uid')->setParameter('uid', $userId);

        $total     = (clone $qb)->select('COUNT(t.id)')->getQuery()->getSingleScalarResult();
        $terminees = (clone $qb)->select('COUNT(t.id)')->andWhere("t.statut = 'Terminée'")->getQuery()->getSingleScalarResult();
        $enCours   = (clone $qb)->select('COUNT(t.id)')->andWhere("t.statut = 'En cours'")->getQuery()->getSingleScalarResult();
        $scoreMoyen = $total > 0
            ? (clone $qb)->select('AVG(t.scoreProductivite)')->getQuery()->getSingleScalarResult()
            : 0;

        return [
            'total'      => (int)$total,
            'terminees'  => (int)$terminees,
            'enCours'    => (int)$enCours,
            'scoreMoyen' => round((float)$scoreMoyen, 1),
        ];
    }
}
