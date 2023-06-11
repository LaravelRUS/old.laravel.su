<?php

declare(strict_types=1);

namespace App\Domain\Common;

interface Timestampable extends ProvidesCreatedAt, ProvidesUpdatedAt
{
}
