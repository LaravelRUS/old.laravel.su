<?php namespace App\Services;
use App\FrameworkVersion;

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
    	if( ! $version) return false;
    	else return $version->is_documented;
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
