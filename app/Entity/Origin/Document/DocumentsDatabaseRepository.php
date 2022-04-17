<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Entity\Origin\Document;

use App\Entity\Common\Repository;
use App\Entity\Origin\Version;
use App\Entity\Origin\Document;
use Happyr\DoctrineSpecification\Spec;

/**
 * @template-extends Repository<Document>
 */
class DocumentsDatabaseRepository extends Repository implements DocumentsRepositoryInterface
{
    /**
     * {@inheritDoc}
     */
    public function findAllByVersion(Version $version): iterable
    {
        return $this->match(Spec::eq('version', $version));
    }

    /**
     * {@inheritDoc}
     */
    public function findByName(Version $version, string $name): ?Document
    {
        return $this->matchOneOrNullResult(Spec::andX(
            Spec::eq('version', $version),
            Spec::eq('name', $name)
        ));
    }
}
