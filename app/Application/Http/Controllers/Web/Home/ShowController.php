<?php

declare(strict_types=1);

namespace App\Application\Http\Controllers\Web\Home;

use Illuminate\Contracts\View\Factory as ViewFactoryInterface;
use Illuminate\Contracts\View\View as ViewInterface;

final readonly class ShowController
{
    public function __construct(
        private ViewFactoryInterface $views,
    ) {
    }

    public function __invoke(): ViewInterface
    {
        return $this->views->make('page.home');
    }
}
