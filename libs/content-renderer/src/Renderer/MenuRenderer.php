<?php

declare(strict_types=1);

namespace App\ContentRenderer\Renderer;

use App\ContentRenderer\Extension\ExternalLinks;
use App\ContentRenderer\Extension\MenuTitlesNormalizer;
use Illuminate\Contracts\Events\Dispatcher;

class MenuRenderer extends Renderer
{
    public function __construct()
    {
        parent::__construct();

        $this->env->addExtension(new MenuTitlesNormalizer());
        $this->env->addExtension(new ExternalLinks(['/api'], 'https://laravel.com', 'external-link'));
    }
}
