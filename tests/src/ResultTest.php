<?php

declare(strict_types=1);

namespace Cordis\Tests;

use Cordis\Cordis;
use Cordis\Entity\Category;
use Cordis\Project\Project;
use Cordis\Result\Result;
use Cordis\Result\ResultService;
use Cordis\Tests\Traits\ClientTestTrait;
use PHPUnit\Framework\TestCase;

/**
 * Tests result.
 */
class ResultTest extends TestCase
{
    use ClientTestTrait;

    /**
     * Test result service.
     */
    public function testResultService()
    {
        $cordis = Cordis::api()->results();
        $result = $cordis->get('101073094_30_DELIVHORIZON');
        $this->assertInstanceOf(Result::class, $result);
        $this->assertEquals(1336650, $result->getRcn());
        $this->assertEquals('101073094_30_DELIVHORIZON', $result->getId());
    }

    /**
     * Test result entity.
     */
    public function testResultEntity()
    {
        // Create result service using mocked client.
        $service = new ResultService($this->getTestingClient('result-1336650.xml'));

        // Get result by id.
        $result = $service->get('451044-building-a-stairway-to-ai');

        // Assert result data.
        $this->assertInstanceOf(Result::class, $result);
        $this->assertEquals('en', $result->getLanguage());
        $this->assertEquals(['en'], $result->getAvailableLanguages());
        $this->assertEquals(1336650, $result->getRcn());
        $this->assertEquals('101073094_30_DELIVHORIZON', $result->getId());
        $this->assertEquals('DC reports: Secondments and collaborations', $result->getTitle());
        $this->assertEquals('DC reports:  Secondments and collaborations (M15, M40)', $result->getDescription());
        $this->assertEquals(new \DateTime('2025-07-25 11:17:21 UTC'), $result->getContentCreationDate());
        $this->assertEquals(new \DateTime('2025-07-14 16:29:30 UTC'), $result->getContentUpdateDate());
        $this->assertEquals(new \DateTime('2026-01-19 11:58:33 UTC'), $result->getLastUpdateDate());

        // Asset associated projects.
        $expected_projects = [
            [
                'rcn' => 241967,
                'id' => 101073094,
                'acronym' => 'RBP-ReguNet',
                'title' => 'Deconstructing and Rewiring RNA-RBP regulatory networks',
                'type' => 'relatedProject',
                'source' => 'corda',
            ],
        ];
        $actual_projects = array_map(
            fn(Project $project) => [
                'rcn' => $project->getRcn(),
                'id' => $project->getId(),
                'acronym' => $project->getAcronym(),
                'title' => $project->getTitle(),
                'type' => $project->getType(),
                'source' => $project->getSource(),
            ],
            $result->getRelations()->getAssociations()->getProjects()
        );
        $this->assertSame($expected_projects, $actual_projects);

        // Assert categories.
        $expected_categories = [
            [
                'code' => 'deliverable',
                'title' => 'Project deliverable',
                'description' => 'Result: Project deliverables',
                'displayCode' => '/Project deliverable',
                'classification' => 'collection',
                'type' => 'belongsTo',
            ],
            [
                'code' => 'R',
                'title' => 'Documents, reports',
                'description' => null,
                'displayCode' => '/Documents, reports',
                'classification' => 'deliverableType',
                'type' => 'isDeliveredAs',
            ],
            [
                'code' => 'corda',
                'title' => 'CORDA',
                'description' => 'RTD research data warehouse',
                'displayCode' => '/CORDA',
                'classification' => 'source',
                'type' => 'isProvidedBy',
            ],
        ];
        $actual_categories = array_map(
            fn(Category $category) => [
                'code' => $category->getCode(),
                'title' => $category->getTitle(),
                'description' => $category->getDescription(),
                'displayCode' => $category->getDisplayCode(),
                'classification' => $category->getClassification(),
                'type' => $category->getType(),
            ],
            $result->getRelations()->getCategories()
        );
        $this->assertSame($expected_categories, $actual_categories);
    }
}
