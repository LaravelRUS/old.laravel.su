<?php

declare(strict_types=1);

namespace App\Application\Http\Controllers\Web\Status;

use App\Domain\Version\Version;
use App\Domain\Version\VersionRepositoryInterface;
use Illuminate\Contracts\View\Factory as ViewFactoryInterface;
use Illuminate\Contracts\View\View as ViewInterface;

final readonly class ShowController
{
    public function __construct(
        private ViewFactoryInterface $views,
        private VersionRepositoryInterface $versions,
    ) {}

    public function __invoke(Version $version): ViewInterface
    {
        return $this->views->make('page.status.show', [
            'versions' => $this->versions->all(),
            'current'  => $version,
        ]);
    }
}
