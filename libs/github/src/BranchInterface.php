<?php

declare(strict_types=1);

namespace App\GitHub;

use Illuminate\Support\Enumerable;

interface BranchInterface extends SyncableInterface
{
    /**
     * @return RepositoryInterface
     */
    public function getRepository(): RepositoryInterface;

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return string
     */
    public function getCommit(): string;

    /**
     * @return Enumerable<array-key, FileInterface>
     */
    public function getFiles(): Enumerable;
}
