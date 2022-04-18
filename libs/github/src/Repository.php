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
use Github\Client;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Collection;
use Illuminate\Support\Enumerable;
use Illuminate\Support\LazyCollection;

final class Repository implements InteractWithApiInterface, RepositoryInterface, Arrayable
{
    use ApiTrait;

    /**
     * @var string
     */
    private string $user;

    /**
     * @var string
     */
    private string $name;

    /**
     * @var array|null
     */
    private ?array $branches = null;

    /**
     * Repository constructor.
     *
     * @param Client $client
     * @param string $user
     * @param string $repository
     */
    public function __construct(Client $client, string $user, string $repository)
    {
        $this->bootApiTrait($client);

        $this->user = $user;
        $this->name = $repository;
    }

    /**
     * @return Enumerable|BranchInterface[]
     */
    public function getBranches(): Enumerable
    {
        return Collection::make([
            ...$this->callBranchesApiMethod()
        ]);
    }

    /**
     * @return \Traversable|Branch[]
     */
    private function callBranchesApiMethod(): \Traversable
    {
        if ($this->branches === null) {
            $this->branches = $this->client->repository()
                ->branches($this->user, $this->name)
            ;
        }

        foreach ($this->branches as $branch) {
            yield new Branch($this, $branch['name'], $branch['commit']['sha']);
        }
    }

    /**
     * @return string
     */
    public function getUser(): string
    {
        return $this->user;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'user' => $this->user,
        ];
    }
}
