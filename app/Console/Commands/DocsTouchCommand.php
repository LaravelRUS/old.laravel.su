<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Console\Commands;

use App\Entity\Repository\VersionsRepository;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Команда, отвечающая за перерисовку (ререндер) содержимого всех страниц
 * документации из оригинального Markdown формата в формат HTML для отображени
 * содержимого на сайте.
 *
 * Чтобы Laravel видел эту консольную команду она была добавлена в
 * список доступных команд, в поле {@see \App\Console\Kernel::$commands}.
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

    /**
     * @param EntityManagerInterface $em
     */
    public function __construct(
        private readonly EntityManagerInterface $em
    ) {
        parent::__construct();
    }

    /**
     * @param VersionsRepository $versions
     * @return void
     */
    public function handle(VersionsRepository $versions): void
    {
        foreach ($versions->findAll() as $version) {
            $progress = $this->progress($version->docs->count());

            foreach ($version->docs as $documentation) {
                $progress->setMessage($documentation->title . ' (' . $documentation->version->name . ')');
                $progress->advance();

                // Reset rendered content
                $documentation->translation->clear();
                $documentation->source->clear();
                $documentation->touch();

                $this->em->persist($documentation);
            }

            $this->em->flush();
            $progress->clear();
        }
    }
}
