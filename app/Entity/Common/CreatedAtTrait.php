<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Entity\Common;

use Carbon\Carbon;
use Doctrine\ORM\Mapping as ORM;

/**
 * @mixin ProvidesCreatedAt
 */
trait CreatedAtTrait
{
    /**
     * @ORM\Column(name="created_at", type="carbon")
     *
     * @var Carbon
     */
    protected Carbon $created;

    /**
     * @return Carbon
     */
    public function createdAt(): Carbon
    {
        return $this->created ??= Carbon::now();
    }

    /**
     * @ORM\PrePersist
     */
    public function onPrePersistCreatedField(): void
    {
        $this->created = Carbon::now();
    }
}
