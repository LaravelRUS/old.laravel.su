<?php

declare(strict_types=1);

namespace App\Application\Console\Commands;

use App\Domain\Documentation;
use App\GitHub\FileInterface;

/**
 * Скачивание и обновление всех странц переводов.
 *
 * Чтобы Laravel видел эту консольную команду она была добавлена в
 * список доступных команд, в поле {@see \App\Application\Console\Kernel::$commands}.
 *
 * Подробнее о консольных командах можно прочитать в документации по
 * адресу {@link https://laravel.su/docs/8.x/artisan#writing-commands}.
 */
class DocsUpdateCommand extends DocsTranslationCommand
{
    /**
     * Имя и сигнатура консольной команды. Т.е. для вызова этой команды следует
     * открыть и выполнить `php artisan su:docs:update`, после этого Laravel
     * вызовет метод {@see DocsUpdateCommand::handle()}.
     *
     * {@inheritDoc}
     */
    protected $signature = 'su:docs:update';

    /**
     * @var string
     */
    protected $description = 'Download and update translation pages';

    /**
     * @param Documentation $page
     * @param FileInterface $file
     * @return void
     */
    protected function each(Documentation $page, FileInterface $file): void
    {
        //
        // Если хеш коммита отличается от того, что был сохранён в базе,
        // то обновляем его и содержимое переводов.
        //
        if (! $page->translation->isActual($file->getCommit())) {
            $page->translation->update($file->getContents(), $file->getCommit());

            // Обновляем заголовок
            $page->title = $file->getTitle();
        }
    }
}
