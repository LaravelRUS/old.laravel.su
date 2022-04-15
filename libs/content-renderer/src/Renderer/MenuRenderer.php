<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\ContentRenderer\Renderer;

use App\ContentRenderer\Extension\ExternalLinkExtension;
use App\ContentRenderer\Result;
use App\ContentRenderer\ResultInterface;
use Illuminate\Contracts\Events\Dispatcher;
use League\CommonMark\ConverterInterface;
use League\CommonMark\GithubFlavoredMarkdownConverter;

class MenuRenderer extends Renderer
{
    /**
     * @var ConverterInterface
     */
    private readonly ConverterInterface $converter;

    /**
     * TODO #1 Should it been moved into configuration file?
     *
     * @var array<non-empty-string>
     */
    private const EXTERNAL_LINKS = [
        '/api',
    ];

    /**
     * TODO #2 Should it been moved into configuration file?
     *
     * @var non-empty-string
     */
    private const EXTERNAL_URL = 'https://laravel.com';

    /**
     * TODO #3 Should it been moved into configuration file?
     *
     * @var non-empty-string
     */
    private const EXTERNAL_LINK_CLASS = 'documentation-menu-external-link';

    /**
     * @param Dispatcher $dispatcher
     */
    public function __construct(
        Dispatcher $dispatcher,
    ) {
        $this->converter = new GithubFlavoredMarkdownConverter([
            'html_input' => 'strip',
            'allow_unsafe_links' => false,
        ]);

        $environment = $this->converter->getEnvironment();
        $environment->addExtension(new ExternalLinkExtension(
            self::EXTERNAL_LINKS,
            self::EXTERNAL_URL,
            self::EXTERNAL_LINK_CLASS,
        ));

        parent::__construct($dispatcher);
    }

    /**
     * {@inheritDoc}
     */
    public function render(string $original): ResultInterface
    {
        return $this->execute($original, function (string $content): ResultInterface {
            // Before
            $content = $this->normalizeTitles($content);

            $result = $this->converter->convert($content);

            return new Result($result->getContent());
        });
    }

    /**
     * Replaces menu title like:
     * ```
     * - ## Prologue
     *     - [Release Notes](/docs/{{version}}/releases)
     * ```
     *
     * Into "normal" form:
     * ```
     * - Prologue
     *     - [Release Notes](/docs/{{version}}/releases)
     * ```
     *
     * @param string $content
     * @return string
     */
    private function normalizeTitles(string $content): string
    {
        return \str_replace('- ## ', '- ', $content);
    }
}
