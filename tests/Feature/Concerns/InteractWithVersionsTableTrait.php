<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Tests\Feature\Concerns;

use App\Infrastructure\Persistence\Doctrine\Repository\VersionRepository;
use Illuminate\Contracts\Container\BindingResolutionException;


trait InteractWithVersionsTableTrait
{
    /**
     * @var VersionRepository
     */
    protected VersionRepository $repository;

    /**
     * @return void
     * @throws BindingResolutionException
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->repository = $this->make(VersionRepository::class);
    }

    /**
     * @return $this
     */
    private function withDocumentationPages(): self
    {
        $this->fillTable('docs', $this->getConnection()
            ->table('versions')
            ->get()
            ->mapWithKeys(fn(object $data) => [
                ['version_id' => $data->id, 'page' => 'documentation'],
                ['version_id' => $data->id, 'page' => 'installation'],
            ])
            ->toArray()
        );

        return $this;
    }

    /**
     * @return $this
     */
    private function withoutDocumentationPages(): self
    {
        $this->fillTable('docs', []);

        return $this;
    }

    /**
     * @param array $versions
     * @return $this
     */
    private function withVersions(array $versions = []): self
    {
        return $this->fillTable('versions', $versions)
            ->withoutDocumentationPages()
        ;
    }
}
