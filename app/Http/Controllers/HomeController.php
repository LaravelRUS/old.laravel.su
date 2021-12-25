<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class HomeController
{
    /**
     * @param Factory $factory
     * @return View
     */
    public function index(Factory $factory): View
    {
        return $factory->make('page.home');
    }

    /**
     * @param Factory $factory
     * @return View
     */
    public function test(Factory $factory): View
    {
        return $factory->make('page.test.index');
    }
}
