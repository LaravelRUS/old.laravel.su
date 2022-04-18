<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\ContentRenderer\Renderer;

use App\ContentRenderer\Extension\ExternalLinks;
use App\ContentRenderer\Extension\MenuTitlesNormalizer;
use Illuminate\Contracts\Events\Dispatcher;

class MenuRenderer extends Renderer
{
    /**
     * @param Dispatcher $dispatcher
     */
    public function __construct(
        Dispatcher $dispatcher,
    ) {
        parent::__construct($dispatcher);

        $this->env->addExtension(new MenuTitlesNormalizer());
        $this->env->addExtension(new ExternalLinks(['/api'], 'https://laravel.com', 'external-link'));
    }
}