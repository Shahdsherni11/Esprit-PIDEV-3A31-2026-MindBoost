<?php

use PHPUnit\Framework\TestCase;

class StudentAnswerEntityTest extends TestCase
{
    private $studentAnswer;

    protected function setUp(): void
    {
        $this->studentAnswer = new StudentAnswer(
            'scoreId',
            'userId',
            'testId',
            'questionId',
            'questionText',
            'selectedAnswerText',
            10,
            new \DateTime(),
            new \DateTime()
        );
    }

    public function testConstruction() {
        $this->assertInstanceOf(StudentAnswer::class, $this->studentAnswer);
    }

    public function testGetScoreId() {
        $this->assertEquals('scoreId', $this->studentAnswer->getScoreId());
    }

    public function testGetUserId() {
        $this->assertEquals('userId', $this->studentAnswer->getUserId());
    }

    public function testGetTestId() {
        $this->assertEquals('testId', $this->studentAnswer->getTestId());
    }

    public function testGetQuestionId() {
        $this->assertEquals('questionId', $this->studentAnswer->getQuestionId());
    }

    public function testGetQuestionText() {
        $this->assertEquals('questionText', $this->studentAnswer->getQuestionText());
    }

    public function testGetSelectedAnswerText() {
        $this->assertEquals('selectedAnswerText', $this->studentAnswer->getSelectedAnswerText());
    }

    public function testGetAnswerScore() {
        $this->assertEquals(10, $this->studentAnswer->getAnswerScore());
    }

    public function testTimestamps() {
        $this->assertInstanceOf(\DateTime::class, $this->studentAnswer->getCreatedAt());
        $this->assertInstanceOf(\DateTime::class, $this->studentAnswer->getUpdatedAt());
    }

    public function testCompleteRecord() {
        $this->assertEquals(
            [
                'scoreId' => 'scoreId',
                'userId' => 'userId',
                'testId' => 'testId',
                'questionId' => 'questionId',
                'questionText' => 'questionText',
                'selectedAnswerText' => 'selectedAnswerText',
                'answerScore' => 10,
                // Include timestamps as well \n                'createdAt' => $this->studentAnswer->getCreatedAt(),
                'updatedAt' => $this->studentAnswer->getUpdatedAt(),
            ],
            $this->studentAnswer->toArray()
        );
    }
}
