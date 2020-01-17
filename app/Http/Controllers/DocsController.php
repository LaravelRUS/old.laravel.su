<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Http\Controllers;

use App\ContentRenderer\Renderer\ContentRendererInterface;
use App\Model\FrameworkVersion;
use App\Model\Repository\DocumentationRepositoryInterface;
use App\Services\DocsService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class DocsController
 */
class DocsController
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
     * @var Redirector
     */
    private Redirector $redirector;

    /**
     * @var DocumentationRepositoryInterface
     */
    private DocumentationRepositoryInterface $docs;

    /**
     * @var ContentRendererInterface
     */
    private ContentRendererInterface $renderer;

    /**
     * DocsController constructor.
     *
     * @param Redirector $redirector
     * @param DocumentationRepositoryInterface $docs
     * @param ContentRendererInterface $renderer
     */
    public function __construct(
        Redirector $redirector,
        DocumentationRepositoryInterface $docs,
        ContentRendererInterface $renderer
    ) {
        $this->docs = $docs;
        $this->redirector = $redirector;
        $this->renderer = $renderer;
    }

    /**
     * @param FrameworkVersion $current
     * @param string $version
     * @param string $page
     * @return Factory|RedirectResponse|Redirector|View
     */
    public function index(FrameworkVersion $current, string $version, string $page = '')
    {
        if (! $page) {
            return $this->redirector->route('docs', [
                $current->title,
                $current->default_page,
            ]);
        }

        if (! $document = $this->docs->findByName($current, $page)) {
            throw new NotFoundHttpException(\sprintf(self::ERROR_PAGE_NOT_FOUND, $page));
        }

        if (! $menu = $this->docs->findMenu($current)) {
            throw new NotFoundHttpException(\sprintf(self::ERROR_MENU_NOT_FOUND, $version));
        }

        return view('docs.doc-page', [
            'version'  => $current,
            'page'     => $document,
            'menu'     => $menu,
            'pageHtml' => $this->renderer->render($current->title, $document->text),
            'menuHtml' => $this->renderer->render($current->title, $menu->text),
        ]);
    }
}
