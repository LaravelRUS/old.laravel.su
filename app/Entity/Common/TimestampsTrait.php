<?php

declare(strict_types=1);

namespace App\Entity\Common;

/**
 * @mixin Timestampable
 * @psalm-require-implements Timestampable
 */
trait TimestampsTrait
{
    use CreatedAtTrait;
    use UpdatedAtTrait;
}
