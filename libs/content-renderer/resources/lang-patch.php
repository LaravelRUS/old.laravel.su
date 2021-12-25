<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

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
