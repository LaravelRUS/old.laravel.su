<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Entity\Repository\VersionsRepository;
use App\Entity\Version;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

/**
 * Class StatusController
 */
final class StatusController
{
    /**
     * @var Factory
     */
    private Factory $views;

    /**
     * @var VersionsRepository
     */
    private VersionsRepository $versions;

    /**
     * StatusController constructor.
     *
     * @param Factory $views
     * @param VersionsRepository $versions
     */
    public function __construct(Factory $views, VersionsRepository $versions)
    {
        $this->views = $views;
        $this->versions = $versions;
    }

    /**
     * @param Redirector $redirector
     * @return RedirectResponse
     */
    public function index(Redirector $redirector): RedirectResponse
    {
        return $redirector->route('status.show', [
            'version' => $this->versions->last()->name,
        ]);
    }

    /**
     * @param Version $version
     * @return View
     */
    public function show(Version $version): View
    {
        return $this->views->make('page.status.show', [
            'versions' => $this->versions->all(),
            'current'  => $version,
        ]);
    }
}
