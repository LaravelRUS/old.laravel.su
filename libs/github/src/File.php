<?php

declare(strict_types=1);

namespace App\GitHub;

use App\GitHub\Common\ApiTrait;
use App\GitHub\Common\InteractWithApiInterface;
use Github\HttpClient\Message\ResponseMediator;
use Http\Client\Exception;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Collection;
use Illuminate\Support\Enumerable;
use Illuminate\Support\Str;
use Psr\Http\Message\ResponseInterface;

/**
 * @template-implements Arrayable<non-empty-string, mixed>
 */
class File extends \SplFileInfo implements InteractWithApiInterface, FileInterface, Arrayable
{
    use ApiTrait;

    /**
     * @var string[]
     */
    private const NON_DOCUMENTATION_PAGES = [
        'readme.md',
        'license.md',
    ];

    /**
     * @var string
     */
    private const URI_DOWNLOAD = 'https://raw.githubusercontent.com/%s/%s/%s/%s';

    /**
     * @var string
     */
    private const URI_COMMITS = '/repos/%s/%s/commits';

    /**
     * @var Branch
     */
    private Branch $branch;

    /**
     * @var string|null
     */
    private ?string $commit = null;

    /**
     * @var string|null
     */
    private ?string $content = null;

    /**
     * @var string|null
     */
    private ?string $title = null;

    /**
     * @var array|null
     */
    private ?array $commitData = null;

    /**
     * File constructor.
     *
     * @param Branch $branch
     * @param string $pathname
     */
    public function __construct(Branch $branch, string $pathname)
    {
        $this->bootFromApiInteractor($branch);

        $this->branch = $branch;

        parent::__construct($pathname);
    }

    /**
     * @param Branch $branch
     * @param array $payload
     * @return static
     */
    public static function fromArray(Branch $branch, array $payload): self
    {
        return new static($branch, $payload['path']);
    }

    /**
     * @return bool
     */
    public function isSyncable(): bool
    {
        $name = Str::lower($this->getPathname());

        return $this->getExtension() === 'md' &&
            ! \in_array($name, self::NON_DOCUMENTATION_PAGES, true);
    }

    /**
     * @return BranchInterface
     */
    public function getBranch(): BranchInterface
    {
        return $this->branch;
    }

    /**
     * {@inheritDoc}
     */
    public function toArray(): array
    {
        return [
            'title'   => $this->getTitle(),
            'uri'     => $this->getUri(),
            'urn'     => $this->getUrn(),
            'content' => $this->content,
            'branch'  => $this->branch->toArray(),
        ];
    }

    /**
     * @return string
     * @throws Exception
     */
    public function getCommit(): string
    {
        if ($this->commit === null) {
            $history = $this->callApiGetCommitsMethod();
            $last = $history->current();

            $this->commit = $last['sha'];
        }

        return $this->commit;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        if ($this->title === null) {
            \preg_match('/^#\h+[^\n]+/ium', $this->getContents(), $matches);

            $this->title = \trim($matches[0] ?? Str::studly($this->getUrn()), '# ');
        }

        return $this->title;
    }

    /**
     * @return string
     */
    public function getContents(): string
    {
        return $this->content ??= \file_get_contents($this->getUri());
    }

    /**
     * @return string
     */
    private function getUri(): string
    {
        return \vsprintf(self::URI_DOWNLOAD, [
            $this->branch->getRepository()->getUser(),
            $this->branch->getRepository()->getName(),
            $this->branch->getCommit(),
            $this->getPathname(),
        ]);
    }

    /**
     * @return string
     */
    public function getUrn(): string
    {
        return \basename($this->getPathname(), '.' . $this->getExtension());
    }

    /**
     * @return Enumerable<array-key, mixed>
     * @throws Exception
     */
    public function getHistory(): Enumerable
    {
        return Collection::make($this->callApiGetCommitsMethod());
    }

    /**
     * @return \Generator<array-key, mixed>
     * @throws Exception
     */
    private function callApiGetCommitsMethod(): \Generator
    {
        $repository = $this->branch->getRepository();

        $next = 1;

        do {
            $response = $this->client->getHttpClient()
                ->get($this->getApiGetCommitsUri($repository, $page = $next))
            ;

            $next = $this->pagination($page, $response);

            foreach (ResponseMediator::getContent($response) as $data) {
                yield $data;
            }
        } while ($next !== $page);
    }

    /**
     * @param int $current
     * @param ResponseInterface $response
     * @return int
     */
    private function pagination(int $current, ResponseInterface $response): int
    {
        if (($page = ResponseMediator::getPagination($response)) && isset($page['next'])) {
            return $current + 1;
        }

        return $current;
    }

    /**
     * @param RepositoryInterface $repository
     * @param int $page
     * @return string
     */
    private function getApiGetCommitsUri(RepositoryInterface $repository, int $page = 1): string
    {
        $uri = \vsprintf(self::URI_COMMITS, [
            \rawurlencode($repository->getUser()),
            \rawurlencode($repository->getName()),
        ]);

        return $uri . '?' . \http_build_query([
            'sha'  => $this->branch->getCommit(),
            'path' => $this->getPathname(),
            'page' => $page,
        ]);
    }
}
