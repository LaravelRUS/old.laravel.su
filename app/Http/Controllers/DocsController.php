<?php

namespace App\Http\Controllers;

use App\Documentation;
use App\Services\DocsService;
use App\Services\VersionService;

class DocsController extends Controller
{
    /**
     * The default docs page.
     *
     * @var string
     */
    protected $defaultPage = 'installation';
    /**
     * @var VersionService
     */
    private $versionService;
    /**
     * @var DocsService
     */
    private $docsService;

    public function __construct(VersionService $versionService, DocsService $docsService)
    {
        $this->versionService = $versionService;
        $this->docsService = $docsService;
    }

    public function index($versionTitle = "", $page = "")
    {
        if (!$versionTitle && !$page) {
            $versionTitle = $this->checkForVersionInCookies();
            return redirect(route('docs', [$versionTitle, $this->defaultPage]));
        }

        if ($versionTitle && !$page) {
            if ($this->versionService->isDocumented($versionTitle)) {
                return redirect(route('docs', [$versionTitle, $this->defaultPage]));
            }

            return redirect(route('docs', [$this->versionService->getDefaultVersionTitle(), ""]));
        }

        \Cookie::queue('docs_version', $versionTitle, 1440);

        $page = Documentation::byVersion($versionTitle)->page($page)->firstOrFail();
        $pageHtml = $this->docsService->convertToHtml($page->text, $versionTitle);

        $menu = Documentation::byVersion($versionTitle)->page('documentation')->first();
        $menuHtml = $this->docsService->convertToHtml($menu->text, $versionTitle);

        $documentedVersions = $this->versionService->documentedVersions();

        $metaTitle = "$versionTitle - $page->title ($page->page)";
        $metaDescription = "Русская документация Laravel $versionTitle - $page->title";

        return view('docs.doc-page', compact('menu', 'page',
            "pageHtml", "menuHtml",
            "documentedVersions", "versionTitle",
            "metaTitle", "metaDescription"
        ));
    }

    /**
     * Check the cookies for docs version or return the default one.
     *
     * @return mixed|null|string
     */
    private function checkForVersionInCookies()
    {
        return \Cookie::has('docs_version') ? \Cookie::get('docs_version') : $this->versionService->getDefaultVersionTitle();
    }
}
