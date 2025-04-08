<?php

namespace Hibit\Flag;

/**
 * Class Folder
 * @package Hibit\GeoDetect
 */
enum Folder: string
{
    case H20 = 'h20';
    case H24 = 'h24';
    case W20 = 'w20';
    case W40 = 'w40';
    case SVG = 'svg';

    public static function getByFormat(Format $format): Folder
    {
        return match ($format) {
            Format::H20 => Folder::H20,
            Format::H24 => Folder::H24,
            Format::W20 => Folder::W20,
            Format::W40 => Folder::W40,
            Format::SVG => Folder::SVG,
        };
    }
}
