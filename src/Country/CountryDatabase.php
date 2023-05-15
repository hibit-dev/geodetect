<?php

namespace Hibit\Country;

use GeoIp2\Database\Reader;

/**
 * Class CountryDatabase
 * @package Hibit\GeoDetect
 */
class CountryDatabase
{
    private string $database;

    public function __construct()
    {
        $defaultDatabase = dirname(__FILE__) . '/../../databases/countries.mmdb';

        $this->set($defaultDatabase);
    }

    public function set(string $database): void
    {
        $this->database = $database;
    }

    public function get(): string
    {
        return $this->database;
    }

    public function load(): Reader
    {
        return new Reader($this->database);
    }
}
