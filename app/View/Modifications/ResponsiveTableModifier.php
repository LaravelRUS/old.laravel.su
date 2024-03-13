<?php

namespace App\View\Modifications;

use Illuminate\Support\Str;
use Symfony\Component\DomCrawler\Crawler;

class ResponsiveTableModifier extends HTMLModifier
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
            ->filter('table')
            ->each(function (Crawler $elm) use (&$content) {
                $tag = $elm->outerHtml();

                $content = Str::of($content)->replace($tag, '<div class="table-responsive mb-3">'.$tag.'</div>');
            });

        return $next($content);
    }
}
