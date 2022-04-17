<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Entity\Origin;

use App\Entity\BaseEntity;
use App\Entity\Common\Timestampable;
use App\Entity\Common\TimestampsTrait;
use App\Entity\Origin;
use App\Entity\Origin\Version\VersionsDatabaseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VersionsDatabaseRepository::class)]
#[ORM\Table(name: 'origin_versions')]
#[ORM\HasLifecycleCallbacks]
class Version extends BaseEntity implements Timestampable
{
    use TimestampsTrait;

    /**
     * @var list<Document>
     */
    #[ORM\OneToMany(mappedBy: 'version', targetEntity: Document::class, cascade: ['persist', 'merge'])]
    public iterable $documents;

    /**
     * @param Origin $origin
     * @param non-empty-string $name
     * @param non-empty-string $hash
     */
    public function __construct(
        #[ORM\ManyToOne(targetEntity: Origin::class, cascade: ['persist', 'merge'], fetch: 'EAGER', inversedBy: 'versions')]
        #[ORM\JoinColumn(name: 'repository_id', referencedColumnName: 'id')]
        private readonly Origin $origin,
        #[ORM\Column(name: 'name', type: 'string', length: 191)]
        private readonly string $name,
        #[ORM\Column(name: 'hash', type: 'string', length: 191)]
        private string $hash,
    ) {
        $this->documents = new ArrayCollection();
    }

    /**
     * @param non-empty-string $hash
     * @return $this
     */
    public function update(string $hash): self
    {
        assert($hash !== '', 'Commit hash should not be empty');

        $this->hash = $hash;

        return $this;
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
     * @return Origin
     */
    public function getRepository(): Origin
    {
        return $this->origin;
    }

    /**
     * @return list<Document>
     */
    public function getDocuments(): iterable
    {
        return $this->documents;
    }
}
