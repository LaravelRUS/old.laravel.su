<?php

declare(strict_types=1);

namespace App\Domain\Article;

use App\Domain\Documentation\Content;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Embeddable]
final class Body extends Content
{
}
