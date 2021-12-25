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
use Carbon\CarbonInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @mixin ProvidesCreatedAt
 * @psalm-require-implements ProvidesCreatedAt
 */
trait CreatedAtTrait
{
    /**
     * @var CarbonInterface
     */
    #[ORM\Column(name: 'created_at', type: 'carbon')]
    protected CarbonInterface $created;

    /**
     * @return CarbonInterface
     */
    public function createdAt(): CarbonInterface
    {
        return $this->created ??= Carbon::now();
    }

    #[ORM\PrePersist]
    public function onPrePersistCreatedField(): void
    {
        $this->created = Carbon::now();
    }
}
