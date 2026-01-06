<?php

declare(strict_types=1);

namespace Cordis\Entity\Elements;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;

/**
 * Trait for language element.
 */
trait LanguageTrait {

  #[Type("string")]
  #[SerializedName("language")]
  private ?string $language = NULL;

  /**
   * Get language.
   *
   * @return string|null
   *   The language.
   */
  public function getLanguage(): ?string {
    return $this->language;
  }

}
