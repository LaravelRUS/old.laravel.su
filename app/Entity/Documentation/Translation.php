<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Entity\Documentation;

use App\Entity\Documentation\Translation\Status;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Embeddable()
 */
class Translation extends Source
{
    /**
     * @var int
     */
    private const DIFF_NO_TRANSLATION = -1;

    /**
     * @ORM\Column(name="commit_target", type="string", length=191)
     *
     * @var string|null
     */
    public ?string $targetCommit;

    /**
     * @ORM\Column(name="commit_diff", type="integer")
     *
     * @var int
     */
    public int $diff = self::DIFF_NO_TRANSLATION;

    /**
     * @param string|null $content
     * @param string $commit
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
     * @return int
     */
    public function getStatus(): int
    {
        switch (true) {
            case $this->diff < 0:
                return Status::MISSING;

            case $this->diff === 0:
                return Status::ACTUAL;

            case $this->diff < 10:
                return Status::BEHIND;
        }

        return Status::FAR_BEHIND;
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
