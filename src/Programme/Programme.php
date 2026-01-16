<?php

declare(strict_types=1);

namespace Cordis\Programme;

use Cordis\Entity\ResourceEntityBase;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;

/**
 * Represents programme entity.
 */
class Programme extends ResourceEntityBase
{
    #[Type("string")]
    #[SerializedName("id")]
    private string $id;

    #[Type("string")]
    #[SerializedName("code")]
    private ?string $code = null;

    #[Type("int")]
    #[SerializedName("cordaId")]
    private ?int $cordaId = null;

    #[Type("string")]
    #[SerializedName("frameworkProgramme")]
    private ?string $frameworkProgramme = null;

    #[Type("string")]
    #[SerializedName("pga")]
    private ?string $pga = null;

    #[Type("string")]
    #[SerializedName("shortTitle")]
    private ?string $shortTitle = null;

    #[Type("string")]
    #[SerializedName("objective")]
    private ?string $objective = null;

    #[Type("Cordis\Programme\ProgrammeRelations")]
    #[SerializedName("relations")]
    private ?ProgrammeRelations $relations = null;

    /**
     * Get programme id.
     *
     * @return string
     *   The programme id.
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Get programme code.
     *
     * @return string|null
     *   The programme code.
     */
    public function getCode(): ?string
    {
        return $this->code;
    }

    /**
     * Get programme cordaId.
     *
     * @return int|null
     *   The programme cordaId.
     */
    public function getCordaId(): ?int
    {
        return $this->cordaId;
    }

    /**
     * Get programme frameworkProgramme.
     *
     * @return string|null
     *   The programme frameworkProgramme.
     */
    public function getFrameworkProgramme(): ?string
    {
        return $this->frameworkProgramme;
    }

    /**
     * Get programme pga.
     *
     * @return string|null
     *   The programme pga.
     */
    public function getPga(): ?string
    {
        return $this->pga;
    }

    /**
     * Get programme short title.
     *
     * @return string|null
     *   The programme short title.
     */
    public function getShortTitle(): ?string
    {
        return $this->shortTitle;
    }

    /**
     * Get programme objective.
     *
     * @return string|null
     *   The programme objective.
     */
    public function getObjective(): ?string
    {
        return $this->objective;
    }

    /**
     * Get programme relations.
     *
     * @return \Cordis\Programme\ProgrammeRelations|null
     *   Programme relations.
     */
    public function getRelations(): ?ProgrammeRelations
    {
        return $this->relations;
    }
}
