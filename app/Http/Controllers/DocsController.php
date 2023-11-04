<?php

namespace App\Http\Controllers;

use App\Docs;
use App\Models\Document;

class DocsController extends Controller
{
    /**
     * Show a documentation page.
     *
     * @param string $version
     * @param string $page
     *
     * @return \Illuminate\View\View
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function show(string $version = Docs::DEFAULT_VERSION, string $page = 'installation')
    {
        $docs = new Docs($version, $page);

        $text = $docs->view('particles.docs');

        return view('pages.docs', [
            'docs'         => $docs,
            'text'         => $text,
        ]);
    }

    /**
     * @param string $version
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function status(string $version = Docs::DEFAULT_VERSION)
    {
        $documents = Document::where('version', $version)
            ->orderByDesc('behind')
            ->get();

        return view('pages.status', [
            'current' => $version,
            'documents' => $documents
        ]);
    }
}
