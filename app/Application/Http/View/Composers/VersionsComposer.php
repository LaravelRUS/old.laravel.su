<?php

declare(strict_types=1);

namespace App\Application\Http\View\Composers;

use App\Domain\Repository\VersionsRepository;
use Illuminate\Contracts\View\View;

class VersionsComposer implements ViewComposerInterface
{
    /**
     * @var VersionsRepository
     */
    private VersionsRepository $versions;

    /**
     * @param VersionsRepository $versions
     */
    public function __construct(VersionsRepository $versions)
    {
        $this->versions = $versions;
    }

    /**
     * @param View $view
     * @return void
     */
    public function compose(View $view): void
    {
        $view->with('versions', $this->versions->all());
    }
}
