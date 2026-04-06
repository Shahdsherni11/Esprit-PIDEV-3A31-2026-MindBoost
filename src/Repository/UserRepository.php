<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\PasswordUpgraderInterface;

class UserRepository extends ServiceEntityRepository implements PasswordUpgraderInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    public function upgradePassword(PasswordAuthenticatedUserInterface $user, string $newHashedPassword): void
    {
        if (!$user instanceof User) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', $user::class));
        }
        $user->setPassword($newHashedPassword);
        $this->getEntityManager()->persist($user);
        $this->getEntityManager()->flush();
    }

    /**
     * Recherche DQL des utilisateurs par email, prénom ou nom
     */
    public function searchUsers(string $keyword): array
    {
        return $this->createQueryBuilder('u')
            ->leftJoin('u.profile', 'p')
            ->addSelect('p')
            ->where('u.email LIKE :keyword')
            ->orWhere('p.firstName LIKE :keyword')
            ->orWhere('p.lastName LIKE :keyword')
            ->orWhere('u.role LIKE :keyword')
            ->setParameter('keyword', '%' . $keyword . '%')
            ->orderBy('u.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Récupère tous les utilisateurs avec leurs profils (jointure)
     */
    public function findAllWithProfiles(): array
    {
        return $this->createQueryBuilder('u')
            ->leftJoin('u.profile', 'p')
            ->addSelect('p')
            ->orderBy('u.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Filtrer par rôle
     */
    public function findByRole(string $role): array
    {
        return $this->createQueryBuilder('u')
            ->leftJoin('u.profile', 'p')
            ->addSelect('p')
            ->where('u.role = :role')
            ->setParameter('role', $role)
            ->orderBy('u.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Statistiques pour le dashboard admin
     */
    public function getStats(): array
    {
        $total = $this->createQueryBuilder('u')
            ->select('COUNT(u.id)')
            ->getQuery()->getSingleScalarResult();

        $verified = $this->createQueryBuilder('u')
            ->select('COUNT(u.id)')
            ->where('u.isVerified = true')
            ->getQuery()->getSingleScalarResult();

        $byRole = $this->createQueryBuilder('u')
            ->select('u.role, COUNT(u.id) as cnt')
            ->groupBy('u.role')
            ->getQuery()->getResult();

        $recent = $this->createQueryBuilder('u')
            ->select('COUNT(u.id)')
            ->where('u.createdAt >= :date')
            ->setParameter('date', new \DateTimeImmutable('-30 days'))
            ->getQuery()->getSingleScalarResult();

        return [
            'total'    => $total,
            'verified' => $verified,
            'byRole'   => $byRole,
            'recent'   => $recent,
        ];
    }

    /**
     * Filtrer par statut de vérification + rôle
     */
    public function findFiltered(?string $role, ?bool $verified, ?string $search): array
    {
        $qb = $this->createQueryBuilder('u')
            ->leftJoin('u.profile', 'p')
            ->addSelect('p');

        if ($role && $role !== 'all') {
            $qb->andWhere('u.role = :role')->setParameter('role', $role);
        }
        if ($verified !== null) {
            $qb->andWhere('u.isVerified = :verified')->setParameter('verified', $verified);
        }
        if ($search) {
            $qb->andWhere(
                $qb->expr()->orX(
                    $qb->expr()->like('u.email', ':s'),
                    $qb->expr()->like('p.firstName', ':s'),
                    $qb->expr()->like('p.lastName', ':s')
                )
            )->setParameter('s', '%' . $search . '%');
        }

        return $qb->orderBy('u.createdAt', 'DESC')->getQuery()->getResult();
    }
}
