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
use App\ContentRenderer\ResultInterface;
use Illuminate\Contracts\Events\Dispatcher;
use League\CommonMark\Environment\Environment;
use League\CommonMark\GithubFlavoredMarkdownConverter;
use League\CommonMark\Util\HtmlFilter;
use League\Config\ConfigurationInterface;

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
     * @param Dispatcher $dispatcher
     * @param array $config
     */
    public function __construct(
        private readonly Dispatcher $dispatcher,
        array $config = [],
    ) {
        $this->converter = new GithubFlavoredMarkdownConverter([
            ...self::DEFAULT_CONFIG,
            ...$config,
        ]);

        $this->env = $this->converter->getEnvironment();
    }

    /**
     * {@inheritDoc}
     */
    public function render(string $original): ResultInterface
    {
        return $this->execute($original, function (string $content): ResultInterface {
            $result = $this->converter->convert($content);

            return new Result($result->getContent());
        });
    }

    /**
     * @template TInput of string
     * @template TOutput of ResultInterface
     *
     * @param TInput $source
     * @param \Closure(TInput):TOutput $then
     * @return TOutput
     */
    protected function execute(string $source, \Closure $then): ResultInterface
    {
        $this->rendering($source);

        $result = $then($source);

        $this->rendered($source, $result);

        return $result;
    }

    /**
     * @param string $content
     * @return void
     */
    protected function rendering(string $content): void
    {
        $this->dispatcher->dispatch(new Rendering($content));
    }

    /**
     * @param string $content
     * @param ResultInterface $result
     * @return void
     */
    protected function rendered(string $content, ResultInterface $result): void
    {
        $this->dispatcher->dispatch(new Rendered($content, $result));
    }
}
