<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\GitHub;

use App\GitHub\Common\ApiTrait;
use App\GitHub\Common\InteractWithApiInterface;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Enumerable;
use Illuminate\Support\LazyCollection;

/**
 * Class Branch
 */
final class Branch implements InteractWithApiInterface, BranchInterface, Arrayable
{
    use ApiTrait;

    /**
     * @var string
     */
    private string $name;

    /**
     * @var string
     */
    private string $commit;

    /**
     * @var Repository
     */
    private Repository $repository;

    /**
     * @var array|null
     */
    private ?array $files = null;

    /**
     * Version constructor.
     *
     * @param Repository $repository
     * @param string $name
     * @param string $commit
     */
    public function __construct(Repository $repository, string $name, string $commit)
    {
        $this->bootFromApiInteractor($repository);

        $this->repository = $repository;

        $this->name = $name;
        $this->commit = $commit;
    }

    /**
     * @return Enumerable|File[]
     */
    public function getFiles(): Enumerable
    {
        return LazyCollection::make(
            $this->callFilesApiMethod()
        );
    }

    /**
     * @return \Traversable|File[]
     */
    private function callFilesApiMethod(): \Traversable
    {
        if ($this->files === null) {
            $this->files = $this->client->git()
                ->trees()
                ->show(
                    $this->repository->getUser(),
                    $this->repository->getName(),
                    $this->commit,
                    true
                )
            ;
        }

        foreach ($this->files['tree'] ?? [] as $file) {
            yield File::fromArray($this, $file);
        }
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getCommit(): string
    {
        return $this->commit;
    }

    /**
     * @return RepositoryInterface
     */
    public function getRepository(): RepositoryInterface
    {
        return $this->repository;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'name'       => $this->name,
            'commit'     => $this->commit,
            'repository' => $this->repository->toArray(),
        ];
    }

    /**
     * @return bool
     */
    public function isSyncable(): bool
    {
        return \preg_match('/^\d+\.(?:\d|x)+$/ium', $this->name) > 0;
    }
}
