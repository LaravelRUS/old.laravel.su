<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Console;

use Illuminate\Console\Command;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array|string[]|Command[]
     */
    protected $commands = [
        // Articles
        \App\Console\Commands\ArticlesTouchCommand::class,

        // Docs
        \App\Console\Commands\DocsFetchCommand::class,
        \App\Console\Commands\DocsUpdateCommand::class,
        \App\Console\Commands\DocsDiffCommand::class,
        \App\Console\Commands\DocsTouchCommand::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule): void
    {
        // 1) Выполняем чтение оригингала
        // 2) Затем скачиваем переводы
        // 3) Затем вычисляем дифф изменений
        $schedule->command('su:docs:fetch')
            ->daily()
            ->withoutOverlapping()
            ->onSuccess(function () {
                $this->call('su:docs:update');
                $this->call('su:docs:diff');
            });
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');
    }
}
