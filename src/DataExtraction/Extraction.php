<?php

declare(strict_types=1);

namespace Cordis\DataExtraction;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;

/**
 * Class represents extraction.
 */
class Extraction {

  #[Type("boolean")]
  #[SerializedName("status")]
  private bool $status;

  #[Type(Task::class)]
  #[SerializedName("payload")]
  private ?Task $task = NULL;

  /**
   * Get status.
   *
   * @return bool
   *   The status of the extraction.
   */
  public function getStatus(): bool {
    return $this->status;
  }

  /**
   * Get extraction task.
   *
   * @return \Cordis\DataExtraction\Task|null
   *   The extraction task.
   */
  public function task(): ?Task {
    return $this->task;
  }

}
