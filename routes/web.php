<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DocsController;
use Illuminate\Support\Facades\Route;
use App\Docs;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'pages.welcome')->name('home');
Route::view('/feature', 'pages.feature')->name('feature');
Route::view('/post', 'pages.post')->name('post');
Route::view('/profile', 'pages.profile')->name('profile');
Route::view('/advertising', 'pages.advertising')->name('advertising');
Route::view('/resources', 'pages.resources')->name('resources');
Route::view('/meets', 'pages.meets')->name('meets');
Route::view('/performance', 'pages.performance')->name('performance');
Route::view('/team', 'pages.team')->name('team');


Route::get('/feed', [PostController::class, 'list'])
    ->name('feed');

Route::post('/feed', [PostController::class, 'list'])
    ->middleware(\App\Http\Middleware\TurboStream::class);

/*
Route::prefix('/stream')->middleware(\App\Http\Middleware\TurboStream::class)->group(function () {
    Route::post('/posts', [PostController::class, 'list'])->name('post.load-more');
});
*/

Route::middleware(['auth'])
    ->group(function () {
        Route::get('/posts/edit/{post?}', [PostController::class, 'edit'])->name('post.edit');
        Route::post('/posts/edit/{post?}', [PostController::class, 'update'])->name('post.update');
    });


/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
|
| This section contains the web routes related to authentication.
| These routes handle user authentication and logout processes.
|
*/

Route::get('/auth/login', [AuthController::class, 'login'])->middleware('guest')->name('login');
Route::get('/auth/callback', [AuthController::class, 'callback'])->middleware('guest');
Route::get('/auth/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');


/*
|--------------------------------------------------------------------------
| Documentation Routes
|--------------------------------------------------------------------------
|
| This section contains the web routes for accessing the documentation.
| The routes handle redirects, display documentation pages, and provide related data.
|
*/
Route::view('/documentation-contribution-guide', 'pages.documentation-contribution-guide')
    ->name('documentation-contribution-guide');

Route::redirect('/docs/', '/docs/' . Docs::DEFAULT_VERSION);

Route::get('/status/{version?}', [DocsController::class, 'status'])
    ->whereIn('version', Docs::SUPPORT_VERSION)
    ->name('status');

Route::get('/docs/{version?}/{page?}', [DocsController::class, 'show'])
    ->whereIn('version', Docs::SUPPORT_VERSION)
    ->name('docs');
