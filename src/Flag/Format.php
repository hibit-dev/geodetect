<?php

namespace Hibit\Flag;

/**
 * Class Format
 * @package Hibit\GeoDetect
 */
enum Format: string
{
    case H20 = 'height-20';
    case H24 = 'height-24';
    case W20 = 'width-20';
    case W40 = 'width-40';
    case SVG = 'svg';
}
