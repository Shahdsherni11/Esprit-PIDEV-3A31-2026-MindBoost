<?php

namespace App\Controller\FrontOffice;

use App\Entity\Saves;
use App\Repository\SavesRepository;
use App\Service\UserSessionService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/saves')]
class SavesController extends AbstractController
{
    public function __construct(
        private SavesRepository $savesRepository,
        private EntityManagerInterface $em,
        private UserSessionService $userSessionService
    ) {}

    #[Route('', name: 'front_saves_index', methods: ['GET'])]
    public function index(Request $request): Response
    {
        $userId = $this->userSessionService->getCurrentUserId($request);

        return $this->render('front/saves/index.html.twig', [
            'saves' => $this->savesRepository->findBy(['userId' => $userId]),
        ]);
    }

    #[Route('/post/{postId}', name: 'front_saves_save', methods: ['POST'], requirements: ['postId' => '\d+'])]
    public function save(int $postId, Request $request): Response
    {
        if (!$this->isCsrfTokenValid('save_post' . $postId, $request->request->get('_token'))) {
            $this->addFlash('error', 'Invalid security token.');
            return $this->redirectToRoute('front_post_show', ['id' => $postId]);
        }

        $userId = $this->userSessionService->getCurrentUserId($request);

        $existing = $this->savesRepository->findOneBy(['postId' => $postId, 'userId' => $userId]);
        if ($existing) {
            $this->addFlash('info', 'Post already saved.');
            return $this->redirectToRoute('front_post_show', ['id' => $postId]);
        }

        $save = new Saves();
        $save->setPostId($postId);
        $save->setUserId($userId);

        $this->em->persist($save);
        $this->em->flush();

        $this->addFlash('success', 'Post saved successfully!');
        return $this->redirectToRoute('front_post_show', ['id' => $postId]);
    }
}
