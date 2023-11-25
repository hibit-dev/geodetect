<?php

namespace Hibit\Flag;

/**
 * Class Extension
 * @package Hibit\GeoDetect
 */
class Extension
{
    public static function getByFormat(Format $format): string
    {
        return match ($format) {
            Format::SVG => 'svg',
            default => 'webp',
        };
    }
}
