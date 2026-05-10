<?php

namespace App\Service;

use App\Entity\Achievement;

class AchievementManager
{
    public function validate(Achievement $achievement): bool
    {
        $name = trim($achievement->getAchievementName());

        if ($name === '') {
            throw new \InvalidArgumentException('Achievement name is required.');
        }

        if (mb_strlen($name) < 2) {
            throw new \InvalidArgumentException('Achievement name must be at least 2 characters.');
        }

        if ($achievement->getAchievementScore() < 0) {
            throw new \InvalidArgumentException('Achievement score must be zero or positive.');
        }

        return true;
    }
}
