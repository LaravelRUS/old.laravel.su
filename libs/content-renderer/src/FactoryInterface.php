<?php

declare(strict_types=1);

namespace App\ContentRenderer;

interface FactoryInterface
{
    /**
     * @param Type|null $type
     * @return ContentRendererInterface
     */
    public function create(Type $type = null): ContentRendererInterface;
}
