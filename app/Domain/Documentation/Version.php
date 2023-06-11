<?php

declare(strict_types=1);

namespace App\Domain\Documentation;

use App\Domain\Shared\CreatedDateProvider;
use App\Domain\Shared\CreatedDateProviderInterface;
use App\Domain\Shared\EntityInterface;
use App\Domain\Shared\UpdatedDateProvider;
use App\Domain\Shared\UpdatedDateProviderInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class Version implements
    EntityInterface,
    CreatedDateProviderInterface,
    UpdatedDateProviderInterface
{
    use CreatedDateProvider;
    use UpdatedDateProvider;

    private VersionId $id;

    /**
     * @var non-empty-string
     */
    private const DEFAULT_MENU_PAGE = 'documentation';

    /**
     * @var non-empty-string
     */
    private const DEFAULT_PAGE = 'installation';

    /**
     * @var non-empty-string
     */
    public string $name;

    /**
     * @var Collection<array-key, Documentation>
     */
    public iterable $docs;

    /**
     * @var non-empty-string
     */
    public string $defaultPage = self::DEFAULT_PAGE;

    /**
     * @var non-empty-string
     */
    public string $menuPage = self::DEFAULT_MENU_PAGE;

    public bool $isDocumented = false;

    /**
     * @param non-empty-string $title
     */
    public function __construct(
        string $title,
        VersionId $id = null,
    ) {
        $this->id = $id ?? VersionId::fromNamespace(static::class);
        $this->name = \trim($title);
        $this->docs = new ArrayCollection();
    }

    public function getId(): VersionId
    {
        return $this->id;
    }
}
