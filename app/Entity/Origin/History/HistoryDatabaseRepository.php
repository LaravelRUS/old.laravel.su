<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Entity\Origin\History;

use App\Entity\Common\Repository;
use App\Entity\Origin\Document;
use App\Entity\Origin\History;
use Happyr\DoctrineSpecification\Spec;

/**
 * @template-extends Repository<History>
 */
class HistoryDatabaseRepository extends Repository implements HistoryRepositoryInterface
{
    /**
     * {@inheritDoc}
     */
    public function findAllByDocument(Document $document): iterable
    {
        return $this->match(Spec::eq('document', $document));
    }

    /**
     * {@inheritDoc}
     */
    public function findByHash(Document $document, string $hash): ?History
    {
        return $this->matchOneOrNullResult(Spec::andX(
            Spec::eq('document', $document),
            Spec::eq('hash', $hash)
        ));
    }
}
