<?php

declare(strict_types=1);

namespace Cordis\DataExtraction;

/**
 * Defines the task progress states for extraction.
 */
enum TaskProgress: string
{
    case Cancelled = 'cancelled';
    case Deleted = 'deleted';
    case Failed = 'failed';
    case Finished = 'finished';
    case Ongoing = 'ongoing';
}
