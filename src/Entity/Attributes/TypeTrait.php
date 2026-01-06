<?php

declare(strict_types=1);

namespace Cordis\Entity\Attributes;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;

/**
 * Trait for type attribute.
 */
trait TypeTrait {

  #[Type("string")]
  #[SerializedName("type")]
  #[XmlAttribute]
  public ?string $type = NULL;

  /**
   * Get type.
   *
   * @return string|null
   *   The type.
   */
  public function getType(): ?string {
    return $this->type;
  }

}
