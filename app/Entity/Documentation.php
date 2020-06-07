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

/**
 * @ORM\Entity(repositoryClass=DocumentationRepository::class)
 * @ORM\Table(name="docs")
 * @ORM\HasLifecycleCallbacks()
 */
class Documentation extends BaseEntity
{
    /**
     * @ORM\ManyToOne(targetEntity=Version::class, inversedBy="docs", fetch="EAGER", cascade={"persist", "merge"})
     * @ORM\JoinColumn(name="version_id", referencedColumnName="id")
     *
     * @var Version
     */
    public Version $version;

    /**
     * @ORM\Column(name="urn", type="string", length=191)
     *
     * @var string
     */
    public string $urn;

    /**
     * @ORM\Column(name="title", type="string", length=191)
     *
     * @var string
     */
    public string $title;

    /**
     * @ORM\Embedded(class=Source::class, columnPrefix="content_")
     *
     * @var Source
     */
    public Source $source;

    /**
     * @ORM\Embedded(class=Translation::class, columnPrefix="translation_")
     *
     * @var Translation
     */
    public Translation $translation;

    /**
     * Documentation constructor.
     *
     * @param Version $version
     * @param string $title
     * @param string $urn
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
     * @return array|string[]
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
     * @return string
     */
    public function getKeywordsString(): string
    {
        return \implode(', ', $this->getKeywords());
    }

    /**
     * @return string
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
