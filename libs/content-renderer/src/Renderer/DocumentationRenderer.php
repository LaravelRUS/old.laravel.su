<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\ContentRenderer\Renderer;

use App\ContentRenderer\Extension\QuotesFormatter;
use Illuminate\Contracts\Events\Dispatcher;
use League\CommonMark\Util\HtmlFilter;

class DocumentationRenderer extends Renderer
{
    /**
     * @param Dispatcher $dispatcher
     */
    public function __construct(Dispatcher $dispatcher)
    {
        parent::__construct($dispatcher, [
            'html_input' => HtmlFilter::ALLOW,
        ]);

        $this->env->addExtension(new QuotesFormatter());
    }
}
