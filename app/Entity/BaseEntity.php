<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Entity;

use App\Entity\Common\Identifiable;
use App\Entity\Common\IdentifiableTrait;
use App\Entity\Common\Timestampable;
use App\Entity\Common\TimestampsTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\MappedSuperclass()
 * @ORM\HasLifecycleCallbacks()
 */
abstract class BaseEntity implements Identifiable, Timestampable
{
    use IdentifiableTrait;
    use TimestampsTrait;
}
