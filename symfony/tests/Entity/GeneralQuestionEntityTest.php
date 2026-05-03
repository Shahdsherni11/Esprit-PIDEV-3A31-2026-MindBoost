<?php

use PHPUnit\Framework\TestCase;
use App\Entity\GeneralQuestion;
use App\Entity\Answer; // Assuming Answer is in the same namespace

class GeneralQuestionEntityTest extends TestCase
{
    public function testConstruction()
    {
        $question = new GeneralQuestion("Sample Question", 1);
        $this->assertInstanceOf(GeneralQuestion::class, $question);
    }

    public function testQuestionText()
    {
        $question = new GeneralQuestion("Sample Question", 1);
        $this->assertEquals("Sample Question", $question->getQuestionText());
    }

    public function testQuestionOrder()
    {
        $question = new GeneralQuestion("Sample Question", 1);
        $this->assertEquals(1, $question->getQuestionOrder());
    }

    public function testRelationship()
    {
        $question = new GeneralQuestion("Sample Question", 1);
        $this->assertNull($question->getAnswers());
    }

    public function testAddingAnswers()
    {
        $question = new GeneralQuestion("Sample Question", 1);
        $answer = new Answer(); // Create a new answer entity
        $question->addAnswer($answer);
        $this->assertCount(1, $question->getAnswers());
    }

    public function testCascadeRelationships()
    {
        $question = new GeneralQuestion("Sample Question", 1);
        
        $answer1 = new Answer();
        $answer2 = new Answer();
        $question->addAnswer($answer1);
        $question->addAnswer($answer2);

        $this->assertCount(2, $question->getAnswers());
    }

    public function testTimestamps()
    {
        $question = new GeneralQuestion("Sample Question", 1);
        $this->assertNotNull($question->getCreatedAt());
        $this->assertNotNull($question->getUpdatedAt());
    }
}
