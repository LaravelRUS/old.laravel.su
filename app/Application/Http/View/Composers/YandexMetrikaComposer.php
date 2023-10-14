<?php

declare(strict_types=1);

namespace App\Application\Http\View\Composers;

use Illuminate\Contracts\Config\Repository;
use Illuminate\Contracts\View\View;

final readonly class YandexMetrikaComposer implements ViewComposerInterface
{
    public function __construct(
        private Repository $config,
    ) {}

    public function compose(View $view): void
    {
        $id = $this->config->get('services.metrika.id');

        $view->with('metrika', (object)[
            'id' => $id,
            'enabled' => (bool)$id,
        ]);
    }
}
