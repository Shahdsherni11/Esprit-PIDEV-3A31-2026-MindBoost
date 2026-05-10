<?php

namespace App\Tests\Service;

use App\Entity\Saves;
use App\Service\SavesManager;
use PHPUnit\Framework\TestCase;

class SavesManagerTest extends TestCase
{
    public function testSavesWithInvalidUserId(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $saves = (new Saves())
            ->setPostId(5)
            ->setUserId(0);

        $manager = new SavesManager();
        $manager->validate($saves);
    }
}
