<?php

declare(strict_types=1);

namespace Cordis\Programme;

use Cordis\Entity\ResourceEntityServiceBase;
use Cordis\Exception\CordisException;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Programme service used to get programmes.
 */
class ProgrammeService extends ResourceEntityServiceBase
{
    /**
     * The base path for programme resource endpoint.
     */
    protected const string BASE_PATH = '/programme';

    /**
     * Retrieve one programme.
     *
     * @param string $programmeId
     *   Programme id.
     * @param string $langCode
     *   Language code.
     *
     * @return \Cordis\Programme\Programme|null
     *   The programme object if found, null otherwise.
     *
     * @throws \Cordis\Exception\CordisException;
     */
    public function get(string $programmeId, string $langCode = 'en'): ?Programme
    {
        try {
            $uri = $this->getResourceApiEndpoint($programmeId, $langCode);
            $response = $this->client->get($uri, $this->initQuery());
            $status = $response->getStatusCode();
            return match ($status) {
                200 => $this->serializer->deserialize(
                    (string) $response->getBody(),
                    Programme::class
                ),
                404 => null,
                default => throw new CordisException(
                    "Unable to get programme $programmeId. Server responded with status code $status."
                )
            };
        } catch (GuzzleException $e) {
            throw new CordisException("(ERROR: {$e->getMessage()}) while fetching programme: $programmeId");
        }
    }
}
