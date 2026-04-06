<?php

namespace App\Controller;

use App\Repository\UserRepository;
use App\Repository\ProfileRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class DashboardController extends AbstractController
{
    #[Route('/admin', name: 'admin_dashboard')]
    #[IsGranted('ROLE_ADMIN')]
    public function adminDashboard(UserRepository $userRepository, ProfileRepository $profileRepository): Response
    {
        $stats = $userRepository->getStats();
        $recentUsers = $userRepository->findBy([], ['createdAt' => 'DESC'], 5);
        $profileCount = count($profileRepository->findAll());

        return $this->render('admin/dashboard.html.twig', [
            'stats'        => $stats,
            'recentUsers'  => $recentUsers,
            'profileCount' => $profileCount,
        ]);
    }

    #[Route('/user/dashboard', name: 'app_user_dashboard')]
    #[IsGranted('ROLE_USER')]
    public function userDashboard(): Response
    {
        /** @var \App\Entity\User $user */
        $user = $this->getUser();
        return $this->render('user/dashboard.html.twig', [
            'user'    => $user,
            'profile' => $user->getProfile(),
        ]);
    }
}
