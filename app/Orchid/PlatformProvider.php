<?php

declare(strict_types=1);

namespace App\Orchid;

use App\Models\IdeaRequest;
use App\Models\Meet;
use App\Models\Package;
use App\Models\Position;
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
            Menu::make('Статистика')
                ->icon('bs.book')
                ->title('Навигация')
                ->route(config('platform.index')),

            Menu::make('Лента постов')
                ->permission('site.content')
                ->icon('bs.collection')
                ->route('platform.post'),

            Menu::make('Каталог пакетов')
                ->icon('bs.box-seam')
                ->route('platform.packages')
                ->permission('site.content')
                ->badge(function () {
                    $waiting = Package::approved(false)->count();

                    return $waiting > 0 ? $waiting : null;
                }, Color::DANGER),

            Menu::make('Мероприятия')
                ->icon('bs.people')
                ->route('platform.meets')
                ->permission('site.content')
                ->badge(function () {
                    $waiting = Meet::approved(false)->count();

                    return $waiting > 0 ? $waiting : null;
                }, Color::DANGER),

            Menu::make('Вакансии')
                ->icon('bs.briefcase')
                ->route('platform.position')
                ->permission('site.content')
                ->badge(function () {
                    $waiting = Position::approved(false)->count();

                    return $waiting > 0 ? $waiting : null;
                }, Color::DANGER),

            Menu::make('Челленджи')
                ->permission('site.content')
                ->icon('bs.collection')
                ->route('platform.challenges'),

            Menu::make('Idea')
                ->icon('bs.box-seam')
                ->route('platform.idea')
                ->badge(function () {
                    $waiting = IdeaRequest::doesntHave('key')->count();

                    return $waiting > 0 ? $waiting : null;
                }, Color::DANGER),

            Menu::make('Яндекс Метрика')
                ->icon('pie-chart')
                ->href('https://metrika.yandex.ru/dashboard?id=96430041')
                ->target('_blank')
                ->title('Сервисы'),

            Menu::make('Telescope')
                ->icon('arrow-clockwise')
                ->route('platform.services.telescope')
                ->permission('platform.services.telescope'),

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
                ->active(config('app.url'))
                ->target('_blank'),

            Menu::make('GitHub')
                ->icon('bs.github')
                ->url(config('services.github.org_url'))
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

            ItemPermission::group('Данные')
                ->addPermission('site.content', 'Контент'),

            ItemPermission::group('Сервисы')
                ->addPermission('platform.services.telescope', 'Telescope'),
        ];
    }
}
