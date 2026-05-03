<?php

namespace App\Tests\Entity;

use App\Entity\SpecificScore;
use PHPUnit\Framework\TestCase;

class SpecificScoreEntityTest extends TestCase
{
    private SpecificScore $score;

    protected function setUp(): void
    {
        $this->score = new SpecificScore();
    }

    public function testSpecificScoreConstruction(): void
    {
        $this->assertNotNull($this->score);
        $this->assertEquals(0, $this->score->getTotalScore());
        $this->assertEquals(0, $this->score->getMaxScore());
        $this->assertEquals(0, $this->score->getPercentage());
        $this->assertEquals('Faible', $this->score->getLevel());
        $this->assertInstanceOf(\DateTimeInterface::class, $this->score->getPassedAt());
    }

    public function testSetAndGetUserId(): void
    {
        $userId = 123;
        $this->score->setUserId($userId);
        $this->assertEquals($userId, $this->score->getUserId());
    }

    public function testSetAndGetSpecificTestId(): void
    {
        $testId = 456;
        $this->score->setSpecificTestId($testId);
        $this->assertEquals($testId, $this->score->getSpecificTestId());
    }

    public function testSetAndGetTotalScore(): void
    {
        $this->score->setTotalScore(75);
        $this->assertEquals(75, $this->score->getTotalScore());
    }

    public function testSetAndGetMaxScore(): void
    {
        $this->score->setMaxScore(100);
        $this->assertEquals(100, $this->score->getMaxScore());
    }

    public function testSetAndGetPercentage(): void
    {
        $this->score->setPercentage(75);
        $this->assertEquals(75, $this->score->getPercentage());
    }

    public function testSetAndGetCategory(): void
    {
        $category = 'Stress Professionnel';
        $this->score->setCategory($category);
        $this->assertEquals($category, $this->score->getCategory());
    }

    public function testSetAndGetLevel(): void
    {
        $levels = ['Faible', 'Moyen', 'Élevé', 'Très Élevé'];
        foreach ($levels as $level) {
            $this->score->setLevel($level);
            $this->assertEquals($level, $this->score->getLevel());
        }
    }

    public function testSetAndGetWeekNumber(): void
    {
        $this->score->setWeekNumber(15);
        $this->assertEquals(15, $this->score->getWeekNumber());
    }

    public function testSetAndGetPassedAt(): void
    {
        $now = new \DateTime();
        $this->score->setPassedAt($now);
        $this->assertEquals($now, $this->score->getPassedAt());
    }
}
