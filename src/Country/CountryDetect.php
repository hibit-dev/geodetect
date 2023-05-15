<?php

namespace Hibit\Country;

use Hibit\Exception\InvalidDatabaseException;

/**
 * Class CountryDetect
 * @package Hibit\GeoDetect
 */
class CountryDetect
{
    public function __construct(private CountryDatabase $database)
    {
    }

    /**
     * @throws InvalidDatabaseException
     */
    public function getByIp(string $ip): CountryRecord
    {
        try {
            $reader = $this->database->load();

            $record = $reader->country($ip);
        } catch (\Exception $e) {
            throw new InvalidDatabaseException($e->getMessage(), $e->getCode(), $e);
        }

        return new CountryRecord(
            $record->country->geonameId,
            $record->country->isoCode,
            $record->country->name,
            $record->country->isInEuropeanUnion,
        );
    }
}
