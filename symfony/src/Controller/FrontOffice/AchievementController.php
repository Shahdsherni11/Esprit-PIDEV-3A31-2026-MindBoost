<?php

namespace App\Controller\FrontOffice;

use App\Repository\AchievementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/achievements')]
class AchievementController extends AbstractController
{
    public function __construct(
        private AchievementRepository $achievementRepository
    ) {}

    #[Route('', name: 'front_achievement_index', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('front/achievement/index.html.twig', [
            'achievements' => $this->achievementRepository->findBy([], ['achievementScore' => 'DESC']),
        ]);
    }
}
