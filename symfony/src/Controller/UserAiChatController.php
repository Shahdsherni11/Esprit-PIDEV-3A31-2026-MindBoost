<?php

namespace App\Controller;

use App\Entity\SpecificScore;
use App\Service\UserAiCoachService;
use App\Service\UserSessionService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/user/ai', name: 'user_ai_')]
class UserAiChatController extends AbstractController
{
    #[Route('/chat', name: 'chat', methods: ['GET'])]
    public function chat(Request $request, EntityManagerInterface $entityManager, UserSessionService $userSessionService): Response
    {
        $userId = $userSessionService->getCurrentUserId($request);
        $latest = $entityManager->getRepository(SpecificScore::class)->findOneBy(
            ['userId' => $userId],
            ['passedAt' => 'DESC']
        );

        $category = $latest?->getCategory() ?? 'Bien-être général';

        return $this->render('user_ai/chat.html.twig', [
            'category' => $category,
        ]);
    }

    #[Route('/chat/message', name: 'chat_message', methods: ['POST'])]
    public function send(
        Request $request,
        EntityManagerInterface $entityManager,
        UserAiCoachService $userAiCoachService,
        UserSessionService $userSessionService
    ): JsonResponse {
        $message = trim((string) $request->request->get('message', ''));
        if ($message === '') {
            return new JsonResponse(['error' => 'Message vide'], 400);
        }

        $userId = $userSessionService->getCurrentUserId($request);
        $latest = $entityManager->getRepository(SpecificScore::class)->findOneBy(
            ['userId' => $userId],
            ['passedAt' => 'DESC']
        );

        $category = $latest?->getCategory() ?? 'Bien-être général';
        $reply = $userAiCoachService->ask($category, $message);

        return new JsonResponse([
            'reply' => $reply,
            'category' => $category,
        ]);
    }
}