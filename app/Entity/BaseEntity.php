<?php

declare(strict_types=1);

namespace App\Entity;

use App\Entity\Common\Identifiable;
use App\Entity\Common\IdentifiableTrait;
use App\Entity\Common\Timestampable;
use App\Entity\Common\TimestampsTrait;
use Doctrine\ORM\Mapping as ORM;

#[ORM\MappedSuperclass]
#[ORM\HasLifecycleCallbacks]
abstract class BaseEntity implements Identifiable, Timestampable
{
    use IdentifiableTrait;
    use TimestampsTrait;
}
