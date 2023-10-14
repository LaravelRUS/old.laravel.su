<?php

declare(strict_types=1);

namespace App\Domain\Documentation\KeywordsGenerator;

use Serafim\TFIDF\Document\DocumentInterface;
use Serafim\TFIDF\Entry;

/**
 * @template-implements \IteratorAggregate<DocumentInterface, iterable<array-key, Entry>>
 *
 * @internal This is an internal library class, please do not use it in your code.
 * @psalm-internal App\Domain\Documentation
 */
final class QueueMap implements \IteratorAggregate, \Countable
{
    private const KEY_DOCUMENT = 0x00;
    private const KEY_QUEUE = 0x01;

    /**
     * @var array<non-empty-string, {DocumentInterface, PriorityLimitedQueue}>
     */
    private array $entries = [];

    /**
     * @param int<1, max> $limit
     */
    public function __construct(
        DocumentMap $documents,
        int $limit = 10,
    ) {
        foreach ($documents as $document => $page) {
            $this->entries[\spl_object_hash($document)] = [
                self::KEY_DOCUMENT => $document,
                self::KEY_QUEUE => new PriorityLimitedQueue($limit),
            ];
        }
    }

    public function get(DocumentInterface $document): PriorityLimitedQueue
    {
        $pair = $this->entries[\spl_object_hash($document)];

        return $pair[self::KEY_QUEUE];
    }

    /**
     * @return \Traversable<DocumentInterface, PriorityLimitedQueue>
     */
    public function getIterator(): \Traversable
    {
        foreach ($this->entries as [$page, $document]) {
            yield $page => $document;
        }
    }

    /**
     * @return int<0, max>
     */
    public function count(): int
    {
        return \count($this->entries);
    }
}
