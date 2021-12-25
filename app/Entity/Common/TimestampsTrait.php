<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

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
