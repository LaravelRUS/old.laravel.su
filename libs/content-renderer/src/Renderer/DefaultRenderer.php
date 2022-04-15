<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\ContentRenderer\Renderer;

use App\ContentRenderer\Result;
use App\ContentRenderer\ResultInterface;
use Illuminate\Contracts\Events\Dispatcher;
use League\CommonMark\ConverterInterface;
use League\CommonMark\GithubFlavoredMarkdownConverter;

class DefaultRenderer extends Renderer
{
    /**
     * @var ConverterInterface
     */
    private readonly ConverterInterface $converter;

    /**
     * @param Dispatcher $dispatcher
     */
    public function __construct(Dispatcher $dispatcher)
    {
        $this->converter = new GithubFlavoredMarkdownConverter([
            'html_input' => 'strip',
            'allow_unsafe_links' => false,
        ]);

        parent::__construct($dispatcher);
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
}
