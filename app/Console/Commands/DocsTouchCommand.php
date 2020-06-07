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
 * Перерисовка (ререндер) содержимого всех страниц документации
 */
class DocsTouchCommand extends Command
{
    /**
     * {@inheritDoc}
     */
    protected $signature = 'su:docs:touch';

    /**
     * {@inheritDoc}
     */
    protected $description = 'Update documentation and execute the page renderer';

    /**
     * @var EntityManagerInterface
     */
    private EntityManagerInterface $em;

    /**
     * TouchDocsCommand constructor.
     *
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct();

        $this->em = $em;
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
