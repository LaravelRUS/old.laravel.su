<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Http\View\Composers;

use Illuminate\Contracts\View\View as ViewInterface;

interface ViewComposerInterface
{
    /**
     * @param ViewInterface $view
     * @return void
     */
    public function compose(ViewInterface $view): void;
}
