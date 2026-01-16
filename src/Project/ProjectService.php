<?php

declare(strict_types=1);

namespace Cordis\Project;

use Cordis\Entity\ResourceEntityServiceBase;
use Cordis\Exception\CordisException;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Project service used to get projects.
 */
class ProjectService extends ResourceEntityServiceBase
{
    /**
     * The base path for project resource endpoint.
     */
    protected const string BASE_PATH = '/project';

    /**
     * Retrieve one project.
     *
     * @param int|string $projectId
     *   Project id.
     * @param string $langCode
     *   Language code.
     *
     * @return \Cordis\Project\Project|null
     *   The project object if found, null otherwise.
     *
     * @throws \Cordis\Exception\CordisException;
     */
    public function get(int|string $projectId, string $langCode = 'en'): ?Project
    {
        try {
            $uri = $this->getResourceApiEndpoint($projectId, $langCode);
            $response = $this->client->get($uri, $this->initQuery());
            $status = $response->getStatusCode();
            return match ($status) {
                200 => $this->serializer->deserialize(
                    (string) $response->getBody(),
                    Project::class
                ),
                404 => null,
                default => throw new CordisException(
                    "Unable to get project $projectId. Server responded with status code $status."
                )
            };
        } catch (GuzzleException $e) {
            throw new CordisException("(ERROR: {$e->getMessage()}) while fetching project: $projectId");
        }
    }
}
