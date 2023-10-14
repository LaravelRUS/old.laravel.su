<?php

declare(strict_types=1);

namespace App\Application\Console\Commands;

use Illuminate\Console\Command as BaseCommand;
use Symfony\Component\Console\Helper\ProgressBar;

abstract class Command extends BaseCommand
{
    /**
     * @param int<0, max> $max
     */
    protected function progress(int $max = 0): ProgressBar
    {
        $output = $this->getOutput();

        $progress = $output->createProgressBar($max);
        $progress->setMessage('');
        $progress->setFormat('(%elapsed% / %memory:6s%) %current%/%max% [%bar%] %percent:3s%% %message%');

        if ($max <= 0) {
            $progress->setFormat('(%elapsed% / %memory:6s%) %current% [%bar%] %message%');
            $progress->setEmptyBarCharacter('<fg=red>·</>');
            $progress->setBarCharacter('<fg=green>❱</>');
            $progress->setProgressCharacter('<fg=yellow>❯</>');
        }

        return $progress;
    }

    /**
     * @return int<0, max>
     */
    protected function count(iterable $items): int
    {
        if (\is_countable($items)) {
            return \count($items);
        }

        return \count([...$items]);
    }
}
