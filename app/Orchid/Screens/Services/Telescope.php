<?php

namespace App\Orchid\Screens\Services;

use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;

class Telescope extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Telescope';

    /**
     * @var string
     */
    public $permission = 'platform.services.telescope';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [];
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): array
    {
        return [
            Link::make('Открыть в новом окне')
                ->icon('link')
                ->href('/telescope')
                ->target('_blank'),
        ];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): array
    {
        return [
            Layout::browsing('/telescope'),
        ];
    }
}
