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
use League\CommonMark\Extension\CommonMark\Node\Block\ListItem;
use League\CommonMark\Extension\ExtensionInterface;
use League\CommonMark\Node\Node;

final class MenuTitlesNormalizer implements ExtensionInterface
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

        foreach ($document->iterator() as $list) {
            if ($list instanceof ListItem) {
                $list->replaceChildren([...$this->filterListItems($list)]);
            }
        }
    }

    /**
     * @param ListItem $list
     * @return iterable<Node>
     */
    private function filterListItems(ListItem $list): iterable
    {
        foreach ($list->children() as $child) {
            if ($child instanceof Heading) {
                yield from $child->children();

                continue;
            }

            yield $child;
        }
    }
}
