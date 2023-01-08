<?php

declare(strict_types=1);

namespace App\ContentRenderer\Extension;

use League\CommonMark\Environment\EnvironmentBuilderInterface;
use League\CommonMark\Event\DocumentParsedEvent;
use League\CommonMark\Extension\CommonMark\Node\Block\BlockQuote;
use League\CommonMark\Extension\ExtensionInterface;
use League\CommonMark\Node\Inline\Text;

final class QuotesFormatter implements ExtensionInterface
{
    /**
     * @var string
     */
    private const PCRE_PREFIX = '/^\h*\{(\w+)\}/isum';

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
            if ($node instanceof BlockQuote) {
                $this->modifyQuote($node);
            }
        }
    }

    /**
     * @param BlockQuote $quote
     * @return void
     */
    private function modifyQuote(BlockQuote $quote): void
    {
        foreach ($quote->children() as $paragraph) {
            $content = $paragraph->firstChild();

            if ($content instanceof Text) {
                $text = $content->getLiteral();

                $text = @\preg_replace_callback(self::PCRE_PREFIX, function (array $info) use ($quote): string {
                    $classes = $quote->data->has('attributes/class')
                        ? \explode(' ', $quote->data->get('attributes/class'))
                        : [];

                    $classes[] = 'quote-' . $info[1];

                    $quote->data->set('attributes/class', \implode(' ', $classes));

                    return '';
                }, $text) ?: $text;

                $content->setLiteral($text);
            }
        }
    }
}
