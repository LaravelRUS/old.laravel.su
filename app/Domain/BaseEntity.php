<?php

declare(strict_types=1);

namespace App\Domain;

use App\Domain\Shared\Identifiable;
use App\Domain\Shared\IdentifiableTrait;
use Doctrine\ORM\Mapping as ORM;

/**s
 * @deprecated Please implement id fields using
 *             concrete domain namespace.
 */
#[ORM\MappedSuperclass]
#[ORM\HasLifecycleCallbacks]
abstract class BaseEntity implements Identifiable
{
    use IdentifiableTrait;
}
