<?php

declare(strict_types=1);

namespace App\Domain;

use App\Domain\Common\Identifiable;
use App\Domain\Common\IdentifiableTrait;
use App\Domain\Common\Timestampable;
use App\Domain\Common\TimestampsTrait;
use Doctrine\ORM\Mapping as ORM;

#[ORM\MappedSuperclass]
#[ORM\HasLifecycleCallbacks]
abstract class BaseEntity implements Identifiable, Timestampable
{
    use IdentifiableTrait;
    use TimestampsTrait;
}
