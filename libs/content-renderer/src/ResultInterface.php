<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\ContentRenderer;

use App\ContentRenderer\Result\Heading;

interface ResultInterface extends \Stringable
{
    /**
     * Returns rendered HTML content of the markdown document.
     *
     * @return string
     */
    public function getContents(): string;

    /**
     * Returns navigation list of the markdown document.
     *
     * @return iterable<Heading>
     */
    public function getHeadings(): iterable;
}
