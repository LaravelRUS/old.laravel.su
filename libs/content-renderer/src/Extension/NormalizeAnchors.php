<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\ContentRenderer\Extension;

use League\CommonMark\Environment\EnvironmentBuilderInterface;
use League\CommonMark\Event\DocumentParsedEvent;
use League\CommonMark\Extension\CommonMark\Node\Block\Heading;
use League\CommonMark\Extension\CommonMark\Node\Inline\HtmlInline;
use League\CommonMark\Extension\ExtensionInterface;
use League\CommonMark\Node\Block\Paragraph;
use League\CommonMark\Node\Node;

final class NormalizeAnchors implements ExtensionInterface
{
    /**
     * @param EnvironmentBuilderInterface $environment
     * @return void
     */
    public function register(EnvironmentBuilderInterface $environment): void
    {
        $environment->addEventListener(DocumentParsedEvent::class, $this, -50);
    }

    /**
     * @param DocumentParsedEvent $e
     * @return void
     */
    public function __invoke(DocumentParsedEvent $e): void
    {
        $document = $e->getDocument();

        $document->replaceChildren([
            ...$this->unwrapAnchors($document->children()),
        ]);
    }

    /**
     * @param iterable<Node> $nodes
     * @return iterable<Node>
     */
    private function unwrapAnchors(iterable $nodes): iterable
    {
        foreach ($nodes as $i => $anchor) {
            // Ignore non-paragraph nodes
            if (! $anchor instanceof Paragraph) {
                yield $anchor;
                continue;
            }

            // Lookup html tags like "<a name='xxx'></a>"
            $anchorName = $this->fetchAnchorLink($anchor);

            // Ignore non-html anchors
            if ($anchorName === null) {
                yield $anchor;
                continue;
            }

            $title = $nodes[$i + 1] ?? null;
            // Check that next tag like "H2" header and wrap content
            // into anchor link.
            if ($title instanceof Heading) {
                $title->prependChild(new HtmlInline(\sprintf('<a rel="nofollow" href="#%s">', $anchorName)));
                $title->appendChild(new HtmlInline('</a>'));
            }

            // Unwrap "<a name='xxx'>" and "</a>"
            yield from [
                new HtmlInline(\sprintf('<a id="%s" rel="nofollow" class="anchor">', $anchorName)),
                new HtmlInline('</a>'),
            ];
        }
    }

    /**
     * @param Paragraph $paragraph
     * @return non-empty-string|null
     */
    private function fetchAnchorLink(Paragraph $paragraph): ?string
    {
        $last = $paragraph->lastChild();
        if (!$last instanceof HtmlInline || $last->getLiteral() !== '</a>') {
            return null;
        }

        $first = $paragraph->firstChild();
        if (
            $first instanceof HtmlInline
            && $first !== $last
            && \str_starts_with($first->getLiteral(), '<a name')
        ) {
            return $this->fetchTagName($first, $last);
        }

        return null;
    }

    /**
     * @param HtmlInline $open
     * @param HtmlInline $close
     * @return non-empty-string|null
     */
    private function fetchTagName(HtmlInline $open, HtmlInline $close): ?string
    {
        $html = @\simplexml_load_string($open->getLiteral() . $close->getLiteral());

        if ($html->getName() === 'a') {
            return ($html['name'] ? (string)$html['name'] : null) ?: null;
        }

        return null;
    }
}