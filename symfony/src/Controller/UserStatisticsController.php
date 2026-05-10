<?php

namespace App\Controller;

use App\Service\UserStatisticsService;
use App\Service\MotivationalService;
use App\Service\UserSessionService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\UX\Chartjs\Builder\ChartBuilderInterface;
use Symfony\UX\Chartjs\Model\Chart;

class UserStatisticsController extends AbstractController
{
    #[Route('/user/statistics', name: 'user_statistics_dashboard', methods: ['GET'])]
    public function index(
        UserStatisticsService $userStatisticsService,
        MotivationalService $motivationalService,
        ChartBuilderInterface $chartBuilder,
        Request $request,
        UserSessionService $userSessionService
    ): Response {
        $userId = $userSessionService->getCurrentUserId($request);
        $stats = $userStatisticsService->getUserStatistics($userId);
        $motivationalQuote = $motivationalService->getMotivationalContent();

        $progressChart = $chartBuilder->createChart(Chart::TYPE_LINE);
        $progressChart->setData([
            'labels' => $stats['weekly_labels'],
            'datasets' => [[
                'label' => 'Pourcentage',
                'data' => $stats['weekly_values'],
                'borderColor' => '#2563eb',
                'backgroundColor' => 'rgba(37,99,235,0.15)',
                'fill' => true,
                'tension' => 0.35,
            ]],
        ]);
        $progressChart->setOptions(['responsive' => true]);

        $userCategoryChart = $chartBuilder->createChart(Chart::TYPE_DOUGHNUT);
        $userCategoryChart->setData([
            'labels' => $stats['category_labels'],
            'datasets' => [[
                'data' => $stats['category_values'],
                'backgroundColor' => ['#ef4444', '#f59e0b', '#3b82f6', '#8b5cf6', '#10b981'],
            ]],
        ]);

        return $this->render('user_statistics/index.html.twig', [
            'stats' => $stats,
            'progressChart' => $progressChart,
            'userCategoryChart' => $userCategoryChart,
            'motivationalQuote' => $motivationalQuote,
        ]);
    }

    #[Route('/user/statistics/send-email', name: 'user_statistics_send_email', methods: ['POST'])]
    public function sendStatisticsEmail(
        UserStatisticsService $userStatisticsService,
        MotivationalService $motivationalService,
        Request $request,
        UserSessionService $userSessionService
    ): Response {
        $userId = $userSessionService->getCurrentUserId($request);
        $userEmail = (string) $request->getSession()->get('user_email', '');

        if ($userEmail === '') {
            $this->addFlash('error', '❌ Ajoutez un email de session via /session/set?email=votre@email.com');
            return $this->redirectToRoute('user_statistics_dashboard');
        }

        $userName = 'Utilisateur #' . $userId;

        $stats = $userStatisticsService->getUserStatistics($userId);

        $emailSent = $motivationalService->sendStatisticsReportToUser(
            $userEmail,
            $userName,
            $stats
        );

        if ($emailSent) {
            $this->addFlash('success', '📧 Email envoyé à votre adresse avec succès !');
        } else {
            $this->addFlash('error', '❌ Erreur lors de l’envoi.');
        }

        return $this->redirectToRoute('user_statistics_dashboard');
    }
}