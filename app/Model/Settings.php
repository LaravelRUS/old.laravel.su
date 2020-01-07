<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Settings
 */
final class Settings extends Model
{
    /**
     * @var string
     */
    protected $table = 'settings';
}
