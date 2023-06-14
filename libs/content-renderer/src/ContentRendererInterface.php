<?php

declare(strict_types=1);

namespace App\ContentRenderer;

interface ContentRendererInterface
{
    /**
     * @param string $markdown
     * @return ResultInterface
     */
    public function render(string $markdown): ResultInterface;
}
