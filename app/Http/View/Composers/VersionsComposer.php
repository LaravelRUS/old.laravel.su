<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Http\View\Composers;

use App\Model\Repository\FrameworkVersionRepositoryInterface;
use Illuminate\Contracts\View\View;

/**
 * Class VersionsComposer
 */
class VersionsComposer
{
    /**
     * @var FrameworkVersionRepositoryInterface
     */
    private FrameworkVersionRepositoryInterface $versions;

    /**
     * VersionsComposer constructor.
     *
     * @param FrameworkVersionRepositoryInterface $versions
     */
    public function __construct(FrameworkVersionRepositoryInterface $versions)
    {
        $this->versions = $versions;
    }

    /**
     * @param View $view
     * @return void
     */
    public function compose(View $view): void
    {
        $view->with('versions', $this->versions->all());
    }
}
