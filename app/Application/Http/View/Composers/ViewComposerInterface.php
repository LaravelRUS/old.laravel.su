<?php

declare(strict_types=1);

namespace App\Application\Http\View\Composers;

use Illuminate\Contracts\View\View as ViewInterface;

interface ViewComposerInterface
{
    /**
     * @param ViewInterface $view
     * @return void
     */
    public function compose(ViewInterface $view): void;
}
