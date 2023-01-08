<?php

declare(strict_types=1);

namespace App\Entity\Origin\History;

use App\Entity\Origin\Document;
use App\Entity\Origin\History;

interface HistoryRepositoryInterface
{
    /**
     * @param Document $document
     * @return list<History>
     */
    public function findAllByDocument(Document $document): iterable;

    /**
     * @param Document $document
     * @param non-empty-string $hash
     * @return History|null
     */
    public function findByHash(Document $document, string $hash): ?History;
}
