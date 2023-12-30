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
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     *
     * @return \Illuminate\View\View|
     */
    public function show(string $version = Docs::DEFAULT_VERSION, string $page = 'installation')
    {
        $docs = new Docs($version, $page);

        return $docs->view('docs.docs');
    }

    /**
     * Show a mobile navigation page.
     *
     * @param string $version
     * @param string $page
     *
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     *
     * @return \Illuminate\View\View|
     */
    public function navigation(string $version = Docs::DEFAULT_VERSION, string $page = 'installation')
    {
        $docs = new Docs($version, $page);

        return $docs->view('docs.navigation');
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
            ->orderBy('file')
            ->get();

        return view('docs.status', [
            'current'   => $version,
            'documents' => $documents,
        ]);
    }
}
