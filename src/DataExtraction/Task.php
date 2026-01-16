<?php

declare(strict_types=1);

namespace Cordis\DataExtraction;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;

/**
 * Represents an extraction task.
 */
class Task
{
    #[Type("integer")]
    #[SerializedName("taskID")]
    private int $taskId;

    #[Type("string")]
    #[SerializedName("progress")]
    private ?string $progress = null;

    #[Type("string")]
    #[SerializedName("query")]
    private ?string $query = null;

    #[Type("integer")]
    #[SerializedName("numberOfRecords")]
    private int $recordsCount = 0;

    #[Type("integer")]
    #[SerializedName("numberOfRecordsEstimated")]
    private int $estimatedRecordsCount = 0;

    #[Type("integer")]
    #[SerializedName("numberOfProcessedRecords")]
    private int $processedRecordsCount = 0;

    #[Type("string")]
    #[SerializedName("remainingTime")]
    private ?string $remainingTime = null;

    #[Type("string")]
    #[SerializedName("averageSpeed")]
    private ?string $averageSpeed = null;

    #[Type("string")]
    #[SerializedName("destinationFileUri")]
    private ?string $destinationFileUri = null;

    #[Type("array")]
    #[SerializedName("files")]
    private array $files = [];

    #[Type("array")]
    #[SerializedName("filesSizes")]
    private array $filesSizes = [];

    #[Type("string")]
    #[SerializedName("message")]
    private ?string $message = null;

    /**
     * Get task id.
     *
     * @return int
     *   The task id.
     */
    public function getTaskId(): int
    {
        return $this->taskId;
    }

    /**
     * Get task progress.
     *
     * @return TaskProgress|null
     *   The progress of the task if found, null otherwise.
     */
    public function getProgress(): ?TaskProgress
    {
        return TaskProgress::tryFrom(strtolower($this->progress ?? '') ?? '');
    }

    /**
     * Get the query used to create the task.
     *
     * @return string|null
     *   The query in cordis format.
     */
    public function getQuery(): ?string
    {
        return $this->query;
    }

    /**
     * Get count of the records retrieved by the extraction tool.
     *
     * @return int
     *   The count of the records.
     */
    public function getRecordsCount(): int
    {
        return $this->recordsCount;
    }

    /**
     * Get estimated records count.
     *
     * @return int
     *   The estimated records count.
     */
    public function getEstimatedRecordsCount(): int
    {
        return $this->estimatedRecordsCount;
    }

    /**
     * Get progress record count.
     *
     * @return int
     *   The count of the progressed records.
     */
    public function getProcessedRecordsCount(): int
    {
        return $this->processedRecordsCount;
    }

    /**
     * Get remaining time for the task.
     *
     * @return string|null
     *   The remaining time.
     */
    public function getRemainingTime(): ?string
    {
        return $this->remainingTime;
    }

    /**
     * Get average speed of the task.
     *
     * @return string|null
     *   The average speed of the task.
     */
    public function getAverageSpeed(): ?string
    {
        return $this->averageSpeed;
    }

    /**
     * Get destination file Uri of the extractions.
     *
     * @return string|null
     *   The destination file Uri.
     */
    public function getDestinationFileUri(): ?string
    {
        return $this->destinationFileUri;
    }

    /**
     * Get compressed files for all requested formats.
     *
     * @return array
     *   The compressed files.
     */
    public function getFiles(): array
    {
        return $this->files;
    }

    /**
     * Get compressed files sizes.
     *
     * @return array
     *   The compressed files sizes.
     */
    public function getFilesSizes(): array
    {
        return $this->filesSizes;
    }

    /**
     * Get request feedback message.
     *
     * @return string|null
     *   The feedback message, if any.
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }
}
