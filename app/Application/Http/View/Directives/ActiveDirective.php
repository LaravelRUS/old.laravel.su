<?php

declare(strict_types=1);

namespace App\Application\Http\View\Directives;

class ActiveDirective implements GeneratedDirectiveInterface
{
    private const TEMPLATE_EXPRESSION = 'app(\Illuminate\Routing\Router::class)->is(%s) ? \'active\' : \'\'';

    public function generate(string $expression): string
    {
        return '<?=' . \sprintf(self::TEMPLATE_EXPRESSION, $expression) . '?>';
    }
}
