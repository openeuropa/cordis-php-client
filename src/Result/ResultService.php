<?php

declare(strict_types=1);

namespace Cordis\Result;

use Cordis\Entity\ResourceEntityServiceBase;
use Cordis\Exception\CordisException;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Result service used to get results.
 */
class ResultService extends ResourceEntityServiceBase {

  /**
   * The base path for result resource endpoint.
   */
  protected const string BASE_PATH = '/result';

  /**
   * Retrieve one result.
   *
   * @param string $resultId
   *   Result id.
   * @param string $langCode
   *   Language code.
   *
   * @return \Cordis\Result\Result|null
   *   The result object if found, null otherwise.
   *
   * @throws \Cordis\Exception\CordisException;
   */
  public function get(string $resultId, string $langCode = 'en'): ?Result {
    try {
      $uri = $this->getResourceApiEndpoint($resultId, $langCode);
      $response = $this->client->get($uri, $this->initQuery());
      $status = $response->getStatusCode();
      return match ($status) {
        200 => $this->serializer->deserialize(
          (string) $response->getBody(),
          Result::class
        ),
        404 => NULL,
        default => throw new CordisException(
          "Unable to get result $resultId. Server responded with status code $status."
        )
      };
    }
    catch (GuzzleException $e) {
      throw new CordisException("(ERROR: {$e->getMessage()}) while fetching result: $resultId");
    }
  }

}
