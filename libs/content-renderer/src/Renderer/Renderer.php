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

abstract class Renderer implements ContentRendererInterface
{
    /**
     * @var Dispatcher
     */
    private Dispatcher $dispatcher;

    /**
     * @param Dispatcher $dispatcher
     */
    public function __construct(Dispatcher $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    /**
     * @param string $source
     * @param \Closure $then
     * @return string
     */
    protected function execute(string $source, \Closure $then): string
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
     * @param string $result
     * @return void
     */
    protected function rendered(string $content, string $result): void
    {
        $this->dispatcher->dispatch(new Rendered($content, $result));
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
