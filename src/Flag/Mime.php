<?php

namespace Hibit\Flag;

/**
 * Class Mime
 * @package Hibit\GeoDetect
 */
class Mime
{
    public static function getByFormat(Format $format): string
    {
        return match ($format) {
            Format::SVG => 'svg+xml',
            default => 'webp',
        };
    }
}
