<?php

namespace App\Http\Controllers;

use App\Model\FrameworkVersion;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class DocsStatusController
 */
class DocsStatusController
{
    /**
     * @var Factory
     */
    private Factory $factory;

    /**
     * DocsStatusController constructor.
     *
     * @param Factory $factory
     */
    public function __construct(Factory $factory)
    {
        $this->factory = $factory;
    }

    /**
     * @return View
     */
    public function index(): View
    {
        $relation = fn(HasMany $query) =>
            $query->where('page', '!=', 'documentation')
                ->orderBy('page', 'asc')
        ;

        $versions = FrameworkVersion::query()
            ->with(['documentation' => $relation])
            ->orderBy('title', 'desc')
            ->get();

        return $this->factory->make('docs.status', [
            'versions' => $versions,
        ]);
    }
}
