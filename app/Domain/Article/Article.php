<?php

declare(strict_types=1);

namespace App\Domain\Article;

use App\Domain\Shared\CreatedDateProvider;
use App\Domain\Shared\CreatedDateProviderInterface;
use App\Domain\Shared\EntityInterface;
use App\Domain\Shared\UpdatedDateProvider;
use App\Domain\Shared\UpdatedDateProviderInterface;
use Illuminate\Support\Str;
use Psr\Clock\ClockInterface;

class Article implements
    EntityInterface,
    CreatedDateProviderInterface,
    UpdatedDateProviderInterface
{
    use CreatedDateProvider;
    use UpdatedDateProvider;

    private ArticleId $id;

    /**
     * @var non-empty-string
     */
    public string $title;

    /**
     * @var non-empty-string|null
     */
    public ?string $urn = null;

    public string $description = '';

    public Body $body;

    protected ?\DateTimeInterface $publishedAt = null;

    public function __construct(
        string $title,
        Body $body,
        ArticleId $id = null,
    ) {
        $this->id = $id ?? ArticleId::fromNamespace(static::class);

        $this->rename($title);
        $this->body = $body;
    }

    public function getId(): ArticleId
    {
        return $this->id;
    }

    /**
     * @param non-empty-string $title
     */
    public function rename(string $title): self
    {
        assert($title !== '', 'Title can not be empty');

        $this->title = $title;

        if ($this->urn === null) {
            $this->urn = Str::slug($title);
        }

        return $this;
    }

    public function describe(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function publish(\DateTimeInterface|ClockInterface $at = null): self
    {
        if ($at instanceof ClockInterface) {
            $at = $at->now();
        }

        if ($at instanceof \DateTimeInterface && !$at instanceof \DateTimeImmutable) {
            $at = \DateTimeImmutable::createFromMutable($at);
        }

        $this->publishedAt = $at;

        return $this;
    }
}
