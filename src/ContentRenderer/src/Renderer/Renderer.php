<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\ContentRenderer\Renderer;

use App\ContentRenderer\Event\Rendered;
use App\ContentRenderer\Event\Rendering;
use Illuminate\Contracts\Events\Dispatcher;

/**
 * Class Renderer
 */
abstract class Renderer implements ContentRendererInterface
{
    /**
     * @var Dispatcher
     */
    private Dispatcher $dispatcher;

    /**
     * Renderer constructor.
     *
     * @param Dispatcher $dispatcher
     */
    public function __construct(Dispatcher $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    /**
     * @param string $version
     * @param string $source
     * @param \Closure $then
     * @return string
     */
    protected function execute(string $version, string $source, \Closure $then): string
    {
        $this->rendering($version, $source);

        $result = \str_replace('{{version}}', $version, $source);

        $result = $then($result);

        $this->rendered($version, $source, $result);

        return $result;
    }

    /**
     * @param string $version
     * @param string $content
     * @return void
     */
    protected function rendering(string $version, string $content): void
    {
        $this->dispatcher->dispatch(new Rendering($version, $content));
    }

    /**
     * @param string $version
     * @param string $content
     * @param string $result
     * @return void
     */
    protected function rendered(string $version, string $content, string $result): void
    {
        $this->dispatcher->dispatch(new Rendered($version, $content, $result));
    }

    /**
     * @param array|string[] $replacements
     * @param string $text
     * @return string
     */
    protected function replaceAll(array $replacements, string $text): string
    {
        foreach ($replacements as $pcre => $replacement) {
            $text = \preg_replace($pcre, $replacement, $text);
        }

        return $text;
    }
}
