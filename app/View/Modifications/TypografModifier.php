<?php

namespace App\View\Modifications;

use Illuminate\Support\Str;
use JoliTypo\Fixer;
use Symfony\Component\DomCrawler\Crawler;

class TypografModifier extends HTMLModifier
{
    /**
     * @param string   $content The HTML content to be modified.
     * @param \Closure $next    The next method in the middleware pipeline.
     *
     * @return mixed The modified HTML content.
     */
    public function handle(string $content, \Closure $next)
    {
        $fixer = new Fixer([
            'Ellipsis',
            'Dimension',
            'Unit',
            'Dash',
            'SmartQuotes',
            'NoSpaceBeforeComma',
            'CurlyQuote',
            'Trademark',
        ]);

        $this->crawler($content)
            ->filter('p,li,blockquote')
            ->each(function (Crawler $elm) use ($fixer, &$content) {

                $html = $elm->html();

                $paragraph = $fixer->fix($html);

                $content = Str::of($content)->replace($html, $paragraph);
            });

        return $next($content);
    }
}
