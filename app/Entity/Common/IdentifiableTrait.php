<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Entity\Common;

use Doctrine\ORM\Mapping as ORM;

/**
 * @mixin Identifiable
 */
trait IdentifiableTrait
{
    /**
     * @ORM\Id()
     * @ORM\Column(name="id", type="integer", length=10)
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     * @var int|null
     */
    protected ?int $id = null;

    /**
     * @return bool
     */
    public function isNew(): bool
    {
        return $this->id === null;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return bool
     */
    public function wasSaved(): bool
    {
        return ! $this->isNew();
    }
}
