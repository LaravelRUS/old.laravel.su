<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Entity\Origin\Document;

use App\Entity\Origin\Version;
use App\Entity\Origin\Document;

interface DocumentsRepositoryInterface
{
    /**
     * @param Version $version
     * @return list<Document>
     */
    public function findAllByVersion(Version $version): iterable;

    /**
     * @param Version $version
     * @param non-empty-string $name
     * @return Document|null
     */
    public function findByName(Version $version, string $name): ?Document;
}
