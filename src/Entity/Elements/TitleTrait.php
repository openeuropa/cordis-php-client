<?php

declare(strict_types=1);

namespace Cordis\Entity\Elements;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;

/**
 * Trait for title element.
 */
trait TitleTrait {

  #[Type("string")]
  #[SerializedName("title")]
  private ?string $title = NULL;

  /**
   * Get title.
   *
   * @return string|null
   *   The title.
   */
  public function getTitle(): ?string {
    return $this->title;
  }

}
