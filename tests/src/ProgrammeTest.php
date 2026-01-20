<?php

declare(strict_types=1);

namespace Cordis\Tests;

use Cordis\Cordis;
use Cordis\Entity\Category;
use Cordis\Programme\Programme;
use Cordis\Programme\ProgrammeService;
use Cordis\Tests\Traits\ClientTestTrait;
use PHPUnit\Framework\TestCase;

/**
 * Tests programme.
 */
class ProgrammeTest extends TestCase
{
    use ClientTestTrait;

    /**
     * Test programme service.
     */
    public function testProgrammeService()
    {
        $cordis = Cordis::api()->programmes();
        $programme = $cordis->get('HORIZON.1.1');
        $this->assertInstanceOf(Programme::class, $programme);
        $this->assertEquals(705727, $programme->getRcn());
        $this->assertEquals('HORIZON.1.1', $programme->getId());
    }

    /**
     * Test programme entity.
     */
    public function testProgrammeEntity()
    {
        // Create article service using mocked client.
        $service = new ProgrammeService($this->getTestingClient('programme-705727.xml'));

        // Get article by id.
        $programme = $service->get('HORIZON.1.1');

        // Assert programme data.
        $this->assertInstanceOf(Programme::class, $programme);
        $this->assertEquals('en', $programme->getLanguage());
        $this->assertEquals(['en'], $programme->getAvailableLanguages());
        $this->assertEquals(705727, $programme->getRcn());
        $this->assertEquals('HORIZON.1.1', $programme->getId());
        $this->assertEquals(43108406, $programme->getCordaId());
        $this->assertEquals('HORIZON.1.1', $programme->getCode());
        $this->assertEquals('HORIZON', $programme->getFrameworkProgramme());
        $this->assertEquals('HORIZON.1.1', $programme->getPga());
        $this->assertEquals('European Research Council (ERC)', $programme->getTitle());
        $this->assertEquals(new \DateTime('2021-07-19 09:48:43 UTC'), $programme->getContentCreationDate());
        $this->assertEquals(new \DateTime('2021-07-19 09:48:43 UTC'), $programme->getContentUpdateDate());
        $this->assertEquals(new \DateTime('2025-11-10 18:14:02 UTC'), $programme->getLastUpdateDate());

        // Assert categories.
        $expected_categories = [
            [
                'code' => 'legalbasis',
                'title' => 'Legal Basis',
                'displayCode' => '/Legal Basis',
                'classification' => 'collection',
                'type' => 'belongsTo',
            ],
            [
                'code' => 'corda',
                'title' => 'CORDA',
                'displayCode' => '/CORDA',
                'classification' => 'source',
                'type' => 'isProvidedBy',
            ],
        ];
        $actual_categories = array_map(
            fn(Category $category) => [
                'code' => $category->getCode(),
                'title' => $category->getTitle(),
                'displayCode' => $category->getDisplayCode(),
                'classification' => $category->getClassification(),
                'type' => $category->getType(),
            ],
            $programme->getRelations()->getCategories()
        );
        $this->assertSame($expected_categories, $actual_categories);
    }
}
