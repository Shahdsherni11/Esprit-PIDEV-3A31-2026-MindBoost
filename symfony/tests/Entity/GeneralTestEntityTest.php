<?php

use PHPUnit\Framework\TestCase;
use App\Entity\GeneralTest;

class GeneralTestEntityTest extends TestCase
{
    private $generalTest;

    protected function setUp(): void
    {
        $this->generalTest = new GeneralTest();
    }

    public function testConstruction()
    {
        $this->assertInstanceOf(GeneralTest::class, $this->generalTest);
    }

    public function testSetAndGetName()
    {
        $expected = 'Test Name';
        $this->generalTest->setName($expected);
        $this->assertEquals($expected, $this->generalTest->getName());
    }

    public function testSetAndGetDescription()
    {
        $expected = 'Test Description';
        $this->generalTest->setDescription($expected);
        $this->assertEquals($expected, $this->generalTest->getDescription());
    }

    public function testSetAndGetStatus()
    {
        $expected = 'active';
        $this->generalTest->setStatus($expected);
        $this->assertEquals($expected, $this->generalTest->getStatus());
    }

    public function testStatusValues()
    {
        $this->assertContains($this->generalTest->getStatus(), ['active', 'inactive', 'pending']);
    }

    public function testTimestamps()
    {
        $this->assertNotNull($this->generalTest->getCreatedAt());
        $this->assertNotNull($this->generalTest->getUpdatedAt());
    }

    public function testCascadeOnDelete()
    {
        // Assuming related entity is set up
        $relatedEntity = new RelatedEntity();
        $this->generalTest->addRelatedEntity($relatedEntity);
        $this->generalTest->removeRelatedEntity($relatedEntity);
        $this->assertCount(0, $this->generalTest->getRelatedEntities());
    }

    public function testSetAndGetTimestamp()
    {
        $expected = new \DateTime('2026-05-03 22:27:00');
        $this->generalTest->setUpdatedAt($expected);
        $this->assertEquals($expected, $this->generalTest->getUpdatedAt());
    }
}
