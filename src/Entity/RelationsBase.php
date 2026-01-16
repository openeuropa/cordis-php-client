<?php

declare(strict_types=1);

namespace Cordis\Entity;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlList;

/**
 * Base class for relations.
 */
abstract class RelationsBase
{
    #[Type("array<Cordis\Entity\Category>")]
    #[SerializedName("categories")]
    #[XmlList(entry: "category")]
    private array $categories = [];

    /**
     * Get categories in relations.
     *
     * @return \Cordis\Entity\Category[]
     *   The categories.
     */
    public function getCategories(): array
    {
        return $this->categories;
    }
}
