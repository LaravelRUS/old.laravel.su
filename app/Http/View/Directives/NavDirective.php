<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Http\View\Directives;

use Illuminate\Routing\Router;

final class NavDirective implements IfDirectiveInterface
{
    /**
     * @var Router
     */
    private Router $router;

    /**
     * @param Router $router
     */
    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    /**
     * @param mixed ...$args
     * @return bool
     */
    public function match(mixed ...$args): bool
    {
        return $this->router->is(...$args);
    }
}
