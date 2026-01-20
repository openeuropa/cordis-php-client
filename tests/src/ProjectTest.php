<?php

declare(strict_types=1);

namespace Cordis\Tests;

use Cordis\Article\Article;
use Cordis\Cordis;
use Cordis\Entity\Call;
use Cordis\Entity\Category;
use Cordis\Entity\Organization;
use Cordis\Entity\Region;
use Cordis\Programme\Programme;
use Cordis\Project\Project;
use Cordis\Project\ProjectService;
use Cordis\Project\ProjectStatus;
use Cordis\Tests\Traits\ClientTestTrait;
use PHPUnit\Framework\TestCase;

/**
 * Tests project.
 */
class ProjectTest extends TestCase
{
    use ClientTestTrait;

    /**
     * Test project service.
     */
    public function testProjectService()
    {
        $cordis = Cordis::api()->projects();
        $project = $cordis->get(101190685);
        $this->assertInstanceOf(Project::class, $project);
        $this->assertEquals(272624, $project->getRcn());
        $this->assertEquals(101190685, $project->getId());
        $this->assertEquals('3SI-CONTROL', $project->getAcronym());
    }

    /**
     * Test project entity.
     */
    public function testProjectEntity()
    {
        // Create project service using mocked client.
        $service = new ProjectService($this->getTestingClient('project-101190685.xml'));

        // Get project by id.
        $project = $service->get(101190685);

        // Assert project data.
        $this->assertInstanceOf(Project::class, $project);
        $this->assertEquals('en', $project->getLanguage());
        $this->assertEquals(['en'], $project->getAvailableLanguages());
        $this->assertEquals(272624, $project->getRcn());
        $this->assertEquals(101190685, $project->getId());
        $this->assertEquals('3SI-CONTROL', $project->getAcronym());
        $this->assertEquals('Integrated Anthelmintic-Based control of Taenia solium cysticercosis/taeniasis, Soil-transmitted Helminthiasis and Schistosomiasis: safety, effectiveness and implementation strategies', $project->getTitle());
        $this->assertEquals(5500000, $project->getTotalCost());
        $this->assertEquals(5500000, $project->getEcMaxContribution());
        $this->assertEquals(new \DateTime('2025-06-01 UTC'), $project->getStartDate());
        $this->assertEquals(new \DateTime('2029-05-31 UTC'), $project->getEndDate());
        $this->assertEquals(new \DateTime('2025-05-16 UTC'), $project->getEcSignatureDate());
        $this->assertEquals(48, $project->getDuration());
        $this->assertEquals(ProjectStatus::Signed, $project->getStatus());
        $this->assertEquals(new \DateTime('2025-05-21 17:08:40 UTC'), $project->getSourceUpdateDate());
        $this->assertEquals(new \DateTime('2025-05-26 17:38:28 UTC'), $project->getContentCreationDate());
        $this->assertEquals(new \DateTime('2025-05-21 17:08:40 UTC'), $project->getContentUpdateDate());
        $this->assertEquals(new \DateTime('2025-09-18 15:09:13 UTC'), $project->getLastUpdateDate());

        // Asset associated articles.
        $expected_articles = [
            [
                'rcn' => 459108,
                'id' => '459108-new-strategy-to-tackle-neglected-tropical-diseases',
                'title' => 'New strategy to tackle neglected tropical diseases',
            ],
        ];
        $actual_articles = array_map(
            fn(Article $article) => [
                'rcn' => $article->getRcn(),
                'id' => $article->getId(),
                'title' => $article->getTitle(),
            ],
            $project->getRelations()->getAssociations()->getArticles()
        );
        $this->assertSame($expected_articles, $actual_articles);

        // Asset associated calls.
        $expected_calls = [
            [
                'rcn' => 56830,
                'title' => 'HORIZON-JU-GH-EDCTP3-2024-01-two-stage',
                'identifier' => 'HORIZON-JU-GH-EDCTP3-2024-01-two-stage',
            ],
            [
                'rcn' => 56830,
                'title' => 'HORIZON-JU-GH-EDCTP3-2024-01-two-stage',
                'identifier' => 'HORIZON-JU-GH-EDCTP3-2024-01-two-stage',
            ],
        ];
        $actual_calls = array_map(
            fn(Call $call) => [
                'rcn' => $call->getRcn(),
                'title' => $call->getTitle(),
                'identifier' => $call->getIdentifier(),
            ],
            $project->getRelations()->getAssociations()->getCalls()
        );
        $this->assertSame($expected_calls, $actual_calls);

        // Asset associated organisations.
        $expected_organisations = [
            [
                'rcn' => 1906194,
                'id' => 999986096,
                'legalName' => 'UNIVERSITEIT GENT',
                'vatNumber' => 'BE0248015142',
                'city' => 'GENT',
                'country' => 'BE',
                'geolocation' => '51.048245,3.7272009',
                'type' => 'coordinator',
                'source' => 'corda',
                'ecContribution' => 1288775.0,
                'netEcContribution' => 1288775.0,
                'totalCost' => 1288775.0,
                'terminated' => false,
                'regions' => [
                    [
                        'rcn' => 188227780,
                        'name' => 'Arr. Gent',
                        'nutsCode' => 'BE234',
                        'euCode' => null,
                        'isoCode' => null,
                        'type' => 'relatedNutsCode'
                    ],
                    [
                        'rcn' => 188385832,
                        'name' => 'Belgium',
                        'nutsCode' => 'BE',
                        'euCode' => 'BE',
                        'isoCode' => 'BE',
                        'type' => 'relatedRegion'
                    ],
                ],
            ],
            [
                'rcn' => 1970787,
                'id' => 954910390,
                'legalName' => 'FUNDACAO MANHICA',
                'vatNumber' => null,
                'city' => 'VILA DA MANHICA MAPUTO',
                'country' => 'MZ',
                'geolocation' => '-25.9458524,32.569211',
                'type' => 'participant',
                'source' => 'corda',
                'ecContribution' => 656968.75,
                'netEcContribution' => 656968.75,
                'totalCost' => 656968.75,
                'terminated' => false,
                'regions' => [
                    [
                        'rcn' => 378440232,
                        'name' => 'Mozambique',
                        'nutsCode' => 'MZ',
                        'euCode' => 'MZ',
                        'isoCode' => 'MZ',
                        'type' => 'relatedNutsCode'
                    ],
                    [
                        'rcn' => 378440232,
                        'name' => 'Mozambique',
                        'nutsCode' => 'MZ',
                        'euCode' => 'MZ',
                        'isoCode' => 'MZ',
                        'type' => 'relatedRegion'
                    ],
                ],
            ],
            [
                'rcn' => 1911154,
                'id' => 998391707,
                'legalName' => 'Sokoine University of Agriculture',
                'vatNumber' => null,
                'city' => 'Morogoro',
                'country' => 'TZ',
                'geolocation' => '-6.8523139,37.6575700828527',
                'type' => 'participant',
                'source' => 'corda',
                'ecContribution' => 697595.0,
                'netEcContribution' => 697595.0,
                'totalCost' => 697595.0,
                'terminated' => false,
                'regions' => [
                    [
                        'rcn' => 495880744,
                        'name' => 'Tanzania',
                        'nutsCode' => 'TZ',
                        'euCode' => 'TZ',
                        'isoCode' => 'TZ',
                        'type' => 'relatedNutsCode'
                    ],
                    [
                        'rcn' => 495880744,
                        'name' => 'Tanzania',
                        'nutsCode' => 'TZ',
                        'euCode' => 'TZ',
                        'isoCode' => 'TZ',
                        'type' => 'relatedRegion'
                    ],
                ],
            ],
            [
                'rcn' => 1974990,
                'id' => 998783296,
                'legalName' => 'UNIVERSITY OF DAR ES SALAAM',
                'vatNumber' => null,
                'city' => 'DAR ES SALAAM',
                'country' => 'TZ',
                'geolocation' => '-6.8142736,39.2803756',
                'type' => 'participant',
                'source' => 'corda',
                'ecContribution' => 898350.0,
                'netEcContribution' => 898350.0,
                'totalCost' => 898350.0,
                'terminated' => false,
                'regions' => [
                    [
                        'rcn' => 495880744,
                        'name' => 'Tanzania',
                        'nutsCode' => 'TZ',
                        'euCode' => 'TZ',
                        'isoCode' => 'TZ',
                        'type' => 'relatedNutsCode'
                    ],
                    [
                        'rcn' => 495880744,
                        'name' => 'Tanzania',
                        'nutsCode' => 'TZ',
                        'euCode' => 'TZ',
                        'isoCode' => 'TZ',
                        'type' => 'relatedRegion'
                    ],
                ],
            ],
            [
                'rcn' => 2307547,
                'id' => 951414122,
                'legalName' => 'FUNDACION PRIVADA INSTITUTO DE SALUD GLOBAL BARCELONA',
                'vatNumber' => 'ESG65341695',
                'city' => 'Barcelona',
                'country' => 'ES',
                'geolocation' => '41.3825596,2.1771353',
                'type' => 'participant',
                'source' => 'corda',
                'ecContribution' => 1004831.25,
                'netEcContribution' => 949890.0,
                'totalCost' => 1004831.25,
                'terminated' => false,
                'regions' => [
                    [
                        'rcn' => 242241601,
                        'name' => 'Barcelona',
                        'nutsCode' => 'ES511',
                        'euCode' => null,
                        'isoCode' => null,
                        'type' => 'relatedNutsCode'
                    ],
                    [
                        'rcn' => 242387496,
                        'name' => 'Spain',
                        'nutsCode' => 'ES',
                        'euCode' => 'ES',
                        'isoCode' => 'ES',
                        'type' => 'relatedRegion'
                    ],
                ],
            ],
            [
                'rcn' => 1956836,
                'id' => 905096816,
                'legalName' => 'HOSPITAL CLINIC DE BARCELONA',
                'vatNumber' => 'ESQ0802070C',
                'city' => 'Barcelona',
                'country' => 'ES',
                'geolocation' => '41.3881775,2.1902547625287534',
                'type' => 'thirdParty',
                'source' => 'corda',
                'ecContribution' => 0.0,
                'netEcContribution' => 54941.25,
                'totalCost' => 0.0,
                'terminated' => false,
                'regions' => [
                    [
                        'rcn' => 242241601,
                        'name' => 'Barcelona',
                        'nutsCode' => 'ES511',
                        'euCode' => null,
                        'isoCode' => null,
                        'type' => 'relatedNutsCode'
                    ],
                    [
                        'rcn' => 242387496,
                        'name' => 'Spain',
                        'nutsCode' => 'ES',
                        'euCode' => 'ES',
                        'isoCode' => 'ES',
                        'type' => 'relatedRegion'
                    ],
                ],
            ],
            [
                'rcn' => 2106953,
                'id' => 999887932,
                'legalName' => 'UNIVERSITY OF ZAMBIA',
                'vatNumber' => null,
                'city' => 'Lusaka',
                'country' => 'ZM',
                'geolocation' => '-15.4166966,28.2813812',
                'type' => 'participant',
                'source' => 'corda',
                'ecContribution' => 953480.0,
                'netEcContribution' => 953480.0,
                'totalCost' => 953480.0,
                'terminated' => false,
                'regions' => [
                    [
                        'rcn' => 593136168,
                        'name' => 'Zambia',
                        'nutsCode' => 'ZM',
                        'euCode' => 'ZM',
                        'isoCode' => 'ZM',
                        'type' => 'relatedNutsCode'
                    ],
                    [
                        'rcn' => 593136168,
                        'name' => 'Zambia',
                        'nutsCode' => 'ZM',
                        'euCode' => 'ZM',
                        'isoCode' => 'ZM',
                        'type' => 'relatedRegion'
                    ],
                ],
            ],
        ];
        $actual_organisations = array_map(
            fn(Organization $organisation) => [
                'rcn' => $organisation->getRcn(),
                'id' => $organisation->getId(),
                'legalName' => $organisation->getLegalName(),
                'vatNumber' => $organisation->getVatNumber(),
                'city' => $organisation->getAddress()->getCity(),
                'country' => $organisation->getAddress()->getCountry(),
                'geolocation' => $organisation->getAddress()->getGeolocation(),
                'type' => $organisation->getType(),
                'source' => $organisation->getSource(),
                'ecContribution' => $organisation->getEcContribution(),
                'netEcContribution' => $organisation->getNetEcContribution(),
                'totalCost' => $organisation->getTotalCost(),
                'terminated' => $organisation->isTerminated(),
                'regions' => array_map(
                    fn(Region $region) => [
                        'rcn' => $region->getRcn(),
                        'name' => $region->getName(),
                        'nutsCode' => $region->getNutsCode(),
                        'euCode' => $region->getEuCode(),
                        'isoCode' => $region->getIsoCode(),
                        'type' => $region->getType(),
                    ],
                    $organisation->getRelations()->getRegions()
                )
            ],
            $project->getRelations()->getAssociations()->getOrganizations()
        );
        $this->assertSame($expected_organisations, $actual_organisations);

        // Asset associated programmes.
        $expected_programmes = [
            [
                'rcn' => 705741,
                'id' => 'HORIZON.2.1',
                'code' => 'HORIZON.2.1',
                'frameworkProgramme' => 'HORIZON',
                'pga' => 'HORIZON.2.1',
                'title' => 'Health',
                'type' => 'relatedLegalBasis',
                'source' => 'corda',
            ],
            [
                'rcn' => 708955,
                'id' => 'HORIZON_HORIZON-JU-GH-EDCTP3-2024-01-03-two-stage',
                'code' => 'HORIZON-JU-GH-EDCTP3-2024-01-03-two-stage',
                'frameworkProgramme' => 'HORIZON',
                'pga' => null,
                'title' => 'Accelerating development and integration of therapeutics against Neglected Tropical Diseases (NTDs) in sub-Saharan Africa',
                'type' => 'relatedTopic',
                'source' => 'corda',
            ],
        ];
        $actual_programmes = array_map(
            fn(Programme $programme) => [
                'rcn' => $programme->getRcn(),
                'id' => $programme->getId(),
                'code' => $programme->getCode(),
                'frameworkProgramme' => $programme->getFrameworkProgramme(),
                'pga' => $programme->getPga(),
                'title' => $programme->getTitle(),
                'type' => $programme->getType(),
                'source' => $programme->getSource(),
            ],
            $project->getRelations()->getAssociations()->getProgrammes()
        );
        $this->assertSame($expected_programmes, $actual_programmes);

        // Assert categories.
        $expected_categories = [
            [
                'code' => 'project',
                'title' => 'Project',
                'description' => 'Project factsheets',
                'displayCode' => '/Project',
                'classification' => 'collection',
                'type' => 'belongsTo',
            ],
            [
                'code' => 'digitalAgenda',
                'title' => 'Digital agenda',
                'description' => 'This tracker monitors Horizon Europe’s financial contribution to the development of digital technologies and the digitisation of the economy and society (known as ‘Digital transition’).',
                'displayCode' => '/Digital agenda',
                'classification' => 'policyPriorities',
                'type' => 'marker',
            ],
            [
                'code' => 'cleanAir',
                'title' => 'Clean air',
                'description' => 'This tracker monitors the Horizon Europe’s financial contribution to the clean air policy (National Emission Ceiling Directive) aiming to improve ambient air quality and tackle air pollution, to protect the environment and human health.',
                'displayCode' => '/Clean air',
                'classification' => 'policyPriorities',
                'type' => 'marker',
            ],
            [
                'code' => 'ai',
                'title' => 'Artificial intelligence',
                'description' => 'This tracker monitors Horizon Europe’s financial contribution to the development and deployment of AI-based technologies and solutions. Projects that develop AI-tools as part of their research method are included',
                'displayCode' => '/Artificial intelligence',
                'classification' => 'policyPriorities',
                'type' => 'marker',
            ],
            [
                'code' => 'climate',
                'title' => 'Climate action',
                'description' => 'This tracker monitors the Horizon Europe’s financial contribution to both mitigating climate change (e.g., contributions to the reduction of greenhouse gas emissions) and adapting to climate change by building resilience (e.g., regarding floods, droughts, spatial planning and better governance, adaptation to changing climate in value chains, etc.).',
                'displayCode' => '/Climate action',
                'classification' => 'policyPriorities',
                'type' => 'marker',
            ],
            [
                'code' => 'biodiversity',
                'title' => 'Biodiversity',
                'description' => 'This tracker monitors the Horizon Europe’s financial contribution to Europe’s biodiversity’s path to recovery including species protection, ecosystem conservation, and habitat rehabilitation, all essential for resilience in climate adaptation and addressing ecosystem services but also environmental crime and the health-environment connection.',
                'displayCode' => '/Biodiversity',
                'classification' => 'policyPriorities',
                'type' => 'marker',
            ],
            [
                'code' => 'HORIZON-JU-RIA',
                'title' => 'HORIZON JU Research and Innovation Actions',
                'description' => 'HORIZON JU Research and Innovation Actions',
                'displayCode' => '/HORIZON JU Research and Innovation Actions',
                'classification' => 'projectFundingSchemeCategory',
                'type' => 'relatedProjectFundingSchemeCategory',
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
            $project->getRelations()->getCategories()
        );
        $this->assertSame($expected_categories, $actual_categories);
    }
}
