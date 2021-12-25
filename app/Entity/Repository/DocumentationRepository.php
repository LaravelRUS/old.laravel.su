<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Entity\Repository;

use App\Entity\Documentation;
use App\Entity\Version;
use Happyr\DoctrineSpecification\Spec;

class DocumentationRepository extends Repository
{
    /**
     * @param Version $version
     * @param string $urn
     * @return Documentation|null
     */
    public function findByVersionAndUrn(Version $version, string $urn): ?Documentation
    {
        return $this->matchOneOrNullResult(Spec::andX(
            Spec::eq('version', $version),
            Spec::eq('urn', \strtolower($urn))
        ));
    }
}
