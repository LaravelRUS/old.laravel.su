<?php

declare(strict_types=1);

namespace App\Application\Console\Commands;

use App\Domain\Documentation\VersionRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Clock\ClockInterface;

/**
 * Команда, отвечающая за перерисовку (ререндер) содержимого всех страниц
 * документации из оригинального Markdown формата в формат HTML для отображени
 * содержимого на сайте.
 *
 * Чтобы Laravel видел эту консольную команду она была добавлена в
 * список доступных команд, в поле {@see \App\Application\Console\Kernel::$commands}.
 *
 * Подробнее о консольных командах можно прочитать в документации по
 * адресу {@link https://laravel.su/docs/8.x/artisan#writing-commands}.
 */
class DocsTouchCommand extends Command
{
    /**
     * Имя и сигнатура консольной команды. Т.е. для вызова этой команды следует
     * открыть и выполнить `php artisan su:docs:touch`, после этого Laravel
     * вызовет метод {@see DocsTouchCommand::handle()}.
     *
     * {@inheritDoc}
     */
    protected $signature = 'su:docs:touch';

    /**
     * {@inheritDoc}
     */
    protected $description = 'Update documentation and execute the page renderer';

    public function __construct(
        private readonly EntityManagerInterface $em,
        private readonly ClockInterface $clock,
    ) {
        parent::__construct();
    }

    public function handle(VersionRepositoryInterface $versions): void
    {
        foreach ($versions->all() as $version) {
            $progress = $this->progress($version->docs->count());

            foreach ($version->docs as $documentation) {
                $progress->setMessage($documentation->title . ' (' . $documentation->version->name . ')');
                $progress->advance();

                // Reset rendered content
                $documentation->translation->clear();
                $documentation->source->clear();

                $documentation->touch($this->clock);

                $this->em->persist($documentation);
            }

            $this->em->flush();
            $progress->clear();
        }
    }
}
