<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Console\Commands;

use App\Entity\Documentation;
use App\GitHub\FileInterface;

/**
 * Скачивание и обновление всех странц переводов
 */
class DocsUpdateCommand extends DocsTranslationCommand
{
    /**
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
