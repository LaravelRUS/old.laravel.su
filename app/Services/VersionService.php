<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Services;

use App\FrameworkVersion;

/**
 * TODO А это вообще не сервис, а репозиторий. Надо переделать.
 */
class VersionService
{
    public function __construct()
    {
    }

    public function isDocumented($versionTitle)
    {
        $version = FrameworkVersion::query()
            ->where("title", $versionTitle)
            ->first();

        if (! $version) {
            return false;
        }

        return $version->is_documented;
    }

    public function getDefaultVersionTitle()
    {
        return FrameworkVersion::query()
            ->where("is_documented", 1)
            ->orderBy("title", "desc")
            ->limit(1)
            ->first()
            ->title;
    }

    public function documentedVersions()
    {
        return FrameworkVersion::query()
            ->where("is_documented", 1)
            ->orderBy("title", "desc")
            ->get();
    }
}
