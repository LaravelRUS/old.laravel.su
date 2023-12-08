<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DocsController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\PackagesController;
use App\Http\Controllers\MeetController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LikeController;
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
Route::view('/advertising', 'pages.advertising')->name('advertising');
Route::view('/resources', 'pages.resources')->name('resources');
Route::view('/ecosystem', 'pages.ecosystem')->name('ecosystem');
Route::view('/team', 'pages.team')->name('team');
Route::view('/courses', 'pages.courses')->name('courses');
Route::view('/coming-soon', 'coming-soon')->name('coming-soon');


/*
|--------------------------------------------------------------------------
| Post/Feed Routes
|--------------------------------------------------------------------------
|
| ...
|
*/

Route::get('/feed', [PostController::class, 'feed'])
    ->name('feed');

Route::post('/feed',[PostController::class,'feed'])
    ->name('feed.popular');

Route::get('/posts', [PostController::class, 'list'])
    ->name('posts');

//Route::post('/posts', [PostController::class, 'list']);

Route::get('/p/{post:slug}', [PostController::class, 'show'])
    ->name('post.show');

Route::middleware(['auth'])
    ->group(function () {

        Route::get('/posts/create', [PostController::class, 'edit'])
            ->name('post.create');

        Route::post('/posts/create', [PostController::class, 'update'])
            ->name('post.store');

        Route::get('/posts/{post}/edit', [PostController::class, 'edit'])
            ->can('owner', 'post')
            ->name('post.edit');

        Route::post('/posts/{post}', [PostController::class, 'update'])
            ->name('post.update');

        Route::delete('/posts/{post}', [PostController::class, 'delete'])
            ->can('owner', 'post')
            ->name('post.delete');
    });

/*
|--------------------------------------------------------------------------
| Positions/Jobs Routes
|--------------------------------------------------------------------------
|
| ...
|
*/

Route::get('/jobs', [\App\Http\Controllers\PositionsController::class, 'jobs'])
    ->name('jobs');

Route::get('/positions', [\App\Http\Controllers\PositionsController::class, 'list'])
    ->name('positions');

Route::get('/j/{position:slug}', [\App\Http\Controllers\PositionsController::class, 'show'])
    ->name('position.show');

Route::middleware(['auth'])
    ->group(function () {

        Route::get('/positions/create', [\App\Http\Controllers\PositionsController::class, 'edit'])
            ->name('position.create');

        Route::post('/positions', [\App\Http\Controllers\PositionsController::class, 'update'])
            ->name('position.store');

        Route::get('/positions/{position}/edit', [\App\Http\Controllers\PositionsController::class, 'edit'])
            ->can('owner', 'position')
            ->name('position.edit');

        Route::post('/positions/{position}', [\App\Http\Controllers\PositionsController::class, 'update'])
            ->name('position.update');

        Route::delete('/positions/{position}', [\App\Http\Controllers\PositionsController::class, 'delete'])
            ->can('owner', 'position')
            ->name('position.delete');
    });
/*
|--------------------------------------------------------------------------
| Comments Routes
|--------------------------------------------------------------------------
|
| ...
|
*/

Route::get('/comments/article/{post}', [CommentsController::class, 'show'])
    ->name('post.comments');

Route::middleware(['auth'])
    ->prefix('comments')
    ->group(function () {
        Route::post('/', [CommentsController::class, 'store'])
            ->name('comments.store');

        Route::post('/{comment}', [CommentsController::class, 'reply'])
            ->name('comments.reply');

        Route::put('/{comment}', [CommentsController::class, 'update'])
            ->can('update', 'comment')
            ->name('comments.update');

        Route::delete('/{comment}', [CommentsController::class, 'delete'])
            ->can('delete','comment')
            ->name('comments.delete');

        Route::post('/{comment}/reply', [CommentsController::class, 'showReply'])->name('comments.show.reply');
        Route::post('/{comment}/edit', [CommentsController::class, 'showEdit'])
            ->can('update', 'comment')
            ->name('comments.show.edit');
    });

