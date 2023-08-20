<?php

declare(strict_types=1);

namespace App\Application\Http\Middleware;

use App\Domain\Version\Version;
use App\Domain\Version\VersionRepositoryInterface;
use Happyr\DoctrineSpecification\Exception\NoResultException;
use Illuminate\Contracts\Container\Container;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Routing\Route;
use Illuminate\Routing\Router;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

final class VersionSelector
{
    private const ERROR_NO_VERSION =
        'Can not find an actual framework version. ' .
        'Make sure all migrations/seeders are done correctly.';

    private readonly ?Route $route;

    public function __construct(
        Router $router,
        private readonly Redirector $redirector,
        private readonly VersionRepositoryInterface $versions,
        private readonly Container $app,
    ) {
        $this->route = $router->current();
    }

    /**
     * @param \Closure(Request):Response $then
     */
    public function handle(Request $request, \Closure $then): Response
    {
        return $this->detectVersionOr(function (Version $version) use ($then, $request): Response {
            // Bind actual Version instance
            $this->app->instance(Version::class, $version);

            return $then($request);
        });
    }

    /**
     * @param \Closure(Version):Response $then
     */
    private function detectVersionOr(\Closure $then): Response
    {
        if (! $this->route) {
            return $this->redirector->route('home');
        }

        $version = $this->getVersion(
            $parameter = $this->route->parameter('version')
        );

        if ($version->name !== $parameter) {
            return $this->redirector->route('docs', [
                'version' => $version->name,
            ]);
        }

        return $then($version);
    }

    private function getVersion(?string $version): Version
    {
        try {
            if ($version === null || $version === '') {
                return $this->versions->last();
            }

            return $this->versions->findByName($version) ?? $this->versions->last();
        } catch (NoResultException $e) {
            throw new UnprocessableEntityHttpException(self::ERROR_NO_VERSION, $e);
        }
    }
}
