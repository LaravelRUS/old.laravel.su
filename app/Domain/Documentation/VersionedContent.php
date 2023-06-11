<?php

declare(strict_types=1);

namespace App\Domain\Documentation;

abstract class VersionedContent extends Content
{
    /**
     * @var non-empty-string|null
     */
    public ?string $commit = null;

    /**
     * @param non-empty-string $commit
     */
    public function update(?string $content, string $commit): self
    {
        $this->rendered = null;
        $this->source = $content;
        $this->commit = $commit;

        return $this;
    }

    /**
     * @param non-empty-string $commit
     */
    public function isActual(string $commit): bool
    {
        return $this->commit === $commit;
    }
}
