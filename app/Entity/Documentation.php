<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Entity;

use App\Entity\Documentation\Source;
use App\Entity\Documentation\Translation;
use App\Entity\Repository\DocumentationRepository;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Table(name: 'docs')]
#[ORM\Entity(repositoryClass: DocumentationRepository::class)]
#[ORM\HasLifecycleCallbacks]
class Documentation extends BaseEntity implements \Stringable
{
    /**
     * @var Version
     */
    #[ORM\ManyToOne(targetEntity: Version::class, cascade: ['persist', 'merge'], fetch: 'EAGER', inversedBy: 'docs')]
    #[ORM\JoinColumn(name: 'version_id', referencedColumnName: 'id')]
    public Version $version;

    /**
     * @var non-empty-string
     */
    #[ORM\Column(name: 'urn', type: 'string', length: 191)]
    public string $urn;

    /**
     * @var non-empty-string
     */
    #[ORM\Column(name: 'title', type: 'string', length: 191)]
    public string $title;

    /**
     * @var Source
     */
    #[ORM\Embedded(class: Source::class, columnPrefix: 'content_')]
    public Source $source;

    /**
     * @var Translation
     */
    #[ORM\Embedded(class: Translation::class, columnPrefix: 'translation_')]
    public Translation $translation;

    /**
     * @param Version $version
     * @param non-empty-string $title
     * @param non-empty-string $urn
     */
    public function __construct(Version $version, string $title, string $urn)
    {
        $this->version = $version;

        $this->source = new Source();
        $this->translation = new Translation();
        $this->title = $title;
        $this->urn = $urn;
    }

    /**
     * @return list<non-empty-string>
     */
    public function getKeywords(): array
    {
        return [
            ...\preg_split('/\W+/u', $this->urn),
            $this->title,
            'Laravel ' . $this->version->name
        ];
    }

    /**
     * @return non-empty-string
     */
    public function getKeywordsString(): string
    {
        return \implode(', ', $this->getKeywords());
    }

    /**
     * @return non-empty-string
     */
    public function __toString(): string
    {
        if ($this->translation->isRendered()) {
            return (string)$this->translation;
        }

        if ($this->source->isRendered()) {
            return (string)$this->source;
        }

        return $this->urn;
    }
}
