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
use App\GitHub\BranchInterface;
use App\GitHub\FileInterface;
use Illuminate\Support\Enumerable;

/**
 * Вычисление диффа (количества изменений) между оригиналом и переводом.
 *
 * Чтобы Laravel видел эту консольную команду она была добавлена в
 * список доступных команд, в поле {@see \App\Console\Kernel::$commands}.
 *
 * Подробнее о консольных командах можно прочитать в документации по
 * адресу {@link https://laravel.su/docs/8.x/artisan#writing-commands}.
 */
class DocsDiffCommand extends DocsTranslationCommand
{
    /**
     * @var string
     */
    private const ERROR_BAD_COMMIT = '<error>The commit indicated on the page "%s" is not correct</error>';

    /**
     * Имя и сигнатура консольной команды. Т.е. для вызова этой команды следует
     * открыть и выполнить `php artisan su:docs:diff`, после этого Laravel
     * вызовет метод {@see DocsDiffCommand::handle()}.
     *
     * {@inheritDoc}
     */
    protected $signature = 'su:docs:diff';

    /**
     * {@inheritDoc}
     */
    protected $description =
        'Calculate and update the number of differences ' .
        'between the original and the translation documentation pages';

    /**
     * @param Documentation $page
     * @param FileInterface $file
     * @return void
     */
    protected function each(Documentation $page, FileInterface $file): void
    {
        //
        // 1) Получаем историю изменений из исходной бранчи
        // 2) Делаем слайс до указанного коммита в переводах
        // 3) Записываем количество изменений в базу
        //

        $history = $this->getSourceFile($file)->getHistory();

        $slice = $this->search($history, $page->translation->targetCommit);

        //
        // Пропускаем, если коммит указанный для перевода не является
        // частью истории этого файла.
        //
        if ($slice === null) {
            $this->writeCommitError($page, $history);

            $page->translation->withDiff(-1);

            return;
        }

        $page->translation->withDiff($slice->count());
    }

    /**
     * @param FileInterface $file
     * @return FileInterface
     */
    protected function getSourceFile(FileInterface $file): FileInterface
    {
        $branch = $file->getBranch();

        return $this->source->getBranches()
            ->first(fn (BranchInterface $b) => $b->getName() === $branch->getName())
            ->getFiles()
            ->first(fn (FileInterface $f) => $f->getPathname() === $file->getPathname())
        ;
    }

    /**
     * @param Enumerable $commits
     * @param string|null $needle
     * @return Enumerable|null
     */
    private function search(Enumerable $commits, ?string $needle): ?Enumerable
    {
        if ($needle === null) {
            return null;
        }

        $found = false;

        $result = $commits
            ->filter(static function (array $commit) use ($needle, &$found) {
                if ($found === false && $needle === $commit['sha']) {
                    $found = true;
                }

                return ! $found;
            });

        if ($found === false) {
            return null;
        }

        return $result;
    }

    /**
     * @param Documentation $page
     * @param Enumerable $history
     * @return void
     */
    private function writeCommitError(Documentation $page, Enumerable $history): void
    {
        $this->line('');

        $this->line(\sprintf(self::ERROR_BAD_COMMIT, $page->urn));
        $this->line('  Translation:');
        $this->line('    - <comment>' . ($page->translation->targetCommit ?? 'unknown') . '</comment>');

        if ($page->translation->targetCommit) {
            $this->line('  History:');

            foreach ($history as $commit) {
                $this->line('    - <comment>' . $commit['sha'] . '</comment>');
            }
        }

        $this->line('');
    }
}
