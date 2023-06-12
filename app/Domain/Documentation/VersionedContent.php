<?php

declare(strict_types=1);

namespace App\Domain\Documentation;

abstract class VersionedContent extends Content
{
    protected ?SourceVersionId $commit = null;

    public function getVersionId(): ?SourceVersionId
    {
        return $this->commit;
    }

    /**
     * @param SourceVersionId|non-empty-string $commit
     */
    public function update(string $content, SourceVersionId|string $commit): self
    {
        if (\is_string($commit)) {
            $commit = new SourceVersionId($commit);
        }

        $this->clear();
        $this->source = $content;
        $this->commit = $commit;

        return $this;
    }

    /**
     * @param SourceVersionId|non-empty-string $commit
     */
    public function isVersionedBy(SourceVersionId|string $commit): bool
    {
        if ($this->commit === null) {
            return false;
        }

        if ($commit instanceof SourceVersionId) {
            return $commit->equals($this->commit);
        }

        return \in_array($commit, [
            $this->commit->toFullString(),
            $this->commit->toShortString(),
            $this->commit->toBinaryString(),
        ], true);
    }
}
