<?php

namespace App\View\Modifications;

use Illuminate\Support\Str;
use Symfony\Component\DomCrawler\Crawler;

class ImageAltModifier extends HTMLModifier
{
    /**
     * @param string   $content The HTML content to be modified.
     * @param \Closure $next    The next method in the middleware pipeline.
     *
     * @return mixed The modified HTML content.
     */
    public function handle(string $content, \Closure $next)
    {
        $this->crawler($content)
            ->filter('img')
            ->each(function (Crawler $elm) use (&$content) {

                $imgTag = $elm->outerHtml();
                $alt = $elm->attr('alt');

                $content = Str::of($content)
                    ->replace($imgTag, sprintf('<picture alt="%s">%s</picture>', $alt, $imgTag))
                    ->toString();
            });

        return $next($content);
    }
}
