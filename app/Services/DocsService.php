<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Services;

use GrahamCampbell\Markdown\Facades\Markdown;

/**
 * Class DocsService
 */
class DocsService
{
    /**
     * @param string $markdown
     * @param string $versionTitle
     * @return string
     */
    public function convertToHtml(string $markdown, string $versionTitle): string
    {
        $markdown = \str_replace('{{version}}', $versionTitle, $markdown);

        return Markdown::convertToHtml($markdown);
    }
}
