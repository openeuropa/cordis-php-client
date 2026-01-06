<?php

declare(strict_types=1);

namespace Cordis\Entity\Attributes;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;

/**
 * Trait for source attribute.
 */
trait SourceTrait {

  #[Type("string")]
  #[SerializedName("source")]
  #[XmlAttribute]
  public ?string $source = NULL;

  /**
   * Get source.
   *
   * @return string|null
   *   The source.
   */
  public function getSource(): ?string {
    return $this->source;
  }

}
