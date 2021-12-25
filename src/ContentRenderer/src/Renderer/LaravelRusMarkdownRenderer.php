<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\ContentRenderer\Renderer;

class LaravelRusMarkdownRenderer extends MarkdownRenderer
{
    /**
     * @var string
     */
    private const PATTERN_COMMIT_HEADER = '/^git\h+[a-z0-9]+\n+-+\n*/ium';

    /**
     * @var string
     */
    private const PATTERN_API_LINK = '/<a\hhref="\/api\/(.+?)">(.+?)<\/a>/isum';

    /**
     * @var string
     */
    private const REPLACEMENT_API_LINK = '<a href="https://laravel.com/api/$1" target="_blank" rel="nofollow">$2</a>';

    /**
     * @param string $original
     * @param bool $escape
     * @return string
     */
    public function render(string $original, bool $escape = true): string
    {
        $original = $this->removeGitCommit($original);

        $after = parent::render($original, $escape);

        return $this->fixApiLink($after);
    }

    /**
     * @param string $content
     * @return string
     */
    private function removeGitCommit(string $content): string
    {
        return \preg_replace(self::PATTERN_COMMIT_HEADER, '', $content);
    }

    /**
     * @param string $after
     * @return string
     */
    private function fixApiLink(string $after): string
    {
        return \preg_replace(self::PATTERN_API_LINK, self::REPLACEMENT_API_LINK, $after);
    }
}
