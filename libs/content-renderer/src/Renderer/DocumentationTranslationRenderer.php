<?php

declare(strict_types=1);

namespace App\ContentRenderer\Renderer;

use App\ContentRenderer\Extension\RemoveCommitRelation;

final class DocumentationTranslationRenderer extends DocumentationRenderer
{
    public function __construct()
    {
        parent::__construct();

        $this->env->addExtension(new RemoveCommitRelation());
    }
}
