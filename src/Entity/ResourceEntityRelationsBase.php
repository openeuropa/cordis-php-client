<?php

declare(strict_types=1);

namespace Cordis\Entity;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;

/**
 * Base class for resource entity relations.
 */
abstract class ResourceEntityRelationsBase extends RelationsBase {

  #[Type("Cordis\Entity\Associations")]
  #[SerializedName("associations")]
  private ?Associations $associations = NULL;

  /**
   * Get associations in relations.
   *
   * @return \Cordis\Entity\Associations|null
   *   The associations.
   */
  public function getAssociations(): ?Associations {
    return $this->associations;
  }

}
