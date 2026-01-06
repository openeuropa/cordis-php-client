<?php

declare(strict_types=1);

namespace Cordis;

use Cordis\Article\ArticleService;
use Cordis\DataExtraction\ExtractionService;
use Cordis\DataExtraction\ExtractionStreamService;
use Cordis\Programme\ProgrammeService;
use Cordis\Project\ProjectService;
use Cordis\Result\ResultService;

/**
 * Interface for cordis class.
 */
interface CordisInterface {

  /**
   * Initialize cordis and create the client.
   *
   * @return Cordis
   *   The cordis.
   */
  public static function api(array $config = []): self;

  /**
   * Get cordis article service.
   *
   * @return \Cordis\Article\ArticleService
   *   The article service.
   */
  public function articles(): ArticleService;

  /**
   * Get cordis data extraction service.
   *
   * @return \Cordis\DataExtraction\ExtractionService
   *   The data extraction service.
   */
  public function dataExtraction(): ExtractionService;

  /**
   * Get cordis data extraction stream service.
   *
   * @return \Cordis\DataExtraction\ExtractionStreamService
   *   The data extraction stream service.
   */
  public function dataExtractionStream(): ExtractionStreamService;

  /**
   * Get cordis programme service.
   *
   * @return \Cordis\Programme\ProgrammeService
   *   The programme service.
   */
  public function programmes(): ProgrammeService;

  /**
   * Get cordis project service.
   *
   * @return \Cordis\Project\ProjectService
   *   The project service.
   */
  public function projects(): ProjectService;

  /**
   * Get cordis result service.
   *
   * @return \Cordis\Result\ResultService
   *   The result service.
   */
  public function results(): ResultService;

}
