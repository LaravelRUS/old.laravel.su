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
use App\Entity\Version;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Embeddable]
class Source extends Content
{
    /**
     * @var string|null
     */
    #[ORM\Column(name: 'commit', type: 'string', length: 191, nullable: true)]
    public ?string $commit = null;

    /**
     * @param Version $version
     * @param ContentRendererInterface $renderer
     * @param bool $escape
     * @return $this
     */
    public function renderWithVersion(Version $version, ContentRendererInterface $renderer, bool $escape = true): self
    {
        if ($this->source !== null) {
            $rendered = \str_replace('{{version}}', $version->name, $this->source);

            $this->rendered = $renderer->render($rendered, $escape);
        }

        return $this;
    }

    /**
     * @param string|null $content
     * @param string $commit
     * @return $this
     */
    public function update(?string $content, string $commit): self
    {
        $this->rendered = null;
        $this->source = $content;
        $this->commit = $commit;

        return $this;
    }

    /**
     * @param string $commit
     * @return bool
     */
    public function isActual(string $commit): bool
    {
        return $this->commit === $commit;
    }
}
