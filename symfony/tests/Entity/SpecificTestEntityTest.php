<?php

use PHPUnit\Framework\TestCase;

class SpecificTestEntityTest extends TestCase
{
    private $specificTest;

    protected function setUp(): void
    {
        $this->specificTest = new SpecificTest(); // Assuming SpecificTest is the class to be tested
    }

    public function testConstruction(): void
    {
        $this->assertNotNull($this->specificTest);
    }

    public function testGetId(): void
    {
        $this->specificTest->setId(1);
        $this->assertEquals(1, $this->specificTest->getId());
    }

    public function testGetCategory(): void
    {
        $this->specificTest->setCategory('Science');
        $this->assertEquals('Science', $this->specificTest->getCategory());
    }

    public function testGetTitle(): void
    {
        $this->specificTest->setTitle('Sample Title');
        $this->assertEquals('Sample Title', $this->specificTest->getTitle());
    }

    public function testGetDescription(): void
    {
        $this->specificTest->setDescription('Sample Description');
        $this->assertEquals('Sample Description', $this->specificTest->getDescription());
    }

    public function testValidStatuses(): void
    {
        $statuses = ['open', 'closed', 'in_progress'];
        foreach ($statuses as $status) {
            $this->specificTest->setStatus($status);
            $this->assertEquals($status, $this->specificTest->getStatus());
        }
    }

    public function testGetCreator(): void
    {
        $this->specificTest->setCreator('Shahdsherni11');
        $this->assertEquals('Shahdsherni11', $this->specificTest->getCreator());
    }

    public function testAddQuestion(): void
    {
        $this->specificTest->addQuestion('What is your name?');
        $this->assertCount(1, $this->specificTest->getQuestions());
    }

    public function testPreventDuplicatesWhenAddingQuestions(): void
    {
        $this->specificTest->addQuestion('What is your name?');
        $this->specificTest->addQuestion('What is your name?');
        $this->assertCount(1, $this->specificTest->getQuestions());
    }

    public function testRemoveQuestion(): void
    {
        $this->specificTest->addQuestion('What is your name?');
        $this->specificTest->removeQuestion('What is your name?');
        $this->assertCount(0, $this->specificTest->getQuestions());
    }
}
