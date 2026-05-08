<?php

namespace App\Service;

use App\Entity\User;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Request;

class UserSessionService
{
    public function __construct(private Security $security)
    {
    }

    private function getAuthenticatedUser(): ?User
    {
        $user = $this->security->getUser();
        return $user instanceof User ? $user : null;
    }

    public function bootstrap(Request $request): void
    {
        // No-op: real authentication is handled by Symfony Security
    }

    public function getCurrentUserId(Request $request): int
    {
        $user = $this->getAuthenticatedUser();
        if ($user) {
            return $user->getId() ?? 1;
        }
        return max(1, (int) $request->getSession()->get('user_id', 1));
    }

    public function getCurrentUserRole(Request $request): string
    {
        $user = $this->getAuthenticatedUser();
        if ($user) {
            return $user->isAdmin() ? 'ROLE_ADMIN' : 'ROLE_USER';
        }
        $role = strtoupper((string) $request->getSession()->get('user_role', 'ROLE_USER'));
        return $role === 'ROLE_ADMIN' ? 'ROLE_ADMIN' : 'ROLE_USER';
    }

    public function isAdmin(Request $request): bool
    {
        return $this->security->isGranted('ROLE_ADMIN');
    }

    public function setCurrentUser(Request $request, int $userId, string $role, ?string $email = null): void
    {
        $normalizedRole = strtoupper($role) === 'ROLE_ADMIN' || strtoupper($role) === 'ADMIN'
            ? 'ROLE_ADMIN'
            : 'ROLE_USER';

        $session = $request->getSession();
        $session->set('user_id', max(1, $userId));
        $session->set('user_role', $normalizedRole);

        if ($email !== null && trim($email) !== '') {
            $session->set('user_email', trim($email));
        }
    }
}
