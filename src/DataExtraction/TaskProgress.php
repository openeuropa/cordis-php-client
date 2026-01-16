<?php

declare(strict_types=1);

namespace Cordis\DataExtraction;

/**
 * Defines the task progress states for extraction.
 */
enum TaskProgress: string
{
    case Ongoing = 'ongoing';
    case Finished = 'finished';
    case Failed = 'failed';
    case Deleted = 'deleted';
}
