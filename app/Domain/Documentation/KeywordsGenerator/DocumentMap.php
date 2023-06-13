<?php

declare(strict_types=1);

namespace App\Domain\Documentation\KeywordsGenerator;

use App\Domain\Documentation\Documentation;
use Serafim\TFIDF\Document\DocumentInterface;

/**
 * @template-implements \IteratorAggregate<DocumentInterface, Documentation>
 *
 * @internal This is an internal library class, please do not use it in your code.
 * @psalm-internal App\Domain\Documentation
 */
final class DocumentMap implements \IteratorAggregate, \Countable
{
    private const KEY_DOCUMENT = 0x00;
    private const KEY_PAGE = 0x01;

    /**
     * @var array<non-empty-string, {DocumentInterface, Documentation}>
     */
    private array $entries = [];

    public function add(DocumentInterface $document, Documentation $page): void
    {
        $this->entries[\spl_object_hash($document)] = [
            self::KEY_DOCUMENT => $document,
            self::KEY_PAGE => $page,
        ];
    }

    public function get(DocumentInterface $document): Documentation
    {
        $pair = $this->entries[\spl_object_hash($document)];

        return $pair[self::KEY_PAGE];
    }

    /**
     * @return \Traversable<Documentation, DocumentInterface>
     */
    public function getIterator(): \Traversable
    {
        foreach ($this->entries as [$page, $document]) {
            yield $page => $document;
        }
    }

    /**
     * @return int<1, max>
     */
    public function count(): int
    {
        return \count($this->entries);
    }
}
