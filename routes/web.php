<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DocsController;
use App\Http\Controllers\CommentsController;
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
Route::view('/advertising', 'pages.advertising')->name('advertising');
Route::view('/resources', 'pages.resources')->name('resources');
Route::view('/meets', 'pages.meets')->name('meets');
Route::view('/performance', 'pages.performance')->name('performance');
Route::view('/team', 'pages.team')->name('team');
Route::view('/packages', 'pages.packages')->name('packages');
Route::view('/partners', 'pages.partners')->name('partners');
Route::view('/courses', 'pages.courses')->name('courses');
Route::view('/coming-soon', 'coming-soon')->name('coming-soon');

Route::get('/feed', [PostController::class, 'list'])
    ->name('feed');

Route::post('/feed', [PostController::class, 'list'])
    ->middleware(\App\Http\Middleware\TurboStream::class);

/*
Route::prefix('/stream')->middleware(\App\Http\Middleware\TurboStream::class)->group(function () {
    Route::post('/posts', [PostController::class, 'list'])->name('post.load-more');
});
*/

Route::get('/p/{post:slug}', [PostController::class, 'show'])->name('post.show');

Route::get('/comments', [CommentsController::class, 'list'])->name('comments.list');

Route::middleware(['auth'])
    ->group(function () {
        Route::get('/posts/edit/{post?}', [PostController::class, 'edit'])->name('post.edit');
        Route::post('/posts/edit/{post?}', [PostController::class, 'update'])->name('post.update');

        Route::post('comments', [CommentsController::class, 'store'])->name('comments.store')
            ->middleware(\App\Http\Middleware\TurboStream::class);

        Route::delete('comments/{comment}', [CommentsController::class, 'destroy'])->name('comments.destroy');
        Route::put('comments/{comment}', [CommentsController::class, 'update'])->name('comments.update');
        Route::post('comments/{comment}', [CommentsController::class, 'reply'])->name('comments.reply');
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
Route::post('/auth/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');


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



/*
|--------------------------------------------------------------------------
| Profile Routes
|--------------------------------------------------------------------------
|
| TODO:
|
*/

Route::get('/user/{nickname}', function ($nickname){
    return $nickname;
})->name('user.show');

Route::get('/profile', [\App\Http\Controllers\ProfileController::class, 'index'])
    ->middleware('auth')
    ->name('my');

Route::get('/profile/edit', [\App\Http\Controllers\ProfileController::class, 'edit'])
    ->middleware('auth')
    ->name('my.edit');

Route::post('/profile/update', [\App\Http\Controllers\ProfileController::class, 'update'])
    ->middleware('auth')
    ->middleware(\App\Http\Middleware\TurboStream::class)
    ->name('my.update');

Route::get('/profile/{user:nickname}',  [\App\Http\Controllers\ProfileController::class, 'show'])
    ->name('profile');
