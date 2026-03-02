<?php

namespace Hibit\Country;

use Hibit\Continent\ContinentRecord;
use Hibit\Exception\InvalidDatabaseException;

/**
 * Class CountryDetect
 * @package Hibit\GeoDetect
 */
readonly class CountryDetect
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
            new ContinentRecord(
                $record->continent->geonameId,
                $record->continent->code,
            ),
            $record->country->geonameId,
            $record->country->isoCode,
            $record->country->name,
            $record->country->isInEuropeanUnion,
        );
    }
}
