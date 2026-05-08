<?php

namespace App\Controller;

use App\Service\AdminInsightsService;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AdminInsightsController extends AbstractController
{
    #[Route('/admin/results-history', name: 'admin_results_history', methods: ['GET'])]
    public function results(
        Request $request,
        AdminInsightsService $adminInsightsService,
        PaginatorInterface $paginator
    ): Response {
        $history = $adminInsightsService->getResultHistory();

        $pagination = $paginator->paginate(
            $history,
            $request->query->getInt('page', 1),
            6
        );

        return $this->render('admin_insights/results.html.twig', [
            'history' => $pagination,
            'historyCount' => count($history),
        ]);
    }

    #[Route('/admin/analytics-dashboard', name: 'admin_analytics_dashboard', methods: ['GET'])]
    public function analytics(AdminInsightsService $adminInsightsService): Response
    {
        return $this->render('admin_insights/analytics.html.twig', [
            'stats' => $adminInsightsService->getAnalytics(),
        ]);
    }
}