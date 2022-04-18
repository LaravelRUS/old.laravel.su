<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory as ViewFactoryInterface;
use Illuminate\Contracts\View\View as ViewInterface;

final class HomeController
{
    /**
     * @param ViewFactoryInterface $views
     */
    public function __construct(
        private readonly ViewFactoryInterface $views,
    ) {
    }

    /**
     * @return ViewInterface
     */
    public function index(): ViewInterface
    {
        return $this->views->make('page.home');
    }

    /**
     * @return ViewInterface
     */
    public function test(): ViewInterface
    {
        return $this->views->make('page.test.index');
    }
}
