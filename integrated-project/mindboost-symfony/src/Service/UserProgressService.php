<?php

namespace App\Service;

use App\Entity\Score;
use App\Entity\SpecificScore;
use App\Entity\GeneralTest;
use App\Entity\SpecificTest;
use Doctrine\ORM\EntityManagerInterface;

class UserProgressService
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function getUserHistory(int $userId): array
    {
        $generalScores = $this->entityManager->getRepository(Score::class)->findBy(
            ['userId' => $userId],
            ['id' => 'DESC']
        );

        $specificScores = $this->entityManager->getRepository(SpecificScore::class)->findBy(
            ['userId' => $userId],
            ['passedAt' => 'DESC']
        );

        $generalTests = $this->indexById($this->entityManager->getRepository(GeneralTest::class)->findAll());
        $specificTests = $this->indexById($this->entityManager->getRepository(SpecificTest::class)->findAll());

        $history = [];

        foreach ($generalScores as $score) {
            $history[] = [
                'type' => 'general',
                'title' => $generalTests[$score->getGeneralTestId()]?->getTitle() ?? 'Test général',
                'score' => $score->getTotalScore(),
                'percentage' => $score->getPercentage(),
                'category' => '-',
                'level' => '-',
                'date' => null,
            ];
        }

        foreach ($specificScores as $score) {
            $history[] = [
                'type' => 'specific',
                'title' => $specificTests[$score->getSpecificTestId()]?->getTitle() ?? 'Test spécifique',
                'score' => $score->getTotalScore(),
                'percentage' => $score->getPercentage(),
                'category' => $score->getCategory(),
                'level' => $score->getLevel(),
                'date' => $score->getPassedAt(),
            ];
        }

        usort($history, function (array $a, array $b) {
            $aDate = $a['date'] instanceof \DateTimeInterface ? $a['date']->getTimestamp() : 0;
            $bDate = $b['date'] instanceof \DateTimeInterface ? $b['date']->getTimestamp() : 0;

            return $bDate <=> $aDate;
        });

        return $history;
    }

    public function getEvolution(int $userId): array
    {
        $specificScores = $this->entityManager->getRepository(SpecificScore::class)->findBy(
            ['userId' => $userId],
            ['passedAt' => 'ASC']
        );

        $evolution = [];
        $previous = null;

        foreach ($specificScores as $score) {
            $trend = 'stable';
            $diff = 0;

            if ($previous !== null) {
                $diff = $score->getPercentage() - $previous->getPercentage();

                if ($diff > 0) {
                    $trend = 'amélioration';
                } elseif ($diff < 0) {
                    $trend = 'aggravation';
                }
            }

            $evolution[] = [
                'week' => $score->getWeekNumber(),
                'category' => $score->getCategory(),
                'level' => $score->getLevel(),
                'percentage' => $score->getPercentage(),
                'date' => $score->getPassedAt(),
                'difference' => $diff,
                'trend' => $trend,
            ];

            $previous = $score;
        }

        return $evolution;
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