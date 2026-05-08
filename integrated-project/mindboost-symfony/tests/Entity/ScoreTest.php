<?php

namespace App\Tests\Entity;

use App\Entity\Score;
use PHPUnit\Framework\TestCase;

class ScoreTest extends TestCase
{
    public function testSetAndGetUserId(): void
    {
        $score = new Score();
        $score->setUserId(42);
        $this->assertSame(42, $score->getUserId());
    }

    public function testSetAndGetTotalScore(): void
    {
        $score = new Score();
        $score->setTotalScore(95);
        $this->assertSame(95, $score->getTotalScore());
    }

    public function testSetAndGetPercentage(): void
    {
        $score = new Score();
        $score->setPercentage(88);
        $this->assertSame(88, $score->getPercentage());
    }

    public function testSetAndGetGeneralTestId(): void
    {
        $score = new Score();
        $score->setGeneralTestId(5);
        $this->assertSame(5, $score->getGeneralTestId());
    }

    public function testIdIsNullBeforePersist(): void
    {
        $score = new Score();
        $this->assertNull($score->getId());
    }
}