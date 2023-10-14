<?php

declare(strict_types=1);

namespace App\Domain\Documentation\KeywordsGenerator;

use Serafim\TFIDF\Entry;

/**
 * @template-implements \IteratorAggregate<array-key, Entry>
 *
 * @internal This is an internal library class, please do not use it in your code.
 * @psalm-internal App\Domain\Documentation\KeywordsGenerator
 */
final class PriorityLimitedQueue implements \IteratorAggregate, \Countable
{
    /**
     * @var list<Entry>
     */
    private array $entries = [];

    /**
     * @var int<0, max>
     */
    private int $iterations = 0;

    /**
     * @param int<1, max> $limit
     */
    public function __construct(
        private readonly int $limit,
    ) {}

    /**
     * @return -1|0|1
     */
    private function compare(Entry $a, Entry $b): int
    {
        return $b->tfidf <=> $a->tfidf;
    }

    public function add(Entry $entry): void
    {
        $this->entries[] = $entry;

        if (++$this->iterations % 10 === 0) {
            $this->compute();
        }
    }

    /**
     * Sort and slice queue entries
     */
    private function compute(): void
    {
        \usort($this->entries, $this->compare(...));

        while (\count($this->entries) > $this->limit) {
            \array_pop($this->entries);
        }
    }

    public function getIterator(): \Traversable
    {
        $this->compute();

        return new \ArrayIterator($this->entries);
    }

    public function count(): int
    {
        return \count($this->entries);
    }
}
