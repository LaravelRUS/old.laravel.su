<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Entity;

use App\Entity\Article\Body;
use App\Entity\Repository\ArticlesRepository;
use Carbon\Carbon;
use Doctrine\ORM\Mapping as ORM;
use Illuminate\Support\Str;

/**
 * @ORM\Entity(repositoryClass=ArticlesRepository::class)
 * @ORM\Table(name="articles")
 * @ORM\HasLifecycleCallbacks()
 */
class Article extends BaseEntity
{
    /**
     * @ORM\Column(name="title", type="string")
     *
     * @var string
     */
    public string $title;

    /**
     * @ORM\Column(name="urn", type="string")
     *
     * @var string|null
     */
    public ?string $urn = null;

    /**
     * @ORM\Column(name="description", type="string")
     *
     * @var string
     */
    public string $description = '';

    /**
     * @ORM\Embedded(class=Body::class, columnPrefix="content_")
     *
     * @var Body
     */
    public Body $body;

    /**
     * @ORM\Column(name="published_at", type="carbon", nullable=true)
     *
     * @var Carbon|null
     */
    protected ?Carbon $publishedAt = null;

    /**
     * Article constructor.
     *
     * @param string $title
     * @param Body $body
     */
    public function __construct(string $title, Body $body)
    {
        $this->rename($title);

        $this->body = $body;
    }

    /**
     * @param string $title
     * @return $this
     */
    public function rename(string $title): self
    {
        $this->title = $title;

        if ($this->urn === null) {
            $this->urn = Str::slug($title);
        }

        return $this;
    }

    /**
     * @param string $description
     * @return $this
     */
    public function describe(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @param \DateTimeInterface|null $at
     * @return $this
     */
    public function publish(\DateTimeInterface $at = null): self
    {
        $this->publishedAt = Carbon::make($at ?? Carbon::now());

        return $this;
    }
}
