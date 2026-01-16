<?php

declare(strict_types=1);

namespace Cordis\Entity;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlList;

/**
 * Represents relations in organization.
 */
class OrganizationRelations extends RelationsBase
{
    #[Type("array<Cordis\Entity\Region>")]
    #[SerializedName("regions")]
    #[XmlList(entry: "region")]
    private array $regions = [];

    /**
     * Get regions in relations.
     *
     * @return \Cordis\Entity\Region[]
     *   The regions.
     */
    public function getRegions(): array
    {
        return $this->regions;
    }
}
