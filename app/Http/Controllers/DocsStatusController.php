<?php

namespace App\Http\Controllers;

use App\FrameworkVersion;
use App\Services\VersionService;

class DocsStatusController extends Controller
{
    /**
     * @var VersionService
     */
    private $versionService;

    public function __construct(VersionService $versionService)
    {
        $this->versionService = $versionService;
    }

    public function index()
    {
        $versions = FrameworkVersion::query()
            ->with([
                'documentation' => function ($query) {
                    $query->where('page', '!=', 'documentation')->orderBy('page', 'asc');
                },
            ])
            ->orderBy('title', 'desc')
            ->get();

        $documentedVersions = $this->versionService->documentedVersions();
        $versionTitle = '';

        return view('docs/status', compact('versions', 'documentedVersions', 'versionTitle'));
    }
}
