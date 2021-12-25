<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Entity\Repository;

use App\Entity\Article;
use Happyr\DoctrineSpecification\Spec;

/**
 * @template-extends Repository<Article>
 */
class ArticlesRepository extends Repository
{
    /**
     * @param non-empty-string $urn
     * @return Article|null
     */
    public function findByUrn(string $urn): ?Article
    {
        return $this->matchOneOrNullResult(Spec::andX(
            Spec::eq('urn', \strtolower($urn))
        ));
    }
}
