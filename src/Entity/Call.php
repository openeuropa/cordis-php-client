<?php

declare(strict_types=1);

namespace Cordis\Entity;

use Cordis\Entity\Elements\TitleTrait;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;

/**
 * Represents a call.
 */
class Call extends EntityBase implements AssociatedEntityInterface
{
    use AssociatedEntityTrait;
    use TitleTrait;

    #[Type("string")]
    #[SerializedName("identifier")]
    private ?string $identifier = null;

    /**
     * Get call identifier.
     *
     * @return string|null
     *   The call identifier.
     */
    public function getIdentifier(): ?string
    {
        return $this->identifier;
    }
}
