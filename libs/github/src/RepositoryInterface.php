<?php

declare(strict_types=1);

namespace App\GitHub;

use Illuminate\Support\Enumerable;

interface RepositoryInterface
{
    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return string
     */
    public function getUser(): string;

    /**
     * @return Enumerable|BranchInterface[]
     */
    public function getBranches(): Enumerable;
}
