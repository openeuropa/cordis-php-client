<?php

declare(strict_types=1);

namespace Cordis\Entity;

use Cordis\Entity\Attributes\TypeTrait;
use Cordis\Entity\Elements\AvailableLanguagesTrait;
use Cordis\Entity\Elements\LanguageTrait;
use Cordis\Entity\Elements\TitleTrait;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;

/**
 * Represents a category.
 */
class Category
{
    use AvailableLanguagesTrait;
    use LanguageTrait;
    use TitleTrait;
    use TypeTrait;

    #[Type("string")]
    #[SerializedName("code")]
    private ?string $code = null;

    #[Type("string")]
    #[SerializedName("description")]
    private ?string $description = null;

    #[Type("string")]
    #[SerializedName("displayCode")]
    private ?string $displayCode = null;

    #[Type("string")]
    #[SerializedName("classification")]
    #[XmlAttribute]
    public ?string $classification = null;

    /**
     * Get code.
     *
     * @return string|null
     *   The code.
     */
    public function getCode(): ?string
    {
        return $this->code;
    }

    /**
     * Get description.
     *
     * @return string|null
     *   The description.
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * Get displayCode.
     *
     * @return string|null
     *   The displayCode.
     */
    public function getDisplayCode(): ?string
    {
        return $this->displayCode;
    }

    /**
     * Get classification.
     *
     * @return string|null
     *   The classification.
     */
    public function getClassification(): ?string
    {
        return $this->classification;
    }
}
