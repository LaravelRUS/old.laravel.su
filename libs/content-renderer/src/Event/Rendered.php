<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\ContentRenderer\Event;

class Rendered extends ContentEvent
{
    /**
     * @var string
     */
    private string $result;

    /**
     * Rendered constructor.
     *
     * @param string $content
     * @param string $result
     */
    public function __construct(string $content, string $result)
    {
        $this->result = $result;

        parent::__construct($content);
    }

    /**
     * @return string
     */
    public function getResult(): string
    {
        return $this->result;
    }
}
