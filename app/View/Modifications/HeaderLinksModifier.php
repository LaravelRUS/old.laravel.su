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
                    ->replace($elm->outerHtml(), sprintf('<%s><a href="#%s" id="%s">%s</a></%s>', $tag, $id, $id, $textContent, $tag));
            });

        $this->crawler($content)
            ->filter('p > a:not([href])')
            ->each(function (Crawler $elm) use (&$content) {

                /** @var \DOMElement $pTag */
                $pTag = $elm->getNode(0)->parentNode;

                /** @var \DOMElement $pTag */
                $nextSibling = $pTag->nextSibling;

                while ($nextSibling) {
                    if ($nextSibling instanceof \DOMElement) {
                        break;
                    }
                    $nextSibling = $nextSibling->nextSibling;
                }

                if ($nextSibling === null) {
                    return;
                }

                $idValue = Str::of($elm->outerHtml())->between('name="', '"');

                $oldSiblingHtml = $nextSibling->ownerDocument->saveHTML($nextSibling);
                $nextSibling->setAttribute('id', $idValue);
                $newSiblingHtml = $nextSibling->ownerDocument->saveHTML($nextSibling);

                $content = Str::of($content)
                    ->replace($oldSiblingHtml, $newSiblingHtml)
                    ->replace($pTag->ownerDocument->saveHTML($pTag), '');
            });

        return $next($content);
    }
}
