<?php

declare(strict_types=1);

namespace Cordis\Tests\Traits;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;

/**
 * Trait for cordis client.
 */
trait ClientTestTrait
{
    /**
     * Get cordis client for fixture data.
     */
    public function getTestingClient(string $fixture): ClientInterface
    {
        // Mock HTTP response.
        $handler = new MockHandler([
            new Response(
                200,
                [],
                file_get_contents(__DIR__ . '/../../fixtures/' . $fixture),
            )
        ]);

        // Create client with mocked handler.
        return new Client([
            'handler' => HandlerStack::create($handler),
            'base_uri' => 'https://cordis.europa.eu'
        ]);
    }
}
