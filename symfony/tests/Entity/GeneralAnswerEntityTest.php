<?php

use PHPUnit\Framework\TestCase;
use App\Entity\GeneralAnswer;

class GeneralAnswerEntityTest extends TestCase
{
    public function testConstruction(): void
    {
        $answer = new GeneralAnswer('A', 'Sample answer', 1);
        $this->assertInstanceOf(GeneralAnswer::class, $answer);
    }

    public function testAnswerLabels(): void
    {
        $labels = ['A', 'B', 'C', 'D', 'E'];
        foreach ($labels as $label) {
            $answer = new GeneralAnswer($label, 'Sample answer', 1);
            $this->assertEquals($label, $answer->getLabel());
        }
    }

    public function testAnswerText(): void
    {
        $answer = new GeneralAnswer('A', 'Sample answer text', 1);
        $this->assertEquals('Sample answer text', $answer->getText());
    }

    public function testPositiveScore(): void
    {
        $answer = new GeneralAnswer('A', 'Text', 1);
        $answer->setScore(5);
        $this->assertEquals(5, $answer->getScore());
    }

    public function testNegativeScore(): void
    {
        $answer = new GeneralAnswer('A', 'Text', 1);
        $answer->setScore(-3);
        $this->assertEquals(-3, $answer->getScore());
    }

    public function testAnswerOrder(): void
    {
        $answer = new GeneralAnswer('A', 'Sample answer', 2);
        $this->assertEquals(2, $answer->getOrder());
    }

    public function testQuestionRelationship(): void
    {
        $question = new GeneralAnswer('Q1', 'First Question', 1);
        $answer = new GeneralAnswer('A', 'Sample answer', 1);
        $answer->setQuestion($question);
        $this->assertSame($question, $answer->getQuestion());
    }

    public function testTimestamps(): void
    {
        $answer = new GeneralAnswer('A', 'Sample answer', 1);
        $currentTimestamp = (new \DateTimeImmutable())->format('Y-m-d H:i:s');
        $this->assertEquals($currentTimestamp, $answer->getCreatedAt()->format('Y-m-d H:i:s'));
    }
}
