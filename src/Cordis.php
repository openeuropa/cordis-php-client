<?php

declare(strict_types=1);

namespace Cordis;

use Cordis\Article\ArticleService;
use Cordis\DataExtraction\ExtractionStreamService;
use Cordis\DataExtraction\ExtractionService;
use Cordis\Programme\ProgrammeService;
use Cordis\Project\ProjectService;
use Cordis\Result\ResultService;
use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\ClientInterface as HttpClientInterface;

/**
 * Cordis initializer.
 */
class Cordis implements CordisInterface
{
    /**
     * Creates cordis object.
     */
    public function __construct(array $config = [], protected ?HttpClientInterface $httpClient = null)
    {
        if (!$this->httpClient) {
            $this->httpClient = (new Client($config))->make();
        }
    }

    /**
     * {@inheritdoc}
     */
    public static function api(array $config = []): self
    {
        return new self($config);
    }

    /**
     * {@inheritdoc}
     */
    public function articles(): ArticleService
    {
        return new ArticleService($this->httpClient);
    }

    /**
     * {@inheritdoc}
     */
    public function dataExtraction(): ExtractionService
    {
        return new ExtractionService($this->httpClient);
    }

    /**
     * {@inheritdoc}
     */
    public function dataExtractionStream(): ExtractionStreamService
    {
        return new ExtractionStreamService(new HttpClient());
    }

    /**
     * {@inheritdoc}
     */
    public function programmes(): ProgrammeService
    {
        return new ProgrammeService($this->httpClient);
    }

    /**
     * {@inheritdoc}
     */
    public function projects(): ProjectService
    {
        return new ProjectService($this->httpClient);
    }

    /**
     * {@inheritdoc}
     */
    public function results(): ResultService
    {
        return new ResultService($this->httpClient);
    }
}
