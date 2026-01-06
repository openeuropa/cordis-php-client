<?php

declare(strict_types=1);

namespace Cordis\Entity;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;

/**
 * Base class for cordis entity.
 */
abstract class EntityBase {

  #[Type("int")]
  #[SerializedName("rcn")]
  private int $rcn;

  /**
   * Get resource control number.
   *
   * Internal CORDIS identifier used for the identification of the domain
   * entities.
   *
   * @return int
   *   The resource control number.
   */
  public function getRcn(): int {
    return $this->rcn;
  }

}
