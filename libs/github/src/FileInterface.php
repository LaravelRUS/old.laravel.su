<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

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
