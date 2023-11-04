<?php

namespace App\Http\Controllers;

use App\Docs;
use App\Models\Document;
use Illuminate\Contracts\View\View;

class DocsController extends Controller
{
    /**
     * Show a documentation page.
     *
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function show(string $version = Docs::DEFAULT_VERSION, string $page = 'installation'): View
    {
        $docs = new Docs($version, $page);

        $text = $docs->view('particles.docs');

        return view('pages.docs', [
            'docs'         => $docs,
            'text'         => $text,
        ]);
    }

    public function status(string $version = Docs::DEFAULT_VERSION): View
    {
        $documents = Document::where('version', $version)
            ->orderByDesc('count_commits_behind')
            ->get();

        return view('pages.status', [
            'current' => $version,
            'documents' => $documents
        ]);
    }
}
