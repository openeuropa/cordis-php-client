<?php

declare(strict_types=1);

namespace Cordis\Entity;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;

/**
 * Represents address.
 */
class Address
{
    #[Type("string")]
    #[SerializedName("street")]
    private ?string $street = null;

    #[Type("string")]
    #[SerializedName("city")]
    private ?string $city = null;

    #[Type("string")]
    #[SerializedName("postalCode")]
    private ?string $postalCode = null;

    #[Type("string")]
    #[SerializedName("country")]
    private ?string $country = null;

    #[Type("string")]
    #[SerializedName("url")]
    private ?string $url = null;

    #[Type("string")]
    #[SerializedName("geolocation")]
    private ?string $geolocation = null;

    /**
     * Get street.
     *
     * @return string|null
     *   The street.
     */
    public function getStreet(): ?string
    {
        return $this->street;
    }

    /**
     * Get city.
     *
     * @return string|null
     *   The city.
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * Get postalCode.
     *
     * @return string|null
     *   The postalCode.
     */
    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    /**
     * Get country.
     *
     * @return string|null
     *   The country.
     */
    public function getCountry(): ?string
    {
        return $this->country;
    }

    /**
     * Get url.
     *
     * @return string|null
     *   The url.
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * Get geolocation.
     *
     * @return string|null
     *   The geolocation.
     */
    public function getGeolocation(): ?string
    {
        return $this->geolocation;
    }
}
