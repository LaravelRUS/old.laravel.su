<?php

declare(strict_types=1);

namespace App\Domain\History;

use App\Domain\Shared\CreatedDateProvider;
use App\Domain\Shared\CreatedDateProviderInterface;
use App\Domain\Shared\EntityInterface;
use App\Domain\Shared\UpdatedDateProvider;
use App\Domain\Shared\UpdatedDateProviderInterface;
use App\Domain\Version\Version;
use App\Domain\Version\VersionProviderInterface;

abstract class Entry implements
    EntityInterface,
    VersionProviderInterface,
    CreatedDateProviderInterface,
    UpdatedDateProviderInterface
{
    use CreatedDateProvider;
    use UpdatedDateProvider;

    private HistoryId $id;

    private Version $version;

    private VersionId $commit;

    public function __construct(
        Version $version,
        VersionId $commit,
        HistoryId $id = null,
    ) {
        $this->version = $version;
        $this->commit = $commit;
        $this->id = $id ?? HistoryId::fromNamespace(static::class);
    }

    public function getId(): HistoryId
    {
        return $this->id;
    }

    public function getVersion(): Version
    {
        return $this->version;
    }
}
