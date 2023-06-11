<?php

declare(strict_types=1);

namespace App\Application\Http\Controllers;

use Illuminate\Contracts\View\Factory as ViewFactoryInterface;
use Illuminate\Contracts\View\View as ViewInterface;

final readonly class HomeController
{
    public function __construct(
        private ViewFactoryInterface $views,
    ) {
    }

    public function index(): ViewInterface
    {
        return $this->views->make('page.home');
    }

    public function test(): ViewInterface
    {
        return $this->views->make('page.test.index');
    }
}