/*
|--------------------------------------------------------------------------
| Meets Routes
|--------------------------------------------------------------------------
|
| ...
|
*/

Route::get('/meets', [MeetController::class, 'index'])->name('meets');

Route::middleware(['auth'])
    ->prefix('meets')
    ->group(function () {
        Route::get('/create', [MeetController::class, 'edit'])
            ->name('meets.create');

        Route::post('/', [MeetController::class, 'update'])
            ->name('meets.store');

        Route::get('/{meet}/edit', [MeetController::class, 'edit'])
            ->can('owner', 'meet')
            ->name('meets.edit');

        Route::post('/{meet}', [MeetController::class, 'update'])
            ->can('owner', 'meet')
            ->name('meets.update');

        Route::delete('/{meet}', [MeetController::class, 'delete'])
            ->can('owner', 'meet')
            ->name('meets.delete');
    });

/*
|--------------------------------------------------------------------------
| Packages Routes
|--------------------------------------------------------------------------
|
| ...
|
*/

Route::get('/packages', [PackagesController::class, 'index'])->name('packages');

Route::middleware(['auth'])
    ->prefix('packages')
    ->group(function () {
        Route::get('/create', [PackagesController::class, 'edit'])
            ->name('packages.create');

        Route::post('/', [PackagesController::class, 'update'])
            ->name('packages.store');

        Route::get('/{package}/edit', [PackagesController::class, 'edit'])
            ->can('owner', 'package')
            ->name('packages.edit');

        Route::post('/{package}', [PackagesController::class, 'update'])
            ->can('owner', 'package')
            ->name('packages.update');

        Route::delete('/{package}', [PackagesController::class, 'delete'])
            ->can('owner', 'package')
            ->name('packages.delete');
    });


/*
|--------------------------------------------------------------------------
| User-Like Routes
|--------------------------------------------------------------------------
|
| This section contains the web routes related to user likes.
| These routes handle setting/unsetting likes for different entities.
|
*/

Route::middleware('auth')
    ->prefix('like')
    ->group(function () {
        Route::post('/post/{post}', [LikeController::class, 'togglePost'])
            ->name('like.post');

        Route::post('/comment/{comment}', [LikeController::class, 'toggleComment'])
            ->name('like.comment');
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
Route::view('/documentation-contribution-guide', 'docs.contribution')
    ->name('documentation-contribution-guide');

Route::redirect('/docs/', '/docs/' . Docs::DEFAULT_VERSION);

Route::get('/status/{version?}', [DocsController::class, 'status'])
    ->whereIn('version', Docs::SUPPORT_VERSIONS)
    ->name('status');

Route::get('/docs/{version?}/{page?}', [DocsController::class, 'show'])
    ->whereIn('version', Docs::SUPPORT_VERSIONS)
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
    ->name('my.update');

Route::get('/profile/{user:nickname}',  [\App\Http\Controllers\ProfileController::class, 'show'])
    ->name('profile');

Route::get('/profile/{user:nickname}/packages',[\App\Http\Controllers\ProfileController::class,'packages'])
    ->name('profile.packages');

Route::get('/profile/{user:nickname}/comments',[\App\Http\Controllers\ProfileController::class,'comments'])
    ->name('profile.comments');

Route::get('/profile/{user:nickname}/awards',[\App\Http\Controllers\ProfileController::class,'awards'])
    ->name('profile.awards');

Route::get('/profile/{user:nickname}/meets',[\App\Http\Controllers\ProfileController::class,'meets'])
    ->name('profile.meets');


/*
|--------------------------------------------------------------------------
| PWA/iOS Manifest
|--------------------------------------------------------------------------
*/

Route::get('/manifest.json', fn() => response()->json(config('site.pwa')))
    ->middleware('cache.headers:public;max_age=300;etag')
    ->name('manifest');


Route::get('/cover.jpg', [\App\Http\Controllers\CoverController::class, 'image'])
    ->middleware(['cache.headers:public;max_age=300;etag', 'signed'])
    ->name('cover');

/*
|--------------------------------------------------------------------------
| RSS
|--------------------------------------------------------------------------
*/

Route::feeds();
