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

final class MenuTranslationRenderer extends MenuRenderer
{
    public function __construct()
    {
        parent::__construct();

        $this->env->addExtension(new RemoveCommitRelation());
    }
}
