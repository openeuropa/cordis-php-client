<?php

declare(strict_types=1);

namespace Cordis\Entity;

use Cordis\ServiceBase;

/**
 * Base class for cordis resource entity service.
 */
abstract class ResourceEntityServiceBase extends ServiceBase {

  /**
   * Default format.
   */
  protected const string DEFAULT_FORMAT = 'xml';

  /**
   * Creates the endpoint for a resource from Cordis API endpoint.
   *
   * @param int|string $resourceId
   *   The resource id for which to return the endpoint.
   * @param string $langCode
   *   The resource language code.
   *
   * @return string
   *   The endpoint for the resource from Cordis API.
   */
  protected function getResourceApiEndpoint(int|string $resourceId, string $langCode = 'en'): string {
    return static::BASE_PATH . '/id/' . $resourceId . '/' . $langCode;
  }

  /**
   * Initialize query for cordis endpoint.
   *
   * @return array
   *   The query.
   */
  protected function initQuery(): array {
    return [
      'query' => [
        'format' => static::DEFAULT_FORMAT,
      ],
    ];
  }

}
