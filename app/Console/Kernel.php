<?php

namespace App\Console;

use App\Models\CodeSnippet;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // Ежедневные задачи
        $schedule->command('app:checkout-latest-docs')->daily();
        $schedule->command('app:compare-document')->daily();
        $schedule->command('app:update-packages')->daily();

        // Ежедневная очистка логов и просмотров
        $schedule->command('activitylog:clean')->daily();
        $schedule->command('telescope:prune')->daily();

        // Ежедневная очистка моделей, таких как CodeSnippet
        $schedule->command('model:prune', [
            '--model' => [
                CodeSnippet::class,
            ],
        ])->daily();

        // Оптимизация SQLite каждую минуту смотри https://www.sqlite.org/pragma.html#pragma_optimize
        $schedule->command('sqlite:optimize')->everyMinute();
        $schedule->command('sqlite:vacuum')->everyFourHours();

        // Перевод достижений каждую неделю по выходным
        $schedule->command('app:achievements-translation')
            ->weeklyOn([Schedule::SATURDAY, Schedule::SUNDAY]);

        // Ежедневное создание и очистка резервных копий в определенное время
        $schedule->command('backup:clean')->daily()->at('01:00');
        $schedule->command('backup:run')->daily()->at('01:30');
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
