<?php

declare(strict_types=1);

namespace App\Domain\Documentation;

abstract class VersionedContent extends Content
{
    protected ?ContentVersionId $commit = null;

    public function getVersionId(): ?ContentVersionId
    {
        return $this->commit;
    }

    /**
     * @param ContentVersionId|non-empty-string $commit
     */
    public function update(string $content, ContentVersionId|string $commit): self
    {
        if (\is_string($commit)) {
            $commit = new ContentVersionId($commit);
        }

        $this->clear();
        $this->source = $content;
        $this->commit = $commit;

        return $this;
    }

    /**
     * @param ContentVersionId|non-empty-string $commit
     */
    public function isVersionedBy(ContentVersionId|string $commit): bool
    {
        if ($this->commit === null) {
            return false;
        }

        if ($commit instanceof ContentVersionId) {
            return $commit->equals($this->commit);
        }

        return \in_array($commit, [
            $this->commit->toFullString(),
            $this->commit->toShortString(),
            $this->commit->toBinaryString(),
        ], true);
    }
}
