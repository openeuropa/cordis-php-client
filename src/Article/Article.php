<?php

declare(strict_types=1);

namespace Cordis\Article;

use Cordis\Entity\ResourceEntityBase;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;

/**
 * Represents article entity.
 */
class Article extends ResourceEntityBase {

  #[Type("string")]
  #[SerializedName("id")]
  private string $id;

  #[Type("Cordis\Article\ArticleRelations")]
  #[SerializedName("relations")]
  private ?ArticleRelations $relations = NULL;

  /**
   * Get article id.
   *
   * @return string
   *   The article id.
   */
  public function getId(): string {
    return $this->id;
  }

  /**
   * Get article relations.
   *
   * @return \Cordis\Article\ArticleRelations|null
   *   Article relations.
   */
  public function getRelations(): ?ArticleRelations {
    return $this->relations;
  }

}
