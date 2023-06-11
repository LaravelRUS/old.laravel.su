<?php

declare(strict_types=1);

namespace App\Domain\Documentation;

use App\Domain\Documentation\Translation\Status;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Embeddable]
class Translation extends Source
{
    /**
     * @var int
     */
    private const DIFF_NO_TRANSLATION = -1;

    /**
     * @var non-empty-string|null
     */
    #[ORM\Column(name: 'commit_target', type: 'string', length: 191)]
    public ?string $targetCommit;

    /**
     * @var int
     */
    #[ORM\Column(name: 'commit_diff', type: 'integer')]
    public int $diff = self::DIFF_NO_TRANSLATION;

    /**
     * @param string|null $content
     * @param non-empty-string $commit
     * @return $this
     */
    public function update(?string $content, string $commit): self
    {
        if ($content) {
            $this->updateTargetCommitFromContent($content);
        }

        return parent::update($content, $commit);
    }

    /**
     * @return Status
     */
    public function getStatus(): Status
    {
        return match (true) {
            $this->diff < 0 => Status::MISSING,
            $this->diff === 0 => Status::ACTUAL,
            $this->diff < 10 => Status::BEHIND,
            default => Status::FAR_BEHIND,
        };
    }

    /**
     * @param int $changes
     * @return $this
     */
    public function withDiff(int $changes): self
    {
        $this->diff = $changes;

        return $this;
    }

    /**
     * @param string $content
     * @return void
     */
    private function updateTargetCommitFromContent(string $content): void
    {
        \preg_match('/^git ([a-z0-9]+)\n/ium', $content, $matches);

        if (\count($matches)) {
            $this->targetCommit = $matches[1];
        }
    }
}
