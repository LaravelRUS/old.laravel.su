<?php

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
