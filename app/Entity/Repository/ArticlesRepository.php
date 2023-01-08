<?php

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
