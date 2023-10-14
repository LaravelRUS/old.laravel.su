<?php

declare(strict_types=1);

namespace App\Domain\Documentation;

use App\Domain\Documentation\KeywordsGenerator\DocumentMap;
use App\Domain\Documentation\KeywordsGenerator\QueueMap;
use Serafim\TFIDF\Document\DocumentInterface;
use Serafim\TFIDF\Entry;
use Serafim\TFIDF\Vectorizer;
use Serafim\TFIDF\VectorizerInterface;

/**
 * @template-implements \IteratorAggregate<Documentation, DocumentInterface>
 */
final readonly class KeywordsGenerator implements \IteratorAggregate
{
    private Vectorizer $vectorizer;
    private DocumentMap $documents;

    /**
     * @param null|\Closure(Entry, Documentation):void $progress
     * @param non-empty-string $locale
     */
    public function __construct(
        private ?\Closure $progress = null,
        private string $locale = 'ru_RU',
    ) {
        $this->vectorizer = new Vectorizer();
        $this->documents = new DocumentMap();
    }

    public function add(Documentation $page): void
    {
        $this->vectorizer->add($document = $this->vectorizer->createText(
            text: $this->filter($page->translation),
            locale: $this->locale,
        ));

        $this->documents->add($document, $page);
    }

    private function filter(Translation $t9n): string
    {
        return $t9n->getRawContent();
    }

    private function compute(VectorizerInterface $vectorizer): QueueMap
    {
        $queues = new QueueMap($this->documents);

        foreach ($vectorizer->compute() as $document => $entries) {
            foreach ($entries as $entry) {
                if ($this->progress !== null) {
                    ($this->progress)(
                        $entry,
                        $this->documents->get($document),
                    );
                }

                $queue = $queues->get($document);
                $queue->add($entry);
            }
        }

        return $queues;
    }

    /**
     * @return \Iterator<Documentation, iterable<array-key, Entry>>
     */
    public function getIterator(): \Iterator
    {
        foreach ($this->compute($this->vectorizer) as $document => $queue) {
            yield $this->documents->get($document) => $queue;
        }
    }
}
