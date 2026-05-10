<?php

namespace App\Service;

use App\Entity\GeneralTest;
use App\Entity\Score;
use App\Entity\SpecificScore;
use App\Entity\SpecificTest;
use Doctrine\ORM\EntityManagerInterface;

class AdminStatisticsService
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function getDashboardData(): array
    {
        $generalScores = $this->entityManager->getRepository(Score::class)->findAll();
        $specificScores = $this->entityManager->getRepository(SpecificScore::class)->findAll();
        $generalTests = $this->indexById($this->entityManager->getRepository(GeneralTest::class)->findAll());
        $specificTests = $this->indexById($this->entityManager->getRepository(SpecificTest::class)->findAll());

        $studentIds = [];
        $categoryCounts = [];
        $levelCounts = [];
        $scoreRanges = [
            '0-24' => 0,
            '25-49' => 0,
            '50-74' => 0,
            '75-100' => 0,
        ];
        $weeklyCounts = [];
        $generalUsage = [];
        $specificUsage = [];

        $generalSum = 0;
        $generalCount = 0;

        foreach ($generalScores as $score) {
            $studentIds[$score->getUserId()] = true;
            $generalSum += (int) ($score->getPercentage() ?? 0);
            $generalCount++;

            $title = $generalTests[$score->getGeneralTestId()]?->getTitle() ?? 'Test général';
            $generalUsage[$title] = ($generalUsage[$title] ?? 0) + 1;
        }

        foreach ($specificScores as $score) {
            $studentIds[$score->getUserId()] = true;

            $category = $score->getCategory() ?: 'Non définie';
            $level = $score->getLevel() ?: 'Non défini';
            $percentage = (int) ($score->getPercentage() ?? 0);

            $categoryCounts[$category] = ($categoryCounts[$category] ?? 0) + 1;
            $levelCounts[$level] = ($levelCounts[$level] ?? 0) + 1;

            if ($percentage <= 24) {
                $scoreRanges['0-24']++;
            } elseif ($percentage <= 49) {
                $scoreRanges['25-49']++;
            } elseif ($percentage <= 74) {
                $scoreRanges['50-74']++;
            } else {
                $scoreRanges['75-100']++;
            }

            $weekLabel = 'Semaine ' . ($score->getWeekNumber() ?? 0);
            $weeklyCounts[$weekLabel] = ($weeklyCounts[$weekLabel] ?? 0) + 1;

            $title = $specificTests[$score->getSpecificTestId()]?->getTitle() ?? 'Test spécifique';
            $specificUsage[$title] = ($specificUsage[$title] ?? 0) + 1;
        }

        ksort($weeklyCounts);
        arsort($categoryCounts);
        arsort($levelCounts);
        arsort($generalUsage);
        arsort($specificUsage);

        return [
            'kpis' => [
                'total_general_results' => count($generalScores),
                'total_specific_results' => count($specificScores),
                'total_students_tested' => count($studentIds),
                'average_general_score' => $generalCount > 0 ? round($generalSum / $generalCount) : 0,
            ],

            'category_counts' => $categoryCounts,
            'level_counts' => $levelCounts,
            'score_ranges' => $scoreRanges,
            'weekly_counts' => $weeklyCounts,
            'general_usage' => $generalUsage,
            'specific_usage' => $specificUsage,

            'category_labels' => array_keys($categoryCounts),
            'category_values' => array_values($categoryCounts),

            'level_labels' => array_keys($levelCounts),
            'level_values' => array_values($levelCounts),

            'score_range_labels' => array_keys($scoreRanges),
            'score_range_values' => array_values($scoreRanges),

            'weekly_labels' => array_keys($weeklyCounts),
            'weekly_values' => array_values($weeklyCounts),

            'general_usage_labels' => array_slice(array_keys($generalUsage), 0, 8),
            'general_usage_values' => array_slice(array_values($generalUsage), 0, 8),

            'specific_usage_labels' => array_slice(array_keys($specificUsage), 0, 8),
            'specific_usage_values' => array_slice(array_values($specificUsage), 0, 8),
        ];
    }

    private function indexById(array $entities): array
    {
        $indexed = [];

        foreach ($entities as $entity) {
            if (method_exists($entity, 'getId')) {
                $indexed[$entity->getId()] = $entity;
            }
        }

        return $indexed;
    }
}