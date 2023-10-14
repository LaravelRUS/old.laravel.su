<?php

declare(strict_types=1);

namespace App\Application\Http\View\Directives;

use Illuminate\Routing\Router;

final readonly class NavDirective implements IfDirectiveInterface
{
    public function __construct(
        private Router $router,
    ) {}

    public function match(mixed ...$args): bool
    {
        return $this->router->is(...$args);
    }
}
