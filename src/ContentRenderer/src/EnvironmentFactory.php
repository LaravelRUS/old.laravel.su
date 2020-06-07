<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\ContentRenderer;

use League\CommonMark\Block\Element\FencedCode;
use League\CommonMark\Block\Element\IndentedCode;
use League\CommonMark\Environment;
use League\CommonMark\EnvironmentInterface;
use Spatie\CommonMarkHighlighter\FencedCodeRenderer;
use Spatie\CommonMarkHighlighter\IndentedCodeRenderer;

/**
 * Class EnvironmentFactory
 */
class EnvironmentFactory
{
    /**
     * @var array
     */
    private array $config;

    /**
     * EnvironmentFactory constructor.
     *
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->config = $config;
    }

    /**
     * @param bool $escape
     * @return EnvironmentInterface
     */
    public function create(bool $escape = true): EnvironmentInterface
    {
        $env = Environment::createGFMEnvironment();
        $env->mergeConfig($this->config);

        if ($escape) {
            $env->mergeConfig(['html_input' => 'escape']);
        }

        $env->addBlockRenderer(FencedCode::class, new FencedCodeRenderer(['php', 'html']));
        $env->addBlockRenderer(IndentedCode::class, new IndentedCodeRenderer(['php', 'html']));

        return $env;
    }
}
