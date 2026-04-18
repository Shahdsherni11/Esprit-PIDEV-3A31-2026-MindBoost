<?php

namespace App\Controller;

use App\Service\AdminReminderMailer;
use App\Service\AdminStatisticsService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\UX\Chartjs\Builder\ChartBuilderInterface;
use Symfony\UX\Chartjs\Model\Chart;

class AdminStatisticsController extends AbstractController
{
    #[Route('/admin/statistics', name: 'admin_statistics_dashboard', methods: ['GET'])]
    public function index(
        AdminStatisticsService $adminStatisticsService,
        ChartBuilderInterface $chartBuilder
    ): Response {
        $stats = $adminStatisticsService->getDashboardData();

        $categoryChart = $chartBuilder->createChart(Chart::TYPE_PIE);
        $categoryChart->setData([
            'labels' => $stats['category_labels'],
            'datasets' => [[
                'data' => $stats['category_values'],
                'backgroundColor' => ['#ef4444', '#f59e0b', '#3b82f6', '#8b5cf6', '#10b981'],
            ]],
        ]);

        $levelChart = $chartBuilder->createChart(Chart::TYPE_DOUGHNUT);
        $levelChart->setData([
            'labels' => $stats['level_labels'],
            'datasets' => [[
                'data' => $stats['level_values'],
                'backgroundColor' => ['#22c55e', '#f59e0b', '#ef4444', '#64748b'],
            ]],
        ]);

        $scoreRangeChart = $chartBuilder->createChart(Chart::TYPE_BAR);
        $scoreRangeChart->setData([
            'labels' => $stats['score_range_labels'],
            'datasets' => [[
                'label' => 'Étudiants',
                'data' => $stats['score_range_values'],
                'backgroundColor' => ['#ef4444', '#f59e0b', '#3b82f6', '#8b5cf6'],
            ]],
        ]);
        $scoreRangeChart->setOptions([
            'responsive' => true,
            'plugins' => [
                'legend' => ['display' => false],
            ],
        ]);

        $weeklyChart = $chartBuilder->createChart(Chart::TYPE_LINE);
        $weeklyChart->setData([
            'labels' => $stats['weekly_labels'],
            'datasets' => [[
                'label' => 'Passages',
                'data' => $stats['weekly_values'],
                'borderColor' => '#2563eb',
                'backgroundColor' => 'rgba(37,99,235,0.15)',
                'fill' => true,
                'tension' => 0.35,
            ]],
        ]);
        $weeklyChart->setOptions([
            'responsive' => true,
        ]);

        $generalUsageChart = $chartBuilder->createChart(Chart::TYPE_BAR);
        $generalUsageChart->setData([
            'labels' => $stats['general_usage_labels'],
            'datasets' => [[
                'label' => 'Utilisations',
                'data' => $stats['general_usage_values'],
                'backgroundColor' => '#2563eb',
            ]],
        ]);
        $generalUsageChart->setOptions([
            'indexAxis' => 'y',
            'plugins' => [
                'legend' => ['display' => false],
            ],
        ]);

        $specificUsageChart = $chartBuilder->createChart(Chart::TYPE_BAR);
        $specificUsageChart->setData([
            'labels' => $stats['specific_usage_labels'],
            'datasets' => [[
                'label' => 'Utilisations',
                'data' => $stats['specific_usage_values'],
                'backgroundColor' => '#06b6d4',
            ]],
        ]);
        $specificUsageChart->setOptions([
            'indexAxis' => 'y',
            'plugins' => [
                'legend' => ['display' => false],
            ],
        ]);

        return $this->render('admin_statistics/index.html.twig', [
            'stats' => $stats,
            'categoryChart' => $categoryChart,
            'levelChart' => $levelChart,
            'scoreRangeChart' => $scoreRangeChart,
            'weeklyChart' => $weeklyChart,
            'generalUsageChart' => $generalUsageChart,
            'specificUsageChart' => $specificUsageChart,
        ]);
    }

    #[Route('/admin/statistics/reminder/send', name: 'admin_statistics_send_reminder', methods: ['POST'])]
    public function sendReminder(AdminReminderMailer $adminReminderMailer): Response
    {
        try {
            $toEmail = 'test@example.com';
            $testUrl = $this->generateUrl('general_test_index', [], UrlGeneratorInterface::ABSOLUTE_URL);
            $adminReminderMailer->sendTestReminder($toEmail, 'Étudiant', $testUrl);
            $this->addFlash('success', 'Email de rappel envoyé avec succès.');
        } catch (\Throwable $e) {
            $this->addFlash('error', 'Erreur envoi email: ' . $e->getMessage());
        }

        return $this->redirectToRoute('admin_statistics_dashboard');
    }
}