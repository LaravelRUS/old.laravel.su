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
     * @return Enumerable<FileInterface>
     */
    public function getFiles(): Enumerable;
}
