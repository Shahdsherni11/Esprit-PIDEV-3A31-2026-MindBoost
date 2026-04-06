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

    /** Recherche DQL par email ou nom de profil */
    public function searchByKeyword(string $keyword): array
    {
        return $this->createQueryBuilder('u')
            ->leftJoin('u.profile', 'p')
            ->addSelect('p')
            ->where('LOWER(u.email) LIKE LOWER(:kw)')
            ->orWhere('LOWER(p.firstName) LIKE LOWER(:kw)')
            ->orWhere('LOWER(p.lastName) LIKE LOWER(:kw)')
            ->setParameter('kw', '%' . $keyword . '%')
            ->orderBy('u.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /** Filtre par rôle (DQL) */
    public function findByRole(string $role): array
    {
        return $this->createQueryBuilder('u')
            ->where('u.role = :role')
            ->setParameter('role', $role)
            ->orderBy('u.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /** Stats pour dashboard admin */
    public function getStats(): array
    {
        $total  = $this->createQueryBuilder('u')->select('COUNT(u.id)')->getQuery()->getSingleScalarResult();
        $admins = $this->createQueryBuilder('u')->select('COUNT(u.id)')->where("u.role = 'admin'")->getQuery()->getSingleScalarResult();
        $psycho = $this->createQueryBuilder('u')->select('COUNT(u.id)')->where("u.role = 'psychologist'")->getQuery()->getSingleScalarResult();

        return ['total' => $total, 'admins' => $admins, 'psychologists' => $psycho, 'users' => $total - $admins - $psycho];
    }

    /** Tous users avec profil (évite N+1) */
    public function findAllWithProfile(): array
    {
        return $this->createQueryBuilder('u')
            ->leftJoin('u.profile', 'p')
            ->addSelect('p')
            ->orderBy('u.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }
}
