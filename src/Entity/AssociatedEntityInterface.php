<?php

declare(strict_types=1);

namespace Cordis\Entity;

/**
 * Interface for an associated entity.
 *
 * The interface should be implemented by the type of entities that could be
 * associated.
 * An associated entity is an entity that is associated with another entity.
 * When an entity is associated, it also contains two attributes; type and
 * source.
 */
interface AssociatedEntityInterface
{
    /**
     * Get type.
     *
     * @return string|null
     *   The type.
     */
    public function getType(): ?string;

    /**
     * Get source.
     *
     * @return string|null
     *   The source.
     */
    public function getSource(): ?string;
}
