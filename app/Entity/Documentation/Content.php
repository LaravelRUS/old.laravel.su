<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Entity\Documentation;

use App\ContentRenderer\Renderer\ContentRendererInterface;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Embeddable]
abstract class Content
{
    /**
     * @var string|null
     */
    #[ORM\Column(name: 'source', type: 'text', nullable: true)]
    protected ?string $source = null;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'rendered', type: 'text', nullable: true)]
    protected ?string $rendered = null;

    /**
     * @return void
     */
    public function clear(): void
    {
        $this->rendered = null;
    }

    /**
     * @param ContentRendererInterface $renderer
     * @param bool $escape
     * @return $this
     */
    public function render(ContentRendererInterface $renderer, bool $escape = true): self
    {
        if ($this->source !== null) {
            $this->rendered = $renderer->render($this->source, $escape);
        }

        return $this;
    }

    /**
     * @return bool
     */
    public function isRendered(): bool
    {
        return $this->rendered !== null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->rendered ?: $this->source ?? '';
    }
}
