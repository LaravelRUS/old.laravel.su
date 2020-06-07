<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\ContentRenderer\Renderer;

use App\ContentRenderer\EnvironmentFactory;
use Illuminate\Contracts\Events\Dispatcher;
use League\CommonMark\Environment;
use League\CommonMark\EnvironmentInterface;
use League\CommonMark\GithubFlavoredMarkdownConverter;

/**
 * Class MarkdownRenderer
 */
class MarkdownRenderer extends Renderer
{
    /**
     * @var string[]
     */
    private const REPLACEMENTS_BEFORE = [
        '/<div class="content\-list" markdown="1">(.+?)<\/div>/isum' =>
            '$1',
        '/`(\w+)\(\)`\h+\{#collection-method\}/isum' =>
            '<a href="#method-$1"><code>$1()</code></a>',
        '/`(\w+)\(\)`\h+\{#collection-method\h\.first-collection-method\}/isum' =>
            '<a href="#method-$1"><code>$1()</code></a>',
        '/<style>.+?<\/style>/isum'  => '',
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
     * @var EnvironmentFactory
     */
    private EnvironmentFactory $factory;

    /**
     * MarkdownRenderer constructor.
     *
     * @param EnvironmentFactory $factory
     * @param Dispatcher $dispatcher
     */
    public function __construct(EnvironmentFactory $factory, Dispatcher $dispatcher)
    {
        $this->factory = $factory;

        parent::__construct($dispatcher);
    }

    /**
     * @param string $original
     * @param bool $escape
     * @return string
     */
    public function render(string $original, bool $escape = true): string
    {
        return $this->execute($original, $this->executor($escape));
    }

    /**
     * @param bool $escape
     * @return \Closure
     */
    private function executor(bool $escape): \Closure
    {
        $renderer = new GithubFlavoredMarkdownConverter([], $this->factory->create($escape));

        return function (string $source) use ($renderer): string {
            $result = $this->replaceAll(self::REPLACEMENTS_BEFORE, $source);

            $result = $renderer->convertToHtml($result);

            $result = $this->replaceAll(self::REPLACEMENTS_AFTER, $result);

            return $result;
        };
    }
}
