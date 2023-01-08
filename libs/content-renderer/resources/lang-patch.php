<?php

declare(strict_types=1);

namespace Highlight;

/**
 * @internal
 *
 * @since 9.16.0.0
 */
abstract class RegExUtils
{
    /**
     * @param $value
     * @param $global
     * @param $case_insensitive
     * @return RegEx
     */
    public static function langRe($value, $global, $case_insensitive)
    {
        $escaped = \preg_replace('#(?<!\\\)/#m', '\\/', $value);
        $regex = "/(*ANYCRLF){$escaped}/m" . ($case_insensitive ? 'i' : '');

        return new RegEx($regex);
    }
}
