<?php

namespace App\Controller;

use App\Service\UserProgressService;
use App\Service\UserSessionService;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class UserProgressController extends AbstractController
{
    #[Route('/user/history', name: 'user_test_history', methods: ['GET'])]
    public function history(
        Request $request,
        UserProgressService $userProgressService,
        PaginatorInterface $paginator,
        UserSessionService $userSessionService
    ): Response {
        $userId = $userSessionService->getCurrentUserId($request);
        $history = $userProgressService->getUserHistory($userId);

        $pagination = $paginator->paginate(
            $history,
            $request->query->getInt('page', 1),
            6
        );

        return $this->render('user_progress/history.html.twig', [
            'history' => $pagination,
            'historyCount' => count($history),
        ]);
    }

    #[Route('/user/evolution', name: 'user_test_evolution', methods: ['GET'])]
    public function evolution(Request $request, UserProgressService $userProgressService, UserSessionService $userSessionService): Response
    {
        $userId = $userSessionService->getCurrentUserId($request);

        return $this->render('user_progress/evolution.html.twig', [
            'evolution' => $userProgressService->getEvolution($userId),
        ]);
    }
}