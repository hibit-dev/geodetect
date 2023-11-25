<?php

namespace Hibit;

use Hibit\Country\CountryDatabase;
use Hibit\Country\CountryDetect;
use Hibit\Country\CountryRecord;
use Hibit\Flag\Extension;
use Hibit\Flag\Format;
use Hibit\Flag\Mime;
use Hibit\Flag\Path;

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

    public static function getFlagByCountryRecord(CountryRecord $countryRecord, ?Format $format = Format::H20): string
    {
        $isoCode = $countryRecord->getIsoCode() ?? 'xx';

        return self::getFlagByIsoCode($isoCode, $format);
    }

    public static function getFlagByIsoCode(string $countryIso2, ?Format $format = Format::H20): string
    {
        $filename = sprintf('%s%s.%s', Path::getFolderByFormat($format), strtolower($countryIso2), Extension::getByFormat($format));

        if (file_exists($filename) === false) {
            return 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mP8/x8AAwMCAO+ip1sAAAAASUVORK5CYII= '; // Blank pixel
        }

        $data = file_get_contents($filename);

        return 'data:image/' . Mime::getByFormat($format) . ';base64,' . base64_encode($data);
    }
}
