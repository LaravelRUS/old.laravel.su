<?php

namespace App\View\Modifications;

use Illuminate\Support\Str;
use Symfony\Component\DomCrawler\Crawler;

class BlockquoteModifier extends HTMLModifier
{
    protected array $types = [
        // docs-blockquote-note
        '{note}'                          => 'docs-blockquote-note', // for 8.x
        '<strong>Warning</strong>'        => 'docs-blockquote-note', // for 10.x
        '<strong>Предупреждение</strong>' => 'docs-blockquote-note',
        '[!WARNING]'                      => 'docs-blockquote-note', // for 10.x

        // docs-blockquote-tip
        '{tip}'                       => 'docs-blockquote-tip', // for 8.x
        '{video}'                     => 'docs-blockquote-tip', // for 8.x
        '<strong>Note</strong>'       => 'docs-blockquote-tip', // for 10.x
        '<strong>Примечание</strong>' => 'docs-blockquote-tip', // for 10.x
        '[!NOTE]'                     => 'docs-blockquote-tip', // for 10.x
    ];

    /**
     * Modify the HTML content by adding CSS classes to blockquote elements.
     *
     * @param string   $content The HTML content to be modified.
     * @param \Closure $next    The next method in the middleware pipeline.
     *
     * @return mixed The modified HTML content.
     */
    public function handle(string $content, \Closure $next)
    {
        $this->crawler($content)
            ->filter('blockquote')
            ->each(function (Crawler $elm) use (&$content) {
                $tag = $elm->outerHtml();

                $html = $tag;

                collect($this->types)
                    ->filter(fn (string $class, string $fragment) => Str::of($tag)->contains($fragment))
                    ->each(function (string $class, string $fragment) use ($tag, &$html) {
                        $html = Str::of($tag)
                            ->replace('<blockquote>', '<blockquote class="'.$class.'"><div>')
                            ->replace('</blockquote>', '</div></blockquote>')
                            ->remove($fragment);
                    });

                $content = Str::of($content)->replace($tag, $html);
            });

        $this->crawler($content)
            ->filter('blockquote p')
            ->each(function (Crawler $elm) use (&$content) {
                $tag = $elm->outerHtml();

                $html = Str::of($tag)->between('<p>', '</p>')->replace('<br>', PHP_EOL)->trim()->toString();
                $html = nl2br($html);

                $content = Str::of($content)->replace($tag, '<p>'.$html.'</p>');
            });

        return $next($content);
    }
}
