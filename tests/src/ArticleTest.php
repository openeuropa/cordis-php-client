<?php

declare(strict_types=1);

namespace Cordis\Tests;

use Cordis\Article\Article;
use Cordis\Article\ArticleService;
use Cordis\Cordis;
use Cordis\Entity\Category;
use Cordis\Project\Project;
use Cordis\Tests\Traits\ClientTestTrait;
use PHPUnit\Framework\TestCase;

/**
 * Tests article.
 */
class ArticleTest extends TestCase
{
    use ClientTestTrait;

    /**
     * Test article service.
     */
    public function testArticleService()
    {
        $cordis = Cordis::api()->articles();
        $article = $cordis->get('451044-building-a-stairway-to-ai');
        $this->assertInstanceOf(Article::class, $article);
        $this->assertEquals(451044, $article->getRcn());
        $this->assertEquals('451044-building-a-stairway-to-ai', $article->getId());
        $this->assertEquals('Building a stairway to AI', $article->getTitle());
    }

    /**
     * Test article entity.
     */
    public function testArticleEntity()
    {
        // Create article service using mocked client.
        $service = new ArticleService($this->getTestingClient('article-451044.xml'));

        // Get article by id.
        $article = $service->get('451044-building-a-stairway-to-ai');

        // Assert article data.
        $this->assertInstanceOf(Article::class, $article);
        $this->assertEquals('en', $article->getLanguage());
        $this->assertEquals(['de', 'en', 'es' , 'fr' , 'it' , 'pl'], $article->getAvailableLanguages());
        $this->assertEquals(451044, $article->getRcn());
        $this->assertEquals('451044-building-a-stairway-to-ai', $article->getId());
        $this->assertEquals('Building a stairway to AI', $article->getTitle());
        $this->assertEquals(new \DateTime('2024-05-10 10:28:52 UTC'), $article->getContentCreationDate());
        $this->assertEquals(new \DateTime('2024-05-10 10:28:50 UTC'), $article->getContentUpdateDate());
        $this->assertEquals(new \DateTime('2026-01-13 13:35:09 UTC'), $article->getLastUpdateDate());

        // Asset associated projects.
        $expected_projects = [
            [
                'rcn' => 232755,
                'id' => 101017142,
                'acronym' => 'StairwAI',
                'title' => 'Stairway to AI: Ease the Engagement of Low-Tech users to the AI-on-Demand platform through AI',
                'type' => 'relatedProject',
                'source' => 'editorial',
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
            $article->getRelations()->getAssociations()->getProjects()
        );
        $this->assertSame($expected_projects, $actual_projects);

        // Assert categories.
        $expected_categories = [
            [
                'code' => 'ict',
                'title' => 'Digital Economy',
                'description' => null,
                'displayCode' => '/Digital Economy',
                'classification' => 'applicationDomain',
                'type' => 'isApplicableIn',
            ],
            [
                'code' => 'brief',
                'title' => 'Result in Brief',
                'description' => 'Article: Classic and enhanced',
                'displayCode' => '/Result in Brief',
                'classification' => 'collection',
                'type' => 'belongsTo',
            ],
            [
                'code' => 'editorial',
                'title' => 'CORDIS Editorial',
                'description' => 'Written by CORDIS',
                'displayCode' => '/CORDIS Editorial',
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
            $article->getRelations()->getCategories()
        );
        $this->assertSame($expected_categories, $actual_categories);
    }
}
