<?php

declare(strict_types=1);

namespace App\Domain;

use App\Domain\Shared\CreatedDateProvider;
use App\Domain\Shared\CreatedDateProviderInterface;
use App\Domain\Shared\Identifiable;
use App\Domain\Shared\IdentifiableTrait;
use App\Domain\Shared\UpdatedDateProvider;
use App\Domain\Shared\UpdatedDateProviderInterface;
use Doctrine\ORM\Mapping as ORM;

/**s
 * @deprecated Please implement id + created_at + updated_at fields using
 *             concrete domain namespace.
 */
#[ORM\MappedSuperclass]
#[ORM\HasLifecycleCallbacks]
abstract class BaseEntity implements Identifiable, CreatedDateProviderInterface, UpdatedDateProviderInterface
{
    use IdentifiableTrait;
    use CreatedDateProvider;
    use UpdatedDateProvider;
}
