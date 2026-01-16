<?php

declare(strict_types=1);

namespace Cordis\Entity;

use Cordis\Entity\Attributes\SourceTrait;
use Cordis\Entity\Attributes\TypeTrait;

/**
 * Trait for associated entity.
 */
trait AssociatedEntityTrait
{
    use TypeTrait;
    use SourceTrait;
}
