<?php

declare(strict_types=1);

namespace Cordis\Entity;

use Cordis\Entity\Attributes\SourceTrait;
use Cordis\Entity\Attributes\TypeTrait;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;

/**
 * Represents a region.
 */
class Region extends EntityBase
{
    use SourceTrait;
    use TypeTrait;

    #[Type("string")]
    #[SerializedName("name")]
    private ?string $name = null;

    #[Type("string")]
    #[SerializedName("nutsCode")]
    private ?string $nutsCode = null;

    #[Type("string")]
    #[SerializedName("euCode")]
    private ?string $euCode = null;

    #[Type("string")]
    #[SerializedName("isoCode")]
    private ?string $isoCode = null;

    /**
     * Get name.
     *
     * @return string|null
     *   The name.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Get nuts code.
     *
     * @return string|null
     *   The nuts code.
     */
    public function getNutsCode(): ?string
    {
        return $this->nutsCode;
    }

    /**
     * Get EU Code.
     *
     * @return string|null
     *   The EU Code.
     */
    public function getEuCode(): ?string
    {
        return $this->euCode;
    }

    /**
     * Get ISO Code.
     *
     * @return string|null
     *   The ISO Code.
     */
    public function getIsoCode(): ?string
    {
        return $this->isoCode;
    }
}
