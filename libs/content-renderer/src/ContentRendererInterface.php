<?php

/**
 * This file is part of laravel.su package.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\ContentRenderer;

interface ContentRendererInterface
{
    /**
     * @param string $original
     * @return ResultInterface
     */
    public function render(string $original): ResultInterface;
}
