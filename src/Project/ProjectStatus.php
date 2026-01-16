<?php

declare(strict_types=1);

namespace Cordis\Project;

/**
 * Defines the project Statuses.
 */
enum ProjectStatus: string
{
    case Signed = 'signed';
    case Ongoing = 'ongoing';
    case Closed = 'closed';
    case Terminated = 'terminated';
}
