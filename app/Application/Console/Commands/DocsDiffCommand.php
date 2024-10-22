<?php

declare(strict_types=1);

namespace App\Application\Console\Commands;

use App\Domain\Documentation\Documentation;
use App\GitHub\BranchInterface;
use App\GitHub\FileInterface;
use Illuminate\Support\Enumerable;

/**
 * Вычисление диффа (количества изменений) между оригиналом и переводом.
 *
 * Чтобы Laravel видел эту консольную команду она была добавлена в
 * список доступных команд, в поле {@see \App\Application\Console\Kernel::$commands}.
 *
 * Подробнее о консольных командах можно прочитать в документации по
 * адресу {@link https://laravel.su/docs/8.x/artisan#writing-commands}.
 */
class DocsDiffCommand extends DocsTranslationCommand
{
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

    protected function each(Documentation $page, FileInterface $file): void
    {
        //
        // 1) Получаем историю изменений из исходной бранчи
        // 2) Делаем слайс до указанного коммита в переводах
        // 3) Записываем количество изменений в базу
        //

        $history = $this->getSourceFile($file)->getHistory();

        $needle = $page->translation->getTargetVersionId();
        $slice = $this->search($history, $needle === null ? null : (string)$needle);

        //
        // Пропускаем, если коммит указанный для перевода не является
        // частью истории этого файла.
        //
        if ($slice === null) {
            $this->writeCommitError($page, $history);

            $page->translation->markAsNonTranslated();

            return;
        }

        $page->translation->applyTranslateChanges($slice->count());
    }

    protected function getSourceFile(FileInterface $file): FileInterface
    {
        $branch = $file->getBranch();

        return $this->source->getBranches()
            ->first(fn(BranchInterface $b): bool => $b->getName() === $branch->getName())
            ->getFiles()
            ->first(fn(FileInterface $f): bool => $f->getPathname() === $file->getPathname())
        ;
    }

    private function search(Enumerable $commits, ?string $needle): ?Enumerable
    {
        if ($needle === null) {
            return null;
        }

        $found = false;

        $result = $commits
            ->filter(static function (array $commit) use ($needle, &$found): bool {
                if ($found === false && $needle === $commit['sha']) {
                    $found = true;
                }

                return !$found;
            });

        if ($found === false) {
            return null;
        }

        return $result;
    }

    private function writeCommitError(Documentation $page, Enumerable $history): void
    {
        $this->line('');

        $this->line(\sprintf(self::ERROR_BAD_COMMIT, $page->getUrn()));
        $this->line('  Translation:');
        $this->line('    - <comment>' . ($page->translation->getTargetVersionId() ?? 'unknown') . '</comment>');

        if ($page->translation->getTargetVersionId()) {
            $this->line('  History:');

            foreach ($history as $commit) {
                $this->line('    - <comment>' . $commit['sha'] . '</comment>');
            }
        }

        $this->line('');
    }
}
