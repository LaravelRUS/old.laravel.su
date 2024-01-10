<?php

declare(strict_types=1);

namespace App\Orchid;

use App\Models\IdeaRequest;
use App\Models\Meet;
use App\Models\Package;
use Orchid\Platform\Dashboard;
use Orchid\Platform\ItemPermission;
use Orchid\Platform\OrchidServiceProvider;
use Orchid\Screen\Actions\Menu;
use Orchid\Support\Color;

class PlatformProvider extends OrchidServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @param Dashboard $dashboard
     *
     * @return void
     */
    public function boot(Dashboard $dashboard): void
    {
        parent::boot($dashboard);

        // ...
    }

    /**
     * Register the application menu.
     *
     * @return Menu[]
     */
    public function menu(): array
    {
        return [
            Menu::make('Get Started')
                ->icon('bs.book')
                ->title('Навигация')
                ->route(config('platform.index')),

            Menu::make('Лента постов')
                ->icon('bs.collection')
                ->route('platform.example')
                ->badge(fn () => 6),

            Menu::make('Каталог пакетов')
                ->icon('bs.box-seam')
                ->route('platform.packages')
                ->badge(function () {
                    $waiting = Package::approved(false)->count();

                    return $waiting > 0 ? $waiting : null;
                }, Color::DANGER),

            Menu::make('События')
                ->icon('bs.box-seam')
                ->route('platform.meets')
                ->badge(function () {
                    $waiting = Meet::approved(false)->count();

                    return $waiting > 0 ? $waiting : null;
                }, Color::DANGER),

            Menu::make('Idea')
                ->icon('bs.box-seam')
                ->route('platform.idea')
                ->badge(function () {
                    $waiting = IdeaRequest::doesntHave('key')->count();

                    return $waiting > 0 ? $waiting : null;
                }, Color::DANGER),

            /*
            Menu::make('Form Elements')
                ->icon('bs.card-list')
                ->route('platform.example.fields'),

            Menu::make('Overview Layouts')
                ->icon('bs.window-sidebar')
                ->route('platform.example.layouts'),

            Menu::make('Grid System')
                ->icon('bs.columns-gap')
                ->route('platform.example.grid'),

            Menu::make('Charts')
                ->icon('bs.bar-chart')
                ->route('platform.example.charts'),

            Menu::make('Cards')
                ->icon('bs.card-text')
                ->route('platform.example.cards')
                ->divider(),
    */

            Menu::make(__('Users'))
                ->icon('bs.people')
                ->route('platform.systems.users')
                ->permission('platform.systems.users')
                ->title('Контроль доступа'),

            Menu::make(__('Roles'))
                ->icon('bs.shield')
                ->route('platform.systems.roles')
                ->permission('platform.systems.roles')
                ->divider(),

            Menu::make('Веб-сайт')
                ->title('Ссылки')
                ->icon('bs.box-arrow-up-right')
                ->url(config('app.url'))
                ->target('_blank'),

            Menu::make('GitHub')
                ->icon('bs.github')
                ->url("https://github.com/laravel-russia")
                ->target('_blank'),
        ];
    }

    /**
     * Register permissions for the application.
     *
     * @return ItemPermission[]
     */
    public function permissions(): array
    {
        return [
            ItemPermission::group(__('System'))
                ->addPermission('platform.systems.roles', __('Roles'))
                ->addPermission('platform.systems.users', __('Users')),
        ];
    }
}
