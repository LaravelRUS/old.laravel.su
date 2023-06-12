<?php

declare(strict_types=1);

namespace App\Domain\Documentation;

use App\Domain\Documentation\Translation\Status;

class Translation extends VersionedContent
{
    private const DIFF_NO_TRANSLATION = -1;

    /**
     * @var int<-1, max>
     */
    protected int $diff = self::DIFF_NO_TRANSLATION;

    protected ?TranslationVersionId $targetCommit = null;

    /**
     * @param SourceVersionId|non-empty-string $commit
     */
    public function update(string $content, SourceVersionId|string $commit): self
    {
        \preg_match('/^git ([a-z0-9]+)\n/ium', $content, $matches);

        if (\count($matches)) {
            $this->targetCommit = new TranslationVersionId($matches[1]);
        }

        return parent::update($content, $commit);
    }

    /**
     * @return TranslationVersionId|null
     */
    public function getTargetVersionId(): ?TranslationVersionId
    {
        return $this->targetCommit;
    }

    /**
     * @return int<0, max>
     */
    public function getChangesCount(): int
    {
        if ($this->diff <= self::DIFF_NO_TRANSLATION) {
            return 0;
        }

        return $this->diff;
    }

    public function getStatus(): Status
    {
        return match (true) {
            $this->diff < 0 => Status::MISSING,
            $this->diff === 0 => Status::ACTUAL,
            $this->diff < 10 => Status::BEHIND,
            default => Status::FAR_BEHIND,
        };
    }

    public function markAsNonTranslated(): void
    {
        $this->diff = self::DIFF_NO_TRANSLATION;
    }

    /**
     * @param int<0, max> $changes
     */
    public function applyTranslateChanges(int $changes): void
    {
        $this->diff = $changes;
    }

    public function __toString(): string
    {
        return $this->rendered ?: $this->source ?? '';
    }
}
