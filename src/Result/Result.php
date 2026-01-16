<?php

declare(strict_types=1);

namespace Cordis\Result;

use Cordis\Entity\ResourceEntityBase;
use DateTime;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;

/**
 * Represents result entity.
 */
class Result extends ResourceEntityBase
{
    #[Type("string")]
    #[SerializedName("id")]
    private string $id;

    #[Type("string")]
    #[SerializedName("description")]
    private ?string $description = null;

    #[Type("string")]
    #[SerializedName("summary")]
    private ?string $summary = null;

    #[Type("string")]
    #[SerializedName("workPerformed")]
    private ?string $workPerformed = null;

    #[Type("string")]
    #[SerializedName("finalResults")]
    private ?string $finalResults = null;

    #[Type("int")]
    #[SerializedName("periodNumber")]
    private ?int $periodNumber = null;

    #[Type("DateTime<'!Y-m-d'>")]
    #[SerializedName("periodFrom")]
    private ?DateTime $periodFrom = null;

    #[Type("DateTime<'!Y-m-d'>")]
    #[SerializedName("periodTo")]
    private ?DateTime $periodTo = null;

    #[Type("Cordis\Result\ResultRelations")]
    #[SerializedName("relations")]
    private ?ResultRelations $relations = null;

    /**
     * Get result id.
     *
     * @return string
     *   The result id.
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Get result description.
     *
     * @return string|null
     *   The result description.
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * Get result summary.
     *
     * @return string|null
     *   The result summary.
     */
    public function getSummary(): ?string
    {
        return $this->summary;
    }

    /**
     * Get work performed.
     *
     * @return string|null
     *   The work performed.
     */
    public function getWorkPerformed(): ?string
    {
        return $this->workPerformed;
    }

    /**
     * Get final results.
     *
     * @return string|null
     *   The final results.
     */
    public function getFinalResults(): ?string
    {
        return $this->finalResults;
    }

    /**
     * Get period number.
     *
     * @return int|null
     *   The period number.
     */
    public function getPeriodNumber(): ?int
    {
        return $this->periodNumber;
    }

    /**
     * Get period from date.
     *
     * @return \DateTime|null
     *   The period from date.
     */
    public function getPeriodFrom(): ?DateTime
    {
        return $this->periodFrom;
    }

    /**
     * Get period to date.
     *
     * @return \DateTime|null
     *   The period to date.
     */
    public function getPeriodTo(): ?DateTime
    {
        return $this->periodTo;
    }

    /**
     * Get result relations.
     *
     * @return \Cordis\Result\ResultRelations|null
     *   Result relations.
     */
    public function getRelations(): ?ResultRelations
    {
        return $this->relations;
    }
}
