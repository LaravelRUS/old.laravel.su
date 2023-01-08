<?php

declare(strict_types=1);

namespace App\ContentRenderer\Extension;

use League\CommonMark\Environment\EnvironmentBuilderInterface;
use League\CommonMark\Event\DocumentParsedEvent;
use League\CommonMark\Extension\CommonMark\Node\Block\HtmlBlock;
use League\CommonMark\Extension\ExtensionInterface;
use League\CommonMark\Node\Node;

final class RemoveStyleTags implements ExtensionInterface
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
            ...$this->filterEmptyParagraphs($document->children())
        ]);
    }

    /**
     * @param iterable<Node> $nodes
     * @return iterable<Node>
     */
    private function filterEmptyParagraphs(iterable $nodes): iterable
    {
        foreach ($nodes as $node) {
            if (
                $node instanceof HtmlBlock
                && \str_starts_with(\trim($node->getLiteral()), '<style')
            ) {
                continue;
            }

            yield $node;
        }
    }
}
