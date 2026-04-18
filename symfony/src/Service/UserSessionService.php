<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\Request;

class UserSessionService
{
    public function bootstrap(Request $request): void
    {
        $session = $request->getSession();

        if (!$session->has('user_id')) {
            $session->set('user_id', 1);
        }

        if (!$session->has('user_role')) {
            $session->set('user_role', 'ROLE_USER');
        }
    }

    public function getCurrentUserId(Request $request): int
    {
        $this->bootstrap($request);
        return max(1, (int) $request->getSession()->get('user_id', 1));
    }

    public function getCurrentUserRole(Request $request): string
    {
        $this->bootstrap($request);
        $role = strtoupper((string) $request->getSession()->get('user_role', 'ROLE_USER'));

        return $role === 'ROLE_ADMIN' ? 'ROLE_ADMIN' : 'ROLE_USER';
    }

    public function isAdmin(Request $request): bool
    {
        return $this->getCurrentUserRole($request) === 'ROLE_ADMIN';
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
