<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\ContentRenderer\Renderer;

use App\ContentRenderer\Extension\RemoveCommitRelation;
use Illuminate\Contracts\Events\Dispatcher;

class MenuTranslationRenderer extends MenuRenderer
{
    /**
     * @param Dispatcher $dispatcher
     */
    public function __construct(
        Dispatcher $dispatcher,
    ) {
        parent::__construct($dispatcher);

        $this->env->addExtension(new RemoveCommitRelation());
    }
}
