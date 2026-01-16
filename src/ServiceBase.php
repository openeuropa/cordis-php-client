<?php

declare(strict_types=1);

namespace Cordis;

use Cordis\Serializer\Serializer;
use GuzzleHttp\ClientInterface as GuzzleClientInterface;

/**
 * Base class for cordis services.
 */
abstract class ServiceBase
{
    /**
     * Service base constructor.
     */
    public function __construct(
        protected GuzzleClientInterface $client,
        protected $serializer = new Serializer(),
    ) {
    }
}
