<?php

declare(strict_types=1);

namespace Cordis\Article;

use Cordis\Entity\ResourceEntityServiceBase;
use Cordis\Exception\CordisException;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Article service used to get articles.
 */
class ArticleService extends ResourceEntityServiceBase
{
    /**
     * The base path for article resource endpoint.
     */
    protected const string BASE_PATH = '/article';

    /**
     * Retrieve one article.
     *
     * @param string $articleId
     *   Article id.
     * @param string $langCode
     *   Language code.
     *
     * @return \Cordis\Article\Article|null
     *   The article object if found, null otherwise.
     *
     * @throws \Cordis\Exception\CordisException;
     */
    public function get(string $articleId, string $langCode = 'en'): ?Article
    {
        try {
            $uri = $this->getResourceApiEndpoint($articleId, $langCode);
            $response = $this->client->get($uri, $this->initQuery());
            $status = $response->getStatusCode();
            return match ($status) {
                200 => $this->serializer->deserialize(
                    (string) $response->getBody(),
                    Article::class
                ),
                404 => null,
                default => throw new CordisException(
                    "Unable to get article $articleId. Server responded with status code $status."
                )
            };
        } catch (GuzzleException $e) {
            throw new CordisException("(ERROR: {$e->getMessage()}) while fetching article: $articleId");
        }
    }
}
