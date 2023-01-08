<?php

declare(strict_types=1);

namespace App\Entity\Article;

use App\Entity\Documentation\Content;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Embeddable]
final class Body extends Content
{
}
