<?php

declare(strict_types=1);

namespace App\Application\Http\Controllers;

use App\Domain\Documentation\Version;
use App\Domain\Documentation\VersionRepositoryInterface;
use Illuminate\Contracts\View\Factory as ViewFactoryInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

final readonly class StatusController
{
    public function __construct(
        private ViewFactoryInterface $views,
        private VersionRepositoryInterface $versions,
    ) {
    }

    public function index(Redirector $redirector): RedirectResponse
    {
        return $redirector->route('status.show', [
            'version' => $this->versions->last()->name,
        ]);
    }

    public function show(Version $version): View
    {
        return $this->views->make('page.status.show', [
            'versions' => $this->versions->all(),
            'current'  => $version,
        ]);
    }
}
