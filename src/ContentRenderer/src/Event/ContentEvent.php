<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\ContentRenderer\Event;

/**
 * Class ContentEvent
 */
abstract class ContentEvent
{
    /**
     * @var string
     */
    protected string $content;

    /**
     * @var string
     */
    protected string $version;

    /**
     * Rendering constructor.
     *
     * @param string $version
     * @param string $content
     */
    public function __construct(string $version, string $content)
    {
        $this->content = $content;
        $this->version = $version;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @return string
     */
    public function getVersion(): string
    {
        return $this->version;
    }
}
