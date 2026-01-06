<?php

declare(strict_types=1);

namespace Cordis\DataExtraction;

use Cordis\Exception\CordisException;
use Cordis\ServiceBase;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\StreamInterface;

/**
 * Data extraction stream service used to stream data extraction.
 */
class ExtractionStreamService extends ServiceBase {

  /**
   * Get data extraction zip file stream.
   *
   * @param string $extraction_file_url
   *   The extraction file url.
   *
   * @return \Psr\Http\Message\StreamInterface|null
   *   The extraction zip file stream if found, null otherwise.
   *
   * @throws \Cordis\Exception\CordisException;
   */
  public function getZipStream(string $extraction_file_url): ?StreamInterface {
    try {
      $response = $this->client->get($extraction_file_url);
      $status = $response->getStatusCode();
      return match ($status) {
        200 => $response->getBody(),
        404 => NULL,
        default => throw new CordisException(
          "Unable to stream data extraction from url $extraction_file_url. Server responded with status code $status."
        )
      };
    }
    catch (GuzzleException $e) {
      throw new CordisException("(ERROR: {$e->getMessage()}) while retrieving data extraction form url: $extraction_file_url");
    }
  }

}
