<?php

declare(strict_types=1);

namespace App\Http\View\Directives;

class ActiveDirective implements GeneratedDirectiveInterface
{
    /**
     * @var string
     */
    private const TEMPLATE_EXPRESSION = 'app(\Illuminate\Routing\Router::class)->is(%s) ? \'active\' : \'\'';

    /**
     * @param string $expression
     * @return string
     */
    public function generate(string $expression): string
    {
        return '<?=' . \sprintf(self::TEMPLATE_EXPRESSION, $expression) . '?>';
    }
}
