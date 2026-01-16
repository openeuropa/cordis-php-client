<?php

declare(strict_types=1);

namespace Cordis\Entity;

use Cordis\Entity\Elements\AvailableLanguagesTrait;
use Cordis\Entity\Elements\LanguageTrait;
use Cordis\Entity\Elements\TitleTrait;
use DateTime;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;

/**
 * Base class for cordis resource entity.
 *
 * Currently cordis has four resource types of entities; Project, Programme,
 * Article, and Result.
 */
abstract class ResourceEntityBase extends EntityBase implements AssociatedEntityInterface
{
    use AssociatedEntityTrait;
    use AvailableLanguagesTrait;
    use LanguageTrait;
    use TitleTrait;

    #[Type("string")]
    #[SerializedName("teaser")]
    private ?string $teaser = null;

    #[Type("DateTime<'!Y-m-d H:i:s'>")]
    #[SerializedName("sourceUpdateDate")]
    private ?DateTime $sourceUpdateDate = null;

    #[Type("DateTime<'!Y-m-d H:i:s'>")]
    #[SerializedName("contentCreationDate")]
    private ?DateTime $contentCreationDate = null;

    #[Type("DateTime<'!Y-m-d H:i:s'>")]
    #[SerializedName("contentUpdateDate")]
    private ?DateTime $contentUpdateDate = null;

    #[Type("DateTime<'!Y-m-d H:i:s'>")]
    #[SerializedName("lastUpdateDate")]
    private ?DateTime $lastUpdateDate = null;

    #[Type("DateTime<'!Y-m-d H:i:s'>")]
    #[SerializedName("archivedDate")]
    private ?DateTime $archivedDate = null;

    /**
     * Get teaser.
     *
     * @return string|null
     *   The teaser.
     */
    public function getTeaser(): ?string
    {
        return $this->teaser;
    }

    /**
     * Get source update date.
     *
     * @return \DateTime|null
     *   The source update date.
     */
    public function getSourceUpdateDate(): ?DateTime
    {
        return $this->sourceUpdateDate;
    }

    /**
     * Get content creation date.
     *
     * @return \DateTime|null
     *   The content creation date.
     */
    public function getContentCreationDate(): ?DateTime
    {
        return $this->contentCreationDate;
    }

    /**
     * Get content update date.
     *
     * @return \DateTime|null
     *   The content update date.
     */
    public function getContentUpdateDate(): ?DateTime
    {
        return $this->contentUpdateDate;
    }

    /**
     * Get last update date.
     *
     * @return \DateTime|null
     *   The last update date.
     */
    public function getLastUpdateDate(): ?DateTime
    {
        return $this->lastUpdateDate;
    }

    /**
     * Get archived date.
     *
     * @return \DateTime|null
     *   The archived date.
     */
    public function getArchivedDate(): ?DateTime
    {
        return $this->archivedDate;
    }
}
