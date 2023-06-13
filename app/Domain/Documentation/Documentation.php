<?php

declare(strict_types=1);

namespace App\Domain\Documentation;

use App\Domain\Shared\CreatedDateProvider;
use App\Domain\Shared\CreatedDateProviderInterface;
use App\Domain\Shared\EntityInterface;
use App\Domain\Shared\UpdatedDateProvider;
use App\Domain\Shared\UpdatedDateProviderInterface;

class Documentation implements
    EntityInterface,
    VersionProviderInterface,
    CreatedDateProviderInterface,
    UpdatedDateProviderInterface,
    \Stringable
{
    use CreatedDateProvider;
    use UpdatedDateProvider;

    private DocumentationId $id;

    private Version $version;

    /**
     * @var non-empty-string
     */
    private readonly string $urn;

    /**
     * @var non-empty-string
     */
    public string $title;

    /**
     * @var list<non-empty-string>
     */
    private array $keywords = [];

    public readonly Source $source;

    public readonly Translation $translation;

    /**
     * @param non-empty-string $title
     * @param non-empty-string $urn
     */
    public function __construct(
        Version $version,
        string $title,
        string $urn,
        DocumentationId $id = null,
    ) {
        assert($title !== '', new \InvalidArgumentException('$title cannot be empty'));
        assert($urn !== '', new \InvalidArgumentException('$urn cannot be empty'));

        $this->version = $version;
        $this->title = $title;
        $this->urn = $urn;
        $this->id = $id ?? DocumentationId::fromNamespace(static::class);
        $this->source = new Source();
        $this->translation = new Translation();
    }

    public function getId(): DocumentationId
    {
        return $this->id;
    }

    public function getVersion(): Version
    {
        return $this->version;
    }

    /**
     * @return non-empty-string
     */
    public function getUrn(): string
    {
        return $this->urn;
    }

    /**
     * @return non-empty-string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param non-empty-string $title
     */
    public function rename(string $title): void
    {
        assert($title !== '', new \InvalidArgumentException('$title cannot be empty'));

        $this->title = $title;
    }

    public function removeKeywords(): void
    {
        $this->keywords = [];
    }

    public function addKeyword(string $keyword): void
    {
        if (!\in_array($keyword, $this->keywords, true)) {
            $this->keywords[] = $keyword;
        }
    }

    /**
     * @return list<non-empty-string>
     */
    public function getKeywords(): array
    {
        return $this->keywords;
    }

    /**
     * @return non-empty-string
     */
    public function getKeywordsString(): string
    {
        return \implode(', ', $this->getKeywords());
    }

    /**
     * @return non-empty-string
     */
    public function __toString(): string
    {
        if ($this->translation->isRendered()) {
            return (string)$this->translation;
        }

        if ($this->source->isRendered()) {
            return (string)$this->source;
        }

        return $this->urn;
    }
}
