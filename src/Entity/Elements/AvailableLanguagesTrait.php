<?php

declare(strict_types=1);

namespace Cordis\Entity\Elements;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;

/**
 * Trait for available languages element.
 */
trait AvailableLanguagesTrait
{
    #[Type("string")]
    #[SerializedName("availableLanguages")]
    private ?string $availableLanguages = null;

    /**
     * Get available languages.
     *
     * @return array
     *   The available languages.
     */
    public function getAvailableLanguages(): array
    {
        return explode(',', $this->availableLanguages);
    }
}
