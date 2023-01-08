<?php

declare(strict_types=1);

namespace App\Entity\Common;

interface Timestampable extends ProvidesCreatedAt, ProvidesUpdatedAt
{
}
