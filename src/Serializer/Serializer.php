<?php

declare(strict_types=1);

namespace Cordis\Serializer;

use Cordis\Exception\CordisUnsupportedFormatException;
use JMS\Serializer\DeserializationContext;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\Serializer as JmsSerializer;
use JMS\Serializer\SerializerInterface;
use JMS\Serializer\SerializerBuilder;

/**
 * Serializer class for cordis.
 */
class Serializer implements SerializerInterface
{
    /**
     * The supported formats.
     */
    private const array SUPPORTED_FORMATS = ['xml', 'json'];

    /**
     * {@inheritdoc}
     */
    public function serialize($data, string $format = 'xml', ?SerializationContext $context = null, ?string $type = null): string
    {
        if (!in_array($format, static::SUPPORTED_FORMATS)) {
            throw new CordisUnsupportedFormatException(sprintf('Serialization for the format "%s" is not supported.', $format));
        }
        return self::getSerializer()->serialize($data, $format, $context, $type);
    }

    /**
     * {@inheritdoc}
     */
    public function deserialize(string $data, $type, string $format = 'xml', ?DeserializationContext $context = null): mixed
    {
        if (!in_array($format, static::SUPPORTED_FORMATS)) {
            throw new CordisUnsupportedFormatException(sprintf('Deserialization for the format "%s" is not supported.', $format));
        }
        return self::getSerializer()->deserialize($data, $type, $format, $context);
    }

    /**
     * Serializer builder.
     *
     * @return \JMS\Serializer\Serializer
     *   The serializer.
     */
    public static function getSerializer(): JmsSerializer
    {
        return SerializerBuilder::create()->build();
    }
}
