<?php

declare(strict_types=1);

namespace Cordis\Project;

use Cordis\Entity\ResourceEntityBase;
use DateTime;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;

/**
 * Represents project entity.
 */
class Project extends ResourceEntityBase {

  #[Type("int")]
  #[SerializedName("id")]
  private int $id;

  #[Type("string")]
  #[SerializedName("acronym")]
  private ?string $acronym = NULL;

  #[Type("string")]
  #[SerializedName("objective")]
  private ?string $objective = NULL;

  #[Type("float")]
  #[SerializedName("ecMaxContribution")]
  private ?float $ecMaxContribution = NULL;

  #[Type("float")]
  #[SerializedName("totalCost")]
  private ?float $totalCost = NULL;

  #[Type("DateTime<'!Y-m-d'>")]
  #[SerializedName("startDate")]
  private ?DateTime $startDate = NULL;

  #[Type("DateTime<'!Y-m-d'>")]
  #[SerializedName("endDate")]
  private ?DateTime $endDate = NULL;

  #[Type("DateTime<'!Y-m-d'>")]
  #[SerializedName("ecSignatureDate")]
  private ?DateTime $ecSignatureDate = NULL;

  #[Type("int")]
  #[SerializedName("duration")]
  private ?int $duration = NULL;

  #[Type("string")]
  #[SerializedName("status")]
  private ?string $status = NULL;

  #[Type("Cordis\Project\ProjectRelations")]
  #[SerializedName("relations")]
  private ?ProjectRelations $relations = NULL;

  /**
   * Get project id.
   *
   * @return int
   *   The project id.
   */
  public function getId(): int {
    return $this->id;
  }

  /**
   * Get project acronym.
   *
   * @return string|null
   *   The project acronym.
   */
  public function getAcronym(): ?string {
    return $this->acronym;
  }

  /**
   * Get project objective.
   *
   * @return string|null
   *   The project objective.
   */
  public function getObjective(): ?string {
    return $this->objective;
  }

  /**
   * Get EC max contribution.
   *
   * @return float|null
   *   The EC max contribution.
   */
  public function getEcMaxContribution(): ?float {
    return $this->ecMaxContribution;
  }

  /**
   * Get total cost.
   *
   * @return float|null
   *   The total cost.
   */
  public function getTotalCost(): ?float {
    return $this->totalCost;
  }

  /**
   * Get start date.
   *
   * @return \DateTime|null
   *   The start date.
   */
  public function getStartDate(): ?DateTime {
    return $this->startDate;
  }

  /**
   * Get end date.
   *
   * @return \DateTime|null
   *   The end date.
   */
  public function getEndDate(): ?DateTime {
    return $this->endDate;
  }

  /**
   * Get EC signature date.
   *
   * @return \DateTime|null
   *   The EC signature date.
   */
  public function getEcSignatureDate(): ?DateTime {
    return $this->ecSignatureDate;
  }

  /**
   * Get project duration.
   *
   * @return int|null
   *   The project duration.
   */
  public function getDuration(): ?int {
    return $this->duration;
  }

  /**
   * Get project status.
   *
   * @return \Cordis\Project\ProjectStatus|null
   *   The project status.
   */
  public function getStatus(): ?ProjectStatus {
    return ProjectStatus::tryFrom(strtolower($this->status) ?? '');
  }

  /**
   * Get project relations.
   *
   * @return \Cordis\Project\ProjectRelations|null
   *   Project relations.
   */
  public function getRelations(): ?ProjectRelations {
    return $this->relations;
  }

}
