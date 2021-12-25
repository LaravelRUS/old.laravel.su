<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Console\Commands;

use Illuminate\Console\Command as BaseCommand;
use Symfony\Component\Console\Helper\ProgressBar;

abstract class Command extends BaseCommand
{
    /**
     * @param int $max
     * @return ProgressBar
     */
    protected function progress(int $max = 0): ProgressBar
    {
        $progress = $this->getOutput()->createProgressBar($max);
        $progress->setFormat('%current%/%max% [%bar%] %percent:3s%% %message%');

        return $progress;
    }
}
