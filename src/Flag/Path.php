<?php

namespace Hibit\Flag;

/**
 * Class Path
 * @package Hibit\GeoDetect
 */
class Path
{
    public static function getFolderByFormat(Format $format): string
    {
        return sprintf(
            '%s/../../resources/flags/%s/',
            dirname(__FILE__),
            Folder::getByFormat($format)->value
        );
    }
}
