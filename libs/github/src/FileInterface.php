<?php

declare(strict_types=1);

namespace App\GitHub;

use Illuminate\Support\Enumerable;

/**
 * @mixin \SplFileInfo
 */
interface FileInterface extends SyncableInterface
{
    /**
     * @return string
     */
    public function getCommit(): string;

    /**
     * @return Enumerable
     */
    public function getHistory(): Enumerable;

    /**
     * @return BranchInterface
     */
    public function getBranch(): BranchInterface;

    /**
     * @return string
     */
    public function getUrn(): string;

    /**
     * @return string
     */
    public function getContents(): string;

    /**
     * @return string
     */
    public function getTitle(): string;
}
