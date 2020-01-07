<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Http\Middleware;

use App\Model\FrameworkVersion;
use App\Model\Repository\FrameworkVersionRepositoryInterface;
use Illuminate\Contracts\Container\Container;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Routing\Route;
use Illuminate\Routing\Router;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

/**
 * Class VersionSelector
 */
final class VersionSelector
{
    /**
     * @var string
     */
    private const ERROR_NO_VERSION = 'Can not find an actual framework version. Make sure all migrations/seeders are done correctly.';

    /**
     * @var Route|null
     */
    private ?Route $route;

    /**
     * @var Redirector
     */
    private Redirector $redirector;

    /**
     * @var FrameworkVersionRepositoryInterface
     */
    private FrameworkVersionRepositoryInterface $versions;

    /**
     * @var Container
     */
    private Container $app;

    /**
     * VersionSelector constructor.
     *
     * @param Router $router
     * @param Redirector $redirector
     * @param FrameworkVersionRepositoryInterface $versions
     * @param Container $app
     */
    public function __construct(Router $router, Redirector $redirector, FrameworkVersionRepositoryInterface $versions, Container $app)
    {
        $this->route = $router->current();
        $this->redirector = $redirector;
        $this->versions = $versions;
        $this->app = $app;
    }

    /**
     * @param Request $request
     * @param \Closure $then
     * @return Response
     */
    public function handle(Request $request, \Closure $then): Response
    {
        return $this->detectVersionOr(function (FrameworkVersion $version) use ($then, $request): Response {
            // Bind actual FrameworkVersion instance
            $this->app->instance(FrameworkVersion::class, $version);

            return $then($request);
        });
    }

    /**
     * @param \Closure $then
     * @return Response
     */
    private function detectVersionOr(\Closure $then): Response
    {
        if (! $this->route) {
            return $this->redirector->route('home');
        }

        try {
            $version = $this->getVersion($parameter = $this->route->parameter('version'));
        } catch (\Throwable $e) {
            throw new UnprocessableEntityHttpException(self::ERROR_NO_VERSION, $e);
        }

        if ($version->title !== $parameter) {
            return $this->redirector->route('docs', [
                'version' => $version->title,
            ]);
        }

        return $then($version);
    }

    /**
     * @param string|null $version
     * @return FrameworkVersion
     */
    private function getVersion(?string $version): FrameworkVersion
    {
        if ($version === null) {
            return $this->versions->last();
        }

        return $this->versions->findByTitle($version) ?? $this->versions->last();
    }
}
