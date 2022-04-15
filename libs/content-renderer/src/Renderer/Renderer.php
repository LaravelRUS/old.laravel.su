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
use App\ContentRenderer\ResultInterface;
use Illuminate\Contracts\Events\Dispatcher;

abstract class Renderer implements ContentRendererInterface
{
    /**
     * @param Dispatcher $dispatcher
     */
    public function __construct(
        private readonly Dispatcher $dispatcher,
    ) {
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
