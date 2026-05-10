<?php

namespace App\Service;

use App\Entity\SpecificScore;
use Doctrine\ORM\EntityManagerInterface;

class UserStatisticsService
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function getUserStatistics(int $userId): array
    {
        $scores = $this->entityManager->getRepository(SpecificScore::class)->findBy(
            ['userId' => $userId],
            ['passedAt' => 'ASC']
        );

        $totalTests = count($scores);
        $bestPercentage = 0;
        $sum = 0;

        $categories = [];
        $levels = [];
        $weeklyProgress = [];
        $history = [];

        foreach ($scores as $score) {
            $percentage = (int) ($score->getPercentage() ?? 0);
            $sum += $percentage;
            $bestPercentage = max($bestPercentage, $percentage);

            $category = $score->getCategory() ?: 'Non définie';
            $level = $score->getLevel() ?: 'Non défini';
            $week = 'Semaine ' . ($score->getWeekNumber() ?? 0);

            $categories[$category] = ($categories[$category] ?? 0) + 1;
            $levels[$level] = ($levels[$level] ?? 0) + 1;
            $weeklyProgress[$week] = $percentage;

            $history[] = [
                'week' => $score->getWeekNumber(),
                'category' => $category,
                'level' => $level,
                'percentage' => $percentage,
                'date' => $score->getPassedAt(),
            ];
        }

        arsort($categories);
        arsort($levels);
        ksort($weeklyProgress);

        return [
            'kpis' => [
                'total_tests' => $totalTests,
                'best_percentage' => $bestPercentage,
                'average_percentage' => $totalTests > 0 ? round($sum / $totalTests) : 0,
                'dominant_category' => $totalTests > 0 ? array_key_first($categories) : '-',
                'dominant_level' => $totalTests > 0 ? array_key_first($levels) : '-',
            ],
            'categories' => $categories,
            'levels' => $levels,
            'weekly_progress' => $weeklyProgress,
            'history' => $history,

            'category_labels' => array_keys($categories),
            'category_values' => array_values($categories),

            'level_labels' => array_keys($levels),
            'level_values' => array_values($levels),

            'weekly_labels' => array_keys($weeklyProgress),
            'weekly_values' => array_values($weeklyProgress),
        ];
    }
}