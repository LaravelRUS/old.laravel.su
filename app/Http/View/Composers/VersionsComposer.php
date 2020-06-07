<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Http\View\Composers;

use App\Entity\Repository\VersionsRepository;
use Illuminate\Contracts\View\View;

/**
 * Class VersionsComposer
 */
class VersionsComposer
{
    /**
     * @var VersionsRepository
     */
    private VersionsRepository $versions;

    /**
     * VersionsComposer constructor.
     *
     * @param VersionsRepository $versions
     */
    public function __construct(VersionsRepository $versions)
    {
        $this->versions = $versions;
    }

    /**
     * @param View $view
     * @return void
     */
    public function compose(View $view): void
    {
        $view->with('versions', $this->versions->documented());
    }
}
