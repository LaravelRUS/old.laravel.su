<?php

declare(strict_types=1);

namespace App\Domain\Repository;

use App\Domain\Article;
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
