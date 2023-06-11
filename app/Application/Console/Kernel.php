<?php

declare(strict_types=1);

namespace App\Application\Console;

use Illuminate\Console\Command;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

/**
 * Класс ответчает за регистрацию консольных команд, команд планировщика задач
 * и всё что связано с консольными утилитами.
 *
 * Этот класс предоставляется самим фреймворком и в оригинале выглядит следующим
 * образом: {@link https://github.com/laravel/laravel/blob/8.x/app/Console/Kernel.php}.
 *
 * Регистрация конкретно этого класса производится в файле "bootstrap/app.php" и
 * выглядит следующим образом:
 * ```php
 *  $app->singleton(
 *      Illuminate\Contracts\Console\Kernel::class,
 *      App\Application\Console\Kernel::class
 *  );
 * ```
 *
 * Это значит, что в том случае, если кто-либо попросит у приложения Laravel
 * реализацию интерфейса {@see \Illuminate\Contracts\Console\Kernel}, то
 * приложению следует вернуть объект класса {@see \App\Application\Console\Kernel}. При
 * запуске консольной утилиты "artisan" фреймворк выполняет именно это -
 * запрашивает {@see \Illuminate\Contracts\Console\Kernel}.
 *
 * При желании вы можете изменить это поведение: Например, переименовать,
 * переместить этот класс, или удалить, указав вместо ссылки на этот
 * класс ссылку на оригинальный {@see \Illuminate\Foundation\Console\Kernel}.
 */
class Kernel extends ConsoleKernel
{
    /**
     * Команды Artisan, предоставляемые вашим приложением. Данный массив
     * содержит ссылки на классы коммант.
     *
     * Подробнее о том что это за список можно прочитать в документации по
     * адресу {@link https://laravel.su/docs/8.x/artisan#registering-commands}.
     *
     * @var list<class-string<Command>>
     */
    protected $commands = [
        // Команды, отвечающие за работу со статьями.
        \App\Application\Console\Commands\ArticlesTouchCommand::class,

        // Команды, отвечающие за работу с документацией.
        \App\Application\Console\Commands\DocsFetchCommand::class,
        \App\Application\Console\Commands\DocsUpdateCommand::class,
        \App\Application\Console\Commands\DocsDiffCommand::class,
        \App\Application\Console\Commands\DocsTouchCommand::class,
    ];

    /**
     * Метод, который регистрирует "планировщик".
     *
     * Подробнее о том как работает планировщик задач и за что ответчает этот метод
     * можно прочитать в документации {@link https://laravel.su/docs/8.x/scheduling#defining-schedules}.
     *
     * @param Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule): void
    {
        // Каждый день выполняем чтение оригингала.
        $schedule->command('su:docs:fetch')
            ->daily()
            ->withoutOverlapping()
            ->onSuccess(function (): void {
                // Затем скачиваем переводы.
                $this->call('su:docs:update');
                // А затем вычисляем дифф изменений.
                $this->call('su:docs:diff');
            });
    }
}
