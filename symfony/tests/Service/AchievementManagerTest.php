<?php

namespace App\Tests\Service;

use App\Entity\Achievement;
use App\Service\AchievementManager;
use PHPUnit\Framework\TestCase;

class AchievementManagerTest extends TestCase
{
    public function testValidAchievement(): void
    {
        $achievement = (new Achievement())
            ->setAchievementName('Helper')
            ->setAchievementScore(10);

        $manager = new AchievementManager();

        $this->assertTrue($manager->validate($achievement));
    }
}
