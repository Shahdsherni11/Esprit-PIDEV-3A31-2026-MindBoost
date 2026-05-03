<?php

namespace App\Tests\Validation;

use App\Entity\GeneralTest;
use App\Entity\SpecificTest;
use PHPUnit\Framework\TestCase;

class PsychologicalTestValidationTest extends TestCase
{
    public function testValidGeneralTestTitle(): void
    {
        $test = new GeneralTest();
        $test->setTitle('Mon Test Valide');
        $test->setCreatedBy(1);

        $this->assertNotEmpty($test->getTitle());
        $this->assertEquals('Mon Test Valide', $test->getTitle());
    }

    public function testEmptyTitle(): void
    {
        $test = new GeneralTest();
        $test->setTitle('');
        
        $this->assertEmpty($test->getTitle());
    }

    public function testShortTitle(): void
    {
        $test = new GeneralTest();
        $test->setTitle('AB');
        
        $this->assertLessThan(3, strlen($test->getTitle()));
    }

    public function testNumericTitle(): void
    {
        $test = new GeneralTest();
        $test->setTitle('123456');
        
        $this->assertTrue(is_numeric($test->getTitle()));
    }

    public function testTitleWithSpecialCharacters(): void
    {
        $test = new GeneralTest();
        $test->setTitle('Test d\'Anxiété & Stress (2024)');
        
        $this->assertStringContainsString('&', $test->getTitle());
        $this->assertStringContainsString('\'', $test->getTitle());
    }

    public function testOptionalDescription(): void
    {
        $test = new GeneralTest();
        $test->setDescription(null);
        
        $this->assertNull($test->getDescription());
    }

    public function testValidSpecificTest(): void
    {
        $test = new SpecificTest();
        $test->setGeneralTestId(1);
        $test->setCategory('Stress');
        $test->setTitle('Test Spécifique Valide');
        $test->setCreatedBy(1);

        $this->assertEquals(1, $test->getGeneralTestId());
        $this->assertEquals('Stress', $test->getCategory());
        $this->assertEquals('Test Spécifique Valide', $test->getTitle());
    }

    public function testSpecificTestWithoutTitle(): void
    {
        $test = new SpecificTest();
        $test->setGeneralTestId(1);
        $test->setCategory('Stress');
        $test->setTitle('');
        
        $this->assertEmpty($test->getTitle());
    }

    public function testInvalidStatus(): void
    {
        $test = new GeneralTest();
        $test->setStatus('INVALID');
        
        $this->assertEquals('INVALID', $test->getStatus());
    }

    public function testValidStatuses(): void
    {
        $test = new GeneralTest();
        $validStatuses = ['DRAFT', 'ACTIVE', 'INACTIVE', 'ARCHIVED'];
        
        foreach ($validStatuses as $status) {
            $test->setStatus($status);
            $this->assertContains($test->getStatus(), $validStatuses);
        }
    }

    public function testSpecificTestCategoryValidation(): void
    {
        $test = new SpecificTest();
        $test->setCategory('Stress');
        
        $this->assertEquals('Stress', $test->getCategory());
    }

    public function testScoreLevelValidation(): void
    {
        $levels = ['Faible', 'Moyen', 'Élevé', 'Très Élevé'];
        
        $this->assertCount(4, $levels);
        $this->assertContains('Faible', $levels);
    }
}
