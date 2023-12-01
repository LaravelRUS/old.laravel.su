<?php

namespace App\Services;

class ColorText
{
    /**
     * @param string $text
     * @param string $opacity
     *
     * @return string
     */
    public static function Hex(string $text, string $opacity = ''): string
    {
        return '#'.substr(hash('crc32', $text, false), 0, 6).$opacity;
    }
}
