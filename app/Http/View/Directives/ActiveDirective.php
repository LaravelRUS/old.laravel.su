<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

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
