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
    CreatedDateProviderInterface,
    UpdatedDateProviderInterface,
    \Stringable
{
    use CreatedDateProvider;
    use UpdatedDateProvider;

    private DocumentationId $id;

    public Version $version;

    /**
     * @var non-empty-string
     */
    public string $urn;

    /**
     * @var non-empty-string
     */
    public string $title;

    public Source $source;

    public Translation $translation;

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
        $this->id = $id ?? DocumentationId::fromNamespace(static::class);

        $this->version = $version;
        $this->source = new Source();
        $this->translation = new Translation();
        $this->title = $title;
        $this->urn = $urn;
    }

    public function getId(): DocumentationId
    {
        return $this->id;
    }

    /**
     * @return list<non-empty-string>
     */
    public function getKeywords(): array
    {
        return \array_filter([
            ...\preg_split('/\W+/u', $this->urn),
            $this->title,
            'Laravel ' . $this->version->name
        ]);
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
