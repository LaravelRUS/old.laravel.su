<?php

namespace App\View\Modifications;

use Illuminate\Support\Str;
use Symfony\Component\DomCrawler\Crawler;

class HeaderLinksModifier extends HTMLModifier
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
            ->filter('h2,h3,h4,h5,h6')
            ->each(function (Crawler $elm) use (&$content) {

                /** @var \DOMElement $node */
                $node = $elm->getNode(0);

                $textContent = $node->textContent;
                $id = Str::slug($textContent);
                $tag = $node->nodeName;

                $content = Str::of($content)
                    ->replace($elm->outerHtml(), "<$tag><a href='#$id' id='$id'>$textContent</a></$tag>");
            });

        return $next($content);
    }
}
