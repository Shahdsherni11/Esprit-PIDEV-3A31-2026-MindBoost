<?php

namespace App\Service;

class FrontTestService
{
    public function determineCategory(int $score): string
    {
        if ($score <= 10) {
            return 'Stress';
        }

        if ($score <= 20) {
            return 'Anxiete';
        }

        if ($score <= 30) {
            return 'Depression';
        }

        return 'Trouble du Sommeil';
    }

    public function determineLevel(int $percentage): string
    {
        if ($percentage < 34) {
            return 'Faible';
        }

        if ($percentage < 67) {
            return 'Moyen';
        }

        return 'Élevé';
    }

    public function calculatePercentage(int $score, int $maxScore): int
    {
        if ($maxScore <= 0) {
            return 0;
        }

        return (int) round(($score / $maxScore) * 100);
    }
}