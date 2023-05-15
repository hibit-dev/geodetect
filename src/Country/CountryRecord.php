<?php namespace Hibit\Country;

/**
 * Class CountryRecord
 * @package Hibit\GeoDetect
 */
class CountryRecord
{
    public function __construct(
        private ?int $geonameId,
        private ?string $isoCode,
        private ?string $name,
        private bool $isInEuropeanUnion
    ) {
    }

    public function getGeonameId(): ?int
    {
        return $this->geonameId;
    }

    public function getIsoCode(): ?string
    {
        return $this->isoCode;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function isInEuropeanUnion(): bool
    {
        return $this->isInEuropeanUnion;
    }
}
