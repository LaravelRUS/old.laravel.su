<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Documentation;
use App\Services\DocsService;
use App\Services\VersionService;
use Cookie;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

/**
 * Class DocsController
 */
class DocsController
{
    /**
     * TODO Это должно быть в БД
     *
     * The default docs page.
     *
     * @var string
     */
    protected string $defaultPage = 'installation';

    /**
     * @var VersionService
     */
    private VersionService $versionService;

    /**
     * @var DocsService
     */
    private DocsService $docsService;

    /**
     * DocsController constructor.
     *
     * @param VersionService $versionService
     * @param DocsService $docsService
     */
    public function __construct(VersionService $versionService, DocsService $docsService)
    {
        $this->versionService = $versionService;
        $this->docsService = $docsService;
    }

    /**
     * TODO Очень плохо написанный код, переписать всё нафиг. Не более 5-6 строк на метод контроллера
     *
     * @param string $versionTitle
     * @param string $page
     * @return Factory|RedirectResponse|Redirector|View
     */
    public function index($versionTitle = '', $page = '')
    {
        if (! $versionTitle && ! $page) {
            $versionTitle = $this->checkForVersionInCookies();

            // Использовать хелперы redirect и route нельзя
            return redirect(route('docs', [$versionTitle, $this->defaultPage]));
        }

        if ($versionTitle && ! $page) {
            if ($this->versionService->isDocumented($versionTitle)) {
                // Использовать хелперы redirect и route нельзя
                return redirect(route('docs', [$versionTitle, $this->defaultPage]));
            }

            // Использовать хелперы redirect и route нельзя
            return redirect(route('docs', [$this->versionService->getDefaultVersionTitle(), ""]));
        }

        // Нельзя использовать фасады!!!!!
        Cookie::queue('docs_version', $versionTitle, 1440);

        // Здесь может случиться NPE
        $page = Documentation::byVersion($versionTitle)->page($page)->firstOrFail();
        $pageHtml = $this->docsService->convertToHtml($page->text, $versionTitle);

        // Здесь может случиться NPE тоже
        $menu = Documentation::byVersion($versionTitle)->page('documentation')->first();
        $menuHtml = $this->docsService->convertToHtml($menu->text, $versionTitle);

        $documentedVersions = $this->versionService->documentedVersions();

        $metaTitle = "$versionTitle - $page->title ($page->page)";
        // Это должно быть во view
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
        // Нельзя использовать фасады!!!!!
        return Cookie::has('docs_version') ? Cookie::get('docs_version')
            : $this->versionService->getDefaultVersionTitle();
    }
}
