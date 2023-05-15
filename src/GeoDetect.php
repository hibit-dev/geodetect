<?php

namespace Hibit;

use Hibit\Country\CountryDatabase;
use Hibit\Country\CountryDetect;
use Hibit\Country\CountryRecord;

/**
 * Class GeoDetect
 * @package Hibit\GeoDetect
 */
class GeoDetect
{
    private CountryDatabase $countryDatabase;

    public function __construct()
    {
        $this->countryDatabase = new CountryDatabase();
    }

    public function setCountriesDatabase(string $database): GeoDetect
    {
        $this->countryDatabase->set($database);

        return $this;
    }

    /**
     * @throws Exception\InvalidDatabaseException
     */
    public function getCountry(string $ip): CountryRecord
    {
        $countryDetect = new CountryDetect($this->countryDatabase);

        return $countryDetect->getByIp($ip);
    }
}
