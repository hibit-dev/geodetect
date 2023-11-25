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
        $folder = match ($format) {
            Format::H20 => 'h20',
            Format::H24 => 'h24',
            Format::W20 => 'w20',
            Format::W40 => 'w40',
            Format::SVG => 'svg',
        };

        return dirname(__FILE__) . '/../../resources/flags/' . $folder . '/';
    }
}
