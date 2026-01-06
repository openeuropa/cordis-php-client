<?php

declare(strict_types=1);

namespace Cordis\Entity;

use Cordis\Entity\Elements\AvailableLanguagesTrait;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;

/**
 * Represents organization.
 */
class Organization extends EntityBase implements AssociatedEntityInterface {

  use AssociatedEntityTrait;
  use AvailableLanguagesTrait;

  #[Type("int")]
  #[SerializedName("id")]
  private int $id;

  #[Type("string")]
  #[SerializedName("vatNumber")]
  private ?string $vatNumber = NULL;

  #[Type("string")]
  #[SerializedName("legalName")]
  private ?string $legalName = NULL;

  #[Type("string")]
  #[SerializedName("shortName")]
  private ?string $shortName = NULL;

  #[Type("float")]
  #[SerializedName("ecContribution")]
  #[XmlAttribute]
  private ?float $ecContribution = NULL;

  #[Type("float")]
  #[SerializedName("netEcContribution")]
  #[XmlAttribute]
  private ?float $netEcContribution = NULL;

  #[Type("Cordis\Entity\Address")]
  #[SerializedName("address")]
  private ?Address $address = NULL;

  #[Type("bool")]
  #[SerializedName("terminated")]
  #[XmlAttribute]
  private bool $terminated;

  #[Type("Cordis\Entity\OrganizationRelations")]
  #[SerializedName("relations")]
  private ?OrganizationRelations $relations = NULL;

  /**
   * Get organization id.
   *
   * @return int
   *   The organization id.
   */
  public function getId(): int {
    return $this->id;
  }

  /**
   * Get vat number.
   *
   * @return string|null
   *   The vat number.
   */
  public function getVatNumber(): ?string {
    return $this->vatNumber;
  }

  /**
   * Get legal name.
   *
   * @return string|null
   *   The legal name.
   */
  public function getLegalName(): ?string {
    return $this->legalName;
  }

  /**
   * Get short name.
   *
   * @return string|null
   *   The short name.
   */
  public function getShortName(): ?string {
    return $this->shortName;
  }

  /**
   * Get EC contribution.
   *
   * @return float|null
   *   The EC contribution.
   */
  public function getEcContribution(): ?float {
    return $this->ecContribution;
  }

  /**
   * Get EC net contribution.
   *
   * @return float|null
   *   The EC net contribution.
   */
  public function getNetEcContribution(): ?float {
    return $this->netEcContribution;
  }

  /**
   * Get address.
   *
   * @return \Cordis\Entity\Address|null
   *   The address.
   */
  public function getAddress(): ?Address {
    return $this->address;
  }

  /**
   * Is organization terminated.
   *
   * @return bool
   *   True if the organization terminated, false otherwise.
   */
  public function isTerminated(): bool {
    return $this->terminated;
  }

  /**
   * Get organization relations.
   *
   * @return \Cordis\Entity\OrganizationRelations|null
   *   Organization relations.
   */
  public function getRelations(): ?OrganizationRelations {
    return $this->relations;
  }

}
