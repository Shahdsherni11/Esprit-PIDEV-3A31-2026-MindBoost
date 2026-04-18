<?php

namespace App\Service;

use App\Entity\Score;
use App\Entity\SpecificScore;
use App\Entity\GeneralTest;
use App\Entity\SpecificTest;
use Doctrine\ORM\EntityManagerInterface;

class AdminInsightsService
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function getResultHistory(): array
    {
        $generalScores = $this->entityManager->getRepository(Score::class)->findBy([], ['id' => 'DESC']);
        $specificScores = $this->entityManager->getRepository(SpecificScore::class)->findBy([], ['passedAt' => 'DESC']);

        $generalTests = $this->indexById($this->entityManager->getRepository(GeneralTest::class)->findAll());
        $specificTests = $this->indexById($this->entityManager->getRepository(SpecificTest::class)->findAll());

        $history = [];

        foreach ($generalScores as $score) {
            $generalTest = $generalTests[$score->getGeneralTestId()] ?? null;

            $history[] = [
                'type' => 'general',
                'user_id' => $score->getUserId(),
                'test_title' => $generalTest?->getTitle() ?? 'Test général supprimé',
                'category' => '-',
                'level' => '-',
                'score' => $score->getTotalScore(),
                'percentage' => $score->getPercentage(),
                'passed_at' => null,
            ];
        }

        foreach ($specificScores as $score) {
            $specificTest = $specificTests[$score->getSpecificTestId()] ?? null;

            $history[] = [
                'type' => 'specific',
                'user_id' => $score->getUserId(),
                'test_title' => $specificTest?->getTitle() ?? 'Test spécifique supprimé',
                'category' => $score->getCategory(),
                'level' => $score->getLevel(),
                'score' => $score->getTotalScore(),
                'percentage' => $score->getPercentage(),
                'passed_at' => $score->getPassedAt(),
            ];
        }

        usort($history, function (array $a, array $b) {
            $aDate = $a['passed_at'] instanceof \DateTimeInterface ? $a['passed_at']->getTimestamp() : 0;
            $bDate = $b['passed_at'] instanceof \DateTimeInterface ? $b['passed_at']->getTimestamp() : 0;

            return $bDate <=> $aDate;
        });

        return $history;
    }

    public function getAnalytics(): array
    {
        $specificScores = $this->entityManager->getRepository(SpecificScore::class)->findAll();
        $scores = $this->entityManager->getRepository(Score::class)->findAll();

        $testsPerWeek = [];
        $categories = [];
        $levels = [];
        $testUsage = [];

        $specificTests = $this->indexById($this->entityManager->getRepository(SpecificTest::class)->findAll());
        $generalTests = $this->indexById($this->entityManager->getRepository(GeneralTest::class)->findAll());

        foreach ($specificScores as $score) {
            $week = 'Semaine ' . $score->getWeekNumber();
            $testsPerWeek[$week] = ($testsPerWeek[$week] ?? 0) + 1;

            $categories[$score->getCategory()] = ($categories[$score->getCategory()] ?? 0) + 1;
            $levels[$score->getLevel()] = ($levels[$score->getLevel()] ?? 0) + 1;

            $testTitle = $specificTests[$score->getSpecificTestId()]?->getTitle() ?? 'Test spécifique';
            $testUsage[$testTitle] = ($testUsage[$testTitle] ?? 0) + 1;
        }

        foreach ($scores as $score) {
            $testTitle = $generalTests[$score->getGeneralTestId()]?->getTitle() ?? 'Test général';
            $testUsage[$testTitle] = ($testUsage[$testTitle] ?? 0) + 1;
        }

        ksort($testsPerWeek);
        arsort($categories);
        arsort($levels);
        arsort($testUsage);

        return [
            'total_general_results' => count($scores),
            'total_specific_results' => count($specificScores),
            'tests_per_week' => $testsPerWeek,
            'categories' => $categories,
            'levels' => $levels,
            'test_usage' => $testUsage,
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