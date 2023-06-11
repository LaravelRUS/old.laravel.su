<?php

declare(strict_types=1);

namespace App\Domain\Article;

use App\Domain\Shared\CreatedDateProvider;
use App\Domain\Shared\CreatedDateProviderInterface;
use App\Domain\Shared\EntityInterface;
use App\Domain\Shared\IdentifiableInterface;
use App\Domain\Shared\IdentifierInterface;
use App\Domain\Shared\UpdatedDateProvider;
use App\Domain\Shared\UpdatedDateProviderInterface;
use Carbon\Carbon;
use Doctrine\ORM\Mapping as ORM;
use Illuminate\Support\Str;

#[ORM\Table(name: 'articles')]
#[ORM\Entity]
#[ORM\HasLifecycleCallbacks]
class Article implements
    EntityInterface,
    CreatedDateProviderInterface,
    UpdatedDateProviderInterface
{
    use CreatedDateProvider;
    use UpdatedDateProvider;

    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'NONE')]
    #[ORM\Column(name: 'id', type: ArticleId::class)]
    private ArticleId $id;

    /**
     * @var non-empty-string
     */
    #[ORM\Column(name: 'title', type: 'string')]
    public string $title;

    /**
     * @var non-empty-string|null
     */
    #[ORM\Column(name: 'urn', type: 'string', nullable: true)]
    public ?string $urn = null;

    /**
     * @var string
     */
    #[ORM\Column(name: 'description', type: 'string')]
    public string $description = '';

    /**
     * @var Body
     */
    #[ORM\Embedded(class: Body::class, columnPrefix: 'content_')]
    public Body $body;

    /**
     * @var Carbon|null
     */
    #[ORM\Column(name: 'published_at', type: 'carbon', nullable: true)]
    protected ?Carbon $publishedAt = null;

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
     * @return $this
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

    /**
     * @param string $description
     * @return $this
     */
    public function describe(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @param \DateTimeInterface|null $at
     * @return $this
     */
    public function publish(\DateTimeInterface $at = null): self
    {
        $this->publishedAt = Carbon::make($at ?? Carbon::now());

        return $this;
    }
}
