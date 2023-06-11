<?php

declare(strict_types=1);

namespace App\Domain\Documentation;

use App\Domain\Shared\ValueObjectInterface;

abstract class VersionedContent extends Content
{
    /**
     * @var non-empty-string|null
     */
    protected ?string $commit = null;

    public function equals(ValueObjectInterface $object): bool
    {
        return $object === $this || (
            $object instanceof static && (
                ($object->commit !== null && $object->commit === $this->commit)
                || ($object->commit !== null && $object->source === $this->source)
            )
        );
    }

    /**
     * @return non-empty-string|null
     */
    public function getVersionId(): ?string
    {
        return $this->commit;
    }

    /**
     * @param non-empty-string|null $commit
     */
    public function update(?string $content, ?string $commit): self
    {
        $this->clear();

        $this->source = $content;
        $this->commit = $commit ?: null;

        return $this;
    }

    /**
     * @param non-empty-string $commit
     */
    public function isVersionedBy(string $commit): bool
    {
        return $this->commit === $commit;
    }
}
