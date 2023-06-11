<?php

declare(strict_types=1);

namespace App\Domain\Common;

use Doctrine\ORM\Mapping as ORM;

/**
 * @mixin Identifiable
 * @psalm-require-implements Identifiable
 */
trait IdentifiableTrait
{
    /**
     * @var positive-int|null|0
     */
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: 'integer', length: 10)]
    protected ?int $id = null;

    /**
     * @return bool
     */
    public function isNew(): bool
    {
        return $this->id === null;
    }

    /**
     * @return positive-int|null|0
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
