<?php

declare(strict_types=1);

namespace Cordis\Entity;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlList;

/**
 * Represents associations for any entity.
 *
 * This represents the "associations" element in an entity. It supposes to
 * collect all types of associated entities. However, an entity might not have
 * all types collected by this class.
 */
class Associations {

  #[Type("array<Cordis\Article\Article>")]
  #[SerializedName("article")]
  #[XmlList(entry: "article", inline: TRUE)]
  private array $articles = [];

  #[Type("array<Cordis\Entity\Call>")]
  #[SerializedName("call")]
  #[XmlList(entry: "call", inline: TRUE)]
  private array $calls = [];

  #[Type("array<Cordis\Entity\Organization>")]
  #[SerializedName("organization")]
  #[XmlList(entry: "organization", inline: TRUE)]
  private array $organizations = [];

  #[Type("array<Cordis\Programme\Programme>")]
  #[SerializedName("programme")]
  #[XmlList(entry: "programme", inline: TRUE)]
  private array $programmes = [];

  #[Type("array<Cordis\Project\Project>")]
  #[SerializedName("project")]
  #[XmlList(entry: "project", inline: TRUE)]
  private array $projects = [];

  #[Type("array<Cordis\Result\Result>")]
  #[SerializedName("result")]
  #[XmlList(entry: "result", inline: TRUE)]
  private array $results = [];

  /**
   * Get all articles.
   *
   * @return \Cordis\Article\Article[]
   *   All articles.
   */
  public function getArticles(): array {
    return $this->articles;
  }

  /**
   * Get all calls.
   *
   * @return \Cordis\Entity\Call[]
   *   All calls.
   */
  public function getCalls(): array {
    return $this->calls;
  }

  /**
   * Get all organizations.
   *
   * @return \Cordis\Entity\Organization[]
   *   All organizations.
   */
  public function getOrganizations(): array {
    return $this->organizations;
  }

  /**
   * Get all programmes.
   *
   * @return \Cordis\Programme\Programme[]
   *   All programmes.
   */
  public function getProgrammes(): array {
    return $this->programmes;
  }

  /**
   * Get all projects.
   *
   * @return \Cordis\Project\Project[]
   *   All projects.
   */
  public function getProjects(): array {
    return $this->projects;
  }

  /**
   * Get all Results.
   *
   * @return \Cordis\Result\Result[]
   *   All Results.
   */
  public function getResults(): array {
    return $this->results;
  }

}
