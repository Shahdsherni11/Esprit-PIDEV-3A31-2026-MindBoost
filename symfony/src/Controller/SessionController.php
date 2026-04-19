<?php

namespace App\Controller;

use App\Service\UserSessionService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

class SessionController extends AbstractController
{
    #[Route('/session/set', name: 'session_set', methods: ['GET'])]
    public function set(Request $request, UserSessionService $userSessionService): RedirectResponse
    {
        $userId = max(1, (int) $request->query->get('userId', 1));
        $role = (string) $request->query->get('role', 'ROLE_USER');
        $email = $request->query->get('email');

        $userSessionService->setCurrentUser($request, $userId, $role, is_string($email) ? $email : null);
        $this->addFlash('success', 'Session utilisateur mise à jour.');

        $target = (string) $request->query->get('target', '/user');
        if (!str_starts_with($target, '/')) {
            $target = '/user';
        }

        return new RedirectResponse($target);
    }
}
