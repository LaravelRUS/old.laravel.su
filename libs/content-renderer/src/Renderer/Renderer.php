<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\ContentRenderer\Renderer;

use App\ContentRenderer\ContentRendererInterface;
use App\ContentRenderer\Event\Rendered;
use App\ContentRenderer\Event\Rendering;
use App\ContentRenderer\Result;
use App\ContentRenderer\Result\Heading;
use App\ContentRenderer\ResultInterface;
use Illuminate\Contracts\Events\Dispatcher as DispatcherInterface;
use League\CommonMark\Environment\Environment;
use League\CommonMark\Extension\CommonMark\Node\Block\Heading as HeadingNode;
use League\CommonMark\Extension\CommonMark\Node\Block\HtmlBlock;
use League\CommonMark\Extension\CommonMark\Node\Inline\Code;
use League\CommonMark\Extension\CommonMark\Node\Inline\HtmlInline;
use League\CommonMark\GithubFlavoredMarkdownConverter;
use League\CommonMark\Node\Block\Document as DocumentNode;
use League\CommonMark\Node\Inline\Text;
use League\CommonMark\Node\Node;
use League\CommonMark\Util\HtmlFilter;

abstract class Renderer implements ContentRendererInterface
{
    /**
     * @var array<non-empty-string, mixed>
     */
    private const DEFAULT_CONFIG = [
        'html_input'         => HtmlFilter::ESCAPE,
        'allow_unsafe_links' => false,
    ];

    /**
     * @var GithubFlavoredMarkdownConverter
     */
    protected readonly GithubFlavoredMarkdownConverter $converter;

    /**
     * @var Environment
     */
    protected readonly Environment $env;

    /**
     * @param array<non-empty-string, mixed> $config
     */
    public function __construct(array $config = [])
    {
        $this->converter = new GithubFlavoredMarkdownConverter([
            ...self::DEFAULT_CONFIG,
            ...$config,
        ]);

        $this->env = $this->converter->getEnvironment();
    }

    /**
     * {@inheritDoc}
     */
    public function render(string $markdown): ResultInterface
    {
        $result = $this->converter->convert($markdown);

        return new Result(
            content: $result->getContent(),
            navigation: $this->navigation($result->getDocument()),
        );
    }

    /**
     * @param DocumentNode $document
     * @return iterable<Heading>
     */
    private function navigation(DocumentNode $document): iterable
    {
        foreach ($document->iterator() as $node) {
            if ($node instanceof HeadingNode) {
                $text = $this->text($node);

                if ($text !== '') {
                    yield new Heading($text, $node->getLevel());
                }
            }
        }
    }

    /**
     * @param Node $node
     * @return string
     */
    private function text(Node $node): string
    {
        $result = [];

        foreach ($node->iterator() as $child) {
            $result[] = \trim(match (true) {
                $child instanceof Text,
                $child instanceof Code => $child->getLiteral(),
                $child instanceof HtmlInline,
                $child instanceof HtmlBlock => \strip_tags($child->getLiteral()),
                default => '',
            });
        }

        return \implode(' ', \array_filter($result));
    }
}
