<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Entity\Repository\DocumentationRepository;
use App\Entity\Version;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

final class DocsController
{
    /**
     * @var string
     */
    private const ERROR_PAGE_NOT_FOUND = 'Documentation page %s not found';

    /**
     * @var string
     */
    private const ERROR_MENU_NOT_FOUND = 'Menu for framework version %s not found';

    /**
     * @var DocumentationRepository
     */
    private DocumentationRepository $docs;

    /**
     * @var Factory
     */
    private Factory $views;

    /**
     * DocsController constructor.
     *
     * @param Factory $views
     * @param DocumentationRepository $docs
     */
    public function __construct(Factory $views, DocumentationRepository $docs)
    {
        $this->docs = $docs;
        $this->views = $views;
    }

    /**
     * @param Version $current
     * @param string $version
     * @param string $page
     * @return View|RedirectResponse
     */
    public function show(Version $current, string $version, string $page)
    {
        if (! $document = $this->docs->findByVersionAndUrn($current, $page)) {
            throw new NotFoundHttpException(\sprintf(self::ERROR_PAGE_NOT_FOUND, $page));
        }

        if (! $menu = $this->docs->findByVersionAndUrn($current, $current->menuPage)) {
            throw new NotFoundHttpException(\sprintf(self::ERROR_MENU_NOT_FOUND, $page));
        }

        return $this->views->make('page.docs.show', [
            'version' => $current,
            'menu'    => $menu,
            'page'    => $document,
        ]);
    }

    /**
     * @param Redirector $redirector
     * @param Version $current
     * @return RedirectResponse
     */
    public function index(Redirector $redirector, Version $current): RedirectResponse
    {
        return $redirector->route('docs.show', [
            $current->name,
            $current->defaultPage,
        ]);
    }
}
