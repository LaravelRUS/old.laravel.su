<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\ContentRenderer\Renderer;

use Highlight\Highlighter;
use Illuminate\Contracts\Events\Dispatcher;
use League\CommonMark\ConverterInterface;

/**
 * Class MarkdownRenderer
 */
class MarkdownRenderer extends Renderer
{
    /**
     * @var string[]
     */
    private const REPLACEMENTS_BEFORE = [
        '/<div.+?markdown="\d+">(.*?)<\/div>/isum' => '$1',
        '/<style>.+?<\/style>/isum'                => '',
    ];

    /**
     * @var string[]
     */
    private const REPLACEMENTS_AFTER = [
        '/\s*<p>\s*<\/p>/isum'                                      => '',
        '/<blockquote>\s*<p>\s*(.*?)\s*<\/p>\s*<\/blockquote>/isum' => '<blockquote>$1</blockquote>',
        '/<blockquote>\s*{(\w+)}\s*(.*?)<\/blockquote>/isum'        => '<blockquote class="quote-$1">$2</blockquote>',
        '/<p>\s*<a name="(.+?)">.*?<\/a>\s*<\/p>/isum'              => '<a name="$1"></a>',
    ];

    /**
     * @var ConverterInterface
     */
    private ConverterInterface $md;

    /**
     * MarkdownRenderer constructor.
     *
     * @param ConverterInterface $md
     * @param Dispatcher $dispatcher
     */
    public function __construct(ConverterInterface $md, Dispatcher $dispatcher)
    {
        $this->md = $md;

        parent::__construct($dispatcher);
    }

    /**
     * @param string $version
     * @param string $original
     * @return string
     */
    public function render(string $version, string $original): string
    {
        return $this->execute($version, $original, $this->executor());
    }

    /**
     * @return \Closure
     */
    private function executor(): \Closure
    {
        return function (string $source): string {
            $result = $this->replaceAll(self::REPLACEMENTS_BEFORE, $source);

            $result = $this->md->convertToHtml($result);

            $result = $this->replaceAll(self::REPLACEMENTS_AFTER, $result);

            return $result;
        };
    }
}
