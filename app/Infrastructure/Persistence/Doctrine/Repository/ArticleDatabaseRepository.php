<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Doctrine\Repository;

use App\Domain\Article\Article;
use App\Domain\Article\ArticleRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;
use Happyr\DoctrineSpecification\Spec;

/**
 * @template-extends DatabaseRepository<Article>
 */
class ArticleDatabaseRepository extends DatabaseRepository implements ArticleRepositoryInterface
{
    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct($em, Article::class);
    }

    /**
     * @param non-empty-string $urn
     */
    public function findByUrn(string $urn): ?Article
    {
        if ($urn === '') {
            return null;
        }

        return $this->matchOneOrNullResult(Spec::andX(
            Spec::eq('urn', \strtolower($urn))
        ));
    }
}
