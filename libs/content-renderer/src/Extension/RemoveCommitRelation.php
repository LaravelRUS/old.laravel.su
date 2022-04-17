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
use League\CommonMark\Extension\CommonMark\Node\Block\ThematicBreak;
use League\CommonMark\Extension\ExtensionInterface;
use League\CommonMark\Node\Block\Paragraph;
use League\CommonMark\Node\Inline\Text;
use League\CommonMark\Node\Node;

final class RemoveCommitRelation implements ExtensionInterface
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
            ...$this->filterNodes($document->children())
        ]);
    }

    /**
     * @param array<Node> $children
     * @return iterable
     */
    private function filterNodes(array $children): iterable
    {
        $skip = false;

        foreach ($children as $i => $child) {
            if ($skip === true) {
                $skip = false;
                continue;
            }

            if ($this->isGitLinkNode($child)) {
                if (($children[$i + 1] ?? null) instanceof ThematicBreak) {
                    $skip = true;
                }

                continue;
            }

            yield $child;
        }
    }

    /**
     * Returns {@see true} in case of node contains:
     * ```
     * <p>git 00112233445566778899aabbccddeeff</p>
     * ```
     *
     * Or {@see false} instead.
     *
     * @param Node $node
     * @return bool
     */
    private function isGitLinkNode(Node $node): bool
    {
        if ($node instanceof Paragraph) {
            foreach ($node->children() as $text) {
                if ($text instanceof Text && $this->isGitLink($text)) {
                    return true;
                }
            }
        }

        return false;
    }

    /**
     * @param Text $text
     * @return bool
     */
    private function isGitLink(Text $text): bool
    {
        $content = $text->getLiteral();

        return \str_starts_with($content, 'git ') && \strlen(\trim($content)) === 44;
    }
}
