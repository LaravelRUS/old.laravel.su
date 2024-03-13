<?php

namespace App\View\Modifications;

use Symfony\Component\DomCrawler\Crawler;

class HTMLCleanseModifier extends HTMLModifier
{
    /**
     * @param string   $content The HTML content to be modified.
     * @param \Closure $next    The next method in the middleware pipeline.
     *
     * @return mixed The modified HTML content.
     */
    public function handle(string $content, \Closure $next)
    {
        $crawler = new Crawler();
        $crawler->addHtmlContent(mb_convert_encoding($content, 'UTF-8'));
        $content = $crawler->filterXpath('//body')->first()->html();

        return $next($content);
    }
}
