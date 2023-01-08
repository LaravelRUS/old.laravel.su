<?php

declare(strict_types=1);

namespace App\Entity\Origin;

use App\Entity\BaseEntity;
use App\Entity\Common\Timestampable;
use App\Entity\Common\TimestampsTrait;
use App\Entity\Origin\Document\DocumentsDatabaseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DocumentsDatabaseRepository::class)]
#[ORM\Table(name: 'origin_documents')]
#[ORM\HasLifecycleCallbacks]
class Document extends BaseEntity implements Timestampable
{
    use TimestampsTrait;

    /**
     * @var list<History>
     */
    #[ORM\OneToMany(mappedBy: 'document', targetEntity: History::class, cascade: ['persist', 'merge'])]
    #[ORM\OrderBy(['committedAt' => 'desc'])]
    public iterable $history;

    /**
     * @param Version $version
     * @param non-empty-string $name
     * @param non-empty-string $hash
     * @param string|\Stringable $content
     */
    public function __construct(
        #[ORM\ManyToOne(targetEntity: Version::class, cascade: ['persist', 'merge'], fetch: 'EAGER', inversedBy: 'documents')]
        #[ORM\JoinColumn(name: 'version_id', referencedColumnName: 'id')]
        private Version $version,
        #[ORM\Column(name: 'name', type: 'string', length: 191)]
        private string $name,
        #[ORM\Column(name: 'hash', type: 'string', length: 191)]
        private string $hash,
        #[ORM\Column(name: 'content', type: 'string', length: 191, nullable: true)]
        public string|\Stringable $content = '',
    ) {
        $this->history = new ArrayCollection();
    }

    /**
     * Синхронизируются только:
     *  - Файлы с расширением *.md
     *  - Кроме license.md и readme.md
     *
     * @return bool
     */
    public function isSyncable(): bool
    {
        $name = \strtolower($this->getName());

        return \str_ends_with($name, '.md')
            && ! \in_array($name, ['license.md', 'readme.md'], true)
        ;
    }

    /**
     * @return non-empty-string
     */
    public function getUrn(): string
    {
        return \basename(\strtolower($this->getName()), '.md');
    }

    /**
     * @return list<History>
     */
    public function getHistory(): iterable
    {
        return $this->history;
    }

    /**
     * @param string|\Stringable $content
     * @param non-empty-string $hash
     * @return $this
     */
    public function update(string|\Stringable $content, string $hash): self
    {
        assert($hash !== '', 'Commit hash should not be empty');

        $this->content = $content;
        $this->hash = $hash;

        return $this;
    }

    /**
     * @return Version
     */
    public function getVersion(): Version
    {
        return $this->version;
    }

    /**
     * @return non-empty-string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return non-empty-string
     */
    public function getHash(): string
    {
        return $this->hash;
    }

    /**
     * @return string
     */
    public function getContents(): string
    {
        return (string)($this->content ?? '');
    }
}
