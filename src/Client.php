<?php

declare(strict_types=1);

namespace Cordis;

use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\ClientInterface as HttpClientInterface;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;

/**
 * Cordis client.
 */
class Client
{
    /**
     * Cordis rest api url.
     */
    const string API_BASE_PATH = 'https://cordis.europa.eu';

    /**
     * Http client.
     */
    private ?HttpClientInterface $http = null;

    /**
     * Client configuration.
     */
    private array $config;

    /**
     * Construct the Cordis Client.
     *
     * @param array $config
     *   {
     *      An array of required and optional configs.
     *
     *      @type string $base_path
     *         The base URL for the service.
     *      @type string $api_key
     *          Your Cordis API access key.
     *      @type string $timeout
     *          Total timeout of the request in seconds.
     *   }
     */
    public function __construct(array $config = [])
    {
        $this->config = array_merge([
            'base_path' => self::API_BASE_PATH,
            'api_key' => '',
            'timeout' => 0,
        ], $config);
    }

    /**
     * Make HTTP client based on the configs.
     *
     * @return \GuzzleHttp\ClientInterface
     *   The http client object.
     */
    public function make(): HttpClientInterface
    {
        return $this->getHttpClient();
    }

    /**
     * Set the Http Client object.
     *
     * @param \GuzzleHttp\ClientInterface $http
     *   The http client object.
     */
    public function setHttpClient(HttpClientInterface $http): void
    {
        $this->http = $http;
    }

    /**
     * Get http client object.
     *
     * @return \GuzzleHttp\ClientInterface
     *   The http client object.
     */
    public function getHttpClient(): HttpClientInterface
    {
        if ($this->http === null) {
            $this->http = $this->createDefaultHttpClient();
        }

        return $this->http;
    }

    /**
     * Get http client object.
     *
     * @return \GuzzleHttp\ClientInterface
     *   The http client object.
     */
    protected function createDefaultHttpClient(): HttpClientInterface
    {
        // Set http_errors and debug to false to prevent the key from being logged.
        $options = [
            'base_uri' => $this->config['base_path'],
            'timeout' => $this->config['timeout'],
            'http_errors' => false,
            'debug' => false,
        ];

        if ($key = $this->config['api_key']) {
            $stack = HandlerStack::create();
            $stack->push(Middleware::mapRequest(function ($request) use ($key) {
                $uri = $request->getUri();

                // Merge existing query parameters with API key.
                parse_str($uri->getQuery(), $params);
                $params['key'] = $key;

                $new_uri = $uri->withQuery(http_build_query($params));
                return $request->withUri($new_uri);
            }));

            $options['handler'] = $stack;
        }

        return new HttpClient($options);
    }

    /**
     * Sets the API key for requests that requires key.
     *
     * @param string $apiKey
     *   Your Cordis API access key.
     */
    public function setApiKey(string $apiKey): void
    {
        $this->config['api_key'] = $apiKey;
    }
}
