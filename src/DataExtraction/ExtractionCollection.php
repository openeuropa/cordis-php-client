<?php

declare(strict_types=1);

namespace Cordis\DataExtraction;

use Cordis\Serializer\Serializer;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;

/**
 * Class represents extraction collection.
 */
class ExtractionCollection
{
    #[Type("boolean")]
    #[SerializedName("status")]
    private bool $status;

    #[Type("array")]
    #[SerializedName("payload")]
    private array $payload = [];

    /**
     * Get status.
     *
     * @return bool
     *   The status of the extraction.
     */
    public function getStatus(): bool
    {
        return $this->status;
    }

    /**
     * Get extraction tasks.
     *
     * @return \Cordis\DataExtraction\Task[]
     *   The extraction tasks.
     */
    public function tasks(): array
    {
        $tasks = [];
        $result = $this->payload['result'] ?? [];
        if ($result) {
            // The task ID is named differently in the task list. Update the key
            // of the ID so it aligns with the other endpoints.
            $result = array_map(function ($task) {
                if (isset($task['taskId'])) {
                    $task['taskID'] = $task['taskId'];
                    unset($task['taskId']);
                }
                return $task;
            }, $result);

            $serializer = new Serializer();
            foreach ($result as $task) {
                $tasks[] = $serializer->deserialize(json_encode($task), Task::class, 'json');
            }
        }
        return $tasks;
    }
}
