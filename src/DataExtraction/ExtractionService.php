<?php

declare(strict_types=1);

namespace Cordis\DataExtraction;

use Cordis\Exception\CordisException;
use Cordis\ServiceBase;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

/**
 * Data extraction service used to create, get, cancel, and delete extraction.
 */
class ExtractionService extends ServiceBase
{
    /**
     * The base bath for data extraction endpoint.
     */
    protected const string BASE_PATH = '/api/dataextractions/';

    /**
     * Create data extraction.
     *
     * @param string $query
     *   Query in cordis format.
     *
     * @return \Cordis\DataExtraction\Extraction|null
     *   The created extraction object if found, null otherwise.
     *
     * @throws \Cordis\Exception\CordisException;
     */
    public function create(string $query): ?Extraction
    {
        try {
            $response = $this->client->get(static::BASE_PATH . 'getExtraction', [
                'query' => ['query' => $query, 'outputFormat' => 'xml,json'],
            ]);
            return $this->handleResponse($response, "Unable to create extraction using query ($query)");
        } catch (GuzzleException $e) {
            throw new CordisException("(ERROR: {$e->getMessage()}) while creating data extraction using query: $query");
        }
    }

    /**
     * Get data extraction.
     *
     * @param int $taskId
     *   The extraction task id.
     *
     * @return \Cordis\DataExtraction\Extraction|null
     *   The created extraction object if found, null otherwise.
     *
     * @throws \Cordis\Exception\CordisException;
     */
    public function get(int $taskId): ?Extraction
    {
        try {
            $response = $this->client->get(static::BASE_PATH . 'getExtractionStatus', [
                'query' => ['taskId' => $taskId],
            ]);
            return $this->handleResponse($response, "Unable to get task $taskId");
        } catch (GuzzleException $e) {
            throw new CordisException("(ERROR: {$e->getMessage()}) while fetching data extraction for task: $taskId");
        }
    }

    /**
     * Cancel data extraction task.
     *
     * @param int $taskId
     *   The extraction task id.
     *
     * @return \Cordis\DataExtraction\Extraction|null
     *   The cancel extraction object if found, null otherwise.
     *
     * @throws \Cordis\Exception\CordisException;
     */
    public function cancel(int $taskId): ?Extraction
    {
        try {
            $response = $this->client->get(static::BASE_PATH . 'cancelExtraction', [
                'query' => ['taskId' => $taskId],
            ]);
            return $this->handleResponse($response, "Unable to cancel task $taskId");
        } catch (GuzzleException $e) {
            throw new CordisException("(ERROR: {$e->getMessage()}) while canceling data extraction for task: $taskId");
        }
    }

    /**
     * Delete data extraction task.
     *
     * @param int $taskId
     *   The extraction task it.
     *
     * @return \Cordis\DataExtraction\Extraction|null
     *   The deleted extraction object if found, null otherwise.
     *
     * @throws \Cordis\Exception\CordisException;
     */
    public function delete(int $taskId): ?Extraction
    {
        try {
            $response = $this->client->get(static::BASE_PATH . 'deleteExtraction', [
                'query' => ['taskId' => $taskId],
            ]);
            return $this->handleResponse($response, "Unable to delete task $taskId");
        } catch (GuzzleException $e) {
            throw new CordisException("(ERROR: {$e->getMessage()}) while deleting data extraction for task: $taskId");
        }
    }

    /**
     * Handle response from data extraction api.
     *
     * @param \Psr\Http\Message\ResponseInterface $response
     *   The response.
     * @param string $message
     *   The exception message.
     *
     * @return \Cordis\DataExtraction\Extraction|null
     *   The extraction object if found, null otherwise.
     *
     * @throws \Cordis\Exception\CordisException;
     */
    private function handleResponse(ResponseInterface $response, string $message): ?Extraction
    {
        $status = $response->getStatusCode();
        return match ($status) {
            200 => $this->serializer->deserialize(
                (string) $response->getBody(),
                Extraction::class,
                'json'
            ),
            404 => null,
            default => throw new CordisException(
                "$message. Server responded with status code $status."
            )
        };
    }
}
