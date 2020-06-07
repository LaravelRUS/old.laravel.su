<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Entity;

use App\Entity\Repository\VersionsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection as CollectionInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VersionsRepository::class)
 * @ORM\Table(name="versions")
 */
class Version extends BaseEntity
{
    /**
     * @var string
     */
    public const DEFAULT_MENU_PAGE = 'documentation';

    /**
     * @var string
     */
    public const DEFAULT_PAGE = 'installation';

    /**
     * @ORM\Column(name="title", type="string", length=191)
     *
     * @var string
     */
    public string $name;

    /**
     * @ORM\OneToMany(targetEntity=Documentation::class, mappedBy="version", cascade={"persist", "merge"})
     * @ORM\JoinColumn(name="id", referencedColumnName="version_id")
     *
     * @var iterable|CollectionInterface|Documentation[]
     */
    public iterable $docs;

    /**
     * @ORM\Column(name="default_page", type="string", length=191)
     *
     * @var string
     */
    public string $defaultPage = self::DEFAULT_PAGE;

    /**
     * @ORM\Column(name="menu_page", type="string", length=191)
     *
     * @var string
     */
    public string $menuPage = self::DEFAULT_MENU_PAGE;

    /**
     * @ORM\Column(name="is_documented", type="boolean")
     *
     * @var bool
     */
    public bool $isDocumented = false;

    /**
     * Version constructor.
     *
     * @param string $title
     */
    public function __construct(string $title)
    {
        $this->name = \trim($title);
        $this->docs = new ArrayCollection();
    }
}
