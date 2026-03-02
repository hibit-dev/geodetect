<?php namespace Hibit\Country;

use Hibit\Continent\ContinentRecord;

/**
 * Class CountryRecord
 * @package Hibit\GeoDetect
 */
readonly class CountryRecord
{
    public function __construct(
        private ContinentRecord $continent,
        private ?int $geonameId,
        private ?string $isoCode,
        private ?string $name,
        private bool $isInEuropeanUnion
    ) {
    }

    public function continent(): ContinentRecord
    {
        return $this->continent;
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
