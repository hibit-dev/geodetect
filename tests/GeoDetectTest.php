<?php

namespace Tests;

use Hibit\GeoDetect;
use Hibit\Country\CountryRecord;

use Hibit\Exception\InvalidDatabaseException;

use PHPUnit\Framework\TestCase;

final class GeoDetectTest extends TestCase
{
    private const IP = '90.71.67.40';

    private GeoDetect $geoDetect;

    public function test_invalid_database(): void
    {
        $this->expectException(InvalidDatabaseException::class);

        $this->geoDetect = new GeoDetect();

        $this->geoDetect->setCountriesDatabase('no_database');

        $this->geoDetect->getCountry(self::IP);
    }

    public function test_country_record(): void
    {
        $this->geoDetect = new GeoDetect();

        $countryRecord = $this->geoDetect->getCountry(self::IP);

        $this->assertInstanceOf(CountryRecord::class, $countryRecord);
        $this->assertIsNumeric($countryRecord->getGeonameId());
        $this->assertIsString($countryRecord->getIsoCode());
        $this->assertIsString($countryRecord->getName());
        $this->assertIsBool($countryRecord->isInEuropeanUnion());
    }

    public function test_get_flag_by_country_record(): void
    {
        $this->geoDetect = new GeoDetect();

        $countryRecord = $this->geoDetect->getCountry(self::IP);

        $flagImage = GeoDetect::getFlagByCountryRecord($countryRecord);

        $this->assertSame(
            'data:image/webp;base64,UklGRr4AAABXRUJQVlA4TLIAAAAvHcAEABKnAQAgzQFcRaNxAC+4JZrD3OsuYLS5b8fh2d2YBgCQ5nHeIdHIJLfk0og2qWtjEwBgkrkL8PnprhEIwE8xmvARrf8TAMgioP5/4NT3RwpbxKRpJyI5a+vMF5TzAgUKm6oorPo8cQXiqD76L64qq3hfoqpGkIdhsiKvkX9MVYVV+7Ht+hlC4Oo4cqe5VbczvOYcxyCO6qGx6qAGQ04jv4zZE/etqUerrAdkEVAB',
            $flagImage
        );
    }

    public function test_get_flag_with_invalid_country(): void
    {
        $flagImage = GeoDetect::getFlagByIsoCode('xx');

        $this->assertSame(
            'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mP8/x8AAwMCAO+ip1sAAAAASUVORK5CYII=',
            $flagImage
        );
    }
}
