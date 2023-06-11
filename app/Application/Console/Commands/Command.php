<?php

declare(strict_types=1);

namespace App\Application\Console\Commands;

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
