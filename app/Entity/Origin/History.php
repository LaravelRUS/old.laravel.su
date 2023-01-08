<?php

declare(strict_types=1);

namespace App\Entity\Origin;

use App\Entity\BaseEntity;
use App\Entity\Common\Timestampable;
use App\Entity\Common\TimestampsTrait;
use App\Entity\Origin\History\HistoryDatabaseRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HistoryDatabaseRepository::class)]
#[ORM\Table(name: 'origin_history')]
#[ORM\HasLifecycleCallbacks]
class History extends BaseEntity implements Timestampable
{
    use TimestampsTrait;

    /**
     * @param Document $document
     * @param non-empty-string $hash
     * @param \DateTimeInterface $committedAt
     */
    public function __construct(
        #[ORM\ManyToOne(targetEntity: Document::class, cascade: ['persist', 'merge'], fetch: 'EAGER', inversedBy: 'history')]
        #[ORM\JoinColumn(name: 'document_id', referencedColumnName: 'id')]
        private Document $document,
        #[ORM\Column(name: 'hash', type: 'string', length: 191)]
        private string $hash,
        #[ORM\Column(name: 'committed_at', type: 'carbon')]
        private \DateTimeInterface $committedAt,
    ) {
    }

    /**
     * @return Document
     */
    public function getDocument(): Document
    {
        return $this->document;
    }

    /**
     * @return \DateTimeInterface
     */
    public function committedAt(): \DateTimeInterface
    {
        return $this->committedAt;
    }

    /**
     * @return non-empty-string
     */
    public function getHash(): string
    {
        return $this->hash;
    }
}
