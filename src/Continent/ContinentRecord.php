<?php namespace Hibit\Continent;

/**
 * Class ContinentRecord
 * @package Hibit\GeoDetect
 */
readonly class ContinentRecord
{
    public function __construct(
        private ?int $geonameId,
        private ?string $isoCode,
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
}
