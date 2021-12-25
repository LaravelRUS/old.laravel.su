<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Http\View\Composers;

use Illuminate\Contracts\Config\Repository;
use Illuminate\Contracts\View\View;

class YandexMetrikaComposer implements ViewComposerInterface
{
    /**
     * @var Repository
     */
    private Repository $config;

    /**
     * @param Repository $config
     */
    public function __construct(Repository $config)
    {
        $this->config = $config;
    }

    /**
     * @param View $view
     * @return void
     */
    public function compose(View $view): void
    {
        $id = $this->config->get('services.metrika.id');

        $view->with('metrika', (object)[
            'id'      => $id,
            'enabled' => (bool)$id,
        ]);
    }
}
