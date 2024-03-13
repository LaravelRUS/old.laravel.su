<?php

declare(strict_types=1);

use App\Orchid\Screens\PlatformScreen;
use App\Orchid\Screens\Role\RoleEditScreen;
use App\Orchid\Screens\Role\RoleListScreen;
use App\Orchid\Screens\User\UserEditScreen;
use App\Orchid\Screens\User\UserListScreen;
use Illuminate\Support\Facades\Route;
use Tabuna\Breadcrumbs\Trail;

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the need "dashboard" middleware group. Now create something great!
|
*/

// Main
Route::screen('/main', PlatformScreen::class)
    ->name('platform.main');

// Platform > System > Users > User
Route::screen('users/{user}/edit', UserEditScreen::class)
    ->name('platform.systems.users.edit')
    ->breadcrumbs(fn (Trail $trail, $user) => $trail
        ->parent('platform.systems.users')
        ->push($user->name, route('platform.systems.users.edit', $user)));

// Platform > System > Users
Route::screen('users', UserListScreen::class)
    ->name('platform.systems.users')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Users'), route('platform.systems.users')));

// Platform > System > Roles > Role
Route::screen('roles/{role}/edit', RoleEditScreen::class)
    ->name('platform.systems.roles.edit')
    ->breadcrumbs(fn (Trail $trail, $role) => $trail
        ->parent('platform.systems.roles')
        ->push($role->name, route('platform.systems.roles.edit', $role)));

// Platform > System > Roles > Create
Route::screen('roles/create', RoleEditScreen::class)
    ->name('platform.systems.roles.create')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.systems.roles')
        ->push(__('Create'), route('platform.systems.roles.create')));

// Platform > System > Roles
Route::screen('roles', RoleListScreen::class)
    ->name('platform.systems.roles')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Roles'), route('platform.systems.roles')));

Route::screen('telescope', \App\Orchid\Screens\Services\Telescope::class)
    ->name('platform.services.telescope');

// Route::screen('idea', Idea::class, 'platform.screens.idea');

Route::screen('packages', App\Orchid\Screens\Package\ListScreen::class)
    ->name('platform.packages')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push('Пакеты'));

Route::screen('meets', App\Orchid\Screens\Meet\ListScreen::class)
    ->name('platform.meets')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push('События'));

Route::screen('idea', App\Orchid\Screens\Idea\ListScreen::class)
    ->name('platform.idea')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push('Idea'));

Route::screen('idea/{ideaRequest}/edit', App\Orchid\Screens\Idea\EditScreen::class)
    ->name('platform.idea.request')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.idea')
        ->push('Запрос ключа'));

Route::screen('post', App\Orchid\Screens\Post\ListScreen::class)
    ->name('platform.post')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push('Лента постов'));

Route::screen('post/{post}/edit', App\Orchid\Screens\Post\EditScreen::class)
    ->name('platform.post.edit')
    ->breadcrumbs(fn (Trail $trail, $post) => $trail
        ->parent('platform.post')
        ->push($post->title, route('platform.post.edit', $post)));

Route::screen('position', App\Orchid\Screens\Position\ListScreen::class)
    ->name('platform.position')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push('Вакансии'));

Route::screen('position/{position}/edit', App\Orchid\Screens\Position\EditScreen::class)
    ->name('platform.position.edit')
    ->breadcrumbs(fn (Trail $trail, $position) => $trail
        ->parent('platform.position')
        ->push($position->title, route('platform.position.edit', $position)));

Route::screen('challenges', App\Orchid\Screens\Challenges\ListScreen::class)
    ->name('platform.challenges')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push('Челеннджи'));

Route::screen('challenges/{challenge}/edit', App\Orchid\Screens\Challenges\EditScreen::class)
    ->name('platform.challenges.edit')
    ->breadcrumbs(fn (Trail $trail, $challenge) => $trail
        ->parent('platform.challenges')
        ->push($challenge->title, route('platform.position.edit', $challenge)));

Route::screen('challenges/create', App\Orchid\Screens\Challenges\EditScreen::class)
    ->name('platform.challenges.create')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.challenges')
        ->push(__('Create'), route('platform.challenges.create')));
