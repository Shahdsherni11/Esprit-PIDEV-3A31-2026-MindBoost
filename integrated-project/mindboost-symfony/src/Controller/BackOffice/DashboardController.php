<?php

namespace App\Controller\BackOffice;

use App\Repository\AchievementRepository;
use App\Repository\CommentRepository;
use App\Repository\PostRepository;
use App\Repository\SavesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin')]
class DashboardController extends AbstractController
{
    public function __construct(
        private PostRepository $postRepository,
        private CommentRepository $commentRepository,
        private AchievementRepository $achievementRepository,
        private SavesRepository $savesRepository
    ) {}

    #[Route('', name: 'back_dashboard', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('back/dashboard/index.html.twig', [
            'totalPosts' => $this->postRepository->count([]),
            'totalComments' => $this->commentRepository->count([]),
            'totalAchievements' => $this->achievementRepository->count([]),
            'totalSaves' => $this->savesRepository->count([]),
            'recentPosts' => $this->postRepository->findBy([], ['id' => 'DESC'], 5),
        ]);
    }
}
