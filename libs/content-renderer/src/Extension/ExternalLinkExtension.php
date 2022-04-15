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
use League\CommonMark\Extension\CommonMark\Node\Inline\Link;
use League\CommonMark\Extension\ExtensionInterface;

final class ExternalLinkExtension implements ExtensionInterface
{
    /**
     * @param array<non-empty-string> $external
     * @param non-empty-string $reference
     * @param string $class
     */
    public function __construct(
        private readonly array $external,
        private string $reference,
        private readonly string $class = '',
    ) {
        $this->reference = \rtrim($this->reference, '/');
    }

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

        foreach ($document->iterator() as $node) {
            if ($node instanceof Link) {
                $this->modifyLink($node);
            }
        }
    }

    /**
     * @param Link $link
     * @return void
     */
    private function modifyLink(Link $link): void
    {
        $url = $link->getUrl();

        foreach ($this->external as $prefix) {
            if (\str_starts_with($url, $prefix)) {
                $this->modifyExternalLink($link);

                return;
            }
        }
    }

    /**
     * @param Link $link
     * @return bool
     */
    private function isAbsolute(Link $link): bool
    {
        $url = $link->getUrl();

        foreach (['http://', 'https://', '//'] as $host) {
            if (\str_starts_with($url, $host)) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param Link $link
     * @return void
     */
    private function modifyExternalLink(Link $link): void
    {
        if (!$this->isAbsolute($link)) {
            $url = $this->reference . '/' . \ltrim($link->getUrl(), '/');

            $link->setUrl($url);
        }

        $link->data->set('external', true);
        $link->data->set('attributes/target', '_blank');

        if ($this->class) {
            $link->data->set('attributes/class', $this->class);
        }
    }
}