<?php

namespace App\View\Modifications;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Str;
use Symfony\Component\DomCrawler\Crawler;

class BladeComponentModifier extends HTMLModifier
{
    /**
     * @param string   $content The HTML content to be modified.
     * @param \Closure $next    The next method in the middleware pipeline.
     *
     * @return mixed The modified HTML content.
     */
    public function handle(string $content, \Closure $next)
    {
        $this->crawler($content)->filter('x-docs-banner, x-github, x-youtube')->each(function (Crawler $elm) use (&$content) {
            $tag = $elm->outerHtml();

            // need normalizing to close tag
            $content = $this->crawler($content)->filterXpath('//body')->first()->html();

            $content = Str::of($content)
                ->replace($tag, Blade::render($tag));
        });


        return $next($content);
    }
}
