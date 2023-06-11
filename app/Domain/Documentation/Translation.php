<?php

declare(strict_types=1);

namespace App\Domain\Documentation;

use App\ContentRenderer\ContentRendererInterface;
use App\Domain\Documentation\Translation\Status;

class Translation extends VersionedContent
{
    private const DIFF_NO_TRANSLATION = -1;

    /**
     * @var int<-1, max>
     */
    public int $diff = self::DIFF_NO_TRANSLATION;

    /**
     * @var non-empty-string|null
     */
    public ?string $targetCommit = null;

    protected ?string $source = null;
    protected ?string $rendered = null;

    public function clear(): void
    {
        $this->rendered = null;
    }

    public function renderUsing(ContentRendererInterface $renderer): self
    {
        if ($this->source !== null) {
            $this->rendered = (string)$renderer->render($this->source);
        }

        return $this;
    }

    public function isRendered(): bool
    {
        return $this->rendered !== null;
    }

    /**
     * @param non-empty-string $commit
     */
    public function update(?string $content, string $commit): self
    {
        if ($content) {
            $this->updateTargetCommitFromContent($content);
        }

        return parent::update($content, $commit);
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

    public function withDiff(int $changes): self
    {
        $this->diff = $changes;

        return $this;
    }

    private function updateTargetCommitFromContent(string $content): void
    {
        \preg_match('/^git ([a-z0-9]+)\n/ium', $content, $matches);

        if (\count($matches)) {
            $this->targetCommit = $matches[1];
        }
    }

    public function __toString(): string
    {
        return $this->rendered ?: $this->source ?? '';
    }
}
