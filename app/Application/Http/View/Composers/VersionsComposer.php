<?php

declare(strict_types=1);

namespace App\Application\Http\View\Composers;

use App\Domain\Documentation\VersionRepositoryInterface;
use Illuminate\Contracts\View\View;

readonly class VersionsComposer implements ViewComposerInterface
{
    public function __construct(
        private VersionRepositoryInterface $versions
    ) {
    }

    public function compose(View $view): void
    {
        $view->with('versions', $this->versions->all());
    }
}
